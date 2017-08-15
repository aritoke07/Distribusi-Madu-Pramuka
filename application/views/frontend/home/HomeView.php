
            <div class="container">
                <div class="col-md-12">
                    <div id="main-slider">
                        <div class="item">
                            <img src="<?=site_url('assets/frontend/img/Untitled-1.jpg')?>" alt="" class="img-responsive">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="<?=site_url('assets/frontend/img/Untitled-2.jpg')?>" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="<?=site_url('assets/frontend/img/Untitled-3.jpg')?>" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="<?=site_url('assets/frontend/img/Untitled-4.jpg')?>" alt="">
                        </div>
                    </div>
                    <!-- /#main-slider -->
                </div>
            </div>

            <!-- *** HOT PRODUCT SLIDESHOW ***
 _________________________________________________________ -->
            <div id="hot">

                <div class="container">
                    <div class="product-slider">
                      <?php foreach ($madus as $madu): ?>
                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="<?=site_url('menu/view_detail/madu/'.$madu->id_stok)?>">
                                                <img src="<?=site_url('assets/backend/plugins/jQuery-File-Upload-master/server/php/files/'.$madu->gambar)?>" alt="" class="img-responsive" style="height:250px;width:100%;">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="<?=site_url('menu/view_detail/madu/'.$madu->id_stok)?>">
                                                <img src="<?=site_url('assets/backend/plugins/jQuery-File-Upload-master/server/php/files/'.$madu->gambar)?>" alt="" class="img-responsive" style="height:250px;width:100%;">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?=site_url('menu/view_detail/madu/'.$madu->id_stok)?>" class="invisible">
                                    <img src="<?=site_url('assets/frontend/img/product1.jpg')?>" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="<?=site_url('menu/view_detail/madu/'.$madu->id_stok)?>"><?php echo ucfirst($madu->jenis_madu) ?></a></h3>
                                    <p class="price"><?php echo $madu->kemasan ?></p>
                                    <p class="price"><?php echo $this->convert->FormatRupiah($madu->harga) ?></p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                      <?php endforeach; ?>

                    </div>
                    <!-- /.product-slider -->
                </div>
                <!-- /.container -->

            </div>
            <!-- /#hot -->

            <!-- *** HOT END *** -->

            <!-- *** GET INSPIRED ***
 _________________________________________________________ -->
            <!-- <div class="container" data-animate="fadeInUpBig">
                <div class="col-md-12">
                    <div class="box slideshow">
                        <h3>Get Inspired</h3>
                        <p class="lead">Get the inspiration from our world class designers</p>
                        <div id="get-inspired" class="owl-carousel owl-theme">
                            <div class="item">
                                <a href="#">
                                    <img src="<?=site_url('assets/frontend/img/getinspired1.jpg')?>" alt="Get inspired" class="img-responsive">
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <img src="<?=site_url('assets/frontend/img/getinspired2.jpg')?>" alt="Get inspired" class="img-responsive">
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <img src="<?=site_url('assets/frontend/img/getinspired3.jpg')?>" alt="Get inspired" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- *** GET INSPIRED END *** -->
