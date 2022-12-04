/*****  Double Submit Prevent *****/
//set form and submitButton vars on view page
if (form) {
    form.addEventListener('submit', function () {
        submitButton.addEventListener('click', function () {
            submitButton.setAttribute("disabled");
            setTimeout(() => {
                submitButton.removeAttribute("disabled");
            }, 1500);
        });
    })
}



/*****  Image Preview *****/
const file = document.getElementById('file-upload'),
    photoPrev = document.querySelector('.photo-preview');
if (file) {
    file.addEventListener('change', function () {
        [...this.files].map(file => {
            if (file.name.match(/\.jpe?g|png|gif/)) {
                document.querySelector("#photo-name").innerHTML = file.name;
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.addEventListener('load', function () {
                    const image = new Image(150, 150);
                    image.src = this.result;
                    photoPrev.removeChild(photoPrev.children[0]);
                    photoPrev.appendChild(image);

                })
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Hata',
                    text: 'Lütfen bir resim dosyası seçin',
                    showConfirmButton: false,
                    timer: 1600
                })
            }
        })
    })
}



/***** Remove Item Warning *****/

const removeBtn = document.getElementById("remove-btn"),
    removeForm = document.getElementById("remove-form");

if (removeForm) {
    removeForm.addEventListener('submit', function (e) {
        e.preventDefault();
        if (typeof alertTitle === 'undefined') {
            alertTitle = "Emin misiniz?"
        }
        if (typeof alertMessage === 'undefined') {
            alertTitle = ""
        }


        Swal.fire({
            title: alertTitle,
            text: alertMessage,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Kaldır',
            cancelButtonText: `İptal`,
            focusCancel: true
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                removeForm.submit();
            } else if (result.isDenied) {
                //Swal.fire('Changes are not saved', '', 'info')
            }
        })
    })
}



/***** Fetch Authors for Create Book *****/
const authorInput = document.querySelector("input[id='author']"),
    authorInputHidden = document.querySelector("input[id='authorHidden']"),
    dataList = document.querySelector("datalist[id='authors']");

if (dataList && authorInput) {
    authorInput.addEventListener("input", fetchAuthors);
    authorInput.addEventListener("change", setValue);


    function fetchAuthors(e) {
        if (authorInput.value.length >= 3) {

            const data = { author: authorInput.value };

            request(JSON.stringify(data), fetchAuthorsAction, function () {

                dataList.innerHTML = "";

                JSON.parse(this.responseText).forEach(element => {

                    const option = document.createElement("option");
                    option.value = element.author;
                    option.setAttribute("authorValue", element.value);
                    dataList.appendChild(option);
                });
            })
        }
    }

    function setValue() {
        //const selectedOption = document.querySelector("option[value='" + authorInput.value + "']");
        const selectedOption = document.querySelector(`option[value='${authorInput.value}']`);
        authorInputHidden.value = selectedOption.getAttribute("authorvalue");
    }

}


/* AJAX */
function request(data, aciton, onloadFunction) {
    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = onloadFunction;
    xmlhttp.open("POST", aciton);
    xmlhttp.setRequestHeader("X-CSRF-TOKEN", token);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(data);
}