<?php
						session_start();
						if (!empty($_SESSION['user'])){
						echo '<li>',$_SESSION['user']['email'],'</li>';
						} else {
						echo '
						<li class="login">
                            <a data-toggle="modal" href="#loginForm"><i class="icon-lock"></i></a>
                        </li>
						';}
						?>