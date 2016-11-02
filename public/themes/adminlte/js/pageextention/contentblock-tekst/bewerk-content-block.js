$(document).ready(function () {
    $(document).on("click", ".bewerkContentBlockModal", function () {
        var id = $(this).data('id');
        var title = $(this).data('title');
        var body = $(this).data('body');
        var page_id = $(this).data('page_id');

        $(".modal-body #text_title").val( title );
        $(".modal-body #edit-tekst-content-blok").attr("data-id", id );
        $(".modal-body #edit-tekst-content-blok").attr("data-page_id", page_id );

        CKEDITOR.instances.text_body.editable().setHtml( body );

        $('#bewerkContentBlockModal').modal('show');
    });

    $("#edit-tekst-content-blok").click(function(e) {
        e.preventDefault();

        var id = $(".modal-body #edit-tekst-content-blok").data("id");

        var text_title = $(".edit-textblok input[id='text_title']").val();

        var page_id = $(".modal-body #edit-tekst-content-blok").data("page_id");

        var _token = $("input[name='_token']").val();


        var content = CKEDITOR.instances.text_body.getData();
        console.log(content);
        $('.modal').modal('hide');

        $.ajax({
            type: "PUT",
            url: "http://webmaster.dev/nl/backend/contentblocktext/contentblocktexts/" + id + "/edit",
            data: {
                '_token': _token,
                text_title:text_title,
                text_body:content,
                page_id:page_id
                },
            success: function(data, textStatus, jqXHR) {


            }
        });

        var url = window.location.href;
        window.location.replace(url);
    });
});


