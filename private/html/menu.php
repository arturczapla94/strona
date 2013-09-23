<div id="menu">
	<div class="menu-block">
		<div class="menu-block-top">
			MENU
		</div>
		<div class="menu-block-contents">
			<a href="index.php">Strona główna</a><br/>
			<a href="index.php?str=login">Zaloguj</a><br/>
			<a href="index.php?str=galeria">galeria</a><br/>
			<a href="index.php?str=podstrona">podstrona</a><br/>
			<a href="index.php?str=podstrona">podstrona</a><br/>
			<a href="index.php?str=podstrona">podstrona</a><br/>
                        <?php
                            foreach (config::$menu as $value)
                                echo '<a href="index.php?str='.$value[1].'">'.$value[0].'</a><br />';
                        ?>
		</div>
	</div>

</div>