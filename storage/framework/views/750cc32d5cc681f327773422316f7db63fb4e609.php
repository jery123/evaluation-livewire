<div>
    <?php echo $__env->make('livewire.AjoutTache', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php if(session()->has('message')): ?>
            <h5 class="alert alert-success"><?php echo e(session('message')); ?></h5>

            <?php endif; ?>
            <div class="card">
                <div class="card-header">
                    <h4 class="text-align-center">Taches en cours
                        <button type="button" class="btn btn-primary float-end mb-1" data-bs-toggle="modal" data-bs-target="#TacheModal">
                            Add New Task
                        </button>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-dahbord table-striped">
                        <thead>
                            <tr>
                                <th>Statut</th>
                                <th>Date debut</th>
                                <th>Date fin</th>
                                <th>Taches</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $taches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tache): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                <tr>
                                   
                                    <td>
                                        <input value="<?php echo e(!$tache->statut); ?>" disabled="disabled" class="toggle-class" id="toggle_class" type="checkbox" <?php echo e($tache->statut==false? 'checked':''); ?>>
                                        
                                    </td>
                                    <td><?php echo e($tache->date_debut); ?></td>
                                    <td><?php echo e($tache->date_fin); ?></td>
                                    <td><?php echo e($tache->tach); ?></td>
                                    <td>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#updateTacheModal" wire:click="editTache(<?php echo e($tache->id); ?>)"  class="btn btn-primary btn-sm mb-2">Edit</a>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#DeleteTacheModal" wire:click="deleteTache(<?php echo e($tache->id); ?>)"  class="btn btn-danger btn-sm">Delete</a>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#CloseTacheModal" wire:click="CloseTache(<?php echo e($tache->id); ?>)"  class="btn btn-primary btn-sm mb-2">close</a>
                                    </td>
                                </tr>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                            <tr>
                                <td colspan="5">
                                    No record Found
                                </td>
                            </tr>


                            <?php endif; ?>


                        </tbody>
                    </table> 
                    <div>
                     <?php echo e($taches->links()); ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

<?php /**PATH C:\Laravel-Livewire\My_First_Project\resources\views/livewire/tache.blade.php ENDPATH**/ ?>