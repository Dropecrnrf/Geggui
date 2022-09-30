
<!DOCTYPE html>
<html lang="fr">

<head>
    

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Geggui  |  Inscription</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://getbootstrap.com/docs/5.0/examples/sign-in/signin.css" rel="stylesheet">
</head>

<body class="text-center">
    <main class="form-signin">
        
       
        <div class="login-form">
            <form method="post">
                
                <h1 class="h3 mb-3 fw-normal">Inscription</h1>
                <div class="form-floating">
                    <input type="text" name="pseudo" class="form-control" id="floatingInput" placeholder="User" autocomplete="off" value="<?php if (isset($pseudo)) {echo $pseudo;} ?>">
                    <label for="floatingInput">Pseudo</label>
                </div>
                
  
                <div class="form-floating">
                    <input type="email" name="email" id="floatingInput" placeholder="name@example.com" class="form-control" autocomplete="off" value="<?php if (isset($email)) {echo $email;} ?>">
                    <label for="floatingInput">Email</label>
                </div>

                <div class="form-floating">
                    <input type="password" name="password" id="floatingPassword"  placeholder="Password" class="form-control" autocomplete="off">
                    <label for="floatingPassword">Password</label>
                </div>
                    <button class="w-100 btn btn-lg btn-primary" name="formInscritpion" value="S'inscrire" type="submit">S'inscrire</button>
            </form>
            <br>
            <div class="button-go">
                 <a href="login.php">J'ai déjà un compte</a>
            </div>
           
            <p class="mt-5 mb-3 text-muted">&copy; Geggui  |  2022</p>


        </div>
        </div>
    </main>

    <script src="https://kit.fontawesome.com/4b95889e0a.js" crossorigin="anonymous"></script>
</body>

</html>