<div>
<form>
    <textarea wire:model="body" class="w-full py-2 px-3 resize-y border rounded focus:outline-none focus:shadow-outline" rows="3" placeholder="Your Comments here">
    </textarea>
    <div class="m-2 flex justify-end">
        <button wire:click="createPost" class="px-2 py-2 text-white hover:bg-blue-600 rounded bg-gradient-to-r from-teal-400 to-blue-500">POST</button>
    </div>
    </form>
</div>