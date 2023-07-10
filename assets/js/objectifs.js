import URL from './env.js'
// import APP_URL from './env.js'

window.addEventListener('load',() => {
    //details
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

    let fromObjectif = document.querySelector('#form-objectif')
    console.log(URL)
    fromObjectif.addEventListener('submit', (event) => {
        event.preventDefault()
        const fromData = new FormData(fromObjectif)

        const xhr = new XMLHttpRequest()
        xhr.open("post", URL, true)
        xhr.send(fromData)

        xhr.addEventListener('load', (event) => {
            try {
                let res = JSON.parse(xhr.responseText)
                Snackbar.show({
                    text: "Objectif mis a jour",
                    duration: 5000,
                    onClose: () => location.reload()
                })
                fromObjectif.reset()
            } catch(e) {
                console.log(xhr.responseText)
                Snackbar.show({
                    text: "Une erreur s'est produite",
                    duration: 5000
                })
                console.error(e)
            }
        })
    })

    //soumettre à un régime
    const btns = document.querySelectorAll('.btn-accept')
    let idRegime
    btns.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault()
            idRegime = button.getAttribute('data-id')

            const xhr = new XMLHttpRequest()
            console.log(URL.APP_URL);
            xhr.open("post", `${URL.APP_URL}regime/accept/${ idRegime }`, true)
            xhr.send()

            xhr.addEventListener('load', () => {
                console.log(xhr.responseText);
            })
        })
    })
})