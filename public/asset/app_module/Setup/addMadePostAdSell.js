const MadePostAdSellController = function () {
    $('#postAd_residential_type').parent().hide();
    $('#postAd_commercial_type').parent().hide();
    $('#postAd_storey').parent().parent().hide();
    $('#postAd_direction').parent().parent().hide();
    $('#postAd_building_structure').parent().parent().hide();

    // Type selection change handler
    $('#postAd_type').change(function () {
        var selectedType = $(this).val();

        if (selectedType === 'residential') {
            $('#postAd_residential_type').parent().show();
            $('#postAd_commercial_type').parent().hide();
            $('#postAd_direction').parent().parent().removeClass('col-8').addClass('col-8');
            $('#postAd_building_structure').parent().parent().removeClass('col-8').addClass('col-8');
            $('#postAd_storey').parent().parent().show();

        } else if (selectedType === 'commercial') {
            $('#postAd_residential_type').parent().hide();
            $('#postAd_commercial_type').parent().show();
            $('#postAd_storey').parent().parent().hide();
            $('#postAd_direction').parent().parent().removeClass('col-8').addClass('col-8');
            $('#postAd_building_structure').parent().parent().removeClass('col-8').addClass('col-8');
        }
    });

    // Residential type change handler
    $('#postAd_residential_type').change(function () {
        if ($(this).val()) {
            $('#postAd_storey').parent().parent().show();
            $('#postAd_direction').parent().parent().show();
            $('#postAd_building_structure').parent().parent().show();
        }
    });

    // Commercial type change handler
    $('#postAd_commercial_type').change(function () {
        if ($(this).val()) {
            $('#postAd_direction').parent().parent().show();
            $('#postAd_building_structure').parent().parent().show();
        }
    });
    const resetField = function () {
        $('#postAd_manage_by').val('');
        $('#postAd_for').val('');
        $('#status').prop('checked', false);
        $('#postAd_owner_name').val('');
        $('#postAd_contact_number').val('');
        $('#category_id').val('');
        $('#postAd_type').val('');
        $('#postAd_residential_type').val('');
        $('#postAd_commercial_type').val('');
        $('#postAd_storey').val('');
        $('#postAd_direction').val('');
        $('#postAd_building_structure').val('');
        $('#postAd_address').val('');
        $('#postAd_price').val('');
        $('#postAd_advance_payment').val('');
        $('#postAd_city').val('');
        $('#postAd_description').val('');
        // Clear image previews
        $('#image-previews').empty();
    }

    const savePost = function (formData) {
        if (!validateSave()) {
            return;
        }
        $.ajax({
            type: 'POST',
            url: '/savePost',
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
                    window.location.href = '/';
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
        if ($('#voucher_type').val() === 'edit') {
            formData.append('id', $('#postAd_id').val());
            const deleteImages = [];
            $('.delete-image:checked').each(function () {
                deleteImages.push($(this).val());
            });
            if (deleteImages.length > 0) {
                formData.append('delete_images', deleteImages.join(','));
            }
        }

        formData.append('current_date', $('#current_date').val());
        formData.append('voucher_type', $('#voucher_type').val());
        formData.append('status', 0);
        formData.append('postAd_manage_by', $('#postAd_manage_by').val());
        formData.append('postAd_for', $('#postAd_for').val());
        formData.append('postAd_owner_name', $('#postAd_owner_name').val());
        formData.append('postAd_contact_number', $('#postAd_contact_number').val());
        formData.append('category_id', $('#category_id').val());
        // formData.append('user_id', $('#user_id').val());
        formData.append('postAd_type', $('#postAd_type').val());
        formData.append('postAd_residential_type', $('#postAd_residential_type').val());
        formData.append('postAd_commercial_type', $('#postAd_commercial_type').val());
        formData.append('postAd_storey', $('#postAd_storey').val());
        formData.append('postAd_direction', $('#postAd_direction').val());
        formData.append('postAd_building_structure', $('#postAd_building_structure').val());
        formData.append('postAd_address', $('#postAd_address').val());
        formData.append('postAd_price', $('#postAd_price').val());
        formData.append('advance_payment', $('#advance_payment').val());
        formData.append('postAd_society', $('#postAd_society').val());
        formData.append('postAd_city', $('#postAd_city').val());
        formData.append('postAd_description', $('#postAd_description').val());
        const fileInput = $('#postAd_images')[0];
        if (fileInput && fileInput.files.length > 0) {
            const maxFiles = 10;
            const filesToUpload = Math.min(fileInput.files.length, maxFiles);

            for (let i = 0; i < filesToUpload; i++) {
                formData.append('postAd_images[]', fileInput.files[i]);
            }

            if (fileInput.files.length > maxFiles) {
                Toastify({
                    text: `Only the first ${maxFiles} images will be uploaded.`,
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "center",
                    stopOnFocus: true,
                    backgroundColor: "#ff9800",
                }).showToast();
            }
        }
        console.log(formData);
        return formData;
    }
    const validateSave = function () {
        const fields = {
            'postAd_owner_name': document.getElementById('postAd_owner_name'),
            'postAd_contact_number': document.getElementById('postAd_contact_number'),
            'postAd_direction': document.getElementById('postAd_direction'),
            'postAd_building_structure': document.getElementById('postAd_building_structure'),
            'postAd_price': document.getElementById('postAd_price'),
            'postAd_address': document.getElementById('postAd_address'),
            'postAd_description': document.getElementById('postAd_description'),
            'category_id': document.getElementById('category_id'),
            'postAd_images': document.getElementById('postAd_images'),
            'postAd_city': document.getElementById('postAd_city'),
        };

        let isValid = true;

        // Reset all borders
        Object.values(fields).forEach(field => {
            field.style.border = '1px solid #ced4da';
        });

        // Check each field
        Object.values(fields).forEach(field => {
            if (!field.value.trim()) {
                field.style.border = '2px solid #dc3545';
                isValid = false;
            }
        });

        if (!isValid) {
            Toastify({
                text: "Please fill in all fields",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
                backgroundColor: "#f44336",
            }).showToast();
            return false;
        }

        return true;
    }
    const initImagePreviews = function () {
        $('#postAd_images').on('change', function () {
            const files = $(this)[0].files;
            const previewContainer = $('#image-previews');
            previewContainer.empty();
            const maxFiles = 10;
            const filesToShow = Math.min(files.length, maxFiles);
            if (files.length > maxFiles) {
                Toastify({
                    text: `You can only upload up to ${maxFiles} images. Only the first ${maxFiles} will be shown.`,
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "center",
                    stopOnFocus: true,
                    backgroundColor: "#ff9800",
                }).showToast();
            }

            for (let i = 0; i < filesToShow; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function (e) {
                    const preview = $(`
                    <div class="col-md-2 mb-2 preview-item" data-index="${i}">
                        <div class="image-preview-container position-relative">
                            <img src="${e.target.result}" class="img-thumbnail" style="height: 100px;">
                            <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 p-1">
                                <i class="fas fa-times"></i>
                            </button>
                            <span class="filename">${file.name}</span>
                        </div>
                    </div>
                `);

                    previewContainer.append(preview);
                }
                reader.readAsDataURL(file);
            }
        });

        // Handle image removal from preview
        $(document).on('click', '.image-preview-container button', function () {
            const $previewItem = $(this).closest('.preview-item');
            const index = $previewItem.data('index');

            // Remove the file from the input
            const input = $('#postAd_images')[0];
            const dt = new DataTransfer();
            const files = input.files;

            // Add all files except the removed one
            for (let i = 0; i < files.length; i++) {
                if (i !== index) dt.items.add(files[i]);
            }

            input.files = dt.files;

            // Remove the preview
            $previewItem.remove();

            // Update indices for remaining previews
            $('.preview-item').each(function (newIndex) {
                $(this).attr('data-index', newIndex);
            });
        });
    };

    return {
        init: function () {


            $('#btnSave').on('click', function (e) {
                e.preventDefault();
                const post = getSaveObj();
                savePost(post);
            });
            initImagePreviews();

            getMaxPostAdId();
        }
    }
}

const madePostAdSell = new MadePostAdSellController();
madePostAdSell.init();