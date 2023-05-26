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
                        Total Price
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($product as $p) : ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $i++ ?>
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <img src="/img/<?= $p['image'] ?>" alt="">
                        </th>
                        <td class="px-6 py-4">

                            <?= $p['name'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $p['category'] ?> </td>

                        <td class="px-6 py-4">
                            <?= $p['price'] ?> </td>
                        <td class="px-6 py-4">
                            <?= $p['stock'] ?> </td>
                        <td class="px-6 py-4">
                            Edit | Delete </td>
                    </tr>

                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>


<?= $this->endSection() ?>