@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Danh sách công việc</h2>
                <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Thêm công việc mới
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tiêu đề</th>
                                    <th>Mô tả</th>
                                    <th>Trạng thái</th>
                                    <th style="width: 200px;">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tasks as $task)
                                    <tr>
                                        <td>{{ $task->id }}</td>
                                        <td>{{ $task->title }}</td>
                                        <td>{!! $task->description !!}</td>
                                        <td class="text-center">
                                            <span class="badge {{ $task->completed ? 'bg-success' : 'bg-warning' }}">
                                                {{ $task->completed ? 'Hoàn thành' : 'Đang thực hiện' }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('tasks.edit', $task->id) }}" 
                                                   class="btn btn-info btn-sm text-white">
                                                    <i class="bi bi-pencil"></i> Sửa
                                                </a>
                                                <form action="{{ route('tasks.destroy', $task->id) }}" 
                                                      method="POST" 
                                                      class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="btn btn-danger btn-sm ms-1"
                                                            onclick="return confirm('Bạn có chắc chắn muốn xóa công việc này?')">
                                                        <i class="bi bi-trash"></i> Xóa
                                                    </button>
                                                </form>
                                                <a href="{{ route('tasks.show', $task->id) }}" 
                                                   class="btn btn-primary btn-sm ms-1">
                                                    <i class="bi bi-eye"></i> Chi tiết
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Không có công việc nào.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if(method_exists($tasks, 'links'))
                        <div class="d-flex justify-content-end mt-3">
                            {{ $tasks->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
