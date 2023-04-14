// Slick JS for trending products
$(".slickJS .products").slick({
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  // variableWidth: true,
  responsive: [
    {
      breakpoint: 782,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true,
      },
    },
  ],
});

// Slick JS for testimonials
$(".testimonial-slick-slider").slick({
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 2,
  variableWidth: true,
  centerMode: true,
  centerPadding: "60px",
  responsive: [
    {
      breakpoint: 782,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
      },
    },
  ],
});

// $(".product_type_simple").appendTo(".quantity");

// Slick JS for related products
$(".slickSliderJS .columns-5").slick({
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  // variableWidth: true,
  responsive: [
    {
      breakpoint: 782,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true,
      },
    },
  ],
});

// Cart Open Script
// const btnViewCart = document.querySelector(".cart-box");
// const pageEl = document.querySelector(".main-page");

// btnViewCart.addEventListener("click", function () {
//   pageEl.classList.toggle("cart-open");
// });
