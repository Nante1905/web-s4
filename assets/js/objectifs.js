import URL from './env.js'
window.addEventListener('load',() => {
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
                    duration: 5000
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
})