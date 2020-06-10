<!DOCTYPE html>
                                        <!-- Below are the Contents for booking confrmation page -->
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Demonstrates Home Page Content" />
  <meta name="keywords" content="Home, index" />
  <meta name="author" content="Student"  />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <link href="styles.css" rel="stylesheet" />
  <title>Booking Info</title>

</head>
<body>


  <div class="homesite">
   <header >
     <div id="homepage">
     <h1 >Booking Details</h1>

   </div>
   <nav class="navmenu">


    </nav>

   </header>
<div class="pagecontent">


        <?php

        function checkData(){                                                         //data validatioin
          $flag=true;
          $emailid=($_POST["email"]);
          $name=($_POST["pname"]);
          $unitnumber=($_POST["unumber"]);
          $phonenumber=($_POST["phone"]);
          $snumber=($_POST["snumber"]);
          $sname=($_POST["sname"]);
          $suburb=($_POST["suburb"]);
          $Dsuburb=($_POST["Dsuburb"]);
          $pickdate=($_POST["pickdate"]);
          $picktime=($_POST["picktime"]);


          if(($phonenumber=="")||($name=="")||($snumber=="")||($sname=="")||($suburb=="")||($Dsuburb=="")||($pickdate=="")||($picktime==""))
          {
            echo "<p>Sorry All fields MUST be filled except UNITNUMBER</p>";
            $flag= false;
          }
else{
  $flag=true;
}



$pickDate=strtotime($pickdate);                                                            //pick up date and time check
$endDate=strtotime(date('Y/m/d'));
$diff=   $pickDate-$endDate;
$pickTime=strtotime($picktime);
$endTime=strtotime("now");
if($diff==0)
{


  //echo "TimeLoooop";
//  echo "<p>picktime-$pickTime</p>";
    //echo "TimeLoooop";
  //  echo "<p>currenttime$endTime</p>";
  $tiff= $pickTime-$endTime;
  //echo ($tiff)/60;

    if(((($tiff)/60)<40 ) )
    {
        $flag= false;
        echo "<p>Pick Time must be greater than 40 minutes.Booking Failed!</p>";
    }


}

  if($diff<0)
  {
    echo "<p>Pick Date has passed..Booking Failed!</p>";
    $flag= false;
  }




return $flag;
        }



          function sendTheMail($name, $record, $picktime, $pickdate, $emailid){                           //ths function will send the mail

            $to =   $emailid;
    $subject = "Your Booking Request with CabsOnline";

    $message = "Dear $name,
     Thanks for booking with CabsOnline! Your
booking reference number is BTXX $record.
 We will pick up the
passengers in front of your provided address at $picktime on
$pickdate.";

  $header = "From:booking@cabsonline.com.au";

    $retval = mail ($to,$subject,$message,$header, "-fsinhar.sinhaucd@gmail.com");

    if( $retval == true ) {
       echo "We have also send an Email Message";
    }else {
       echo "Message could not be sent...";
    }

          }



        function storeBooking()
        {

        $err_msg="";
        $emailid=($_POST["email"]);
        $name=($_POST["pname"]);
        $unitnumber=($_POST["unumber"]);
        $phonenumber=($_POST["phone"]);

        $snumber=($_POST["snumber"]);
        $sname=($_POST["sname"]);
        $suburb=($_POST["suburb"]);
        $Dsuburb=($_POST["Dsuburb"]);
        $pickdate=($_POST["pickdate"]);
        $picktime=($_POST["picktime"]);

        // connect to db, create table, insert record
        //require_once "settings.php";	// Load MySQL log in credentials
        	require_once "settings.php";
        $conn = mysqli_connect ($host,$user,$pwd,$sql_db);	// Log in and use database
                                                                                          //create bookings table
        if ($conn) {                                                                // check is database is available for use
        $query = "CREATE TABLE IF NOT EXISTS BOOKINGS (
        bookingid INT AUTO_INCREMENT PRIMARY KEY,
        emailid VARCHAR(50) Not Null,
        name VARCHAR(50) Not Null,
        unitnumber VARCHAR(50) Null,
        phonenumber VARCHAR(50) Not Null,

        snumber VARCHAR(50) Not Null,
        sname VARCHAR(50) Not Null,
        suburb VARCHAR(50) Not Null,
        Dsuburb VARCHAR(50) Not Null,
        pickdate VARCHAR(50) Not Null,
        picktime VARCHAR(50) Not Null,
        status VARCHAR(50) Not Null,
        FOREIGN KEY (`emailid`) REFERENCES CUSTOMERS (`emailid`)
        );";

        $result = mysqli_query ($conn, $query);
        if ($result) {								// check if query was successfully executed

          $query2= "select MAX(bookingid) as total from BOOKINGS";

        $query = "INSERT INTO BOOKINGS ( emailid, name, unitnumber, phonenumber, snumber, sname, suburb, Dsuburb, pickdate, picktime, status)
        VALUES (  '$emailid', '$name', '$unitnumber', '$phonenumber','$snumber', '$sname', '$suburb', '$Dsuburb', '$pickdate', '$picktime', 'unassigned' );";

        $insert_result = mysqli_query ($conn, $query);
        $bookingId_result = mysqli_query ($conn, $query2);
        $record= mysqli_fetch_assoc($bookingId_result);
        $record=$record['total']+1;
        if ($insert_result) {			// check if insert successfully
        echo "<p><b>Thank you!</p><p> Your Booking Number is BTXX$record.We will pick up the passenger in front of address on $pickdate At $picktime</p>";
        sendTheMail($name, $record, $picktime, $pickdate, $emailid);
        $emailflag=true;
        } else {
        echo "<p>Error occured.</p>";
        }
        } else {
        echo "<p>Create table operation unsuccessful.</p>";
        }
        mysqli_close ($conn);					// Close the database connect
        } else {
        echo "<p>Unable to connect to the database.</p>";
        }
        }

        if (checkdata()){

            storeBooking();
        }


        ?>

                <div id=docspace> </div>



   </article>
 </div>

	<footer>
		© Work hard Party harder private limited@2020
	</footer>
  </div>
</body>

</html>
