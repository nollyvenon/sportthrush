<?php
/* Smarty version 3.1.32, created on 2019-05-21 10:42:29
  from 'C:\wamp\www\footballfannetwork\talkpoint\themes\default\subtemplates\subnavigation_1.inc.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5ce3d615b4c041_89397857',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c2355881f0d880859de8591e54579f04502c82fe' => 
    array (
      0 => 'C:\\wamp\\www\\footballfannetwork\\talkpoint\\themes\\default\\subtemplates\\subnavigation_1.inc.tpl',
      1 => 1550821864,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ce3d615b4c041_89397857 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp\\www\\footballfannetwork\\talkpoint\\modules\\smarty\\plugins\\modifier.replace.php','function'=>'smarty_modifier_replace',),));
if ($_smarty_tpl->tpl_vars['subnav_location']->value) {?>
<p class="subnav">
<?php if ($_smarty_tpl->tpl_vars['breadcrumbs']->value) {
$__section_nr_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['breadcrumbs']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_nr_2_total = $__section_nr_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_nr'] = new Smarty_Variable(array());
if ($__section_nr_2_total !== 0) {
for ($__section_nr_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] = 0; $__section_nr_2_iteration <= $__section_nr_2_total; $__section_nr_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']++){
$_smarty_tpl->_assignInScope('breadcrumb_linkname', $_smarty_tpl->tpl_vars['breadcrumbs']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['linkname']);?>
<a href="<?php echo $_smarty_tpl->tpl_vars['breadcrumbs']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_nr']->value['index'] : null)]['link'];?>
"><?php echo $_smarty_tpl->smarty->ext->configload->_getConfigVariable($_smarty_tpl, $_smarty_tpl->tpl_vars['breadcrumb_linkname']->value);?>
</a> &raquo;
<?php
}
}
}
echo $_smarty_tpl->tpl_vars['subnav_location']->value;?>
</p>
<?php } elseif ($_smarty_tpl->tpl_vars['subnav_link']->value) {
$_smarty_tpl->_assignInScope('link_name', $_smarty_tpl->tpl_vars['subnav_link']->value['name']);
if ($_smarty_tpl->tpl_vars['subnav_link']->value['title']) {
$_smarty_tpl->_assignInScope('link_title', $_smarty_tpl->tpl_vars['subnav_link']->value['title']);
}?>
<a class="stronglink" href="index.php<?php if ($_smarty_tpl->tpl_vars['subnav_link']->value['id'] && !$_smarty_tpl->tpl_vars['subnav_link']->value['mode']) {?>?id=<?php echo $_smarty_tpl->tpl_vars['subnav_link']->value['id'];
} else { ?>?mode=<?php echo $_smarty_tpl->tpl_vars['subnav_link']->value['mode'];
if ($_smarty_tpl->tpl_vars['subnav_link']->value['back']) {?>&amp;back=<?php echo $_smarty_tpl->tpl_vars['subnav_link']->value['back'];
}
if ($_smarty_tpl->tpl_vars['subnav_link']->value['id']) {?>&amp;id=<?php echo $_smarty_tpl->tpl_vars['subnav_link']->value['id'];
}
}?>" title="<?php echo (($tmp = @smarty_modifier_replace($_smarty_tpl->smarty->ext->configload->_getConfigVariable($_smarty_tpl, $_smarty_tpl->tpl_vars['link_title']->value),"[name]",$_smarty_tpl->tpl_vars['name_repl_subnav']->value))===null||$tmp==='' ? '' : $tmp);?>
"><?php echo smarty_modifier_replace($_smarty_tpl->smarty->ext->configload->_getConfigVariable($_smarty_tpl, $_smarty_tpl->tpl_vars['link_name']->value),"[name]",$_smarty_tpl->tpl_vars['name_repl_subnav']->value);?>
</a>
<?php } else { ?>
&nbsp;
<?php }
}
}
