<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="index.php">
    <img src="school_logo.jpg" width="40" height="40" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link active" href="students.php">Students</a>
      <a class="nav-item nav-link active" href="form.php">Register</a>
      <a class="nav-item nav-link active" href="signup.php">SignUp</a>
      <a class="nav-item nav-link active" href="login.php">Login</a>
      
    </div>
  </div>
</nav>

    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <form class="p-5 rounded shadow" style="width: 30rem;" action="auth.php" method="POST">
            <h1 class="text-center pb-5 display-4 headings">LOGIN</h1>
            <?php if(isset($_GET['error'])) {?>
            <div class="alert alert-danger" role="alert">
                <?=$_GET['error']?>
            </div>
            <?php }?>
            <div class="mb-3">
                <label for="Email" class="form-label headings">Email address</label>
                <input type="email" class="form-control" name="email" id="Email" aria-describedly="emailHelp">
                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
            </div>
            <div class="mb-3">
                <label for="Password" class="form-label headings">Password</label>
                <input type="password" class="form-control" name="password" id="Password">               
            </div>
            <button type="submit" class="btn btn-success">Login</button>
    </form>
</div>
</body>
</html>