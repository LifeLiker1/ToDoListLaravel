 <form method="POST" action="{{ route('task.delete', $details->id) }}"
     onsubmit="return confirm('Вы уверены, что хотите удалить эту задачу?')">
     @csrf
     @method('DELETE')
     <button type="submit" class="btn btn-danger">
         <i class="fas fa-trash"></i> Удалить
     </button>
 </form>
