var chart9 = c3.generate({
	bindto: '#pieChart',
	data: {
		// iris data from R
		columns: [
			['Male', 36],
			['Female', 5],
		],
		type : 'pie',
		colors: {
            Male: '#007ae1',
            Female: '#e5e8f2',
		},
		onclick: function (d, i) { console.log("onclick", d, i); },
		onmouseover: function (d, i) { console.log("onmouseover", d, i); },
		onmouseout: function (d, i) { console.log("onmouseout", d, i); }
	}
});
