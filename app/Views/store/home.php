<div class="flex flex-col bg-slate-700 overflow-hidden">
<div class="hero min-h-screen" style="background-image: url(<?php echo base_url();?>assets/hero.jpg);">
  <div class="hero-overlay bg-opacity-80"></div>
  <div class="hero-content text-center text-neutral-content">
    <div class="max-w-md">
      <img src="<?= base_url()?>assets/logo.png" class="ml-2">
      <p class="mb-5"> Computer Parts For Everyone. </p>
    <a href="<?= base_url() ?>#buy">  <button class="underline font-bold text-xl">Buy Computer Parts</button> </a>
    </div>
  </div>
</div>

<div class="my-5 flex w-full flex-col gap-3 justify-center items-center  h-auto lg:min-h-screen" id="buy">

<select name="category" id="category" class="bg-slate-500 mt-24 text-slate-50 rounded-lg h-12" <?php if(!session('isAdmin')) echo "required"; ?>>
                        <option value="">Select Category</option>
                        <?php foreach ($category as $key => $value) : ?>
                        <option value="<?=$value['id']?>" ><?=$value['category_name']?> </option>
                        <?php endforeach; ?>
                    </select>

    <div class="grid grid-cols-2 lg:grid-cols-4 justify-center flex-wrap gap-5" id="items">
<?php if(count($list) > 0){ ?>
<?php $i=1; ?>
<?php foreach($list as $row): ?>
    <a href="<?= base_url('buy/display/'.$row->id)?>">
    <div class="card text-white cursor-pointer w-40 lg:w-64 h-80 lg:h-96 min-h-none bg-slate-500 shadow-xl rounded-lg">
  <figure><img src="<?php echo base_url(); echo $row->imagePath; ?>" alt="Shoes" class="w-" /></figure>
  <div class="card-body">
    <h2 class="card-title text-sm">
      <?= $row -> name ?>
    </h2>
    <p class="text-sm">Rp.<?= number_format($row->price, 2,',','.'); ?> </p>
  </div>
</div>
</a>
    <?php endforeach; ?>
    <?php } ?>
</div>
</div>

<script>
        $(document).ready(function(){

      $('#category').change(function() {
        var category = $("#category").val();
        if(category > 0){
$.ajax({
  method: "POST",
          url: "<?= base_url('main/stock') ?>",
          cache: false,
data:{category: category},
success: function(data){
  $('#items').html(data)
}
})
        }
      });
    });

</script>