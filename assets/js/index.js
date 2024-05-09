// Toggle Menu
$(".moto-widget-menu-toggle-btn").on('click', function () {
    $(".moto-widget-menu-mobile-open .toggle-container").show();
});

$(document).on('click', function (e) {
    if (!$(e.target).hasClass("moto-widget-menu-toggle-btn")
        && $(e.target).parents(".moto-widget-menu-mobile-open .toggle-container").length === 0) {
        $(".moto-widget-menu-mobile-open .toggle-container").hide();
    }
});

// Scroll
$(document).on('click', 'a[href^="#"]', function (event) {
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 800);
});
