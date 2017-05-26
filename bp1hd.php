<!DOCTYPE html>
<html>
        <head>
                <title>Training Data</title>
        </head>
        <body>
                <?php
                        $lr = 0.5;
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

                        for ($x=0; $x<200; $x++) { 
                                for ($y=0; $y < 10; $y++) { 
                                        $nh1[$y]= $a + ($b*$input[$y][1]) + ($c*$input[$y][0]);
                                        //$nh2[$y]= $d + ($e*$input[$y][1]) + ($f*$input[$y][0]); 

                                        $oh1[$y]= 1 / (1+exp($nh1[$y]*(-1)));
                                        //$oh2[$y]= 1 / (1+exp($nh2[$y]*(-1)));

                                        $no[$y]= $d + ($oh1[$y]*$e);

                                        $out[$y] = 1 / (1+exp($no[$y]*(-1)));
                                        //echo $out[$y];
                                        // $out2[$y] = 1 / (1+exp($no2[$y]*(-1)));
                                        // $out3[$y] = 1 / (1+exp($no3[$y]*(-1)));

                                        $mse[$y] = pow(($out[$y]-$output[$y]),2);

                                        $err[$y] = ($output[$y]-$out[$y])*$out[$y]*(1-$out[$y]);

                                        $ud = $d + $lr*$err[$y];
                                        $ue = $e + $lr*$err[$y]*$oh1[$y];
                                        //$ui = $i + $lr*$err[$y]*$oh2[$y];

                                        $enh1 = $err[$y]*$e;
                                        //$enh2 = $err[$y]*$i;

                                        $eh1 = $enh1*$oh1[$y]*(1-$oh1[$y]);
                                        //$eh2 = $enh2*$oh2[$y]*(1-$oh2[$y]);

                                        $ua = $a + $lr*$eh1;
                                        $ub = $b + $lr*$eh1*$input[$y][1];
                                        $uc = $c + $lr*$eh1*$input[$y][0];
                                        // $ud = $d + $lr*$eh2;
                                        // $ue = $e + $lr*$eh2*$input[$y][1];
                                        // $uf = $f + $lr*$eh2*$input[$y][0];

                                        $a = $ua;
                                        $b = $ub;
                                        $c = $uc;
                                        $d = $ud;
                                        $e = $ue;
                                        // $f = $uf;
                                        // $g = $ug;
                                        // $h = $uh;
                                        // $i = $ui;
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
        </body>
</html>