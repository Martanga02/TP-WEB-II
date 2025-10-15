<!-- formulario de alta de categoría -->
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
