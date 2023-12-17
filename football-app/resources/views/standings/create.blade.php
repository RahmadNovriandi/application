<!-- resources/views/standings.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>Tampilan Klasemen</h2>
    {{-- <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Klub</th>
                <th>Ma</th>
                <th>Me</th>
                <th>S</th>
                <th>K</th>
                <th>GM</th>
                <th>GK</th>
                <th>Point</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clubs as $index => $club)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $club->name }}</td>
                    <td>{{ $club->matches_played }}</td>
                    <td>{{ $club->matches_won }}</td>
                    <td>{{ $club->matches_drawn }}</td>
                    <td>{{ $club->matches_lost }}</td>
                    <td>{{ $club->goals_scored }}</td>
                    <td>{{ $club->goals_conceded }}</td>
                    <td>{{ $club->points }}</td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Klub</th>
                <th>Ma</th>
                <th>Me</th>
                <th>S</th>
                <th>K</th>
                <th>GM</th>
                <th>GK</th>
                <th>Point</th>
            </tr>
        </thead>
        <tbody>
            @foreach($standings as $index => $team)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->matches_played }}</td>
                    <td>{{ $team->wins }}</td>
                    <td>{{ $team->draws }}</td>
                    <td>{{ $team->losses }}</td>
                    <td>{{ $team->goals_scored }}</td>
                    <td>{{ $team->goals_conceded }}</td>
                    <td>{{ $team->points }}</td>
                </tr>
            @endforeach
@endsection
