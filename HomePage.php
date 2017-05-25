<style>
    form{
        background-color: #ff9dba;
        padding-left: 20px;
        padding-top: 20px;
        padding-bottom: 20px;
    }
</style>
<?php 

$dbcon=mysqli_connect("localhost","root","","test");
mysqli_select_db($dbcon,"test");
if(isset($_POST['login']))
{
    $username=$_POST['username'];
    $userpass=$_POST['password'];

    $row="SELECT * from members WHERE username='$username'AND password='$userpass'";

    $run=mysqli_query($dbcon,$row);

    if(mysqli_num_rows($run))

    {
        echo "<script>window.open('address.php','_self')</script>";

        $_SESSION['username']=$username;

    }
    else
    {
        echo "<script>alert('Username or password is incorrect!')</script>";
    }
}


if(isset($_POST['signup']))
{
    $username=$_POST['username'];
  $password=$_POST['password'];


   if($username=='')
    {
        echo"<script>alert('Please enter the username')</script>";
exit();
    }

     if($password=='')
    {
        echo"<script>alert('Please enter the password')</script>";
    exit();
    }
    $run_query=mysqli_query($dbcon,"SELECT * from members WHERE username='$username'");

    if(mysqli_num_rows($run_query)>0)
    {
echo "<script>alert('Email $username is already exist in our database, Please try another one!')</script>";
exit();
    }
    if(mysqli_query($dbcon,"INSERT INTO members (username,password) VALUES ('$username','$password')"))
    {
        echo"<script>window.open('HomePage.php','_self')</script>";
    }

}

 ?>

<!DOCTYPE html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="Content-type",content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Addressbook</title>
            <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    </head>
 <body> 
 <nav class="navbar navbar-default">
    <div class="topnav" style="background-color: #fff;padding: 50px">
 <nav class="navbar navbar-default">

    <form action="HomePage.php" method="post">
            <h2 align="center">Address Book Log in Page</h2>
            <h3> Log in </h3>
            <label for="username">Username </label>
            <input type="username" name="username" id="username" placeholder="type your user name here..."/>

            <label>Password </label>
            <input type="password" name="password" placeholder="type ur password"/>
            
            <input type="submit" name="login"class="btn btn-success btn-lg" value="Login" /> 
    </form>   
    
                        <div>
                            <form>
                                <h3> Sign up </h3>
                                 <p>
                                     Not a member yet ?
                                </p>
                                <p> 
                                    <label>Username </label>
                                    <input name="username" required="required" type="username" placeholder="Enter your name"/>
                                </p>
                                <p> 
                                    <label>Password </label>
                                    <input name="password" required="required" type="password" placeholder="Enter your password"/>
                                </p>
                                <p class="signin button"> 
                                    <input type="submit" name="signup" class="btn btn-success btn-lg" value="Register"/> 
                                </p>
                            </form>
    </div>  
    </nav>  
    
 </body> 
 </html> 