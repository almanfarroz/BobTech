<div class="flex flex-col gap-5 m-5 justify-start min-h-screen">
<h1 class="text-3xl font-thin text-slate-50"> Transaction History </h1>
<?php if(count($complete) > 0){ ?>
    <?php foreach ($complete as $complete): ?>
    <div class="h-fit w-full p-3 rounded-lg font-thin shadow-md bg-slate-500">
        <div class="m-3 flex flex-row justify-between">
        <div class="flex flex-col gap-2">
        <p class="text-lg text-slate-50"> <?= $complete->item_name ?> (<?= $complete->quantity ?>)  </p>
        <p class="text-lg text-slate-50">Rp. <?= $complete->price * $complete->quantity ?> </p>
        <p class="text-xs text-slate-50"><?= $complete->created_at?> </p>
        </div>
        <a href="<?= base_url('invoice/cartInv/'.$complete->id) ?>"><i data-feather="download" class="bg-transparent download-icon"></i></a>
        </div>
    </div>
    <?php endforeach ?>
    <?php } else{ ?>
            <div class="w-full h-10/12 flex justify-center h-screen items-center">
                <h1 class="text-3xl font-thin text-slate-50"> No History </h1>
            </div>
        <?php } ?>
    </div>