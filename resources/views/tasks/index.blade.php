<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Công Việc</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-5">
        <h2>Danh Sách Công Việc</h2>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Thêm Công Việc</a>    
        <!-- Table để hiển thị danh sách công việc -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tiêu Đề</th>
                    <th>Mô Tả</th>
                    <th>Trạng Thái</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>
                            @if ($task->completed)
                                <span class="badge bg-success">Hoàn Thành</span>
                            @else
                                <span class="badge bg-danger">Chưa Hoàn Thành</span>
                            @endif
                        </td>
                        <td>
                            <!-- Thêm các nút hành động: Sửa, Xóa -->
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-warning btn-sm">Xem chi tiết </a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

       
    </div>

</body>
</html>
