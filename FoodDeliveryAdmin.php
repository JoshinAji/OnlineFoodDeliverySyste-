<?php

  require_once('dbcustomer.php');

  $query1 = "select * from food_product where Name like '%Pizza%'";
  $result1 = mysqli_query($conn, $query1);

  $query2 = "select * from food_product where Name like '%Burger%'";
  $result2 = mysqli_query($conn, $query2);

  $query3 = "select * from food_product where Name like '%.%' or Name Like '%Waffle%' or Name Like '%Gulab%'";
  $result3 = mysqli_query($conn, $query3);

  $query4 = "select * from customer";
  $result4 = mysqli_query($conn, $query4);

  $query5 = "select delivery.Delivery_ID, customer.last_name, delivery.Payment, delivery.Date from delivery INNER JOIN customer On delivery.customer_id = customer.customers_id;";
  $result5 = mysqli_query($conn, $query5);

  $query6 = "select * from food_supply";
  $result6 = mysqli_query($conn, $query6);

?>


<!DOCTYPE html>
<html>
<head>
<title>Food Delivery POV</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<style>
body, html {height: 100%}
body,h1,h2,h3,h4,h5,h6 {font-family: "Amatic SC", sans-serif}
.menu {display: none}
.bgimg {
  background-repeat: no-repeat;
  background-size: cover;
  background-image: url("food-delivery-image.jpg");
  min-height: 90%;
}
#customers {
  font-family: "Amatic SC", sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: grey;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: lightslategray;
  color: white;
}

#delivery th{
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: lightslategray;
  color: white;
}
input[type="text"],input[type="date"],input[type="password"], input[type="number"],input[type="email"], select{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    font-size: 20px;
    background-color: black;
    color: aliceblue;
}
::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: white;
  opacity: 1; /* Firefox */
}
input[type="submit"] {
    overflow: visible;
    width: 978px;
    margin-top: 26px;
    color: white;
    background-color: black;
}

input[type="submit"]:hover {
    background-color: grey;
}

.w3-display-middle {
    position: absolute;
    top: 705px;
    left: 1033px;
    transform: translate(-50%,-50%);
    /* background-color: white; */
    /* color: black; */
}

</style>
</head>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top w3-hide-small">
  <div class="w3-bar w3-xlarge w3-black w3-opacity w3-hover-opacity-off" id="myNavbar">
    <a href="#" class="w3-bar-item w3-button">HOME</a>
    <a href="#menu" class="w3-bar-item w3-button">MENU</a>
    <a href="#menuentry" class="w3-bar-item w3-button">NEW MENU ENTRY</a>
    <a href="#CustomerQueue" class="w3-bar-item w3-button">Customer Queue</a>
    <a href="#myDeliveryDetails" class="w3-bar-item w3-button" >Delivery Details</a>
    <a href="FoodDeliveryAdmin.php" class="w3-bar-item w3-button" style="margin-left: 1242px">Admin Entry</a>
    <a href="FoodDeliveryCustomer.php" class="w3-bar-item w3-button">Customer Entry</a>
  </div>
</div>
  
<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
  <div class="w3-display-bottomleft w3-padding">
    <span class="w3-tag w3-xlarge">From: Akash V(2060313) & Joshin Aji(2060366)</span>
  </div>
  <div class="w3-display-middle w3-center">
    <!-- <span style="font-size:100px; "><b style="color:black;">Food<brcolor:black;">DELIVERY SYSTEM</b></span> -->
    <p><a href="#menu" class="w3-button w3-xxlarge w3-black">Let me see the menu</a></p>
  </div>
</header>

<!-- Menu Container -->
<div class="w3-container w3-black w3-padding-64 w3-xxlarge" id="menu">
  <div class="w3-content">
  
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">THE MENU</h1>
    <div class="w3-row w3-center w3-border w3-border-dark-grey">
      <a href="javascript:void(0)" onclick="openMenu(event, 'Pizza');" id="myLink">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Pizza</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'Pasta');">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Burger</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'Starter');">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Dessert</div>
      </a>
    </div>

    <div id="Pizza" class="w3-container menu w3-padding-32 w3-white">
    <?php
          while($row = mysqli_fetch_assoc($result1)){
            ?>

            <h1><b><?php echo $row['Food_ID']; ?>. <?php echo $row['Name']; ?></b> <span class="w3-right w3-tag w3-dark-grey w3-round">₹<?php echo $row['Price']; ?></span></h1>
            <p class="w3-text-grey"><?php echo $row['Description']; ?></p>

            <button style="background-color: darkred;color: white;"><a href="../Project/updatemenu.php?Food_ID=<?php echo $row['Food_ID'];?>" class="btn btn-success" style="text-decoration:none;">Update</a></button>
            <!-- <button style="background-color: darkred;color: white;"><a href="../Project/deletemenu.php?Food_ID=<?php echo $row['Food_ID'];?>" class="btn btn-success" style="text-decoration:none;">Delete</a></button> -->
            
            <hr>
            
            
        <?php
          }
          
        
      ?>
      </div>

    <div id="Pasta" class="w3-container menu w3-padding-32 w3-white">
       <?php
          while($row = mysqli_fetch_assoc($result2)){
            ?>

            <h1><b><?php echo $row['Food_ID']; ?>. <?php echo $row['Name']; ?></b> <span class="w3-right w3-tag w3-dark-grey w3-round">₹<?php echo $row['Price']; ?></span></h1>
            <p class="w3-text-grey"><?php echo $row['Description']; ?></p>
            <button style="background-color: darkred;color: white;"><a href="../Project/updatemenu.php?Food_ID=<?php echo $row['Food_ID'];?>" class="btn btn-success" style="text-decoration:none;">Update</a></button>
            <!-- <button style="background-color: darkred;color: white;"><a href="../Project/deletemenu.php?Food_ID=<?php echo $row['Food_ID'];?>" class="btn btn-success" style="text-decoration:none;">Delete</a></button> -->
            
            <hr>
            
            
        <?php
          }
          
        
      ?>
      </div>



    <div id="Starter" class="w3-container menu w3-padding-32 w3-white">
    <?php
          while($row = mysqli_fetch_assoc($result3)){
            ?>

            <h1><b><?php echo $row['Food_ID']; ?>. <?php echo $row['Name']; ?></b> <span class="w3-right w3-tag w3-dark-grey w3-round">₹<?php echo $row['Price']; ?></span></h1>
            <p class="w3-text-grey"><?php echo $row['Description']; ?></p>
            <button style="background-color: darkred;color: white;"><a href="../Project/updatemenu.php?Food_ID=<?php echo $row['Food_ID'];?>" class="btn btn-success" style="text-decoration:none;">Update</a></button>
            <!-- <button style="background-color: darkred;color: white;"><a href="../Project/deletemenu.php?Food_ID=<?php echo $row['Food_ID'];?>" class="btn btn-success" style="text-decoration:none;">Delete</a></button> -->
            <hr>
            
            
        <?php
          }
          
        
      ?>
      </div>
</div>
<!-- Hello -->

<!-- About Container -->
<form action="" method="post">
<div class="w3-container w3-padding-64 w3-red w3-grayscale w3-xlarge" id="menuentry">
  <div class="w3-content">
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">New Menu Entry Details</h1>

        <label style="font-size: 150%;">Food No. </label> <br>
        <input type="number" name="Food_ID" placeholder="Enter the Next Food No.">

        <label style="font-size: 150%;">Food Name </label> <br>
        <input type="text" name="Name" placeholder="Enter the Name of the Food">

        <label style="font-size: 150%;">Description</label> <br>
        <input type="text" name="Description" placeholder="Enter the Description">

        <label style="font-size: 150%;">Price</label> <br>
        <input type="number" name="Price" placeholder="Enter the Value of the New Menu">
    
    </div>
    <center><input type="submit" name="submit" value="Submit" ></center>
  </div>
 
</form>

<?php
  $FoodNo = filter_input(INPUT_POST, 'Food_ID');
  $FoodName = filter_input(INPUT_POST, 'Name');
  $Description = filter_input(INPUT_POST, 'Description');
  $Price = filter_input(INPUT_POST, 'Price');

  $host = "localhost";
    $dbusername = "root";
    $dbpassword = "000155117";
    $dbname = "fds";

    //Create connection
    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

    if(mysqli_connect_error()){
        die('Connection Error(' .mysqli_connect_errno().') '.myswqli_connect_error());
    }   
    else{
    $sql1 = "INSERT INTO food_product(Food_ID, Name, Description, Price)
    values('$FoodNo', '$FoodName', '$Description', '$Price')";

    }

    if($conn->query($sql1)){
      ?>
      <script>
          alert("New Record Entered Successfully");
      </script>
      <?php
      }
  else{
      if(isset($submit)){
        echo "Error: <br>".$conn->error;
        }
      }
  $conn->close();
  
  ?>


<!-- Contact -->
<div class="w3-container w3-padding-64 w3-blue-grey w3-grayscale-min w3-xlarge" id="CustomerQueue">
  <div class="w3-content">
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">Customer Queue</h1>
    <center><p>The Details of the Customers that Have Currently in order....</p></center>
    <table id="customers">
    <tr>
      <th><center>Name</center></th>
      <th><center>Email</center></th>
      <th><center>Phone No.</center></th>
      <th><center>Address</center></th>
      <th><center>PinCode</center></th>
    </tr>  
    <tr>
      <?php
          while($row = mysqli_fetch_assoc($result4)){
            ?>

             <td><?php echo $row['first_name']; echo " "; echo $row['last_name']; ?></td>
             <td><?php echo $row['email_id'];?></td>
             <td><?php echo $row['phone_no'];?></td>
             <td><?php echo $row['address'];?></td>
             <td><?php echo $row['pincode'];?></td>
             
            </tr>
        <?php
          }
      ?>

    </table>
  </div>
</div>
<!-- Delivery Details -->
<div class="w3-container w3-padding-64 w3-red w3-grayscale w3-xlarge" id="myDeliveryDetails">
<div class="w3-container w3-padding-64 w3-red w3-grayscale w3-xlarge" id="about">
  <div class="w3-content">
    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">Delivery Details of the Customers</h1>
    <table id="customers">
    <tr>
      <th><center>Name</center></th>
      <th><center>Delivery ID</center></th>
      <th><center>Payment</center></th>
      <th><center>Date</center></th>
    </tr>
    <tr>
      <?php
          while($row = mysqli_fetch_assoc($result5)){
      ?>
        <td><?php echo $row['last_name'];?></td>
        <td><?php echo $row['Delivery_ID'];?></td>
        <td><?php echo $row['Payment'];?></td>
        <td><?php echo $row['Date'];?></td>
      
      </tr>
      <?php
          }
    ?>
    </table>
  </div>
</div>
</div>

<!-- Stock Inventory -->

<div class="w3-container w3-black w3-padding-64 w3-xxlarge" id="StockInfo">
  <div class="w3-content">
    <div class="w3-content">
      <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">Current Food Supply</h1>
      <table id="customers">
      <tr>
        <th><center>Name</center></th>
        <th><center>Quantity</center></th>
        <th><center>Previous Stock Date</center></th>
        <th><center>Current Net Amount</center></th>
      </tr>
      <tr>
        <?php
            while($row = mysqli_fetch_assoc($result6)){
        ?>
          <td><?php echo $row['Name'];?></td>
          <td><?php echo $row['Quantity'];?></td>
          <td><?php echo $row['Date'];?></td>
          <td><?php echo $row['Amount'];?></td>
        
        </tr>
        <?php
            }
      ?>
      </table>
    </div>
  </div>
  </div>
  

<!-- Footer -->
<!-- Footer -->
<footer class="w3-center w3-black w3-padding-48 w3-xxlarge">
  <p>For:<a href="#" title="W3.CSS" target="_blank" class="w3-hover-text-green"> CIA 3: Advanced Database</a></p>
</footer>

<script>
// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-red";
}
document.getElementById("myLink").click();
</script>

</body>
</html>
