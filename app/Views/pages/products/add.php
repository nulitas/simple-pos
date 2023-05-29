<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="p-4 sm:ml-64">
    <div class="p-4 ">

        <section>
            <div class="py-8 px-4 mx-auto max-w-2xl lg:py-4">
                <h2 class="mb-4 text-xl font-bold  text-white">Add a new product</h2>
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
                            <label for="name" class="block mb-2 text-sm font-medium  text-white">Product Name</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border   text-sm  focus:ring-black  block w-full p-2.5  border-gray-600 placeholder-gray-400 text-black focus:border-black focus:border-primary-500" placeholder="Type product name">
                        </div>


                        <div class="sm:col-span-2">
                            <label for="category" class="block mb-2 text-sm font-medium  text-white">Category</label>
                            <select id="category" name="category" class="bg-gray-50 border   text-sm  focus:border-black focus:border-primary-500 block w-full p-2.5  border-gray-600 placeholder-gray-400 text-black focus:border-primary-500">
                                <option selected="" disabled>Select category</option>
                                <option value="Computers & Tech">Computers & Tech</option>
                                <option value="Arts & Music">Arts & Music</option>
                                <option value="Manga/Comic">Manga/Comic</option>
                                <option value="Mysteries">Mysteries</option>
                            </select>
                        </div>
                        <div class="w-full">
                            <label for="price" class="block mb-2 text-sm font-medium  text-white">Price</label>
                            <input type="number" name="price" id="price" class="bg-gray-50 border   text-sm  focus:ring-black focus:border-black block w-full p-2.5  border-gray-600 placeholder-gray-400 text-black focus:border-primary-500" placeholder="Rp.10000">
                        </div>
                        <div class="w-full">
                            <label for="stock" class="block mb-2 text-sm font-medium  text-white">Stock</label>
                            <input type="number" name="stock" id="stock" class="bg-gray-50 border   text-sm  focus:ring-black focus:border-black block w-full p-2.5  border-gray-600 placeholder-gray-400 text-black focus:border-primary-500" placeholder="50">
                        </div>

                    </div>
                    <div class="sm:col-span-2 mt-4 mb-4">
                        <label for="description" class="block mb-2 text-sm font-medium  text-white">Description</label>
                        <textarea id="description" name="description" rows="3" class="resize-none block p-2.5 w-full text-sm  bg-gray-50  border  focus:border-black focus:border-primary-500  border-gray-600 placeholder-gray-400 text-black focus:border-primary-500" placeholder="Your description here"></textarea>
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium  text-white" for="file_input">Upload file</label>
                        <input class="block w-full  text-sm  border   cursor-pointer bg-gray-50 text-gray-400 focus:outline-none  border-white placeholder-gray-400" aria-describedby="image" id="image" name="image" type="file">
                        <p class="mt-1 text-sm text-white " id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                    </div>
                    <a href="#_" class="relative inline-block px-4 py-2 font-medium group my-4">
                        <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                        <span class="absolute inset-0 w-full h-full bg-gray-700 border-2 border-black group-hover:bg-gray-700"></span>
                        <button type="submit" class="relative text-slate-400 group-hover:text-white">
                            Add Product
                        </button>
                    </a>
                </form>
            </div>
        </section>
    </div>
</div>

<?= $this->endSection() ?>