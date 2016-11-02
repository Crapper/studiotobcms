<div class="box-body">
    <p>
        {!! Form::normalInput('name', 'Carousel Naam', $errors, $carousel) !!}
        {!! Form:: normalCheckbox('full_page', 'Volledige Pagina?', $errors, $carousel) !!}

        @include('media::admin.fields.file-link-multiple', [
    'entityClass' => 'Modules\\\\Carousel\\\\Entities\\\\Carousel',
    'entityId' => $carousel->id,
    'zone' => 'main_carousel'
])
    </p>
</div>
