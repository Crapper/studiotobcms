$( document ).ready(function() {

    $(document).on("click", ".create-contentimageblok-btn", function () {

        var kolomnummer = $("#kiesContentBlokModal").data('kolomnummer');
        var sectieid = $("#kiesContentBlokModal").data('sectieid');
        var page_id = $("#kiesContentBlokModal").data('page_id');
        $("#afbeeldings_titel").val("");
        $("#image_text_body").val("");


        $(".modal-body #create-image-blok").attr("data-kolomnummer", kolomnummer );
        $(".modal-body #create-image-blok").attr("data-sectieid", sectieid );
        $(".modal-body #create-image-blok").attr("data-page_id", page_id );

        $('#ContentImageBlokModal').modal('show');
    });

    $("#create-image-blok").click(function(e) {
        e.preventDefault();

        var _token = $("input[name='_token']").val();

        var kolomnummer = $("#create-image-blok").data("kolomnummer");
        var sectieid = $("#create-image-blok").data("sectieid");
        var page_id = $("#create-image-blok").data("page_id");
        var afbeeldings_titel = $("#afbeeldings_titel").val();
        var text_body = $("#image_text_body").val();
        var button_label = $("#button_label").val();
        var button_link = $("#button_link").val();

        var imageable_id = $(".jsThumbnailImageWrapper figure").data("id");
        var img_path = $(".jsThumbnailImageWrapper figure").data("img_path");

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

        if(!img_path)
        {
            alert('Voeg eerst een afbeelding toe');
        }
        else {

            $.ajax({
                type: "POST",
                url: "http://webmaster.dev/nl/backend/contentblockimage/contentblockimages",
                data: {
                    '_token': _token,
                    media__imageables_id: imageable_id,
                    img_path: img_path,
                    row_id: sectieid,
                    col_number: kolomnummer,
                    page_id:page_id,
                    afbeeldings_titel:afbeeldings_titel,
                    text_body:text_body,
                    standaard:standaard,
                    overlay:overlay,
                    button_label:button_label,
                    button_link:button_link

        },
            success: function (data, textStatus, jqXHR) {


            }
        });
            var url = window.location.href;
            window.location.replace(url);
        }


    });
});
