import URL from "./env.js";
window.addEventListener('load', () => {
    const btn = document.querySelector('#submit')
    btn.addEventListener('click', () => {
        let xhr = new XMLHttpRequest();
	    xhr.open("post", `${URL.APP_URL}profil/toGold`, true);
	    xhr.send();

        xhr.addEventListener('load', () => {
            console.log(xhr.responseText);

            try {
                let res = JSON.parse(xhr.responseText)
                if(res.OK == true) {
                    Snackbar.show({
                        text: 'Vous êtes passé en mode Gold',
                        duration: 2000,
                        onClose: () => location.replace(URL.APP_URL+"mesobjectifs")
                    })
                }
                else {
                    Snackbar.show({
                        text: res.msg,
                        duration: 2000
                    })
                }
            } catch (error) {
                Snackbar.show({
                    text: 'Erreur interne au serveur',
                    duration: 1000
                })
            }
        })
    })
})