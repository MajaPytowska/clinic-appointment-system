<?php
/* Smarty version 5.4.5, created on 2026-05-30 12:36:06
  from 'file:LoginView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_6a1abd9610ae24_95125082',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d6fce9f6ef9a3a90a11c29a65081ef3aa22c2c3' => 
    array (
      0 => 'LoginView.tpl',
      1 => 1767473584,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a1abd9610ae24_95125082 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\clinic-appointment-system\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_3577193496a1abd96032800_26587077', "form_content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "form_base.tpl", $_smarty_current_dir);
}
/* {block "form_content"} */
class Block_3577193496a1abd96032800_26587077 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\clinic-appointment-system\\app\\views';
?>

<form method="post" action="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'login'), $_smarty_tpl);?>
">
	<div class="row gtr-uniform">
	    <div class="col-12">
			<input type="text" name="login" id="login" value="<?php echo $_smarty_tpl->getValue('form')->login ?? null;?>
" placeholder="Login" />
		</div>
		<div class="col-12">
			<input type="password" name="password" id="password" value="" placeholder="Hasło" />
		</div>							
		<div class="col-12" style="justify-content: center;">
			<input type="submit" value="Zaloguj się" class="primary"/>
		</div>
        <div class="col-12" style="margin-top:1em;">
            Nie masz konta? <a href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'showRegistrationForm'), $_smarty_tpl);?>
">Zarejestruj się</a>
        </div>
	</div>
</form>

<?php
}
}
/* {/block "form_content"} */
}
