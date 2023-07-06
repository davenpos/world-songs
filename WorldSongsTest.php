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
			<?php
			$file = 'Test.csv';
			
			if (!file_exists($file)) {
				die("CSV file not found.");
			}

			$data = array_map('str_getcsv', file($file));
			
			require __DIR__ . '/GetRowStyling.php';
			
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