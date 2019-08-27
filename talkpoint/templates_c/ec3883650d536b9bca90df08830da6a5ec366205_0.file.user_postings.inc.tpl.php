<?php
/* Smarty version 3.1.32, created on 2019-04-09 13:14:56
  from 'C:\wamp64\www\footballfannetwork\talkpoint\themes\default\subtemplates\user_postings.inc.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5cac9ad0dbee49_39993542',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ec3883650d536b9bca90df08830da6a5ec366205' => 
    array (
      0 => 'C:\\wamp64\\www\\footballfannetwork\\talkpoint\\themes\\default\\subtemplates\\user_postings.inc.tpl',
      1 => 1550821864,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cac9ad0dbee49_39993542 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\footballfannetwork\\talkpoint\\modules\\smarty\\plugins\\modifier.replace.php','function'=>'smarty_modifier_replace',),1=>array('file'=>'C:\\wamp64\\www\\footballfannetwork\\talkpoint\\modules\\smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
if ($_smarty_tpl->tpl_vars['user_postings_data']->value) {?>
<p><?php if ($_smarty_tpl->tpl_vars['user_postings_count']->value > 1) {
echo smarty_modifier_replace($_smarty_tpl->smarty->ext->configload->_getConfigVariable($_smarty_tpl, 'several_postings_by_user'),"[number]",$_smarty_tpl->tpl_vars['user_postings_count']->value);
} else {
echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'one_posting_by_user');
}?></p>
<ul class="searchresults">
<?php
$__section_ix_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['user_postings_data']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_ix_0_total = $__section_ix_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_ix'] = new Smarty_Variable(array());
if ($__section_ix_0_total !== 0) {
for ($__section_ix_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_ix']->value['index'] = 0; $__section_ix_0_iteration <= $__section_ix_0_total; $__section_ix_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_ix']->value['index']++){
?>
<li><a class="<?php if ($_smarty_tpl->tpl_vars['user_postings_data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_ix']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_ix']->value['index'] : null)]['pid'] == 0) {?>thread-search<?php } else { ?>reply-search<?php }?> <?php if ($_smarty_tpl->tpl_vars['visited']->value && in_array($_smarty_tpl->tpl_vars['user_postings_data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_ix']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_ix']->value['index'] : null)]['id'],$_smarty_tpl->tpl_vars['visited']->value)) {?> visited<?php }?>" href="index.php?mode=entry&amp;id=<?php echo $_smarty_tpl->tpl_vars['user_postings_data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_ix']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_ix']->value['index'] : null)]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['user_postings_data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_ix']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_ix']->value['index'] : null)]['subject'];?>
</a> - <strong><?php echo $_smarty_tpl->tpl_vars['user_postings_data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_ix']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_ix']->value['index'] : null)]['name'];?>
</strong>, <span id="p<?php echo $_smarty_tpl->tpl_vars['user_postings_data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_ix']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_ix']->value['index'] : null)]['id'];?>
" class="tail"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['user_postings_data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_ix']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_ix']->value['index'] : null)]['disp_time'],$_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'time_format'));?>
 <a href="index.php?mode=thread&amp;id=<?php echo $_smarty_tpl->tpl_vars['user_postings_data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_ix']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_ix']->value['index'] : null)]['id'];?>
" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'open_whole_thread');?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['THEMES_DIR']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/images/complete_thread.png" alt="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'open_whole_thread');?>
" width="11" height="11" /></a> <?php if ($_smarty_tpl->tpl_vars['user_postings_data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_ix']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_ix']->value['index'] : null)]['category']) {?><a href="index.php?mode=index&amp;category=<?php echo $_smarty_tpl->tpl_vars['user_postings_data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_ix']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_ix']->value['index'] : null)]['category'];?>
"><span class="category">(<?php echo $_smarty_tpl->tpl_vars['user_postings_data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_ix']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_ix']->value['index'] : null)]['category_name'];?>
)</span></a><?php }?></span></li>
<?php
}
}
?>
</ul>

<?php if ($_smarty_tpl->tpl_vars['pagination']->value) {?>
<ul class="pagination">
<?php if ($_smarty_tpl->tpl_vars['pagination']->value['previous']) {?><li><a href="index.php?mode=<?php echo $_smarty_tpl->tpl_vars['mode']->value;
if ($_smarty_tpl->tpl_vars['action']->value) {?>&amp;action=<?php echo $_smarty_tpl->tpl_vars['action']->value;
}
if ($_smarty_tpl->tpl_vars['id']->value) {?>&amp;id=<?php echo $_smarty_tpl->tpl_vars['id']->value;
}
if ($_smarty_tpl->tpl_vars['pagination']->value['previous'] > 1) {?>&amp;page=<?php echo $_smarty_tpl->tpl_vars['pagination']->value['previous'];
}?>" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'previous_page_link_title');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'previous_page_link');?>
</a></li><?php }
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pagination']->value['items'], 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
if ($_smarty_tpl->tpl_vars['item']->value == 0) {?><li>&hellip;</li><?php } elseif ($_smarty_tpl->tpl_vars['item']->value == $_smarty_tpl->tpl_vars['pagination']->value['current']) {?><li><span class="current"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</span></li><?php } else { ?><li><a href="index.php?mode=<?php echo $_smarty_tpl->tpl_vars['mode']->value;
if ($_smarty_tpl->tpl_vars['action']->value) {?>&amp;action=<?php echo $_smarty_tpl->tpl_vars['action']->value;
}
if ($_smarty_tpl->tpl_vars['id']->value) {?>&amp;id=<?php echo $_smarty_tpl->tpl_vars['id']->value;
}
if ($_smarty_tpl->tpl_vars['item']->value > 1) {?>&amp;page=<?php echo $_smarty_tpl->tpl_vars['item']->value;
}?>"><?php echo $_smarty_tpl->tpl_vars['item']->value;?>
</a></li><?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if ($_smarty_tpl->tpl_vars['pagination']->value['next']) {?><li><a href="index.php?mode=<?php echo $_smarty_tpl->tpl_vars['mode']->value;
if ($_smarty_tpl->tpl_vars['action']->value) {?>&amp;action=<?php echo $_smarty_tpl->tpl_vars['action']->value;
}
if ($_smarty_tpl->tpl_vars['id']->value) {?>&amp;id=<?php echo $_smarty_tpl->tpl_vars['id']->value;
}?>&amp;page=<?php echo $_smarty_tpl->tpl_vars['pagination']->value['next'];?>
" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'next_page_link_title');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'next_page_link');?>
</a></li><?php }?>
</ul>
<?php }?>

<?php } else { ?>
<p><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'no_postings_by_user');?>
</p>
<?php }
}
}
