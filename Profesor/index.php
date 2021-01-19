<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin TSIWEEK</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../Content/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../Content/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../Content/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../Content/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../Content/dist/css/skins/_all-skins.min.css">

    <!-- ************************Scripts************************ -->
    <!-- jQuery 3 -->
    <script src="../Content/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../Content/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../Content/dist/js/adminlte.min.js"></script>
    <style>
        /* CSS used here will be applied after bootstrap.css */

        body {
            background: url('../Content/img/uam1.jpg') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .panel-default {
            opacity: 0.9;
            margin-top: 30px;
        }

        .form-group.last {
            margin-bottom: 0px;
        }
    </style>
</head>

<body class="panel-default form-group ">
    <div class="login-box">
        <div class="login-box-body">
            <img class="center-block" src="../Content/img/LOGOTSI.png" width="60%" />
            <h1 class="text-center" style="color:black"><b>ADMINISTRACIÓN</b></h1>
            <br />
            <p class="login-box-msg">Ingresar tus datos para inicio de sesión</p>

            <form method="post" id="frmLogin">
                <div class="form-group has-feedback">
                    <input type="text" id="user" name="user" class="form-control" placeholder="Usuario" required />
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" id="pass" name="pass" class="form-control" placeholder="Contraseña" required />
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="submit" id="btnLogin" class="btn btn-block btn-bitbucket" value="Iniciar sesión" />
                </div>
            </form>
            <br />
            <div>
                <p id="resp" style="color:red"></p>
            </div>
        </div>
    </div>

    <script>
        //Función que valida cuando el Formulario frmLogin ejecuta envia datos (submit)
        $("#frmLogin").submit(function(event) {
            event.preventDefault(); //Detenemos evento submit (botón Iniciar sesión)
            var str = $(this).serialize(); //Serilizamos los parametros 
            var url = '../Controller/loginPController.php'; //URL destino
            var user = document.getElementById("user").value;

            //Uso de AJAX con jQuery para consultar PHP
            $.ajax({
                data: str, //Datos rerializados
                url: url, //URL destino
                type: 'post', //Uso de envío de datos POST
                success: function(response) {
                    //Validamos respuesta.
                    if (response == "OK") {
                        location.href = "profesorinicio.php?profesor=" + user; //Si se recibe respuesta correcta redireccionamos a la página de acceso.
                        //location.href = "profesorinicio.php"; //Si se recibe respuesta correcta redireccionamos a la página de acceso.
                    } else {
                        $('#resp').html(response); //Caso contrario manda alerta en pantalla.
                        document.getElementById("frmLogin").reset();
                        setTimeout(function() {
                            $('#resp').html("");
                        }, 2000);
                    }
                }
            });
        });
    </script>
</body>

</html>