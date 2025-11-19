<div 
    x-data="{
        editing: false,
        showMenu: false,
        text: '{{ $text }}',      // original text
        tempText: '{{ $text }}',  // temp editable value
    }"
    class="relative bg-white shadow rounded-lg p-4 cursor-pointer group"
>

    <!-- THREE DOTS BUTTON -->
    <button 
        @click.stop="showMenu = !showMenu"
        class="absolute top-2 right-2 text-gray-400 hover:text-gray-600"
    >
        ⋮
    </button>

    <!-- DROPDOWN MENU -->
    <div 
        x-show="showMenu"
        x-transition
        @click.outside="showMenu = false"
        class="absolute top-8 right-2 bg-white shadow-md border rounded-md py-2 w-28 z-20"
    >
        <!-- EDIT BUTTON -->
        <button
            @click="
                editing = true;
                tempText = text;
                showMenu = false;
            "
            class="block w-full text-left px-4 py-1 text-gray-700 hover:bg-gray-100"
        >
            Edit
        </button>

        <!-- DELETE BUTTON (FORM) -->
        <form method="POST" action="">
            @csrf
            <button 
                type="submit"
                class="block w-full text-left px-4 py-1 text-red-600 hover:bg-red-50"
            >
                Delete
            </button>
        </form>
    </div>

    <!-- VIEW MODE -->
    <p 
        x-show="!editing"
        x-text="text"
        class="text-gray-800 pr-6"
    ></p>

    <!-- EDIT MODE -->
    <div x-show="editing" x-transition>
        <form method="POST" action="">
            @csrf

            <input 
                type="text"
                x-model="tempText"
                class="w-full border rounded px-2 py-1"
            >

            <div class="flex gap-2 mt-3">
                <button 
                    type="submit"
                    @click="text = tempText"
                    class="px-3 py-1 bg-blue-600 text-white rounded text-sm"
                >
                    Save
                </button>

                <button 
                    type="button"
                    @click="
                        editing = false;
                        tempText = text;
                    "
                    class="px-3 py-1 bg-gray-200 rounded text-sm"
                >
                    Cancel
                </button>
            </div>
        </form>
    </div>

</div>
