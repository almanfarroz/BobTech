

<div class="bg-slate-700 flex flex-col justify-center items-center h-auto w-full">
<?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-warning flex justify-start w-1/2" role="alert">
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <div class="flex flex-col w-full items-center m-3">
        <div class="flex p-10 items-center justify-center m-3 rounded-lg w-10/12 lg:w-fit text-slate-400 shadow-lg lg:h-fit h-fit">
        <form method="post" action="<?= base_url(); ?> register/process">
            <?= csrf_field(); ?>
            <div class="input-control">
            <input type="text" name="username" id="username" placeholder="Username" class="border border-zinc-700 border-opacity-50 form-control bg-slate-500 input max-w-none w-full rounded-lg mb-5" required autofocus>
            <input type="password" name="password" id="password" placeholder="Password" class="border border-zinc-700 border-opacity-50 form-control input bg-slate-500 max-w-none w-full rounded-lg mb-5" required>
            <input type="password" name="password_conf" id="password_conf" placeholder="Confirm Password" class="border border-zinc-700 border-opacity-50 form-control input bg-slate-500 max-w-none w-full rounded-lg mb-5" required>
            <input type="text" name="name" id="name" placeholder="Full Name" class="border border-zinc-700 border-opacity-50 form-control bg-slate-500 input max-w-none w-full rounded-lg mb-5" required autofocus>
            <label class="text-slate-200" for="birth_date">Birth Date</label>
            <input type="date" name="birth_date" id="birth_date" class="border border-zinc-700 border-opacity-50 bg-slate-500 max-w-none h-14 w-full rounded-lg mb-5" placeholder="Birth Date" required>
            <textarea name="address" id="address" class="border border-zinc-700 border-opacity-50 resize-none form-control bg-slate-500 input max-w-none w-full rounded-lg mb-5 h-24" placeholder="Address"></textarea>
            <button type="submit" class="btn btn-wide max-w-none lg:w-96 w-full mb-3 bg-zinc-700 text-slate-200">Create Your Account</button>
        </div>
        </form>
        </div>
            </div>
</div>