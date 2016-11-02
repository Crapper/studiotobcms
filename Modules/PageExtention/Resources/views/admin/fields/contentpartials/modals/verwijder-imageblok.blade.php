<div class="modal fade" id="verwijderImageBlockModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    Weet je zeker dat je dit Afbeeldingsblok wilt verwijderen ?
                </h4>
            </div>
            <div class="modal-body text-right">
                <button type="button" class="btn btn-default btn-flat" data-dismiss="modal" aria-label="Close">{{ trans('core::core.button.cancel') }}</button>
                <button  id="verwijderImageBlockBevestigd" class="btn btn-danger btn-flat">{{ trans('core::core.button.delete') }}</button>
            </div>
        </div>
    </div>
</div>