@extends('layouts.admin')
@section('titulo', 'Piezas Artesanales')
@section('encabezado', 'Catálogo de Piezas Artesanales')

@section('contenido')
<div class="card">
    <h3>Registrar Nueva Pieza</h3>
    <form method="POST" action="{{ route('piezas.store') }}" enctype="multipart/form-data" class="form-grid">
        @csrf
        <div class="form-group">
            <label>Código (ej. PZ-18) *</label>
            <input type="text" name="codigo" placeholder="PZ-18" required>
        </div>
        <div class="form-group">
            <label>Categoría *</label>
            <select name="categoria_id" required>
                @foreach($categorias as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Nombre de la Pieza *</label>
            <input type="text" name="nombre" required>
        </div>
        <div class="form-group">
            <label>Precio (MXN) *</label>
            <input type="number" step="0.01" name="precio" required>
        </div>
        <div class="form-group">
            <label>Disponibilidad *</label>
            <select name="disponibilidad" required>
                <option value="Disponible en Taller">Disponible en Taller</option>
                <option value="Pieza Única">Pieza Única</option>
                <option value="Bajo Pedido (5-10 días)">Bajo Pedido (5-10 días)</option>
            </select>
        </div>
        <div class="form-group full">
            <label>Fotografía de la Pieza (Arrastra o selecciona un archivo)</label>
            <div id="dropzone-pieza" class="dropzone-area">
                <p id="dropzone-text">Arrastra tu imagen aquí (JPG, PNG, WEBP, SVG) o haz clic para explorar</p>
                <span class="dropzone-btn">Seleccionar archivo</span>
                <input type="file" id="input-imagen-pieza" name="imagen" accept="image/*" style="display: none;">
                <div>
                    <img id="preview-imagen-pieza" class="dropzone-preview" src="" alt="Vista previa">
                </div>
            </div>
        </div>
        <div class="form-group full">
            <label>Materiales y Detalles</label>
            <input type="text" name="materiales" placeholder="Cristales, mostacillas, dije...">
        </div>
        <div class="form-group full">
            <label>Descripción</label>
            <textarea name="descripcion" rows="2"></textarea>
        </div>
        <div class="form-group full">
            <button type="submit" class="btn btn-primary">Guardar Pieza en Catálogo</button>
        </div>
    </form>
</div>

<div class="card">
    <h3>Piezas en Catálogo</h3>
    <div class="table-responsive">
        <table>
            <thead><tr><th>Imagen</th><th>Código</th><th>Pieza</th><th>Categoría</th><th>Precio</th><th>Disponibilidad</th><th>Acción</th></tr></thead>
            <tbody>
                @foreach($piezas as $p)
                <tr>
                    <td>
                        <img src="{{ asset($p->imagen ?: 'img/hero-artesanal.svg') }}" alt="{{ $p->nombre }}" style="width: 52px; height: 52px; object-fit: cover; border-radius: 8px; border: 1px solid #E8E1D5;">
                    </td>
                    <td><strong>{{ $p->codigo }}</strong></td>
                    <td>{{ $p->nombre }}<br><small style="color:#6B7280">{{ $p->materiales }}</small></td>
                    <td><span class="badge">{{ $p->categoria->nombre ?? 'N/A' }}</span></td>
                    <td>${{ number_format($p->precio, 2) }} MXN</td>
                    <td>{{ $p->disponibilidad }}</td>
                    <td>
                        <form method="POST" action="{{ route('piezas.destroy', $p) }}" onsubmit="return confirm('¿Eliminar pieza?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const dropzone = document.getElementById('dropzone-pieza');
    const fileInput = document.getElementById('input-imagen-pieza');
    const preview = document.getElementById('preview-imagen-pieza');
    const text = document.getElementById('dropzone-text');

    function mostrarPreview(file) {
        if (!file || !file.type.startsWith('image/')) return;
        text.textContent = 'Archivo listo: ' + file.name;
        const reader = new FileReader();
        reader.onload = e => {
            preview.src = e.target.result;
            preview.style.display = 'inline-block';
        };
        reader.readAsDataURL(file);
    }

    dropzone.addEventListener('click', () => fileInput.click());
    fileInput.addEventListener('change', () => mostrarPreview(fileInput.files[0]));

    dropzone.addEventListener('dragover', e => {
        e.preventDefault();
        dropzone.classList.add('dragover');
    });
    dropzone.addEventListener('dragleave', () => dropzone.classList.remove('dragover'));
    dropzone.addEventListener('drop', e => {
        e.preventDefault();
        dropzone.classList.remove('dragover');
        if (e.dataTransfer.files.length) {
            fileInput.files = e.dataTransfer.files;
            mostrarPreview(e.dataTransfer.files[0]);
        }
    });
});
</script>
@endsection
