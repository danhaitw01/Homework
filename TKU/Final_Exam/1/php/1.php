<?php
    $name=$_POST["name"];
    $sex=$_POST["sex"];
    $ux=$_POST["UX"];
    $design=$_POST["design"];
    $coding=$_POST["coding"];
    $result=($ux*6)+($design*4)+($coding*10);
    echo ("<body background='https://arcaea.lowiro.com/img/characters_background.715d698f.jpg'>");
    echo("<p align='center'>");
    echo("您將送出的資料如下：<br>");
    echo("您的名字：$name <br>");
    echo("您的性別：$sex <br>");
    echo("使用體驗：$ux <br>");
    echo("網頁設計：$design <br>");
    echo("資料處理：$coding <br>");
    echo("依照本網站對以上三個問題的權重，您的分數將會被轉換成以下指數：<br>");
    echo ("$result <br>");
    echo("<a href='../html/1.html'>回上一頁</a>");
    echo("</p>");
?>
