function getInfo(title, author, year) {
	var apiKey = '2e4b9d6d318ee089e673e46b3f38493b';
	var url = 
	$.ajax({
		url: url, 
		dataType: 'jsonp',
		crossDomain: true,
        type:"GET",
        contentType: "application/json; charset=utf-8",
		success: function(result) {
			// console.log(String(result);
		}
	});
}

getInfo('welfare-of-dogs', 'stafford', '2006');