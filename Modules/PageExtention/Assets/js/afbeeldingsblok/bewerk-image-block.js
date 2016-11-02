$(document).ready(function () {
    $(".close").click(function(e) {
        e.preventDefault();

        $('.modal-backdrop').remove();
        $('.modal').modal('hide');
    });
    $(document).on("click", ".bewerkImageBlockModal", function () {
        var id = $(this).data('id');
        var afbeeldings_titel = $(this).data('afbeeldings_titel');
        var image_text_body = $(this).data('image_text_body');
        var page_id = $(this).data('page_id');
        var img_path = $(this).data('img_path');
        var button_label = $(this).data('button_label');
        var button_link = $(this).data('button_link');
        var standaard = $(this).data('standaard');
        var overlay = $(this).data('overlay');

        if(standaard == 1) {
            $("label[for='standaard'] > .icheckbox_flat-blue").addClass('checked');
        }
        if(overlay == 1) {
            $("label[for='overlay'] > .icheckbox_flat-blue").addClass('checked');
        }

        $(".modal-body #edit-image-blok").attr('data-id', id );
        $(".modal-body #edit-image-blok").attr('data-page_id', page_id );


        $(".modal-body #afbeeldings_titel").val( afbeeldings_titel );
        $(".modal-body #image_text_body").val(image_text_body);
        $(".modal-body #button_label").val(button_label);
        $(".modal-body #button_link").val(button_link);

        $('#BewerkContentImageBlokModal').modal('show');
    });

    $("#edit-image-blok").click(function(e) {
        e.preventDefault();

        var _token = $("input[name='_token']").val();

        var standaard;
        var unckecked_standaard = $("input[name='standaard'][type='hidden']").val();
        if(unckecked_standaard == 0)
        {
             standaard = 0;
        }
        else{
            standaard = 1;
        }
        var overlay;
        var unckecked_overlay = $("input[name='overlay'][type='hidden']").val();
        if(unckecked_overlay == 0)
        {
            overlay = 0;
        }
        else{
            overlay = 1;
        }

        var id = $("#edit-image-blok").data("id");
        var page_id = $("#edit-image-blok").data("page_id");
        var afbeeldings_titel = $("#BewerkContentImageBlokModal input[id='afbeeldings_titel']").val();
        var text_body = $("#BewerkContentImageBlokModal textarea[id='image_text_body']").val();
        var button_label = $("#BewerkContentImageBlokModal input[id='button_label']").val();
        var button_link = $("#BewerkContentImageBlokModal input[id='button_link']").val();

        var imageable_id = $(".jsThumbnailImageWrapper figure").data("id");
        var img_path = $(".jsThumbnailImageWrapper figure").data("img_path");

        $.ajax({
            type: "PUT",
            url: "http://webmaster.dev/nl/backend/contentblockimage/contentblockimages/" + id + "/edit",
            data: {
                '_token': _token,
                media__imageables_id: imageable_id,
                img_path: img_path,
                page_id:page_id,
                afbeeldings_titel:afbeeldings_titel,
                text_body:text_body,
                standaard:standaard,
                overlay:overlay,
                button_label:button_label,
                button_link:button_link
            },
            success: function(data, textStatus, jqXHR) {


            }
        });

       var url = window.location.href;
        window.location.replace(url);
    });
});

