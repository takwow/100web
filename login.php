<?php
require_once 'config.php';

// اگر کاربر قبلاً وارد شده، به داشبورد هدایت شود
if(isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit();
}

// پردازش فرم ورود
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // کاربر پیش‌فرض (در حالت واقعی از دیتابیس چک میشه)
    $default_user = 'admin';
    $default_pass = 'admin123'; // در مرحله نصب تغییر بدید!
    
    if($username == $default_user && $password == $default_pass) {
        $_SESSION['user_id'] = 1;
        $_SESSION['user_name'] = 'مدیر سیستم';
        $_SESSION['user_role'] = 'admin';
        
        header('Location: dashboard.php');
        exit();
    } else {
        $error = "نام کاربری یا رمز عبور اشتباه است";
    }
}
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود به سیستم مدیریت باشگاه</title>
    
    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Vazirmatn Font -->
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazirmatn@v33.003/Vazirmatn-font-face.css" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Vazirmatn', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .login-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
            padding: 40px;
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .login-header i {
            font-size: 3rem;
            color: #667eea;
            margin-bottom: 15px;
        }
        
        .login-header h2 {
            color: #333;
            font-weight: 700;
        }
        
        .login-header p {
            color: #666;
            margin-top: 10px;
        }
        
        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 10px;
            width: 100%;
            font-weight: 600;
            margin-top: 10px;
        }
        
        .error-message {
            background-color: #ffeaea;
            color: #e74c3c;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-header">
            <i class="fas fa-dumbbell"></i>
            <h2>سیستم مدیریت باشگاه</h2>
            <p>لطفاً برای ادامه وارد شوید</p>
        </div>
        
        <?php if(isset($error)): ?>
            <div class="error-message">
                <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="mb-3">
                <label for="username" class="form-label">نام کاربری</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" class="form-control" id="username" name="username" 
                           placeholder="admin" required>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">رمز عبور</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" class="form-control" id="password" name="password" 
                           placeholder="admin123" required>
                </div>
            </div>
            
            <button type="submit" class="btn btn-login">
                <i class="fas fa-sign-in-alt"></i> ورود به سیستم
            </button>
        </form>
        
        <div class="text-center mt-4">
            <small class="text-muted">ورژن 1.0 - © 1403</small>
        </div>
    </div>
    
    <script>
        // فوکوس روی فیلد نام کاربری
        document.getElementById('username').focus();
    </script>
</body>
</html>
