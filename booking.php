<!DOCTYPE html>
                                            <!-- Below are the Contents for booking page -->
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Demonstrates Home Page Content" />
  <meta name="keywords" content="Home, index" />
  <meta name="author" content="Student"  />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <link href="styles.css" rel="stylesheet" />
  <title>The Booking</title>

</head>
<body>

  <div class="homesite">
   <header >
     <div id="homepage">
     <h1 >Do the B</h1>
     <h2>֍Fast you do Fast you get</h2>
   </div>
   <nav class="navmenu">

       <p ></p>
    </nav>

   </header>
<div class="pagecontent">
   <article align=center>



     <?php
     function LoginTheUser()                                                              //check user credentials
     {


       $emailid=($_POST["email"]);
       $password=($_POST["password"]);
      $query = "SELECT * FROM CUSTOMERS WHERE emailid = '$emailid' and password='$password'";
       require_once "settings.php";
       $conn1 = mysqli_connect ($host,$user,$pwd,$sql_db);	                           // Log in and use database

        if ($conn1) {                                                               // check is database is available for use
           //  echo "Loop1";
          $result = mysqli_query ($conn1, $query);

     $record= mysqli_fetch_assoc($result);
          if ($record) {							                                                 	// check if query was successfully executed
             //echo "Loop2";

              echo "<p>Login Successful.</p>";}
          else {
           // echo "Loop5";

              echo "<p>Login Failed.Try Login Again</p>";
          }

  }
       else {
          echo "<p>Unable to connect to the database.</p>";
        }

   }

     if((isset($_POST["email"]))&&(isset($_POST["password"])))
     {

 LoginTheUser();

}

     ?>



     <h2>Enter Booking Details</h2>
      <div id=docspace> </div>
      <form id="applyform" method="post" action="bookingconf.php" novalidate="novalidate">


     <p><label for="pname"><b>Passenger Name</label>
       <input type="text" name= "pname" id="pname" required="required"/>
     </p>
     <p><label for="email"><b>Emailid</label>
       <input type="text" name= "email" value="<?php
       if(isset($_POST["email"]))

       echo htmlspecialchars($_POST["email"]);
     ?>" id="email"  required="required"/>
     </p>

     <p><label for="phone">Passenger Phone Number</label>
       <input type="text" name= "phone" id="phone"pattern="[A-Za-z0-9]{1,20}" required="required"/>
     </p>
     <p align=left> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-Pick Up Address->>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>></p>
     <p><label for="unumber">  Unit Number</label>
       <input type="text" name= "unumber" id="unumber"pattern="[A-Za-z0-9]{1,20}" required="required"/>
     </p>
     <p><label for="snumber">   Street Number</label>
       <input type="text" name= "snumber" id="snumber"pattern="[A-Za-z0-9]{1,20}" required="required"/>
     </p>
     <p><label for="sname">   Street Name</label>
       <input type="text" name= "sname" id="sname"pattern="[A-Za-z0-9]{1,20}" required="required"/>
     </p>
     <p><label for="suburb">   Suburb</label>
       <input type="text" name= "suburb" id="suburb"pattern="[A-Za-z0-9]{1,20}" required="required"/>
     </p>

   <p align=left> <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>></p>

   <p><label for="Dsuburb">   Destination Suburb</label>
     <input type="text" name= "Dsuburb" id="Dsuburb"pattern="[A-Za-z0-9]{1,20}" required="required"/>
   </p>
   <p><label for="pickdate">  Pick Up Date</label>
     <input type="date" name= "pickdate" id="pickdate"  required="required"/>
   </p>
   <p><label for="picktime">  Pick Up Time</label>
     <input type="time" name= "picktime" id="picktime"pattern="[A-Za-z0-9]{1,20}" required="required"/>
   </p>


     <p>	<input type= "submit" value="BookMaCab" id=Mabutton /></p>
                                                                                                          <!-- link to login -->
            </form>
              <div id=docspace> </div>

   </article>
 </div>

	<footer>
		© You get what you give Labs@ 2020
	</footer>
  </div>
</body>

</html>
