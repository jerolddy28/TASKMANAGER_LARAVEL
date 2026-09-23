Personal Task Manager
@if(session('success'))
{{ session('success') }}
@endif @yield('content')
``` #### 2. Index View (`resources/views/tasks/index.blade.php`) ```html @extends('layouts.app') @section('content')
Add New Task
@csrf
Task Name 
Description 

Due Date 
mm/dd/yyyy
Your Tasks
@forelse(\(tasks as\)task)
{{ $task->task_name }}
{{ $task->status }}
{{ $task->description ?? 'No details provided.' }}

Due: {{ \(task->due_date ? \Carbon\Carbon::parse(\)task->due_date)->format('M d, Y') : 'No deadline' }}
@csrf @method('PATCH') 
Edit
@csrf @method('DELETE') 
@empty
No tasks found. Create one to get started!

@endforelse
@endsection ``` #### 3. Edit View (`resources/views/tasks/edit.blade.php`) ```html @extends('layouts.ap