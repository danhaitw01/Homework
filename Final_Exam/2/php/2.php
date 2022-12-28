<?php
    $name=$_POST["name"];
    $email=$_POST["email"];
    $op=nl2br($_POST["opinion"]);
    $anonymous=$_POST["anonymous"];
    if($anonymous=="yes"){
        $final_name=substr_replace($name,"****",1,-1);
    }
    elseif($anonymous=="no"){
        $final_name=$name;
    }
    echo ("<body background='https://arcaea.lowiro.com/img/characters_background.715d698f.jpg'>");
    echo("<p align='center'>");
    echo("您將送出的資料如下：<br>");
    echo("您的使用者名稱：$name <br>");
    echo("您的電子郵件地址：$email <br>");
    echo("您的意見：$op <br>");
    echo("因此份意見填答後會進行公開（除了電子郵件），以下將顯示公開顯示的版本：<br>");
    echo ("您的使用者名稱：$final_name <br>");
    echo("您的意見：$op <br>");
    echo("<a href='../html/2.html'>回上一頁</a>");
    echo("</p>");
?>
