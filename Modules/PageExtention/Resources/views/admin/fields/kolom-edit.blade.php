
{{--<a data-toggle="modal" data-target="#nieuweSectieModal"><i class="fa fa-plus"></i>Nieuwe Sectie</a>--}}

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

                {!! Form::normalInput('full_page', 'Volledige Pagina', $errors, $test->full_page) !!}
                {!! Form::normalInput('naam', 'Naam', $errors, $test->name) !!}
                {{$test}}
                <button  id="update" class="btn btn-primary btn-flat">{{ trans('core::core.button.update') }}</button>

            </div>
        </div>
    </div>
</div>

<script>
    $( document ).ready(function() {
        $("#update").click(function(e) {
            e.preventDefault();
            var full_page = $("#full_page").val();
            var naam = $("#naam").val();
            var _token = $("input[name='_token']").val();
            console.log(full_page + " ready! " + naam + " " + _token);


            $.ajax({
                type: "PUT",
                url: "http://webmaster.dev/nl/backend/carousel/carousels/"+ {{ $test->id }} +"/edit",
                data: {
                        '_token': _token,
                        name:naam,
                        full_page:full_page
                },
                success: function(data, textStatus, jqXHR) {
                    alert('everything was OK');
                }
            });
        });
    });
</script>