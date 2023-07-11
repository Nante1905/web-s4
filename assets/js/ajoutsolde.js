import env from './env.js'

window.addEventListener('load', () => {
    const formAjout = document.querySelector('.form-ajout')
    formAjout.addEventListener('submit', (event) => {
        event.preventDefault()

        let formData = new FormData(formAjout)

        const xhr = new XMLHttpRequest()
        xhr.open('post', env.APP_URL+"profil/recharger", true)
        console.log(env.APP_URL+"profil/recharger");
        
        xhr.send(formData)

        xhr.addEventListener('load', () => {
            try {
                const res = JSON.parse(xhr.responseText)

                if(res.OK) {
                    Snackbar.show({
                        text: res.message,
                        duration: 1000,
                        onClose: () => location.replace(env.APP_URL+"profil")
                    })
                }
                else {
                    Snackbar.show({
                        text: res.message,
                        duration: 2000,
                    })
                }

            } catch(e) {
                console.log(xhr.responseText);
                Snackbar.show({
                    text: e.message,
                    duration: 2000,
                })
            }
        })
    })
})