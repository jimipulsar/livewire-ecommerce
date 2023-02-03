const pre = document.createElement("div");
pre.innerHTML =
    '<div class="preloader"><div class="spinner-border text__primary" role="status"><span class="visually-hidden">Loading...</span></div></div>';
document.body.insertBefore(pre, document.body.firstChild);

document.addEventListener("DOMContentLoaded", function () {
    document.body.className += " loaded";
});
