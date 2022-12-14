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