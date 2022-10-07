
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geggui | Login</title>
    <link rel="stylesheet" href="css/style.css">


    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">


    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



    <link href="https://getbootstrap.com/docs/5.0/examples/sign-in/signin.css" rel="stylesheet">
</head>
<body class="text-center">
    <main class="form-signin">
            <form method="post" action="../Controller/login.php">
            <img class="mb-4" src="../IMG/logoMini.png" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Connectez-vous</h1>

            <div class="form-floating">
                    
                    <input type="text" name="pseudo" class="form-control" id="floatingInput"  placeholder="User" autocomplete="off">
                 
                                                                                                               
                    <label for="floatingInput">Pseudo</label>
            </div>

            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="password" autocomplete="off">
                <label for="floatingPassword">Password</label>
            </div><br>
            
            <button class="w-100 btn btn-lg btn-primary" name="formConnect" type="submit">Sign in</button>
               
            </form>
             <br><br>                                                                                                   
        
            <div class="button-go">
                <a href="inscription.php">Créer un compte ?</a>
            </div>

            <p class="mt-5 mb-3 text-muted">&copy; Geggui  |  2022</p>

    </main>
    <script src="https://kit.fontawesome.com/4b95889e0a.js" crossorigin="anonymous"></script>
</body>

</html>