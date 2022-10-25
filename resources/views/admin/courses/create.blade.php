@extends('layouts.app')

@section('content')

<section>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>Nuovo corso</h1>
      </div>
      <div class="col-12">
        <form action="{{ route('admin.courses.store') }}" method="POST">

          @csrf

          <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control @error('name')is-invalid @enderror" name="name" id="name" aria-describedby="nameHelp" value="{{ old('name') }}" placeholder="Nome del corso">
            <small id="nameHelp" class="form-text text-muted">Aggiungi il nome del corso</small>
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" aria-describedby="descriptionHelp"  placeholder="Descrivi il corso">
              {{ old('description') }}
            </textarea>
            <small id="descriptionHelp" class="form-text text-muted">Aggiongi la descrizione del corso</small>
            @error('description')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="period">Periodo</label>
            <select name="period" value="{{ old('period') }}" class="custom-select @error('period')is-invalid @enderror">
              <option value="I semestre">I semestre</option>
              <option value="II semestre">II semestre</option>
              <option value="Annuale">Annuale</option>
            </select>
            <div class="invalid-feedback">Periodo del corso</div>
            @error('period')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          

          <div class="form-group">
            <label for="year">Anno</label>
            <input type="number" class="form-control @error('year')is-invalid @enderror" name="year" id="year" aria-describedby="yearHelp" value="{{ old('year') }}" placeholder="Anno">
            <small id="yearHelp" class="form-text text-muted">Anno del corso</small>
            @error('year')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="degree_id">Corso di Laurea</label>
            <select name="degree_id" value="{{ old('degree_id') }}" class="custom-select @error('degree_id')is-invalid @enderror">
              <option value="">-- seleziona corso di laurea --</option>
              @foreach($degrees as $degree)
                <option   value="{{ $degree->id }}" @if( old('degree_id') == $degree->id ) selected @endif>{{ $degree->name }}</option>
              @endforeach
            </select>
            <div class="invalid-feedback">Seleziona di corso di Laurea di questo corso</div>
            @error('degree_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="cfu">Crediti formativi (CFU)</label>
            <select name="cfu" value="{{ old('cfu') }}" class="custom-select @error('cfu')is-invalid @enderror">
              @foreach($available_cfu as $cfu)
                <option @if(old('cfu') == $cfu) selected @endif value="{{ $cfu }}">{{ $cfu }}</option>
              @endforeach
              {{-- <option value="2">2</option>
              <option selected value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="20">20</option>
              <option value="30">30</option> --}}
            </select>
            <div class="invalid-feedback">ESelezione il numero di crediti di questo corso</div>
            @error('cfu')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="website">Sito web</label>
            <input type="text" class="form-control @error('website')is-invalid @enderror" name="website" id="website" aria-describedby="websiteHelp" value="{{ old('website') }}" placeholder="https://nome-del-corso.it">
            <small id="websiteHelp" class="form-text text-muted">Sito web del corso</small>
            @error('website')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <button type="submit" class="btn btn-primary">Crea</button>
        </form>
      </div>
    </div>
  </div>
</section>

@endsection