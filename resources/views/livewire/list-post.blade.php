<div>

    <table class="w-full m-2">
        <thead>
            <tr class="bg-gray-100">
                <th class="border w-1/12 px-4 py-2">#</th>
                <th class="border w-4/12 px-4 py-2">Name</th>
                <th wire:click="sortBy('body')" style="cursor: pointer;" class="border w-7/12 px-4 py-2">Body</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td class="border w-1/12 px-4 py-2">1
                </td>
                <td class="border w-4/12 px-4 py-2">
                    {{$post->user->name}}
                </td>
                <td class="border w-7/12 px-4 py-2">
                    {{$post->body}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="w-full m-2">
        {{ $posts->links() }}
    </div>

</div>