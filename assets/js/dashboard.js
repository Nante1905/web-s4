import Chart from "./chart/package/auto/auto.js";
import URL from "./env.js";
window.addEventListener("load", () => {
    //générer chart
    const chartData = (data, canva, label, color) => {
		let inscritsData = data.map((item) => item.valeur);
        canva.innerHTML = ''
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

	// récupérer toutes les données
	let xhr = new XMLHttpRequest();
	xhr.open("post", `${URL.APP_URL}dashboard/statistics`, true);
	xhr.send();
	let canvaUtilisateurs = document.querySelector("#graphInscripts");
    let chartUtilisateur = null
	xhr.onreadystatechange = () => {
		if (xhr.readyState === 4) {
			console.log(xhr.responseText);
			if (xhr.status === 200) {
				let res = JSON.parse(xhr.responseText);
				let inscrits = res.utilisateurs;
                if(chartUtilisateur) {
                    chartUtilisateur.destroy()
                }
                chartUtilisateur = chartData(inscrits, canvaUtilisateurs, 'Utilisateurs inscrits', "#64c14a")
			} else {
				document.querySelector(".message").innerHTML =
					"Erreur de chargement des données";
			}
		}
	};

	

	// submit formulaire mois et année
    let form = document.querySelector('#form-date')
    form.addEventListener('submit', (event) => {
        event.preventDefault()
        const formData = new FormData(form)
        xhr.open("post", `${URL.APP_URL}dashboard/statistics`, true);
	    xhr.send(formData);
        console.log(formData.mois)
        xhr.onreadystatechange = () => {
            if (xhr.readyState === 4) {
                console.log(xhr.responseText);
                if (xhr.status === 200) {
                    let res = JSON.parse(xhr.responseText);
                    let inscrits = res.utilisateurs;
                    if(chartUtilisateur) {
                        chartUtilisateur.destroy()
                    }
                    chartUtilisateur = chartData(inscrits, canvaUtilisateurs, 'Utilisateurs inscrits', "#64c14a")
                } else {
                    document.querySelector(".message").innerHTML =
                        "Erreur de chargement des données";
                }
            }
        };
    })
});
