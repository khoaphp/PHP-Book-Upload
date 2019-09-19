

<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Book List</h4>
                                <h6 class="card-subtitle">Danh sách BOOK</a></h6>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped ">
                                        <thead>
                                            <tr>
                                     
                                                <th class="text-center"> ID</th>
                                                <th class="text-center"> Title</th>
                                                <th class="text-center"> Image</th>
                                                <th class="text-center"> Category</th>
                                                <th class="text-center"> Price</th>
                                                <th class="text-center"> Ordering</th>
                                                <th class="text-center"> Active</th>
                                                <th class="text-center">
                                                <button OnClick="location.href='../public/Book/add'" type="button" class="btn waves-effect waves-light btn-info">Add new</button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php while($row = mysqli_fetch_array($data["MangBook"])){ ?>
                                        <tr>
                                            <td><?php echo $row["ID"] ?></td>
                                            <td><?php echo $row["Title"] ?></td>
                                            <td><img height="150" src="images/upload/<?php echo $row["Image"] ?>"></td>
                                            <td><?php echo $row["name"] ?></td>
                                            <td><?php echo number_format($row["Price"]) ?></td>
                                            
                                            <td><?php echo $row["Ordering"] ?></td>
                                            <td><?php echo $row["Active"] ?></td>
                                            <td>
                                                    <button onClick="location.href='../public/Book/edit/<?php echo $row["ID"] ?>'" type="button" class="btn waves-effect waves-light btn-success">Edit</button>
                                                    
                                                    <button onClick="
                                                    var chon = confirm('Are you sure you want to delete?');
                                                    if(chon){
                                                        location.href='../public/Book/delete/<?php echo $row["ID"] ?>'
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