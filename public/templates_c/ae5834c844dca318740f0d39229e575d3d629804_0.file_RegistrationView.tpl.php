<?php
/* Smarty version 5.4.5, created on 2026-05-30 12:52:32
  from 'file:RegistrationView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_6a1ac1709f3263_88729368',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ae5834c844dca318740f0d39229e575d3d629804' => 
    array (
      0 => 'RegistrationView.tpl',
      1 => 1767941281,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a1ac1709f3263_88729368 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\clinic-appointment-system\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_18127249946a1ac1709d6080_54754922', "form_content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "form_base.tpl", $_smarty_current_dir);
}
/* {block "form_content"} */
class Block_18127249946a1ac1709d6080_54754922 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\clinic-appointment-system\\app\\views';
?>

<form method="post" action="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'register','param1'=>$_smarty_tpl->getValue('userId')), $_smarty_tpl);?>
">
	<div class="row gtr-uniform">
		<div class="col-6 col-12-xsmall">
			<input type="text" name="name" id="name" value="<?php echo $_smarty_tpl->getValue('form')->user_data->name;?>
" placeholder="Imię" />
		</div>
		<div class="col-6 col-12-xsmall">
			<input type="text" name="surname" id="surname" value="<?php echo $_smarty_tpl->getValue('form')->user_data->surname;?>
" placeholder="Nazwisko" />
		</div>
		<?php if (\core\RoleUtils::inRole('admin')) {?>
			<div class="col-12">
				<input type="text" name="login" id="login" value="<?php echo $_smarty_tpl->getValue('form')->user_data->login;?>
" placeholder="Login" />
			</div>
		<?php } else { ?>
			<div class="col-12">
				<input type="text" name="pesel" id="pesel" value="<?php echo $_smarty_tpl->getValue('form')->user_data->pesel;?>
" placeholder="PESEL" />
			</div>
		<?php }?>
        		<?php if (!$_smarty_tpl->getValue('userId')) {?>
		<div class="col-12">
			<input type="password" name="password" id="password" placeholder="Hasło" value="<?php echo $_smarty_tpl->getValue('form')->password;?>
" />
		</div>
		<div class="col-12">
			<input type="password" name="confirm_password" id="confirm_password" placeholder="Potwierdź hasło" value="<?php echo $_smarty_tpl->getValue('form')->password_confirm;?>
" />
		</div>
		<?php }?>
		<div class="col-12">
			<input type="submit" value="Zarejestruj się" class="primary" />
		</div>
	</div>
</form>

<?php
}
}
/* {/block "form_content"} */
}
