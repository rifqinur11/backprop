<!DOCTYPE html>
<html>
        <head>
                <title>Training Data</title>
        </head>
        <body>
                <?php
                        $lr = 0.7; //learning rate

                        //inisialisasi weight awal
                        $a = rand(-1,1) / 10;
                        $b = rand(-1,1) / 10;
                        $c = rand(-1,1) / 10;
                        $d = rand(-1,1) / 10;
                        $e = rand(-1,1) / 10;
                        $f = rand(-1,1) / 10;
                        $g = rand(-1,1) / 10;
                        $h = rand(-1,1) / 10;
                        $i = rand(-1,1) / 10;

                        //inisialisasi input data training
                        $input = array
                                (
                                array(0,0),
                                array(0,1),
                                array(0,2),
                                array(1,1),
                                array(1,3),
                                array(1,2),
                                array(2,0),
                                array(2,1),
                                array(2,3),
                                array(2,2)
                                );

                        //inisialisasi output data training
                        $output = array(0,0,0,0.5,0.5,0.5,1,1,1,1);

                        for ($x=0; $x<80; $x++) { 
                                for ($y=0; $y < 10; $y++) {
                                        //feedforward 

                                        //perhitungan hidden layer
                                        $nh1[$y]= $a + ($b*$input[$y][1]) + ($c*$input[$y][0]);
                                        $nh2[$y]= $d + ($e*$input[$y][1]) + ($f*$input[$y][0]); 

                                        //fungsi sigmoid pada hidden layer
                                        $oh1[$y]= 1 / (1+exp($nh1[$y]*(-1)));
                                        $oh2[$y]= 1 / (1+exp($nh2[$y]*(-1)));

                                        //perhitungan output layer
                                        $no[$y]= $g + ($oh1[$y]*$h) + ($oh2[$y]*$i);

                                        //fungsi sigmoid pada output layer 
                                        $out[$y] = 1 / (1+exp($no[$y]*(-1)));

                                        //perhitungan mean square error per input
                                        $mse[$y] = pow(($out[$y]-$output[$y]),2);

                                        //back propagation

                                        //error yang terjadi di output layer
                                        $err[$y] = ($output[$y]-$out[$y])*$out[$y]*(1-$out[$y]);

                                        //menghitung update weight
                                        $ug = $g + $lr*$err[$y];
                                        $uh = $h + $lr*$err[$y]*$oh1[$y];
                                        $ui = $i + $lr*$err[$y]*$oh2[$y];

                                        $enh1 = $err[$y]*$h;
                                        $enh2 = $err[$y]*$i;

                                        //menghitung error pada hidden layer
                                        $eh1 = $enh1*$oh1[$y]*(1-$oh1[$y]);
                                        $eh2 = $enh2*$oh2[$y]*(1-$oh2[$y]);

                                        //menghitung update weight
                                        $ua = $a + $lr*$eh1;
                                        $ub = $b + $lr*$eh1*$input[$y][1];
                                        $uc = $c + $lr*$eh1*$input[$y][0];
                                        $ud = $d + $lr*$eh2;
                                        $ue = $e + $lr*$eh2*$input[$y][1];
                                        $uf = $f + $lr*$eh2*$input[$y][0];

                                        //mengupdate weight
                                        $a = $ua;
                                        $b = $ub;
                                        $c = $uc;
                                        $d = $ud;
                                        $e = $ue;
                                        $f = $uf;
                                        $g = $ug;
                                        $h = $uh;
                                        $i = $ui;
                                }
                                //menghtiung mean square error sebanyak input
                                $hasilmse[$x] = (array_sum($mse))/10;
                        }
                        //menghitung mean square error sebanyak iterasi
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
        </body>
</html>