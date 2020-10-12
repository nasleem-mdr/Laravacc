
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm">{{ session('message') }}</p>
                    </div>
                  </div>
                </div>
            @endif
            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create Account Type</button>
            @if($isOpen)
                @include('livewire.acctype-create')
            @endif
            <table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                <thead class="text-white">
                    <tr class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                    @foreach ($headers as $key => $value)
                    <th class="p-3 text-left border-grey-light border">{{ $value }}</th>                   
                    @endforeach
                    </tr>
                </thead>
                <tbody class="flex-1 sm:flex-none">
                    @foreach($data as $accounttype)
                    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                        <td class="border-grey-light border hover:bg-gray-100 p-3 w-1/12">{{ $accounttype->id }}</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3 w-3/12">{{ $accounttype->name_type }}</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3 w-6/12">{{ $accounttype->description }}</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3 w-2/12">
                        <button wire:click="edit({{ $accounttype->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $accounttype->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
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