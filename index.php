<!DOCTYPE html>
<html>
	<head>
		<title>Library Citation Project</title>
	</head>
	<body>
		<?php
			$apiKey = '2e4b9d6d318ee089e673e46b3f38493b';

			function buildURL($title, $author, $year) {
				global $apiKey;
				return 'https://api.elsevier.com/content/search/scopus?query=ref(' . $title . ')%20and%20ref(' . $author . ')%20and%20ref(' . $year . ')&apiKey=' . $apiKey . '&callback=?';
			}

			function getNumberOfResults($url) {
				$contents = json_decode(file_get_contents($url), true);

				return $contents['search-results']['opensearch:totalResults'];
			}

			function displayResults($title, $author, $year) {
				$url = buildURL($title, $author, $year);
				$numResults = getNumberOfResults($url);

				echo $author . ' | ' . $title . ' (' . $year . '): ' . $numResults . ' citations'; 
			}

			displayResults('welfare-of-dogs', 'stafford', '2006');
		?>
	</body>
</html>


