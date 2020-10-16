
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <div class="border-indigo-500 border-t-4 text-teal-900 px-2 py-2 my-2">
                <div class="flex">
                    <div>
                      <p class="font-bold">Chart Of Account</p>
                    </div>
                  </div>
            </div>
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-2 py-2 shadow-md my-2" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm">{{ session('message') }}</p>
                    </div>
                  </div>
                </div>
            @endif
            <button wire:click="create()" class="bg-indigo-700 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded my-3">Create Account</button>
            @if($isOpen)
                @include('livewire.account.modal-account')
            @endif
            <button wire:click="create()" class="bg-indigo-700 hover:bg-green-700 text-white font-bold py-2 px-2 rounded my-3">Import xls</button>
            @if($isOpen)
                @include('livewire.account.modal-account')
            @endif
            <button wire:click="create()" class="bg-indigo-700 hover:bg-yellow-700 text-white font-bold py-2 px-2 rounded my-3">Export xls</button>
            @if($isOpen)
                @include('livewire.account.modal-account')
            @endif
            <table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-3">
                <thead class="text-white ">
                    @foreach($data as $account)
                    <tr class="bg-gradient-to-r from-indigo-500 to-indigo-900 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                    @foreach ($headers as $key => $value)
                    <th class="p-2 text-left">{{ $value }}</th>                   
                    @endforeach
                    </tr>
                    @endforeach
                </thead>
                <tbody class="flex-1 sm:flex-none">
                    @foreach($data as $account)
                    <tr class="flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                        <td class="border-grey-light border hover:bg-gray-100 p-2">{{ $account->account_name }}</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-2">{{ $account->description }}</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-2">{{ $account->user->name }}</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-2">{{ $account->type['name_type'] }}</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-2" width="40">
                            <input {{($account->is_active==1) ? 'checked' : ''}} name="is_active" type="checkbox" value="{{ $account->is_active }}">
                            </td>
                        <td class="border-grey-light border hover:bg-gray-100 p-2" width="70">
                            <div class="flex">
                                <button wire:click="edit({{ $account->id }})" class="bg-indigo-600 hover:bg-indigo-200 text-white font-bold py-2 px-2 rounded mx-1">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                    </svg>                                  
                                </button>
                                <button wire:click="delete({{ $account->id }})" class="bg-indigo-900 hover:bg-indigo-100 text-white font-bold py-2 px-2 rounded mx-1">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z" />
                                        <path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-2">
                {{ $data->links() }}
            </div>
        </div>
        
    </div>
</div>