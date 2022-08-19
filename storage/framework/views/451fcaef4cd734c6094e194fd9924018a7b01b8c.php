<?php $__env->startSection('content'); ?>

<div>
  <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('tache', [])->html();
} elseif ($_instance->childHasBeenRendered('NOMfte1')) {
    $componentId = $_instance->getRenderedChildComponentId('NOMfte1');
    $componentTag = $_instance->getRenderedChildComponentTagName('NOMfte1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('NOMfte1');
} else {
    $response = \Livewire\Livewire::mount('tache', []);
    $html = $response->html();
    $_instance->logRenderedChild('NOMfte1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
</div>
 
<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Laravel-Livewire\My_First_Project\resources\views/home.blade.php ENDPATH**/ ?>