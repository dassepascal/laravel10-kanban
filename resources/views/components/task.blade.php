@props(['task'])

<div class="grid  border border-gray-400 rounded-lg px-2 py-1">
    {{-- task body --}}
 <div >
   <strong> {{ $task->name }}</strong>
 </div>
 <p> {{ $task->description }}</p>
 {{-- last updated --}}
 <small class="text-gray-600"> {{ $task->updated_at->diffForHumans() }}</small>
 <hr class="my-2">
 {{-- task action --}}
 <div class="flex justify-end gap-x-1 text-sm">
    {{-- panding task --}}
    <form action="{{ route('tasks.update',$task) }}" method="POST">
        @csrf
       @method('PATCH')
       <input type="hidden" name="status" value="{{ \App\Enums\TasksStatus::PENDING->value }}">
       <button class="btn" type="submit">panding</button>
    </form>
{{--  in progress tasks--}}
<form action="{{ route('tasks.update',$task->id) }}" method="POST">
@csrf
@method('PUT')
<input type="hidden" name="status" value="{{ \App\Enums\TasksStatus::IN_PROGRESS->value }}">
<button class="btn" type="submit"> In progress</button>
</form>
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




