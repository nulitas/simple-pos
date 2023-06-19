<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="p-4 sm:ml-64">
    <div class="p-4 ">
        <h1 class=" text-2xl font-bold">..> Cart</h1>

        <div class="relative overflow-x-auto   ">
            <table class="m-2 w-[98%] text-sm text-left shadow-lg text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
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
                        <tr class=" border-b bg-gray-800 border-gray-700">

                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                <?= $i++ ?>
                            </th>
                            <td class="px-6 py-4">
                                <img src="/img/<?= $item['image'] ?>" class="max-w-[100%] h-16 border-2 border-solid border-white" alt="<?= $item['image'] ?>">

                            </td>


                            <td class="px-6 py-4">
                                <?= $item['name'] ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $item['amount'] ?> </td>

                            <!-- <input type="number" name="quantity" id="quantity" class="text-black"> -->

                            </td>

                            <td class="px-6 py-4">
                                Rp.<?= $item['price'] ?> </td>

                            <td class="px-6 py-4">
                                <form action="/cart/<?= $item['id'] ?>" method="post" class="d-inline">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-700  focus:ring-4 focus:ring-primary-200 focus:ring-primary-900 hover:bg-primary-800" onclick="return confirm('Delete?');"> <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>


                    <?php endforeach ?>
                    <?php if (count($cart) <= 0) : ?>
                        <tr>
                            <td class="p-4 text-center" colspan="7">not found.</td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>


        <h3 class="mt-4">Total Price</h3>

        <form action="<?= base_url('transaction/add') ?>" method="POST">
            <?= csrf_field() ?>
            <!-- <input type="hidden" name="product_id[]">
            <input type="hidden" name="price[]" value="0">
            <input type="hidden" name="total_amount" value="0"> -->
            <input type="hidden" name="total_amount" value="0">

            <p> Rp.<?= $total  ?> </p>


            <div class="mt-4 grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="w-full">
                    <label for="customer" class="block mb-2 text-sm font-medium  text-white">Your Name</label>
                    <input type="text" name="customer" id="customer" class="bg-gray-50 border border-gray-300 text-black  text-sm  focus:ring-black focus:border-black block w-full p-2.5  placeholder-gray-400  focus:ring-primary-500 focus:border-primary-500" placeholder="nulitas">
                </div>
                <div class="w-full">
                    <label for="tendered" class="block mb-2 text-sm font-medium  text-white">Tendered</label>
                    <input type="number" name="tendered" id="tendered" class="bg-gray-50 border border-gray-300 text-black text-sm  focus:ring-black focus:border-black block w-full p-2.5  placeholder-gray-400  focus:ring-primary-500 focus:border-primary-500" placeholder="999">
                </div>
            </div>


            <a href="#_" class="relative inline-block px-4 py-2 font-medium group my-4">
                <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                <span class="absolute inset-0 w-full h-full bg-gray-700 border-2 border-black group-hover:bg-gray-700"></span>
                <button type="submit" class="relative text-slate-400 group-hover:text-white">
                    Buy
                </button>
            </a>
        </form>

    </div>

</div>


<?= $this->endSection() ?>