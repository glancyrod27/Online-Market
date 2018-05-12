<?php session_start();?>


<html>
    <head>
        <title>Online Market Products</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
      <div class="w3-card-4">
        <div class="w3-container w3-brown">
		        <h2>Available Products!!</h2>
  </div>

		<form action="products.php" method="POST">
    <p>  <label class="w3-text-brown"><b>Enter keyword:</b></label>
           <input class="w3-input w3-border w3-sand" type="text" name="keyword"/> </p>
		       <input type="hidden" name="parameter" value="Products_Page">
           <p><input class="w3-btn w3-brown" type="submit" value="Search"/></p>
        </form>


<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$con=mysqli_connect("localhost", "root","","online_market") or die(mysqli_connect_error());


	if($_POST['parameter']=='First_Page')
	{
		$username=mysqli_real_escape_string($con,$_POST['username']);
		$_SESSION['username'] = $username;
	}
	else
	{
		$username=$_SESSION['username'] ;
	}

	$keyword=mysqli_real_escape_string($con,$_POST['keyword']);
	$user_exists=false;
  $query = "Select count(*) as counter from customer where cname='".$username."'";
  $result=mysqli_query($con,$query);

	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
    $counter = $row['counter'];
    if($counter == 0)
    {
		    Print '<script>alert("User does not exist!!Please Sign in properly!!!");</script>';
		    Print '<script>window.location.assign("index.php");</script>';
	   }
}
	if ($keyword == '')
	{
		$query = "Select * from product";
	}
	else
	{
		$query = "Select * from product where pname like '%".$keyword."%' ";
	}
	$result = mysqli_query($con,$query);

    print "<table border=1>";
    print "<tr class=w3-brown>";
    print "<th>pname</th>";
    print "<th>pdescription</th>";
    print "<th>pprice</th>";
    print "<th>pstatus</th>";
    print "<th>Order</th>";
    print "</tr>";

	while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$pname = $row['pname'];
		$pdescription = $row['pdescription'];
		$pprice = $row['pprice'];
		$pstatus = $row['pstatus'];

        print "<tr>";
		    print "<td>".$pname."</td>";
		    print "<td class=w3-sand>".$pdescription."</td>";
		    print "<td>".$pprice." </td>";
		    print "<td class=w3-sand>".$pstatus."</td>";
        print "<td>";
        if($pstatus == "discontinued")
        {
                    print "<p></p>";
        }
            elseif($pstatus =="backordered")
            {
                        print "<p></p>";
            }
            else
            {
              print "<form action=purchase.php method=POST>";
              print "<input type=hidden name=order_parameter value='".$pname."'>";
              print "<input class=w3-amber type=submit value=Order>";
              print "</input>";
              print "</form>";
            }
        print "</td>";
		    print "</tr>";

	}
  print "</table>";
}

?>

        <a href="index.php"><p class="w3-text-brown"> Back to homepage </p></a>
      </div>
    </body>
</html>
