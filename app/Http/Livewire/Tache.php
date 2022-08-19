<?php
namespace App\Http\Livewire;


use App\Models\Task;
Use Livewire\withPagination;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Tache extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap';
    public $date_debut, $date_fin, $tach, $tach_id;
    public string $fields;
    public $statuts;

    public $task_id,$task;
    // public Models $
    // public $tache;
    protected function rules(){
        return[
            // 'statut' => 'required|boolean',
            
            'date_debut' => 'required|',
            'date_fin' => 'required|',
            'tach' =>'required|',

        ];
    }
       

    public function updated($fields){

        $this->validateOnly($fields);
    }
    public function SaveTaches(){
      $validatedData = $this->validate();

      Task::create($validatedData);
      session()->flash('message','Task added successfuly');
    //   $this->resetInput();
      $this->dispatchBrowserEvent('close-modal');

    }

    public function updateTaches(){
        $validatedData = $this->validate();
  
        Task::where('id', $this->tach_id)->update([            
            'date_debut' =>$validatedData['date_debut'],
            'date_fin' => $validatedData['date_fin'],
            'tach'=>$validatedData['tach'],
        ]);
        session()->flash('message','Task updated successfuly');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');

      }

      public function CloseTaches(){
        if($this->task_id!=0){
                $this->task=Task::findOrFail($this->task_id);
                if($this->task->statut==true){
                    DB::transaction(function () {
                        $this->task->update([
                            'statut'=>false
                        ]);
                    });
            }else{
                DB::transaction(function () {
                    $this->task->update([
                        'statut'=>true
                    ]);
                });
            }
        }
        $this->dispatchBrowserEvent('close-modal');
      }



//       public function checkbox(){
//         $validatedData = $this->validate();
        
//             Task::create($validatedData);
//             session()->flash('message','Task Completed successfuly');
//         }
//   else{
//     Task::create($validatedData);
// //     session()->flash('message','Task not Completed');
// //   }
//         // Task::create($validatedData);
//         // session()->flash('message','Task Completed successfuly');
//       }

      
    public function resetInput(){
        $this->date_debut = '';
        $this->date_fin = '';
        $this->tach = '';
    }

    public function editTache(int $tach_id){
        $tache = Task::find($tach_id);
        if($tache){
            $this->tach_id = $tache->id;
            $this->date_debut = $tache->date_debut;
            $this->date_fin = $tache->date_fin;
            $this->tach = $tache->tach;
        }
        else{
            return redirect()->to('/taches');
        }
    }
    
    public function CloseTache(int $statut){
        $this->task_id = $statut;
    }

    public function deletedTaches(){
        Task::find($this->tach_id)->delete();
        session()->flash('message','Task Deleted successfuly');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
        // npm i --save @fortawesome/fontawesome-free

    }

    public function deleteTache(int $tach_id){
        $this->tach_id = $tach_id;

    }


    

  
    public function render()
    {
        $taches = Task::orderBy('id','DESC')->paginate(3);
        return view('livewire.tache',['taches'=> $taches]);
    }

   
    
}


