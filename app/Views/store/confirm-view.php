<div class="flex justify-center min-h-screen items-center">
    <div class="w-fit h-fit flex flex-col gap-5 p-5 m-3 rounded-lg shadow-lg bg-slate-500 items-center justify-center">
    <i data-feather="check-circle" class="text-slate-50 h-1/5 w-1/5"></i>
        <h1 class="text-2xl lg:text-3xl text-slate-200"> Thank You! </h1>
        <h2 class="text-base lg:text-xl text-slate-200"> Your Payment Has Been Confirmed. </h2>
        <div class="flex lg:flex-row flex-col gap-5">
        <a href="<?= base_url('/invoice')?>" target="_blank" class="p-3 rounded-lg bg-zinc-300 text-zinc-800"> Download Invoice </a>
        <a href="<?= base_url('/') ?>" class="p-3 rounded-lg bg-zinc-700 text-slate-200"> Continue Shopping </a>
        </div> 
    </div>
</div>