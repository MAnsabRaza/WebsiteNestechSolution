let DealerController = function () {
    const saveDealer = function (formData) {
        $.ajax({
            type: 'POST',
            url: '/api/saveDealer',
            data: formData,
            dataType: 'JSON',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    Toastify({
                        text: response.message,
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        backgroundColor: "#4caf50",
                    }).showToast();
                    resetField();
                    window.location.href = '/dealer';
                }
            },
            error: function (error) {
                Toastify({
                    text: error.responseJSON.message,
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "center",
                    stopOnFocus: true,
                    backgroundColor: "#f44336",
                }).showToast();
            }
        });
    }
    const getSaveObj = function () {
        const formData = new FormData();
        formData.append('current_date', $('#current_date').val());
        formData.append('voucher_type', $('#voucher_type').val());
        if ($('#voucher_type').val() === 'edit') {
            formData.append('id', $('#gallery_id').val());
        }
        formData.append('dealer_name', $('#dealer_name').val());
        formData.append('dealer_email', $('#dealer_email').val());
        formData.append('dealer_phone', $('#dealer_phone').val());
        formData.append('dealer_city', $('#dealer_city').val());
        formData.append('status', $('#status').is(':checked') ? 1 : 0);
        formData.append('dealer_country', $('#dealer_country').val());
        formData.append('dealer_area', $('#dealer_area').val());
        formData.append('dealer_office_address', $('#dealer_office_address').val());
        // Handle file upload
        const fileInput = $('#dealer_image')[0];
        if (fileInput.files.length > 0) {
            formData.append('dealer_image', fileInput.files[0]);
        }

        return formData;
    }
    const resetField = function () {
        $('#dealer_name').val('');
        $('#dealer_email').val('');
        $('#dealer_phone').val('');
        $('#dealer_city').val('');
        $('#dealer_country').val('');
        $('#dealer_area').val('');
        $('#dealer_office_address').val('');
        $('#dealer_image').val('');
        $('#status').prop('checked', false);
    };

    return {
        init: function () {
            $('#btnSave').on('click', function (e) {
                e.preventDefault();
                const dealer = getSaveObj();
                saveDealer(dealer);
            });
        }
    }
}
const dealer = new DealerController();
dealer.init();