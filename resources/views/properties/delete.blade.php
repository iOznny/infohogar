<form action="{{ route('properties.destroy', $property->id) }}" method="post" class="d-inline">
  @method('DELETE')
  @csrf
  <button type="submit" class="btn btn-danger">Eliminar</button>
</form>
