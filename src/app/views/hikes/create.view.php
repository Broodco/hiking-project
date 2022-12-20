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
                <div class="grid grid-cols-8 gap-6">
                    <div class="col-span-8">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" autocomplete="name" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-4 lg:col-span-2">
                        <label for="distance" class="block text-sm font-medium text-gray-700">Distance (km)</label>
                        <input type="number" name="distance" id="distance" autocomplete="distance" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-4 lg:col-span-2">
                        <label for="elevation_gain" class="block text-sm font-medium text-gray-700">Elevation gain (m)</label>
                        <input type="number" name="elevation_gain" id="elevation_gain" autocomplete="elevation_gain" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-4 lg:col-span-2">
                        <label for="duration_hours" class="block text-sm font-medium text-gray-700">Duration (hours)</label>
                        <input type="number" name="duration_hours" id="duration_hours" autocomplete="duration_hours" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-4 lg:col-span-2">
                        <label for="duration_minutes" class="block text-sm font-medium text-gray-700">Duration (minutes)</label>
                        <input type="number" name="duration_minutes" id="duration_minutes" autocomplete="duration_minutes" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="col-span-8">
                        <fieldset class="mt-0.5 grid grid-cols-12 gap-2" name="tags">
                            <legend class="block text-sm font-medium text-gray-700">Tags</legend>
                            <?php foreach($tags as $tag) : ?>
                                <div class="relative flex items-start col-span-6 sm:col-span-4 md:col-span-3 lg:col-span-2 pl-3 p-1 my-1 rounded-lg" style="background: #<?= $tag->color ?? 'dfdfdf' ?>">
                                    <div class="flex h-5 items-center">
                                        <input id="<?= $tag->name?>" aria-describedby="<?= $tag->name?>-description" name="tags[]" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-gray-600 focus:ring-gray-500" value="<?= $tag->id ?>">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="tags" class="font-medium text-gray-700">
                                            <?= $tag->name ?>
                                        </label>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </fieldset>
                    </div>

                    <div class="col-span-8">
                        <label for="description" class="block text-sm font-medium text-gray-700"> Description </label>
                        <div class="mt-1">
                            <textarea id="description"
                                      name="description"
                                      rows="3"
                                      placeholder="Describe your hike here."
                                      class="shadow-sm focus:ring-gray-500 focus:border-gray-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
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
<?php require 'app/views/layout/footer.view.php' ?>
