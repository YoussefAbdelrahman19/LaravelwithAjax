var chart6 = c3.generate({
	bindto: '#barGraph',
	padding: {
		top: 0,
		left: 30,
		right: 20,
	},
	data: {
		columns: [
			['data1', 15, 58, 62, 87, 32, 58, 55, 21, 20, 30, 98, 10, 22, 98, 99, 105, 82, 57, 121, 78],
		],
		type: 'bar',
		names: {
			data1: 'age',
		},
		colors: {
			data1: '#007ae1',
		},
	},
});
