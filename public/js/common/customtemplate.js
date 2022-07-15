$(".sidebar-hover").hover(
    function () {
      $('.main-content').addClass("result_hover");
    },
    function () {
      $('.main-content').removeClass("result_hover");
    }
);