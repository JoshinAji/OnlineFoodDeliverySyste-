<?php

    require_once('dbcustomer.php');
  
    if(isset($_GET['Food_ID'])){
        $id = $_GET['Food_ID'];
    

        $query = "select * from food_product where Food_ID = '$id' ";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Query Failed".mysqli_error());
        }
        else{
            $row = mysqli_fetch_assoc($result);
            print_r($row);
        }
    }
?>


<?php
    require_once('dbcustomer.php');
    if(isset($_POST['Update'])){
        
        $id = $_POST['Food_ID'];
        $name = $_POST['Name'];
        $desc = $_POST['Description'];
        $price = $_POST['Price'];

        $query = "update food_product set Food_ID = '$id', Name = '$name', Description = '$desc', Price = '$price' where Food_ID ='$id'";

        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Query Failed".mysqli_error());
        }
        else{

            header('Location: FoodDeliveryAdmin.php');
            ?>

            <script>
                alert("The change in the Menu has been Successful");
            </script>

            <?php

        }
    
}
?>




<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
<link rel="stylesheet" href="../Project/style.css">
</head>

<center><form action="updatemenu.php? id=<?php echo $row['Food_ID']; ?>" method="post">
<div class="w3-container w3-padding-64 w3-grayscale w3-xlarge" id="about">
  <div class="w3-content">
    <h1 class="w3-center w3-jumbo">The New Update System</h1>

        <label style="font-size: 150%;">Food No. :</label> 
        <input type="number" name="Food_ID" placeholder="Enter the Next Food No." value="<?php echo $row['Food_ID'] ?>">

        <br><label style="font-size: 150%;">Food Name :</label>
        <input type="text" name="Name" placeholder="Enter the Name of the Food" value="<?php echo $row['Name'] ?>">

        <br><label style="font-size: 150%;">Description :</label> 
        <input type="text" name="Description" placeholder="Enter the Description" value="<?php echo $row['Description'] ?>">

        <br><label style="font-size: 150%;">Price :</label> 
        <input type="number" name="Price" placeholder="Enter the Value of the New Menu" value="<?php echo $row['Price'] ?>">
    
    </div>
    <center><input type="submit" name="Update" value="Update" ></center>
  </div>
 
</form></center>

