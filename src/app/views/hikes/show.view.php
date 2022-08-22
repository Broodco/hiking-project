<?php /** @var object $hike */
    $pageName = $hike->name;
    require 'app/views/layout/head.view.php';
?>

<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">Hike Information</h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">Details about this hike.</p>
    </div>
    <div class="border-t border-gray-200">
        <dl>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Hike name</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"><?= $hike->name ?></dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Distance</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"><?= number_format($hike->distance, 1, ',') ?> km</dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Duration</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"><?= number_format($hike->duration / 60, 0) . ' hours ' . number_format($hike->duration % 60, 0)?> minutes</dd>
            </div>
            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Elevation gain</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"><?= number_format($hike->elevation_gain, 1, ',') ?> m</dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Description</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"><?= $hike->description ?></dd>
            </div>
        </dl>
    </div>
</div>

<?php require 'app/views/layout/footer.view.php' ?>

