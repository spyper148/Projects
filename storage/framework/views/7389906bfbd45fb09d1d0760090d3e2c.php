<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <?php echo $__env->yieldContent('style'); ?>
    <title><?php echo $__env->yieldContent('title'); ?></title>
</head>
<body>
<header class="header">
    <div class="header-content">
        <img class="logo-size" alt="Крупская Турбаза в Хакасии" src="<?php echo e(asset('image/Logo_name.svg')); ?>">
        <a class="light font-black header-text">+7 (909) 502 90 00</a>
        <a class="light font-black header-text">ПОСЕЛОК, ИМ. КРУПСКОЙ, УЛ. ВОКЗАЛЬНАЯ, Д. 1</a>
        <div class="menu" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
            <a class="light font-black menu-text" >МЕНЮ</a>
            <img  src="<?php echo e(asset('image/icons/menu_black.svg')); ?>" alt="Иконка меню">
        </div>
    </div>

</header>
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title h3 font-green light font-uppercace" id="offcanvasWithBothOptionsLabel">Меню</h5>
        <button type="button" class="btn-close text-reset font-green" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
    </div>
    <div class="offcanvas-body column">
        <a class="p light font-black font-uppercace" href="<?php echo e(route('houses')); ?>">Домики</a>
        <a class="p light font-black font-uppercace" href="<?php echo e(route('services')); ?>">Услуги</a>
        <a class="p light font-black font-uppercace" href="<?php echo e(route('comments')); ?>">Отзывы</a>
        <a class="p light font-black font-uppercace" href="<?php echo e(route('contacts')); ?>">Контакты</a>
        <?php if(auth()->guard()->guest()): ?>
            <a class="p light font-black font-uppercace" data-bs-toggle="modal" data-bs-target="#auth" >Личный кабинет</a>
        <?php endif; ?>
        <?php if(auth()->guard()->check()): ?>
            <a class="p light font-black font-uppercace" href="<?php echo e(route('profile')); ?>">Личный кабинет</a>
        <?php endif; ?>


    </div>
</div>

<div class="modal modal-lg fade" id="auth" tabindex="-1" aria-labelledby="auth" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2 class="h2 font-green bold">Авторизация</h2>
                <form class="form-auth" action="<?php echo e(route('login')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="input-group">
                        <input required name="loginauth" type="text" placeholder="Номер телефона / Электронная почта">
                        <input required name="passwordauth" type="password" placeholder="Пароль">
                    </div>
                    <button type="submit" class="button modal-btn font-uppercace">Войти</button>
                </form>
                <a class="p light font-green" data-bs-toggle="modal" data-bs-target="#register">Нет аккаунта? Зарегистрироваться</a>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-lg fade" id="register" tabindex="-1" aria-labelledby="register" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2 class="h2 font-green bold">Регистрация</h2>
                <form class="form-auth form-validate" action="<?php echo e(route('register')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="input-group">
                        <input required name="name" id="name" type="text" placeholder="Имя">
                        <span class="p light font-gray failSpan" id="nameFail"></span>
                        <input required name="surname" id="surname" type="text" placeholder="Фамилия">
                        <span class="p light font-gray failSpan" id="surnameFail"></span>
                        <input required name="tel" id="tel" type="tel" placeholder="Номер телефона">
                        <span class="p light font-gray failSpan" id="telFail"></span>
                        <input required name="email" id="email" type="email" placeholder="Электронная почта">
                        <input required name="password" id="password" type="password" placeholder="Пароль">
                        <span class="p light font-gray failSpan" id="passwordFail"></span>
                        <input required name="rep_password" type="password" id="rep_password" placeholder="Повторите пароль">
                        <span class="p light font-gray failSpan" id="repPasswordFail"></span>
                    </div>
                    <div style="display: flex; flex-direction: row; align-items: center; gap: 12px">
                        <input required type="checkbox" class="checkbox" id="checkbox">
                        <label class="form-check-label p light font-gray" for="checkbox">Согласие на обработку персональных данных</label>
                    </div>

                    <button type="submit" class="button modal-btn font-uppercace">Зарегистрироваться</button>
                </form>
                <a class="p light font-green" data-bs-toggle="modal" data-bs-target="#auth">Есть аккаунт? Авторизоваться</a>
            </div>
        </div>
    </div>
</div>
<?php echo $__env->yieldContent('content'); ?>

<footer>
    <div class="footer">
        <div class="footer-row">
            <div class="footer-col">
                <div class="foot-row">
                    <div class="footer-col">
                        <img class="footer-img" alt="Логотип" src="<?php echo e(asset('image/Logo_green.svg')); ?>">
                    </div>
                    <div class="footer-col">
                        <p class="text font-uppercace bold font-black">ООО “ААЛЛАС”</p>
                        <p class="text font-uppercace bold font-black">ОГРН: 1161901050904</p>
                        <p class="text font-uppercace bold font-black">ИНН: 1901129107</p>
                    </div>
                </div>
            </div>
            <div class="footer-col">
                <p class="light font-black footer-text">ПОСЕЛОК, ИМ. КРУПСКОЙ, УЛ. ВОКЗАЛЬНАЯ, Д. 1</p>
            </div>
            <div class="footer-col">
                <p class="light font-black footer-text">+7 (909) 502 90 00</p>
                <div class="links">
                    <a href="https://vk.com/turbazakrupskaya ">
                        <img class="links-logo" src="<?php echo e(asset('image/icons/vk_logo.svg')); ?>">
                    <a href="https://vk.com/turbazakrupskaya " class="p light font-black font-uppercace">vk</a>
                    </a>
                </div>
            </div>
        </div>
        <div class="foot-row">
            <p class="text bold font-gray font-uppercace">Все права защищены 2024</p>
            <p class="text bold font-gray font-uppercace">Политика конфиденциальности</p>
        </div>
    </div>
</footer>

</body>
<?php echo $__env->yieldContent('script'); ?>
<script type="text/javascript" src="<?php echo e(asset('js/register_validation.js')); ?>"></script>
</html>
<?php /**PATH /var/www/html/resources/views/layout.blade.php ENDPATH**/ ?>