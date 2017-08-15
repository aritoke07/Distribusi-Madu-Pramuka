<div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?=site_url()?>">Home</a>
                        </li>
                        <li>Lokasi Kedai</li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                    <div class="panel panel-primary sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Kategori</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-success">
                                  <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                      <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Kota
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                      <ul>
                                        <?php foreach ($cat_kota as $kota): ?>
                                        <li><a href="<?=site_url('lokasikedai/view_category/kedai/'.$kota->id_kota)?>"><?php echo ucfirst($kota->nama) ?></a></li>
                                        <?php endforeach; ?>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                                </div>
                            </ul>

                        </div>
                    </div>
                    <!-- *** MENUS AND FILTERS END *** -->

                    <div class="banner">
                        <a href="#">
                            <img src="<?=site_url('assets/backend/images/logo.png')?>" alt="sales 2014" class="img-responsive">
                        </a>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="row products">
                      <?php foreach($pro_kedai as $p_kedai): ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="<?=site_url('menu/list_menu/'.$p_kedai->id_kedai)?>">
                                                <img src="<?=site_url('assets/frontend/img/store.jpg')?>" alt="" class="img-responsive" style="height:200px;width:100%;">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="<?=site_url('menu/list_menu/'.$p_kedai->id_kedai)?>">
                                                <img src="<?=site_url('assets/frontend/img/store.jpg')?>" alt="" class="img-responsive" style="height:200px;width:100%;">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo site_url('menu/list_menu/'.$p_kedai->id_kedai) ?>" class="invisible">
                                    <img src="<?=site_url('assets/frontend/img/store.jpg')?>" alt="" class="img-responsive" style="height:200px;width:100%;">
                                </a>
                                <div class="text">
                                    <h3><a href="<?=site_url('menu/list_menu/'.$p_kedai->id_kedai)?>"><?php echo ucfirst($p_kedai->nama) ?></a></h3>
                                    <p class="price"><?php echo $p_kedai->id_kota ?></p>
                                    <p class="buttons">
                                        <a href="<?=site_url('menu/list_menu/'.$p_kedai->id_kedai)?>" class="btn btn-default">Lihat Madu</a>
                                    </p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                      <?php endforeach; ?>
                    </div>
                    <!-- /.products -->
                </div>
                <!-- /.col-md-9 -->
            </div>
