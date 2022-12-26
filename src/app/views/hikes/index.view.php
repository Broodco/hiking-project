<?php
    $pageName = "Hikes";
    require 'app/views/layout/head.view.php'
?>

    <section>
        <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <?php /** @var array $hikes */
            foreach ($hikes as $hike) :?>
            <a href="/hike?id=<?= $hike->id ?>" >
                <li class="col-span-1 flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200">
                    <div class="flex-1 flex flex-col p-8">
                        <img class="w-32 h-32 flex-shrink-0 mx-auto rounded-full" src="https://images.unsplash.com/photo-1595202761821-57d3a4e5dc9f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8aGlraW5nJTIwdHJhaWx8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                        <h3 class="mt-6 text-gray-900 text-sm font-medium"><?= $hike->name ?></h3>
                        <dl class="mt-1 flex-grow flex flex-col justify-between">
                            <dt class="sr-only">Title</dt>
                            <dd class="text-gray-500 text-sm whitespace-pre-line truncate h-11"><?= $hike->description ?></dd>
                            <dt class="sr-only">Role</dt>
                            <dd class="mt-3">
                                <?php foreach ($hike->tags_ids as $tag_id) : ?>
                                    <span
                                        class="px-2 py-1 text-green-800 text-xs font-medium rounded-full"
                                        style="background: #<?= $tags[$tag_id]->color ?>"
                                    ><?= $tags[$tag_id]->name ?></span>
                                <?php endforeach; ?>
                            </dd>
                        </dl>
                    </div>
                    <div>
                        <div class="-mt-px flex divide-x divide-gray-200">
                            <div class="w-0 flex-1 flex relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span class="ml-3 "><?= number_format($hike->distance, 1, ',', ' ') ?> km</span>
                            </div>
                            <div class="-ml-px w-0 flex-1 flex">
                                <div class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                                    </svg>
                                    <span class="ml-3"><?= number_format($hike->elevation_gain, 1, ',', ' ') ?> m</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </a>
            <?php endforeach; ?>
        </ul>
    </section>

<?php require 'app/views/layout/footer.view.php' ?>
