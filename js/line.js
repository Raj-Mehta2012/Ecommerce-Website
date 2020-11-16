$(document).ready(function() {

	var ctx=$("#line-chartcanvas");

	var data={
		labels: ["Maths","Science","IT","History","Geography"],
		datasets: [
			{
				label: "Raj",
				data: [80, 91, 97, 86, 99],
				backgroundColor: "blue",
				borderColor: "lightblue",
				fill: false,
				lineTension: 0.3,
				pointRadius: 5
			},

			{
				label: "ClassAverage",
				data: [65, 80, 85, 90, 80],
				backgroundColor: "red",
				borderColor: "orange",
				fill: false,
				lineTension: 0.3,
				pointRadius: 5
			},

			{
				label: "ClassTopper",
				data: [90, 93, 99, 92, 99],
				backgroundColor: "green",
				borderColor: "lightgreen",
				fill: false,
				lineTension: 0.3,
				pointRadius: 5
			}
		]
	};

	var options={
		title:{
			display: true,
			position: "top",
			text: "Performance Tracker",
			fontSize: 50,
			fontColor: "#53244f"
		},

		legend:{
			display: true,
			position: "bottom"
		}
	};

	var chart=new Chart(ctx,{
		type:"line",
		data:data,
		options:options 
	});
});