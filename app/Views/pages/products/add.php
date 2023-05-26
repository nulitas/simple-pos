<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="p-4 sm:ml-64">
    <div class="p-4 ">

        <section class="bg-white dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-2xl lg:py-4">
                <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new product</h2>
                <form action="/product/store" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>


                    <?php
                    if (session()->getFlashData('msg')) {
                        echo session()->getFlashData('msg');
                    }
                    ?>

                    <?php echo \Config\Services::validation()->listErrors() ?>


                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name">
                        </div>


                        <div class="sm:col-span-2">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                            <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected="" disabled>Select category</option>
                                <option value="Computers & Tech">Computers & Tech</option>
                                <option value="Arts & Music">Arts & Music</option>
                                <option value="Manga/Comic">Manga/Comic</option>
                                <option value="Mysteries">Mysteries</option>
                            </select>
                        </div>
                        <div class="w-full">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                            <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Rp.10000">
                        </div>
                        <div class="w-full">
                            <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
                            <input type="number" name="stock" id="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="50">
                        </div>

                    </div>
                    <div class="sm:col-span-2 mt-4 mb-4">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="description" name="description" rows="3" class="resize-none block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your description here"></textarea>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
                        <input class="block w-full  text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="image" id="image" name="image" type="file">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                    </div>
                    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                        Add product
                    </button>
                </form>
            </div>
        </section>
    </div>
</div>

<?= $this->endSection() ?>