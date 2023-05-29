<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="p-4 sm:ml-64">
    <div class="p-4 ">
        <h1 class=" text-2xl font-bold">..> Products</h1>
        <div class="grid grid-cols-5 gap-4 m-4">

            <a href="<?= base_url('product/add') ?>" class="relative inline-block px-4 py-2 font-medium group my-4">
                <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                <span class="absolute inset-0 w-full h-full bg-gray-700 border-2 border-black group-hover:bg-gray-700"></span>
                <span class="relative text-slate-400 group-hover:text-white">
                    + Add Product
                </span>
            </a>
        </div>

        <div class="relative overflow-x-auto shadow-lg">
            <table class="w-full text-sm text-left text-white ">
                <thead class="text-xs text-black uppercase bg-gray-200 ">
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
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Stock
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($product as $p) : ?>
                        <tr class="border-b bg-gray-800 border-gray-700">

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
                                <?= $p['description'] ?> </td>
                            <td class="px-6 py-4">
                                Rp.<?= $p['price'] ?> </td>
                            <td class="px-6 py-4">
                                <?= $p['stock'] ?> </td>
                            <td class="px-6 py-4 ">
                                <a href="/product/edit/<?= $p['id'] ?>"><i class="fas fa-edit"></i></a> | <form action="/product/<?= $p['id'] ?>" method="post" class="d-inline">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" onclick="return confirm('Delete?');"> <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                    <?php endforeach ?>
                    <?php if (count($product) <= 0) : ?>
                        <tr>
                            <td class="p-4 text-center" colspan="7">not found.</td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>

    </div>

    <?= $this->endSection() ?>