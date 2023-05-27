<div class="flex flex-row w-full justify-center items-center min-h-screen">
    <div class="flex p-3 text-slate-400 bg-slate-600 flex-col m-3 h-3/6 w-4/6 rounded-lg shadow-lg">
    <div class="flex flex-col items-start border-b border-zinc-700">
    <h1 class="text-xl m-3 text-slate-50 text-bold"> Address: </h1>
    <p class="text-lg ml-3 mb-3 text-slate-50"> <?= $data['address'] ?> </p>
    </div>
    <div class="flex flex-col h-full">

<form method="post" action="<?=base_url('/update_status')?>">
  
    <div class="flex flex-col gap-5 m-5 h-full w-ful text-slate-50">
        <input type="hidden" value="<?= $data['id']; ?>" name="id">
        <input type="hidden" value="<?= $data['quantity']; ?>" name="quantity">
        <input type="hidden" value="<?= $data['price']; ?>" name="price">
        <input readonly type="text" name="item_name" class="input text-2xl h-fit text-center ml-0 w-full bg-transparent max-w-none" value="<?php echo $data['item_name'] ?>"/>
        <div class="flex flex-row gap-1 items-center text-lg">
        <h3>Price:</h3>
        <h3>Rp. <?= number_format($data['price'], 2,',','.'); ?></h3>
        </div>
    <h3 class="text-lg text-slate-50"> Quantity: <?= $data['quantity']; ?>  </h3>
    <h3 class="text-lg text-slate-50"> Payment Method: <?= $data['payment_method']; ?> ( Rp.<?= number_format($paymentArr['admin_fee'], 2,',','.'); ?> )  </h3>
    <h3 class="text-lg text-slate-50"> Delivery Courier: <?= $data['delivery_courier']; ?> ( Rp<?= number_format($courierArr['price'], 2,',','.'); ?> )  </h3>
<h1 class="text-lg text-slate-50 border-t border-zinc-700"> Total Price: Rp.<?= number_format($data['total_price'], 2,',','.'); ?> </h1>
<button type="submit" class="btn bg-zinc-800"> Place Order </button>
</div>
</form>
</div>

  </div>
</div>