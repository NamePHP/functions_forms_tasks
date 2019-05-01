<!--2.Создать форму с элементом textarea. При отправке формы скрипт должен выдавать ТОП3 длинных слов в тексте. Реализовать с помощью функции.-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>1</title>
</head>
<body>
<form action="" method="post">
    <div>
        <textarea name="a" cols="40" rows="5"></textarea>
    </div>
    <div>
        <input type="submit" value="ok">
    </div>
</form>
</body>
</html>




<?php
if(!empty($_POST)){
    $a = $_POST['a'];

    print_r(getCommon($a));
}
function getCommon($a){
    $filter = array("%", "@", "*", "+", "-", "/","!", "&", "?", "^","#");
    $arrFilter = str_replace($filter,'',$a);
    $common = explode(" ", $arrFilter);
    $AFilter = array_filter($common);
    usort($AFilter, function ($a, $b){
        if($a == $b){
            return 0;
        }else
            return (strlen($a) > strlen($b)? -1 : 1);
    });
    return (array_slice($AFilter, 0, 3));
}
