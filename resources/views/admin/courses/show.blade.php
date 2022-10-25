@extends('layouts.app')

@section('content')

<section>

  <div class="container">
    <div class="row">
      <div class="col-8">
        <h1>{{ $course->name}}</h1>
        <h2>Corso di laurea: {{ $course->degree->name }} <br>
          Dipartimento:  
          <a href="{{ route('admin.departments.show',$course->degree->department) }}">
          {{ $course->degree->department->name }}
          </a>
        </h2>
        <h4>Docenti:</h4>
        <ol>
          @forelse ($course->teachers()->orderBy('surname','asc')->get() as $teacher)
              <li>
                {{ $teacher->name }} {{ $teacher->surname }} <br>
                <small>{{$teacher->email}}</small>
              </li>
          @empty
            <li>nessun docente per questo corso</li>
          @endforelse
        </ol>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a href="{{ route('admin.courses.edit',$course) }}">Modifica corso</a>

        <form id="delete-course" class="ml-2" action="{{ route('admin.courses.destroy',$course) }}" method="POST">
          @csrf
          @method('DELETE')
          
          <input for="delete-course" type="submit" value="Elimina">
        </form>
        <form id="attach-teacher" action="{{ route('admin.courses.attach.teacher',$course) }}" method="POST">
          @csrf

          <div class="form-group">
            <select name="teacher_id" value="{{ old('teacher_id') }}" class="custom-select @error('teacher_id')is-invalid @enderror">
              <option value="">-- seleziona un insegnante da aggiungere --</option>
              @foreach($teachers as $teacher)
                <option   value="{{ $teacher->id }}" @if( old('teacher_id') == $teacher->id ) selected @endif>{{ $teacher->surname }} {{ $teacher->name }}</option>
              @endforeach

            </select>
            @error('teacher_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <input for="attach-teacher" type="submit" value="aggiungi insegnante">
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