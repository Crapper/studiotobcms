@foreach($contentBlok as $content)
    @if($content->row_id == $section->id)
        @if($content->col_number == $i)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">ContentBlok</h3>

                    <a class="pull-right verwijderContentBlockButton" data-toggle="modal" data-target="#verwijderContentBlockModal" id="verwijderContentBlockButton" data-id="{{$content->id}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    <a class="pull-right bewerkContentBlockModal" data-toggle="modal" data-id="{{$content->id}}" data-pageid="{{$pageExtention->page_id}}" data-title="{{$content->text_title}}" data-body="{{$content->text_body}}" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                </div>
                <div class="panel-body content-blok-display">
                    <h2>{!! $content->text_title !!}</h2>
                    {!! $content->text_body !!}
                </div>
            </div>


        @endif
    @endif
@endforeach