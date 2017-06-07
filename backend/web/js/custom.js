//CROPPER
var url = window.location.href;
var id;
if(url.indexOf('/deck') != -1){
    id = 'deck';
}else if(url.indexOf('/post') != -1){
    id = 'post';
}else{
    id = false;
}

if(id) {
    var previewCropper;
    var detailCropper;
    $('#'+id+'-preview_picture').change(function () {
        var preview = document.getElementById('crop_result_preview');
        var input = document.getElementById(id+'-preview_picture');
        var file = input.files[0];
        var reader = new FileReader();


        reader.addEventListener("load", function () {

            preview.src = reader.result;
            previewCropper = new Cropper(preview, {
                aspectRatio: 2.5 / 2,
                viewMode: 1,
                crop: function (e) {

                }
            })
        }, false);

        if (file) {
            reader.readAsDataURL(file);
            showModal('previewModal');
        }
    });

    $('#'+id+'-detail_picture').change(function () {
        var preview = document.getElementById('crop_result_detail');
        var input = document.getElementById(id+'-detail_picture');
        var file = input.files[0];
        var reader = new FileReader();


        reader.addEventListener("load", function () {

            var ratio;
            if (url.indexOf('/deck') != -1) {
                ratio = 8 / 2.5
            } else {
                ratio = 11.7 / 5
            }

            preview.src = reader.result;
            detailCropper = new Cropper(preview, {
                aspectRatio: ratio,
                viewMode: 1,
                crop: function (e) {

                }
            })
        }, false);

        if (file) {
            reader.readAsDataURL(file);
            showModal('detailModal');
        }
    });

    function getPreviewResults() {
        var src = previewCropper.getCroppedCanvas().toDataURL('image/jpeg');
        $('#preview_crop').attr('src', src).show();
        $('input[name="p_crop"]').val(src);
        hideModal('previewModal');
        previewCropper.destroy();
    }

    function getDetailResults() {
        var src = detailCropper.getCroppedCanvas().toDataURL('image/jpeg');
        $('#detail_crop').attr('src', src).show();
        $('input[name="d_crop"]').val(src);
        hideModal('detailModal');
        detailCropper.destroy();
    }

    $(document).on('click', '.close-preview', function () {
        hideModal('previewModal');
        previewCropper.destroy();
    });
    $(document).on('click', '.close-detail', function () {
        hideModal('detailModal');
        detailCropper.destroy();
    });
    function showModal($id) {
        $('body').append("<div class='modal-backdrop fade in'></div>");
        $('body').addClass('modal-open');
        $('#' + $id).addClass('in').css('display', 'block');
    }

    function hideModal($id) {
        $('.modal-backdrop').remove();
        $('body').removeClass('modal-open');
        $('#' + $id).removeClass('in').css('display', 'none');
    }
}
//CROPPER END