<?php
/* Smarty version 3.1.32, created on 2019-04-08 13:27:36
  from 'C:\wamp64\www\footballfannetwork\talkpoint\themes\default\subtemplates\login.inc.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5cab4c48de5586_96628556',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '43ce1fed87e9ecb2c7fd4b29435c0995b360ab6e' => 
    array (
      0 => 'C:\\wamp64\\www\\footballfannetwork\\talkpoint\\themes\\default\\subtemplates\\login.inc.tpl',
      1 => 1550821864,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cab4c48de5586_96628556 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, $_smarty_tpl->tpl_vars['language_file']->value, "login", 0);
?>

<?php if ($_smarty_tpl->tpl_vars['ip_temporarily_blocked']->value) {
echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'login_message');?>

<p class="caution"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'login_ip_temp_blocked');?>
</p>
<?php } else {
if ($_smarty_tpl->tpl_vars['login_message']->value && $_smarty_tpl->smarty->ext->configload->_getConfigVariable($_smarty_tpl, $_smarty_tpl->tpl_vars['login_message']->value)) {?>
<p class="<?php if ($_smarty_tpl->tpl_vars['login_message']->value == 'account_activated' || $_smarty_tpl->tpl_vars['login_message']->value == 'mail_sent' || $_smarty_tpl->tpl_vars['login_message']->value == 'pw_sent') {?>ok<?php } else { ?>caution<?php }?>"><?php echo $_smarty_tpl->smarty->ext->configload->_getConfigVariable($_smarty_tpl, $_smarty_tpl->tpl_vars['login_message']->value);?>
</p>
<?php }?>
<form action="index.php" method="post" accept-charset="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'charset');?>
">
<div>
<input type="hidden" name="mode" value="<?php echo $_smarty_tpl->tpl_vars['mode']->value;?>
" />
<?php if ($_smarty_tpl->tpl_vars['back']->value) {?><input type="hidden" name="back" value="<?php echo $_smarty_tpl->tpl_vars['back']->value;?>
" /><?php }
if ($_smarty_tpl->tpl_vars['id']->value) {?><input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" /><?php }?>
<p><label for="login" class="main"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'login_username');?>
</label><br /><input id="login" class="login" type="text" name="username" size="25" /></p>
<p><label for="password" class="main"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'login_password');?>
</label><br /><input id="password" class="login" type="password" name="userpw" size="25" /></p>
<?php if ($_smarty_tpl->tpl_vars['settings']->value['autologin'] == 1) {?>
<p class="small"><input id="autologin" type="checkbox" name="autologin_checked" value="true" /> <label for="autologin"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'login_auto');?>
</label></p>
<?php }?>
<p><input type="submit" value="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'login_submit');?>
" /></p>
</div>
</form>
<p class="small"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'login_advice');?>
</p>
<p class="small"><a href="index.php?mode=login&amp;action=pw_forgotten"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'pw_forgotten_link');?>
</a></p>
<?php }
}
}
