<div class="box-body">
    <p>
        {!! Form::normalInput('naam', 'Menu Naam', $errors) !!}
        {!! Form::normalTextarea('omschrijving', 'Menu Omschrijving', $errors) !!}
        {!! Form::normalInput('prijs', 'Prijs', $errors) !!}

    {!! Form::select('menulist_id', $menulist) !!}

    </div>
    </p>
</div>
