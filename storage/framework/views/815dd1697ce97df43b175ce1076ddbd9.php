

<?php $__env->startSection('title'); ?>
<?php echo app('translator')->get('Edit Cake'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startComponent('components.alert'); ?><?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('components.breadcrumb'); ?>
<?php $__env->slot('title'); ?> Edit Cake <?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>

<div class="row">
    <div class="card">
        <div class="card-body">

            <form id="form" data-parsley-validate class="form-horizontal custom-validation" method="POST" action="<?php echo e(route('cake.update')); ?>" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?> 
                <?php echo method_field('PATCH'); ?>

                <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                    <img id="frame" style="border: 1px solid" class="rounded me-2" width="200"  name="default" alt="<?php echo e($cake->image_name); ?>" src="<?php echo e(asset('storage/'.$cake->image_path)); ?>" data-holder-rendered="true">
                        <br/><br/>
                        <div class="flex-grow-1 ">
                            <span class="text-danger">*</span>
                            <br>
                            <label>Please upload an image of the cake</label>
                            <div class="col-md-7">
                                <label class="input-group-text"  for="cake_img">Choose An Image</label> 
                                <input class="form-control" type="file" id="cake_img" value="<?php echo e(old('cake_img')); ?>"
                                    name="cake_img" style="display: none;"  
                                    data-parsley-filemaxmegabytes="2" onchange="preview()"
                                    data-parsley-fileextension='png|jpeg|jpg' data-parsley-fileextension-message="* <?php echo e(Config::get('validationMessage.cake.cake_img.required')); ?>"
                                    data-parsley-filemaxmegabytes-message="* <?php echo e(Config::get('validationMessage.cake.cake_img.filemaxmegabytes')); ?>" 
                                    data-parsley-trigger="change" data-parsley-filemimetypes="image/jpeg, image/jpg, image/png" 
                                    data-parsley-filemimetypes-message="* <?php echo e(Config::get('validationMessage.cake.cake_img.filemimetypes')); ?>">   
                            </div>
                        </div>
                    </div>
                </div>
                
                <br/>

                <input name="cake_id" type="hidden" class="form-control" id="cake_id" value="<?php echo e($cake->id); ?>">

                <div class="row mb-2">
                    <label for="name" class="col-md-2 col-form-label control-label">Cake Name</label>
                    <div class="col-md-10">
                        <input name="name" type="text" class="form-control" id="name" value="<?php echo e($cake->name); ?>"
                        required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.cake.name.required')); ?>" data-parsley-trigger="keyup">
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="description" class="col-md-2 col-form-label control-label">Description</label>
                    <div class="col-md-10">                   
                        <textarea class="form-control" name="description" rows="3"
                        required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.cake.description.required')); ?>" data-parsley-trigger="keyup"><?php echo e($cake->description); ?></textarea>
                    </div>
                </div>
                
                <div class="mb-2 row">
                    <label for="cake_shape" class="col-md-2 col-form-label control-label">Cake Shape</label>
                    <div class="col-md-10">
                        <select class="form-select select2" id="cake_shape" name="cake_shape"
                        required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.cake.shape.required')); ?>" data-parsley-trigger="change"
                        data-parsley-errors-container="#errorContainer1">
                            <option value="" data-price="0">-- Select --</option>
                            <?php $__currentLoopData = $shape; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->id); ?>" data-price="<?php echo e($data->price); ?>" <?php echo e((old('cake_shape', $cake->shape_id) == $data->id) ? 'selected' : ''); ?>><?php echo e($data->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <div id="errorContainer1"></div>
                    </div>
                </div>

                <div class="mb-2 row">
                    <label for="cake_flavour" class="col-md-2 col-form-label control-label">Cake Flavour</label>
                    <div class="col-md-10">
                        <select class="form-select select2" id="cake_flavour" name="cake_flavour"
                        required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.cake.flavour.required')); ?>" data-parsley-trigger="change"
                        data-parsley-errors-container="#errorContainer2">
                            <option value="" data-price="0">-- Select --</option>
                            <?php $__currentLoopData = $flavour; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->id); ?>" data-price="<?php echo e($data->price); ?>" <?php echo e((old('cake_flavour', $cake->flavour_id) == $data->id) ? 'selected' : ''); ?>><?php echo e($data->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <div id="errorContainer2"></div>
                    </div>
                </div>

                <div class="mb-2 row">
                    <label for="cake_cream" class="col-md-2 col-form-label control-label">Cream Flavour</label>
                    <div class="col-md-10">
                        <select class="form-select select2" id="cake_cream" name="cake_cream"
                        required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.cake.cream.required')); ?>" data-parsley-trigger="change"
                        data-parsley-errors-container="#errorContainer3">
                            <option value="" data-price="0">-- Select --</option>
                            <?php $__currentLoopData = $cream; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->id); ?>" data-price="<?php echo e($data->price); ?>"<?php echo e((old('cake_cream', $cake->cream_id) == $data->id) ? 'selected' : ''); ?>><?php echo e($data->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <div id="errorContainer3"></div>
                    </div>
                </div>

                <div class="mb-2 row">
                    <label for="cake_size" class="col-md-2 col-form-label control-label">Cake Size</label>
                    <div class="col-md-10">
                        <select class="form-select select2" id="cake_size" name="cake_size"
                        required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.cake.size.required')); ?>" data-parsley-trigger="change"
                        data-parsley-errors-container="#errorContainer4">
                            <option value="" data-price="0">-- Select --</option>
                            <?php $__currentLoopData = $size; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->id); ?>" data-price="<?php echo e($data->price); ?>"<?php echo e((old('cake_size', $cake->size_id) == $data->id) ? 'selected' : ''); ?>><?php echo e($data->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <div id="errorContainer4"></div>
                    </div>
                </div>

                <div class="mb-2 row">
                    <label for="cake_tier" class="col-md-2 col-form-label control-label">No. of Tier</label>
                    <div class="col-md-10">
                        <select class="form-select select2" id="cake_tier" name="cake_tier"
                        required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.cake.tier.required')); ?>" data-parsley-trigger="change"
                        data-parsley-errors-container="#errorContainer5">
                            <option value="" data-price="0">-- Select --</option>
                            <?php $__currentLoopData = $tier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->id); ?>" data-price="<?php echo e($data->price); ?>" <?php echo e((old('cake_tier', $cake->tier_id) == $data->id) ? 'selected' : ''); ?>><?php echo e($data->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <div id="errorContainer5"></div>
                    </div>
                </div>

                <div class="mb-2 row">
                    <label for="cake_deco" class="col-md-2 col-form-label control-label">Decoration</label>
                    <div class="col-md-10">
                        <select class="form-select select2" id="cake_deco" name="cake_deco"
                        required data-parsley-required-message="* <?php echo e(Config::get('validationMessage.cake.deco.required')); ?>" data-parsley-trigger="change"
                        data-parsley-errors-container="#errorContainer6">
                            <option value="" data-price="0">-- Select --</option>
                            <?php $__currentLoopData = $deco; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($data->id); ?>" data-price="<?php echo e($data->price); ?>" <?php echo e((old('cake_deco', $cake->deco_id) == $data->id) ? 'selected' : ''); ?>><?php echo e($data->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <div id="errorContainer6"></div>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="price" class="col-md-2 col-form-label control-label">Estimated Price (RM)</label>
                    <div class="col-md-10">
                        <input name="total_price" type="number" class="form-control" id="total_price" step="0.01" readonly>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary float-end swal-save"><?php echo app('translator')->get('button.save'); ?></button>
                        <a class="btn btn-danger float-end me-2 swal-delete"><?php echo app('translator')->get('button.delete'); ?></a>
                        <a href="<?php echo e(route('cake.view', ['cake_id'=> $cake->id])); ?>" class="btn btn-secondary float-end me-2"><?php echo app('translator')->get('button.back'); ?></a>
                    </div>
                </div>

            </form>

            <form id="delete-form" method="POST" action="<?php echo e(route('cake.delete')); ?>">
                <?php echo e(csrf_field()); ?> 
                <?php echo e(method_field('DELETE')); ?>

                <input name="cake_id" type="hidden" class="form-control" id="cake_id" value="<?php echo e($cake->id); ?>">
            </form>

        </div>
    </div>
</div>
<!-- end row -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('build/libs/select2/js/select2.min.js')); ?>"></script>
<!-- form advanced init -->
<script src="<?php echo e(URL::asset('/build/js/pages/form-advanced.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/build/js/pages/Cake/editForm.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\user\Documents\GitHub\IresymaBakerySystem\resources\views/Cake/edit.blade.php ENDPATH**/ ?>