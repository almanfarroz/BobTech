<div class="flex justify-center w-full">
<div class="flex lg:flex-row w-3/4 flex-col gap-5 min-h-screen items-center lg:items-start justify-center lg:justify-between m-5">
<div class="sm:w-5/12 w-full rounded">
  <img src="<?php echo base_url(); echo $data['imagePath']; ?>">
    </div>

    <form method="post" class="w-full m-0" action="<?php if(session('isAdmin')){ echo base_url('/update_stock'); } else if(!session('isAdmin')){ echo base_url('/add_transactions'); }?>">
    <div class="flex flex-col gap-5 h-full text-slate-50">
      <input type="hidden" value="<?= $data['id'] ?>" name="id" id="id">
        <input <?php if(!session('isAdmin')){echo "readonly";} ?> type="text" name="item_name" id="item_name" class="w-full max-w-none text-lg lg:text-2xl bg-transparent" value="<?php echo $data['name'] ?>"/>
        <div class="flex flex-col justify-center">
        <h3>Rp. <?= number_format($data['price'], 2,',','.'); ?></h3>
        <input <?php if(!session('isAdmin')){echo "type='hidden'";}else{echo 'type="number"';} ?>  name="price" id="price" class="text-base lg:text-lg bg-transparent text-zinc" value="<?php echo $data['price'] ?>">
        </div>
        <input <?php if(!session('isAdmin')){echo "readonly";} ?>  type="text" name="desc" id="price" class="text-base lg:text-lg bg-transparent text-zinc" value="<?php echo $data['desc'] ?>">
        <h3 class="text-base text-slate-50"> Stock: <?= $data['stock'] ?> </h3>

        <select name="payment_method" id="payment_method" class="bg-slate-500 text-slate-50 rounded-lg h-12 lg:w-1/3" <?php if(!session('isAdmin')) echo "required"; ?>>
                        <option value="">Payment Method</option>
                        <?php foreach ($payment as $key => $value) : ?>
                        <option value="<?=$value['payment_method']?>" ><?=$value['payment_method']?> - (admin fee: <?=$value['admin_fee']?>) </option>
                        <?php endforeach; ?>
                    </select>
                    <select name="courier" id="courier" class="bg-slate-500 text-slate-50 rounded-lg h-12 lg:w-1/3" <?php if(!session('isAdmin')) echo "required"; ?>d>
                        <option value="">Courier</option>
                        <?php foreach ($courier as $key => $value) : ?>
                        <option value="<?=$value['courier_name']?>" ><?=$value['courier_name']?> - (price: <?=$value['price']?>)</option>
                        <?php endforeach; ?>
                    </select>
        <div class="form-control">
  <label class="input-group w-full">
    <span class="bg-zinc-700 text-slate-200">Qty</span>
    <input type="number" name="quantity" max="<?= $data['stock'] ?>"  class="input w-full lg:w-1/4 input-bordere bg-slate-500" <?php if(!session('isAdmin')) echo "required"; ?> />
  </label>
</div>    <?php if(!session('isAdmin')) { ?>
          <button type="submit" class="p-3 rounded-lg text-zinc-800  bg-zinc-200 active:bg-slate-400 hover:bg-slate-300"> Order Now </button>
          </form>
          <?php } else{ ?>
          <button type="submit" class="p-3 rounded-lg text-slate-200  bg-zinc-700 active:bg-zinc-900 hover:bg-zinc-800"> Edit Data </button>
          </form>
          <?php } ?>
          

    </div>
 
  </div>
</div>

