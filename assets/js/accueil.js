window.addEventListener("load", () => {
	const buttons = document.querySelectorAll(".btn-details");
	let id;
	for (const button of buttons) {
		button.addEventListener("click", () => {
			id = button.getAttribute("data-id");
			let xhr = new XMLHttpRequest();
			// xhr.send(formData);
            // id = 2;
			xhr.open("get", `http://localhost/web-s4/index.php/welcome/details/${ id }`, true);
            xhr.send();

			xhr.onload = () => {
				let response = xhr.responseText;
                console.log(response);
                const div = document.querySelector(`#details_${ id }`)
                let html = '';
                for (const res of JSON.parse(response)) {
                    html += `<li> ${ res.nom } </li>`
                }

                div.innerHTML = html;
			};
		});
	}


	//filter 
	const liste = document.querySelectorAll('.liste')
	const inputTous = document.querySelector('#tous')
	const defaultClass = 'liste'
	inputTous.addEventListener('click', () => {
		liste.forEach(l => {
			l.classList = defaultClass
		})
	})

	const inputGain = document.querySelector('#gain')
	inputGain.addEventListener('click', () => {
		liste.forEach(l => {
			l.classList = defaultClass + ' gain'
		})
	})

	const inputPerte = document.querySelector('#perte')
	inputPerte.addEventListener('click', () => {
		liste.forEach(l => {
			l.classList = defaultClass + ' perte'
		})
	})
});
