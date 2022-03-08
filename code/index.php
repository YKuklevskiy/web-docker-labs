<!--
Написать доску объявлений. Пользователь указывает свой
email, текст объявления, заголовок объявления (форма)б
категория. Для хранения объявлений использовать файлы.

    1. Создать несколько папок категорий.

    2. Необходимо чтобы на странице была форма с полями
    (email, выбор категории(название выше созданных
    папок), заголовок объявления и текст объявления,
    кнопка Добавить).

    3. После формы список уже загруженных объявлений в
    виде таблички.

    4. После того, как пользователь нажал кнопку “добавить”,
    необходимо создать новый текстовый файл
    категория/заголовок_объявления.txt, содержимое
    файла - Текст объявления.

Лабораторная 4:
Настроить интеграцию с google таблицами.
Записывать и считывать объявления из л.р. “Регулярные
выражения и работа с файлами” в google таблицу вместо
файлов.
-->

<?php
require_once "vendor/autoload.php";

$available_categories = ["Продажа", "Реклама", "Купля"];
sort($available_categories);

$client = new Google_Client();
$client->setApplicationName('Google Sheets API Implementation');
$client->setScopes(Google_Service_Sheets::SPREADSHEETS_READONLY);
$client->setAuthConfig('credentials.json');
$client->setAccessType('offline');
$client->setPrompt('select_account consent');

$service = new Google_Service_Sheets($client);
$spreadsheetId = "1iQNHHfw_hlXLRC7V-L01yqDx9zp6vDFZfshnbhcO7HQ";

// Категория-Email-Заголовок-Текст
$response = $service->spreadsheets_values->get($spreadsheetId, "AdInfoSheet!A1:D");
$value_table = $response->getValues();
asort($value_table);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Task 3</title>
    </head>
    <body>
        <form action="lab3/save_file.php" method="post">
            <h2>Отправить объявление:</h2>
            <br>
            <label>Введите свою почту:</label> <input name="email" type="email">
            <br>
            <label>Введите категорию объявления:</label>
            <select name="category">
            <?php
            foreach ($available_categories as $category) {
                echo "<option>" . $category . "</option>";
            }
            ?>
            </select>
            <br>
            <label>Введите заголовок:</label> <input name="header">
            <br>
            <label>Текст объявления:</label> <textarea name="ad" rows="10" cols="40"></textarea>
            <button type="submit">Добавить</button>
        </form>

        <br><br>

        <h2>Объявления</h2>
        <table border=2>
        <tr>
            <th>Категория</th>
            <th>Email</th>
            <th>Заголовок</th>
            <th>Текст</th>
        </tr>
        <?php
        foreach ($value_table as $adData) {
            echo "<tr>";
            echo "<td>" . $adData[0] . "</td>"; // Категория
            echo "<td>" . $adData[1] . "</td>"; // Почта
            echo "<td>" . $adData[2] . "</td>"; // Заголовок
            echo "<td>" . $adData[3] . "</td>"; // Объявление
            echo "</tr>";
        }
        ?>
        </table>
    </body>
</html>