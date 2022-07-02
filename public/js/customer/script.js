// Wishlist
function myFunction(x) {
    x.classList.toggle("bxs-heart");
}

function myWishlist(y) {
    y.classList.toggle("bxs-heart_");
}

// Input Control
document.querySelectorAll(".dec-btn").forEach((el) => {
    el.addEventListener("click", () => {
        var siblings = el.parentElement.querySelector("input");
        if (parseInt(siblings.value, 10) >= 1) {
            siblings.value = parseInt(siblings.value, 10) - 1;
        }
    });
});
document.querySelectorAll(".inc-btn").forEach((el) => {
    el.addEventListener("click", () => {
        var siblings = el.parentElement.querySelector("input");
        siblings.value = parseInt(siblings.value, 10) + 1;
    });
});

// Image
function changeImage(element) {
    var main_prodcut_image = document.getElementById("main_product_image");
    main_prodcut_image.src = element.src;
}

// Date
