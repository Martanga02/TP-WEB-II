<?php
/* Smarty version 4.2.1, created on 2025-10-09 00:25:13
  from 'C:\xampp\htdocs\tp_parte2\templates\editCategory.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_68e6e4c9d5de57_91170859',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '91e3933717ea04fbe1191a4d3c4e16ad9b2074fc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tp_parte2\\templates\\editCategory.tpl',
      1 => 1759961616,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_68e6e4c9d5de57_91170859 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h2 class="mb-3">Editar Categoría</h2>

<form action="updateCategory/<?php echo $_smarty_tpl->tpl_vars['category']->value->id;?>
" method="POST" class="mb-4">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $_smarty_tpl->tpl_vars['category']->value->nombre;?>
" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción:</label>
        <textarea id="descripcion" name="descripcion" class="form-control" required><?php echo $_smarty_tpl->tpl_vars['category']->value->descripcion;?>
</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Guardar cambios</button>
    <a href="<?php echo BASE_URL;?>
" class="btn btn-secondary">Cancelar</a>
</form>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
