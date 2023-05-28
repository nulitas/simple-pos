<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>


<div class="p-4 sm:ml-64">
    <div class="p-4 ">
        <div class="flex flex-wrap">
            <?php foreach ($product as $p => $value) : ?>

                <div data-tilt class="w-full lg:w-6/12 xl:w-3/12 px-4">



                    <div class="relative flex flex-col min-w-0 border-2 border-solid border-white break-words bg-dark rounded mb-6 xl:mb-0 shadow-lg">

                        <div class="flex-auto p-4">

                            <div class="flex flex-wrap">
                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                    <h5 class="text-blueGray-400 uppercase font-bold text-xs">

                                        <?= form_open('/cart/add') ?>
                                        <?= form_hidden('name', $value['name']); ?>
                                        <?= form_hidden('price', $value['price']); ?>
                                        <?= $value['category'] ?> </td>

                                    </h5>

                                    <span class="font-semibold text-xl text-blueGray-700">
                                        <?= $value['name'] ?>
                                    </span>

                                </div>
                                <div class="relative w-auto pl-4 flex-initial">
                                    <div class="text-white p-3 text-center inline-flex items-center justify-center w-28 h-28 shadow-lg">
                                        <img src="/img/<?= $value['image'] ?>" class="border-2 border-solid border-white max-w-[100%] h-20" alt="<?= $value['image'] ?>">
                                    </div>
                                </div>
                            </div>
                            <?php if ($value['stock'] <= 0) : ?>

                                <p class="text-sm text-blueGray-400 mt-8">Empty Stock!</p>
                            <?php else : ?>
                                <p class="text-sm text-blueGray-400 mt-4">
                                    <span class="text-emerald-500 mr-2">
                                        <i class="fas fa-arrow-up"></i> <?= $value['stock'] ?>
                                    </span>
                                    <span class="whitespace-nowrap">
                                        <input type="number" name="quantity" id="quantity" class="text-white h-3 bg-gray-700 border-none ">
                                        <button type="submit"><i class="fas fa-shopping-cart"></i> </button>
                                        <!-- <a href="/cart/add"><i class="fas fa-shopping-cart"></i></a> -->
                                    </span>

                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>













                <?= form_close() ?>
            <?php endforeach ?>


        </div>

    </div>
</div>

<?= $this->endSection() ?>