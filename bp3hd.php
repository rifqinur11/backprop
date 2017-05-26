<!DOCTYPE html>
<html>
        <head>
                <title>Training Data</title>
        </head>
        <body>
                <?php
                        $lr = 0.9;
                        //$mse = 1;
                        //$err = 1;
                        $a = rand(-1,1) / 10;
                        $b = rand(-1,1) / 10;
                        $c = rand(-1,1) / 10;
                        $d = rand(-1,1) / 10;
                        $e = rand(-1,1) / 10;
                        $f = rand(-1,1) / 10;
                        $g = rand(-1,1) / 10;
                        $h = rand(-1,1) / 10;
                        $i = rand(-1,1) / 10;
                        $j = rand(-1,1) / 10;
                        $k = rand(-1,1) / 10;
                        $l = rand(-1,1) / 10;
                        $m = rand(-1,1) / 10;
                        $input = array
                                (
                                array(0.21,0.3),
                                array(0.85,0.42),
                                array(0.74,0.58),
                                array(0.1,0.22),
                                array(0.42,0.26),
                                array(0.14,0.58),
                                array(0.52,0.34),
                                array(0.15,0.46),
                                array(0.41,0.74),
                                array(0.1,0.66)
                                );
                        $output = array(0,1,1,0,0,0,0,0,1,0);

                        for ($x=0; $x<180; $x++) { 
                                for ($y=0; $y < 10; $y++) { 
                                        $nh1[$y]= $a + ($b*$input[$y][1]) + ($c*$input[$y][0]);
                                        $nh2[$y]= $d + ($e*$input[$y][1]) + ($f*$input[$y][0]);
                                        $nh3[$y]= $g + ($h*$input[$y][1]) + ($i*$input[$y][0]); 

                                        $oh1[$y]= 1 / (1+exp($nh1[$y]*(-1)));
                                        $oh2[$y]= 1 / (1+exp($nh2[$y]*(-1)));
                                        $oh3[$y]= 1 / (1+exp($nh3[$y]*(-1)));

                                        $no[$y]= $j + ($oh1[$y]*$k) + ($oh2[$y]*$l) + ($oh3[$y]*$m);

                                        $out[$y] = 1 / (1+exp($no[$y]*(-1)));
                                        //echo $out[$y];
                                        // $out2[$y] = 1 / (1+exp($no2[$y]*(-1)));
                                        // $out3[$y] = 1 / (1+exp($no3[$y]*(-1)));

                                        $mse[$y] = pow(($out[$y]-$output[$y]),2);

                                        $err[$y] = ($output[$y]-$out[$y])*$out[$y]*(1-$out[$y]);

                                        $uj = $j + $lr*$err[$y];
                                        $uk = $k + $lr*$err[$y]*$oh1[$y];
                                        $ul = $l + $lr*$err[$y]*$oh2[$y];
                                        $um = $m + $lr*$err[$y]*$oh3[$y];

                                        $enh1 = $err[$y]*$k;
                                        $enh2 = $err[$y]*$l;
                                        $enh3 = $err[$y]*$m;

                                        $eh1 = $enh1*$oh1[$y]*(1-$oh1[$y]);
                                        $eh2 = $enh2*$oh2[$y]*(1-$oh2[$y]);
                                        $eh3 = $enh3*$oh3[$y]*(1-$oh3[$y]);

                                        $ua = $a + $lr*$eh1;
                                        $ub = $b + $lr*$eh1*$input[$y][1];
                                        $uc = $c + $lr*$eh1*$input[$y][0];
                                        $ud = $d + $lr*$eh2;
                                        $ue = $e + $lr*$eh2*$input[$y][1];
                                        $uf = $f + $lr*$eh2*$input[$y][0];
                                        $ug = $g + $lr*$eh3;
                                        $uh = $h + $lr*$eh3*$input[$y][1];
                                        $ui = $i + $lr*$eh3*$input[$y][0];

                                        $a = $ua;
                                        $b = $ub;
                                        $c = $uc;
                                        $d = $ud;
                                        $e = $ue;
                                        $f = $uf;
                                        $g = $ug;
                                        $h = $uh;
                                        $i = $ui;
                                        $j = $uj;
                                        $k = $uk;
                                        $l = $ul;
                                        $m = $um;
                                }
                                $hasilmse[$x] = (array_sum($mse))/10;
                        }
                        $totalmse = (array_sum($hasilmse))/$x;
                        ?>
                <h4>MSE: <?php echo $totalmse;?></h4>
                <h4>Iterasi : <?php echo $x;?></h4>
                <h4>a = <?php echo $a;?></h4>
                <h4>b = <?php echo $b;?></h4>
                <h4>c = <?php echo $c;?></h4>
                <h4>d = <?php echo $d;?></h4>
                <h4>e = <?php echo $e;?></h4>
                <h4>f = <?php echo $f;?></h4>
                <h4>g = <?php echo $g;?></h4>
                <h4>h = <?php echo $h;?></h4>
                <h4>i = <?php echo $i;?></h4>
                <h4>j = <?php echo $j;?></h4>
                <h4>k = <?php echo $k;?></h4>
                <h4>l = <?php echo $l;?></h4>
                <h4>m = <?php echo $m;?></h4>
        </body>
</html>