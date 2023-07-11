import Chart from "./chart/package/auto/auto.js";
import URL from "./env.js";
window.addEventListener("load", () => {
	//générer chart
	const chartData = (data, canva, label, color,step, marge) => {
		let inscritsData = data.map((item) => item.valeur);
		canva.innerHTML = "";
		return new Chart(canva, {
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
						beginAtZero: true,
						max: Math.max(...inscritsData) + marge,
						ticks: {
							min: 0,
							beginAtZero: true,
							stepSize: step,
						},
					},
				},
			},
		});
	};

	const diagramme = (data, canva, label, color, step) => {
		let dataToUse = data.map((item) => item.valeur);
		canva.innerHTML = "";
		return new Chart(canva, {
			type: "bar",
			data: {
				labels: data.map((item) => item.nom),
				datasets: [
					{
						label: label,
						data: dataToUse,
						backgroundColor: color,
						borderWidth: 1,
					},
				],
			},
			options: {
				display: true,
				responsive: true,
				scales: {
					y: {
						beginAtZero: true,
						max: Math.max(...dataToUse) + 3,
						ticks: {
							min: 0,
							beginAtZero: true,
							stepSize: step
						},
					},
				},
			},
		});
	};

	// récupérer toutes les données
	let xhr = new XMLHttpRequest();
	xhr.open("post", `${URL.APP_URL}dashboard/statistics`, true);
	xhr.send();
	let canvaUtilisateurs = document.querySelector("#graphInscripts");
	let canvaClassement = document.querySelector("#graphClassement");
	let canvaRecharge = document.querySelector("#graphRecharge");
	let canvaVente = document.querySelector("#graphVente");
	let chartUtilisateur = null;
	let chartClassement = null;
	let chartRecharge = null;
	let chartVente = null;
	const divRecharge = document.querySelector('#recharge')
	const divUtilisateur = document.querySelector('#utilisateur')
	const divVente = document.querySelector('#vente')
	const divClassement = document.querySelector('#classement')
	const spinners = document.querySelectorAll('.spinner-grow')
	xhr.onreadystatechange = () => {
		if (xhr.readyState === 4) {
			console.log(xhr.responseText);
			if (xhr.status === 200) {
				let res = JSON.parse(xhr.responseText);
				let inscrits = res.utilisateurs;
				let classement = res.classement;
				let recharge = res.recharge
				let vente = res.vente
			
				if (chartUtilisateur) {
					chartUtilisateur.destroy();
					chartClassement.destroy();
					chartRecharge.destroy();
					chartVente.destroy();
				}
				chartUtilisateur = chartData(
					inscrits,
					canvaUtilisateurs,
					"Utilisateurs inscrits",
					"#64c14a",
					1,
					3
				);
				chartClassement = diagramme(
					classement,
					canvaClassement,
					"Classement des régimes",
					"#6495ed",
					1
				);
				chartRecharge = chartData(
					recharge,
					canvaRecharge,
					"Recharge de code",
					"#64c14a",
					10000,
					10000
				);
				chartVente = chartData(
					vente,
					canvaVente,
					"Recharge de code",
					"#64c14a",
					10000,
					10000
				);
				for (const spinner of spinners) {
					spinner.style.display = 'None'
				}
				divUtilisateur.innerHTML = res.totalUtilisateur
				divVente.innerHTML = res.totalVente + ' Ar'
				divClassement.innerHTML = res.totalRegime  
				divRecharge.innerHTML = res.totalRecharge + ' Ar'
			} else {
				document.querySelector(".message").innerHTML =
					"Erreur de chargement des données";
			}
		}
	};

	// submit formulaire mois et année
	let form = document.querySelector("#form-date");
	form.addEventListener("submit", (event) => {
		event.preventDefault();
		const formData = new FormData(form);
		xhr.open("post", `${URL.APP_URL}dashboard/statistics`, true);
		xhr.send(formData);
	
		xhr.onreadystatechange = () => {
			if (xhr.readyState === 4) {
				// console.log(xhr.responseText);
				if (xhr.status === 200) {
					let res = JSON.parse(xhr.responseText);
					let inscrits = res.utilisateurs;
					let classement = res.classement;
					let recharge = res.recharge
					let vente = res.vente
					console.log(res);
					if (chartUtilisateur) {
						chartUtilisateur.destroy();
						chartClassement.destroy();
						chartRecharge.destroy();
						chartVente.destroy();
					}
					chartUtilisateur = chartData(
						inscrits,
						canvaUtilisateurs,
						"Utilisateurs inscrits",
						"#64c14a",
						1,
						3
					);
					chartClassement = diagramme(
						classement,
						canvaClassement,
						"Classement des régimes",
						"#6495ed",
						1,
						3
					);
					chartRecharge = chartData(
						recharge,
						canvaRecharge,
						"Recharge de code",
						"#64c14a",
						10000,
						10000
					);
					chartVente = chartData(
						vente,
						canvaVente,
						"Recharge de code",
						"#64c14a",
						10000,
						10000
					);
					divUtilisateur.innerHTML = res.totalUtilisateur
					divVente.innerHTML = res.totalVente + ' Ar'
					divClassement.innerHTML = res.totalRegime  
					divRecharge.innerHTML = res.totalRecharge + ' Ar'
				} else {
					document.querySelector(".message").innerHTML =
						"Erreur de chargement des données";
				}
			}
		};
	});
});
