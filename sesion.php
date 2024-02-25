<?PHP
$user = $_POST["txtUsuario"];
$clave = $_POST["txtClave"];

?>
<html>

<head>
    <link rel="stylesheet" href="mistyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>Google</title>
</head>

<body>
    <table id="tabla" class="table table-bordered table-hover table-responsive table-fixed">
        <thead>
            <tr style="width:1000px;">
                <th style="width: 400px">Usuario </th>
                <th style="width: 400px"> Contraseña </th>
            </tr>
        </thead>

        <tbody>
            <tr style="width:1000px;">
            <td style="width:400px;"><?PHP echo $user ?></td>
            <td style="width:400px;"><?PHP echo $clave ?></td>
            </tr>
        </tbody>
    </table>

</body>

</html>