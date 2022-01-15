<script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/owl.carousel2/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('frontend/vendor/lightbox2/js/lightbox.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap-filestyle.min.js') }}"></script>
<script src="{{ asset('frontend/js/front.js') }}"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.3.4/sweetalert2.min.js" integrity="sha512-GDiDlK2vvO6nYcNorLUit0DSRvcfd7Vc0VRg7e3PuZcsTwQrJQKp5hf8bCaad+BNoBq7YMH6QwWLPQO3Xln0og==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  // ------------------------------------------------------- //
  //   Inject SVG Sprite -
  //   see more here
  //   https://css-tricks.com/ajaxing-svg-sprite/
  // ------------------------------------------------------ //
  function injectSvgSprite(path) {

      var ajax = new XMLHttpRequest();
      ajax.open("GET", path, true);
      ajax.send();
      ajax.onload = function(e) {
      var div = document.createElement("div");
      div.className = 'd-none';
      div.innerHTML = ajax.responseText;
      document.body.insertBefore(div, document.body.childNodes[0]);
      }
  }
  // this is set to BootstrapTemple website as you cannot
  // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
  // while using file:// protocol
  // pls don't forget to change to your domain :)
  injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');

</script>
<!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</body>

</html>
