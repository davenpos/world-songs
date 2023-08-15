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
				<col id="peaks" span="18">
			</colgroup>
			<tr>
				<th rowspan="3">Song:</th>
				<th rowspan="3">Artist:</th>
				<th colspan="18">Peak:</th>
			</tr>
			<tr>
				<th rowspan="2">🇦🇷</th>
				<th rowspan="2">🇦🇺</th>
				<th rowspan="2">🇦🇹</th>
				<th colspan="2">🇧🇪</th>
				<th rowspan="2">🇨🇦</th>
				<th rowspan="2">🇫🇷</th>
				<th rowspan="2">🇩🇪</th>
				<th rowspan="2">🇮🇹</th>
				<th rowspan="2">🇯🇵</th>
				<th rowspan="2">🇲🇽</th>
				<th rowspan="2">🇰🇷</th>
				<th rowspan="2">🇳🇱</th>
				<th rowspan="2">🇳🇴</th>
				<th rowspan="2">🇳🇿</th>
				<th rowspan="2">🇸🇪</th>
				<th rowspan="2">🇬🇧</th>
				<th rowspan="2">🇺🇸</th>
			</tr>
			<tr id="belgiumcharts">
				<th>VLG</th>
				<th>WAL</th>
			</tr>
			<?php
			$file = 'WorldSongs.csv';
			
			if (!file_exists($file)) {
				die("CSV file not found.");
			}

			$data = array_map('str_getcsv', file($file));
			
			require __DIR__ . '/Non-displaying PHP files/GetRowStyling.php';
			
			foreach ($data as $rowIndex => $row):
				if ($rowIndex === 0):
					continue;
				endif;
				$cssClasses = getRowStyling($rowIndex - 1); ?>
				<tr>
					<?php foreach ($row as $cellIndex => $cell):
						echo (($cellIndex < 2) ? '<td class="' . $cssClasses . '">' : '<td>') . htmlspecialchars($cell) . '</td>';
					endforeach; ?>
				</tr>
			<?php endforeach; ?>
		</table>
		<!--
		15,568,264,656 different combinations
		https://www.officialcharts.com/charts/singles-chart/19540219/7501
		http://www.charts-surfer.de/musikcharts.php
		-->
	</body>
</html>