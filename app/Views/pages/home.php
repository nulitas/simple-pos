<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>


<div class="p-4 sm:ml-64">
    <div class="p-4 ">
        <h1 class=" text-2xl font-bold">..> Home</h1>
        <div class="flex flex-wrap m-5">
            <?php foreach ($product as $p => $value) : ?>

                <div data-tilt class="w-full lg:w-6/12 xl:w-3/12 px-4">



                    <div class="relative flex flex-col min-w-0 border-2 border-solid border-white break-words bg-gray-800 rounded mb-6 xl:mb-0 shadow-lg">
                        <div class="text-white  inline-flex items-center justify-center  shadow-lg">
                            <img src="/img/<?= $value['image'] ?>" class="border-2 border-solid border-white object-cover w-full h-10" alt="<?= $value['image'] ?>">
                        </div>
                        <div class="flex-auto p-4">
                            <div class="flex flex-wrap">
                                <div class="relative w-auto pl-4 flex-initial">

                                    <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                        <h5 class="text-blueGray-400 uppercase font-bold text-xs">

                                            <?= form_open('/cart/add') ?>
                                            <?= form_hidden('id', $value['id']); ?>
                                            <?= form_hidden('name', $value['name']); ?>
                                            <?= form_hidden('price', $value['price']); ?>
                                            <?= $value['category'] ?> </td>

                                        </h5>

                                        <input type="hidden" name="product_id" value="  <?= $value['id'] ?>">


                                        <span class="font-semibold text-xl text-blueGray-700">
                                            <?= $value['name'] ?>
                                        </span>

                                    </div>

                                </div>
                            </div>
                            <?php if ($value['stock'] <= 0) : ?>

                                <p class="text-sm text-blueGray-400 mt-8">Empty Stock!</p>
                            <?php else : ?>
                                <span>
                                    Rp.<?= $value['price'] ?>
                                </span>
                                <p class="text-sm text-blueGray-400 mt-4">
                                    <span class="text-emerald-500 mr-2">
                                        <i class="fas fa-arrow-right"></i> <?= $value['stock'] ?>

                                    </span>



                                    <?php if (session()->get('isLoggedIn')) : ?>
                                        <?php if (session()->role != 'Cashier') : ?>
                                            <span class="whitespace-nowrap">
                                                <input type="number" name="quantity" id="quantity" class="text-white h-3 bg-gray-700 border-none " min="0" max="<?= $value['stock'] ?>">
                                                <button type="submit"><i class="fas fa-shopping-cart"></i> </button>
                                                <!-- <a href="/cart/add"><i class="fas fa-shopping-cart"></i></a> -->
                                            </span>
                                        <?php endif ?>
                                    <?php endif ?>


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