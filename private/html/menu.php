<div id="menu">
	<div class="menu-block">
		<div class="menu-block-top">
			MENU
		</div>
		<div class="menu-block-contents">
                    <?php
			echo '<a href="index.php'.gen_link_var("str","").'">Strona główna</a><br/>';
			if(empty($_SESSION['user']))
                            echo '<a href="index.php'.gen_link_var("str","login").'">Zaloguj</a><br/>';
			echo '<a href="index.php'.gen_link_var("str","galeria").'">galeria</a><br/>';
                        
                            foreach (Config\Config::$menu as $value)
                            {
                                switch ($value[2])
                                {
                                    case 1 :
                                        echo '<a href="index.php'.gen_link_var("str",$value[1]).'">'.$value[0].'</a><br />';
                                        break;
                                    case 2 :
                                        echo '<p '.(isset($value[3]) ? $value[3] : '').'>'.$value[0].'</p>';
                                };
                                
                            }
                        ?>
		</div>
	</div>

</div>