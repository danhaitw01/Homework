<html>
    <head>
        <title>列出範圍內的費波那契數</title>
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
            <a href="./3.php">列出範圍內的費波那契數</a>
            <a href="../../4/php/4.php">溫度單位換算</a>
            <a href="../../5/php/5.php">關於作者</a>
        </p>
        <p>
            <form action="" method="post">
                <div style="width:100%;text-align:center">
                    <label>利用下方的下拉式選單選擇最大值(使用此方法時最小值一律爲0，且最大值爲21)或直接將最大與最小值輸入於文字框來選擇要列出的範圍</label><br>
                    <label>點選此項使用下拉式選單的值：</label>
                    <input type="radio" name="method" value="select">
                        <select name="snbmax">
                            <option value="null" selected>請選擇最大值</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                        </select><br>
                    <label>點選此項使用文字框中的值：</label>
                    <input type="radio" name="method" value="number">
                        <input type="number" name="nbmin" placeholder="請輸入最小值(最低輸入0)" min=0>
                        <label>~</label>
                        <input type="number" name="nbmax" placeholder="請輸入最大值(最低輸入1)" min=1><br>
                    <input type="submit" name="submit" value="送出">
                    <input type="submit" name="reset" value="重置">
                    <input type="button" value="點此在Google搜尋費波那契數" onclick="location.href='https://www.google.com/search?&q=費波那契數'">
                </div>
            </form>
        </p>
        <p align=center>
        <?php
            function FibCheck($var){
                $init=[0,1];
                if($var===0 || $var===1){
                    return True;
                }
                for($i=0;$i<=$var;$i++){
                    $init[$i+2]=$init[$i]+$init[$i+1];
                    if($init[$i+2]==$var){
                        return True;
                    }
                    elseif($init[$i+2]>$var){
                        return False;
                    }
                }
            }
            if(isset($_POST["submit"])){
                $nbmin=0;
                $nbmax=0;
                $list=[];
                if($_POST["method"]=="select"){
                    if($_POST["snbmax"]=="null"){
                        echo("請完整輸入數值");
                        $status="incom";
                    }
                    else{
                        $nbmin=0;
                        $nbmax=$_POST["snbmax"];
                    }
                }
                elseif($_POST["method"]=="number"){
                    $nbmin=$_POST["nbmin"];
                    $nbmax=$_POST["nbmax"];
                    if($nbmin==False){
                        if($nbmax==False){
                            echo("請完整輸入數值");
                            $status="incom";
                        }
                    }
                }
                if($status!="incom"){
                    for($i=$nbmin-1;$i<=$nbmax;$i++){
                        if(FibCheck($i)==True){
                            array_push($list,$i);
                        }
                    }
                    echo "此範圍中的費波那契數如下：<br>",implode(",",$list);
                }
                if(isset($_POST["reset"])){
                    unset($nbmin,$nbmax,$list,$status);
                }

            }
        ?>
        </p>
    </body>
</html>
