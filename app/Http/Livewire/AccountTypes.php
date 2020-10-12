<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\AccountType;

class AccountTypes extends Component
{
    use WithPagination;
    public $headers, $name_type, $description, $account_type_id;
    public $isOpen = 0;


    private function headerConfig()
    {
        return [
            'id' => '#',
            'name_type' => 'Account Type',
            'description' => 'Description',
            'aksi' => 'Action'
        ];
    }

    public function mount()
    {
        $this->headers = $this->headerConfig();
    }
    private function resultData()
    {
        return AccountType::paginate(5);
    }
    public function render()
    {
        return view('livewire.account-types', [
            'data' => $this->resultData(),
        ]);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields()
    {
        $this->name_type = '';
        $this->description = '';
        $this->account_type_id = '';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'name_type' => 'required',
            'description' => 'required',
        ]);

        AccountType::updateOrCreate(['id' => $this->account_type_id], [
            'name_type' => $this->name_type,
            'description' => $this->description
        ]);

        session()->flash(
            'message',
            $this->account_type_id ? 'Account Type Updated Successfully.' : 'Account Type Created Successfully.'
        );

        $this->closeModal();
        $this->resetInputFields();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $accounttypes = AccountType::findOrFail($id);
        $this->account_type_id = $id;
        $this->name_type = $accounttypes->name_type;
        $this->description = $accounttypes->description;

        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        AccountType::find($id)->delete();
        session()->flash('message', 'Account Type Deleted Successfully.');
    }
}
