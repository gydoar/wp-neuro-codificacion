
<footer>
	<div class="container">
		<div class="ten columns offset-by-one">
			<p>Desarrollado por <img src="<?php bloginfo('template_url' ); ?>/library/img/logo-celebrity.png" alt=""></p>
		</div>	
	</div>
</footer>

<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="<?php bloginfo('template_url' ); ?>/library/js/jquery.fancybox.pack.js"></script>
<script src="<?php bloginfo('template_url' ); ?>/library/js/jquery.fancybox-buttons.js"></script>
<script src="<?php bloginfo('template_url' ); ?>/library/js/jquery.fancybox-media.js"></script>
<script src="<?php bloginfo('template_url' ); ?>/library/js/funciones.js"></script>

<!-- Efecto Scroll -->

<script>
	$(document).on("ready", main);
	function main(){
		$("header a").on("click", irA);
	}
	function irA(){
		var seccion = $(this).attr("href");
		$("body, html").animate({
			scrollTop: $(seccion).offset().top
		},800);
		return false;
	}
</script>

<script>
	$(document).ready(function() {
		$(".various").fancybox({
			maxWidth	: 500,
			maxHeight	: 500,
			fitToView	: false,
			width		: '70%',
			height		: '70%',
			autoSize	: false,
			closeClick	: false,
			openEffect	: 'none',
			closeEffect	: 'none'
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function() {
	    setTimeout(function() {
	        $("#result").fadeOut(1500);
	    },3000);
	});
</script>

<?php wp_footer(); ?>
</body>
</html>
