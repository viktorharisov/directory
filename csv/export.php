<?php
include '../includes/db_connect.php';

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=directory_export.csv');

$output = fopen('php://output', 'w');
fputcsv($output, array('ID', 'Name', 'Description', 'Complexity'));

$sql = "SELECT * FROM directory_table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
}

fclose($output);
$conn->close();
?>
