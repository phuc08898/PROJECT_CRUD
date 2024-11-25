<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // Hiển thị danh sách công việc
    public function index()
    {
        $tasks = Task::all(); // Lấy tất cả công việc
        return view('tasks.index', compact('tasks')); // Trả về view với danh sách công việc
    }

    // Hiển thị form tạo công việc
    public function create()
    {
        return view('tasks.create'); // Trả về form tạo
    }

    // Lưu công việc mới
    public function store(Request $request)
    {
        // Xác thực dữ liệu
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Tạo công việc mới
        Task::create($validated);

        // Redirect với thông báo thành công
        return redirect()->route('tasks.index')
            ->with('success', 'Công việc đã được tạo thành công.');
    }

    // Hiển thị chi tiết công việc
    public function show($id)
    {
        $task = Task::findOrFail($id); // Tìm công việc theo ID
        return view('tasks.show', compact('task')); // Trả về view chi tiết
    }

    // Hiển thị form chỉnh sửa công việc
    public function edit($id)
    {
        $task = Task::findOrFail($id); // Tìm công việc theo ID
        return view('tasks.edit', compact('task')); // Trả về form chỉnh sửa
    }

    // Xử lý cập nhật công việc
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        // Xác thực dữ liệu
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Cập nhật công việc
        $task->update($validated);

        // Redirect với thông báo thành công
        return redirect()->route('tasks.index')
            ->with('success', 'Công việc đã được cập nhật thành công.');
    }

    // Xóa công việc
    public function destroy($id)
    {
        $task = Task::findOrFail($id); // Tìm công việc theo ID
        $task->delete(); // Xóa công việc

        // Trả về JSON nếu là request AJAX
        if (request()->ajax()) {
            return response()->json(['message' => 'Task deleted successfully'], 200);
        }

        // Chuyển hướng về danh sách công việc
        return redirect()->route('tasks.index')->with('success', 'Công việc đã được xóa.');
    }

    // Hiển thị thống kê
    public function stats()
    {
        $totalTasks = Task::count();
        $completedTasks = Task::where('completed', true)->count();
        $pendingTasks = Task::where('completed', false)->count();
        
        return view('tasks.stats', compact('totalTasks', 'completedTasks', 'pendingTasks'));
    }
}
