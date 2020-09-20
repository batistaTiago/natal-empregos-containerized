$(window).on("scroll", function (event) {
    if (window.scrollY > 62) {
        $("nav.navbar").addClass("navegar");
    } else {
        $("nav.navbar").removeClass("navegar");
    }
});
