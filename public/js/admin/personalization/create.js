import { freeInputToken } from '../../common/util.js';
$(function () {
    $(document).ready(function () {

        inputImg.onchange = evt => {
            const [file] = inputImg.files
            if (file) {
                imgPreview.src = URL.createObjectURL(file)
            }
        }

        hideShowOptionsBlk($("#type").val());
        $('#type').on('change', function() {
            hideShowOptionsBlk($(this).val());
        });

        function hideShowOptionsBlk(otp) {
            let optBlk = $('#opt_blk');
            (otp.indexOf('Text') > -1)  ? optBlk.hide() : optBlk.show();
        }
        let params = { elementId: 'options', freeTokenUrl: freeTokenUrl, prePopulate: freeTokenValue, tokenLimit: 100, custHintText: 'Type field options' };
        freeInputToken(params);
    });
});