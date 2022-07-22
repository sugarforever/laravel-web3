<div class="max-w-xl">
    <div class="modal fade fixed @if ($show !== true) hidden @endif top-0 left-0 w-full h-full outline-none overflow-x-hidden overflow-y-auto bg-stone-200/75"
        id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-modal="true" role="dialog">
        <div
            class="modal-dialog modal-dialog-centered h-full flex justify-center items-center relative w-auto pointer-events-none">
            <div
                class="modal-content border-none shadow-lg relative flex flex-col w-2/4 pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div
                    class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                    <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">
                        Add a note
                    </h5>
                    <button type="button"
                        class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body relative p-4">
                    <p>Write down some details here...</p>
                </div>
                <div
                    class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                    <button type="button"
                        class="inline-block px-6 py-2.5 bg-purple-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out"
                        wire:click="$set('show', false)">
                        Close
                    </button>
                    <button type="button"
                        class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1"
                        wire:click="onSave">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div>
        <select wire:model="selectedYear">
            @foreach ($years as $y)
                <option value="{{ $y }}">{{ $y }}</option>
            @endforeach
        </select>

        <select wire:model="selectedMonth">
            @foreach ($months as $m)
                <option value="{{ $m }}">{{ $m }}</option>
            @endforeach
        </select>

        <button type="button"
            class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
            wire:click="$set('show', true)">
            Add note
        </button>
    </div>
    <div class="grid grid-cols-7 gap-1 text-center mt-4">
        <div>Mon</div>
        <div>Tue</div>
        <div>Wed</div>
        <div>Thur</div>
        <div>Fri</div>
        <div>Sat</div>
        <div>Sun</div>
    </div>
    <div class="grid grid-cols-7 gap-1">
        @foreach ($this->days as $day)
            @if (empty($day))
                <div class="aspect-square flex justify-center items-center bg-gray-200">{{ $day }}</div>
            @else
                <div class="aspect-square flex justify-center items-center bg-sky-500">{{ $day }}</div>
            @endif
        @endforeach
    </div>
</div>
