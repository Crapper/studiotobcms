$( document ).ready(function() {
    var base_url = location.protocol + '//' + location.host;
    $("#create-content-blok").click(function(e) {
        e.preventDefault();

        var text_title = $("input[name='text_title']").val();
        var text_body = $(".createmodal textarea[name='text_body']").val();
        var _token = $("input[name='_token']").val();

        var kolomnummer = $("#tekstcontentblokmodal").data("kolomnummer");
        var sectieid = $("#tekstcontentblokmodal").data("sectieid");


        var data = $('#cke_text_body iframe').contents().find('body').html();
        CKEDITOR.instances.text_body.editable().setHtml( data );
        var content = CKEDITOR.instances.text_body.getData();

        $('.modal').modal('hide');

        $.ajax({
            type: "POST",
            url: base_url + "/nl/backend/contentblocktext/contentblocktexts",
            data: {
                '_token': _token,
                text_title:text_title,
                text_body:content,
                row_id:sectieid,
                col_number:kolomnummer,
                page_id:1
    },
        success: function(data, textStatus, jqXHR) {


        }
    });

        var url = window.location.href;
        window.location.replace(url);
    });
});
