<!DOCTYPE html>
<!-- Below are the Contents for register page -->
<html lang="en">
<head>
                                                    <!-- Meta info of register page -->
  <meta charset="utf-8" />
  <meta name="description" content="Demonstrates Home Page Content" />
  <meta name="keywords" content="Home, index" />
  <meta name="author" content="Student"  />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <link href="styles.css" rel="stylesheet" />
  <title>Registration</title>

</head>
<body>

                                            <!-- here i will create body of register page -->
  <div class="homesite">
   <header >
     <div id="homepage">
     <h1 >Register to Cab Online</h1>
     <h2 >֍Welcome, Lets Get Started</h2>
   </div>
     <nav class="navmenu">

         <p >Hello!☺</p>
      </nav>

   </header>
<div class="pagecontent">
   <article align=center>
     <form id="applyform" method="post" action="login.php" novalidate="validate">
     <h2>Please fill the below fields</h2>
      <div id=docspace> </div>
     <p><label for="name"><b>Name</label>
       <input type="text" name= "name" id="name" required="required"/>
     </p>
     <p><label for="password">Password</label>
       <input type="text" name= "password" id="password" required="required"/>
     </p>
     <p><label for="cpassword">Confirm Password</label>
       <input type="text" name= "cpassword" id="cpassword" required="required"/>
     </p>
     <p><label for="email">Email</label>
       <input type="text" name= "email" id="email" required="required"/>
     </p>
     <p><label for="phone">Phone</label>
       <input type="text" name= "phone" id="phone"  required="required"/>
     </p>
     <p>	<input type= "submit" value="REGISTER" id=Mabutton /></p>
                                                                                                          <!-- link to login -->
        <p >	Already Registered?<a href="login.php">Login Here</a></p>
              <div id=docspace> </div>
            </form>
   </article>
 </div>

	<footer>
		© Rahul Rocks Private limited@2020
	</footer>
  </div>





</body>

</html>
