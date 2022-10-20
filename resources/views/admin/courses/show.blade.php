@extends('layouts.app')

@section('content')

<section>

  <div class="container">
    <div class="row">
      <div class="col-8">
        <h1>{{ $course->name}}</h1>
        <h4>Docenti:</h4>
        <ul>
          <li>nessun docente per questo corso</li>
        </ul>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a href="{{ route('admin.courses.edit',$course) }}">Modifica corso</a>

        <form class="ml-2" action="{{ route('admin.courses.destroy',$course) }}" method="POST">
          @csrf
          @method('DELETE')
          
          <input type="submit" value="Elimina">
        </form>
      </div>
      <div class="col-12">
        <ul>
          <li>
            <span>Periodo:</span> {{ $course->period }}
          </li>
          <li>
            <span>Anno:</span> {{ $course->year }}
          </li>
          <li>
            <span>CFU:</span> {{ $course->cfu }}
          </li>
          <li>
            <span>Sito web:</span> {{ $course->website }}
          </li>
        </ul>
      </div>
    </div>
    </div>

  

<section>
  <div class="container">
    <div class="row">
      <div class="col-12">
        {{ $course->description }}
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2>Elenco appelli d'esame</h2>
      </div>
      <div class="col-12">
        nessun appello
      </div>
    </div>
  </div>
</section>

@endsection