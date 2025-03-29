<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "destinations_tavelagency";
$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if ($conn) {
    echo "u are connected \n";

} else {
    echo "u are not connected\n";
}

//$sql = "INSERT INTO destinacionet(name,price,categories,description)
//                                              VALUES ('Brezovica',50,'Mal,Winter','Brezovice-Prevalle-Prizren')";
//$sql = "INSERT INTO destinacionet(name,price,categories,description) VALUES ('Bogë-Pejë', 30,'Mal','Winter','Bogë')";

//mysqli_query($conn, $sql);
$destinations = [
    ['Brezovica', 50, 'Mal, Winter', 'Brezovicë-Prevallë-Prizren'],
    ['Korçë', 40, 'Winter, City', 'Korçë'],
    ['Bogë-Pejë', 30, 'Mal, Winter', 'Bogë'],
    ['Valbonë', 30, 'Mal, Winter', 'Valbonë'],
    ['Theth', 22, 'Natyrë, Winter', 'Theth-Qafë Thore'],
    ['Pogradec', 25, 'Liqen, Natyrë', 'Drilon-Tushemisht'],
    ['Dardhë', 22, 'Natyrë, Winter', 'Dardhë-Korçë'],
    ['North explore', 100, 'Natyrë, Summer', 'Full north riviera trip'],
    ['Zvërnec', 30, 'Natyrë & histori, Summer', 'Zbulo brigjet dhe historinë'],
    ['Saranda', 190, 'Natyrë, Summer', 'All inclusive package'],
    ['Ksamil', 50, 'Natyrë, Summer', 'Boat trip'],
    ['Gjirokaster', 20, 'Histori, Kulture', 'Historical and cultural trip'],
    ['Berat', 20, 'Histori, Kulture', 'Cultural trip'],
    ['Elbasan', 9, 'Histori, Kulture', 'Cultural & historic trip'],
    ['Lezhe', 20, 'Histori, Kulture', 'Cultural & Historical trip'],
    ['Shkodër', 56, 'Kulturë, Natyë', 'All inclusive trip'],
    ['Rana e Hedhun', 20, 'Natyrë, Summer', 'Në Dunat e Shqipërisë!'],
    ['Shëngjini', 30, 'Natyrë, Summer', 'Coast and fun trip'],
    ['Durres', 15, 'Natyrë, Kulture', 'Cultural & Historical trip']
];


$stmt = $conn->prepare("INSERT INTO destinacionet (name, price, categories, description) VALUES (?, ?, ?, ?)");

// Bind parameters
$stmt->bind_param("siss", $name, $price, $categories, $description);



foreach ($destinations as $destination) {
    $name = $destination[0];
    $price = $destination[1];
    $categories = $destination[2];
    $description = $destination[3];
    $stmt->execute();
}

// Close connections
$stmt->close();
$conn->close();

echo "Destinations inserted successfully!";

?>
