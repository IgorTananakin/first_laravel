<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tasks App</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="navbar navbar-expand-sm">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="<?php echo e(url('/')); ?>" class="nav-link">Главная</a>
                </li>

                <?php if(Auth::check()): ?>
                <li class="nav-item">
                    <a href="<?php echo e(url('/status')); ?>" class="nav-link">Статусы</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('/groups')); ?>" class="nav-link">Группы</a>
                </li>
                <?php endif; ?>
            </ul>

            <ul class="navbar-nav ml-auto">
            <?php if(Auth::check()): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        <?php echo e(Auth::user()->name); ?>

                    </a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Выход
                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display:none;">
                            <?php echo e(csrf_field()); ?>

                        </form>
                    </div>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a href="<?php echo e(url('register')); ?>" class="nav-link btn btn-outline-primary btn-sm px-4 mr-2">
                        Регистрация
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('login')); ?>" class="nav-link btn btn-outline-dark btn-sm px-4">
                        Войти
                    </a>
                </li>
            <?php endif; ?>
            </ul>
        </div>
    </div>

    <?php echo $__env->yieldContent('content'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<script src="<?php echo e(asset(url('js/scripts.js'))); ?>"></script>

</body>
</html>