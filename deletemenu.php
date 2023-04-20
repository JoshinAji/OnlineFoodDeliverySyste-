<?php
     require_once('dbcustomer.php');

     if(isset($_GET['Food_ID'])){
        $id = $_GET['Food_ID'];
     

    $query = "delete from food_product where Food_ID = '$id' ";
    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query Failed".mysqli_error($conn));
    }
    else{
        header('Location: FoodDeliveryAdmin.php');
    }
}

?>