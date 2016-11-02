$( document ).ready(function() {

    $(".contentblok").click(function() {
        var valueData = $(this).data();
        console.log(valueData.kolomnummer);
        console.log(valueData.sectieid);

        $("input[id='col_number']").remove();
        $("input[id='row_id']").remove();

        $('<input>').attr({
            type: 'hidden',
            id: 'col_number',
            name: 'bar',
            value:valueData.kolomnummer
        }).appendTo('form');

        $('<input>').attr({
            type: 'hidden',
            id: 'row_id',
            name: 'bar',
            value:valueData.sectieid
        }).appendTo('form');
    });

    $("#nieuweSectieBtn").click(function(e) {
        e.preventDefault();
        var page_id = $(this).data("page_id");
        $(".modal-body #update").attr("data-page_id", page_id );

        $('#nieuweSectieModal').modal('show');
    });

    $("#update").click(function(e) {
        e.preventDefault();


        var checkedValue = $("input[name='aantal_kolomen']:checked").val();
        var _token = $("input[name='_token']").val();

        var page_id = $(".modal-body #update").data("page_id");
        $('.modal').modal('hide');
        if(checkedValue == 1)
        {col = 12;}
        if(checkedValue == 2)
        { col = 6;}
        if(checkedValue == 3)
        { col = 4;}
        if(checkedValue == 4)
        { col = 3;}
        console.log(col);

        $.ajax({
            type: "POST",
            url: "http://webmaster.dev/nl/backend/section/sections",
            data: {
                '_token': _token,
                page_id:page_id,
        aantal_kolomen:checkedValue,
            col:col
    },
        success: function(data, textStatus, jqXHR) {
            window.location.reload();
        }
    });
        window.location.reload();
    });


    $(document).on("click", "#verwijderSectieButton", function () {

        var id = $(this).data('id');
        var pageid = $(this).data('pageid');
        $(".modal-body #verwijderSectieBevestigd").attr("data-id", id );
        $(".modal-body #verwijderSectieBevestigd").attr("data-pageid", pageid );
        var _token = $("input[name='_token']").val();
        var valueData = $(this).data();
        console.log(valueData.id);
        $('#verwijderSectieBevestigd').attr('data-id', valueData.id);
        $('#verwijderSectieBlockModal').modal('show');

    });

    $("#verwijderSectieBevestigd").click(function(e) {
        e.preventDefault();

        var _token = $("input[name='_token']").val();
        var id = $(".modal-body #verwijderSectieBevestigd").data("id");
        var pageid = $(".modal-body #verwijderSectieBevestigd").data("pageid");
        console.log(id);
        $.ajax({
            type: "delete",
            url: "http://webmaster.dev/nl/backend/section/sections/" + id,
            data: {
                '_token': _token,
                'page_id': pageid
            },
            success: function(data, textStatus, jqXHR) {


            }
        });
        $('.modal').modal('hide');
        window.location.reload();
    });
});

