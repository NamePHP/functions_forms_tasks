<!--9. Написать функцию, которая переворачивает строку. Было "abcde", должна выдать "edcba". Ввод текста реализовать с помощью формы. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title</title>
</head>
<body>
<div class="container">
    <form action="9.php" method="post">
        <div class="form-group">
            <label>Text:</label>
            <input type="text" name="text">
        </div>
        <button type="submit" name="submit">Submit</button>
    </form>
</div>
</body>
</html>

<?php
function reverse($a)
{
    $result = '';
    for ($i = 0; $i < mb_strlen($a); $i++) {
        $result = mb_substr($a, $i, 1) . $result;
    }
    return $result;
}
if (!empty($_POST)){
    $t = $_POST['text'];

    if (!$t) {
        echo 'Введите слово.';
    }
    else
        echo reverse($t);
}


