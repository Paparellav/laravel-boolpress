@extends('layouts.dashboard')

@section('content')
    <h3 class="mt-2"> Ciao {{ $user->name }}, hai effettuato l'accesso correttamente. </h3>
    <p class="my-3">Indirizzo: {{ $userDetails->address }}</p>
    <p>Numero telefono: {{ $userDetails->phone_number }}</p>
@endsection
