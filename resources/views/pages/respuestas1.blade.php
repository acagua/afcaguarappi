<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Punto 1</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 30vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            ul {
              list-style-type: none;
            }

            ol {
                margin-left: 5%;
                margin-right: 5%;
                text-align: left;
            }
            p{
                margin-left: 5%;
                margin-right: 5%;
                text-align: justify;
            }
        </style>
    </head>
    <body>

        <div class="flex-center position-ref full-height">
                <div class="top-right links">
                    <a href="https://github.com/acagua/afcaguarappi" target="_blank">Repositorio</a>
                    <a href="{{ url('/punto1') }}">CODING CHALLENGE</a>
                    |
                    <a href="{{ url('/punto2') }}">CODE REFACTORING</a>
                    <a href="{{ url('/punto3') }}">PREGUNTAS</a>
                </div>

            <div class="content">
                <div class="title m-b-md">
                    <br>Solución
                </div>
            </div>
        </div>
                <ol>
                    <li>Las capas de la aplicación (por ejemplo capa de persistencia, vista, de aplicación, etc) y qué clases pertenecen 
                a cual.</li>
                    <li>La responsabilidad de cada clase creada.</li>

                    <p>A partir del Framework Laravel, la aplicación se separó básicamente en vistas y controladores. Se adicionó una clase externa para separar lo que respecta a las funciones de la matriz. </p>
                    <p>Dentro de las vistas, para esta prueba (no solo el primer punto) se crearon las páginas con las que interactúa el usuario para cada uno de los puntos (punto1.blade.php, punto2.blade.php, punto3.blade.php y respuestas1.blade.php) </p>
                    <p>Por el lado de los controladores, dado que solo se requirió para el primer punto, se creo un controlador (punto1Controller.php) que se encarga de desplegar la vista inicial al usuario, recibir y procesar la entrada del mismo y desplegar el resultado y otro adicional (Punto1FormRequest.php) que valida el formulario del usuario. </p>
                    <p>Por último, la clase externa creada (Matrix.php) es una clase cuya función es hacer los procesos que respectan a la matriz, es decir la creación de la matriz, la actualización de celdas y la suma de los valores dentro de un rango. </p>

                </ol>
    </body>
</html>
