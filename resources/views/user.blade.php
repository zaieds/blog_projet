@extends('layouts/main')
@section('titre')
    Users
@endsection
@section('content')
    <form method="POST" action="{!! url('user') !!}" accept-charset="UTF-8">
        {!! csrf_field() !!}
        <label for="nom">Entrez votre nom : </label>
        <input name="nom" type="text" id="nom">
        <input type="submit" value="Envoyer !">
    </form>
@endsection
