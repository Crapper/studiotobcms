$(document).ready(function () {
    $(document).on("click", ".create-contentblok-btn", function () {

        var kolomnummer = $("#kiesContentBlokModal").data('kolomnummer');
        var sectieid = $("#kiesContentBlokModal").data('sectieid');
        var page_id = $("#kiesContentBlokModal").data('page_id');

        $(".modal-body #create-content-blok").attr("data-kolomnummer", kolomnummer );
        $(".modal-body #create-content-blok").attr("data-sectieid", sectieid );
        $(".modal-body #create-content-blok").attr("data-page_id", page_id );

        $(".modal-body #text_title").val( '' );

        CKEDITOR.instances.text_body.editable().setHtml( '<p></p>' );

        $('#ContentblokCreateModal').modal('show');
    });


    $("#create-content-blok").click(function(e) {
        e.preventDefault();

        var text_title = $("input[name='text_title']").val();
        var text_body = $(".createmodal textarea[name='text_body']").val();
        var _token = $("input[name='_token']").val();

        var kolomnummer = $("#create-content-blok").data("kolomnummer");
        var sectieid = $("#create-content-blok").data("sectieid");
        var page_id = $("#create-content-blok").data("page_id");

        var data = $('#cke_text_body iframe').contents().find('body').html();
        CKEDITOR.instances.text_body.editable().setHtml( data );
        var content = CKEDITOR.instances.text_body.getData();

        $('.modal').modal('hide');

        $.ajax({
            type: "POST",
            url: "http://webmaster.dev/nl/backend/contentblocktext/contentblocktexts",
            data: {
                '_token': _token,
                text_title:text_title,
                text_body:content,
                row_id:sectieid,
                col_number:kolomnummer,
                page_id:page_id
    },
        success: function(data, textStatus, jqXHR) {


        }
    });

        var url = window.location.href;
        window.location.replace(url);
    });
});
