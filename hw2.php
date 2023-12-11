<html>
<head>
    <title>Temperature Conversion</title>
</head>
<body>
<?php
if (isset($_GET['temperature'])) {
    $temperature = $_GET['temperature'];
    $unit = $_GET['unit'];
} else {
    $temperature = null;
    $unit = null;
}

if (is_null($temperature) || is_null($unit)) {
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        Temperature: <input type="text" name="temperature" value="<?php echo $temperature; ?>" /><br />
        <input type="radio" name="unit" value="celsius" <?php echo ($unit === 'celsius') ? 'checked' : ''; ?>/> Celsius
        <input type="radio" name="unit" value="fahrenheit" <?php echo ($unit === 'fahrenheit') ? 'checked' : ''; ?>/> Fahrenheit<br />
        <input type="submit" value="Convert" />
    </form>
    <?php
} else {
    if ($unit === 'celsius') {
        $fahrenheit = $temperature * 9 / 5 + 32;
        printf("%.2fC is %.2fF", $temperature, $fahrenheit);
    } else {
        $celsius = ($temperature - 32) * 5 / 9;
        printf("%.2fF is %.2fC", $temperature, $celsius);
    }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        <input type="hidden" name="temperature" value="<?php echo $temperature; ?>" />
        <input type="hidden" name="unit" value="<?php echo ($unit === 'celsius') ? 'fahrenheit' : 'celsius'; ?>" />
        <input type="submit" value="Convert to <?php echo ($unit === 'celsius') ? 'Fahrenheit' : 'Celsius'; ?>" />
    </form>
    <?php
}
?>
</body>
</html>
