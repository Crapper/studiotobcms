<div class="modal fade modal-wide" id="ContentblokCreateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    TextBlock Toevoegen
                </h4>
            </div>
            <div class="modal-body createmodal">


                <div class='form-group '>
                    {!! Form:: normalInput('text_title' , 'Titel', $errors) !!}
                    {!! Form:: normalTextarea('text_body' , 'Body', $errors) !!}


                </div>

                <button  id="create-content-blok" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>

            </div>
        </div>
    </div>
</div>

