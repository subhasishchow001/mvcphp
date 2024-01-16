<?php require 'Views/base/header.php' ?>
<h3 class="text-center mb-4">Admin List</h3>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Admin List
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Login Id</th>
                                            <th>Edit</th>
                                            <th>delete</th>
                                           
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                         	<th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Login Id</th>
                                            <th>Edit</th>
                                            <th>delete</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        	$i=0;
                                        	foreach ($admindatas as $adminuser){
                                        		?>
                                        <tr>
		                                    <td><?= $adminuser->fname;  ?></td>
		                                    <td><?= $adminuser->lname;  ?></td>
		                                    <td><?= $adminuser->loginid;  ?></td>
		                                    <td><input type="button" name="deladmin" value="Edit" class="btn btn-info"></td>
		                                    <td><input type="button" name="deladmin" value="Delete" class="btn btn-danger"></td>
                                        </tr>
                                        		<?php
                                        	}
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
<?php require 'Views/base/footer.php' ?>