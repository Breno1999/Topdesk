<!doctype html>
<html lang="pt-br">
  <head>
    <title>Abrir solicitação</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="CSS\estilo-forms.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
    <style>
        body{
            background-color: #56baed;
        }
    </style>
  </head>
  <body>
    
  <?php
    include_once('session.php');
    include_once('verifica_acesso.php');
  ?>

    <div class="container">
        <div class="form-solicitacao">
            <div>
                <h2>Nova solicitação</h2> 
            </div>
            <div class="corpo-form-solicitacao">
                <form action="cadastrar_solicitacao.php" method="POST">
                <div class="row">  
                    <div class="form-group mx-auto col-7">
                        <label for="solicitante">Solicitante:</label>
                        <input class="form-control" type="text" name="solicitante"  value="<?php echo "$_SESSION[nome]"; ?>" maxlength="70" required>
                    </div>
                    <div class="form-group mx-auto col-5">
                        <label for="cpf">CPF:</label>
                        <input class="form-control" type="text" name="cpf" maxlength="11" value="<?php echo "$_SESSION[cpf]"; ?>"required>
                    </div>
                </div> 
                <div class="row">  
                    <div class="form-group mx-auto col-6">
                        <label for="email">Email:</label>
                        <input class="form-control" type="email" name="email"  value="<?php echo "$_SESSION[email]"; ?>" maxlength="50" required>
                    </div>
                    <div class="form-group mx-auto col-6">
                        <label for="anydesk">Anydesk:</label>
                        <input class="form-control" type="text" name="anydesk" maxlength="9" required>
                    </div>
                </div>  
                <div class="row">  
                    <div class="form-group mx-auto col-7">                      
                          <label for="tp_servico">Tipo de serviço:</label>
                          <select class="form-control" name="tp_servico" required>
                            <option>Configuração de sistema</option>
                            <option>Ovpn Serpro</option>
                            <option>Bio AC</option>
                            <option>Assinador Serpro</option>
                            <option>Token</option>>
                            <option>Certificado A1</option>
                            <option>Certificado A3</option>
                          </select>                       
                    </div>
                    <div class="form-group mx-auto col-5">                      
                          <label for="tp_cliente">Tipo de cliente:</label>
                          <select class="form-control" name="tp_cliente" required>
                            <option>AGR</option>
                            <option>Cliente Final</option>
                          </select>                       
                    </div>
                </div>  
                <div class="form-group">
                  <label for="descricao">Descrição:</label>
                  <textarea class="form-control" name="descricao" rows="3" maxlength="100" required></textarea>
                </div>

                <div >
                    <div class="row footer-form">
                        <a href="deslogar.php" class="btn btn-outline-danger mx-2">Cancelar</a>
                        <button class="btn btn-outline-dark mx-2" type="submit">Concluir</button>
                    </div>
                </div>
                
                </form>
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