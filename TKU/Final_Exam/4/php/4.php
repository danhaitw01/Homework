<html>
    <head>
        <title>溫度單位換算</title>
    </head>
    <body background="https://arcaea.lowiro.com/img/characters_background.715d698f.jpg">
        <p>
            <form action="https://www.google.com/search?&q=">
                <div style="width:100%;text-align:center">
                    <input type="text" placeholder="Google自訂搜尋" name="q">
                    <input type="submit" value="搜尋" hidden>
                </div>
            </form>
        </p>
        <p align="center">
            <a href="../../index.php">首頁</a>
            <a href="../../1/html/1.html">本網站使用滿意度調查</a>
            <a href="../../2/html/2.html">本網站使用意見</a>
            <a href="../../3/php/3.php">列出範圍內的費波那契數</a>
            <a href="./4.php">溫度單位換算</a>
            <a href="../../5/php/5.php">關於作者</a>
        </p>
        <p>
            <form action="" method="post">
                <div style="width:100%;text-align:center">
                    <label>利用下拉式選單選取原始單位，輸入溫度數值後選取需轉換單位</label><br>
                    <select name="otem">
                        <option value="null" selected>請選擇原始單位</option>
                        <option value="c">攝氏</option>
                        <option value="f">華氏</option>
                        <option value="k">克氏</option>
                    </select>
                    <input type="text" name="value">
                    <label>度轉換爲</label>
                    <input type="radio" name="ttem" value="c"><label>攝氏</label>
                    <input type="radio" name="ttem" value="f"><label>華氏</label>
                    <input type="radio" name="ttem" value="k"><label>克氏</label>
                    <label>度數</label><br>
                    <input type="submit" name="submit" value="送出">
                    <input type="submit" name="reset" value="重置"><br>
                    <input type="button" value="點此在Google搜尋攝氏溫標" onclick="location.href='https://www.google.com/search?&q=攝氏'">
                    <input type="button" value="點此在Google搜尋華氏溫標" onclick="location.href='https://www.google.com/search?&q=華氏'">
                    <input type="button" value="點此在Google搜尋克氏溫標" onclick="location.href='https://www.google.com/search?&q=克氏'">
                </div>
            </form>
        </p>
        <p align="center">
        <?php
            if(isset($_POST["submit"])){
                $ttem=$_POST["ttem"];
                $otem=$_POST["otem"];
                $value=$_POST["value"];
                if($_POST["otem"]=="null"){
                    echo("請輸入單位");
                    $status="incom";
                }
                if($otem!="null" && $_POST["value"]==False){
                    echo("請輸入數值");
                    $status="incom";
                }
                if($status!="incom"){
                    if($otem=="c"){
                        echo("攝氏$value 度轉換後爲");
                        if($ttem=="c"){
                            echo("攝氏$value 度");
                        }
                        elseif($ttem=="f"){
                            echo("華氏".(($value*1.8)+32)."度");
                        }
                        elseif($ttem=="k"){
                            echo("克氏".($value+273.15)."度");
                        }
                    }
                    elseif($otem=="f"){
                        echo("華氏$value 度轉換後爲");
                        if($ttem=="c"){
                            echo("攝氏".(($value-32)/1.8)."度");
                        }
                        elseif($ttem=="f"){
                            echo("華氏$value 度");
                        }
                        elseif($ttem=="k"){
                            echo("克氏".((($value-32)/1.8)+273.15)."度");
                        }
                    }
                    elseif($otem=="k"){
                        echo("克氏$value 度轉換後爲");
                        if($ttem=="c"){
                            echo("攝氏".($value-273.15)."度");
                        }
                        elseif($ttem=="f"){
                            echo("華氏".((($value-273.15)*1.8)+32)."度");
                        }
                        elseif($ttem=="k"){
                            echo("克氏$value 度");
                        }
                    }
                }
                if(isset($_POST["reset"])){
                    unset($ttem,$otem,$value,$status);
                }
            }
        ?>
        </p>
    </body>
</html>
