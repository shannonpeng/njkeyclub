var navBarOpen = false;

$(window).load(function() {
	$("nav li.logo").click(function(){
		if (navBarOpen) {
			$("nav li").css("display", "none");
			$("nav li.logo").css("display", "block");
		}
		else {
			$("nav li").css("display", "block");
		}
		navBarOpen = !navBarOpen;
	});
});

$(window).resize(function(){
	$("nav li").removeAttr('style');
});

