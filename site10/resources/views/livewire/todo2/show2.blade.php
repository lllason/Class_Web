<div>
    <table class="table-auto w-full">
        <thead>
        <tr>
            <th class="px-4 py-2">訂購人</th>
            <th class="px-4 py-2">訂購金額</th>
            <th class="px-4 py-2">送達地點</th>
            <th class="px-4 py-2">交錢狀況</th>
            <th class="px-4 py-2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($list as $item)
            <tr @if($loop->even)class="bg-grey"@endif>
                <td class="border px-4 py-2">{{ $item->description }}</td>
                <td class="border px-4 py-2">{{ $item->detail }}</td>
                <td class="border px-4 py-2">{{ $item->place }}</td>
                <td class="border px-4 py-2">@if($item->done) 未交錢 @else 己交錢 @endif</td>
                <td class="border px-4 py-2">
                    @if($item->done)
                        <button wire:click="markAsToDo({{ $item->id }})" class="bg-red-100 text-red-600 px-6 rounded-full">
                            Mark as "未交錢"
                        </button>
                    @else
                        <button wire:click="markAsDone({{ $item->id }})" class="bg-gray-800 text-white px-6 rounded-full">
                            Mark as "己交錢"
                        </button>
                    @endif
                    <button wire:click="deleteItem({{ $item->id }})" class="bg-red-100 text-red-600 px-6 rounded-full">
                        Delete Permanently
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
