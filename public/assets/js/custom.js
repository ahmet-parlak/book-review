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



/* Lists Start */
const listSelectBox = $("select.select-list"),
    listNameInput = $("input.list-name"),
    addToListBtn = $("a.add-to-list");


$(listSelectBox).change(function (e) {
    e.preventDefault();
    const selected = $(listSelectBox).val();


    switch (selected) {
        case "create-list":
            listNameInput.parent().removeClass("d-none");
            $(listNameInput).focus();
            if (listNameInput.val().length > 2) {
                addToListBtn.removeClass("d-none");
            } else {
                addToListBtn.addClass("d-none");
            }
            break;
        case "null":
            addToListBtn.addClass("d-none");
            listNameInput.parent().addClass("d-none");
            break;
        default:
            addToListBtn.removeClass("d-none");
            listNameInput.parent().addClass("d-none");
            break;
    }
});

listNameInput.keyup(function () {
    if (listNameInput.val().length > 2) {
        addToListBtn.removeClass("d-none");
    } else {
        addToListBtn.addClass("d-none");
    }
});

addToListBtn.click(function () {
    const selected = $(listSelectBox).val();
    const reg = /^\d+$/; //regex for selected value is list
    const book = $(listSelectBox).attr("book");
    let list = null, list_name = null;
    switch (true) {
        case (selected == "create-list"):
            list_name = listNameInput.val();
            break;
        case (reg.test(selected)):
            list = selected;
            break;
        default:
            alert("err")
            break;
    }

    $.post(add_to_list_ajax_url, { _token: token, book: book, list: list, list_name: list_name },
        function (response) {
            if (response.state == "success") {
                Swal.fire({
                    icon: 'success',
                    title: 'Başarılı',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500
                })
                if (response.newlist == "true") {
                    const option = document.createElement("option");
                    option.value = response.list;
                    option.innerHTML = list_name;
                    $("option[value=create-list]").before(option);
                }
                $(listSelectBox).val("null").change();
                listNameInput.val("");
            }
        },
        "json"
    );
});

/* Lists End */


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




/* #My-List Start# */
const listEditForm = $("form[id=list-edit-form]");
$(listEditForm).submit(function (e) {
    e.preventDefault();

});

/* EditListState Start */
const listStateSelect = $("#listState"),
    list = $("#list-edit-form").attr("list"),
    applyListStateBtn = $(".apply-list-state");

$(listStateSelect).change(function (e) {
    e.preventDefault();
    applyListStateBtn.removeClass("d-none");
});

$(applyListStateBtn).click(function (e) {
    e.preventDefault();
    $.post(edit_list_state_ajax_url, { _token: token, list: list, state: $(listStateSelect).val() },
        function (response) {
            if (response.state == "success") {
                Swal.fire({
                    icon: 'success',
                    title: 'Başarılı',
                    text: "Liste görünürlüğü değiştirildi",
                    showConfirmButton: false,
                    timer: 1500
                }).then(function () {
                    applyListStateBtn.addClass("d-none")
                })
            }
        }
    );
});
/* EditList State End */

/* RemoveBookFromList Start */
const booksRemoveBtns = $("a.remove-book-from-list");
booksRemoveBtns.click(function (e) {
    e.preventDefault();
    const btn = $(this);
    $.post(remove_book_from_list_ajax_url, { _token: token, list: list, book: $(btn).attr('remove') },
        function (response) {
            if (response.state == "success") {
                Swal.fire({
                    icon: 'success',
                    title: 'Başarılı',
                    text: "Kitap listeden kaldırıldı",
                    showConfirmButton: false,
                    timer: 1500
                })
                $(btn).closest('tr').remove();
            } else if (response.state == "error") {
                Swal.fire({
                    icon: 'error',
                    title: 'Hata',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        }
    );
});
/* RemoveBookFromList End */


/* EditListName Start */
const editListNameBtn = $("i.edit-list-name"),
    editListNameInput = $("input.edit-list-name"),
    editListNameApply = $("a.edit-list-name-apply");

editListNameBtn.click(function () {
    $(editListNameInput).show();
    $(editListNameInput).focus();
});

$(editListNameInput).keyup(function (e) {
    if ($(editListNameInput).val().length >= 3) {
        $(editListNameApply).removeClass('d-none');
    }
});

$(editListNameApply).click(function () {
    if ($(editListNameInput).val().length >= 3) {
        $.post(edit_list_name_ajax_url, { _token: token, list: list, listName: $(editListNameInput).val() },
            function (response) {
                if (response.state == "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Başarılı',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        location.reload();
                    })

                } else if (response.state == "error") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Hata',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        );
    }
});
/* EditListName End */


/* DeleteList Start */
const removeListBtns = $("a.remove-list");

removeListBtns.click(function (e) {
    const btn = $(this);
    const list = btn.attr('remove');
    areYouSure("Dikkat!", "Liste ve listede bulunan kitaplar kaldırılacak. Bu işlem geri alınamaz.", "Kaldır").then((result) => {
        if (result.isConfirmed) {
            $.post(delete_list_ajax_url, { _token: token, list: list },
                function (response) {
                    if (response.state == "success") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Başarılı',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        if ($(location).attr("href").split('/')[4]) {
                            location.href = mylists_url;
                        } else {
                            $(btn).closest('tr').remove();
                        }

                    } else if (response.state == "error") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Hata',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                }
            );
        }
    });
});
/* DeleteList End */

/* #My-List End# */


/* Are You Sure Alert */
function areYouSure(title = "Dikkat", text, confirmBtn = "Onayla") {
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