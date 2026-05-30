<?php
/* Smarty version 5.4.5, created on 2026-05-30 12:45:40
  from 'file:ChangePasswordView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_6a1abfd4b7be45_34217540',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3397f92e8a88a41b279734cca1aeaa59920cb566' => 
    array (
      0 => 'ChangePasswordView.tpl',
      1 => 1767921441,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a1abfd4b7be45_34217540 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\clinic-appointment-system\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_5604334666a1abfd4b6aa90_67854788', "form_content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "form_base.tpl", $_smarty_current_dir);
}
/* {block "form_content"} */
class Block_5604334666a1abfd4b6aa90_67854788 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\clinic-appointment-system\\app\\views';
?>

<form method="post" action="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'changePassword'), $_smarty_tpl);?>
">
    <div class="row gtr-uniform">
        <div class="col-12">
            <input type="password" name="new_password" id="new_password" placeholder="Nowe hasło" value="<?php echo $_smarty_tpl->getValue('form')->new_password;?>
" />
        </div>
        <div class="col-12">
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Potwierdź nowe hasło" value="<?php echo $_smarty_tpl->getValue('form')->confirm_password;?>
" />
        </div>
        <div class="col-12">
            <input type="submit" value="Zmień hasło" class="primary" />
        </div>
    </div>
</form>
<?php
}
}
/* {/block "form_content"} */
}
