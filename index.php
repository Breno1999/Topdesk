<!doctype html>
<html lang="pt-br">
  <head>
    <title>Entrar</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="CSS\estilo_login.css"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  

</head>
  <body>

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div id="larg_logo" class="fadeIn first">
            <img src="https://alvocertificadodigital.com.br/wp-content/uploads/2021/12/logo.svg" id="icon" alt="User Icon" />
            </div>
            <br>
            <!-- Login Form -->
            <form action="logar.php" method="POST">
              <input type="text" id="login" class="fadeIn second" name="login" placeholder="Usuário" required>
              <input type="password" id="senha" class="fadeIn third" name="senha" placeholder="Senha" required>
              <input type="submit" class="fadeIn fourth" name="entrar" value="Entrar">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
            <p >Esqueceu sua senha? <b>Contate um administrador.<b></p>
            </div>

        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>