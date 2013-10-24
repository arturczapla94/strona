<div id="menu">
	<div class="menu-block">
		<div class="menu-block-top">
			MENU
		</div>
		<div class="menu-block-contents">
			<a href="index.php">Strona główna</a><br/>
			<a href="index.php?str=login">Zaloguj</a><br/>
			<a href="index.php?str=galeria">galeria</a><br/>
                        <?php
                            foreach (config::$menu as $value)
                            {
                                switch ($value[2])
                                {
                                    case 1 :
                                        echo '<a href="index.php?str='.$value[1].'">'.$value[0].'</a><br />';
                                        break;
                                    case 2 :
                                        echo '<p '.(isset($value[3]) ? $value[3] : '').'>'.$value[0].'</p>';
                                };
                                
                            }
                        ?>
		</div>
	</div>

</div>