<?php $__env->startSection('content'); ?>
    <h1>Add Sale Line Item</h1>
    <form class="mb-4" method="POST" action="<?php echo e(route('orders.addItem')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-row align-items-center">
            <div class="col-auto">
                <label for="item_id" class="sr-only">Select Item:</label>
                <select name="item_id" id="item_id" class="form-control">
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['item_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-auto">
                <label for="quantity" class="sr-only">Quantity:</label>
                <input class="form-control" type="number" name="quantity" id="quantity" min="1" value="<?php echo e(old('quantity')); ?>" required>
                <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="col-auto pt-2">
                <button type="submit" class="btn btn-primary">Add Line Item</button>
            </div>
        </div>
    </form>

    <!-- Display sale details, member information, total price, etc. -->

    <?php if($sale && $sale->items->count() > 0): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $totalAmount = 0;
                ?>
                <?php $__currentLoopData = $sale->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $itemAmount = $item->price * $item->pivot->quantity;
                        $totalAmount += $itemAmount;
                    ?>
                    <tr>
                        <td><?php echo e($item->id); ?></td>
                        <td><?php echo e($item->name); ?></td>
                        <td><?php echo e($item->pivot->quantity); ?></td>
                        <td>$<?php echo e($item->price); ?></td>
                        <td>$<?php echo e($itemAmount); ?></td>
                        <td>
                    </form>
                    <form method="POST" action="<?php echo e(route('orders.removeItem', $item->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td colspan="4" class="text-right">Total:</td>
                <td>$<?php echo e($totalAmount); ?></td>
            </tr>
        </tbody>
    </table>
    <form method="POST" action="<?php echo e(route('orders.pay')); ?>">
        <?php echo csrf_field(); ?>
        <button type="submit" class="btn btn-primary">Proceed to Payment</button>
    </form>

<?php else: ?>
    <p>No sale line items added yet.</p>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/kollawatrupanya/pos-lasted/resources/views/orders/order.blade.php ENDPATH**/ ?>