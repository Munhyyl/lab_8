<html>
<head>
    <title>Personality</title>
    <script>
        function moveSelectedFruit() {
            var firstSelect = document.getElementById('firstSelect');
            var secondSelect = document.getElementById('secondSelect');

            for (var i = 0; i < firstSelect.options.length; i++) {
                var option = firstSelect.options[i];
                if (option.selected) {
                    secondSelect.add(new Option(option.text, option.value));
                    firstSelect.remove(i);
                    i--;  
                }
            }
        }
    </script>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
    Select your fruit:<br />
    <select id="firstSelect" name="attributes[]" multiple>
        <option value="apple">Apple</option>
        <option value="banana">Banana</option>
        <option value="orange">Orange</option>
        <option value="grape">Grape</option>
        <option value="kiwi">Kiwi</option>
    </select><br />
    <input type="button" onclick="moveSelectedFruit()" value="Move to the next select" /><br />
    <select id="secondSelect" name="selectedAttributes[]" multiple>
        
    </select><br />
    <input type="submit" name="s" value="Record my fruit!" />
</form>

<?php
if (isset($_GET['s'])) {
    if (isset($_GET['attributes']) && is_array($_GET['attributes'])) {
        $description = join(' ', $_GET['attributes']);
        echo "You selected {$description}.";
    } else {
        echo "Please select a fruit.";
    }
}
?>

</body>
</html>
