(function ($) {
    "use strict";

    document.addEventListener("livewire:load", () => {
        const sidebar = $("#sidebarToggle");
        const overlay = $(".body-overlay");
        const cart = $(".card-sidebar");
        const cartClose = $("#cartClose");
        const filterToggle = $("#filterToggle");
        const filter = $(".product-filter");

        sidebar.click(() => {
            $(".link-container").toggleClass("show");
            overlay.toggleClass("overlay-show");
        });
        overlay.click(() => {
            $(".link-container").removeClass("show");
            cart.removeClass("show");
            overlay.removeClass("overlay-show");
        });
        cartClose.click(() => {
            cart.removeClass("show");
            overlay.removeClass("overlay-show");
        });

        const win = $(window);
        win.on("scroll", function () {
            const scrollTop = win.scrollTop();
            scrollTop > 150 && $("header").addClass("header-sticky");
            scrollTop < 150 && $("header").removeClass("header-sticky");
            scrollTop > 200 && $(".scroll-top").addClass("show");
            scrollTop < 200 && $(".scroll-top").removeClass("show");
        });

        $("#searchToggle").click(() => {
            $(".search-form").addClass("show");
            $(".search-form input").focus();
        });

        filterToggle.click(() => {
            filter.toggleClass("show");
        });

        $(".filter-close").click(() => {
            filter.removeClass("show");
        });

        $("#searchClose").click(() => {
            $(".search-form").removeClass("show");
        });

        $(".scroll-top").click(() => {
            win.scrollTop(0, 100);
        });

        $(".pwd-toggle").each(function () {
            $(this).click(() => {
                const that = $(this);
                const icon = $(this).children("i");
                const pwd = that.prev("input");

                const pwdAttr = pwd.attr("type");
                let nextAttr = "password";
                let iconText = "fa-eye-slash";

                if (pwdAttr == "password") {
                    nextAttr = "text";
                }

                pwd.attr("type", nextAttr);
                icon.toggleClass(iconText);
                pwd.focus();
            });
        });

        function imageObserver() {
            const images = document.querySelectorAll("img[observe='true']");

            const observer = new IntersectionObserver(
                (entries, observer) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            let img = entry.target;
                            if (img.hasAttribute("observe-src")) {
                                img.setAttribute(
                                    "src",
                                    img.getAttribute("observe-src")
                                );
                                observer.unobserve(entry.target);
                            }
                            let progress = img.parentElement.children[1];
                            if (progress) progress.style = "display:none";
                        }
                    });
                },
                {
                    rootMargin: "10% 0px 10% 0px",
                    threshold: 0,
                }
            );

            images.forEach((img) => {
                observer.observe(img);
            });
        }

        Livewire.on("observeImage", () => {
            imageObserver();
        });

        imageObserver();
    });
})(jQuery);
