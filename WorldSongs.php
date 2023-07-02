<!DOCTYPE html>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<html>
	<head>
		<title>World Songs</title>
		<link rel="stylesheet" href="WorldSongs.css">
		<meta charset="utf-8">
	</head>
	<body>
		<h1>World Songs</h1>
		<table id="tbl">
			<th>Song:</th><!-- class="sortable" onclick="sortTable(0)"-->
			<th>Artist:</th><!-- class="sortable" onclick="sortTable(1)"-->
			<th>🇦🇺</th>
			<th>🇦🇹</th>
			<th>🇨🇦</th>
			<th>🇫🇷</th>
			<th>🇩🇪</th>
			<th>🇮🇹</th>
			<th>🇯🇵</th>
			<th>🇳🇱</th>
			<th>🇳🇴</th>
			<th>🇳🇿</th>
			<th>🇬🇧</th>
			<th>🇺🇸</th>
			<?php
			$file = 'WorldSongs.csv';
			
			if (!file_exists($file)) {
				die("CSV file not found.");
			}

			$data = array_map('str_getcsv', file($file));
			
			foreach ($data as $rowIndex => $row):
				$textcolor = ($rowIndex % 138) + 1;
				$bgcolor = (int)($rowIndex / 138) % 139 + 1;
				
				$italics = (((int)(($rowIndex) / 19182) % 19182)) % 2 == 1 ? true : false;
				
				$bold = false;
				
				$textdecStart = 76728;
				$textdecEnd = 370672968;
				
				if ($rowIndex < 2224037807) {
					$font = (int)(ceil(($rowIndex + 1) / 1482691872));
				} else {
					$font = (int)(ceil(($rowIndex + 741345937) / 1482691872));
				}
				
				if ($font != 2) {
					$bold = (((int)($rowIndex / 38364) % 38364)) % 2 == 1 ? true : false;
				} else {
					$textdecStart /= 2;
					$textdecEnd /= 2;
				}
				
				$textdecline = 1;
				$textdeccolor = $textdecstyle = 0;
				
				if ($rowIndex % $textdecEnd >= $textdecStart) {
					$rowNumIgnoringNoTextDecs = $rowIndex % $textdecEnd - ($textdecStart - 1);
					$textdecstyleCycleStart = ($textdecEnd - $textdecStart) / 5;
					$textdeccolorCycleStart = $textdecstyleCycleStart / 139;
					$textdeclineCycleStart = $textdeccolorCycleStart / 7;
					
					$bgcolor = (int)(($rowNumIgnoringNoTextDecs - 1) / 138) % 138 + 1;
					
					$italics = (((int)(($rowNumIgnoringNoTextDecs - 1) / 19044) % 19044)) % 2 == 1 ? true : false;
					if ($font != 2) {
						$bold = (((int)(($rowNumIgnoringNoTextDecs - 1) / 38088) % 38088)) % 2 == 1 ? true : false;
					} else {
						$textdecstyleCycleStart /= 2;
						$textdeccolorCycleStart /= 2;
						$textdeclineCycleStart /= 2;
					}
					
					$textdecline = (((int)(($rowNumIgnoringNoTextDecs - 1) / $textdeclineCycleStart)) % 7) + 2;
					$textdeccolor = (((int)(($rowNumIgnoringNoTextDecs - 1) / $textdeccolorCycleStart)) % 139) + 1;
					$textdecstyle = (((int)(($rowNumIgnoringNoTextDecs - 1) / $textdecstyleCycleStart)) % 5) + 1;
					
					if ($bgcolor >= $textdeccolor and $bgcolor != 139) {
						$bgcolor++;
					}
				}
				
				if ($textcolor >= $bgcolor and $textcolor != 139) {
					$textcolor++;
				}
				
				if ($font > 2) {
					$capitals = (int)(($rowIndex - (2 * $textdecEnd)) / $textdecEnd) % 4 + 1;
				} else {
					$capitals = (int)($rowIndex / $textdecEnd) % 4 + 1;
				}
				
				$cssClasses = 'textcolor' . $textcolor . ' bgcolor' . $bgcolor . (($italics) ? ' italics' : '') . (($bold) ? ' bold' : '') . ' textdecline' . $textdecline . (($textdecline > 1) ? ' textdeccolor' . $textdeccolor . ' textdecstyle' . $textdecstyle : '') . ' capitals' . $capitals. ' font' . $font;
				echo '<tr>';
					foreach ($row as $cellIndex => $cell):
						echo (($cellIndex < 2) ? '<td class="' . $cssClasses . '">' : '<td>') . htmlspecialchars($cell) . '</td>';
					endforeach;
				echo '</tr>';
			endforeach; ?>
		</table>
		<!--<script src="sortTable.js"></script>-->
		<!--
		15,568,264,656 different combinations
		https://www.officialcharts.com/charts/singles-chart/19530213/7501
		-->
	</body>
</html>