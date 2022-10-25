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
<div class="container">
  <a href="{{ route('admin.departments.edit',$department) }}">Modifica dipartimento</a>

  <form action="{{ route('admin.departments.destroy',$department) }}" method="POST">
    @csrf
    @method('DELETE')
    
    <input type="submit" value="Elimina">
  </form>
</div>
</section>

<section>
  <div class="container">
    <h2>Elenco dei corsi di laurea</h2>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <table class="table stable-stripped">
          <thead>
            <tr>
              <th>ID</th>
              <th>nome</th>
              <th>level</th>
              <th>email</th>
              <th>n corsi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($department->degrees()->orderBy('level','desc')->get() as $degree)
                <tr>
                  <td>{{ $degree->id }}</td>
                  <td>{{ $degree->name }}</td>
                  <td>{{ $degree->level }}</td>
                  <td>{{ $degree->email }}</td>
                  <td>{{ $degree->courses()->count() }}</td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

@endsection