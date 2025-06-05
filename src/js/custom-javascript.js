// This script uses ScrollMagic to add a fade-in effect to elements with the class 'fade-in'
document.addEventListener("DOMContentLoaded", function () {
  var controller = new ScrollMagic.Controller();

  document.querySelectorAll('.fade-in').forEach(function (element) {
    new ScrollMagic.Scene({
      triggerElement: element,
      triggerHook: 0.9, // 0 = top, 1 = bottom
      reverse: false
    })
      .setClassToggle(element, 'visible')
      //.addIndicators() // Uncomment for debugging
      .addTo(controller);
  });

    new ScrollMagic.Scene({
    triggerElement: ".trigger1",
    triggerHook: 0.9,
    duration: "80%",
    offset: 50
  })
    .setClassToggle(".reveal1", "visible")
    // .addIndicators() // for debugging — remove in production
    .addTo(controller);
});
