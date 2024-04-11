<?php
$name = "Julion";
$esDes = true;
$age = 22;

define('LOGO_URL', 'https://m.media-amazon.com/images/I/81LcV86eecL._AC_UF1000,1000_QL80_.jpg');

var_dump($name);
var_dump($esDes);
var_dump($age);

echo gettype($name);
echo is_string($name);

$output = "<br>Hoa $name";
$output .= ", con una edad de  $age";

const NOMBRE = 'Julion1';

$bestLanguages = ["PHP", "JavaScrip", "Python"];
$bestLanguages[] = "Java";
$bestLanguages[] = "TypeScript";

$persona = [
    "nombre" => "Julion",
    "Edad" => "22",
    "esDesWeb" => true,
    "LenguajesCon" => ["PHP", "GO", "C++", "JavaScript", "C#"]
];
?>
<img src="<?= LOGO_URL ?>" alt="PHP Logo" width="200">

<ul>
    <?php foreach ($bestLanguages as $key => $language) : ?>
        <li><?= $key . " " . $language ?></li>
    <?php endforeach; ?>
</ul>

<h1>
    <?= "Mi primer PHP " . $name; ?>
    <?= $output ?>
</h1>

<style>
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }
</style>