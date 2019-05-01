11. Написать функцию, которая в качестве аргумента принимает строку, и форматирует ее таким образом, что каждое новое предложение начиняется с большой буквы.<br>
Пример:<br><br>
Входная строка: 'а васька слушает да ест. а воз и ныне там. а вы друзья как ни садитесь, все в музыканты не годитесь. а король-то — голый. а ларчик просто открывался.а там хоть трава не расти.';<br><br>
Строка, возвращенная функцией :  'А Васька слушает да ест. А воз и ныне там. А вы друзья как ни садитесь, все в музыканты не годитесь. А король-то — голый. А ларчик просто открывался.А там хоть трава не расти.';

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form method="post" action="">
    <div>
        <textarea name="text" cols="100" rows="10"></textarea>
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
        echo arrText($text);
}
function arrText($a){
    $filter = array("%", "@", "*", "+", "-", "/","!", "&", "?", "^","#");
    $arrFilter = str_replace($filter,'',$a);
    $arr = explode(".", $arrFilter);
    $q = array();
    foreach ($arr as $w){
        $w = trim($w);
        $q []=' '. mb_strtoupper(mb_substr($w, 0, 1)).mb_substr($w, 1);
    }
    $arr = implode('.',$q);
    return $arr;

}
