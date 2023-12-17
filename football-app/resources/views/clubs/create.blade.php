<!-- resources/views/clubs/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>Input Data Klub</h2>
     <form action="{{ route('clubs.store') }}" method="post">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Nama Klub :</label>
          <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3">
          <label for="city" class="form-label">Kota Klub :</label>
          <input type="text" name="city" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Save</button> 
      </form>
@endsection
