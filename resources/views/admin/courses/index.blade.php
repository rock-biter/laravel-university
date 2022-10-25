@extends('layouts.app')

@section('content')

<section>
  <div class="container" style="display: flex; justify-content: flex-end;">
    <a href="{{ route('admin.courses.create') }}">Aggiungi corso</a>
  </div>
</section>

<section>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <p>{{
          Request::get('order')
          }}</p>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>
                <a href="{{ route('admin.courses.index',['orderBy' => 'name', 'order' => Request::get('order') === 'asc' ? 'desc' : 'asc']) }}" class="d-flex align-items-center">

                  Nome
                  <div class="order-icon @if(Request::get('orderBy') === 'name') d-block @else d-none @endif @if(Request::get('order') === 'desc') order-desc @else order-asc @endif ml-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                  </div>
                </a>
              </th>
              <th>
                <a href="{{ route('admin.courses.index',['orderBy' => 'period']) }}" class="d-flex align-items-center">

                  Periodo
                  <div class="order-icon @if(Request::get('orderBy') === 'period') d-block @else d-none @endif @if(Request::get('order') === 'desc') order-desc @else order-asc @endif ml-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                  </div>
                </a>
              </th>
              <th>
                <a href="{{ route('admin.courses.index',['orderBy' => 'year']) }}" class="d-flex align-items-center">

                  Anno
                  <div class="order-icon @if(Request::get('orderBy') === 'year') d-block @else d-none @endif ml-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                  </div>
                </a>
              </th>
              <th>
                <a href="{{ route('admin.courses.index',['orderBy' => 'cfu']) }}" class="d-flex align-items-center">

                  CFU
                  <div class="order-icon @if(Request::get('orderBy') === 'cfu') d-block @else d-none @endif ml-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                  </div>
                </a>
              </th>
              <th>Sito Web</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($courses as $course)
                <tr>
                  <td>{{ $course->id }}</td>
                  <td>
                    <a href="{{ route('admin.courses.show',$course) }}">
                      {{ $course->name }}
                    </a>
                  </td>
                  <td>{{ $course->period }}</td>
                  <td>{{ $course->year }}</td>
                  <td>{{ $course->cfu }}</td>
                  <td>{{ $course->website }}</td>
                  <td>
                    <a href="{{ route('admin.courses.edit',$course) }}">edit</a>
                  </td>
                  <td>
                    <form action="{{ route('admin.courses.destroy',$course) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      
                      <input type="submit" value="Elimina">
                    </form>
                  </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>



@endsection