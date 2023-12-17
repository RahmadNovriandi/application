<!-- resources/views/matches/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>Input Skor Pertandingan Satu Persatu</h2>
  

     <form action="{{ route('matches.store') }}" method="post">
        @csrf
<div class="container text-center">
    <div class="row">
      <div class="col-sm-5 col-md-6">
        <div class="mb-3"></div>

        <label for="team1_id">Klub 1:</label>
        <select name="team1_id" required>
         @foreach ($teams as $team)
             <option value="{{ $team->id }}">{{ $team->name }}</option>
         @endforeach
        </select>
     
        <div class="mb-3"></div>
        <label for="score1" class="form-label">Score 1 :</label>
        <input type="number" name="score1" class="form-control">

    

      </div>
      <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
        <div class="mb-3"></div>

        <label for="team2_id">Klub 2:</label>
        <select name="team2_id" required>
         @foreach ($teams as $team)
             <option value="{{ $team->id }}">{{ $team->name }}</option>
         @endforeach
        </select>

        <div class="mb-3"></div>
        <label for="score2" class="form-label">Score 2 :</label>
        <input type="number" name="score2" class="form-control">
      </div>
      <div class="mb-3"></div>
      <button type="submit" class="btn btn-primary">Save</button> 
    </div>
  </div>   
      </form>  
      <script>
        function validateAndSaveSingleMatch() {
            // Retrieve values from the form
            var club1 = document.getElementById('team1_id').value;
            var club2 = document.getElementById('team2_id').value;
            var score1 = document.getElementById('score1').value;
            var score2 = document.getElementById('score2').value;
    
            // Simple validation
            if (club1.trim() === '' || club2.trim() === '' || isNaN(score1) || isNaN(score2)) {
                alert('ok');
                return;
            }
    
            // Perform save operation (you can send these values to the server, for example)
            console.log("Saving single match:", team1_id, score1, "-",team1_id, score2);
        }
    </script>

      {{-- <h2>Input Skor Pertandingan - Satu per satu</h2>

  <form action="{{ route('matches.store') }}" method="post">
        @csrf
        {{-- <label for="team1_id">Klub 1:</label>
        <input type="BigInteger" id="team1_id" name="team1_id" required>
    
        <label for="team2_id">Klub 2:</label>
        <input type="BigInteger" id="team2_id" name="team2_id" required> --}}

        <!-- Contoh dalam formulir di file resources/views/matches/create.blade.php -->

   {{-- <label for="team1_id">Klub 1:</label>
   <select name="team1_id" required>
    @foreach ($teams as $team)
        <option value="{{ $team->id }}">{{ $team->name }}</option>
    @endforeach
   </select>

   <label for="team2_id">Klub 2:</label>
   <select name="team2_id" required>
    @foreach ($teams as $team)
        <option value="{{ $team->id }}">{{ $team->name }}</option>
    @endforeach
   </select>

    
        <!-- Score 1 vs Score 2 -->
        <label for="score1">Score 1:</label>
        <input type="number" id="score1" name="score1" required>
    
        <label for="score2">Score 2:</label>
        <input type="number" id="score2" name="score2" required>
    
        <!-- Save Button -->
        <button type="button" onclick="validateAndSaveSingleMatch()">Save</button>
    </form>
    
    <script>
        function validateAndSaveSingleMatch() {
            // Retrieve values from the form
            var club1 = document.getElementById('team1_id').value;
            var club2 = document.getElementById('team2_id').value;
            var score1 = document.getElementById('score1').value;
            var score2 = document.getElementById('score2').value;
    
            // Simple validation
            if (club1.trim() === '' || club2.trim() === '' || isNaN(score1) || isNaN(score2)) {
                alert('Please fill in all fields with valid values.');
                return;
            }
    
            // Perform save operation (you can send these values to the server, for example)
            console.log("Saving single match:", team1_id, score1, "-",team1_id, score2);
        }
    </script>
     --}}
<div class="mb-5"></div>
     <h2>Input Skor Pertandingan - Multiple</h2>

     <form action="{{ route('matches.store') }}" method="post">
      @csrf
    <!-- Container for match entries -->
    <div id="matchEntries"></div>

    <!-- Add Button to add more matches -->
    <button type="button" onclick="addMatch()">Add</button>

    <!-- Save Button -->
    <button type="button" onclick="validateAndSaveMultipleMatches()">Save</button>
</form>

<script>
    var matchCount = 1;

    function addMatch() {
        // Create new match entry fields
        var matchEntry = document.createElement('div');
        matchEntry.innerHTML = `
       
        <label for="team1_id">Klub 1:</label>
        <select name="team1_id" required>
         @foreach ($teams as $team)
             <option value="{{ $team->id }}">{{ $team->name }}</option>
         @endforeach
        </select>
     
           
            <label for="score${matchCount}">Score ${matchCount * 2 - 1}:</label>
            <input type="number" id="score${matchCount}" name="score${matchCount}" required>

            <label for="team2_id">Klub 2:</label>
        <select name="team2_id" required>
         @foreach ($teams as $team)
             <option value="{{ $team->id }}">{{ $team->name }}</option>
         @endforeach
        </select>

            <label for="score${matchCount + 1}">Score ${matchCount * 2}:</label>
            <input type="number" id="score${matchCount + 1}" name="score${matchCount + 1}" required>
        `;

        // Append the new match entry to the form
        document.getElementById('matchEntries').appendChild(matchEntry);

        matchCount += 2; // Increment for the next match
    }

    function validateAndSaveMultipleMatches() {
        // Validate each match entry
        for (var i = 1; i <= matchCount; i += 2) {
            var club1 = document.getElementById(`club${i}`).value;
            var club2 = document.getElementById(`club${i + 1}`).value;
            var score1 = document.getElementById(`score${i}`).value;
            var score2 = document.getElementById(`score${i + 1}`).value;

            if (club1.trim() === '' || club2.trim() === '' || isNaN(score1) || isNaN(score2)) {
                alert('Please fill in all fields with valid values.');
                return;
            }
        }

        // Perform save operation (you can send these values to the server, for example)
        console.log("Saving multiple matches");

        // Reset match count for future use
        matchCount = 1;
    }
</script>

         
@endsection
