<div class="modal fade modal-wide" id="bewerkContentBlockModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    TextBlock Toevoegen
                </h4>
            </div>
            <div class="modal-body">


                <div class='form-group edit-textblok'>
                    {!! Form:: normalInput('text_title' , 'Titel', $errors) !!}
                    {!! Form:: normalTextarea('text_body' , 'Body', $errors) !!}
                </div>

                <button  id="edit-tekst-content-blok"  class="btn btn-primary btn-flat">{{ trans('core::core.button.update') }}</button>

            </div>
        </div>
    </div>
</div>