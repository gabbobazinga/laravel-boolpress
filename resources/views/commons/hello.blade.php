@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body text-center">
      @if (isset($user))
          <h1>Ciao {{ $user->name }}! </h1>
      @else
        <h1>Ciao Utente!</h1>
      @endif
    </div>
  </div>
@endsection