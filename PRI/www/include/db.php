<?php

$host = "database";
$user = "root";
$password_db = "root";
$dbname = "pri";


$conn = new mysqli($host, $user, $password_db, $dbname);

function test_connection($conn){
    if ($conn->connect_error) {
        echo"Rip";
    }
    else{
        echo"Juhuu";
    } 
}

function dbQuery(mysqli $conn, string $query): bool|mysqli_result
{
    return $conn->query($query);
}

function dbEscape(mysqli $conn, string $s): string
{
    return "'" . $conn->real_escape_string($s) . "'";
}

function login(mysqli $conn, string $username, string $password): bool
{
    $username = dbEscape($conn, $username);
    $password = dbEscape($conn, $password);

    $query = "SELECT id FROM recepcni WHERE uz_jmeno=$username AND heslo=$password";

    $result = dbQuery($conn, $query);
    // num rows -> počet řádků v proměnné
    if ($result->num_rows > 0) {
        return true;
        }
    return false;
}

function infoPokoje(mysqli $conn): array
{
    $query = "SELECT * from pokoje";
    $result = dbQuery($conn, $query);

    $data = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()){
            $data[] = $row;

        }
    }
    return $data;
}

function getInfoPokoje(mysqli $conn, string $id_pokoje): array
{
    $id_pokoje = dbEscape($conn, $id_pokoje);
    $query = "SELECT * FROM pokoje WHERE id_pokoje = $id_pokoje";
    $result = dbQuery($conn, $query);

    $data = [];
    if ($result->num_rows>0){
        while ($row = $result->fetch_assoc()){
            $data[] = $row;
        }
    }
    return $data;
}

function updateInfoRoom(mysqli $conn, string $cleaned, string $occupied, $id_pokoje){
    $cleaned = dbEscape($conn, $cleaned);
    $occupied = dbEscape($conn, $occupied);
    $id_pokoje = dbEscape($conn, $id_pokoje);

    $query = "UPDATE pokoje SET uklizeno=$cleaned, obsazeno=$occupied WHERE id_pokoje=$id_pokoje";
    dbQuery($conn, $query);
}

?>
