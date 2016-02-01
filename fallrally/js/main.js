$(window).load(function() {
	$(".arrow a").click(
	function(event) {
        event.preventDefault();
        var link = this;
        $.smoothScroll({
          scrollTarget: link.hash,
          speed: 900,
        });
	});
});