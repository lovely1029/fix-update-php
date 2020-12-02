<?php  class Spline { private $xdata,$ydata; private $y2; private $n=0; function Spline($xdata,$ydata) { $this->y2 = array(); $this->xdata = $xdata; $this->ydata = $ydata; $n = count($ydata); $this->n = $n; if( $this->n !== count($xdata) ) { JpGraphError::RaiseL(19001); } $this->y2[0] = 0.0; $this->y2[$n-1] = 0.0; $delta[0] = 0.0; for($i=1; $i < $n-1; ++$i) { $d = ($xdata[$i+1]-$xdata[$i-1]); if( $d == 0 ) { JpGraphError::RaiseL(19002); } $s = ($xdata[$i]-$xdata[$i-1])/$d; $p = $s*$this->y2[$i-1]+2.0; $this->y2[$i] = ($s-1.0)/$p; $delta[$i] = ($ydata[$i+1]-$ydata[$i])/($xdata[$i+1]-$xdata[$i]) - ($ydata[$i]-$ydata[$i-1])/($xdata[$i]-$xdata[$i-1]); $delta[$i] = (6.0*$delta[$i]/($xdata[$i+1]-$xdata[$i-1])-$s*$delta[$i-1])/$p; } for( $j=$n-2; $j >= 0; --$j ) { $this->y2[$j] = $this->y2[$j]*$this->y2[$j+1] + $delta[$j]; } } function Get($num=50) { $n = $this->n ; $step = ($this->xdata[$n-1]-$this->xdata[0]) / ($num-1); $xnew=array(); $ynew=array(); $xnew[0] = $this->xdata[0]; $ynew[0] = $this->ydata[0]; for( $j=1; $j < $num; ++$j ) { $xnew[$j] = $xnew[0]+$j*$step; $ynew[$j] = $this->Interpolate($xnew[$j]); } return array($xnew,$ynew); } function Interpolate($xpoint) { $max = $this->n-1; $min = 0; while( $max-$min > 1 ) { $k = ($max+$min) / 2; if( $this->xdata[$k] > $xpoint ) $max=$k; else $min=$k; } $h = $this->xdata[$max]-$this->xdata[$min]; if( $h == 0 ) { JpGraphError::RaiseL(19002); } $a = ($this->xdata[$max]-$xpoint)/$h; $b = ($xpoint-$this->xdata[$min])/$h; return $a*$this->ydata[$min]+$b*$this->ydata[$max]+ (($a*$a*$a-$a)*$this->y2[$min]+($b*$b*$b-$b)*$this->y2[$max])*($h*$h)/6.0; } } class Bezier { private $datax = array(); private $datay = array(); private $n=0; function Bezier($datax, $datay, $attraction_factor = 1) { $this->n = count($datax); if( $this->n !== count($datay) ) { JpGraphError::RaiseL(19003); } $idx=0; foreach($datax as $datumx) { for ($i = 0; $i < $attraction_factor; $i++) { $this->datax[$idx++] = $datumx; } } $idx=0; foreach($datay as $datumy) { for ($i = 0; $i < $attraction_factor; $i++) { $this->datay[$idx++] = $datumy; } } $this->n *= $attraction_factor; } function Get($steps) { $datax = array(); $datay = array(); for ($i = 0; $i < $steps; $i++) { list($datumx, $datumy) = $this->GetPoint((double) $i / (double) $steps); $datax[] = $datumx; $datay[] = $datumy; } $datax[] = end($this->datax); $datay[] = end($this->datay); return array($datax, $datay); } function GetPoint($mu) { $n = $this->n - 1; $k = 0; $kn = 0; $nn = 0; $nkn = 0; $blend = 0.0; $newx = 0.0; $newy = 0.0; $muk = 1.0; $munk = (double) pow(1-$mu,(double) $n); for ($k = 0; $k <= $n; $k++) { $nn = $n; $kn = $k; $nkn = $n - $k; $blend = $muk * $munk; $muk *= $mu; $munk /= (1-$mu); while ($nn >= 1) { $blend *= $nn; $nn--; if ($kn > 1) { $blend /= (double) $kn; $kn--; } if ($nkn > 1) { $blend /= (double) $nkn; $nkn--; } } $newx += $this->datax[$k] * $blend; $newy += $this->datay[$k] * $blend; } return array($newx, $newy); } } ?>
