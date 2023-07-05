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
		<table>
			<colgroup>
				<col span="2">
				<col id="peaks" span="14">
			</colgroup>
			<tr>
				<th rowspan="2">Song:</th>
				<th rowspan="2">Artist:</th>
				<th colspan="14">Peak:</th>
			</tr>
			<tr>
				<th>🇦🇷</th>
				<th>🇦🇺</th>
				<th>🇦🇹</th>
				<th>🇨🇦</th>
				<th>🇫🇷</th>
				<th>🇩🇪</th>
				<th>🇮🇹</th>
				<th>🇯🇵</th>
				<th>🇰🇷</th>
				<th>🇳🇱</th>
				<th>🇳🇴</th>
				<th>🇳🇿</th>
				<th>🇬🇧</th>
				<th>🇺🇸</th>
			</tr>
			<?php for ($i = 1; $i <= 50; $i++):
				$textcolor = rand(1, 139);
				$bgcolor = rand(1, 139);
				$italics = (rand(1, 2) == 1) ? true : false;
				$bold = (rand(1, 2) == 1) ? true : false;
				$textdecline = rand(1, 8);
				$textdeccolor = $textdecstyle = 0;
				if ($textdecline > 1):
					$textdeccolor = rand(1, 139);
					$textdecstyle = rand(1, 8);
					
					if ($bgcolor >= $textdeccolor and $bgcolor != 139):
						$bgcolor++;
					endif;
				endif;
				
				if ($textcolor >= $bgcolor and $textcolor != 139):
					$textcolor++;
				endif;
				
				$capitals = rand(1, 4);
				$font = rand(1, 11);
				
				if ($font == 2) {
					$bold = false;
				}
				
				$cssClasses = 'textcolor' . $textcolor . ' bgcolor' . $bgcolor . (($italics) ? ' italics' : '') . (($bold) ? ' bold' : '') . ' textdecline' . $textdecline . (($textdecline > 1) ? ' textdeccolor' . $textdeccolor . ' textdecstyle' . $textdecstyle : '') . ' capitals' . $capitals. ' font' . $font; ?>
				
				<tr>
					<?php echo '<td class="' . $cssClasses . '">Song</td>';
					echo '<td class="' . $cssClasses . '">Artist</td>'; ?>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
				</tr>
			<?php endfor; ?>
		</table>
		<!--<script src="sortTable.js"></script>-->
		<!--
		https://www.officialcharts.com/charts/singles-chart/19521114/7501/
		-->
	</body>
</html>