<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>La Casa del Perfume</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link href="{{ asset('css/base-styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    @yield('css')
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="#">La casa del <b>Perfume</b></a>
            <small>Aromas, Deseos y Recuerdos</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="post">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Nombre de usuario" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                        </div>
                    </div>
                    <button class="btn btn-block bg-pink waves-effect" type="submit">INICIAR SESIÓN &raquo;</button>
                    <div class="m-t-15 m-b--20">
                        <a href="">Olvidé mi contraseña</a>
                    </div>
                    <br><br>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/base-scripts.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/all.js') }}"></script>
    @yield('js')

</body>
</html>