<?php
/* Smarty version 3.1.32, created on 2019-04-09 13:27:21
  from 'C:\wamp64\www\footballfannetwork\talkpoint\themes\default\subtemplates\contact.inc.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5cac9db91fc389_57643567',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55dd934e7f3c3bd334815a4168d58fb9eabeebfd' => 
    array (
      0 => 'C:\\wamp64\\www\\footballfannetwork\\talkpoint\\themes\\default\\subtemplates\\contact.inc.tpl',
      1 => 1550821864,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cac9db91fc389_57643567 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\footballfannetwork\\talkpoint\\modules\\smarty\\plugins\\modifier.replace.php','function'=>'smarty_modifier_replace',),));
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, $_smarty_tpl->tpl_vars['language_file']->value, "contact", 0);
?>

<?php if ($_smarty_tpl->tpl_vars['captcha']->value) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, $_smarty_tpl->tpl_vars['language_file']->value, "captcha", 0);
}
if ($_smarty_tpl->tpl_vars['error_message']->value) {?>
<p class="caution"><?php echo $_smarty_tpl->smarty->ext->configload->_getConfigVariable($_smarty_tpl, $_smarty_tpl->tpl_vars['error_message']->value);?>
</p>
<?php } elseif ($_smarty_tpl->tpl_vars['sent']->value) {?>
<p class="ok"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'email_sent');?>
</p>
<?php } else { ?>
<h1><?php if ($_smarty_tpl->tpl_vars['recipient_name']->value) {
echo smarty_modifier_replace($_smarty_tpl->smarty->ext->configload->_getConfigVariable($_smarty_tpl, 'contact_user_hl'),"[recipient_name]",((string)$_smarty_tpl->tpl_vars['recipient_name']->value));
} else {
echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'contact_hl');
}?></h1>
<?php if ($_smarty_tpl->tpl_vars['errors']->value) {?>
<p class="caution"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'error_headline');?>
</p>
<ul>
<?php
$__section_mysec_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['errors']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_mysec_0_total = $__section_mysec_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_mysec'] = new Smarty_Variable(array());
if ($__section_mysec_0_total !== 0) {
for ($__section_mysec_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_mysec']->value['index'] = 0; $__section_mysec_0_iteration <= $__section_mysec_0_total; $__section_mysec_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_mysec']->value['index']++){
$_smarty_tpl->_assignInScope('error', $_smarty_tpl->tpl_vars['errors']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_mysec']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_mysec']->value['index'] : null)]);?>
<li><?php echo smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace(smarty_modifier_replace($_smarty_tpl->smarty->ext->configload->_getConfigVariable($_smarty_tpl, $_smarty_tpl->tpl_vars['error']->value),"[text_length]",$_smarty_tpl->tpl_vars['text_length']->value),"[text_maxlength]",$_smarty_tpl->tpl_vars['settings']->value['email_text_maxlength']),"[not_accepted_word]",$_smarty_tpl->tpl_vars['not_accepted_word']->value),"[not_accepted_words]",$_smarty_tpl->tpl_vars['not_accepted_words']->value);?>
</li>
<?php
}
}
?>
</ul>
<?php }?>
<form action="index.php" method="post" accept-charset="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'charset');?>
">
<div>
<input type="hidden" name="mode" value="contact" />
<?php if ($_smarty_tpl->tpl_vars['id']->value) {?><input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" /><?php }
if ($_smarty_tpl->tpl_vars['recipient_user_id']->value) {?><input type="hidden" name="user_id" value="<?php echo $_smarty_tpl->tpl_vars['recipient_user_id']->value;?>
" /><?php }
if ($_smarty_tpl->tpl_vars['session']->value) {?><input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['session']->value['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['session']->value['id'];?>
" /><?php }?>
<p><label for="sender_email"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'sender_address_caption');?>
</label><br />
<input id="sender_email" type="text" name="sender_email" value="<?php echo $_smarty_tpl->tpl_vars['sender_email']->value;?>
" size="50" /></p>
<p><label for="subject"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'subject_caption');?>
</label><br />
<input id="subject" type="text" name="subject" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['subject']->value)===null||$tmp==='' ? '' : $tmp);?>
" size="50" maxlength="<?php echo $_smarty_tpl->tpl_vars['settings']->value['email_subject_maxlength'];?>
" /></p>
<p><label for="message"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'message_caption');?>
</label><br />
<textarea id="message" name="text" rows="20" cols="80"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['text']->value)===null||$tmp==='' ? '' : $tmp);?>
</textarea></p>
<?php if ($_smarty_tpl->tpl_vars['captcha']->value) {
if ($_smarty_tpl->tpl_vars['captcha']->value['type'] == 2) {?>
<p><strong><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'captcha_marking');?>
</strong><br />
<img class="captcha" src="modules/captcha/captcha_image.php?<?php echo $_smarty_tpl->tpl_vars['session']->value['name'];?>
=<?php echo $_smarty_tpl->tpl_vars['session']->value['id'];?>
" alt="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'captcha_image_alt');?>
" width="180" height="40" /><br />
<label for="captcha_code"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'captcha_expl_image');?>
</label> <input id="captcha_code" type="text" name="captcha_code" value="" size="10" /></p>
<?php } else { ?>
<p><strong><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'captcha_marking');?>
</strong><br />
<label for="captcha_code"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'captcha_expl_math');?>
 <?php echo $_smarty_tpl->tpl_vars['captcha']->value['number_1'];?>
 + <?php echo $_smarty_tpl->tpl_vars['captcha']->value['number_2'];?>
 = </label><input id="captcha_code" type="text" name="captcha_code" value="" size="5" /></p>
<?php }
}?>
<p><input type="submit" name="message_submit" value="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'message_submit_caption');?>
" onclick="document.getElementById('throbber-submit').classList.remove('js-visibility-hidden');" /> <img id="throbber-submit" class="js-visibility-hidden" src="<?php echo $_smarty_tpl->tpl_vars['THEMES_DIR']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/images/throbber_submit.gif" alt="" width="16" height="16" /></p>
</div>
</form>
<?php }
}
}
