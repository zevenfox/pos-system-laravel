<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create Member</div>

                <div class="card-body">
                    <form action="<?php echo e(route('members.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="FirstName">First Name:</label>
                            <input type="text" class="form-control" id="FirstName" name="FirstName" required>
                        </div>
                        <div class="form-group">
                            <label for="LastName">Last Name:</label>
                            <input type="text" class="form-control" id="LastName" name="LastName" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/kollawatrupanya/pos-lasted/resources/views/members/create.blade.php ENDPATH**/ ?>