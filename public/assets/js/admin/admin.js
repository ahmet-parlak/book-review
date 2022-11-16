
/* Double Submit Prevent */

//set form and submitButton on  view page

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


/* Image Preview */
const file = document.getElementById('file-upload'),
    photoPrev = document.querySelector('.photo-preview');
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
/* #################### */


/* Remove Warning */

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
/* #################### */