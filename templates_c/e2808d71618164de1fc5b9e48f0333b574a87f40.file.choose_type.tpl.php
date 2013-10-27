<?php /* Smarty version Smarty-3.1.8, created on 2013-10-26 21:23:00
         compiled from "templates/pages/choose_type.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1855988599526c29d34ad535-16803822%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2808d71618164de1fc5b9e48f0333b574a87f40' => 
    array (
      0 => 'templates/pages/choose_type.tpl',
      1 => 1382822544,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1855988599526c29d34ad535-16803822',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_526c29d34c6514_58428057',
  'variables' => 
  array (
    'CONFIRM_HOST' => 0,
    'CONFIG_HOST' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526c29d34c6514_58428057')) {function content_526c29d34c6514_58428057($_smarty_tpl) {?><form action="<?php echo $_smarty_tpl->tpl_vars['CONFIRM_HOST']->value;?>
" method="get" id="character_type">
<input type="hidden" name="type" id="type"/>
</form>


<div id="container">
    <div id="wrapper-character">
        <div class="content">
            <h1>Hello, Adventurers !</h1>
            <span>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed hendrerit erat a suscipit sagittis.
                Proin semper dictum felis non faucibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Sed dapibus placerat adipiscing. Nullam viverra eros a dui venenatis, vitae sollicitudin mauris gravida.
            </span>
        </div>
        <div class="characters">
            <a href="javascript:void(0)" onclick="Send_form('1')"><img src="<?php echo $_smarty_tpl->tpl_vars['CONFIG_HOST']->value;?>
/img/characters/spellcaster-small.jpg"></a>
            <a href="javascript:void(0)" onclick="Send_form('2')"><img src="<?php echo $_smarty_tpl->tpl_vars['CONFIG_HOST']->value;?>
/img/characters/warrior-small.jpg"></a>
            <a href="javascript:void(0)" onclick="Send_form('3')"><img src="<?php echo $_smarty_tpl->tpl_vars['CONFIG_HOST']->value;?>
/img/characters/ranger-small.jpg"></a>
        </div>
    </div>
</div>




<script>
function Send_form(type) {
	$('#type').val(type);
	$('#character_type').submit();
	
}
</script>
<?php }} ?>