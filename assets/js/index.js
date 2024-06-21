$(".moto-widget-menu-toggle-btn").on("click", function () {
    $(".moto-widget-menu-mobile-open .toggle-container").show()
}), $(document).on("click", function (t) {
    $(t.target).hasClass("moto-widget-menu-toggle-btn") || 0 !== $(t.target).parents(".moto-widget-menu-mobile-open .toggle-container").length || $(".moto-widget-menu-mobile-open .toggle-container").hide()
}), $(document).on("click", 'a[href^="#"]', function (t) {
    t.preventDefault(), $("html, body").animate({
        scrollTop: $($.attr(this, "href")).offset().top
    }, 800)
});


function getLatestBlogs() {

    $.ajax({
        url: 'assets/home/fetch-latest.php',
        type: 'post',
        data: {getdata: 'lastblog'},
        dataType: 'JSON',
        beforeSend: function () {
            $(".latestBlogs").html('loading...');
        },
        success: function(response){
            $(".latestBlogs").html(response.html);
        }
    });
};

function getLatestMedia() {

    $.ajax({
        url: 'assets/home/fetch-latest.php',
        type: 'post',
        data: {getdata: 'lastmedia'},
        dataType: 'JSON',
        beforeSend: function () {
            $(".latestMedia").html('loading...');
        },
        success: function(response){
            $(".latestMedia").html(response.html);
        }
    });
};