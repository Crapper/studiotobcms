$( document ).ready(function() {

    $(document).on("click", "#contentcarouselblokmodal", function () {

        var kolomnummer = $("#kiesContentBlokModal").data('kolomnummer');
        var sectieid = $("#kiesContentBlokModal").data('sectieid');
        var page_id = $("#kiesContentBlokModal").data('page_id');
        $("#afbeeldings_titel").val("");
        $("#image_text_body").val("");
    console.log('tres');

        $(".modal-body #create-image-blok").attr("data-kolomnummer", kolomnummer);
        $(".modal-body #create-image-blok").attr("data-sectieid", sectieid);
        $(".modal-body #create-image-blok").attr("data-page_id", page_id);

        $('#ContentCarouselBlokModal').modal('show');
    });

});
