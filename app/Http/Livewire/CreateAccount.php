<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use App\Models\AccountType;

class CreateAccount extends Component
{
    use WithPagination;
    public $headers, $account_name, $company_id, $name, $description, $is_active, $name_type, $account_id, $account_type_id;
    public $isOpen = 0;


    private function headerConfig()
    {
        return [
            'account_name' => 'AccountNo',
            'description' => 'Description',
            'name' => 'Createdby',
            'name_type' => 'Type',
            'is_active' => 'Active',
            'aksi' => 'Action'
        ];
    }

    public function mount()
    {
        $this->headers = $this->headerConfig();
    }
    private function resultData()
    {
        return Account::paginate(10);
    }
    public function render()
    {
        return view('livewire.create-account', [
            'data' => $this->resultData(),
            'accounttypes' => AccountType::all(),
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
        $this->account_name = '';
        $this->description = '';
        $this->account_type_id = '';
        $this->is_active = 0;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'account_name' => 'required',
            'description' => 'required',
            'account_type_id' => 'required',
        ]);

        $company = '1';
        Account::updateOrCreate(['id' => $this->account_id], [
            'user_id' => Auth::id(),
            'account_name' => $this->account_name,
            'description' => $this->description,
            'account_type_id' => $this->account_type_id,
            'is_active' => $this->is_active,
            'company_id' => $company
        ]);

        session()->flash(
            'message',
            $this->account_id ? 'Account Updated Successfully.' : 'Account Created Successfully.'
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
        $accounts = Account::findOrFail($id);
        $this->account_id = $id;
        $this->account_name = $accounts->account_name;
        $this->description = $accounts->description;
        $this->account_type_id = $accounts->account_type_id;
        $this->is_active = $accounts->is_active;

        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Account::find($id)->delete();
        session()->flash('message', 'Account Deleted Successfully.');
    }
}
