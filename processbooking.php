<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Rohirrim Tour Booking Confirmation</title>
    <link rel="stylesheet" type="text/css" href="style/register.css">
</head>
<body>

<h1>Rohirrim Tour Booking Confirmation</h1>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $firstname=isset($_POST["firstname"]) ? trim($_POST["firstname"]) :"";
    $lastname=isset($_POST["lastname"]) ? trim($_POST["lastname"]):"";
    $age=isset($_POST["age"]) ? trim($_POST["age"]):"";
    $species=isset($_POST["species"]) ? trim($_POST["species"]):"";
    $food=isset($_POST["food"]) ? trim($_POST["food"]):"";
    $partysize=isset($_POST["partysize"]) ? trim($_POST["partysize"]):"";
        
    $tours=array();
    if(isset($_POST["accom"])) {$tours[]= "Accommodation"; }
    if(isset($_POST["4day"])) { $tours[]= "Four-Day Tour";} 
    if(isset($_POST["10day"])) {$tours[]= "Ten-Day Tour";}

    function safeOutput($value) {
        return htmlspecialchars((string)$value,
            ENT_QUOTES,"UTF-8"
        );
    }

    echo "<p>Welcome " .
        safeOutput($firstname ." " . $lastname).
        "!</p>";
            
    if (!empty($tours)) {
        echo "<p>You are now booked on the One-day tour and ".
        safeOutput(implode("and", $tours)) . "</p>";
    } else{
        echo "<p> No tour or accommodation was selected. </p>";
    }

    $sepciesNames = array(
        "M" => "Human",
        "D" => "Dwarf",
        "E" => "Elf",
        "H" => "Hobbit",
    );

    $speciesName = isset($speciesNames[$species]) ? $speciesNames[$species] :"Not specified";
        
    echo "<p> Species: ". 
        safeOutput($speciesName). "</p>";
    echo "<p> Age: ". 
        safeOutput($age). "</p>";
    echo "<p> Meal Preference: ". 
        safeOutput($food). "</p>";
    echo "<p> Number of travellers: ". 
        safeOutput($partysize). "</p>";

}else {
    echo "<p>Please submit the booking form first.</p>";
}
?>

<p><a href ="register.html">Back to Booking Form</a></p>


</body>
</html>