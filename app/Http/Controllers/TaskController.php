validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);

        Task::create($validated);

        return redirect()->route('tasks.index');
    }

    public function update(Request \(request, Task\)task)
    {
        \(validated =\)request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);

        \(task->update(\)validated);

        return redirect()->route('tasks.index');
    }

    public function toggleComplete(Task $task)
    {
        $task->update([
            'is_completed' => !$task->is_completed,
        ]);

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index');
    }
}
