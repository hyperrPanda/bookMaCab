<!DOCTYPE html>
                                        <!-- Below are the Contents for login page -->
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Demonstrates Home Page Content" />
  <meta name="keywords" content="Home, index" />
  <meta name="author" content="Student"  />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <link href="styles.css" rel="stylesheet" />
  <title>Login Page</title>

</head>
<body>

  <div class="homesite">
   <header >
     <div id="homepage">
     <h1 >Lets Login</h1>
     <h2>֍Get 100% off on first ride</h2>
   </div>
   <nav class="navmenu">


    </nav>

   </header>
<div class="pagecontent">                                             <!-- Below are the Contents for login page Body -->
   <article align=center>


                                                                                  <!-- Here is the PHP code to create table -->
<?php

if(isset($_POST["email"]))
{
$emailflag=false;
function checkTheEmail(){
  $tmpvar=true;
  $emailid=($_POST["email"]);

	$query = "SELECT * FROM CUSTOMERS WHERE emailid = '$emailid'";
  require_once "settings.php";
  $conn1 = mysqli_connect ($host,$user,$pwd,$sql_db);	// Log in and use database

 	if ($conn1) { // check is database is available for use
      //  echo "Loop1";
 		$result = mysqli_query ($conn1, $query);
if($result){$record= mysqli_fetch_assoc($result);
 		if ($emailid=$record['emailid'] ) {								                                                             // check if query was successfully executed
        //echo "Loop2";
 			$tmpvar=true;}
     else {
      // echo "Loop5";

 			$tmpvar=false;
 		}
  }
else {$tmpvar=false;}
 		mysqli_close ($conn1);					                                                      // Close the database connect
  }
  else {
 		echo "<p>Unable to connect to the database.</p>";
 	}
return $tmpvar;
}





function checkThePassword(){
  $password=($_POST["password"]);
  $cpassword=($_POST["cpassword"]);
  if ($password==$cpassword){return true;}else{return false;}
}

function registerTheUser(){

$err_msg="";
$emailid=($_POST["email"]);
$name=($_POST["name"]);
$password=($_POST["password"]);
$phonenumber=($_POST["phone"]);

// connect to db, create table, insert record
//require_once "settings.php";	// Load MySQL log in credentials
	require_once "settings2.php";
$conn = mysqli_connect ($host,$user,$pwd,$sql_db);	// Log in and use database

if ($conn) { // check is database is available for use
$query = "CREATE TABLE IF NOT EXISTS CUSTOMERS (
emailid VARCHAR(50) PRIMARY KEY,
name VARCHAR(50),
password VARCHAR(50),
phonenumber VARCHAR(50)
);";

$result = mysqli_query ($conn, $query);
if ($result) {							                                                           	// check if query was successfully executed


$query = "INSERT INTO CUSTOMERS (emailid, name, password, phonenumber)
VALUES ('$emailid', '$name', '$password', '$phonenumber');";

$insert_result = mysqli_query ($conn, $query);

if ($insert_result) {			                                                                // check if insert successfully
echo "<p>Congrats! Registartion Successful.Login Now</p>";
$emailflag=true;
} else {
echo "<p>Error occured. Registration Failed</p>";
}
} else {
echo "<p>Create table operation unsuccessful.</p>";
}
mysqli_close ($conn);				                                                 	// Close the database connect
} else {
echo "<p>Unable to connect to the database.</p>";
}
}

function checkTheData(){                                                         //data validatioin
  $flag=true;
  $emailid=($_POST["email"]);
  $name=($_POST["name"]);
  $password=($_POST["password"]);
  $cpassword=($_POST["cpassword"]);
  $phone=($_POST["phone"]);



  if(($phone=="")||($name=="")||($cpassword=="")||($name=="")||($password=="")||($emailid==""))
  {
    echo "<p>Sorry All fields MUST be filled to REGISTER</p>";
    $flag= false;
  }
else{
$flag=true;
}
return $flag;
}                                                                            //Main program

function RegisterUser(){

  If (checkTheData()){
    If(checkTheEmail())
    {
        echo "<p>This Emailid is already registered.Try Again with Newid</p>";

    } else {
      if(checkThePassword()){ registerTheUser();}else{echo "<p>Password and Confirm Password do not match.Try Again</p>";}

    }
  }


}

RegisterUser();








}


?>




  <div id=docspace> </div>
  <form id="applyform2" method="post" action="booking.php" novalidate="novalidate">
     <p><label for="email"><b>Email</label>
       <input type="text" value="<?php
       if(isset($_POST["email"]))

       echo htmlspecialchars($_POST["email"]);
     ?>" name= "email" id="email"  required="required"/>
     </p>

     <p><label for="password">Password</label>
       <input type="text" name= "password" id="password" required="required"/>
     </p>

      <div id=docspace> </div>

     <p>	<input type= "submit" value="Enter" id=Mabutton /></p>
                                                                       <!-- link to login -->
        <p >	New Member?<a href="register.php">Register Here</a></p>

        <div id=docspace> </div>
            </form>
   </article>
 </div>

	<footer>
		© Hard Work Pays Private limited@2020
	</footer>
  </div>
</body>

</html>
