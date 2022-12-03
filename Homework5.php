<html>
    <head>
        <title>迴圈及條件判斷作業</title>
    </head>
    <body>
        <form action="" method="post">
            <input type="number" name="min" placeholder="請輸入下限(最低爲0)" min=0>
            <input type="number" name="max" placeholder="請輸入上限"><br>
            <input type="radio" name="method" value="odd">顯示範圍內所有奇數
            <input type="radio" name="method" value="even">顯示範圍內所有偶數<br>
            <input type="submit" name="submit" value="送出">
            <input type="reset" name="reset" value="重設">
        </form>
        <?php
            error_reporting(0);
            if (isset($_POST["submit"])){
                $min=$_POST["min"];
                $max=$_POST["max"];
                $method=$_POST["method"];
            }
            if ($method=="odd"){
                for($i=$min;$i<=$max;$i++){
                    if($i%2==1){
                        echo ("$i ");
                    }
                }
            }
            elseif ($method=="even"){
                for($i=$min;$i<=$max;$i++){
                    if($i%2==0){
                        echo ("$i ");
                    }
                }
            }
            else{
                echo("請完整點按所有選項");
            }
        ?>
    </body>
</html>
