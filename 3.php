<!--3. Есть текстовый файл. Необходимо удалить из него все слова, длина которых превыщает N символов.
 Значение N задавать через форму. Проверить работу на кириллических строках - найти ошибку, найти решение-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>1</title>
</head>
<body>
<form action="" method="post">

        N : <input type ="text" name ="n" />

        <input type="submit" value="ok">

</form>
</body>
</html>

<?php
if(!empty($_POST)){
    $n = $_POST['n'];
    arrFile($n);
}

function arrFile($n){
    $file = "text.txt";
    $arr =file_get_contents($file);
    $arrReplace = preg_replace("/[\t\r\n]+/",' ',$arr);
    $filter = array("%", "@", "*", "+", "-", "/","!", "&", "?", "^","#","(", ")");
    $arrFilter = str_replace($filter,'',$arrReplace);
    $arrFile = explode(" ", $arrFilter);
    $AFilter = array_filter($arrFile);
    $newArr = array();
    foreach ($AFilter as $value){

        if(strlen($value) > $n){
            $newArr [] = $value;
        }
    }
    $newF = implode(" ",$newArr);
    $f = fopen($file, "w");
    fwrite($f,$newF);
    fclose($f);
}
