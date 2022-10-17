@extends('layouts.app')

@section('content')

<section> 
  <div class="container">
    <h2>
      Crea un nuovo dipartimento
    </h2>
  </div>

  <div class="container">
    <form action="{{ route('departments.update',$department) }}" method="POST">

      @csrf 
      @method('PUT')

      <p>
        <label for="name">Nome</label>
        <input type="text" style=" @error('name') border-color: red  @enderror" name="name" id="name" value="{{ old('name', $department->name) }}" placeholder="Nome dipartimento">
        @error('name')
          <div style="color: red; font-size: 12px;" class="alert alert-danger">{{ $message }}</div>
        @enderror
      </p>

      <p>
        <label for="head-of-department">Capo di dipartimento</label>
        <input type="text" name="head_of_department" id="head-of-department" value="{{ old('head_of_department',$department->head_of_department) }}" placeholder="Nome capo dipartimento">
        @error('head_of_department')
          <div style="color: red; font-size: 12px;" class="alert alert-danger">{{ $message }}</div>
        @enderror
      </p>

      <p>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="{{ old('email',$department->email) }}" placeholder="Email">
        @error('email')
          <div style="color: red; font-size: 12px;" class="alert alert-danger">{{ $message }}</div>
        @enderror
      </p>

      <p>
        <label for="phone">Telefono</label>
        <input type="tel" name="phone" id="phone" value="{{ old('phone',$department->phone) }}" placeholder="Numero di Telefono">
        @error('phone')
          <div style="color: red; font-size: 12px;" class="alert alert-danger">{{ $message }}</div>
        @enderror
      </p>

      <p>
        <label for="address">Indirizzo</label>
        <input type="text" name="address" id="address" value="{{ old('address',$department->address) }}" placeholder="Indirizzo">
        @error('address')
          <div style="color: red; font-size: 12px;" class="alert alert-danger">{{ $message }}</div>
        @enderror
      </p>

      <p>
        <label for="website">Sito Web</label>
        <input type="text" name="website" id="website" value="{{ old('website',$department->website) }}" placeholder="Sito web dipartimento">
        @error('website')
          <div style="color: red; font-size: 12px;" class="alert alert-danger">{{ $message }}</div>
        @enderror
      </p>

      <p>
        <input type="submit" value="Salva">
      </p>

    </form>

    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
  </div>
</section>

@endsection