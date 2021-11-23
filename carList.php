<tr>

    <th>Name</th>

    <th>Price</th>

    <th>Description</th>

    <th>Image</th>

</tr>

<?php



$servername = "localhost";

$username = "root";

$password = "";



$conn = new mysqli($servername, $username, $password, "cars");



// Check connection

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
}


if(isset($_GET["MaxPrice"])){
    $sqlSelect = $conn->prepare("SELECT * from Cars where CarPrice<=?");
    $sqlSelect->bind_param("i",$_GET["MaxPrice"]);  
} 
else if (isset($_GET["MinPrice"])){
    $sqlSelect = $conn->prepare("SELECT * from Cars where CarPrice>=?");
   $sqlSelect->bind_param("i",$_GET["MinPrice"]);
}
else
{
    $sqlSelect = $conn->prepare("SELECT * from Cars");
}


// no bind - display all



$sqlSelect->execute();

$res = $sqlSelect->get_result();

while ($row = $res->fetch_assoc()) {

?>
    <tr>

        <td><?= $row["CarName"] ?></td>

        <td><?= $row["CarPrice"] ?></td>

        <td><?= $row["CarDescription"] ?></td>

        <td><img src="./images/<?= $row["CarImage"] ?>"></td>

    </tr>

<?php

}

?>
