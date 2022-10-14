@extends('layouts.app')

@section('content')

<section>

  <div class="container">
    <h1>{{ $department->name}}</h1>
    <h3>{{ $department->head_of_department}}</h3>

  <div>
    <ul>
      <li>
        <span>Indirizzo:</span> {{ $department->address }}
      </li>
      <li>
        <span>Email:</span> {{ $department->email }}
      </li>
      <li>
        <span>Telefono:</span> {{ $department->phone }}
      </li>
      <li>
        <span>Sito web:</span> {{ $department->website }}
      </li>
    </ul>
  </div>
</div>
</section>

<section>
  <div class="container">
    <h2>Elenco dei corsi di laurea</h2>
  </div>
</section>

@endsection