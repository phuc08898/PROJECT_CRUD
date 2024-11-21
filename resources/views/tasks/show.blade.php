<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết công việc</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Chi tiết Công Việc</h1>

        <div class="card mt-4">
            <div class="card-body">
                <!-- Tên công việc -->
                <h5 class="card-title">Tên công việc: {{ $task->title }}</h5>
                <span>mô tả:    {{ $task->description }}</span>
                <!-- Trạng thái -->
                <p class="card-text">
                    Trạng thái:
                    @if ($task->completed)
                        <span class="badge bg-success">Hoàn Thành</span>
                    @else
                        <span class="badge bg-danger">Chưa Hoàn Thành</span>
                    @endif
                </p>

                <!-- Ngày tạo -->
                <p class="card-text">Ngày tạo: {{ $task->created_at->format('d/m/Y H:i') }}</p>

                <!-- Ngày cập nhật -->
                <p class="card-text">Ngày cập nhật: {{ $task->updated_at->format('d/m/Y H:i') }}</p>

                <!-- Nút quay lại -->
                <a href="{{ route('tasks.index') }}" class="btn btn-primary">Quay lại danh sách</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
