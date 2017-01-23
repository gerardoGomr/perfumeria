<option value="">Seleccione</option>
<option value="-1">Otro producto</option>
@foreach($productos as $producto)
    <option value="{{ $producto->getId() }}">{{ $producto->getNombre() }}</option>
@endforeach

