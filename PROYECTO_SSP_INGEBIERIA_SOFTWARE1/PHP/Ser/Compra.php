<?php
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Paginas.css">
    <title>Compra de libros</title>
</head>

<body>
    <h1></h1>
    <nav>
        <ul>
            <li><input type="button" value="Registrar proveedor/editorial"></li>
            <li><input type="button" value="Registrar libro"></li>
        </ul>
    </nav>
    <main>
        <div>
            <legend>Registrar Proveedor/Editorial</legend>
            <label for="">Contacto</label>
            <input type="text">
            <label for="">Direccion</label>
            <input type="text">
        </div>
        <div>
            <legend>Ingresar nuevos libros</legend>
            <label for="">Titulo:</label>
            <input type="text" id="" name="">
            <label for="">Editorial:</label>
            <input type="text" id="" name="">
            <label for="">Autor:</label>
            <input type="text" id="" name="">
            <label for="">Genero:</label>
            <input type="text" id="" name="">
            <label for="">Edicion:</label>
            <input type="text" id="" name="">
            <label for="">Precio:</label>
            <input type="text" id="" name="">
            <button class="Boton">Registrar</button>
        </div>
        <div>
            <table>
                <tr>
                    <td>Codigo</td>
                    <td>Titulo</td>
                    <td>Editorial</td>
                    <td>Autor</td>
                    <td>Genero</td>
                    <td>Edicion</td>
                    <td>Precio</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>XYZ</td>
                    <td>ABC</td>
                    <td>Lascano</td>
                    <td>X</td>
                    <td>1</td>
                    <td>$250</td>
                </tr>
            </table>
        </div>
        <br>
        <div>
            <legend>Compra de libros</legend>
            <label for="codigo">Codigo del libro:</label>
            <input type="text" id="codigo" name="codigo">
            <button class="Boton">Registrar</button>
        </div>
        <div>
            <table>
                <tr>
                    <td>Codigo</td>
                    <td>Titulo</td>
                    <td>Cadidad</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>XYZ</td>
                    <td><input type="number" name="" id=""></td>
                </tr>
            </table>
        </div>
    </main>
</body>

</html>