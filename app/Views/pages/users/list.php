<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="p-4 sm:ml-64">
    <div class="p-4 ">
        <h1 class=" text-2xl font-bold">..> Users</h1>
        <div class="lg:grid-cols-5 grid-cols-1  gap-4 m-4">

            <a href="<?= base_url('auth/register') ?>" class="relative inline-block px-4 py-2 font-medium group my-4">
                <span class="absolute inset-0 w-full h-full transition duration-200 ease-out transform translate-x-1 translate-y-1 bg-black group-hover:-translate-x-0 group-hover:-translate-y-0"></span>
                <span class="absolute inset-0 w-full h-full bg-gray-700 border-2 border-black group-hover:bg-gray-700"></span>
                <span class="relative text-slate-400 group-hover:text-white">
                    + Add User
                </span>
            </a>
        </div>

        <div class="relative overflow-x-auto  shadow-lg">
            <table class="w-full text-sm text-left text-white ">
                <thead class="text-xs text-black uppercase bg-gray-200 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Username
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Role
                        </th>
                        <!-- <th scope="col" class="px-6 py-3">
                            Actions
                        </th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($user as $u) : ?>
                        <tr class="border-b bg-gray-800 border-gray-700">

                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                                <?= $i++ ?>
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                                <?= $u['username'] ?>
                            </th>
                            <td class="px-6 py-4">

                                <?= $u['role'] ?>
                            </td>
                            <!-- <td class="px-6 py-4">
                                Edit | Delete
                            </td> -->

                        </tr>

                    <?php endforeach ?>
                    <?php if (count($user) <= 0) : ?>
                        <tr>
                            <td class="p-4 text-center" colspan="7">not found.</td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>

    </div>

    <?= $this->endSection() ?>