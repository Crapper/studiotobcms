$(document).ready(function () {
    $(document).on("click", "#kies-button", function () {

        var kolomnummer = $(this).data('kolomnummer');
        var sectieid = $(this).data('sectieid');
        var page_id = $(this).data('page_id');


        $("#kiesContentBlokModal").attr("data-kolomnummer", kolomnummer );
        $("#kiesContentBlokModal").attr("data-sectieid", sectieid );
        $("#kiesContentBlokModal").attr("data-page_id", page_id );

        $('#kiesContentBlokModal').modal('show');
    });
});