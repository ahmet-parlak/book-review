/* #General Start# */
jQuery.fn.preventDoubleSubmission = function () {
    $(this).on('submit', function (e) {
        var $form = $(this);
        if ($form.data('submitted') === true) {
            // Previously submitted - don't submit again
            e.preventDefault();
        } else {
            // Mark it so that the next submit can be ignored
            $form.data('submitted', true);
        }
    });
    // Keep chainability
    return this;
};
$('form').preventDoubleSubmission();
/* #General End# */



/* #Book-Detail Start# */
const ratingArea = $("div.rating-area"),
    rateStars = $("span.rate"),
    clearRating = $("span.clear-rating"),
    ratingInput = $("input.rating"),
    reviewForm = $("#review-form");



/* Review Form Start */
reviewForm.on("submit", function (e) {
    /* Rating validation */
    if (!["1", "2", "3", "4", "5"].includes(ratingInput.val())) {
        e.preventDefault();
        if (!$("span.rating-alert").length) {
            const alertSpan = document.createElement("span");
            alertSpan.classList.add("rating-alert");
            alertSpan.classList.add("text-danger");
            alertSpan.classList.add("ml-2");
            alertSpan.style.display = "none";
            alertSpan.innerText = "Değerlendirmek için kitaba puan vermelisiniz!";
            ratingArea.append(alertSpan);
            $(alertSpan).fadeIn(1000);
            $(this).data('submitted', false);
        } else {
            $("span.rating-alert").hide();
            $("span.rating-alert").fadeIn(1000);
        }
    }
})


/* Review Form End */




/* Rating Start */
rateStars.on('click', function () {
    clearStar();
    rateStars.unbind('mouseenter mouseleave');
    const rate = $(this).attr('rating');
    for (let index = 0; index < rate; index++) {
        $(rateStars[index]).removeClass('far fa-star');
        $(rateStars[index]).addClass('fas fa-star');
    }
    $("span.rating-alert").fadeOut(500);
    clearRating.removeClass("d-none");
    ratingInput.val(rate);
});


rateStars.hover(fillStar, clearStar);

clearRating.click(function (e) {
    e.preventDefault();
    clearStar();
    rateStars.hover(fillStar, clearStar);
    $(this).addClass("d-none");
    ratingInput.val("");
});


function fillStar() {
    const rate = $(this).attr('rating');
    for (let index = 0; index < rate; index++) {
        $(rateStars[index]).removeClass('far fa-star');
        $(rateStars[index]).addClass('fas fa-star');
    }
}

function clearStar() {
    rateStars.removeClass('fas fa-star');
    rateStars.addClass('far fa-star');
}
/* Rating End */

/* #Book-Detail End# */





/* Remove Review */
const removeReviewBtns = $(".remove-review");

removeReviewBtns.on("click", function () {
    const review = $(this).attr('remove');

    const title = "Emin misiniz?";
    const text = "Bu kitaba verdiğiniz puan ve yaptığınız değerlendirme kaldırılacak. Bu işlem geri alınamaz!";
    const confirmBtn = "Kaldır";

    areYouSure(title, text, confirmBtn).then((result) => {
        if (result.isConfirmed) {
            $.post(remove_review_ajax_url, { _token: token, review: review },
                function (response) {
                    if (response.state == "success") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Başarılı',
                            text: "Değerlendirmeniz kaldırıldı",
                            showConfirmButton: false,
                            timer: 1500
                        }).then(() => {
                            if (response.redirect) {
                                window.location = response.redirect;

                            } else {
                                location.reload()
                            }
                        })
                    }
                },
                "json"
            );

        }
    })


});




/* #My-Books End# */




/* Are You Sure Alert */
function areYouSure(title, text, confirmBtn) {
    return Swal.fire({
        title: title,
        text: text,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: confirmBtn,
        cancelButtonText: 'İptal'
    })
}