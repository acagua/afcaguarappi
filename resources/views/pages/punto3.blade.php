<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Punto 3</title>

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

            ol {
                margin-left: 5%;
                margin-right: 5%;
                text-align: left;
            }
            p, ul{
                margin-left: 5%;
                margin-right: 5%;
                text-align: justify;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
                <div class="top-right links">
                    <a href="{{ url('/punto1') }}">CODING CHALLENGE</a>
                    <a href="{{ url('/punto2') }}">CODE REFACTORING</a>
                </div>

            <div class="content">
                <div class="title m-b-md">
                    <br> Preguntas
                </div>
            </div>
        </div>
                <ol>
                    <li>¿En qué consiste el principio de responsabilidad única? ¿Cuál es su propósito?</li>
                    
                    <p>El principio consiste en tener un conjunto de clases, las cuales tienen responsabilidades específicas sobre la solución. Cada clase contará con una función clara y simple que en conjunto crearán una aplicación. Con este principio se evita conflictos entre clases, ya que hay solo una clase que se encarga de manipular una parte específica del software. Se debe buscar la simplicidad en las clases donde entre menor sea cantidad de funciones que maneje es mejor. Esto permite la modificabilidad, la modularidad y la mantenibilidad del código, lo que trae como beneficio la agilidad en el desarrollo de nuevas funcionalidad y la claridad de la solución para la trazibilidad. </p>


                    <li>¿Qué características tiene según tu opinión “buen” código o código limpio?</li>

                    <p>Dentro de las características resaltaría las siguientes: </p>
                    <ul>
                        <li> Los métodos cuentan con su documentación </li>
                        <li> Las variables y métodos siguen un estandar y sus nombres son representativos a su propósito </li>
                        <li> Código es reutilizable y no hay duplicidad del mismo </li>
                        <li> Se manejan clases por funcionalidad de manera modular </li>
                        <li> No hay código basura (no utilizado) en la solución </li>
                        <li> No hay comentarios dentro del código a menos que sea explicativo (y no redundante)</li>
                        <li> Se limita la longitud máxima de cada línea </li>
                        <li> Indentación en código </li>
                        <li> Encapsulamiento de clases </li>
                    </ul>
                       
                    

                </ol>
    </body>
</html>
