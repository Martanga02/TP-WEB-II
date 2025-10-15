<?php
/* Smarty version 4.2.1, created on 2025-10-12 01:05:14
  from 'C:\xampp\htdocs\tp_parte2\templates\taskList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_68eae2aa01c014_95184936',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f06d3198cd0b5c478285598a622361a0121cac25' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tp_parte2\\templates\\taskList.tpl',
      1 => 1760223912,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:form_alta.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_68eae2aa01c014_95184936 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\tp_parte2\\libs\\smarty-4.2.1\\libs\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:form_alta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- lista de categorías -->
<ul class="list-group">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span>
                <b><?php echo $_smarty_tpl->tpl_vars['category']->value->nombre;?>
</b> - <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['category']->value->descripcion,50);?>

            </span>
            <div class="ml-auto">
                <a href="editCategory/<?php echo $_smarty_tpl->tpl_vars['category']->value->id;?>
" class="btn btn-primary btn-sm">Editar</a>
                <a href="delete/<?php echo $_smarty_tpl->tpl_vars['category']->value->id;?>
" class="btn btn-danger btn-sm">Eliminar</a>
            </div>
        </li>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>

<p class="mt-3"><small>Mostrando <?php echo $_smarty_tpl->tpl_vars['count']->value;?>
 categorías</small></p>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
