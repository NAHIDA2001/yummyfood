<?php
include_once './inc/header.php';
?>
<h2>Add Banner</h2>
<div class="card">
 <div class="card-header bg-primary text-light">
  Add new Banner Here....
 </div>
 <div class="card-body">
    <form action="">
<div class="row aling-item-center">
 <div class="col-lg-3">
  <label for="bannerImage">  <img src="https://www.shutterstock.com/image-vector/ui-image-placeholder-wireframes-apps-260nw-1037719204.jpg" alt="" style="width: 100%;display:block;"></label>
    <input type="file" class="d-none" id="bannerImage" name="bannerImage">

 </div>
<div class="col-lg-9">

 <label class="w-100">
    Insert a Banner Title<span class="text-danger">*</span>
    <input type="text" name="title" class="form-control">
 </label>
 <label class="w-100">
    Insert a Video Link<span class="text-danger">*</span>
    <input type="text" name="video" class="form-control">
 </label>
 <label class="w-100">
    Insert a Banner Description<span class="text-danger">*</span>
    <input type="text" name="des" class="form-control">
 </label>

 </div>
 </div>
 <button class="btn btn-primary float-right">Insert</button>
 </form>
 </div>

</div>



<?php
include_once './inc/footer.php';
?>