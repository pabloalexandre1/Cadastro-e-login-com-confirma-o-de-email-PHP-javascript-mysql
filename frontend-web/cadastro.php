<!DOCTYPE html> 
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    
        <link rel="stylesheet" href="styles/styleLogin.css">
    
</head>
<body>

    <header>
        <nav class= "navbar navbar-expand-md navbar-light navbar-transparente">
          <div class="container">
            <a href="index.html" class="navbar-brand">
              <img src="img/logo-of.jpg" alt=""  width="40" class="img-fluid">
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal">
              <i class="fas fa-bars text-white"></i>
            </button>
            <div class="collapse navbar-collapse" id="nav-principal">
              <ul class="navbar-nav ml-auto" >
               <li class="nav-item m-auto">
                  <a href="index.php" class="nav-link" id="link-custom">Home</a>
                </li>
                <li class="nav-item m-auto">
                  <a href="#" class="nav-link" id="link-custom">Loja</a>
                </li>
                <li class="nav-item m-auto">
                  <a href="https://github.com/pabloalexandre1/estudos" class="nav-link" id="link-custom">Modalidades</a>
                </li>
  
                <li class="nav-item divisor m-auto">
  
                </li>
  
                <li class="nav-item m-auto">
                  <a href="login.php" class="nav-link" id="link-custom">Login/Cadastro</a>
                </li>
                
  
              </ul>
            </div>
          </div>
        </nav>
      </header>

    <div id="loginform">
        
        <img src="img/logo-of.jpg" alt="" id="logo-form">
        <h1>INSIRA OS DADOS A SEREM</br>CADASTRADOS NA SUA CONTA</h1>
        <h2>Nome de usuário</h2>
        <input type="text" placeholder="UserName" class="textinput" id="username">
        <div class="space"></div>
        <h2>informe seu e-mail</h2>
        <input type="email" placeholder="E-mail" class="textinput" id="email">
        
        <input type="email" placeholder="Confirme o E-mail" class="textinput" id="confirmaemail">
        <div class="space"></div>
        <h2>Escolha sua senha</h2>
        <input type="password" placeholder="Senha" class="textinput" id="password">
       
        <input type="password" placeholder="Confirme a senha" class="textinput" id="confirmapassword">
        <div id="errorspace"></div>
        <button id="submit">Cadastrar</button>
        
        <a href="login.php">Já tem uma conta? faça login clicando <span>aqui.</span></a>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="js/register.js"></script>

</body>
</html>