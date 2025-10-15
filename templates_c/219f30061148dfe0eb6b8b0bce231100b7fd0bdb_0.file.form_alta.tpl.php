<?php
/* Smarty version 4.2.1, created on 2025-10-09 00:19:41
  from 'C:\xampp\htdocs\tp_parte2\templates\form_alta.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_68e6e37da5fdf9_42031832',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '219f30061148dfe0eb6b8b0bce231100b7fd0bdb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\tp_parte2\\templates\\form_alta.tpl',
      1 => 1759961971,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68e6e37da5fdf9_42031832 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- formulario de alta de categoría -->
<form action="add" method="POST" class="my-4">
    <div class="form-group">
        <label for="nombre">Nombre de la categoría</label>
        <input name="nombre" id="nombre" type="text" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary mt-2">Guardar</button>
</form>
<?php }
}
