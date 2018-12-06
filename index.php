<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/templates/header.php');
?>
   	<table width="100%" border="0" cellspacing="0" cellpadding="0">
        	<tr>
            	<td class="left-collum-index">
				
					<h1>Возможности проекта —</h1>
					<p>Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками с друзьями и просматривать списки друзей.</p>
					
				
				</td>
				<td class="right-collum-index">
					
					<div class="project-folders-menu">
						<ul class="project-folders-v">
						<li class="project-folders-v-active"><span>Авторизация</span></li>
						<li ><a href="#">Регистрация</a></li>
						<li><a href="#">Забыли пароль?</a></li>
						</ul>
					<div style="clear: both;"></div>
					</div>
					
				<div class="index-auth"  >
						<form  method="POST" action="<?= $_SERVER['ORIG_PATH_INFO'] ?>" 
									name="auth" style="visibility:
									<?= $_GET['login'] == 'yes' ? 'visible' : 'hidden'?>"/><!-- выводит атрибут для селектора visibility -->
							<table  width="100%" border="0" cellspacing="0" cellpadding="0" >
								
								<tr>
									<td class="iat">Ваш e-mail: <br /> <input id="login_id" 
										value="<?= $inputLogin ?>" size="30" name="login" /></td>
								</tr>
								<tr>
									<td class="iat">Ваш пароль: <br /> <input type="password" id="password_id" value="<?= $inputPassword ?>" size="30" name="password"/>
									</td> 
								</tr>
								<tr>
									<td><input type="submit" value="Войти" name="sendAuthData"/></td>
								</tr>
							</table>
						</form>			
						<?  //выводит сообщения после отправки формы авторизации
						    if (isset($authCheck)) {
						        $authCheck ? require_once($_SERVER['DOCUMENT_ROOT'] . 
						        '/include/success.php') : 
						        require_once($_SERVER['DOCUMENT_ROOT'] . '/include/failure.php');
						    }
						?>
					</div>
				</td>
            </tr>
        </table>
<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/templates/footer.php');
?>