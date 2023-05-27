<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="p-4 sm:ml-64">
    <div class="p-4 ">

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cover
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        QTY
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>

                <?php $i = 1 ?>
                <?php foreach ($cart as $item) : ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $i++ ?>
                        </th>

                        <td class="px-6 py-4">
                            <img src=" /img/<?= $item['image'] ?>" class="border-2 border-solid border-white" alt="<?= $item['image'] ?>">

                        </td>
                        <td class="px-6 py-4">
                            <?= $item['name'] ?>
                        </td>
                        <td class="px-6 py-4">


                            <?= $item['quantity'] ?>
                            <!-- <input type="number" name="quantity" id="quantity"> -->
                        </td>

                        <td class="px-6 py-4">
                            <?= $item['price'] ?> </td>

                        <td class="px-6 py-4">
                            <form action="/cart/<?= $item['id'] ?>" method="post" class="d-inline">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800" onclick="return confirm('Delete?');"> <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </form>
                        </td>
                    </tr>


                <?php endforeach ?>

            </tbody>
        </table>



        <h3 class="mt-4">Total Price</h3>

        <form action="<?= base_url('transaction/add') ?>" method="POST">
            <?= csrf_field() ?>
            <input type="hidden" name="total_amount" value="0">
            <p> Rp.<?= $total = array_sum($total) ?> </p>

            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="w-full">
                    <label for="customer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Name</label>
                    <input type="text" name="customer" id="customer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Agus">
                </div>
                <div class="w-full">
                    <label for="tendered" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tendered</label>
                    <input type="number" name="tendered" id="tendered" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="1000">
                </div>
            </div>
            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Buy
            </button>
        </form>

    </div>

</div>


<?= $this->endSection() ?>