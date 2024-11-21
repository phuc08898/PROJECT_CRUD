<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <style>
    .dk_contrainer{
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        width: 300px;
        margin: 0 auto;
        position: relative;
       top: 150px;
    }
    form.form-dk {
    display: flex;
    flex-direction: column;
    }
    button {
    background-color: #2b2be3;
    color: white;
    padding: 8px;
    border-radius: 4px;}

    input {
        height: 25px;
       
        border-radius: 4px;
    }
    .register-link {
            text-align: center;
            margin-top: 15px;
            color: #007BFF;
        }
        .register-link a {
            text-decoration: none;
            color: #007BFF;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
</style>
</head>
<body>
   <div class="dk_contrainer">
        <h2>Đăng ký tài khoản</h2>

        <form action="{{ route('register') }}" method="POST" class="form-dk">
            @csrf

            <label for="name">Họ tên</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required><br>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required><br>

            <label for="password">Mật khẩu</label>
            <input type="password" id="password" name="password" required><br>

            <label for="password_confirmation">Xác nhận mật khẩu</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required><br>

            <button type="submit">Đăng ký</button>
            <div class="register-link">
                <p>bạn  có tài khoản <a href="/login">đăng nhập</a></p>
            </div>
        </form>
   </div>
</body>
</html>
