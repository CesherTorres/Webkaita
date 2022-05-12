<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/kaitaStyle.css">
    <title>Kaita | Iniciar Sesión</title>
    <link rel="icon" href="/images/KAITA 3.png">
</head>
<style>
    .bg-login{
    background-image: url(/images/fondo-kaita.png); 
    background-size: 100% 100%;
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
 } 

 .texto{
     position: relative;
 }
</style>
<body class="bg-login">
    <div class="w-100 vh-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-xl-7 my-3 d-none d-lg-block">
                    <div class="text-center">
                        <img src="svg/login.svg" class="pb-3" width="500" alt="">
                        <h1 class="text-white fw-bold">¡Bienvenido!</h1>
                    <span class="text-white fw-bold fs-5">Hoy es buen día para empezar con salud, belleza natural y prevención...</span>
                    </div>
                </div>
                <div class="col-12 col-xl-5 my-3">
                    <div class="card py-2 shadow p-3">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="images/KAITA 2.png" class="pb-3" width="80" alt="">
                                <h3 class="fw-bold">Iniciar Sesión</h3>
                            </div>
                            <span class="fw-light">por favor inicie sesión en su cuenta</span>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.validation-errors','data' => ['class' => 'mb-1 text-danger']]); ?>
<?php $component->withName('jet-validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'mb-1 text-danger']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <form action="<?php echo e(route('login')); ?>" method="POST" autocomplete="off">
                                <?php echo csrf_field(); ?>
                                <div class="pt-2">
                                    <label for="email_id">Correo electrónico</label>
                                    <input type="email" name="email" :value="old('email')" class="form-control form-control-sm" aria-describedby="emailHelp">
                                    <div id="emailHelp" class="form-text">Utilice su correo registrado en el sistema.</div>
                                </div>

                                <div class="pt-2">
                                    <label for="email_id">Contraseña</label>
                                    <input type="password" name="password" class="form-control form-control-sm">
                                </div>

                                

                                <div class="pt-4">
                                    <button type="submit" class="btn btn-primary w-100 text-white fw-bold">Iniciar Sesión</button>
                                </div>

                                <div class="pt-2 text-center">
                                    <small>Copyright © <?php echo date("Y");?>  <a href="https://kaita.com/" class="text-decoration-none text-primary fw-bold" target="bank">Kaita</a> - Todos los derechos reservados</small>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\Users\Gilberto DS\Documents\GitHub\projectKaita\resources\views/auth/login.blade.php ENDPATH**/ ?>