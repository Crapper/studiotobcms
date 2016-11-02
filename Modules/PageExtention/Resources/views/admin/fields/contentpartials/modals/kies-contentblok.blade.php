<style>
    #tekstcontentblokmodal, #contentimageblokmodal, #contentcarouselblokmodal:hover{
       cursor: pointer;
    }
</style>

<div class="modal fade modal-wide" id="kiesContentBlokModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    Kies een Type ContentBlok
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="panel panel-default create-contentblok-btn" id="tekstcontentblokmodal">
                            <div class="panel-heading">
                                <h3 class="panel-title">TextBlok</h3>
                            </div>
                            <div class="panel-body">
                                Maak een Text blok
                            </div>
                        </div>
                    </div>
                <div class="col-sm-4">
                    <div class="panel panel-default create-contentimageblok-btn" id="contentimageblokmodal">
                        <div class="panel-heading">
                            <h3 class="panel-title">Afbeelding Blok</h3>
                        </div>
                        <div class="panel-body">
                            Maak een Afbeeldings blok

                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="panel panel-default create-contentcarouselblok-btn" id="contentcarouselblokmodal">
                        <div class="panel-heading">
                            <h3 class="panel-title">Carousel Blok</h3>
                        </div>
                        <div class="panel-body">
                            Maak een Carousel blok

                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $(document).on("click", ".create-contentblok-btn", function () {
            $('.modal').modal('hide');
        });
        $(document).on("click", ".create-contentimageblok-btn", function () {
            $('.modal').modal('hide');
        });
        $(document).on("click", ".create-contentcarouselblok-btn", function () {
            $('.modal').modal('hide');
        });

    });

</script>