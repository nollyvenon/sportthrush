<?php
/* Smarty version 3.1.32, created on 2019-04-09 11:16:16
  from 'C:\wamp64\www\footballfannetwork\talkpoint\themes\default\subtemplates\search.inc.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5cac7f00117203_32912119',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ea044abc5446a1bf60f2ab0a39215950322ad041' => 
    array (
      0 => 'C:\\wamp64\\www\\footballfannetwork\\talkpoint\\themes\\default\\subtemplates\\search.inc.tpl',
      1 => 1550821864,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5cac7f00117203_32912119 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\footballfannetwork\\talkpoint\\modules\\smarty\\plugins\\modifier.replace.php','function'=>'smarty_modifier_replace',),));
if (!$_smarty_tpl->tpl_vars['list_spam']->value) {?>
<form action="index.php" method="get" accept-charset="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'charset');?>
">
<div style="margin-bottom:20px;">
<input type="hidden" name="mode" value="search" />
<input type="text" name="search" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['search']->value)===null||$tmp==='' ? '' : $tmp);?>
" size="30" />
<?php if ($_smarty_tpl->tpl_vars['categories']->value) {?>
<select size="1" name="p_category">
<option value="0"<?php if ($_smarty_tpl->tpl_vars['category']->value == 0) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'all_categories');?>
</option>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'val', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
if ($_smarty_tpl->tpl_vars['key']->value != 0) {?><option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['key']->value == $_smarty_tpl->tpl_vars['p_category']->value) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</option><?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</select>
<?php }?>
<input type="submit" name="search_submit" value="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'search_submit_button');?>
" /><?php if ($_smarty_tpl->tpl_vars['settings']->value['tags'] > 0) {?><br />
<span class="small"><input id="searchfulltext" type="radio" name="method" value="0"<?php if ($_smarty_tpl->tpl_vars['method']->value == 'fulltext') {?> checked="checked"<?php }?> /><label for="searchfulltext"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'search_fulltext');?>
</label> <input id="searchtags" type="radio" class="search-radio" name="method" value="tags"<?php if ($_smarty_tpl->tpl_vars['method']->value == 'tags') {?> checked="checked"<?php }?> /><label for="searchtags"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'search_tags');?>
</label></span><?php }?>
</div></form>
<?php }
if ($_smarty_tpl->tpl_vars['search']->value || $_smarty_tpl->tpl_vars['list_spam']->value) {
if ($_smarty_tpl->tpl_vars['search_results']->value) {?>
<p><?php if ($_smarty_tpl->tpl_vars['search_results_count']->value > 1) {
echo smarty_modifier_replace($_smarty_tpl->smarty->ext->configload->_getConfigVariable($_smarty_tpl, 'several_postings_found'),"[number]",$_smarty_tpl->tpl_vars['search_results_count']->value);
} else {
echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'one_posting_found');
}?></p>
<ul class="searchresults">
<?php
$__section_result_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['search_results']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_result_0_total = $__section_result_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_result'] = new Smarty_Variable(array());
if ($__section_result_0_total !== 0) {
for ($__section_result_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_result']->value['index'] = 0; $__section_result_0_iteration <= $__section_result_0_total; $__section_result_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_result']->value['index']++){
?>
<li><a class="<?php if ($_smarty_tpl->tpl_vars['search_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_result']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_result']->value['index'] : null)]['pid'] == 0) {?>thread-search<?php } else { ?>reply-search<?php }
if ($_smarty_tpl->tpl_vars['search_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_result']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_result']->value['index'] : null)]['is_read']) {?> read<?php }?>" href="index.php?id=<?php echo $_smarty_tpl->tpl_vars['search_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_result']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_result']->value['index'] : null)]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['search_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_result']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_result']->value['index'] : null)]['subject'];?>
</a><?php if ($_smarty_tpl->tpl_vars['search_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_result']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_result']->value['index'] : null)]['no_text']) {?> <img class="no-text" src="<?php echo $_smarty_tpl->tpl_vars['THEMES_DIR']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/images/no_text.png" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'no_text_title');?>
" alt="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'no_text_alt');?>
" width="11" height="9" /><?php }?> - <strong><?php echo $_smarty_tpl->tpl_vars['search_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_result']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_result']->value['index'] : null)]['name'];?>
</strong>, <span id="p<?php echo $_smarty_tpl->tpl_vars['search_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_result']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_result']->value['index'] : null)]['id'];?>
" class="tail"><?php echo $_smarty_tpl->tpl_vars['search_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_result']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_result']->value['index'] : null)]['formated_time'];?>
 <a href="index.php?mode=thread&amp;id=<?php echo $_smarty_tpl->tpl_vars['search_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_result']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_result']->value['index'] : null)]['id'];?>
" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'open_whole_thread');?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['THEMES_DIR']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/images/complete_thread.png" alt="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'open_whole_thread');?>
" width="11" height="11" /></a> <?php if ($_smarty_tpl->tpl_vars['search_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_result']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_result']->value['index'] : null)]['category']) {?><a href="index.php?mode=index&amp;category=<?php echo $_smarty_tpl->tpl_vars['search_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_result']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_result']->value['index'] : null)]['category'];?>
"><span class="category">(<?php echo $_smarty_tpl->tpl_vars['search_results']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_result']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_result']->value['index'] : null)]['category_name'];?>
)</span></a><?php }?></span></li>
<?php
}
}
?>
</ul>
<?php if ($_smarty_tpl->tpl_vars['page_browse']->value && $_smarty_tpl->tpl_vars['page_browse']->value['total_items'] > $_smarty_tpl->tpl_vars['page_browse']->value['items_per_page']) {?>
<ul class="pagination">
<?php if ($_smarty_tpl->tpl_vars['page_browse']->value['previous_page'] != 0) {?><li><a href="index.php?mode=<?php echo $_smarty_tpl->tpl_vars['mode']->value;
if ($_smarty_tpl->tpl_vars['list_spam']->value) {?>&amp;list_spam=1<?php }
if ($_smarty_tpl->tpl_vars['action']->value) {?>&amp;action=<?php echo $_smarty_tpl->tpl_vars['action']->value;
}
if ($_smarty_tpl->tpl_vars['search_encoded']->value) {?>&amp;search=<?php echo $_smarty_tpl->tpl_vars['search_encoded']->value;
}
if ($_smarty_tpl->tpl_vars['method']->value && $_smarty_tpl->tpl_vars['method']->value != 'fulltext') {?>&amp;method=<?php echo $_smarty_tpl->tpl_vars['method']->value;
}
if ($_smarty_tpl->tpl_vars['id']->value) {?>&amp;id=<?php echo $_smarty_tpl->tpl_vars['id']->value;
}
if ($_smarty_tpl->tpl_vars['page_browse']->value['previous_page'] > 1) {?>&amp;page=<?php echo $_smarty_tpl->tpl_vars['page_browse']->value['previous_page'];
}
if ($_smarty_tpl->tpl_vars['p_category']->value && $_smarty_tpl->tpl_vars['p_category']->value > 0) {?>&amp;p_category=<?php echo $_smarty_tpl->tpl_vars['p_category']->value;
}
if ($_smarty_tpl->tpl_vars['order']->value) {?>&amp;order=<?php echo $_smarty_tpl->tpl_vars['order']->value;
}
if ($_smarty_tpl->tpl_vars['descasc']->value) {?>&amp;descasc=<?php echo $_smarty_tpl->tpl_vars['descasc']->value;
}?>" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'previous_page_link_title');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'previous_page_link');?>
</a></li><?php }
$__section_x_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['page_browse']->value['browse_array']) ? count($_loop) : max(0, (int) $_loop));
$__section_x_1_total = $__section_x_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_x'] = new Smarty_Variable(array());
if ($__section_x_1_total !== 0) {
for ($__section_x_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] = 0; $__section_x_1_iteration <= $__section_x_1_total; $__section_x_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']++){
if ($_smarty_tpl->tpl_vars['page_browse']->value['browse_array'][(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)] == $_smarty_tpl->tpl_vars['page_browse']->value['page']) {?><li><span class="current"><?php echo $_smarty_tpl->tpl_vars['page_browse']->value['browse_array'][(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)];?>
</span></li><?php } elseif ($_smarty_tpl->tpl_vars['page_browse']->value['browse_array'][(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)] == 0) {?><li>&hellip;</li><?php } else { ?><li><a href="index.php?mode=<?php echo $_smarty_tpl->tpl_vars['mode']->value;
if ($_smarty_tpl->tpl_vars['list_spam']->value) {?>&amp;list_spam=1<?php }
if ($_smarty_tpl->tpl_vars['action']->value) {?>&amp;action=<?php echo $_smarty_tpl->tpl_vars['action']->value;
}
if ($_smarty_tpl->tpl_vars['search_encoded']->value) {?>&amp;search=<?php echo $_smarty_tpl->tpl_vars['search_encoded']->value;
}
if ($_smarty_tpl->tpl_vars['method']->value && $_smarty_tpl->tpl_vars['method']->value != 'fulltext') {?>&amp;method=<?php echo $_smarty_tpl->tpl_vars['method']->value;
}
if ($_smarty_tpl->tpl_vars['id']->value) {?>&amp;id=<?php echo $_smarty_tpl->tpl_vars['id']->value;
}
if ($_smarty_tpl->tpl_vars['page_browse']->value['browse_array'][(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)] > 1) {?>&amp;page=<?php echo $_smarty_tpl->tpl_vars['page_browse']->value['browse_array'][(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)];
}
if ($_smarty_tpl->tpl_vars['p_category']->value && $_smarty_tpl->tpl_vars['p_category']->value > 0) {?>&amp;p_category=<?php echo $_smarty_tpl->tpl_vars['p_category']->value;
}
if ($_smarty_tpl->tpl_vars['order']->value) {?>&amp;order=<?php echo $_smarty_tpl->tpl_vars['order']->value;
}
if ($_smarty_tpl->tpl_vars['descasc']->value) {?>&amp;descasc=<?php echo $_smarty_tpl->tpl_vars['descasc']->value;
}?>"><?php echo $_smarty_tpl->tpl_vars['page_browse']->value['browse_array'][(isset($_smarty_tpl->tpl_vars['__smarty_section_x']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_x']->value['index'] : null)];?>
</a></li><?php }
}
}
if ($_smarty_tpl->tpl_vars['page_browse']->value['next_page'] != 0) {?><li><a href="index.php?mode=<?php echo $_smarty_tpl->tpl_vars['mode']->value;
if ($_smarty_tpl->tpl_vars['list_spam']->value) {?>&amp;list_spam=1<?php }
if ($_smarty_tpl->tpl_vars['action']->value) {?>&amp;action=<?php echo $_smarty_tpl->tpl_vars['action']->value;
}
if ($_smarty_tpl->tpl_vars['search_encoded']->value) {?>&amp;search=<?php echo $_smarty_tpl->tpl_vars['search_encoded']->value;
}
if ($_smarty_tpl->tpl_vars['method']->value && $_smarty_tpl->tpl_vars['method']->value != 'fulltext') {?>&amp;method=<?php echo $_smarty_tpl->tpl_vars['method']->value;
}
if ($_smarty_tpl->tpl_vars['id']->value) {?>&amp;id=<?php echo $_smarty_tpl->tpl_vars['id']->value;
}?>&amp;page=<?php echo $_smarty_tpl->tpl_vars['page_browse']->value['next_page'];
if ($_smarty_tpl->tpl_vars['p_category']->value && $_smarty_tpl->tpl_vars['p_category']->value > 0) {?>&amp;p_category=<?php echo $_smarty_tpl->tpl_vars['p_category']->value;
}
if ($_smarty_tpl->tpl_vars['order']->value) {?>&amp;order=<?php echo $_smarty_tpl->tpl_vars['order']->value;
}
if ($_smarty_tpl->tpl_vars['descasc']->value) {?>&amp;descasc=<?php echo $_smarty_tpl->tpl_vars['descasc']->value;
}?>" title="<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'next_page_link_title');?>
"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'next_page_link');?>
</a></li><?php }?>
</ul>
<?php }
} else { ?>
<p><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'no_postings_found');?>
</p>
<?php }
}?>

<?php }
}
