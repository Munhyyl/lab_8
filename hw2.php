<html>
<head>
    <title>Personality</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" ">
    Select your fruit:<br />
    <select id="firstSelect" name="attributes[]" multiple>
        <option value="apple">Apple</option>
        <option value="banana">Banana</option>
        <option value="orange">Orange</option>
        <option value="grape">Grape</option>
        <option value="kiwi">Kiwi</option>
    </select><br />
    <input type="submit" name="s" value="Record my fruit!" />
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['s'])) {
        $selectedFruits = isset($_POST['attributes']) ? $_POST['attributes'] : [];

        if (!empty($selectedFruits)) {
            echo "You selected " . implode(', ', $selectedFruits) . ".";

            
            echo '<script>';
            foreach ($selectedFruits as $fruit) {
                echo 'var option = document.querySelector(\'#firstSelect option[value="' . $fruit . '"]\');';
                echo 'option.remove();';
            }
            echo '</script>';

            
            echo '<br/><br/>Selected fruits in the second select:';
            echo '<form>';
            echo '<select id="secondSelect" name="selectedAttributes[]" multiple>';
            foreach ($selectedFruits as $fruit) {
                echo '<option value="' . $fruit . '">' . $fruit . '</option>';
            }
            echo '</select>';
            echo '</form>';
        } else {
            echo "You didn't select any fruits.";
        }
    }
}
?>

</body>
</html>
