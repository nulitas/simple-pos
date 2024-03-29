<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>



<div class="p-4 sm:ml-64">
    <div class="p-4 ">
        <h1 class=" text-2xl font-bold">..> Dashboard</h1>
        <div class="m-2 flex flex-wrap">
            <div class="w-full lg:w-6/12 xl:w-3/12 px-2 ">
                <a href="<?= base_url('cart/index') ?>">
                    <div class="relative flex flex-col min-w-0 break-words rounded mb-6 xl:mb-0 bg-gray-800 shadow-lg">
                        <div class="flex-auto p-4">
                            <div class="flex flex-wrap">
                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1 ">
                                    <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                                        Carts
                                    </h5>
                                    <span class="font-semibold text-xl text-blueGray-700">
                                        <?= $count_carts ?>
                                    </span>
                                </div>
                                <div class="relative w-auto pl-4 flex-initial">
                                    <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500">
                                        <i class="fas fa-shopping-cart"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="text-sm text-blueGray-400 mt-4">
                                <span class="text-emerald-500 mr-2">
                                    <i class="fas fa-arrow-up"></i>
                                </span>
                                <span class="whitespace-nowrap">
                                    -
                                </span>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="w-full lg:w-6/12 xl:w-3/12 px-2 ">
                <a href="<?= base_url('main/transactions') ?>">
                    <div class="relative flex flex-col min-w-0 break-words bg-dark rounded mb-6 xl:mb-0 bg-gray-800 shadow-lg">
                        <div class="flex-auto p-4">
                            <div class="flex flex-wrap">
                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                    <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                                        Transactions
                                    </h5>
                                    <span class="font-semibold text-xl text-blueGray-700">
                                        <?= $count_transactions ?>
                                    </span>
                                </div>
                                <div class="relative w-auto pl-4 flex-initial">
                                    <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-orange-500">
                                        <i class="fa-solid fa-money-check-dollar"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="text-sm text-blueGray-400 mt-4">
                                <span class="text-red-500 mr-2">
                                    <i class="fas fa-arrow-down"></i>
                                </span>
                                <span class="whitespace-nowrap">
                                    -
                                </span>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="w-full lg:w-6/12 xl:w-3/12 px-2 ">
                <a href="<?= base_url('main/products') ?>">
                    <div class="relative flex flex-col min-w-0 break-words bg-dark rounded mb-6 xl:mb-0 bg-gray-800 shadow-lg">
                        <div class="flex-auto p-4">
                            <div class="flex flex-wrap">
                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                    <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                                        Products
                                    </h5>
                                    <span class="font-semibold text-xl text-blueGray-700">
                                        <?= $count_products ?>
                                    </span>
                                </div>
                                <div class="relative w-auto pl-4 flex-initial">
                                    <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-pink-500">
                                        <i class="fa-solid fa-book-skull"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="text-sm text-blueGray-400 mt-4">
                                <span class="text-orange-500 mr-2">
                                    <i class="fas fa-arrow-down"></i>
                                </span>
                                <span class="whitespace-nowrap">
                                    -
                                </span>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="w-full lg:w-6/12 xl:w-3/12 px-2 ">
                <a href="<?= base_url('main/users') ?>">
                    <div class="relative flex flex-col min-w-0 break-words bg-dark rounded mb-6 xl:mb-0 bg-gray-800 shadow-lg">
                        <div class="flex-auto p-4">
                            <div class="flex flex-wrap">
                                <div class="relative w-full pr-4 max-w-full flex-grow flex-1">
                                    <h5 class="text-blueGray-400 uppercase font-bold text-xs">
                                        Users
                                    </h5>
                                    <span class="font-semibold text-xl text-blueGray-700">
                                        <?= $count_users ?>
                                    </span>
                                </div>
                                <div class="relative w-auto pl-4 flex-initial">
                                    <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-blue-500">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="text-sm text-blueGray-400 mt-4">
                                <span class="text-emerald-500 mr-2">
                                    <i class="fas fa-arrow-up"></i>
                                </span>
                                <span class="whitespace-nowrap">
                                    -
                                </span>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- <h1>Hello, World!</h1> -->
    </div>

</div>
</div>
</div>
</div>
</div>

<?= $this->endSection() ?>