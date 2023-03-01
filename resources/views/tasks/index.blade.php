<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-3">
                <div class="p-6 bg-white border-gray-200">
                    {{-- show all error --}}
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    {{-- createanewtask --}}
                    <form action="#" method="POST">
                        @csrf
                        <div class="grid gap-y-3">
                            <input class="input-text" type="text" name="name" placeholder="name">
                            @error('name')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                            <textarea class="input-text" name="description" id="description" cols="30" rows="10"
                                placeholder="description"></textarea>
                            @error('description')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                            <button class="btn" type="submit">create</button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- show task list --}}

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- count task --}}
                    <h4 class="font-bold uppercase">Total tasks {{ $total }} s.</h4>

                    <div class="flex gap-x-3">
                        {{-- task list : blacklog  Tasks--}}
                        <div class="grid gap-2 ">
                            <h4 class="font-bold uppercase">Blacklog tasks {{ $pendingTasks->count() }} s.</h4>
                            @forelse ($pendingTasks as $task)
                            <x-task :task="$task" />
                            @empty
                            <p>no task</p>
                            @endforelse
                        </div>
                        {{-- task list : Done tasks--}}
                        <div class="grid gap-2 ">
                            <h4 class="font-bold uppercase">Done tasks {{ $doneTasks->count() }} s.</h4>
                            @forelse ($doneTasks as $task)
                            <x-task :task="$task" />
                            @empty
                            <p>no task</p>
                            @endforelse
                        </div>
                    </div>



                </div>
            </div>
        </div>

    </div>

</x-app-layout>
