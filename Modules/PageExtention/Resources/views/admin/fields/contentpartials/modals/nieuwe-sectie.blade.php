
<div class="modal fade" id="nieuweSectieModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    Nieuwe Sectie Toevoegen
                </h4>
            </div>
            <div class="modal-body">

                <label for="aantal_kolomen">Kies hoeveel kolommen de Sectie moet hebben</label>
                <div class="form-group ">

                    <label class="radio-inline"><input type="radio" name="aantal_kolomen" id="aantal_kolomen" value="1">1 Kolom</label>
                    <label class="radio-inline"><input type="radio" name="aantal_kolomen" id="aantal_kolomen" value="2">2 Kolommen</label>
                    <label class="radio-inline"><input type="radio" name="aantal_kolomen" id="aantal_kolomen" value="3">3 Kolommen</label>
                    <label class="radio-inline"><input type="radio" name="aantal_kolomen" id="aantal_kolomen" value="4">4 Kolommen</label>
                </div>
                <button  id="update" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>

            </div>
        </div>
    </div>
</div>
