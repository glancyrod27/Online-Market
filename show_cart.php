<?php session_start();?>
<html>
    <head>
        <title>Online Market My Cart</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
      <div class="w3-card-4">
        <div class="w3-container w3-brown">
        <h2>Your Orders till now!!!</h2>
        </div>
        <br/>
        <br/>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $con=mysqli_connect("localhost", "root","","online_market") or die(mysqli_connect_error());
    $username=$_SESSION['username'] ;
    $query = "Select pname,putime,quantity,puprice,status from purchase where cname='".$username."'";
    $result=mysqli_query($con,$query);

    print "<table border=1>";
    print "<tr class=w3-brown>";
    print "<th>pname</th>";
    print "<th>putime</th>";
    print "<th>quantity</th>";
    print "<th>puprice</th>";
    print "<th>status</th>";
    print "</tr>";
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
      $pname = $row['pname'];
  		$putime = $row['putime'];
  		$pquantity = $row['quantity'];
      $price = $row['puprice'];
      $pstatus = $row['status'];
      print "<tr>";
  		print "<td class=w3-sand>".$pname."</td>";
  		print "<td>".$putime."</td>";
  		print "<td class=w3-sand>".$pquantity." </td>";
      print "<td>".$price."</td>";
  		print "<td class=w3-sand>".$pstatus."</td>";
      print "</tr>";
    }
    print "</table>";
}
session_destroy();
?>
    <a href="index.php"><p class="w3-text-brown">Back to homepage</p></a>
  </div>
    </body>
</html>
