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
				<col id="peaks" span="16">
			</colgroup>
			<tr>
				<th rowspan="3">Song:</th>
				<th rowspan="3">Artist:</th>
				<th colspan="16">Peak:</th>
			</tr>
			<tr>
				<th rowspan="2">🇦🇷</th>
				<th rowspan="2">🇦🇺</th>
				<th rowspan="2">🇦🇹</th>
				<th colspan="2">🇧🇪<br /></th>
				<th rowspan="2">🇨🇦</th>
				<th rowspan="2">🇫🇷</th>
				<th rowspan="2">🇩🇪</th>
				<th rowspan="2">🇮🇹</th>
				<th rowspan="2">🇯🇵</th>
				<th rowspan="2">🇰🇷</th>
				<th rowspan="2">🇳🇱</th>
				<th rowspan="2">🇳🇴</th>
				<th rowspan="2">🇳🇿</th>
				<th rowspan="2">🇬🇧</th>
				<th rowspan="2">🇺🇸</th>
			</tr>
			<tr id="belgiumcharts">
				<th>VLG</th>
				<th>WAL</th>
			</tr>
			<?php
			$file = 'Test.csv';
			
			if (!file_exists($file)) {
				die("CSV file not found.");
			}

			$data = array_map('str_getcsv', file($file));
			
			require __DIR__ . '/Non-displaying PHP files/GetRowStyling.php';
			
			foreach ($data as $row):
				$cssClasses = getRowStyling($row[0] - 1); ?>
				<tr>
					<?php array_shift($row);
					foreach ($row as $cellIndex => $cell):
						echo (($cellIndex < 2) ? '<td class="' . $cssClasses . '">' : '<td>') . htmlspecialchars($cell) . '</td>';
					endforeach; ?>
				</tr>
			<?php endforeach; ?>
		</table>
	</body>
</html>