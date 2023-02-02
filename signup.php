<?php
include("dbh.php");
?>
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

<?php
$email=$password='';
$errors=array('email'=>'','password'=>'');
if(isset($_POST['save'])){
    
    //checking for email validation
    if(empty($_POST['email'])){
        $errors['email']='email cannot be empty<br/>';
    }else{
        $email=$_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email']='email must be a valid address';
        }
    }
    //checking for password validation
    if(empty($_POST['password'])){
        $errors['password']='password cannot be empty<br/>';
    }else{
        $password=$_POST['password'];
        $uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
}else{
    echo 'Strong password.';
}
    }
    if(array_filter($errors)){
        //echo 'there are errors in the form';
    }else{
        //echo 'no errors in the form';
        /*$statement = $databaseConnection ->prepare(
            "INSERT INTO sample(firstname, lastname, email, course)
            VALUES ($firstname, $lastname, $email, $course)");
            $statement ->execute();*/
            try
            {
                $query = "INSERT INTO users (email, password) VALUES (:email,:password)";
                $query_run = $databaseConnection ->prepare($query);
                $data = [
                    ':email' => $email,
                    ':password' => $password,
                ];
                $query_execute = $query_run-> execute($data);
                if($query_execute){
                    echo '<script> alert("Data added Successfully")</script>';
                }else{
                    echo '<script> alert("Data NOT added Successfully")</script>';
                }
            }catch(PDOException $err){
                echo $err->getmessage();
            }
    }

}

?>
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
<div class="col-md-4 offset-md-4">
<h5 class="headings">Enter your details</h5>
<form action="index.php" method="POST">
    <div class="form-group">

        <div class="form-group">
        <input type="text" name="email" placeholder="Enter email" class="form-control" value="<?php echo $email ?>">
        <div class="text-danger"><?php echo $errors['email']; ?></div>
        </div>

        <div class="form-group">
        <input type="password" name="password" placeholder="Enter password" class="form-control" value="<?php echo $password ?>">
        <div class="text-danger"><?php echo $errors['password']; ?></div>
        </div>
        <button name="save" class="btn btn-primary">Sign Up</button>
    </form>
    </div>
</body>
</html>
