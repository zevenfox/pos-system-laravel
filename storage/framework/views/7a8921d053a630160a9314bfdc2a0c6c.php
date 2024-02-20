<?php $__env->startSection('content'); ?>
    <h1>Payment</h1>
    <p>Total amount to pay: $<?php echo e($totalAmount); ?></p>
    <form method="POST" action="<?php echo e(route('orders.checkMember')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="email">Enter your email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" class="btn btn-primary">Check Membership</button>
        <button type="submit" class="btn btn-primary">Proceed to Payment With Out Membership</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/kollawatrupanya/pos-lasted/resources/views/orders/pay.blade.php ENDPATH**/ ?>