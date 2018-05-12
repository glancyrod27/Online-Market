<?php session_start();?>
<html>
    <head>
        <title>Online Market Purchase</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $con=mysqli_connect("localhost", "root","","online_market") or die(mysqli_connect_error());
    $username=$_SESSION['username'] ;
    $pname=mysqli_real_escape_string($con,$_POST['order_parameter']);
    $status="pending";

    $query = "Select count(*) as counter from purchase where pname='".$pname."' and cname='".$username."' and status='".$status."'";
    $result=mysqli_query($con,$query);

    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
      $counter = $row['counter'];
      $query = "Select pprice as price from product where pname='".$pname."'";
      $result1=mysqli_query($con,$query);
      while($row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC))
      {
        $price = $row1['price'];
      }
      if($counter==0)
      {
        $query="insert into purchase values('".$username."','".$pname."',NOW(),1,".$price.",'".$status."')";
      }
      else
      {
        $query="update purchase set puprice=puprice+".$price." , quantity=quantity+1,putime=NOW() where cname='".$username."' and pname='".$pname."' and status='".$status."'";
      }
        mysqli_query($con,$query);
    }
    print "<div class=w3-card-4><div class=w3-brown class=w3.container><h2>Successfully Ordered the item!!!</h2></div><br/>";
    print "<form action=show_cart.php method=POST>";
    print "<input class=w3-brown type=submit value=Show_My_Cart>";
    print "</input>";
    print "</form>";

}
?>

      <a href="index.php"><p class="w3-text-brown"> Back to homepage</p></a>
    </div>
    </body>
</html>
