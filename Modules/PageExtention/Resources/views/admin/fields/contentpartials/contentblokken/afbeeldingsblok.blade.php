@foreach($contentBlokImage as $image)

    @if($image->row_id == $section->id)
        @if($image->col_number == $i)
            <div class="panel panel-default">
                <div class="panel-heading">

                    <h3 class="panel-title">AfbeeldingsBlok</h3>

                    <a class="pull-right verwijderImageBlockButton" data-toggle="modal" data-target="#verwijderImageBlockModal" id="verwijderImageBlockButton" data-id="{{$image->id}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    <a class="pull-right bewerkImageBlockModal" id="bewerkImageBlockModal" data-toggle="modal" data-target="#bewerkImageBlockModal"
                       data-id="{{$image->id}}"
                       data-page_id="{{$pageExtention->page_id}}"
                       data-img_path="{{$image->img_path}}"
                       data-afbeeldings_titel="{{$image->afbeeldings_titel}}"
                       data-image_text_body="{{$image->text_body}}"
                       data-button_label="{{$image->button_label}}"
                       data-button_link="{{$image->button_link}}"
                       data-standaard="{{$image->standaard}}"
                       data-overlay="{{$image->overlay}}">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>


                </div>
                <div class="panel-body content-blok-display">
                    <div class="@if($image->standaard === 1)standaard @else grow pic @endif">

                        @if($image->button_link)<a href="{{$image->button_link}}"><img src="{{$image->img_path}}" alt="{{$image->title}}"></a>
                        @else
                            <img src="{{$image->img_path}}" @if($image->standaard === 1) class="img-responsive" @endif>
                        @endif
                    </div>
                    @if($image->overlay === 1)
                        <div class="content-blok-special-image" >
                            @if($image->afbeeldings_titel)<div class="afbeelding-titel"><h2>{{$image->afbeeldings_titel}}</h2></div>@endif
                            @if($image->text_body)<div class="afbeelding-tekst">{{$image->text_body}}</div>@endif
                            @if($image->button_label && $image->button_link)<div class="afbeelding-button"><a href="{{$image->button_link}}" class="btn btn-primary">{{$image->button_label}}</a></div>@endif
                        </div>
                    @else
                        <div class="content-blok-special-image" >
                            @if($image->afbeeldings_titel)<div class="standaard-afbeelding-titel"><h2>{{$image->afbeeldings_titel}}</h2></div>@endif
                            @if($image->text_body)<div class="standaard-afbeelding-tekst">{{$image->text_body}}</div>@endif
                            @if($image->button_label && $image->button_link)<div class="standaard-afbeelding-button"><a href="{{$image->button_link}}" class="btn btn-primary">{{$image->button_label}}</a></div>@endif
                        </div>
                    @endif
                </div>
            </div>
        @endif
    @endif
@endforeach