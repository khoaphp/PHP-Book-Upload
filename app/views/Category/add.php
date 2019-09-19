                                <form action="" method="POST" class="mt-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Order</label>
                                        <input type="text" name="ordering" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter order">
                                    </div>


                                    <div class="custom-control custom-checkbox mr-sm-2 mb-3">
                                        <input type="checkbox" name="active" class="custom-control-input" id="checkbox0" value="check">
                                        <label class="custom-control-label" for="checkbox0">Active to be showed!</label>
                                    </div>

                                    <div class="form-group has-success">
                                    <select name="selectLevel" class="form-control custom-select">
                                        <option value="0">--Cap 1--</option>

                                        <?php while($row = mysqli_fetch_array($data["MangCap0"])){ ?>
                                            <option value="<?php echo $row["id"] ?>">
                                            <?php echo $row["name"] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    </div>
                                    
                                    <input type="submit" name="btnAddNew" class="btn btn-primary" value="Add new" />
                                </form>