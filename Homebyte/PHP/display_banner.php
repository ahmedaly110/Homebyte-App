<?php
// include the database config file
require_once 'dbconfig.php';

$sql = "SELECT title, paragraph, image FROM ann_banner";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $slideNumber = 0; // Initialize slide counter

    while ($row = $result->fetch_assoc()) {
        $activeClass = ($slideNumber === 0) ? 'active' : '';

        // Define image path for the current row
        $imagePath = 'PHP/uploads/' . $row['image'];

        echo '<div class="carousel-item ' . $activeClass . '">
                <div class="carousel-caption relative">
                   <div class="row d_flex">
                      <div class="col-md-7">
                         <div class="board">
                            <h3>' . $row['title'] . '</h3>
                            <p>' . $row['paragraph'] . '</p>
                            <a class="read_more" href="contact.php">Contact Us</a>
                            <a class="read_more" href="shop.php">Shop Now</a>
                         </div>
                      </div>
                      <div class="col-md-5">
                         <div class="banner_img">
                         <figure><img class="img_responsive" src="' . $imagePath . '"></figure>
                         </div>
                      </div>
                   </div>
                </div>
             </div>';

        $slideNumber++;
    }
} else {
    echo "No banners found.";
}
?>
