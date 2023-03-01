@props(['task'])

<div class="grid  border border-gray-400 rounded-lg px-2 py-1">
    {{-- task body --}}
 <div>
     {{ $task->name }} | {{ $task->description }}
 </div>
 {{-- task action --}}
 <div class="flex justify-end">
     {{-- <a class="btn " href="{{ route('tasks.edit',$task->id) }}">Edit</a> --}}
     {{-- done task --}}
     <form action="{{ route('tasks.update',$task) }}" method="POST">
     @csrf
     @method('PUT')


     <button
         class="btn"
         type="submit"
         name="status"
         value="{{ \App\Enums\TasksStatus::DONE->value }}"
              >Done</button>
     </form>
     <form action="{{ route('tasks.destroy', $task) }}" method="POST">
         @csrf
         @method('DELETE')
         <button class="btn btn-danger" type="submit">Delete</button>
     </form>
 </div>
</div>




