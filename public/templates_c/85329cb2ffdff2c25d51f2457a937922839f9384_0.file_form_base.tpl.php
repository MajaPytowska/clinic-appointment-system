<?php
/* Smarty version 5.4.5, created on 2026-05-30 12:36:06
  from 'file:form_base.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_6a1abd96285bd9_30981219',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '85329cb2ffdff2c25d51f2457a937922839f9384' => 
    array (
      0 => 'form_base.tpl',
      1 => 1767008044,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_6a1abd96285bd9_30981219 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\clinic-appointment-system\\app\\views\\templates';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_10207868736a1abd9626eab4_10849585', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block 'form_content'} */
class Block_13115828276a1abd962707f1_35536379 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\clinic-appointment-system\\app\\views\\templates';
?>
 <?php
}
}
/* {/block 'form_content'} */
/* {block "content"} */
class Block_10207868736a1abd9626eab4_10849585 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\clinic-appointment-system\\app\\views\\templates';
?>

<div class="row" style="justify-content: center;">
	<div class="col-6 col-12-small">
		<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_13115828276a1abd962707f1_35536379', 'form_content', $this->tplIndex);
?>

	</div>
	<?php if (!$_smarty_tpl->getValue('msgs')->isEmpty()) {?>
		<div class="col-6 col-12-small">
			<?php $_smarty_tpl->renderSubTemplate('file:messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
		</div>
	<?php }
}
}
/* {/block "content"} */
}
