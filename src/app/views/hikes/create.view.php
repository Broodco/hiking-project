<?php
    $pageName = "Create a Hike";
    require 'app/views/layout/head.view.php'
?>

<form class="space-y-6" action="/hikes" method="POST">
    <div class="bg-white shadow px-4 py-5 rounded-lg sm:p-6">
        <div class="md:grid md:grid-cols-4 md:gap-6">
            <div class="md:col-span-1">
                <h3 class="text-lg font-medium leading-6 text-gray-900">New Hike</h3>
                <p class="mt-1 text-sm text-gray-500">Register a new hike here.</p>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-3">
                <div
                    class="grid grid-cols-8 gap-6"
                    x-data='creationForm(<?=json_encode($tags)?>)'
                >
                    <div class="col-span-8">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input required type="text" name="name" id="name" autocomplete="name" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-4 lg:col-span-2">
                        <label for="distance" class="block text-sm font-medium text-gray-700">Distance (km)</label>
                        <input required type="number" name="distance" id="distance" autocomplete="distance" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-4 lg:col-span-2">
                        <label for="elevation_gain" class="block text-sm font-medium text-gray-700">Elevation gain (m)</label>
                        <input required type="number" name="elevation_gain" id="elevation_gain" autocomplete="elevation_gain" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-4 lg:col-span-2">
                        <label for="duration_hours" class="block text-sm font-medium text-gray-700">Duration (hours)</label>
                        <input required type="number" name="duration_hours" id="duration_hours" autocomplete="duration_hours" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-4 lg:col-span-2">
                        <label for="duration_minutes" class="block text-sm font-medium text-gray-700">Duration (minutes)</label>
                        <input required type="number" name="duration_minutes" id="duration_minutes" autocomplete="duration_minutes" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="col-span-8">
                        <fieldset class="mt-0.5 grid grid-cols-12 gap-2" name="tags">
                            <legend class="block text-sm font-medium text-gray-700">Tags</legend>
                            <template x-for="tag in tags">
                                <div class="relative flex items-start col-span-6 sm:col-span-4 lg:col-span-3 pl-3 p-1 my-1 rounded-lg"
                                     :style="!!tag.color ? 'background-color: ' + '#' + tag.color : 'background-color: #f5f5f5'"
                                >
                                    <div class="flex h-5 items-center">
                                        <input x-bind:id="tag.id" :name="'tags['+ tag.name + ']'" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-gray-600 focus:ring-gray-500" x-bind:value='tag.color'>
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="tags" class="font-medium text-gray-700" x-text="tag.name"></label>
                                    </div>
                                </div>
                            </template>
                        </fieldset>
                    </div>

                    <div class="col-span-8">
                        <h4 class="block text-sm font-medium text-gray-700"> New Tag </h4>
                        <h4 class="block text-xs font-medium text-gray-700"> (optional) </h4>
                        <div class=" grid grid-cols-12 gap-2">
                            <div class="mt-1 col-span-12 md:col-span-5">
                                <input type="text" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm" placeholder="Your new tag here" x-model="tagName">
                            </div>
                            <div class="mt-1 col-span-6 md:col-span-5">
                                <div class="relative">
                                    <button type="button" class="relative w-full cursor-default rounded-md border border-gray-300 bg-white py-2 pl-3 pr-10 text-left shadow-sm focus:border-gray-500 focus:outline-none focus:ring-1 focus:ring-gray-500 sm:text-sm" aria-haspopup="listbox" aria-expanded="true" aria-labelledby="listbox-label"
                                            @click="toggle"
                                            @click.outside="color_open = false"
                                            :style="`background-color: #${selectedHex}`"
                                    >
                                        <span class="block truncate" x-text="selectedColor"></span>
                                        <span class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
                                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z" clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </button>
                                    <ul x-transition x-show="color_open" @click.outside="color_open = false" id="color-picker-dropdown" class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm" tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-option-3">
                                        <?php foreach ($colors as $colorName => $colorCode): ?>
                                            <li
                                                x-data="{currentColor: '<?= substr($colorName, 0 ,-4) ?>', currentHex: '<?= $colorCode ?>'}"
                                                class="text-gray-900 relative select-none cursor-pointer py-2 pl-3 pr-9"
                                                style="background: #<?= $colorCode?>"
                                                @click="[selectedColor, selectedHex] = [currentColor, currentHex]"
                                            >
                                                <span class="block truncate" x-bind:class="selectedColor == currentColor ? 'font-semibold' : 'font-normal'"><?= substr($colorName, 0, -4) ?></span>
                                                <template x-if="selectedColor == currentColor">
                                                    <span class="text-gray-600 absolute inset-y-0 right-0 flex items-center pr-4">
                                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                                        </svg>
                                                    </span>
                                                </template>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <button
                                type="button"
                                class="mt-1 col-span-6 md:col-span-2 inline-flex items-center justify-center rounded-md border border-transparent bg-gray-100 px-3 py-2 text-sm font-medium leading-4 text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2"
                                @click="addTagToForm"
                            >
                                Add
                            </button>
                        </div>
                    </div>

                    <div class="col-span-8">
                        <label for="description" class="block text-sm font-medium text-gray-700"> Description </label>
                        <div class="mt-1">
                            <textarea id="description"
                                      name="description"
                                      rows="3"
                                      placeholder="Describe your hike here."
                                      class="shadow-sm focus:ring-gray-500 focus:border-gray-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                      required
                            ></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-end">
        <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Cancel</button>
        <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Save</button>
    </div>
</form>
<script type="text/javascript" src="/scripts/hike-form.js"></script>
<?php require 'app/views/layout/footer.view.php' ?>
