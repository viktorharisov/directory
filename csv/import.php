<?php
include '../includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['file'])) {
    $file = $_FILES['file']['tmp_name'];

    if (($handle = fopen($file, "r")) !== FALSE) {
        // Пропускаем первую строку (заголовок)
        fgetcsv($handle);

        $log = [];
        $timestamp = date('Y-m-d H:i:s');

        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            // Проверка корректности данных
            if (count($data) < 4 || empty(trim($data[1])) || empty(trim($data[2])) || !is_numeric($data[3])) {
                $log[] = "[$timestamp] Пропущена пустая или некорректная строка: " . implode(", ", $data);
                continue;
            }

            $id = (int) $data[0];
            $name = $conn->real_escape_string($data[1]);
            $description = $conn->real_escape_string($data[2]);
            $complexity = (int) $data[3];

            // Корректировка сложности
            if ($complexity < 1 || $complexity > 5) {
                $log[] = "[$timestamp] Некорректная сложность для ID $id. Установлено значение по умолчанию 1.";
                $complexity = 1; // Установим значение по умолчанию
            } else {
                $complexity = ($complexity + 1 > 5) ? 1 : $complexity + 1;
            }

            if ($id > 0) {
                // Проверка существования записи с данным ID
                $check_sql = "SELECT id FROM directory_table WHERE id=$id";
                $check_result = $conn->query($check_sql);

                if ($check_result->num_rows > 0) {
                    // Обновление существующей записи
                    $sql = "UPDATE directory_table SET name='$name', description='$description', complexity=$complexity WHERE id=$id";
                    $action = "обновлена";
                } else {
                    // Вставка новой записи с заданным ID
                    $sql = "INSERT INTO directory_table (id, name, description, complexity) VALUES ($id, '$name', '$description', $complexity)";
                    $action = "добавлена";
                }
            } else {
                // Вставка новой записи без ID
                $sql = "INSERT INTO directory_table (name, description, complexity) VALUES ('$name', '$description', $complexity)";
                $action = "добавлена";
            }

            if ($conn->query($sql) !== TRUE) {
                $log[] = "[$timestamp] Ошибка для ID $id: " . $conn->error;
            } else {
                $log[] = "[$timestamp] Запись с ID $id была успешно $action.";
            }
        }
        fclose($handle);

        // Логирование
        file_put_contents('logs/import_log.txt', implode("\n", $log). "\n", FILE_APPEND);
    }
    header("Location: ../index.php?page=directory");
    exit;
}
?>
