@extends('layouts.app')

@section('content')

<section>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1>Nuovo corso</h1>
      </div>
      <div class="col-12">
        <form action="{{ route('admin.courses.update',$course) }}" method="POST">

          @csrf
          @method('PUT')

          <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control @error('name')is-invalid @enderror" name="name" id="name" aria-describedby="nameHelp" value="{{ old('name',$course->name) }}" placeholder="Nome del corso">
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
              {{ old('description',$course->description) }}
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
            <select name="period" class="custom-select @error('period')is-invalid @enderror">
              <option @if($course->period === "I semestre") selected @endif value="I semestre">I semestre</option>
              <option @if($course->period === "II semestre") selected @endif value="II semestre">II semestre</option>
              <option @if($course->period === "Annuale") selected @endif value="Annuale">Annuale</option>
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
            <input type="number" min="1" max="6" step="1" class="form-control @error('year')is-invalid @enderror" name="year" id="year" aria-describedby="yearHelp" value="{{ old('year',$course->year) }}" placeholder="Anno">
            <small id="yearHelp" class="form-text text-muted">Anno del corso</small>
            @error('year')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="cfu">Crediti formativi (CFU)</label>
            <select name="cfu" class="custom-select @error('cfu')is-invalid @enderror">
              <option @if($course->cfu === 1) selected @endif value="1">1</option>
              <option @if($course->cfu === 2) selected @endif value="2">2</option>
              <option @if($course->cfu === 3) selected @endif value="3">3</option>
              <option @if($course->cfu === 4) selected @endif value="4">4</option>
              <option @if($course->cfu === 5) selected @endif value="5">5</option>
              <option @if($course->cfu === 6) selected @endif value="6">6</option>
              <option @if($course->cfu === 7) selected @endif value="7">7</option>
              <option @if($course->cfu === 8) selected @endif value="8">8</option>
              <option @if($course->cfu === 9) selected @endif value="9">9</option>
              <option @if($course->cfu === 10) selected @endif value="10">10</option>
              <option @if($course->cfu === 11) selected @endif value="11">11</option>
              <option @if($course->cfu === 12) selected @endif value="12">12</option>
              <option @if($course->cfu === 20) selected @endif value="20">20</option>
              <option @if($course->cfu === 30) selected @endif value="30">30</option>
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
            <input type="text" class="form-control @error('website')is-invalid @enderror" name="website" id="website" aria-describedby="websiteHelp" value="{{ old('website',$course->website) }}" placeholder="https://nome-del-corso.it">
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