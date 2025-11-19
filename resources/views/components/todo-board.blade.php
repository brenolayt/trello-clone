<!-- Board component -->
<div x-data="board()" class="relative bg-gray-100 p-4 rounded-xl w-80 shadow flex flex-col max-h-[80vh]">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-3">
        <h2 class="text-lg font-semibold text-gray-800">
            {{ $title }}
        </h2>

        <!-- three dots button wrapper (relative so dropdown can align to it) -->
        <div class="relative" x-ref="menuRoot">
            <button @click="toggleMenu()" class="p-1 hover:bg-gray-200 rounded">
                <!-- nicer 3-dots icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v.01M12 12v.01M12 18v.01" />
                </svg>
            </button>

            <!-- DROPDOWN MENU (positioned relative to the button) -->
            <div
                x-show="menuOpen"
                x-cloak
                @click.outside="closeMenu()"
                x-transition
                class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded-lg shadow-md z-50"
                style="min-width:10rem;"
            >

                <button
                    @click="closeMenu()"  {{-- placeholder for delete --}}
                    class="block w-full text-left px-4 py-2 hover:bg-gray-100 text-red-600"
                >
                    Delete
                </button>
            </div>
        </div>
    </div>

    <!-- DONE EDITING banner (shows only when in edit mode) -->
    <template x-if="editing">
        <div class="mb-3">
            <button @click="leaveEditMode()" class="text-sm text-white bg-blue-600 px-3 py-1 rounded shadow hover:bg-blue-700">
                Done Editing
            </button>
        </div>
    </template>

    <!-- CARDS LIST -->
    <ul class="space-y-3 overflow-y-auto pr-2">
        {{ $slot }}
    </ul>

    <!-- ADD CARD BUTTON (restored at bottom) -->
    <div class="mt-4">
        <button @click="$dispatch('add-card-request')" class="w-full text-left text-gray-600 hover:text-gray-900 text-sm">
            + Add another card
        </button>
    </div>
</div>

<script>
function board(){
    return {
        menuOpen: false,
        editing: false,

        toggleMenu(){
            this.menuOpen = !this.menuOpen;
        },

        closeMenu(){
            this.menuOpen = false;
        },

        enterEditMode(){
            this.menuOpen = false;
            this.editing = true;
            // broadcast to cards
            window.dispatchEvent(new CustomEvent('board-edit-mode', { detail: { on: true } }));
        },

        leaveEditMode(){
            this.editing = false;
            window.dispatchEvent(new CustomEvent('board-edit-mode', { detail: { on: false } }));
        }
    }
}
</script>
