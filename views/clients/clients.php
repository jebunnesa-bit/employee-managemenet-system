<?php
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bank";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE userinfo SET balance='".$amount."' WHERE userName='".$id."'";

    if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    } else {
    echo "Error updating record: " . $conn->error;
    }

    $conn->close();

///view balance

    $sql = "SELECT balance FROM userinfo WHERE userName='".$id."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()){
            $b = $row["balance"] ;
        }
        $conn->close();
    } 
    else {
        echo "0 results";
        $conn->close();
    }
    return $b;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>clients</title>
    
</head>
<body>
    <header>

      <!-- navigation  -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link navbar-brand" href="../dashboard.php">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../profile.php">Profile <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../login.php">Logout <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
    </header>
     
<section>
        <div class="d-flex justify-content-center"> <h2>Clients!!</h2> </div>
        <div class=" d-flex justify-content-around">
       
           <form class="form-inline my-2 my-lg-0 d-none">
             <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
             <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
           </form>
          <div>
          <span>search By</span>
          <select name="sortby" id="">
            <option value="Location">New york</option>
          </select>
          </div>
        </div>
</section>

<!-- main section -->
<section>
<div class="container">
    <div class="row border-bottom">
        <div class="col-2"><strong>ID</strong> </div>
        <div class="col-2"><strong>Name</strong> </div>
        <div class="col-2"><strong>Location</strong> </div>
        <div class="col-2"><strong>payment</strong></div>
        
    </div>
    <div class="row border-bottom" >
        <div class="col-2">#456112 </div>
        <div class="col-2">David Jhon </div>
        <div class="col-2">New york</div>
        <div class="col-2">$1200</div>
        <div class="col-1">allow</div>
        <div class="col-1">deny</div>
    </div>
</div>

    </section>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
