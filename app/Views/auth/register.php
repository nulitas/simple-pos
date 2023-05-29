<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="sm:ml-64">


    <section>
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center  text-2xl font-semibold  text-white">
                Add an account
            </a>
            <div class="p-6 space-y-2  sm:p-8">

                <form class="space-y-2 " action="<?= base_url('auth/register/store') ?>" method="POST">
                    <?= csrf_field(); ?>


                    <?php
                    if (session()->getFlashData('msg')) {
                        echo session()->getFlashData('msg');
                    }
                    ?>

                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium  text-white">Your username</label>
                        <input type="username" name="username" id="username" class=" border  sm:text-sm  focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-white border-gray-600 placeholder-gray-400 text-black focus:ring-black focus:border-black" placeholder="admin" required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium  text-white">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="border  sm:text-sm  focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-white border-gray-600 placeholder-gray-400 text-black focus:ring-black focus:border-black" required="">
                    </div>

                    <div>
                        <label for="passwordconf" class="block mb-2 text-sm font-medium  text-white">Password Confirmation</label>
                        <input type="password" name="passwordconf" id="passwordconf" placeholder="••••••••" class="border  sm:text-sm  focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-white border-gray-600 placeholder-gray-400 text-black focus:ring-black focus:border-black" required="">
                    </div>
                    <div>
                        <select name="roles" id="roles" class="border text-sm  block w-full p-2.5 bg-white border-gray-600 placeholder-gray-400 text-black focus:ring-black focus:border-black">
                            <?php foreach ($role as $r) : ?>
                                <option value="<?= $r['id'] ?>"> <?= $r['name'] ?> </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <a href="#_" class="relative inline-block px-4 py-2 font-medium group my-4">
                        <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                        <span class="absolute inset-0 w-full h-full bg-gray-700 border-2 border-black group-hover:bg-gray-700"></span>
                        <button type="submit" class="relative text-slate-400 group-hover:text-white">
                            Add User
                        </button>
                    </a>
                </form>
            </div>

        </div>
    </section>


</div>


<?= $this->endSection(); ?>