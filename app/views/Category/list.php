

<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Category List</h4>
                                <h6 class="card-subtitle">Danh sách thể loại</a></h6>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped ">
                                        <thead>
                                            <tr>
                                     
                                                <th class="text-center"> ID</th>
                                                <th class="text-center"> Name</th>
                                                <th class="text-center"> Ordering</th>
                                                <th class="text-center"> Active</th>
                                                <th class="text-center"> Parent</th>
                                                <th class="text-center">
                                                <button OnClick="location.href='../public/Category/add'" type="button" class="btn waves-effect waves-light btn-info">Add new</button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        <?php while($row = mysqli_fetch_array($data["Mang"])){ ?>
                                        
                                            <tr>
                                                <td><?php echo $row["id"] ?></td>
                                                <td><?php echo $row["name"] ?></td>
                                                <td><?php echo $row["ordering"] ?></td>
                                                <td><?php echo $row["active"] ?></td>
                                                <td><?php echo $row["level"] ?></td>
                                                <td>
                                                    <button onClick="location.href='../public/Category/edit/<?php echo $row["id"] ?>'" type="button" class="btn waves-effect waves-light btn-success">Edit</button>
                                                    
                                                    <button onClick="
                                                    var chon = confirm('Are you sure you want to delete?');
                                                    if(chon){
                                                        location.href='../public/Category/delete/<?php echo $row["id"] ?>'
                                                    }
                                                    " type="button" class="btn waves-effect waves-light btn-danger">Delete</button>
                                                </td>
                                            </tr>
                                        <?php } ?> 


                                        </tbody>
                                    </table>
                                </div>
                               
                            </div>
                        </div>