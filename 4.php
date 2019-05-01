<!--4. Написать функцию, которая выводит список файлов в заданной директории. Директория задается как параметр функции.-->
<?php
function printDir ($folder, $space = ''){
    $files = scandir($folder);
    foreach ($files as $file){
        if($file == '.' || $file == '..') continue;
        $f = $folder.'/'.$file;
        echo $space.$file.'<br>';
        if (is_dir($f))  printDir($f, $space.'&nbsp;&nbsp;&nbsp;');
    }
}
echo '<br>';
printDir('function4');
