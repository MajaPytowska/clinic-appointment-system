<?php
/* Smarty version 5.4.5, created on 2026-05-30 13:14:45
  from 'file:ScheduleView.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.5',
  'unifunc' => 'content_6a1ac6a5b973c0_76467570',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b715a420b2df56e60bbd0273000a109f042156af' => 
    array (
      0 => 'ScheduleView.tpl',
      1 => 1773362812,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:messages.tpl' => 1,
    'file:ScheduleTable.tpl' => 1,
  ),
))) {
function content_6a1ac6a5b973c0_76467570 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\clinic-appointment-system\\app\\views';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_4256355676a1ac6a5a794c3_29752003', "content");
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "main.tpl", $_smarty_current_dir);
}
/* {block "content"} */
class Block_4256355676a1ac6a5a794c3_29752003 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\clinic-appointment-system\\app\\views';
?>


<?php echo '<script'; ?>
>
    const localFilterPreset =['scheduleFilterForm', '<?php echo $_smarty_tpl->getValue('conf')->action_root;?>
showSchedulePart','scheduleTableWrapper'];
<?php echo '</script'; ?>
>

<div id="messages">
    <?php $_smarty_tpl->renderSubTemplate("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
</div>

<?php if (!$_smarty_tpl->getValue('isPatient')) {?>
<div>
    <div class="col-6">
        <a class="button primary small" href="<?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('url')->handle(array('action'=>'showNewAppointmentForm'), $_smarty_tpl);?>
">Dodaj wizytę</a>
    </div>
</div>
<div class="filter-container" style="margin-top: 2em;">
    <div class="filterIcon">
        <a class="icon solid fa-filter"></a>
    </div>
    <div class = "filterContent">
        <form id="scheduleFilterForm">
        <div class="row gtr-25 gtr-uniform">
            <div class="col-4 col-12-small">
                <input type="text" id="name" name="name" placeholder="Lekarz lub pacjent" value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('form')->name, ENT_QUOTES, 'UTF-8', true);?>
" 
                oninput="filterTable(...localFilterPreset, true);"
                />
            </div>
            
            <div class="col-3 col-12-small">
                <input 
                    type="<?php if ($_smarty_tpl->getValue('form')->dateTimeFrom != '') {?>date<?php } else { ?>text<?php }?>" 
                    id="dateTimeFrom" 
                    name="dateTimeFrom" 
                    placeholder="Od" 
                    value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('form')->dateTimeFrom, ENT_QUOTES, 'UTF-8', true);?>
" 
                    onfocus="this.type='date'" 
                    onblur="if(this.value == '') this.type='text';" 
                    onchange="filterTable(...localFilterPreset);"
                />
            </div>

            <div class="col-3 col-12-small">
                <input 
                    type="<?php if ($_smarty_tpl->getValue('form')->dateTimeTo != '') {?>date<?php } else { ?>text<?php }?>" 
                    id="dateTimeTo" 
                    name="dateTimeTo" 
                    placeholder="Do" 
                    value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('form')->dateTimeTo, ENT_QUOTES, 'UTF-8', true);?>
" 
                    onfocus="this.type='date'" 
                    onblur="if(this.value == '') this.type='text';" 
                    onchange="filterTable(...localFilterPreset);"
                />
            </div>
            
            <div class="col-2 col-12-small">
                <select id="appointmentStatus" name="appointmentStatus" onchange="filterTable(...localFilterPreset);">
                    <option value="" <?php if ($_smarty_tpl->getValue('form')->appointmentStatus == '') {?>selected<?php }?>>Wszystkie</option>
                    <option value="1" <?php if ($_smarty_tpl->getValue('form')->appointmentStatus == '1') {?>selected<?php }?>>Wolne</option>
                    <option value="0" <?php if ($_smarty_tpl->getValue('form')->appointmentStatus == '0') {?>selected<?php }?>>Zajęte</option>
                </select>
            </div>

            <input type="hidden" id="pageInput" name="page" value="1">
        </div>
    </form>
    </div>
</div>

<?php }?>

<div id="scheduleTableWrapper" class="table-wrapper">
    <?php $_smarty_tpl->renderSubTemplate("file:ScheduleTable.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
</div>

<?php
}
}
/* {/block "content"} */
}
