<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="dist/css/style.css">

</head>
<body>
    <div id="form" class="container-fluid">
        <div class="row pt-6">
            <form action="" class="col-md-6">
                <h1>Créer un compte</h1>
    
                <div class="form-group">
                    <input type="text" name="pseudo"class="form-control" placeholder="Entrez votre pseudo">
                </div>
                <br>
                <div class="form-group">
                    <input type="password" name="password"class="form-control" placeholder="Entrez votre mot de passe">
                </div>
                <br>
                <div class="form-group">
                    <input type="password" name="confirmPassword"class="form-control" placeholder="Confirmez votre mot de passe">
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" name="role" id="role" class="form-check-input">
                    <label for="role">Je souhaite devenir un Stackoo Helper!</label>
                </div>
                <br>
                <div class="form-group">
                    <a href="login.php" class="btn btn-warning">Connexion</a>
                    <input type="submit" value="Créer mon compte" class="btn btn-primary">
                </div>
            </form>
            <div class="col-md-6 text-center">
    
            </div>
        </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

</body>
</html>