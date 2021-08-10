$(function () {

    /* ==========================================
         TOOL GALLERY SLIDER
      ============================================ */
    $('.tool-gallery-slider').owlCarousel({
        items: 1,
        thumbs: true,
        thumbImage: false,
        thumbsPrerendered: true,
        thumbContainerClass: 'owl-thumbs',
        thumbItemClass: 'owl-thumb-item'
    });


    /* ==========================================
         TOOLTIP INITIALIZATION
      ============================================ */
    $('[rel="tooltip"]').tooltip();


    /* ==========================================
         LIGHTBOX
      ============================================ */
    lightbox.option({
      'wrapAround': true
  });

    /* ==========================================
       CUSTOM FILE UPLOAD
    ============================================ */
    $(":file").filestyle({
        buttonBefore: true,
        btnClass: "btn-dark",
        placeholder: "No file chosen"
    });

    $('.selectpicker').on('change', function () {
        $(this).closest('.dropdown').find('.filter-option-inner-inner').addClass('selected');
    });

});
