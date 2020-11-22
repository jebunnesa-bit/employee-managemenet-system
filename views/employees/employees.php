<?php

$employees = simplexml_load_file('../../models/data.xml');//open xml file
$eid = "";
$ename = "";
$ephone = "";
$eemail = "";
$edesignation = "";

//insert
if(isset($_POST['add'])){
  $employee = $employees->addChild('employee');
  $employee->addAttribute('id',$_POST['id']);
  $employee->addChild('name',$_POST['name']);
  $employee->addChild('phone',$_POST['phone']);
  $employee->addChild('email',$_POST['email']);
  $employee->addChild('designation',$_POST['designation']);
  file_put_contents('../../models/data.xml',$employees->asXML());
  header('Location: employees.php');

}
//delete
if(isset($_GET['action'])){
  $id = $_GET['id'];
  $index = 0;
  $i= 0;

  foreach($employees->employee as $employee){
    if($employee['id'] == $id){
      $index = $i;
    break;
    }
    $i++;
  }

  unset($employees->employee[$index]);
  file_put_contents('../../models/data.xml',$employees->asXML());
}

//edit

if(isset($_POST['update'])){
  foreach($employees->employee as $employee){
    if($employee['id'] == $_POST['eid']){
        $employee['id'] = $_POST['eid'];
        $employee->name = $_POST['ename'];
        $employee->phone = $_POST['ephone'];
        $employee->email = $_POST['eemail'];
        $employee->designation = $_POST['edesignation'];
    break;


    }}
  file_put_contents('../../models/data.xml',$employees->asXML());
  header('Location: employees.php');
 
  foreach($employees->employee as $employee){
    if($employee['id'] == $_POST['eid']){
      $eid = $employee['id'];
      $ename = $employee->name;
      $ephone = $employee->phone;
      $eemail = $employee->email;
      $edesignation = $employee->designation;
    break;
    }
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

    <title>employees</title>
    
</head>
<body>
    <header>
        <!-- navigation  -->
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

    <section >
        <div class="d-flex justify-content-center"> <h2>Employees!!</h2> </div>
        
        <div class=" d-flex justify-content-around">
        <form class="form-inline my-2 my-lg-0">
        <button class="btn btn-outline-success mr-5 my-2 my-sm-0" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Add new</button>
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <div>
    <span>Sort By</span>
    <select name="sortby" id="">
            <option value="teacher">Teacher</option>
            <option value="engineer">engineer</option>
            <option value="Cheif">Cheif</option>
            <option value="Theif">Theif</option>
            <option value="Politician">Politician</option>
        </select>
    </div>
        
        </div>
        <div class="collapse" id="collapseExample">
        <form class="form-inline my-2 my-lg-0" method="post">
  <div class="container">
  <div class="row">
    
    <div class="col-2">
   
      <input class="form-control mr-sm-2" type="text" name="id" placeholder="ID" aria-label="ID" required>
   
    </div>
    <div class="col-2">
    
      <input class="form-control mr-sm-2" type="text" name="name"  placeholder="name" aria-label="name" required>
   
    </div>
    <div class="col-2">
    
      <input class="form-control mr-sm-2" type="text" name="phone" placeholder="phone" aria-label="phone" required>
   
    </div>
    <div class="col-2">
    
      <input class="form-control mr-sm-2" type="email" name="email" placeholder="email" aria-label="email" required>
    
    </div>
    <div class="col-2">
   
      <input class="form-control mr-sm-2" type="text" name="designation" placeholder="designation" aria-label="designation" required>
   
    </div>
    <div class="col-2">
   
      <input class="btn btn-outline-success ml-3" type="submit" name="add" value="Add">
    
    </div>
  </div>
  </div>
  </form>
</div>

    </section>
<!-- main section -->
    <section>
<div class="container">
    <div class="row border-bottom">
        <div class="col-2"><strong>ID</strong> </div>
        <div class="col-2"><strong>Name</strong> </div>
        <div class="col-2"><strong>Phone</strong></div>
        <div class="col-2"><strong>Email</strong></div>
        <div class="col-2"><strong>Designation</strong></div>
    </div>
    <div class="row border-bottom" >
      <?php foreach($employees->employee as $employee){?>
        <div class="col-2"><?php echo $employee['id'];?></div>
        <div class="col-2"> <?php echo $employee->name;?></div>
        <div class="col-2"><?php echo $employee->phone;?></div>
        <div class="col-2"><?php echo $employee->email;?></div>
        <div class="col-2"><?php echo $employee->designation;?></div>
        <div class="col-1"><a href="employees.php?id=<?php echo $employee['id'];?>" name="edit" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2"> edit</a> </div>
        <div class="col-1"><a href="employees.php?action=delete&id=<?php echo $employee['id'];?>" onclick="return confirm('Are you sure?')"> delete</a></div>
      <?php }?>
    </div>
    <div class="collapse" id="collapseExample2">
        <form class="form-inline my-2 my-lg-0" method="post">
  
  <div class="row">
    
    <div class="col-2">
   
      <input class="form-control mr-sm-2" type="text" value = "<?php echo $eid;?>" name="eid" placeholder="ID" aria-label="ID" required>
   
    </div>
    <div class="col-2">
    
      <input class="form-control mr-sm-2" type="text" value = "<?php echo $ename;?>"name="ename"  placeholder="name" aria-label="name" required>
   
    </div>
    <div class="col-2">
    
      <input class="form-control mr-sm-2" type="text" value = "<?php echo $ephone;?>"name="ephone" placeholder="phone" aria-label="phone" required>
   
    </div>
    <div class="col-2">
    
      <input class="form-control mr-sm-2" type="email" value = "<?php echo $eemail;?>"name="eemail" placeholder="email" aria-label="email" required>
    
    </div>
    <div class="col-2">
   
      <input class="form-control mr-sm-2" type="text" value = "<?php echo $edesignation;?>"name="edesignation" placeholder="designation" aria-label="designation" required>
   
    </div>
    <div class="col-2">
   
      <input class="btn btn-outline-success ml-3" type="submit" name="update" value="Update">
    
    </div>
  </div>
  
  </form>
</div>
</div>

    </section>
    

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>