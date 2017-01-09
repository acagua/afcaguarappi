<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Punto 2</title>

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
                    <a href="{{ url('/punto3') }}">PREGUNTAS</a>
                </div>

            <div class="content">
                <div class="title m-b-md">
                    <br>Code Refactoring
                </div>
            </div>
        </div>
                <ol>
                    <li> Las malas prácticas de programación que en su criterio son evidenciadas en el código. </li>
                        <p>Las malas prácticas indentificadas son: </p>
                        <ul>
                            <li> Mala practica 1 </li>
                        </ul>
                        <br>
                    <li> Cómo su refactorización supera las malas prácticas de programación. </li>

                    <p>La refactorización soluciona las malas prácticas de este modo:</p>
                    <ul>
                        <li> Solución 1 </li>
                    </ul>

                </ol>
    </body>
</html>
