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
-->

<?php
require_once("lab3/ad_data.php");
$categoriesFolder = opendir("lab3/adCategories");

//Массив из массивов AdData по ключу-категории
$adArr = array();
while ($category = readdir($categoriesFolder)) {
    if (is_dir('lab3/adCategories/' . $category) && !($category=='.' || $category=='..')) {
        $adArr[$category] = [];
    }
}

//Добавили все категории как ключи. Теперь проходимся по категориям и заполняем их массивами с AdData
foreach ($adArr as $category => $value) {
    $curDir = opendir("lab3/adCategories/" . $category);
    while ($fileName = readdir($curDir)) { // заполняем категорию данными
        if ($fileName == '.' || $fileName == '..') 
            continue;
        
        $filePath = "lab3/adCategories/" . $category . '/' . $fileName;
        $file = file_get_contents($filePath);
        $curAdData = unserialize($file);
        array_push($adArr[$category], $curAdData); 
        
        // Очень пока что непонятно работают ссылки. Когда я пытался сделать в цикле &$value вместо , 
        // второй массив (вторая категория), работал непонятно - в массив adArr он заносился как ссылка, 
        // хотя я вовсе не делал его ссылкой.
    }
}
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
            foreach ($adArr as $category => $value) {
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
        foreach ($adArr as $category => $adsData) {
            foreach ($adsData as $ad) {
                echo "<tr>";
                echo "<td>" . $category . "</td>";

                $data = $ad->getAdInfo();

                echo "<td>" . $data['email'] . "</td>";
                echo "<td>" . $data['header'] . "</td>";
                echo "<td>" . $data['text'] . "</td>";
                echo "</tr>";
            }
        }
        ?>
        </table>
    </body>
</html>