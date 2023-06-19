<?= $this->extend('layouts/login_base'); ?>
<?= $this->section('auth'); ?>

<section class=" bg-gray-900">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <h1 class="flex items-center mb-6 text-3xl font-bold  text-white">
            /p<span class=" text-pink-500">osu<s>!!</s></span>
        </h1>
        <div class="w-full rounded-lg shadow border md:mt-0 sm:max-w-md xl:p-0 bg-white border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">

                <h1 class="text-xl font-bold leading-tight tracking-tight  md:text-2xl text-black">
                    Sign up to your account
                </h1>
                <form class="space-y-4 md:space-y-6" action="<?= base_url('auth/storeup') ?>" method="POST">
                    <?= csrf_field(); ?>


                    <?php
                    if (session()->getFlashData('msg')) {
                        echo session()->getFlashData('msg');
                    }
                    ?>

                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium  text-black">Your username</label>
                        <input type="username" name="username" id="username" class=" border   sm:text-sm  focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-white border-gray-600 placeholder-gray-400 text-black focus:ring-black focus:border-black" placeholder="admin" required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium  text-black">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class=" border   sm:text-sm  focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-white border-gray-600 placeholder-gray-400 text-black focus:ring-black focus:border-black" required="">
                    </div>

                    <div>
                        <label for="passwordconf" class="block mb-2 text-sm font-medium  text-black">Password Confirmation</label>
                        <input type="password" name="passwordconf" id="passwordconf" placeholder="••••••••" class="border  sm:text-sm  focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-white border-gray-600 placeholder-gray-400 text-black focus:ring-black focus:border-black" required="">
                    </div>

                    <a href="#_" class="relative inline-block px-4 py-2 font-medium group w-full text-center">
                        <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                        <span class="absolute inset-0 w-full h-full bg-white border-2 border-black group-hover:bg-black"></span>
                        <button type="submit" class="relative text-black group-hover:text-white">Sign Up</button> </a>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Already have an account? <a href="<?= base_url('auth/login') ?>" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign in</a>
                    </p>



                </form>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>