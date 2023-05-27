
<div class=" flex flex-col justify-center m-5 min-h-screen overflow-auto" id="history">
<h1 class="text-3xl font-thin text-slate-50 m-5"> Transaction Report </h1>
<table class="w-full text-slate-300 shadow-md min-h-5/6 max-h-5/6 border-white table-compact text-center overflow-scroll">
    <thead class="bg-zinc-800 text-slate-200  sticky top-0">
      <tr>
        <td class="w-10"> No. </td>
        <td> Item Name</td>
        <td> Size </td>
        <td> Quantity </td>
        <td> Buyer </td>
        <td> Address </td>
        <td> Payment Method </td>
        <td> Delivery Courier </td>
        <td> Total Price </td>
        <td> Transaction Time </td>
        <td> Type </td>
        <?php if (session('logged_in')) { ?>
          <td> Invoice </td>
        <?php } ?>
      </tr>
    </thead>
    <tbody class="bg-slate-500 text-slate-300">
<?php if(count($data) > 0){ ?>
    <?php foreach ($data as $data): ?>
        <tr> 
                        <td> <?= $number++ ?>  </td>
                        <td> <?= $data['item_name'] ?>  </td> 
                        <td> <?= $data['price'] ?> </td> 
                        <td> <?= $data['quantity'] ?> </td> 
                        <td> <?= $data['user'] ?> </td> 
                        <td> <?= $data['address'] ?> </td> 
                        <td> <?= $data['payment_method'] ?> </td> 
                        <td> <?= $data['delivery_courier'] ?> </td> 
                        <td> <?= $data['total_price'] ?> </td>
                        <td> <?= $data['created_at'] ?> </td>
                        <td> <?= $data['type'] ?> </td>
                        <td class="flex justify-center"> <a href="<?= base_url('invoice/cartInv/'.$data['id']) ?>" class="w-5 h-5"><i data-feather="download" class="bg-transparent download-icon"></i></a> </td>
                        </tr>
    <?php endforeach ?>
    </tbody>
  </table>
  
<?= $pager->links('data', 'pagination') ?>
    <?php } else{ ?>
      <tr>
      <td> 1  </td>
                        <td> No History  </td> 
                        <td> No History  </td> 
                        <td>No History </td> 
                        <td> No History </td> 
                        <td> No History </td> 
                        <td> No History </td> 
                        <td> No History </td> 
                        <td> No History </td> 
                        <td>No History </td>
                        <td> No History </td>
                        <td> No History </td>
      </tr>
    </tbody>
    </table>
        <?php } ?>
    </div>


    <div id="buy" class="min-h-screen bg-slate-500 flex justify-center items-center">
      <div class="bg-slate-700 rounded-lg shadow-2xl lg:w-8/12">
      <form method="post" action="<?= base_url('admin/BuyItem') ?>">
        <div class="m-3 flex flex-col gap-5 lg:gap-3 p-3 min-w-max">
        <h1 class="text-3xl font-thin text-slate-50 m-3"> Buy From Suppliers </h1>
        
        <div class="flex flex-col lg:flex-row gap-5 lg:gap-2 justify-center">
    <select name="supplier" id="supplier" class="bg-slate-500 text-slate-50 rounded-lg h-12 lg:w-1/3" <?php if(!session('isAdmin')) echo "required"; ?>>
                        <option value="">Select Supplier</option>
                        <?php foreach ($supplier as $key => $value) : ?>
                        <option value="<?=$value['id']?>" ><?=$value['supplier_name']?> </option>
                        <?php endforeach; ?>
                    </select>

                    <select name="category" id="category" class="bg-slate-500 text-slate-50 rounded-lg h-12 lg:w-1/3" <?php if(!session('isAdmin')) echo "required"; ?>>
                        <option value="">Select Category</option>
                        <?php foreach ($category as $key => $value) : ?>
                        <option value="<?=$value['id']?>" ><?=$value['category_name']?> </option>
                        <?php endforeach; ?>
                    </select>

                    <select name="stock" id="stock" class="bg-slate-500 text-slate-50 rounded-lg h-12 max-w-full w-full lg:w-1/3" <?php if(!session('isAdmin')) echo "required"; ?>>
                        <option value="">Select Item</option>
                    </select>
                        </div>
                        <label class="input-group w-full">
    <span class="bg-zinc-800 text-slate-200">Qty</span>
                    <input type="number" name="quantity" id="quantity" value=0  class="input w-full input-bordered bg-slate-500 text-white" <?php if(!session('isAdmin')) echo "required"; ?> />
                        </label>

                          <div class="flex flex-row gap-1" id="price">
                    <p class="text-sm"> Total Price: </p>
                    </div>

                    <input type="submit" class="btn bg-slate-400 text-black" value="buy">
     
                        </div>
                        </form>
    </div>
        </div>

                          
        <div class="flex flex-col justify-center m-5 min-h-screen overflow-auto" id="stockDetails">
        <h1 class="text-3xl font-thin text-slate-50 m-5"> Stock Details </h1>
<table class="w-full text-slate-300 shadow-md min-h-5/6 border-white table-compact text-center overflow-scroll" id="stock">
    <thead class="bg-zinc-800 text-slate-200  sticky top-0">
      <tr>
        <td class="w-10"> No. </td>
        <td> Item Name</td>
        <td> Price </td>
        <td> Stock </td>
        <td> Desc </td>
        <td> Category </td>
        <td> Supplier </td>
      </tr>
    </thead>
    <tbody class="bg-slate-500 text-slate-300">
<?php if(count($stock) > 0){ ?>
    <?php $no=1; foreach ($stock as $stock): ?>
        <tr> 
                        <td> <?= $no++ ?>  </td>
                        <td> <?= $stock->name ?>  </td> 
                        <td> <?= $stock->price ?>  </td> 
                        <td> <?= $stock->stock ?> </td>  
                        <td> <?= $stock->desc ?> </td> 
                        <td> <?= $stock->category_name ?> </td> 
                        <td> <?= $stock->supplier_name ?> </td>
                        </tr>
    <?php endforeach ?>
    </tbody>
  </table>
    <?php } else{ ?>
      <tr>
      <td> 1  </td>
                        <td> No History  </td> 
                        <td> No History  </td> 
                        <td>No History </td> 
                        <td> No History </td> 
                        <td> No History </td> 
                        <td> No History </td> 
      </tr>
    </tbody>
    </table>
        <?php } ?>
    </div>


    <div id="incomeOutcome" class="flex flex-col lg:flex-row gap-20 bg-slate-500 justify-center items-center w-full min-h-screen overflow-auto" id="stockDetails">
        <div class="p-5 bg-zinc-700 text-white w-2/3 lg:w-1/3 rounded-lg flex-col shadow-lg">
          <h1>Total Income</h1>
          <h3> Rp. <?= number_format($in_out['income'], '2','.'.'') ?> </h3>
        </div>

        <div class="p-5 flex-col rounded-lg bg-zinc-700 text-white w-2/3 lg:w-1/3 shadow-lg">
          <h1>Total Outcome</h1>
          <h3> Rp. <?= number_format($in_out['outcome'], '2','.'.'') ?> </h3>
        </div>

    </div>

    <div id="addItem" class="min-h-screen bg-slate-700 flex flex-col m-10 gap-3 justify-center items-center">
    <div class="bg-slate-500 rounded-lg shadow-2xl lg:w-8/12">
      <form method="post" action="<?= base_url('admin/AddSupplier') ?>">
      
        <div class="m-3 flex flex-col gap-5 lg:gap-3 p-3 min-w-max">
        <h1 class="text-3xl font-thin text-slate-50 m-3"> Add Supplier </h1>
         <?php if (!empty(session()->getFlashdata('error'))) : ?>
          <div class="alert alert-warning w-10/12 mb-3" role="alert">
                <?php echo session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>
        <div class="flex flex-col lg:flex-row gap-5 lg:gap-2 justify-center">
                    <input type="text" name="SupplierName" id="SupplierName" placeholder="Supplier Name" class="input w-full input-bordered bg-slate-700 text-white" <?php if(!session('isAdmin')) echo "required"; ?> />
                    <input type="submit" class="btn bg-slate-400 text-black" value="Add">
     
                        </div>
         </div>
                        </form>
         </div>

         <div class="bg-slate-500 rounded-lg shadow-2xl lg:w-8/12">
      <form method="post" action="<?= base_url('admin/AddCategory') ?>" enctype="multipart/form-data">
      
        <div class="m-3 flex flex-col gap-5 lg:gap-3 p-3 min-w-max">
        <h1 class="text-3xl font-thin text-slate-50 m-3"> Add Category </h1>
         <?php if (!empty(session()->getFlashdata('error'))) : ?>
          <div class="alert alert-warning w-10/12 mb-3" role="alert">
                <?php echo session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>
        <div class="flex flex-col lg:flex-row gap-5 lg:gap-2 justify-center">
                    <input type="text" name="CategoryName" id="CategoryName" placeholder="Item Name" class="input w-full input-bordered bg-slate-700 text-white" <?php if(!session('isAdmin')) echo "required"; ?> />
                    <input type="submit" class="btn bg-slate-400 text-black" value="Add">
     
                        </div>
         </div>
                        </form>
         </div>


      <div class="bg-slate-500 rounded-lg shadow-2xl lg:w-8/12">
      <form method="post" action="<?= base_url('admin/AddItem') ?>" enctype="multipart/form-data">
      
        <div class="m-3 flex flex-col gap-5 lg:gap-3 p-3 min-w-max">
        <h1 class="text-3xl font-thin text-slate-50 m-3"> Add Items </h1>
         <?php if (!empty(session()->getFlashdata('error'))) : ?>
          <div class="alert alert-warning w-10/12 mb-3" role="alert">
                <?php echo session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>
        <div class="flex flex-col lg:flex-row gap-5 lg:gap-2 justify-center">
         <select name="ItemSupplier" id="ItemSupplier" class="bg-slate-700 text-slate-50 rounded-lg h-12 lg:w-1/2" <?php if(!session('isAdmin')) echo "required"; ?>>
                        <option value="">Select Supplier</option>
                        <?php foreach ($supplier as $key => $value) : ?>
                        <option value="<?=$value['id']?>" ><?=$value['supplier_name']?> </option>
                        <?php endforeach; ?>
                    </select>

                    <select name="ItemCategory" id="ItemCategory" class="bg-slate-700 text-slate-50 rounded-lg h-12 lg:w-1/2" <?php if(!session('isAdmin')) echo "required"; ?>>
                        <option value="">Select Category</option>
                        <?php foreach ($category as $key => $value) : ?>
                        <option value="<?=$value['id']?>" ><?=$value['category_name']?> </option>
                        <?php endforeach; ?>
                    </select>
                        </div>
                    <input type="text" name="ItemName" id="ItemName" placeholder="Item Name" class="input w-full input-bordered bg-slate-700 text-white" <?php if(!session('isAdmin')) echo "required"; ?> />
                    <label class="input-group w-full">
                      <span> Rp. </span>
                    <input type="number" name="ItemPrice" id="ItemPrice" value=0  class="input w-full input-bordered bg-slate-700 text-white" <?php if(!session('isAdmin')) echo "required"; ?> />
                        </label>

                        <div class="form-control w-full max-w-xs">
  <label class="label">
    <span class="label-text text-white">Upload Image</span>
  </label>
  <input type="file" accept="image/*" class="file-input file-input-bordered w-full max-w-xs bg-slate-700" id="image" name="image" required />
</div>

                    <input type="submit" class="btn bg-slate-400 text-black" value="buy">
     
                        </div>
                        </form>
    </div>
        </div>


<script>
        $(document).ready(function(){

      $('#category').change(function() {
        var category = $("#category").val();
        var supplier = $("#supplier").val();
        if(category > 0){
$.ajax({
  method: "POST",
          url: "<?= base_url('admin/stock') ?>",
          cache: false,
data:{category: category, supplier: supplier},
success: function(data){
  $('#stock').html(data)
}
})
        }
      });
      $('#supplier').change(function() {
        var category = $("#category").val();
        var supplier = $("#supplier").val();
        if(supplier > 0){
$.ajax({
  method: "POST",
          url: "<?= base_url('admin/stock') ?>",
          cache: false,
data:{category: category, supplier: supplier},
success: function(data){
  $('#stock').html(data)
}
})
        }
      });

        $('#stock').change(function() {
        var stock = $("#stock").val();
        var quantity = $("#quantity").val();
        if(stock > 0){
$.ajax({
  method: "POST",
          url: "<?= base_url('admin/price') ?>",
          cache: false,
data:{stock:stock, quantity:quantity},
success: function(data){
  $('#price').html(data)
}
})
        }
      });

      $('#quantity').change(function() {
        var quantity = $("#quantity").val();
        var stock = $("#stock").val();
        if(quantity > 0){
$.ajax({
  method: "POST",
          url: "<?= base_url('admin/price') ?>",
          cache: false,
data:{quantity:quantity, stock:stock},
success: function(data){
  $('#price').html(data)
}
})
        }
      });
      $('#quantity').keyup(function() {
        var quantity = $("#quantity").val();
        var stock = $("#stock").val();
        if(quantity > 0){
$.ajax({
  method: "POST",
          url: "<?= base_url('admin/price') ?>",
          cache: false,
data:{quantity:quantity, stock:stock},
success: function(data){
  $('#price').html(data)
}
})
        }
      });
    });

</script>