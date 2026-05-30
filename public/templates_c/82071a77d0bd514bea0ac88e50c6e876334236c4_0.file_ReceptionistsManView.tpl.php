<?php
/* Smarty version 5.4.5, created on 2026-05-30 12:40:57
  from 'file:ReceptionistsManView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_6a1abeb96ac4b3_72651284',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '82071a77d0bd514bea0ac88e50c6e876334236c4' => 
    array (
      0 => 'ReceptionistsManView.tpl',
      1 => 1767633607,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
  ),
))) {
function content_6a1abeb96ac4b3_72651284 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\clinic-appointment-system\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_9336579876a1abeb960ce54_56991757', "content");
?>

<?php $_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_9336579876a1abeb960ce54_56991757 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\clinic-appointment-system\\app\\views';
?>


<?php $_smarty_tpl->renderSubTemplate("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<div>
    <div class="col-6">
        <a class="button primary small" href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'showRegistrationForm'), $_smarty_tpl);?>
">Dodaj</a>
    </div>
</div>
<div class="table-wrapper">
    <table id="receptionistsTable" class="alt">
        <thead>
            <tr>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Login</th>
                <th style="width: 30%">Akcje</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('receptionists')) == 0) {?>
                <tr>
                    <td colspan="8">Brak recepcjonistów.</td>
                </tr>
            <?php } else { ?>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('receptionists'), 'receptionist');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('receptionist')->value) {
$foreach0DoElse = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->getValue('receptionist')->name;?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('receptionist')->surname;?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('receptionist')->login;?>
</td>
                    <td>
                        <a class="button primary fit small" href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'deleteReceptionist','param1'=>$_smarty_tpl->getValue('receptionist')->id), $_smarty_tpl);?>
">Usuń</a>
                        <a class="button primary fit small" href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'editRegistrationData','param1'=>$_smarty_tpl->getValue('receptionist')->id), $_smarty_tpl);?>
">Edytuj</a>
                        <a class="button primary fit small" href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'showChangePasswordForm','param1'=>$_smarty_tpl->getValue('receptionist')->id), $_smarty_tpl);?>
">Zmień hasło</a>
                    </td>
                </tr>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            <?php }?>
        </tbody>
    </table>
</div>

<?php
}
}
/* {/block "content"} */
}
