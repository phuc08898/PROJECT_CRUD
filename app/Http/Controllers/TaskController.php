<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{
    // hiện thị danh sách công việc 
    public function index(){
        $tasks = Task::all();// lấy ra tất cả dữ liệu công việc 
        return view('tasks.index', compact('tasks')); // Trả về view với danh sách công việc
    }
    // hiện tại form tạo công việc 
    public function create(){
        return view('tasks.create'); 
    }
    // lưu công việc mới 
    public function store(Request $request){
        //kiêm tra req của người dùng 
        $request->validate(
            [
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
            ]);
        // lưu vào databasse 
        Task::create([
            'title' => $request -> title,
            'description' => $request -> description,
        ]);
        return redirect() -> route('tasks.index');
    }
    // hiển thị page chi tiết 
    public function show($id)
    {
    // Tìm công việc dựa trên ID. Nếu không tìm thấy, trả về lỗi 404
        $task = Task::findOrFail($id);

        // Trả về view 'tasks.show' và truyền dữ liệu của công việc
        return view('tasks.show', compact('task'));
    }
    // hiện thị forn chỉnh sửa 
    public function edit($id){
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }
    // xử lý capapj nhật chỉnh sửa logic 
    public function update(Request $request, $id)
    {
        // Tìm công việc theo ID
        $task = Task::findOrFail($id);
    
        // Xác thực dữ liệu
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
    
        // Cập nhật thông tin
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->save();
    
        // Chuyển hướng về danh sách công việc kèm thông báo
        return redirect()->route('tasks.index')->with('success', 'Công việc đã được cập nhật.');
    }
    

    public function destroy($id){
        $task = Task::findOrFail($id);
        $task -> delete();
        return redirect() -> route('tasks.index');
    }
}
