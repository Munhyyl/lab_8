<html>
<head>
    <title>Personality</title>
    <script>
        function moveSelectedFruit() {
            var firstSelect = document.getElementById('firstSelect');
            var secondSelect = document.getElementById('secondSelect');
            var selectedOptions = [];
            for (var i = 0; i < firstSelect.options.length; i++) {
                var option = firstSelect.options[i];
                if (option.selected) {
                    selectedOptions.push(option);
                }
            }

            for(var i=0; i< selectedOptions.length; i++){
                secondSelect.add(new Option(selectedOptions[i].text, selectedOptions[i].value));
                firstSelect.remove(firstSelect.selectedIndex);
            }
        }
            function displayAllFruits() {
            var secondSelect = document.getElementById('secondSelect');

  
            for (var i = 0; i < secondSelect.options.length; i++) {
                secondSelect.options[i].selected = true;
            }
        }
    </script>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" onsubmit="displayAllFruits()">
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
    $selectedFruits = $_GET['selectedAttributes'];
    
    if (!empty($selectedFruits)) {
        $description = join(', ', $selectedFruits);
        echo "You selected {$description}.";
    } else {
        echo "You didn't select any fruits.";
    }
}
?>

</body>
</html>
