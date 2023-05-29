<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="p-4 sm:ml-64">
    <div class="p-4 ">

        <h1 class=" text-2xl font-bold">..> Transactions</h1>
        <div class="m-4 relative overflow-x-auto  shadow-lg">
            <table class="w-full text-sm text-left text-white ">
                <thead class="text-xs text-black uppercase bg-gray-200 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Code
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Customer
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tendered
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($transactions as $t) : ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $i++; ?>
                            </th>
                            <td class="px-6 py-4">
                                <?= $t['code'] ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $t['customer'] ?>
                            </td>
                            <td class="px-6 py-4">
                                Rp.<?= $t['total_amount'] ?>
                            </td>
                            <td class="px-6 py-4">
                                Rp.<?= $t['tendered'] ?>
                            </td>
                            <td class="px-6 py-4 flex">
                                <a target="_blank" href="/transaction/generate/<?= $t['id'] ?>"><i class="fa fa-download" aria-hidden="true"></i></a> | <form action="/transaction/<?= $t['id'] ?>" method="post" class="d-inline">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" onclick="return confirm('Delete?');"> <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>


    <?= $this->endSection() ?>