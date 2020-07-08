<?php
function generateMaze(int $s){
    $check =  checkNumber($s);
    if (!$check){
        return "Nilai S tidak memenuhi 4n-1";
    }
    $t = "@";
    $j = " ";
    $maze = "";
    for ($b = 1; $b <= $s; $b++){
        for($k = 1; $k <= $s; $k++){
            $baris = $b % 2 == 1;
            $kolom = $k % 2 == 1;
            if ($kolom){
                if ((($b <= $s-$k+1) && ($b>=$k-2)) || (($baris) && ($b >= $s-($k-2) || 4 <= $k-$b))  ||  (($b >= $s-$k+1) && (0>$b-$k) )){
                    $maze.=$t;
                }else{
                    $maze.=$j;
                }
            }else{
                if (($baris) && (($b >= $s-($k-2))  || 3 <= $k-$b) && (($b <= $s-($k-1))  || 0 >= $k-$b) ){
                    $maze.=$t;
                }else{
                    $maze.=$j;

                }
            }
        }
        $maze.=PHP_EOL;
    }
    return $maze;
}
function checkNumber(int $s){
    for ($i=1;$i<=$s;$i++){
        $n = (4 * $i) -1 ;
        if ($n == $s){
            return true;
        }
        if ($n>$s){
            return false;
        }
    }
}
$number = readline("Masukan Nilai S: ");
echo "Nilai S: ".$number.PHP_EOL;
echo generateMaze($number);
