<html>
<head>
    <title>Temperature Conversion</title>
</head>
<body>

<?php
$fahrenheit = isset($_GET['fahrenheit']) ? $_GET['fahrenheit'] : null;

if (!is_null($fahrenheit)) {
    $celsius = ($fahrenheit - 32) * 5 / 9;
    printf("%.2fF is %.2fC<br>", $fahrenheit, $celsius);
}

$celsius1 = isset($_GET['celsius']) ? $_GET['celsius'] : null;

if (!is_null($celsius1)) {
    $fahrenheit1 = $celsius1 * 9 / 5 + 32;
    printf("%.2fC is %.2fF", $celsius1, $fahrenheit1);
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
    Fahrenheit temperature:
    <input type="text" name="fahrenheit" value="<?php echo $fahrenheit; ?>" /><br />
    <input type="submit" value="Convert to Celsius!" />
</form>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
    Celsius temperature:
    <input type="text" name="celsius" value="<?php echo $celsius1; ?>" /><br />
    <input type="submit" value="Convert to Fahrenheit!" />
</form>

</body>
</html>
