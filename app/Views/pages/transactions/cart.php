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
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        </th>
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
                            Delete </td>
                    </tr>







                <?php endforeach ?>






            </tbody>
        </table>


        <h3 class="mt-4">Total Price</h3>
        <p> Rp.<?= $total = array_sum($total) ?> </p>



    </div>
</div>


<?= $this->endSection() ?>