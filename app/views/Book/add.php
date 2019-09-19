<?php
$mang = json_decode( $data["MangCat"] );
?>
<form action="" method="POST" enctype="multipart/form-data" class="mt-4">
<div class="form-group has-success">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category</label>
                                        <select name="Category" class="form-control custom-select">
  
  <?php
  foreach($mang as $k){
  ?>
  <optgroup label="<?php echo $k->name ?>">
    
    <?php foreach($k->mang as $cap2){ ?>
    <option value="<?php echo $cap2->id ?>"><?php echo $cap2->name ?></option>
    <?php } ?>

  </optgroup>
  <?php } ?>

                                        </select>
                                    </div>
</div>  
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" name="Title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter order">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Image</label>
                                        <input type="file" name="BookImage"class="form-control" />
                                    </div>
                                    

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Price</label>
                                        <input type="text" name="Price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter order">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Description</label>
                                        <textarea name="Description" class="form-control"></textarea>
                                         
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Order</label>
                                        <input type="text" name="Order" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter order">
                                    </div>


                                    <div class="custom-control custom-checkbox mr-sm-2 mb-3">
                                        <input type="checkbox" name="active" class="custom-control-input" id="checkbox0" value="check">
                                        <label class="custom-control-label" for="checkbox0">Active to be showed!</label>
                                    </div>

                                    
                                    
                                    <input type="submit" name="btnAddNew" class="btn btn-primary" value="Add new" />
                                </form>