<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body class="bg-dark">
    
    <div class="d-flex flex-column justify-content-center align-items-center vh-100">

        <div class="bg-light px-5 py-4 border rounded-sm login-box d-flex flex-column justify-content-start">
            <h3>Inicio sesión</h3>
            <form action="../APP/actions/AdminLogin.php" method="post">
                <input type="text" name="usuario" id="usuario" placeholder="usuario" class="form-control">
                <input type="password" name="password" id="password" placeholder="contraseña" class="form-control mt-2">
                <button type="submit" class="btn btn-primary mt-2">Entrar</button>
            </form>
        </div>

    </div>

</body>
</html>