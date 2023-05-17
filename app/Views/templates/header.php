<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.6/dist/full.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/lunaticLogo.png" />
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
    <title>LNTC</title>
</head>
<style>
::-webkit-calendar-picker-indicator {
    filter: invert(1);
}
  </style>
<body class="bg-slate-200">

<div class="navbar bg-slate-50 text-black shadow-lg sticky top-0 z-50">
  <div class="navbar-start">
    <div class="dropdown">
      <label tabindex="0" class="btn btn-ghost lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
      </label>
      <ul tabindex="0" class="menu menu-compact text-sm  vb dropdown-content mt-3 p-2 shadow bg-slate-100 rounded-box w-52">
        <li><a href="<?= base_url('/') ?>">Home</a></li>
        <li tabindex="0">
          <a class="justify-between">
            Menus
            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z"/></svg>
          </a>
          <ul class="p-2 bg-slate-100">
            <li><a href="<?= base_url('store') ?>">Our Collection</a></li>
            <li><a href="<?= base_url('/cart') ?>"><i data-feather="shopping-cart" class="text-zinc-700"></i>Cart</a></li>
          </ul>
        </li>
        <li><a>About</a></li>
      </ul>
    </div>
    <a  href="<?= base_url("/") ?>" class="w-12 m-3"><img src="<?php echo base_url();?>assets/lunaticLogo.png"></a>
  </div>
  <div class="navbar-center hidden lg:flex">
    <ul class="menu menu-horizontal px-1">
      <li><a class="active:bg-zinc-500" href="<?= base_url('/') ?>">Home</a></li>
      <li tabindex="0">
        <a class="active:bg-zinc-500">
          Menu
          <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
        </a>
        <ul class="p-2 bg-slate-100 z-50 text-sm">
          <li><a class="active:bg-zinc-500" href="<?= base_url('store') ?>"><i data-feather="shopping-bag" class="text-zinc-700"></i>Our Collection</a></li>
          <li><a href="<?= base_url('cart') ?>" class="active:bg-zinc-500"><i data-feather="shopping-cart" class="text-zinc-700"></i>Cart</a></li>
        </ul>
      </li>
      <li><a class="active:bg-zinc-500">About</a></li>
    </ul>
  </div>
  <div class="navbar-end">
    <?php if(!session("logged_in")){ ?>
    <a href="<?= base_url('login') ?>" class=" font-semibold text-base text-black mr-3">Log In</a>
    <?php } else{ ?>
      <div class="dropdown dropdown-end">
  <label tabindex="0" class="m-3 cursor-pointer"><?php echo session("name") ?></label>
  <ul tabindex="0" class="dropdown-content menu p-2 text-sm shadow bg-slate-100 text-black rounded-box w-52">
    <li><a class="active:bg-zinc-500">Profile</a></li>
    <li><a class="active:bg-zinc-500" href="<?=base_url('logout')?>">Logout</a></li>
  </ul>
</div> 
      <?php } ?>
  </div>
</div>
