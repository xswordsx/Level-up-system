<?php /* Smarty version Smarty-3.1.8, created on 2013-10-27 02:24:41
         compiled from "templates/pages/get_users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:200661739526bb0f070c976-66835352%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6159520549690444672bae7bed5732c6946497e6' => 
    array (
      0 => 'templates/pages/get_users.tpl',
      1 => 1382840677,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200661739526bb0f070c976-66835352',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_526bb0f07f89a1_36694161',
  'variables' => 
  array (
    'lang' => 0,
    'classes' => 0,
    'flag' => 0,
    'list' => 0,
    'CONFIG_HOST' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526bb0f07f89a1_36694161')) {function content_526bb0f07f89a1_36694161($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/srv/disk9/1373333/www/magicschool.g-georgiev.com/lib/smarty/plugins/function.html_options.php';
if (!is_callable('smarty_function_cycle')) include '/srv/disk9/1373333/www/magicschool.g-georgiev.com/lib/smarty/plugins/function.cycle.php';
?><br />

<script>
function Get_users() {
	var id=$('#class_id').val();
	window.location=CONFIG_HOST+'/?page=teacher&action=get_users&flag='+id;
	
}
</script>

<div class="input-group input-group-lg">	
	<span class="input-group-addon">Моля изберете клас</span>		
    <select onchange="Get_users();" id="class_id" class="form-control class-select">
    <option value="0" selected="selected"><?php echo $_smarty_tpl->tpl_vars['lang']->value['select'];?>
</option>
        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['classes']->value,'selected'=>$_smarty_tpl->tpl_vars['flag']->value),$_smarty_tpl);?>
    
    </select>
</div>
<div class="row">
	<div class="span4 offset4">
		<?php if ($_smarty_tpl->tpl_vars['list']->value){?><table class="students">
		<thead>
			<tr>
				<th class="name">Име</th>
				<th class="character-info">Информация</th>
				<th class="spells">Умения</th>
				<th class="appoints">Точки действие</th>
			</tr>
		</thead>
		<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['val'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['val']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['val']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['val']['name'] = 'val';
$_smarty_tpl->tpl_vars['smarty']->value['section']['val']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['val']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['val']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['val']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['val']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['val']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['val']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['val']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['val']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['val']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['val']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['val']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['val']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['val']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['val']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['val']['total']);
?>
		<tr class="<?php echo smarty_function_cycle(array('values'=>"odd,even"),$_smarty_tpl);?>
">
			<td><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['val']['index']]['Name'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['val']['index']]['character_name'];?>
<br /> <span class="span_level">Ниво : <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['val']['index']]['level'];?>
</span>
			</td>
			<td>
			<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['val1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['val1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['val']['index']]['skills']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['name'] = 'val1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['val1']['total']);
?>
			<img skillid="<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['val']['index']]['skills'][$_smarty_tpl->getVariable('smarty')->value['section']['val1']['index']]['Id'];?>
" class="skillicon"src="<?php echo $_smarty_tpl->tpl_vars['CONFIG_HOST']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['val']['index']]['skills'][$_smarty_tpl->getVariable('smarty')->value['section']['val1']['index']]['src'];?>
" onclick="onSkillClick('<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['val']['index']]['Id'];?>
','<?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['val']['index']]['skills'][$_smarty_tpl->getVariable('smarty')->value['section']['val1']['index']]['Id'];?>
')"/>
			<?php endfor; endif; ?>
			</td>
			<td> <?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['val']['index']]['Ap'];?>
 ap </td>
		</tr>	
		<?php endfor; endif; ?>
		</table>
		<?php }?>
	<div>
</div>

<script>
	function onSkillClick(uid,sid){
		console.log(uid,sid)
		requester.getJSON("api.php/use_skill/"+uid+"/"+sid).then(function(data){
			console.log(data)
			if(data.success="1"){
				console.log("happy")
			}else{
				console.log("sad");
			}
		});
	};
	
</script>





<?php }} ?>