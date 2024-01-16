<?php require 'base/header.php' ?>
<h1 class="mt-4">Dashboard</h1>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"><?= count($studentda['Data']);?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        Total Students
                                        <div class="xl text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body"><?=$tpay?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        Total Sells
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"><?=$pp;?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        Today Payment
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">10000</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                       Online Transaction
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

<?php require 'base/footer.php' ?>