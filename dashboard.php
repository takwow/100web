<?php
require_once 'config.php';

// بررسی لاگین بودن کاربر
if(!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$page_title = "داشبورد مدیریت";
require_once 'includes/header.php';

// در اینجا کدهای آماری و گزارشات قرار می‌گیرد
// فعلاً یک نسخه ساده نمایش می‌دیم
?>
<div class="container-fluid">
    <div class="page-header">
        <h1><i class="fas fa-tachometer-alt"></i> داشبورد مدیریت</h1>
        <p class="lead">خوش آمدید، <?php echo $_SESSION['user_name']; ?>!</p>
    </div>
    
    <div class="row">
        <!-- آمارهای کلی -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary mb-1">کل اعضا</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="total-members">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success mb-1">مربیان</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="total-coaches">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info mb-1">کلاس‌های فعال</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="active-classes">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chalkboard-teacher fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning mb-1">درآمد امروز</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="today-income">0 تومان</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-credit-card fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- عملیات سریع -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary text-white">
                    <h6 class="m-0 font-weight-bold">عملیات سریع</h6>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-3 mb-3">
                            <a href="add_member.php" class="btn btn-primary btn-lg w-100 py-3">
                                <i class="fas fa-user-plus fa-2x mb-2"></i><br>
                                افزودن عضو جدید
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="add_payment.php" class="btn btn-success btn-lg w-100 py-3">
                                <i class="fas fa-credit-card fa-2x mb-2"></i><br>
                                ثبت پرداخت
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="add_attendance.php" class="btn btn-info btn-lg w-100 py-3">
                                <i class="fas fa-clipboard-check fa-2x mb-2"></i><br>
                                ثبت حضور
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="reports.php" class="btn btn-warning btn-lg w-100 py-3">
                                <i class="fas fa-chart-bar fa-2x mb-2"></i><br>
                                گزارش‌ها
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- راهنمای شروع -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-header bg-info text-white">
                    <h6 class="m-0 font-weight-bold">راهنمای شروع</h6>
                </div>
                <div class="card-body">
                    <ol>
                        <li>اولین عضو جدید را اضافه کنید</li>
                        <li>مربیان باشگاه را ثبت کنید</li>
                        <li>کلاس‌های ورزشی ایجاد کنید</li>
                        <li>اعضا را در کلاس‌ها ثبت‌نام کنید</li>
                        <li>پرداخت‌ها را ثبت و مدیریت کنید</li>
                    </ol>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h6 class="m-0 font-weight-bold">وضعیت سیستم</h6>
                </div>
                <div class="card-body">
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i> سیستم آماده بهره‌برداری است
                    </div>
                    <p>برای شروع کار از منوی سمت راست یا عملیات سریع استفاده کنید.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
