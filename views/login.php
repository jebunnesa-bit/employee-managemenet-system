<?php
//checking submit form
if(isset($_POST['login'])){


if(!empty($_POST['username']) && !empty($_POST['password']))
{
   if($_POST['username'] == "admin" && $_POST['password'] == "123"){ //checking user and password 
    header("Location: dashboard.php");
}
}
else{
    header("Location: login.php");

}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>login</title>
</head>

<body>
<form action="" method="post">
<div class="container">
        <table>
            <tbody>
                <tr>
                    <td><label for="username">username:</label></td>
                    <td><input type="text" name="username" id="" value="" required></td>
                </tr>
                <tr>
                    <td><label for="password">password:</label></td>
                    <td><input type="password" name="password" id="" value="" required></td>
                </tr>

                <tr>
                    <td><input type="submit" name="login" value="Login" ></td>
                </tr>
            </tbody>
        </table>
    
    </div>
</form>
    
</body>

</html>