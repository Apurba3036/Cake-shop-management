<?php
include('./bsms/DBConnection.php');

// Start of If;
if (isset($_POST['size']) && isset($_POST['cakeOcasion']) && isset($_POST['cakeFlavour']) && isset($_POST['quantity'])) {

    // We consider that 1 Pound cake = 200tk;

    $size = $_POST['size'];
    $cakeOcasion = $_POST['cakeOcasion'];
    $cakeFlavour = $_POST['cakeFlavour'];
    $quantity = $_POST['quantity'];

    // cakePrice per pound;
    $onePound = 200;
    $totalPrice = $size * $onePound * $quantity;

    if ($quantity > 10) {
        # code...

?>

        <!-- Showing the alert to the User -->
        <script>
            alert("You cant select more than 10 Cakes");
            window.location.replace("http://localhost/our_project/cart.html");
        </script>
        <!-- End of alert Message -->






        <?php

    } else {
        //  work with the database;
        $sql = "INSERT INTO `cart`(`occasion`, `flavour`, `size`, `quantity`)
                VALUES ('$cakeOcasion','$cakeFlavour',$size,$quantity)";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // echo'Data submitted successfulyl';

            // For showing total Price ;
        ?>

        <!-- Design as your wish in this part -->
        <!-- 
            ----------------------------------------------------------------------------------------
            ----------------------------------------------------------------------------------------
         -->

            <!-- Checkout and Total Price -->

            <h3>Your total price: <?php echo $totalPrice  ?></h3>
            <button><a href="http://localhost/our_project/payment%20gateway/checkout.html">Go to Checkout</a></button>
            <button><a href="http://localhost/our_project/cart.html">Cancel Order</a></button>

            <!-- End of checckout -->



        <!-- Don't touch bellow part -->
              <!-- 
            ----------------------------------------------------------------------------------------
            ----------------------------------------------------------------------------------------
         -->
            
<?php

        } else {
            // echo'NOt Submitted some theing sweiorsn';
        }
    }
}
// End of Ifelse;
else {
    // echo 'First if working...';
}


?>