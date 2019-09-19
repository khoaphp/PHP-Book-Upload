<form action="" method="POST" class="mt-4">
                                    
                                    <?php
                                    $row = mysqli_fetch_array($data["CurrentCat"]);
                                    ?>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" value="<?php echo $row["name"] ?>" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Order</label>
                                        <input type="text" value="<?php echo $row["ordering"] ?>" name="ordering" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter order">
                                    </div>


                                    <div class="custom-control custom-checkbox mr-sm-2 mb-3">
                                        <input type="checkbox" <?php if($row["active"]==1) echo "checked"; ?> name="active" class="custom-control-input" id="checkbox0" value="check">
                                        <label class="custom-control-label" for="checkbox0">Active to be showed!</label>
                                    </div>

                                    <div class="form-group has-success">
                                    <select name="selectLevel" class="form-control custom-select">
                                        <option value="0">--Cap 1--</option>

                                        <?php while($row2 = mysqli_fetch_array($data["MangCap0"])){ ?>
                                            <option <?php  
                                            if($row["level"]==$row2["id"])
                                                echo "selected='selected'"
                                            ?> value="<?php echo $row2["id"] ?>">
                                            <?php echo $row2["name"] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    </div>

                                    <input type="hidden" name="ID" value="<?php echo $row["id"] ?>">
                                    
                                    <input type="submit" name="btnEdit" class="btn btn-primary" value="Edit" />
                                </form>