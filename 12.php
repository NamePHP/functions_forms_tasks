12. Написать функцию, которая в качестве аргумента принимает строку, и форматирует ее таким образом, что предложения идут в обратном порядке.<br>
Пример:<br><br>
Входная строка:  'А Васька слушает да ест. А воз и ныне там. А вы друзья как ни садитесь, все в музыканты не годитесь. А король-то — голый. А ларчик просто открывался. А там хоть трава не расти.';<br><br>
Строка, возвращенная функцией :  'А там хоть трава не расти. А ларчик просто открывался. А король-то — голый. А вы друзья как ни садитесь, все в музыканты не годитесь. А воз и ныне там.А Васька слушает да ест.

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
    $newArr = array_reverse($arr);
    $newArr = array_filter($newArr);
    $q = array();
    foreach ($newArr as $w){
        $w = trim($w);
        $q []=' '. mb_strtoupper(mb_substr($w, 0, 1)).mb_substr($w, 1);
    }
    $arr = implode('.',$q).'.';
    return $arr;

}
