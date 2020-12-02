<?php
 define("BAND_RDIAG",1); define("BAND_LDIAG",2); define("BAND_SOLID",3); define("BAND_VLINE",4); define("BAND_HLINE",5); define("BAND_3DPLANE",6); define("BAND_HVCROSS",7); define("BAND_DIAGCROSS",8); class Rectangle { public $x,$y,$w,$h; public $xe, $ye; function Rectangle($aX,$aY,$aWidth,$aHeight) { $this->x=$aX; $this->y=$aY; $this->w=$aWidth; $this->h=$aHeight; $this->xe=$aX+$aWidth-1; $this->ye=$aY+$aHeight-1; } } class RectPattern { protected $color; protected $weight; protected $rect=null; protected $doframe=true; protected $linespacing; protected $iBackgroundColor=-1; function RectPattern($aColor,$aWeight=1) { $this->color = $aColor; $this->weight = $aWeight; } function SetBackground($aBackgroundColor) { $this->iBackgroundColor=$aBackgroundColor; } function SetPos($aRect) { $this->rect = $aRect; } function ShowFrame($aShow=true) { $this->doframe=$aShow; } function SetDensity($aDens) { if( $aDens < 1 || $aDens > 100 ) JpGraphError::RaiseL(16001,$aDens); $this->linespacing = floor(((100-$aDens)/100.0)*50)+1; } function Stroke($aImg) { if( $this->rect == null ) JpGraphError::RaiseL(16002); if( !(is_numeric($this->iBackgroundColor) && $this->iBackgroundColor==-1) ) { $aImg->SetColor($this->iBackgroundColor); $aImg->FilledRectangle($this->rect->x,$this->rect->y,$this->rect->xe,$this->rect->ye); } $aImg->SetColor($this->color); $aImg->SetLineWeight($this->weight); $this->DoPattern($aImg); if( $this->doframe ) $aImg->Rectangle($this->rect->x,$this->rect->y,$this->rect->xe,$this->rect->ye); } } class RectPatternSolid extends RectPattern { function RectPatternSolid($aColor="black",$aWeight=1) { parent::RectPattern($aColor,$aWeight); } function DoPattern($aImg) { $aImg->SetColor($this->color); $aImg->FilledRectangle($this->rect->x,$this->rect->y, $this->rect->xe,$this->rect->ye); } } class RectPatternHor extends RectPattern { function RectPatternHor($aColor="black",$aWeight=1,$aLineSpacing=7) { parent::RectPattern($aColor,$aWeight); $this->linespacing = $aLineSpacing; } function DoPattern($aImg) { $x0 = $this->rect->x; $x1 = $this->rect->xe; $y = $this->rect->y; while( $y < $this->rect->ye ) { $aImg->Line($x0,$y,$x1,$y); $y += $this->linespacing; } } } class RectPatternVert extends RectPattern { function RectPatternVert($aColor="black",$aWeight=1,$aLineSpacing=7) { parent::RectPattern($aColor,$aWeight); $this->linespacing = $aLineSpacing; } function DoPattern($aImg) { $x = $this->rect->x; $y0 = $this->rect->y; $y1 = $this->rect->ye; while( $x < $this->rect->xe ) { $aImg->Line($x,$y0,$x,$y1); $x += $this->linespacing; } } } class RectPatternRDiag extends RectPattern { function RectPatternRDiag($aColor="black",$aWeight=1,$aLineSpacing=12) { parent::RectPattern($aColor,$aWeight); $this->linespacing = $aLineSpacing; } function DoPattern($aImg) { $xe = $this->rect->xe; $ye = $this->rect->ye; $x0 = $this->rect->x + round($this->linespacing/2); $y0 = $this->rect->y; $x1 = $this->rect->x; $y1 = $this->rect->y + round($this->linespacing/2); while($x0<=$xe && $y1<=$ye) { $aImg->Line($x0,$y0,$x1,$y1); $x0 += $this->linespacing; $y1 += $this->linespacing; } if( $xe-$x1 > $ye-$y0 ) { $x1 = $this->rect->x + ($y1-$ye); $y1 = $ye; $y0 = $this->rect->y; while( $x0 <= $xe ) { $aImg->Line($x0,$y0,$x1,$y1); $x0 += $this->linespacing; $x1 += $this->linespacing; } $y0=$this->rect->y + ($x0-$xe); $x0=$xe; } else { $diff = $x0-$xe; $y0 = $diff+$this->rect->y; $x0 = $xe; $x1 = $this->rect->x; while( $y1 <= $ye ) { $aImg->Line($x0,$y0,$x1,$y1); $y1 += $this->linespacing; $y0 += $this->linespacing; } $diff = $y1-$ye; $y1 = $ye; $x1 = $diff + $this->rect->x; } while( $y0 <= $ye ) { $aImg->Line($x0,$y0,$x1,$y1); $y0 += $this->linespacing; $x1 += $this->linespacing; } } } class RectPatternLDiag extends RectPattern { function RectPatternLDiag($aColor="black",$aWeight=1,$aLineSpacing=12) { $this->linespacing = $aLineSpacing; parent::RectPattern($aColor,$aWeight); } function DoPattern($aImg) { $xe = $this->rect->xe; $ye = $this->rect->ye; $x0 = $this->rect->x + round($this->linespacing/2); $y0 = $this->rect->ye; $x1 = $this->rect->x; $y1 = $this->rect->ye - round($this->linespacing/2); while($x0<=$xe && $y1>=$this->rect->y) { $aImg->Line($x0,$y0,$x1,$y1); $x0 += $this->linespacing; $y1 -= $this->linespacing; } if( $xe-$x1 > $ye-$this->rect->y ) { $x1 = $this->rect->x + ($this->rect->y-$y1); $y0=$ye; $y1=$this->rect->y; while( $x0 <= $xe ) { $aImg->Line($x0,$y0,$x1,$y1); $x0 += $this->linespacing; $x1 += $this->linespacing; } $y0=$this->rect->ye - ($x0-$xe); $x0=$xe; } else { $diff = $x0-$xe; $y0 = $ye-$diff; $x0 = $xe; while( $y1 >= $this->rect->y ) { $aImg->Line($x0,$y0,$x1,$y1); $y0 -= $this->linespacing; $y1 -= $this->linespacing; } $diff = $this->rect->y - $y1; $x1 = $this->rect->x + $diff; $y1 = $this->rect->y; } while( $y0 >= $this->rect->y ) { $aImg->Line($x0,$y0,$x1,$y1); $y0 -= $this->linespacing; $x1 += $this->linespacing; } } } class RectPattern3DPlane extends RectPattern { private $alpha=50; function RectPattern3DPlane($aColor="black",$aWeight=1) { parent::RectPattern($aColor,$aWeight); $this->SetDensity(10); } function SetHorizon($aHorizon) { $this->alpha=$aHorizon; } function DoPattern($aImg) { $x0 = $this->rect->x + $this->rect->w/2; $y0 = $this->rect->y; $x1 = $x0; $y1 = $this->rect->ye; $x0_right = $x0; $x1_right = $x1; $apa = $this->rect->h + $this->alpha; $middle=$this->rect->x + $this->rect->w/2; $dist=$this->linespacing; $factor=$this->alpha /($apa); while($x1>$this->rect->x) { $aImg->Line($x0,$y0,$x1,$y1); $aImg->Line($x0_right,$y0,$x1_right,$y1); $x1 = $middle - $dist; $x0 = $middle - $dist * $factor; $x1_right = $middle + $dist; $x0_right = $middle + $dist * $factor; $dist += $this->linespacing; } $dist -= $this->linespacing; $d=$this->rect->w/2; $c = $apa - $d*$apa/$dist; while( $x0>$this->rect->x ) { $aImg->Line($x0,$y0,$this->rect->x,$this->rect->ye-$c); $aImg->Line($x0_right,$y0,$this->rect->xe,$this->rect->ye-$c); $dist += $this->linespacing; $x0 = $middle - $dist * $factor; $x1 = $middle - $dist; $x0_right = $middle + $dist * $factor; $c = $apa - $d*$apa/$dist; } $x0=$this->rect->x; $x1=$this->rect->xe; $y=$this->rect->ye; $aImg->Line($x0,$y,$x1,$y); $hls = $this->linespacing; $vls = $this->linespacing*0.6; $ds = $hls*($apa-$vls)/$apa; $y -= $vls; $k=($this->rect->ye-($this->rect->ye-$vls))/($middle-($middle-$ds)); $dist = $hls; while( $y>$this->rect->y ) { $aImg->Line($this->rect->x,$y,$this->rect->xe,$y); $adj = $k*$dist/(1+$dist*$k/$apa); if( $adj < 2 ) $adj=1; $y = $this->rect->ye - round($adj); $dist += $hls; } } } class RectPatternCross extends RectPattern { private $vert=null; private $hor=null; function RectPatternCross($aColor="black",$aWeight=1) { parent::RectPattern($aColor,$aWeight); $this->vert = new RectPatternVert($aColor,$aWeight); $this->hor = new RectPatternHor($aColor,$aWeight); } function SetOrder($aDepth) { $this->vert->SetOrder($aDepth); $this->hor->SetOrder($aDepth); } function SetPos($aRect) { parent::SetPos($aRect); $this->vert->SetPos($aRect); $this->hor->SetPos($aRect); } function SetDensity($aDens) { $this->vert->SetDensity($aDens); $this->hor->SetDensity($aDens); } function DoPattern($aImg) { $this->vert->DoPattern($aImg); $this->hor->DoPattern($aImg); } } class RectPatternDiagCross extends RectPattern { private $left=null; private $right=null; function RectPatternDiagCross($aColor="black",$aWeight=1) { parent::RectPattern($aColor,$aWeight); $this->right = new RectPatternRDiag($aColor,$aWeight); $this->left = new RectPatternLDiag($aColor,$aWeight); } function SetOrder($aDepth) { $this->left->SetOrder($aDepth); $this->right->SetOrder($aDepth); } function SetPos($aRect) { parent::SetPos($aRect); $this->left->SetPos($aRect); $this->right->SetPos($aRect); } function SetDensity($aDens) { $this->left->SetDensity($aDens); $this->right->SetDensity($aDens); } function DoPattern($aImg) { $this->left->DoPattern($aImg); $this->right->DoPattern($aImg); } } class RectPatternFactory { function RectPatternFactory() { } function Create($aPattern,$aColor,$aWeight=1) { switch($aPattern) { case BAND_RDIAG: $obj = new RectPatternRDiag($aColor,$aWeight); break; case BAND_LDIAG: $obj = new RectPatternLDiag($aColor,$aWeight); break; case BAND_SOLID: $obj = new RectPatternSolid($aColor,$aWeight); break; case BAND_VLINE: $obj = new RectPatternVert($aColor,$aWeight); break; case BAND_HLINE: $obj = new RectPatternHor($aColor,$aWeight); break; case BAND_3DPLANE: $obj = new RectPattern3DPlane($aColor,$aWeight); break; case BAND_HVCROSS: $obj = new RectPatternCross($aColor,$aWeight); break; case BAND_DIAGCROSS: $obj = new RectPatternDiagCross($aColor,$aWeight); break; default: JpGraphError::RaiseL(16003,$aPattern); } return $obj; } } class PlotBand { public $depth; private $prect=null; private $dir, $min, $max; function PlotBand($aDir,$aPattern,$aMin,$aMax,$aColor="black",$aWeight=1,$aDepth=DEPTH_BACK) { $f = new RectPatternFactory(); $this->prect = $f->Create($aPattern,$aColor,$aWeight); if( is_numeric($aMin) && is_numeric($aMax) && ($aMin > $aMax) ) JpGraphError::RaiseL(16004); $this->dir = $aDir; $this->min = $aMin; $this->max = $aMax; $this->depth=$aDepth; } function SetPos($aRect) { assert( $this->prect != null ) ; $this->prect->SetPos($aRect); } function ShowFrame($aFlag=true) { $this->prect->ShowFrame($aFlag); } function SetOrder($aDepth) { $this->depth=$aDepth; } function SetDensity($aDens) { $this->prect->SetDensity($aDens); } function GetDir() { return $this->dir; } function GetMin() { return $this->min; } function GetMax() { return $this->max; } function PreStrokeAdjust($aGraph) { } function Stroke($aImg,$aXScale,$aYScale) { assert( $this->prect != null ) ; if( $this->dir == HORIZONTAL ) { if( $this->min === 'min' ) $this->min = $aYScale->GetMinVal(); if( $this->max === 'max' ) $this->max = $aYScale->GetMaxVal(); if ($this->min < $aYScale->GetMaxVal() && $this->max > $aYScale->GetMinVal()) { $this->min = max($this->min, $aYScale->GetMinVal()); $this->max = min($this->max, $aYScale->GetMaxVal()); $x=$aXScale->scale_abs[0]; $y=$aYScale->Translate($this->max); $width=$aXScale->scale_abs[1]-$aXScale->scale_abs[0]+1; $height=abs($y-$aYScale->Translate($this->min))+1; $this->prect->SetPos(new Rectangle($x,$y,$width,$height)); $this->prect->Stroke($aImg); } } else { if( $this->min === 'min' ) $this->min = $aXScale->GetMinVal(); if( $this->max === 'max' ) $this->max = $aXScale->GetMaxVal(); if ($this->min < $aXScale->GetMaxVal() && $this->max > $aXScale->GetMinVal()) { $this->min = max($this->min, $aXScale->GetMinVal()); $this->max = min($this->max, $aXScale->GetMaxVal()); $y=$aYScale->scale_abs[1]; $x=$aXScale->Translate($this->min); $height=abs($aYScale->scale_abs[1]-$aYScale->scale_abs[0]); $width=abs($x-$aXScale->Translate($this->max)); $this->prect->SetPos(new Rectangle($x,$y,$width,$height)); $this->prect->Stroke($aImg); } } } } ?>
