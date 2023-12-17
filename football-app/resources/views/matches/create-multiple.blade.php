<!-- resources/views/matches/create-multiplate.blade.php -->

<!-- Multiple Match Entry Form -->
<form action="{{ route('matches.store-multiple') }}" method="post">
    @csrf
    <div id="multipleMatchEntry" style="display: none;">
        <label>
            Klub 3: <input type="text" name="matches[0][club1]" required>
            Klub 4: <input type="text" name="matches[0][club2]" required>
        </label>
        <label>
            Score 3: <input type="number" name="matches[0][score1]" required>
            Score 4: <input type="number" name="matches[0][score2]" required>
        </label>
    </div>

    <button type="button" onclick="addMatch()">Add</button>
    <button type="submit">Save</button>
</form>

<script>
    let matchCount = 0;

    function addMatch() {
        matchCount++;
        const matchEntry = document.getElementById('multipleMatchEntry');
        const newMatchEntry = matchEntry.cloneNode(true);
        newMatchEntry.style.display = 'block';

        // Update the names of form elements to avoid conflicts
        newMatchEntry.querySelectorAll('[name^="matches[0]"]').forEach(element => {
            const newName = element.name.replace('matches[0]', `matches[${matchCount}]`);
            element.name = newName;
        });

        matchEntry.parentNode.appendChild(newMatchEntry);
    }
</script>
