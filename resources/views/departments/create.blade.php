@extends('layouts.app')

@section('content')

<section> 
  <div class="container">
    <h2>
      Crea un nuovo dipartimento
    </h2>
  </div>

  <div class="container">
    <form action="{{ route('departments.store') }}" method="POST">

      @csrf 

      <p>
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" placeholder="Nome dipartimento">
      </p>

      <p>
        <label for="head-of-department">Capo di dipartimento</label>
        <input type="text" name="head_of_department" id="head-of-department" placeholder="Nome capo dipartimento">
      </p>

      <p>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Email">
      </p>

      <p>
        <label for="phone">Telefono</label>
        <input type="tel" name="phone" id="phone" placeholder="Numero di Telefono">
      </p>

      <p>
        <label for="address">Indirizzo</label>
        <input type="text" name="address" id="address" placeholder="Indirizzo">
      </p>

      <p>
        <label for="website">Sito Web</label>
        <input type="text" name="website" id="website" placeholder="Sito web dipartimento">
      </p>

      <p>
        <input type="submit" value="Salva">
      </p>

    </form>
  </div>
</section>

@endsection