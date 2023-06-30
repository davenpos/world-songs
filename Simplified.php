<!DOCTYPE html>
<?php header('Content-Type: text/html; charset=utf-8'); ?>
<html>
	<head>
		<title>Simplified</title>
		<meta charset="utf-8">
		<style>
			table, th, td {
				border-collapse: collapse;
				text-shadow: 0.5px 0.5px black;
			}

			th, td { border: 1px solid black; }
			
			.testtext1 { color: red; }
			.testtext2 { color: yellow; }
			.testtext3 { color: green; }
			.testtext4 { color: blue; }
			.testtext5 { color: purple; }

			.testbg1 { background-color: red; }
			.testbg2 { background-color: yellow; }
			.testbg3 { background-color: green; }
			.testbg4 { background-color: blue; }
			.testbg5 { background-color: purple; }
		</style>
	</head>
	<body>
		<?php $file = 'Test.csv';
		
		if (!file_exists($file)) {
			die("CSV file not found.");
		}
		
		$data = array_map('str_getcsv', file($file));
		?>
		
		<table>
			<?php
			foreach ($data as $rowIndex => $row):
				$textcolor = $row[1];
				$bgcolor = $row[0];
				if ($textcolor === $bgcolor):
					/*$repeatedElement = $row;
					array_splice($data, $rowIndex, 0, $repeatedElement);
					continue;*/
				endif;
				echo '<tr class="testtext' . $textcolor . ' testbg' . $bgcolor . '">';
				foreach ($row as $cell):
					echo '<td>' . htmlspecialchars($cell) . '</td>';
				endforeach;
				echo '</tr>';
			endforeach;
			?>
		</table>
	</body>
</html>