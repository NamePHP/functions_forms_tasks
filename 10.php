10. Написать функцию, которая считает количество уникальных слов в тексте. Слова разделяются пробелами. Текст должен вводиться с формы.
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form method="post" action="">
    <div>
        <textarea name="text" cols="40" rows="5"></textarea>
    </div>
    <div>
        <input type="submit" value="ok">
    </div>
</form>
</body>
</html>

<?php
if(!empty($_POST)){
    $text = $_POST['text'];
    if (!$text) {
        echo 'Введите слово.';
    }
    else
        echo countText($text);
}
function countText($a){
    $filter = array("%", "@", "*", "+", "-", "/","!", "&", "?", "^","#");
    $arrFilter = str_replace($filter,'',$a);
    $arr = explode(" ", $arrFilter);
    $arr = array_filter($arr);
    $arr =array_unique($arr);
    return count($arr);
}
