
<!--6. Создать страницу, на которой можно загрузить несколько фотографий в галерею. Все загруженные фото должны помещаться в папку gallery и выводиться на странице в виде таблицы.
-->
<?php

function getImages(){
    $dir = 'gallery';
    $scan = scandir($dir);
    $arr = array();
    foreach($scan as  $value) {
        if ($value != '.' && $value != '..') {
            $file = 'gallery/'.$value;
            if (is_file($file) && imageType($file)) {
                $arr[] = $dir . '/' . $value;
            }
        }
    }
    return $arr;

}

function imageType($file)
{
    $acceptedMimeTypes = ['image/gif', 'image/jpeg', 'image/pjpeg', 'image/png'];
    return in_array(mime_content_type($file), $acceptedMimeTypes);
}
function uploadImage($image)
{
    $filename = $_FILES['file']['name'];
    $path = 'gallery'. DIRECTORY_SEPARATOR . $filename;
    return move_uploaded_file($image['tmp_name'], $path);

}
if (isset($_FILES['file'])){
        uploadImage($_FILES['file']);
        header("http://localhost/functions_forms_tasks/6.php");

}

$images = getImages();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

</head>
<body>
<div >



    <form action="" method="post" enctype="multipart/form-data">
        <div>
            <label for="photo">Photo:</label>
            <input type="file" id="file" name="file"  multiple>
            <p>Please download image.</p>
        </div>
        <button type="submit">OK</button>
    </form>


    <table>
        <tr>
        <?php for($i = 0; $i < count($images); $i++) : ?>


            <td>
                <img src="<?= $images[$i] ?>" width="250" height="200" alt="">
            </td>
                <?php if($i % 3 == 2):?>
            </tr><tr>
            <?php endif;?>

        <?php endfor; ?>
        </tr>
    </table>

</div>
</body>
</html>
