<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">Sales Management</div>
                <div class="card-body">
                    <h5 class="card-title">Welcome to the Sales Management Dashboard</h5>
                    <?php if($message = Session::get('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e($message); ?>

                            <a href="<?php echo e(route('orders.order')); ?>" class="btn btn-primary">Open Sale</a>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-info">
                        <a href="<?php echo e(route('orders.order')); ?>" class="btn btn-primary">Open Sale</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/kollawatrupanya/pos-lasted/resources/views/auth/dashboard.blade.php ENDPATH**/ ?>