@extends('layouts.app')

@section('content')

<section>
  <div class="container" style="display: flex; justify-content: flex-end;">
    <a href="{{ route('departments.create') }}">Aggiungi dipartimento</a>
  </div>
</section>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>Indirizzo</th>
      <th>Telefono</th>
      <th>Email</th>
      <th>Sito Web</th>
      <th>Capo dip.</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($departments as $d)
        <tr>
          <td>{{ $d->id }}</td>
          <td>
            <a href="{{ route('departments.show',$d) }}">
              {{ $d->name }}
            </a>
          </td>
          <td>{{ $d->address }}</td>
          <td>{{ $d->phone }}</td>
          <td>{{ $d->email }}</td>
          <td>{{ $d->website }}</td>
          <td>{{ $d->head_of_department }}</td>
          <td>
            <a href="{{ route('departments.edit',$d) }}">edit</a>
          </td>
          <td>
            <form action="{{ route('departments.destroy',$d) }}" method="POST">
              @csrf
              @method('DELETE')
              
              <input type="submit" value="Elimina">
            </form>
          </td>
        </tr>
    @endforeach
  </tbody>
</table>

@endsection