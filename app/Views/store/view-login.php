

<div class="bg-slate-700 flex flex-col justify-start lg:justify-center items-center h-screen w-full">
<?php if (!empty(session()->getFlashdata('error'))) : ?>
            <div class="alert alert-warning w-10/12 mb-3" role="alert">
                <?php echo session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>
        <div class="flex mt-5 lg:p-10 bg-transparent flex-row items-center gap-10 justify-start lg:justify-center rounded-md lg:shadow-lg w-full lg:mt-0 lg:w-fit lg:bg-slate-600 h-fit">
        <img src="<?= base_url() ?>assets/logo.png" class="hidden lg:flex">
        <form method="post" action="<?= base_url(); ?>login/process" class="flex flex-col w-full m-3">
            <?= csrf_field(); ?>
            <h1 class="h3 mb-3 fw-normal text-xl text-white">Login</h1>
            <input type="text" name="username" id="username" placeholder="Username" class="border border-zinc-700 border-opacity-50 form-control text-white bg-slate-500 input max-w-none w-full rounded-lg mb-5" required autofocus>
            <input type="password" name="password" id="password" placeholder="Password" class="border border-zinc-700 border-opacity-50 form-control input text-white bg-slate-500 max-w-none w-full rounded-lg mb-5" required>
            <button type="submit" class="btn btn-wide max-w-none lg:w-96 w-full mb-3 bg-zinc-600">Login</button>

            <div class="flex flex-col gap-5px">
            <p class="text-sm text-slate-200"> Don't have an accout?<p> <a class="pe-auto text-sm text-blue-500" href="<?= base_url('register') ?>"> Sign Up <a>
        </div>
        </form>
        </div>

</div>