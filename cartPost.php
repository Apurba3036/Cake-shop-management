<?php
include('./bsms/DBConnection.php');

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if 'items', 'totalPrice', and 'username' are set
    if (isset($_POST['items']) && isset($_POST['totalPrice']) && isset($_POST['username'])) {
        // Get the total price and username
        $totalPrice = $_POST['totalPrice'];
        $username = $_POST['username'];
        // Decode the JSON items array
        $items = json_decode($_POST['items'], true);

        foreach ($items as $item) {
            $type = $item['type'];
            $cakeOcasion = $item['cake'];
            $size = $item['size'];
            $quantity = 1; // Assuming each item is a single quantity

            if ($quantity > 10) {
                echo "<script>alert('You cannot select more than 10 Cakes');</script>";
                echo "<script>window.location.replace('http://localhost/our_project/cart.html');</script>";
                exit;
            } else {
                // Insert the item into the cart table
                $sql = "INSERT INTO `cart`(`username`, `occasion`, `flavour`, `size`, `quantity`)
                        VALUES ('$username','$cakeOcasion','$type',$size,$quantity)";
                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    echo "Error: " . mysqli_error($conn);
                    exit;
                }
            }
        }

        echo "Your total price: $totalPrice";
        echo "<br><button><a href='http://localhost/our_project/payment%20gateway/checkout.html'>Go to Checkout</a></button>";
        echo "<br><button><a href='http://localhost/our_project/cart.html'>Cancel Order</a></button>";
    } else {
        echo "Invalid input.";
    }
} else {
    echo "Invalid request method.";
}
?>
