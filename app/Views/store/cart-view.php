
<div class="flex flex-col gap-5 m-5 justify-start min-h-screen">
    <h1 class="text-3xl font-thin text-slate-50"> Pending Orders </h1>
    <?php if(count($pending) > 0){ ?>
    <?php foreach ($pending as $pending): ?>
        <a href="<?= base_url('transaction/cartTransaction/').$pending->id?>">
    <div class="h-fit w-full p-3 rounded-lg font-thin shadow-md bg-slate-500">
        <div class="m-3 flex flex-row justify-between">
        <div class="flex flex-col gap-2">
        <p class="text-lg text-slate-50"> <?= $pending->item_name ?> (<?= $pending->quantity ?>)  </p>
        <p class="text-lg text-slate-50">Rp. <?= $pending->price * $pending->quantity ?> </p>
        </div>
        <label class="trash-icon" data-id="<?= $pending->id ?>" for="my-modal-6"><i ="trash" class="bg-transparent trash-icon"></i></label>
        </div>
    </div>
    </a>
    <?php endforeach ?>
    <?php } else{ ?>
            <div class="w-full h-10/12 flex justify-center h-screen items-center">
                <h1 class="text-3xl font-thin text-slate-50"> Your Cart is Empty </h1>
            </div>
        <?php } ?>
</div>

<!-- The button to open modal -->


<!-- Put this part before </body> tag -->
<input type="checkbox" id="my-modal-6" class="modal-toggle" />
<div class="modal modal-bottom sm:modal-middle text-slate-50">
  <div class="modal-box bg-slate-500">
    <div class="flex flex-row gap-3 items-center">
    <i data-feather="x-circle" class="w-14 h-14 text-red-500"></i>
    <h3 class="font-light text-lg text-slate-50">Are you sure you want to cancel your order?</h3>
    </div>
    <div class="modal-action">
    <label for="my-modal-6" class="btn bg-transparent border-zinc-700 w-24 text-slate-50">No</label>
    <a id="deleteBtn" class="btn bg-red-500 border-none w-24 text-slate-200 px-8"> Yes </a>
    </div>
  </div>
</div>


<script>
    $('.trash-icon').click(function(){
    //get cover id
    var id=$(this).data('id');
    //set href for cancel button
    $('#deleteBtn').attr('href','<?= base_url('cart/cancel/')?>'+id);
})
  </script>
