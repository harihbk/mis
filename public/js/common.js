$(document).ready(function () {
  $("#button-menu-mobile").on("click", function () {
    $("body").toggleClass("enlarge-menu");
  });
  // Get Current window width
  getCurrentWidth();
});

$(window).resize(() => {
  // Get Current window width
  getCurrentWidth();
});

// Get window current widths
function getCurrentWidth() {
  let WindSize = $(window).width();

  if (WindSize) {
    WindSize < 1300
      ? $("body").addClass("enlarge-menu enlarge-menu-all")
      : $("body").removeClass("enlarge-menu enlarge-menu-all");
  }
}
