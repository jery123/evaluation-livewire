

<?php $__env->startSection('content'); ?>

<div>
  <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('tache', [])->html();
} elseif ($_instance->childHasBeenRendered('7f3RZi7')) {
    $componentId = $_instance->getRenderedChildComponentId('7f3RZi7');
    $componentTag = $_instance->getRenderedChildComponentTagName('7f3RZi7');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('7f3RZi7');
} else {
    $response = \Livewire\Livewire::mount('tache', []);
    $html = $response->html();
    $_instance->logRenderedChild('7f3RZi7', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
</div>
 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    window.addEventListener('close-model', event =>{
        $(#TacheModal).modal('hide');
        $(#updateModalLabel).modal('hide');
        $(#DeleteModalLabel).modal('hide');
    
        alert('Name update to:'+event.detail.newName);
    })
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel-Livewire\My_First_Project\resources\views/index.blade.php ENDPATH**/ ?>