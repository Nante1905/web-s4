import Chart from "./chart/package/auto/auto.js";
import URL from "./env.js";
window.addEventListener("load", () => {
	// récupérer toutes les données
	let xhr = new XMLHttpRequest();
	xhr.open("post", `${URL.APP_URL}dashboard/statistics`, true);
	xhr.send();
	let canvaUtilisateurs = document.querySelector("#graphInscripts");
	xhr.onreadystatechange = () => {
		if (xhr.readyState === 4) {
			console.log(xhr.responseText);
			if (xhr.status === 200) {
				let res = JSON.parse(xhr.responseText);
				let inscrits = res.utilisateurs;
				let inscritsData = inscrits.map((item) => item.nbr_users);
                chartData(inscrits, canvaUtilisateurs, 'Utilisateurs inscrits', "#64c14a")
			} else {
				document.querySelector(".message").innerHTML =
					"Erreur de chargement des données";
			}
		}
	};

	const chartData = (data, canva, label, color) => {
        console.log(data);
		let inscritsData = data.map((item) => item.valeur);
		new Chart(canva, {
			type: "line",
			data: {
				labels: data.map((item) => item.datedujour.split("-")[2]),
				datasets: [
					{
						label: label,
						data: inscritsData,
						borderColor: color,
						fill: false,
						tension: 0.3,
					},
				],
			},
			options: {
				display: true,
				responsive: true,
				scales: {
					y: {
						ticks: {
							min: 0,
							beginAtZero: true,
							stepSize: 1
						},
					},
				},
			},
		});
	};

	// submit formulaire mois et année
});
