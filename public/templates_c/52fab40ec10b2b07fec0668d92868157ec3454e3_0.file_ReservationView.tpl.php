<?php
/* Smarty version 5.4.5, created on 2026-05-30 13:17:17
  from 'file:ReservationView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_6a1ac73d8f4380_42582205',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '52fab40ec10b2b07fec0668d92868157ec3454e3' => 
    array (
      0 => 'ReservationView.tpl',
      1 => 1767206916,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6a1ac73d8f4380_42582205 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\clinic-appointment-system\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_3484470726a1ac73d8c5055_66346974', "form_content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "form_base.tpl", $_smarty_current_dir);
}
/* {block "form_content"} */
class Block_3484470726a1ac73d8c5055_66346974 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\clinic-appointment-system\\app\\views';
?>

<form method="post" action="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'saveReservation'), $_smarty_tpl);?>
">
    <div class="row gtr-uniform">
    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('patients')) > 0) {?>
        <div class="col-12 col-12-xsmall">
            <select name="patientId" id="patientId">
                <option style="display: none;" value="">Wybierz pacjenta</option>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('patients'), 'patient');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('patient')->value) {
$foreach0DoElse = false;
?>
                    <option value="<?php echo $_smarty_tpl->getValue('patient')->id;?>
" <?php if ($_smarty_tpl->getValue('reservation')->patientId == $_smarty_tpl->getValue('patient')->id) {?>selected<?php }?>><?php echo $_smarty_tpl->getValue('patient')->name;?>
 <?php echo $_smarty_tpl->getValue('patient')->surname;?>
 (<?php echo $_smarty_tpl->getValue('patient')->pesel;?>
)</option>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </select>
        </div>
    <?php }?>
        <div class="col-12" id="visitReasonIdDiv" style="display: <?php if ($_smarty_tpl->getValue('reservation')->customVisitReasonEnable) {?>none<?php } else { ?>block<?php }?>;">
            <select name="visitReasonId" id="visitReasonId">
                <option style="display: none;" value="">Wybierz przyczynę wizyty</option>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('visitReasons'), 'visitReason');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('visitReason')->value) {
$foreach1DoElse = false;
?>
                    <option value="<?php echo $_smarty_tpl->getValue('visitReason')->id;?>
" <?php if ($_smarty_tpl->getValue('reservation')->visitReasonId == $_smarty_tpl->getValue('visitReason')->id) {?>selected<?php }?>><?php echo $_smarty_tpl->getValue('visitReason')->name;?>
</option>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
            </select>
        </div>
        <div class="col-6 col-12-xsmall">
            <input type="checkbox" id="customVisitReasonEnable" name="customVisitReasonEnable" value="1" <?php if ($_smarty_tpl->getValue('reservation')->customVisitReasonEnable) {?>checked<?php }?>>
			<label for="customVisitReasonEnable">Inna przyczyna wizyty</label>
        </div>	
        <div class="col-12" id="customVisitReasonDiv" style="display: <?php if ($_smarty_tpl->getValue('reservation')->customVisitReasonEnable) {?>block<?php } else { ?>none<?php }?>;">
    		<textarea name="customVisitReason" id="customVisitReason" placeholder="Opisz przyczynę wizyty" rows="6" maxlength="100"><?php echo $_smarty_tpl->getValue('reservation')->customVisitReason;?>
</textarea>
    	</div>    
        <div class="col-12">
            <input type="submit" value="Umów" class="primary"/>
        </div>
    </div>
</form>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('asset_url')->handle(array('path'=>"js/textareaCheckboxTrigger.js"), $_smarty_tpl);?>
"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "form_content"} */
}
