
{!! Theme::style('css/home.css') !!}
<style>

    .content-blok{

        height: auto;

        overflow: hidden;
    }

    .content-blok:not(:last-child){

        border-right: 2px dashed #ccc;

    }
    .striped-background{
        background: repeating-linear-gradient(
                -45deg,
                #222,
                #222 10px,
                #333 10px,
                #333 20px
        );
    }
    .button-container{
        text-align: center;
        padding-top: 10px;
    }
    .modal-wide .modal-dialog {
        width: 80%; /* or whatever you wish */


    }
    .verwijderContentBlockButton,.verwijderSectieButton,.verwijderImageBlockButton{
         margin-top: -20px;
         font-size: 16px;
         color: red;
     }
    .bewerkContentBlockModal,.bewerkImageBlockModal{
        margin-top: -19px;
        font-size: 16px;
        padding-right:10px
    }
    .sectiebtn{
        text-align: center;
        padding:5px;
    }
    .panel-title{
        font-size: 14px;
    }
    .knoppen-balk a:hover{
        cursor: pointer;
    }
    .modal .modal-body {
        max-height: 520px;
        overflow-y: auto;
    }

</style>

<link type="text/css" href="//code.jquery.com/ui/1.10.3/themes/ui-lightness/jquery-ui.css" />
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-3">
                <h3 class="panel-title">Pagina Secties</h3>
                    </div>
                    <div class="col-sm-9">

                    </div>
                    </div>
            </div>
            <div class="panel-body" id="draggable-row">  {{--HoofdPanel--}}


                            @foreach($sections as $section)
                    <div class="panel panel-default" >

                        <div class="panel-heading">
                            <h3 class="panel-title">Sectie Row</h3>
                            <a class="pull-right verwijderSectieButton" data-toggle="modal" data-target="#verwijderSectieModal" id="verwijderSectieButton" data-id="{{$section->id}}" data-pageid="{{$pageExtention->page_id}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </div>
                        <div class="panel-body striped-background contain-wrap" id="sortable"> <!-- RowPanel -->
                                @for ($i = 1; $i < $section->aantal_kolomen + 1; $i++)
                                    <div class="col-sm-{{$section->col}} content-blok" >

                                            <div  class="draggable ui-widget-content">
                                                @include('pageextention::admin.fields.contentpartials.contentblokken.tekstblok')
                                                    @include('pageextention::admin.fields.contentpartials.contentblokken.afbeeldingsblok')
                                            </div>

                                        <div class="button-container">
                                        <a class="btn btn-primary " data-toggle="modal" id="kies-button" data-page_id="{{$pageExtention->page_id}}" data-kolomnummer="{{$i}}" data-sectieid="{{$section->id}}">ContentBlok Toevoegen</a>
                                        </div>
                                    </div>
                                @endfor
                        </div>

                    </div> <!-- Einde RowPanel -->
                            @endforeach
                <div class="row sectiebtn">
                    <a class="btn btn-primary" data-toggle="modal" id="nieuweSectieBtn" data-page_id="{{$pageExtention->page_id}}"><i class="fa fa-plus"></i> Nieuwe Sectie</a>
                </div>


            </div> {{--einde HoofdPanel--}}
        </div>



@include('pageextention::admin.fields.contentpartials.includes')



<script>
    $( document ).ready(function() {
        $('.content-blok-display img').addClass("img-responsive");
    });
</script>



<script>
    $(function() {

        $("#sortable").sortable();
        $("#sortable").disableSelection();


    });
</script>

<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>