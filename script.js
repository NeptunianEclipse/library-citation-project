function getInfo(title, author, year) {
	var url = 'https://api.elsevier.com/content/search/scopus?query=ref(' + title + ')%20and%20ref(' + author + ')%20and%20ref(' + year + ')&apiKey=7f59af901d2d86f78a1fd60c1bf9426a';
	$.ajax({url: url, success: function(result) {
		console.log(result);
	}});
}

getInfo('welfare-of-dogs', 'stafford', '2006');