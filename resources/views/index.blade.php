@extends('layouts.app')

@section('content')

<div>
  <livewire:tache>
</div>
 
@endsection

@section('scripts')
<script>
    window.addEventListener('close-modal', event =>{
        $('#TacheModal').modal('hide');
        $('#updateTacheModal').modal('hide');
        $('#CloseTacheModal').modal('hide');
        $('# DeleteTacheModal').modal('hide');
    
        alert('Name update to:'+event.detail.newName);
    })
</script>

@endsection
