{include file="header.tpl"}

<h2 class="mb-3">Editar Categoría</h2>

<form action="updateCategory/{$category->id}" method="POST" class="mb-4">
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{$category->nombre}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción:</label>
        <textarea id="descripcion" name="descripcion" class="form-control" required>{$category->descripcion}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Guardar cambios</button>
    <a href="{BASE_URL}" class="btn btn-secondary">Cancelar</a>
</form>

{include file="footer.tpl"}
