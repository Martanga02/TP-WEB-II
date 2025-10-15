{include file="header.tpl"}

{include file="form_alta.tpl"}

<!-- lista de categorías -->
<ul class="list-group">
    {foreach from=$categories item=$category}
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span>
                <b>{$category->nombre}</b> - {$category->descripcion|truncate:50}
            </span>
            <div class="ml-auto">
                <a href="editCategory/{$category->id}" class="btn btn-primary btn-sm">Editar</a>
                <a href="delete/{$category->id}" class="btn btn-danger btn-sm">Eliminar</a>
            </div>
        </li>
    {/foreach}
</ul>

<p class="mt-3"><small>Mostrando {$count} categorías</small></p>

{include file="footer.tpl"}
