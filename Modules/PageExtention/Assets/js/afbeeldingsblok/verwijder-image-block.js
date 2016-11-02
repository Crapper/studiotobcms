$( document ).ready(function() {
    $(document).on("click", "#verwijderImageBlockButton", function () {

        var id = $(this).data('id');
        $(".modal-body #verwijderImageBlockBevestigd").attr("data-id", id );

        var _token = $("input[name='_token']").val();
        var valueData = $(this).data();
        console.log(valueData.id);
        $('#verwijderImageBlockBevestigd').attr('data-id', valueData.id);
        $('#verwijderImageBlockModal').modal('show');

    });

    $("#verwijderImageBlockBevestigd").click(function(e) {
        e.preventDefault();

        var _token = $("input[name='_token']").val();
        var id = $(".modal-body #verwijderImageBlockBevestigd").data("id");

        $.ajax({
            type: "delete",
            url: "http://webmaster.dev/nl/backend/contentblockimage/contentblockimages/" + id,
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
