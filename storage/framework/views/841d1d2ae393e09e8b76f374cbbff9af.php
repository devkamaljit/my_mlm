<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
        
        <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/feather/feather.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/mdi/css/materialdesignicons.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/ti-icons/css/themify-icons.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/typicons/typicons.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/simple-line-icons/css/simple-line-icons.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/css/vendor.bundle.base.css')); ?>">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="<?php echo e(asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('assets/js/select.dataTables.min.css')); ?>">
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="<?php echo e(asset('assets/css/vertical-layout-light/style.css')); ?>">
        <!-- endinject -->
        <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.png')); ?>" />
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Page Heading -->
            <?php if(isset($header)): ?>
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <?php echo e($header); ?>

                    </div>
                </header>
            <?php endif; ?>

            <!-- Page Content -->
            <main>
                <?php echo e($slot); ?>

            </main>
        </div>
        <script src="<?php echo e(asset('assets/vendors/js/vendor.bundle.base.js')); ?>"></script>

        <script src="<?php echo e(asset('assets/vendors/chart.js/Chart.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/vendors/progressbar.js/progressbar.min.js')); ?>"></script>

        <script src="<?php echo e(asset('assets/js/off-canvas.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/hoverable-collapse.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/template.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/settings.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/todolist.js')); ?>"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="<?php echo e(asset('assets/js/jquery.cookie.js" type="text/javascript')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/dashboard.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/Chart.roundedBarCharts.js')); ?>"></script>
    </body>
</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/projects/mlm/p3/resources/views/layouts/appa.blade.php ENDPATH**/ ?>