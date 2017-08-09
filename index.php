<!DOCTYPE html>
<html>
	<head>
		<title>Library Citation Project</title>
		<style>
			table {
				border-collapse: collapse;
			}

			td {
				padding: 10px;
			}
		</style>
	</head>
	<body>
		<form action="index.php" method="post">
			Title: <input type="text" name="title"><br/>
			Author: <input type="text" name="author"><br/>
			Year: <input type="text" name="year"><br/><br/>
			<input type="submit">
		</form>
		<?php
			$apiKey = $_GET['apiKey'] ?? '2e4b9d6d318ee089e673e46b3f38493b';

			function buildURL($title, $author, $year) {
				global $apiKey;
				return 'https://api.elsevier.com/content/search/scopus?query=ref(' . $title . ')%20and%20ref(' . $author . ')%20and%20ref(' . $year . ')&apiKey=' . $apiKey . '&callback=?';
			}

			function getNumberOfResults($url) {
				$json = file_get_contents($url);
				$contents = json_decode($json, true);

				return $contents['search-results']['opensearch:totalResults'];
			}

			function displayResults($title, $author, $year) {
				$url = buildURL($title, $author, $year);
				$numResults = getNumberOfResults($url);

				echo "<table border='1'><tr><td>Author</td><td>Title</td><td>Year</td><td>Citations</td></tr><tr><td>$author</td><td>$title</td><td>$year</td><td>$numResults</td></tr></table>";
			}

			if(isset($_GET['title']) && isset($_GET['author']) && $_GET['year']) {
				displayResults($_GET['title'], $_GET['author'], $_GET['year']);

			} else if(isset($_POST['title']) && isset($_POST['author']) && $_POST['year']) {
				displayResults($_POST['title'], $_POST['author'], $_POST['year']);

			} else {
				echo "Input missing";

			}
		?>
	</body>
</html>

