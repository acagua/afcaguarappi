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
                height: 100vh;
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
        </style>
    </head>
    <body>

        <div class="flex-center position-ref full-height">
                <div class="top-right links">
                    <a href="https://github.com/acagua/afcaguarappi" target="_blank">Repositorio</a>
                    <a href="{{ url('/punto1') }}">Pruebas PENDIENTE</a>
                    <a href="{{ url('/punto2') }}">Punto 2</a>
                    <a href="{{ url('/punto3') }}">Punto 3</a>
                </div>

            <div class="content">


                <div class="title m-b-md">
                    Punto 1!
                    
                </div>

                @if(Session::has('respuesta'))
                    <ul>
                    @foreach(Session::get('respuesta') as $resp)
                        <li>{{ $resp }}</li>
                    @endforeach
                    </ul>
                @endif

                <ul>
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
                {!! Form::open(array('route' => 'punto1_process', 'class' => 'form')) !!}
                <div class="form-group">
                    <!--{!! Form::label('Entrada') !!}-->

                @if(Session::has('salida'))
                    {!! Form::textarea('entrada', Session::get('salida'), 
                        array('required', 
                              'class'=>'form-control', 
                              'placeholder'=>'Entrada')) !!}
                @else
                    {!! Form::textarea('entrada', null, 
                        array('required', 
                              'class'=>'form-control', 
                              'placeholder'=>'Entrada')) !!}
                @endif
                    
                </div>

                <div class="form-group">
                    {!! Form::submit('Enviar', 
                      array('class'=>'btn btn-primary')) !!}
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </body>
</html>
