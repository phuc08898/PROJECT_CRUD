<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/css/bootstrap.min.css">
    <style>
        .crete-cv {
            width: 60%;
            background-color: #cccc;
            margin: 48px auto;
            padding: 100px;
        }
        .input-cv{
            width: 100%;
            height: 37px;
            margin-bottom: 13px;
            border: 0;
            border-radius: 2px;
        }
        .btn-all{
            display: flex;
            justify-content: space-between;
        }
        .btn-red{
            color:red
        }
        
    </style>
</head>
<body>
<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <div class="crete-cv">
        <div>
            <input class="input-cv" type="text"  name="title" placeholder="Tiêu đề công việc" required>
        </div>
        <div >
            <textarea class="input-cv" name="description" placeholder="Mô tả công việc"></textarea>
        </div>
        <div class="btn-all">
            <button type="submit" class="btn btn btn-primary ">Thêm công việc</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-red">Quay lại danh sách</a>
        </div>

    </div>
    
</form>

</body>
</html>