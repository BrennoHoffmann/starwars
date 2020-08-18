<div id="nav_page" class="nav">
	<?php
	$c = "active";
	$total_page = 10;
	$url = home_url($wp->request);
	if (isset($_GET["pagina"])) {
		$page  = $_GET["pagina"];
	} else {
		$page = 1;
	};
	for ($i = 1; $i < $total_page; $i++) {
		if ($page == $i) {
			$c = "active";
		} else {
			$c = "";
		}
		echo "<li class=\"$c\"><a class=btn_nav href=\"$url?pagina=$i\">$i</a></li>";
	}
	?>
</div>