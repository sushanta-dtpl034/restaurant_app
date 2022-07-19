/**
 * Client side form validation
 */
function validateForm(formIdSelector, params) {
    $(`#${formIdSelector}`).validate({
        errorClass: 'invalid-input text-danger',
        errorElement: 'div',
        highlight: function (element, errorClass, validClass) {
            $(element).closest('form').addClass('was-validated');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).closest('form').removeClass('was-validated');
        },
        rules: params.validationRules,
        messages: params.validationMessage,
        submitHandler: function (form) {
            submitform();
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.parent());
        }
    });
    function submitform() {
        let frm = $(`#${formIdSelector}`);
        let formData = new FormData(frm[0]);
        //formData.append('file', $('input[type=file]')[0].files[0]);
        $.ajax({
            data: formData,
            url: routesstore,
            type: "POST",
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (data) {
                if ($.isEmptyObject(data.error)) {
                    frm.trigger("reset");
                    $('#record_form').modal('hide');
                    $(".print-error-msg").find("ul").html('');
                    //table.draw();
                    Swal.fire(
                        'Success!',
                        data.success,
                        'success'
                    )
                    setInterval(() => window.location.reload(), 2000);
                } else {
                    printErrorMsg(data.error);
                }

            },
            error: function (jqXHR, reason, ex) {
                //console.log(jqXHR.responseText.errors.name[0]);
                $('#saveBtn').html('Save Changes');
            }
        });
    }

}




/**
 * 
 *common ajax file fetching data by id
 */
const getDataById = async (id, functionName) => {
    try {
        var res;
        await $.ajax({
            url: functionName,
            method: 'GET',
            cache: false,
            data: {
                id: id,
            },
            success: function (dataJson) {
                res = dataJson;
            },
            error: function (jqXHR) {
                //console.log(jqXHR.responseText);
            }
        });
        return res;
    } catch (err) {
        //console.log(err);
    }
}

/**
 * Set Edit Modal data
 */

const setEditModalData = (modalTitle, recordId) => {
    $('#modelHeading').html(modalTitle);
    $('#saveBtn').text('Update');
    $('#record_form').modal('show');
    $('#record_id').val(recordId);
}
/**
 * Error Message Showing
 */
const printErrorMsg = (msg) => {
    $("#showsuccess").html('');
    $("#showsuccess").css('display', 'block');
    $("#showsuccess").html('<div class="alert alert-danger"><ul></ul></div>');
    $.each(msg, function (key, value) {
        $("#showsuccess").find("ul").append('<li>' + value + '</li>');
    });

}

export { validateForm, getDataById, setEditModalData, printErrorMsg }