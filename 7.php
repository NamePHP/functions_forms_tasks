<?php
//7. Создать гостевую книгу, где любой человек может оставить комментарий в текстовом поле и добавить его. Все добавленные комментарии выводятся над текстовым полем.

if(!empty($_POST)){
    save_mess();
    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}
$messages = get_mess();
$messages = array_mess($messages);

function get_mess(){
    $a =file_get_contents('Comment_7.php.txt');
    return $a;
}

function array_mess($messages){
    $messages = explode("\n***\n", $messages);
    array_pop($messages);
    return array_reverse($messages);
}

function save_mess(){
    $str = $_POST['user'] . '|' . $_POST['comment'] . '|' . date('Y-m-d H:i:s') . "\n***\n";
    file_put_contents('Comment_7.php.txt', $str, FILE_APPEND);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Гостевая книга</title>
</head>
<body>
<div>
    <form action="" method="post">
        <div>
            <label for="user">Your user:</label>
            <input type="text" name="user" class="form-control" id="user" placeholder="user">
        </div>
        <div>
            <label for="comment">Comment user:</label><br>
            <textarea name="comment" cols="40" rows="5" id="comment" placeholder="comment"></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-default">Submit</button>
    </form>
</div>
<hr>

<?php if(!empty($messages)): ?>
    <?php foreach($messages as $message): ?>
        <?php $message = explode('|',$message); ?>
        <div>
            <p><b>Автор: </b><?=$message[0]?> | <b>Дата:</b> <?=$message[2]?></p>
            <div><?=nl2br(htmlspecialchars($message[1]))?></div>
        </div>
        <hr>
    <?php endforeach; ?>
<?php endif; ?>
</body>
</html>


