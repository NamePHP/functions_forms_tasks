<!--1. Создать форму с двумя элементами textarea. При отправке формы скрипт должен выдавать только те слова, которые есть и в первом и во втором поле ввода.
Реализацию это логики необходимо поместить в функцию getCommonWords($a, $b), которая будет возвращать массив с общими словами.-->

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
        <textarea name="b" cols="40" rows="5"></textarea>
    </div>
    <div>
        <input type="submit" value="ok">
    </div>
</form>
</body>
</html>


<?php
    if (!empty($_POST)){
        $a = $_POST['a'];
        $b = $_POST['b'];

        print_r(getCommonWords($a, $b));
    }

    function getCommonWords($a, $b){
        $filter = array("%", "@", "*", "+", "-", "/","!", "&", "?", "^","#");
        $arrA = str_replace($filter, '', $a);
        $arrB = str_replace($filter, ' ', $b);
        $words1 = explode(" ", $arrA);
        $words2 = explode(" ", $arrB);
        $common  = array();
        $arrWords1 = array_filter($words1);
        $arrWords2 = array_filter($words2);
        foreach ($arrWords1 as $str1) {
            $text = false;
            foreach ($arrWords2 as $str2) {
                if ($str1 === $str2) {
                    $common[] = $str1;
                    $text = true;
                }
            }
            if ($text == false){

            }
        }
        return $common;

    }
?>