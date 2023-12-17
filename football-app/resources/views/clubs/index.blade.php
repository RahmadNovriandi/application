<!-- resources/views/clubs/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>List of Clubs</h1>

    <ul>
        @foreach ($clubs as $club)
            <li>{{ $club->name }} - {{ $club->city }}</li>
        @endforeach
    </ul>
@endsection
