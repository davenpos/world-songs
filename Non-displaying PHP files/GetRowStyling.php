<?php
function getRowStyling($number) {
	$textcolor = ($number % 138) + 1;
	$bgcolor = (int)($number / 138) % 139 + 1;
	
	$italics = (((int)($number / 19182) % 19182)) % 2 == 1 ? true : false;
	
	$bold = false;
	
	$textdecStart = 76728;
	$textdecEnd = 370672968;
	
	if ($number < 2224037807):
		$font = (int)(ceil(($number + 1) / 1482691872));
	else:
		$font = (int)(ceil(($number + 741345937) / 1482691872));
	endif;
	
	if ($font != 2):
		$bold = (((int)($number / 38364) % 38364)) % 2 == 1 ? true : false;
	else:
		$textdecStart /= 2;
		$textdecEnd /= 2;
	endif;
	
	$textdecline = 1;
	$textdeccolor = $textdecstyle = 0;
				
	if ($number % $textdecEnd >= $textdecStart):
		$rowNumIgnoringNoTextDecs = $number % $textdecEnd - ($textdecStart - 1);
		$textdecstyleCycleStart = ($textdecEnd - $textdecStart) / 5;
		$textdeccolorCycleStart = $textdecstyleCycleStart / 139;
		$textdeclineCycleStart = $textdeccolorCycleStart / 7;
		
		$bgcolor = (int)(($rowNumIgnoringNoTextDecs - 1) / 138) % 138 + 1;
		
		$italics = (((int)(($rowNumIgnoringNoTextDecs - 1) / 19044) % 19044)) % 2 == 1 ? true : false;
		if ($font != 2):
			$bold = (((int)(($rowNumIgnoringNoTextDecs - 1) / 38088) % 38088)) % 2 == 1 ? true : false;
		else:
			$textdecstyleCycleStart /= 2;
			$textdeccolorCycleStart /= 2;
			$textdeclineCycleStart /= 2;
		endif;
		
		$textdecline = (((int)(($rowNumIgnoringNoTextDecs - 1) / $textdeclineCycleStart)) % 7) + 2;
		$textdeccolor = (((int)(($rowNumIgnoringNoTextDecs - 1) / $textdeccolorCycleStart)) % 139) + 1;
		$textdecstyle = (((int)(($rowNumIgnoringNoTextDecs - 1) / $textdecstyleCycleStart)) % 5) + 1;
		
		if ($bgcolor >= $textdeccolor and $bgcolor != 139):
			$bgcolor++;
		endif;
	endif;
	
	if ($textcolor >= $bgcolor and $textcolor != 139):
		$textcolor++;
	endif;
	
	if ($font > 2):
		$capitals = (int)(($number - (2 * $textdecEnd)) / $textdecEnd) % 4 + 1;
	else:
		$capitals = (int)($number / $textdecEnd) % 4 + 1;
	endif;
	
	return 'textcolor' . $textcolor . ' bgcolor' . $bgcolor . (($italics) ? ' italics' : '') . (($bold) ? ' bold' : '') . ' textdecline' . $textdecline . (($textdecline > 1) ? ' textdeccolor' . $textdeccolor . ' textdecstyle' . $textdecstyle : '') . ' capitals' . $capitals. ' font' . $font;
}
?>