<?php require 'Views/base/header.php' ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">
                student List
            </h1>
        </div>
        <div class="col-md-12 mt-5">
            <table class="table container-fluid" id="studenttable">
                <thead>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Gurdian Name</th>
                    <th>Contact No</th>
                    <th>Subjects</th>
                    <th>Stream</th>
                    <th>Year</th>
                    <th>Current Sem</th>
                    <th>Payment</th>
                    <?php if($_SESSION['user_data']->role_id == 1 ){ ?>        
                    <th>Edit</th>
                        <?php } ?>
                </thead>
                <tbody>
                    <?php 
                    $i=0;
                    foreach($studentdatas as $studentdata){
                        ?>
                          <tr>
                        <td><img src="<?php echo 'uploads/'.str_replace(' ','',$studentdata->name).$studentdata->pic;?>" class="thumbnil1"></td>
                        <td><?= $studentdata->name; ?></td>
                        <td><?= $studentdata->fathername; ?></td>
                        <td><?= $studentdata->phone; ?></td>
                        <td><?= $studentdata->subject; ?></td>
                        <td><?= $studentdata->class; ?></td>
                        <td><?= $studentdata->year; ?></td>
                        <td>
                            <?php
                            /*new added*/
                            foreach ($seme as $sem) {
                               if ($studentdata->id === $sem->user) {

                                    if ($sem->semname== 1) {
                                       echo $sem->semname."st";
                                    }elseif($sem->semname == 2){
                                        echo $sem->semname."nd";
                                        }
                                    elseif($sem->semname == 3){
                                        echo $sem->semname."rd";
                                        }
                                    elseif($sem->semname != 1 || 2 || 3){
                                        echo $sem->semname."th";
                                     }
                                }
                            }
                            /*New added ends*/
                            ?>
                        </td>
                        <td><a name="viewpayment" value="details" class="btn btn-primary" href="studentdata?user=<?= $studentdata->id; ?>"> View Details</a>
                        <?php if($_SESSION['user_data']->role_id == 1 ){ ?>
                        <td><!-- New Add-->
                            <a href="/editstudent?studentedit=<?= $studentdata->id; ?>" class="btn btn-warning">Edit Details</a>
                       </td>
                        <?php } ?>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require 'Views/base/footer.php' ?>