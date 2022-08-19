<!-- <div wire:ignore.self class="modal fade" id="TacheModal" tabindex="-1" aria-labelledby="TacheModalLabel" aria-hidden="true">


</div> -->


<!--updateModal -->
<div wire:ignore.self class="modal fade" id="updateTacheModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalLabel">Edit Task</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
            <form wire:submit.prevent="updateTaches">
                <div class="modal-body">

                    <div class="mb-3">
                        <label>Date debut</label>
                        <input type="datetime-local" wire:model="date_debut" class="form-control">
                        @error('date_debut')<span class="text-danger">{{$message}}</span> @enderror
                    </div>
                       
                    <div class="mb-3">
                        <label>Date fin</label>
                        <input type="datetime-local" wire:model="date_fin" class="form-control">
                        @error('date_fin')<span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class=mb-3>
                        <label>Tache</label>
                        <input type="text" wire:model="tach" class="form-control">
                        @error('tach')<span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    
                      
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
      </div>
   </div>
</div>


<!--AjouterModal -->
<div wire:ignore.self class="modal fade" id="TacheModal" tabindex="-1" aria-labelledby="TacheModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TacheModalLabel">Create Task</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
            <form wire:submit.prevent="SaveTaches">
                <div class="modal-body">

                    <div class="mb-3">
                        <label>Date debut</label>
                        <input type="datetime-local" wire:model="date_debut" class="form-control">
                        @error('date_debut')<span class="text-danger">{{$message}}</span> @enderror
                    </div>
                       
                    <div class="mb-3">
                        <label>Date fin</label>
                        <input type="datetime-local" wire:model="date_fin" class="form-control">
                        @error('date_fin')<span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class=mb-3>
                        <label>Tache</label>
                        <input type="text" wire:model="tach" class="form-control">
                        @error('tach')<span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    
                      
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
    </div>
  </div>
</div>

<!--- DeleteTaches--->
<div wire:ignore.self class="modal fade" id="DeleteTacheModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="DeleteModalLabel">Delete Task</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
            <form wire:submit.prevent="deletedTaches">
                <div class="modal-body">

                   <h4>Are you sure you want to delete this date ?</h4>
                      
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes! Delete</button>
                </div>
            </form>
    </div>
  </div>
</div>

<!-- checkbox
<div wire:ignore.self class="modal fade" id="checkboxTacheModal" tabindex="-1" aria-labelledby="checkboxModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
            <form wire:submit.prevent="deletedTaches">
                <div class="modal-body">

                   <h4>Are you sure you want to delete this date ?</h4>
                      
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes! Delete</button>
                </div>
            </form>
    </div>
  </div>
</div> -->
<!-- swf-->


<!-- AjouterModal -->
<div wire:ignore.self class="modal fade" id="CloseTacheModal" tabindex="-1" aria-labelledby="CloseModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="CloseModalLabel">Task close</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
            <form wire:submit.prevent="CloseTaches">
           
                <div class="modal-body">
                  <h4>are you sure you have finished this task ?</h4>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Confirm</button>
              </div>
            </form>
      </div>
</div>
</div>

@push('scripts')
<script>
       window.addEventListener('close-modal', event =>{
        $('#TacheModal').modal('hide');
        $('#updateTacheModal').modal('hide');
        $('#CloseTacheModal').modal('hide');
        $('#DeleteTacheModal').modal('hide');

       
        // $('#updateModalLabel').hide('hide');
       });
         window.addEventListener('show-edit-tache-modal',event=>{
          $('#updateModalLabel').modal('show');
         })

</script>

 @endpush