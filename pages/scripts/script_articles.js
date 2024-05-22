function showMore() {
    var moreText = document.querySelector('.read-more');
    var button = document.querySelector('.show-more-button');
    if (moreText.style.display === "none") {
        moreText.style.display = "block";
        button.innerHTML = "Lire moins";
    } else {
        moreText.style.display = "none";
        button.innerHTML = "Lire la suite";
    }
}