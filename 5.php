<!--5. Написать функцию, которая выводит список файлов в заданной директории, которые содержат искомое слово.
       Директория и искомое слово задаются как параметры функции-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>1</title>
</head>
<body>
<form action="" method="post">
    <div>
        Введите слово:  <input type="text" name="words">
    </div>
    <button type="submit">Ок</button>
</form>
</body>
</html>

<?php

function printDir ($folder, $words){
    $files = scandir($folder);
    $arr = true;
    if ($files) {
        foreach ($files as $file) {
            if (strpos($file, $words) !== false) {
                echo $file.'<br>';
                $arr  = false;
            }
        }
    }
    if ($arr) {
        echo 'Ничего не найдено.';
    }
}
echo '<br>';
if (!empty($_POST)){
    $w = $_POST['words'];
    $f = 'function5';
    if (!$w) {
        echo 'Введите слово.';
    }
    else
     printDir($f,$w);
}

