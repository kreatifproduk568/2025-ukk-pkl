<?php

namespace App\Livewire\Front\Industri;

use App\Models\Siswa;
use Livewire\Component;
use App\Models\Industri;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $indNama,$indBidUs,$indAlmt,$indKontak,$indEmail,$indWebsite;

    public $isOpen = 0;

    use WithPagination;

    public $rowPerPage=3;
    public $search;
    public $userMail;

    public function mount(){
        //membaca email user yang seddang login
        $this->userMail = Auth::user()->email;
    }
    
    public function render()
    {
        return view('livewire.front.industri.index',[
            'industris' => Industri::latest()->paginate($this->rowPerPage),
            'industris' => $this->search === NULL ?
                        Industri::latest()->paginate($this->rowPerPage) :
                        Industri::latest()->where('nama', 'like', '%' . $this->search . '%')
                                          ->orWhere('bidang_usaha', 'like', '%' . $this->search . '%')
                                          ->orWhere('alamat', 'like', '%' . $this->search . '%')
                                          ->paginate($this->rowPerPage),
                                          
            'siswa_login'=>Siswa::where('email','=',$this->userMail)->first(),
        ]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
    
    public function openModal()
    {
        $this->isOpen = true;
    }


    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields(){
        $this->indNama      ='';
        $this->indBidUs   = '';
        $this->indAlmt       = '';
        $this->indKontak        ='';
        $this->indEmail      = '';
        $this->indWebsite      = '';
    }

    public function store()
    {
        $this->validate([
                'siswaId'       => 'required',
                'industriId'    => 'required',
                'guruId'        => 'required',
                'mulai'         => 'required|date',
                'selesai'       => 'required|date|after:mulai',
            ]);
        

        DB::beginTransaction();
        
        try {
            $siswa = Siswa::find($this->siswaId);

            if ($siswa->status_lapor_pkl) {
                // session()->flash('error', 'Transaksi dibatalkan: Siswa sudah melapor.');

                DB::rollBack();
                $this->closeModal();

                return redirect()->route('dashboard')->with('error', 'Transaksi dibatalkan: Siswa sudah melapor.');
            }

            // Simpan data PKL
            Pkl::create([
                'siswa_id'      => $this->siswaId,
                'industri_id'   => $this->industriId,
                'guru_id'       => $this->guruId,
                'mulai'         => $this->mulai,
                'selesai'       => $this->selesai,
            ]);

            // Update status_lapor siswa
            $siswa->update(['status_lapor_pkl' => 1]);

            DB::commit();
            
            $this->closeModal();
            $this->resetInputFields();

            return redirect()->route('dashboard')->with('success', 'Data PKL berhasil disimpan dan status siswa diperbarui!');

            
        }
        catch (\Exception $e) {
            DB::rollBack();
            // session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            $this->closeModal();
            return redirect()->route('dashboard')->with('error', 'Terjadi kesalahan:');
        }
    }
}