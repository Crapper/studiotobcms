<div class="modal fade" id="ContentImageBlokModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    Afbeelding Toevoegen
                </h4>
            </div>
            <div class="modal-body createmodal">
                <div class='form-group'>
                    <label for="title">Titel:</label>
                    <input type="text" id="afbeeldings_titel" name="afbeeldings_titel" class="form-control" placeholder="Voeg eventueel een titel toe">
                </div>
                <div class='form-group'>
                    <label for="title">Tekst:</label>
                    <textarea type="text" id="image_text_body" name="text_body" class="form-control" placeholder="Voeg eventueel een korte omschrijving"></textarea>
                </div>
                <div class='form-group'>

                    <label for="standaard">
                        <input id="standaard"
                               name="standaard"
                               type="checkbox"
                               class="flat-blue"

                               value="1" />
                        Standaard afbeelding?
                    </label>
                </div>
                <div class='form-group'>

                    <label for="overlay">
                        <input id="overlay"
                               name="overlay"
                               type="checkbox"
                               class="flat-blue"

                               value="1" />
                        Gebruik overlay over afbeelding?
                    </label>
                </div>
                <div class='form-group '>

                    @include('media::admin.fields.file-link', [
                    'entityClass' => 'Modules\\\\PageExtention\\\\Entities\\\\PageExtention',
                    'entityId' => 1,
                    'zone' => 'contentimage'
                    ])


                </div>

                <div class='form-group'>
                    <label for="title">Button Label:</label>
                    <input type="text" id="button_label" name="button_label" class="form-control" placeholder="Voeg eventueel een Button label toe">
                </div>
                <div class='form-group'>
                    <label for="title">Button Link:</label>
                    <input type="text" id="button_link" name="button_link" class="form-control" placeholder="Voeg eventueel een Button Link toe">
                </div>

                <button  id="create-image-blok" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>

            </div>
        </div>
    </div>
</div>