<?php
include 'includes/db_connect.php';

$sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'id';
$order = isset($_GET['order']) ? $_GET['order'] : 'ASC';

$sql = "SELECT * FROM directory_table ORDER BY $sort_by $order";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
    echo "<td>" . htmlspecialchars($row['description']) . "</td>";
    echo "<td>" . $row['complexity'] . "</td>";
    echo "<td>
        <a href='index.php?page=edit&id=" . $row['id'] . "'>Редактировать</a> |
        <a href='scripts/entry_delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Вы уверены?\")'>Удалить</a>
    </td>";
    echo "</tr>";
}
} else {
echo "<tr><td colspan='5'>Нет записей</td></tr>";
}
$conn->close();
?>