<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="ULF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Task Manager</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@00;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(180deg, #1b213b 0%, #163654 30%, #00a4d6 80%, #00c3ff 100%);
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 40px 20px;
            color: #ffffff;
        }

        .container {
            width: 100%;
            max-width: 850px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1.app-title {
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: 1px;
            color: #00e5ff;
            text-transform: uppercase;
            margin-bottom: 30px;
            text-shadow: 0 0 10px rgba(0, 229, 255, 0.3);
        }

        .card {
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 12px;
            padding: 28px 32px;
            width: 100%;
            margin-bottom: 25px;
            border: 1px solid rgba(255, 255, 255, 0.15);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: #ffffff;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
            margin-bottom: 18px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        label {
            font-size: 1rem;
            font-weight: 500;
            color: #ffffff;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 12px 20px;
            border-radius: 25px;
            border: none;
            background: rgba(255, 255, 255, 0.2);
            color: #ffffff;
            font-size: 0.95rem;
            outline: none;
            transition: background 0.3se ease;
        }

        input[type="text"]::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
            cursor: pointer;
        }

        input[type="text"]:focus,
        input[type="date"]:focus {
            background: rgba(255, 255, 255, 0.3);
        }

        .btn-submit {
            width: 100%;
            padding: 14px;
            border-radius: 25px;
            border: none;
            background: #090e28;
            color: #ffffff;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: transform 0.2s, background 0.3s;
            margin-top: 10px;
        }

        .btn-submit:mhover {
            background: #11183c;
            transform: translateY(-2px);
        }

        .task-list {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        .task-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .task-item:last-child {
            border-bottom: none;
        }

        .task-info h3 {
            font-size: 1.15rem;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 4px;
        }

        .task-info p.due-date {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.7);
        }

        .task-info p.description {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.85);
            margin-top: 4px;
        }

        .task-completed .task-info h3 {
            text-decoration: line-through;
            opacity: 0.6;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .btn {
            padding: 8px 22px;
            border-radius: 20px;
            border: none;
            font-size: 0.9rem;
            font-weight: 600;
            color: #ffffff;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.2s, transform 0.1s;
        }

        .btn:hover {
            opacity: 0.9;
            transform: scale(1.03);
        }

        .btn-edit {
            background-color: #4a5568;
        }

        .btn-complete {
            background-color: #10b981;
        }

        .btn-undo {
            background-color: #f59e0b;
        }

        .btn-delete {
            background-color: #ef4444;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(5px);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            background: #1b213b;
            padding: 30px;
            border-radius: 16px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.5);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .close-btn {
            background: none;
            border: none;
            color: #fff;
            font-size: 1.5rem;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="app-title">PERSONAL TASK MANAGER</h1>

    <div class="card">
        <h2 class="card-title">Add New Task</h2>
        
        <form action="{{ route('tasks.store', [], false) }}" method="POST">
            @csrf
            <div class="form-grid">
                <div class="form-group">
                    <label for="title">Task Name</label>
                    <input type="text" id="title" name="title" required placeholder="">
                </div>
                
                <div class="form-group">
                    <label for="due_date">Due Date</label>
                    <input type="date" id="due_date" name="due_date">
                </div>

                <div class="form-group full-width">
                    <label for="description">Description</label>
                    <input type="text" id="description" name="description" placeholder="">
                </div>
            </div>

            <button type="submit" class="btn-submit">Add Task</button>
        </form>
    </div>

    <div class="card">
        <h2 class="card-title">Your Task</h2>

        <div class="task-list">
            @forelse($tasks as $task)
                <div class="task-item {{ $task->is_completed ? 'task-completed' : '' }}">
                    <div class="task-info">
                        <h3>{{ $task->title }}</h3>
                        @if($task->due_date)
                            <p class="due-date">Due: {{ \Carbon\Carbon::parse($task->due_date)->format('F d, Y') }}</p>
                        @endif
                        @if($task->description)
                            <p class="description">{{ $task->description }}</p>
                        @endif>
                    </div>

                    <div class="action-buttons">
                        <button class="btn btn-edit" onclick="openEditModal( {{ $task }})">Edit</button>

                        <form action="{{ route('tasks.complete', $task->id, false) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn {{ $task->is_completed ? 'btn-undo' : 'btn-complete' }}">
                                {{ $task->is_completed ? 'Pending' : 'Completed' }}
                            </button>
                        </form>

                        <form action="{{ route('tasks.destroy', $task->id, false) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p style="color: rgba(255,255,255,0.7); text-align: center;">No tasks added yet.</p>
            @endforelse
        </div>
    </div>
</div>

<div class="modal" id="editModal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Edit Task</h2>
            <button class="close-btn" onclick="closeEditModal()">&times;</button>
        </div>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="edit_title">Task Name</label>
                <input type="text" id="edit_title" name="title" required>
            </div>
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="edit_due_date">Due Date</label>
                <input type="date" id="edit_due_date" name="due_date">
            </div>
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="edit_description">Description</label>
                <input type="text" id="edit_description" name="description">
            </div>
            <button type="submit" class="btn-submit">Save Changes</button>
        </form>
    </div>
</div>

<script>
    function openEditModal(task) {
        const form = document.getElementById('editForm');
        form.action = `/tasks/${task.id}`;
        
        document.getElementById('edit_title').value = task.title;
        document.getElementById('edit_description').value = task.description || '';
        document.getElementById('edit_due_date').value = task.due_date ? task.due_date.split('T')[0] : '';
        
        document.getElementById('editModal').style.display = 'flex';
    }

    function closeEditModal() {
        document.getElementById('editModal').style.display = 'none';
    }

    window.onclick = function(event) {
        const modal = document.getElementById('editModal');
        if (event.target == modal) {
            closeEditModal();
        }
    }
</script>

</body>
</html>
