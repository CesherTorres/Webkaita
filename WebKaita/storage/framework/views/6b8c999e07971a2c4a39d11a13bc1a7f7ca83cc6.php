

<?php $__env->startSection('title', 'Productos'); ?>

<?php $__env->startSection('css'); ?>

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
<!-- Demo styles -->
<style>
    .swiper {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;

      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .swiper {
      width: 100%;
      height: 300px;
      margin-left: auto;
      margin-right: auto;
    }

    .swiper-slide {
      background-size: cover;
      background-position: center;
    }

    .mySwiper2 {
      height: 80%;
      width: 100%;
    }

    .mySwiper {
      height: 20%;
      box-sizing: border-box;
      padding: 10px 0;
    }

    .mySwiper .swiper-slide {
      width: 25%;
      height: 100%;
      opacity: 0.4;
    }

    .mySwiper .swiper-slide-thumb-active {
      opacity: 1;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <!-- Encabezado -->
        <div class="row pt-5">
            <div class="col-lg-9">
                <h1 class="text-azul h2 text-uppercase fw-bold mb-0"> Productos</h1>
                <p class="text-muted">Visualizar detalles del producto.</p>
            </div>
        </div>
    <!-- fin encabezado -->
 
    
    <div class="row">
        <div class="col-12 col-md-6">
            <div style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="">Almacen</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="<?php echo e(url('productos')); ?>">Productos</a></li>
                    <li class="breadcrumb-item" aria-current="page"><?php echo e($producto->name); ?></li>
                </ol>
            </div>
        </div>
        <div class="col-12 col-md-6">
        </div>
    </div>
    

    
    <div class="card border-4 borde-top-primary shadow-sm mb-5 py-2">
        <div class="card-body">
            <!-- detalleproductos -->
        <div class="row mb-3">
            <div class="col-12 col-md-4 order-1 order-md-1">
                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="/images/productos/<?php echo e($producto->imagen); ?>" />
                        </div>
                        <?php $__currentLoopData = $producto->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                            <div class="swiper-slide">
                                <img src="<?php echo e($image->url); ?>" />
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="swiper-button-next text-dark"></div>
                    <div class="swiper-button-prev text-dark"></div>
                </div>
                <div thumbsSlider="" class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="/images/productos/<?php echo e($producto->imagen); ?>" />
                        </div>
                        <?php $__currentLoopData = $producto->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide">
                                <img src="<?php echo e($image->url); ?>" />
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8 py-5 py-md-1 pb-md-0 order-3 order-md-2">
                <div class="clearfix mb-3">
                    <h2 class="fw-bold float-start"><?php echo e($producto->name); ?></h2>
                    <div class="float-start float-md-end pt-2 pt-md-0 bg-dark text-white p-1 rounded">
                        <label class="fw-bold">Codigo: </label>
                        <span><?php echo e($producto->codigo); ?></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4">
                        <label class="fw-bold">Marca</label>
                        <p class="fw-normal text-capitalize"><?php echo e($producto->marca->name); ?></p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <label class="fw-bold">Categor??a</label>
                        <p class="fw-normal text-capitalize"><?php echo e($producto->category->name); ?></p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <label class="fw-bold">Unidad de medida</label>
                        <p class="fw-normal text-capitalize"><?php echo e($producto->medida->name.' - '.$producto->medida->abreviatura); ?></p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <label class="fw-bold">Temperatura</label>
                        <p class="fw-normal text-capitalize"><?php echo e($producto->temperatura); ?></p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <label class="fw-bold">Precio</label>
                        <p class="fw-normal text-capitalize">S/. <?php echo e($producto->precio); ?></p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <label class="fw-bold">Fecha de registro</label>
                        <p class="fw-normal text-capitalize"><?php echo e($producto->fecha); ?></p>
                    </div>
                </div>
                <p class="fw-bold">Etiquetas</p>
                <?php $__currentLoopData = $producto->etiquetas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $etiqueta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                    <span class="badge bg-dark mb-3"><?php echo e($etiqueta->name); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <!-- detalles -->
                <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Descripci??n</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Beneficios</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="container">
                            <p><?php echo e($producto->descripcion); ?></p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="container">
                            <p><?php echo e($producto->beneficios); ?></p>
                        </div>
                    </div>
                </div>
                  
                <!-- fin detalles -->
            </div>
            
        </div>
        <!-- fin detalles productos -->
        </div>
    </div>
        
       
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<!-- Swiper JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
      loop: true,
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,
    });
    var swiper2 = new Swiper(".mySwiper2", {
      loop: true,
      spaceBetween: 10,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      thumbs: {
        swiper: swiper,
      },
    });
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('templates.templateDashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Gilberto DS\Documents\GitHub\projectKaita\resources\views/productos/show.blade.php ENDPATH**/ ?>