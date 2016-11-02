$( document ).ready(function() {
    $(document).on("click", "#verwijderContentBlockButton", function () {

        var id = $(this).data('id');
        $(".modal-body #verwijderContentBlockBevestigd").attr("data-id", id );

        var _token = $("input[name='_token']").val();
        var valueData = $(this).data();
        console.log(valueData.id);
        $('#verwijderContentBlockBevestigd').attr('data-id', valueData.id);
        $('#verwijderContentBlockModal').modal('show');

    });

    $("#verwijderContentBlockBevestigd").click(function(e) {
        e.preventDefault();

        var _token = $("input[name='_token']").val();
        var id = $(".modal-body #verwijderContentBlockBevestigd").data("id");

        $.ajax({
            type: "delete",
            url: "http://webmaster.dev/nl/backend/contentblocktext/contentblocktexts/" + id,
            data: {
                '_token': _token,
            },
            success: function(data, textStatus, jqXHR) {


            }
        });
        $('.modal').modal('hide');
        window.location.reload();
    });

});
