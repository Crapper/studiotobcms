<div class="box-body">
    <p>
        {!! Form::normalInput('name', 'Menu Naam', $errors, $menulist) !!}
        {!! Form::normalTextarea('description', 'Menu Omschrijving', $errors, $menulist) !!}

    <table class="table table-responsive">
        <th>Menu item Naam</th>
        <th>Menu omschrijving</th>
        <th>Menu prijs</th>
        @foreach($menulists as $menuitem)
            <tr>
            <td>{{$menuitem->naam}}</td>
                <td>{{$menuitem->omschrijving}}</td>
                <td>{{$menuitem->prijs}}</td>
            </tr>
        @endforeach
    </table>
    </p>
</div>
