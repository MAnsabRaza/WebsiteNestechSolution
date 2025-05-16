const UserProfileController = function () {
    const saveUserProfile = function (user) {
        $.ajax({
            type: "POST",
            url: 'http://localhost:8000/api/saveUser',
            data: JSON.stringify(user),
            dataType: "JSON",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: "application/json",
            success: function (response) {
                if (response.success) {
                    Toastify({
                        text: "User updated successfully!",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        backgroundColor: "#4caf50",
                    }).showToast();
                    window.location.reload();
                }
            },
            error: function (error) {
                console.error("Error details:", error);
                let errorMessage = "An error occurred";
                if (error.responseJSON && error.responseJSON.message) {
                    errorMessage = error.responseJSON.message;
                }
                Toastify({
                    text: errorMessage,
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    backgroundColor: "#f44336",
                }).showToast();
            }
        });
    }

    const getSaveObj = function () {
        // Add hidden input for user ID in your blade template
        const userId = document.getElementById('user_id') ? document.getElementById('user_id').value : null;

        return {
            id: userId, // Include the user ID for updates
            user_name: document.getElementById('user_name').value,
            city: document.getElementById('city').value,
            contact_number: document.getElementById('contact_number').value,
            email: document.getElementById('email').value,
            role_name: document.getElementById('role_name').value,
            country: document.getElementById('country').value
        };
    };

    const country = document.getElementById('country');
    const contactNumber = document.getElementById('contact_number');

    async function fetchCountry() {
        try {
            // Save user's current country value
            const userCountry = country.options[0].value;
            country.innerHTML = '';

            const response = await fetch('https://restcountries.com/v3.1/all');
            if (response.ok) {
                const data = await response.json();
                const sortedData = data.sort((a, b) => a.name.common.localeCompare(b.name.common));

                sortedData.forEach(element => {
                    if (element.idd && element.idd.root && element.idd.suffixes && element.idd.suffixes.length > 0) {
                        const option = document.createElement('option');
                        option.value = element.name.common;
                        option.text = element.name.common;
                        option.setAttribute('data-code', element.idd.root + (element.idd.suffixes[0] || '') + ' ');

                        // Set selected attribute if this is the user's country
                        if (element.name.common === userCountry) {
                            option.selected = true;
                        }

                        country.add(option);
                    }
                });

                // If user country wasn't found in API results, add it manually
                if (userCountry && ![...country.options].some(opt => opt.value === userCountry)) {
                    const option = document.createElement('option');
                    option.value = userCountry;
                    option.text = userCountry;
                    option.selected = true;
                    country.add(option);
                }

                country.addEventListener('change', function () {
                    const selectedOption = this.options[this.selectedIndex];
                    const phoneCode = selectedOption.getAttribute('data-code');
                    if (phoneCode) {
                        contactNumber.value = phoneCode;
                        contactNumber.focus();
                    }
                });
            } else {
                throw new Error('Error fetching countries');
            }
        } catch (error) {
            console.error("Country fetch error:", error);
        }
    }

    return {
        init: function () {
            fetchCountry();
            $('#btnSave').on('click', function (e) {
                e.preventDefault();
                const user = getSaveObj();
                saveUserProfile(user);
            });
        }
    }
}

const userProfile = new UserProfileController();
userProfile.init();