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
			xhr.open("get", `${URL.APP_URL}welcome/details/${ id }`, true);
            xhr.send();

			xhr.onload = () => {
				let response = xhr.responseText;
                console.log(response);
                const div = document.querySelector(`#details_${ id }`)
                let html = '';
                for (const res of JSON.parse(response)) {
                    html += `<li> ${ res.nom } : ${ res.pourcentage }% </li>`
                }

                div.innerHTML = html;
			};
		});
	}

    let fromObjectif = document.querySelector('#form-objectif')
    console.log(URL)

    const select = document.querySelector('.select')
    select.addEventListener('change', (event) => {
        if(event.target.value == 3) {
            document.querySelector('#input-poids').setAttribute('disabled', true)
        } else {
            document.querySelector('#input-poids').removeAttribute('disabled')
        }
    })

    fromObjectif.addEventListener('submit', (event) => {
        event.preventDefault()
        const fromData = new FormData(fromObjectif)

        const xhr = new XMLHttpRequest()
        xhr.open("post", `${URL.APP_URL}mesobjectifs/submit`, true)
        xhr.send(fromData)

        xhr.addEventListener('load', (event) => {
            try {
                console.log(xhr.responseText);
                let res = JSON.parse(xhr.responseText)
                if(res.OK) {
                    Snackbar.show({
                        text: "Objectif mis a jour",
                        duration: 2000,
                        onClose: () => location.reload()
                    })
                    fromObjectif.reset()
                }
                else {
                    Snackbar.show({
                        text: res.message,
                        duration: 2000
                    })
                }
            } catch(e) {
                // console.log(xhr.responseText)
                Snackbar.show({
                    text: "Une erreur s'est produite",
                    duration: 2000
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
                try {
                    let res = JSON.parse(xhr.responseText)
                    if(res.status == 1) {
                        Snackbar.show({
                            text: "Régime entamé",
                            duration: 2000
                        })
                    }
                    else {
                        Snackbar.show({
                            text: res.msg,
                            duration: 2000
                        })
    
                        document.querySelector(`.message`).innerHTML = res.msg
                    }
                } catch (error) {
                    Snackbar.show({
                        text: "Erreur interne au serveur",
                        duration: 2000
                    })
                    console.log(error);
                    document.querySelector(`.message`).innerHTML = 'Erreur interne au serveur'
                }
            })
        })
    })
})