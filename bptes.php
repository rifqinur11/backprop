<!DOCTYPE html>
<html>
        <head>
                <title>Training Data</title>
        </head>
        <body>
                <?php
                        $lr = 0.7;
                        //$mse = 1;
                        //$err = 1;
                         $a = -0.80106201936684;
                                $b = 0.95295796895716;
                                $c = 2.2011858002888;
                                $d = 2.0016455964589;
                                $e = -1.6396549991645;
                                $f = -4.1628337546297;
                                $g = 0.47852580978369;
                                $h = 2.7654245423224;
                                $i = -5.1374651195997;

                        // $input = array
                        //         (
                        //         array(0,0),
                        //         array(0,1),
                        //         array(0,2),
                        //         array(1,1),
                        //         array(1,3),
                        //         array(1,2),
                        //         array(2,0),
                        //         array(2,1),
                        //         array(2,3),
                        //         array(2,2)
                        //         );
                        // $output = array(0,0,0,1,1,1,2,2,2,2);

                        for ($x=0; $x<30; $x++) { 
                        	$nh1= $a + ($b*0.64) + ($c*0.15);
                            $nh2= $d + ($e*0.64) + ($f*0.15); 

                            $oh1= 1 / (1+exp($nh1*(-1)));
                            $oh2= 1 / (1+exp($nh2*(-1)));

                            $no= $g + ($oh1*$h) + ($oh2*$i);

                            $out= 1 / (1+exp($no*(-1)));
                                /*for ($y=0; $y < 10; $y++) { 
                                        
                                        //echo $out[$y];
                                        // $out2[$y] = 1 / (1+exp($no2[$y]*(-1)));
                                        // $out3[$y] = 1 / (1+exp($no3[$y]*(-1)));

                                        $mse = pow((1-$out[$y]),2);

                                        $err[$y] = (1-$out[$y])*$out[$y]*(1-$out[$y]);

                                        $ug = $g + $lr*$err[$y];
                                        $uh = $h + $lr*$err[$y]*$oh1[$y];
                                        $ui = $i + $lr*$err[$y]*$oh2[$y];

                                        $enh1 = $err[$y]*$h;
                                        $enh2 = $err[$y]*$i;

                                        $eh1 = $enh1*$oh1[$y]*(1-$oh1[$y]);
                                        $eh2 = $enh2*$oh2[$y]*(1-$oh2[$y]);

                                        $ua = $a + $lr*$eh1;
                                        $ub = $b + $lr*$eh1*$input[$y][0];
                                        $uc = $c + $lr*$eh1*$input[$y][1];
                                        $ud = $d + $lr*$eh2;
                                        $ue = $e + $lr*$eh2*$input[$y][0];
                                        $uf = $f + $lr*$eh2*$input[$y][1];

                                        $a = $ua;
                                        $b = $ub;
                                        $c = $uc;
                                        $d = $ud;
                                        $e = $ue;
                                        $f = $uf;
                                        $g = $ug;
                                        $h = $uh;
                                        $i = $ui;
                                }*/
                        }?>
                
                <h4>Iterasi : <?php echo $x;?></h4>
                <h4>Output : <?php echo $out;?></h4>
        </body>
</html>