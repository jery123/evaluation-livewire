<div>
    @include('livewire.AjoutTache')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <h5 class="alert alert-success">{{session('message')}}</h5>

            @endif
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
                            @forelse ($taches as $tache)

                                <tr>
                                   
                                    <td>
                                        <input value="{{!$tache->statut}}" disabled="disabled" class="toggle-class" id="toggle_class" type="checkbox" {{$tache->statut==false? 'checked':''}}>
                                        
                                    </td>
                                    <td>{{$tache->date_debut}}</td>
                                    <td>{{$tache->date_fin}}</td>
                                    <td>{{$tache->tach}}</td>
                                    <td>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#updateTacheModal" wire:click="editTache({{$tache->id}})"  class="btn btn-primary btn-sm mb-2">Edit</a>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#DeleteTacheModal" wire:click="deleteTache({{$tache->id}})"  class="btn btn-danger btn-sm">Delete</a>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#CloseTacheModal" wire:click="CloseTache({{$tache->id}})"  class="btn btn-primary btn-sm mb-2">close</a>
                                    </td>
                                </tr>
                                 @empty

                            <tr>
                                <td colspan="5">
                                    No record Found
                                </td>
                            </tr>


                            @endforelse


                        </tbody>
                    </table> 
                    <div>
                     {{ $taches->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

