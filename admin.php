<!DOCTYPE html>
                                                                                            <!-- Below are the Contents for admin-->
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Demonstrates Home Page Content" />
  <meta name="keywords" content="Home, index" />
  <meta name="author" content="Student"  />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <link href="styles.css" rel="stylesheet" />
  <title>Admin</title>

</head>
<body>

  <div class="homesite">
   <header >
     <div id="homepage">
     <h1 > Admin Page </h1>
     <h2>֍Lets Book some Cabs</h2>
   </div>
     <nav class="navmenu">

      </nav>

   </header>
<div class="pagecontent">
   <article>


        <p><b>Click Below to view pick up time within 3 hours</p>

          <form action="admin.php" method="post">
     			<input type="submit" value="ListAll"  method="post"/>
          </form>

          <?PHP

            function getCustomerName($conn, $email )                                      // This function willl get the custoemr name using prim key

            {
                $cName="";
                    //echo "Email is $email";

                          $query2="SELECT name FROM `CUSTOMERS` where emailid='$email' ";

                          if ($conn) { // check is database is available for use
                            //echo "valueeees found";
                            $result = mysqli_query ($conn, $query2);
                            if ($result) {								                          // check if query was successfully executed

                              $record = mysqli_fetch_assoc ($result);
                              if ($record) {
                                	$cName= $record['name'];
                                                       		                   // check if any record exists

            }
          }
        }
        return $cName;
      }
            function displayRecords(){



            require_once "settings.php";                                        	// Load MySQL log in credentials
          	$conn = mysqli_connect ($host,$user,$pwd,$sql_db);	                  // Log in and use database
///////////////////////////////
if((isset($_POST["rnum"]))&&($_POST["rnum"]!==" "))                                     //This snippet will asssign cab to the bookin id
{
  $booknum= $_POST["rnum"];
  $query1= "Select * from BOOKINGS where bookingid=$booknum";

    if ($conn) { // check is database is available for use

      $result = mysqli_query ($conn, $query1);
      $data= mysqli_fetch_array($result, MYSQLI_NUM);
      if ($data[0]>1) {								// check if query was successfully executed

        $query= "update BOOKINGS set status='assigned' where bookingid=$booknum";
        $result = mysqli_query ($conn, $query);
        echo "<p>The booking request $booknum has been nicely assigned </p>";
      }
      else{ echo "<p>Invalid booking id. Please Try again</p>";}
}
}


      $query="SELECT *, CONCAT(snumber,'/',unitnumber,' ',sname,',',suburb) as mainaddress FROM `BOOKINGS`";

            /////////////////////////
            if ($conn) {                                                                // check is database is available for use

              $result = mysqli_query ($conn, $query);
              $todayDate=strtotime(date('Y/m/d'));
              $currentTime=strtotime("now");
              if ($result) {							                                                     	// check if query was successfully executed

                $record = mysqli_fetch_assoc ($result);
                if ($record) {						                                                      	// check if any record exists

                  echo "<table border='1'>";
                  echo "<tr><th>Reference</th><th>Customer Name</th><th>Passenger Name</th><th>Passenger Contact Phone</th><th>Pick-up address</th><th>Destinatin Suburb</th><th>pick-time</th><th>Status</th></tr>";
                  while ($record) {

                      $pickDate=strtotime($record['pickdate']);
                    if( $pickDate-$todayDate==0)
                    {
                      $pickTime=strtotime( $record['picktime']);
                      $tiff=($pickTime-$currentTime)/60;
                      //echo "<<$tiff>>";
                              if(((($tiff)/60)<180 )&& ($record['status']=='unassigned')&&($currentTime<$pickTime))
                              {
                                echo "<tr><td>{$record['bookingid']}</td>";
                                $tmpemail=$record['emailid'];
                                $cName= getCustomerName($conn, $tmpemail);
                                echo "<td>$cName</td>";
                                echo "<td>{$record['name']}</td>";


                                    echo "<td>{$record['phonenumber']}</td>";

                                        echo "<td>{$record['mainaddress']}</td>";


                                        echo "<td>{$record['Dsuburb']}</td>";
                                        echo "<td>{$record['picktime']}</td>";
                                        echo "<td>{$record['status']}</td></tr>";
                              }

                    }


                    $record = mysqli_fetch_assoc($result);
                  }
                  echo "</table>";
                  mysqli_free_result ($result);	// Free up resources
                } else {
                  echo "<p>No records retrieved.</p>";
                }
              } else {
                echo "<p>Bookings table doesn't exist or select operation unsuccessful.</p>";
              }
              mysqli_close ($conn);					// Close the database connect
            } else {
              echo "<p>Unable to connect to the database.</p>";
            }


}

displayRecords();                                                                     //this function will load data within 3 hours

          ?>
<div id=docspace> </div>
          <form action="admin.php" method="post">
            <p> <label for="rnum">Reference Number</label>  </p>
              <input type="text" name="rnum" id="rnum" required="required"/>
              	<input type="submit" value="update"  method="post"/>
          </form>

   </article>
 </div>

    <div id=docspace> </div>



	<footer>
		© Money saved is Money Gained private limited
	</footer>
  </div>
</body>

</html>
