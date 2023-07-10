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
                    html += `<li> ${ res.nomplat } </li>`
                }

                div.innerHTML = html;
			};
		});
	}
});
