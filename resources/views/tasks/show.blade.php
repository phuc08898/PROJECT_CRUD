@extends('layouts.app')


@section('content')
<div class="container mt-5">
    <h1 class="text-center">Chi tiết Công Việc</h1>


    <div class="card mt-4">
        <div class="card-body">
            <!-- Tên công việc -->
            <h5 class="card-title">Tên công việc: {{ $task->title }}</h5>
            <span>Mô tả: {{ $task->description }}</span>
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
@endsection

