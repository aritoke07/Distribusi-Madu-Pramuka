<div class="container">

  <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="<?=site_url()?>">Home</a></li>
                        <li><a href="<?=site_url('lokasikedai')?>">Lokasi Kedai</a></li>
                        <li><a href="<?=site_url('lokasikedai/view_category/kedai/'.$pro_kedai->id_kedai)?>"><?=ucfirst($pro_kedai->nama)?></a></li>
                        <li>Menu</li>
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
                     Jenis Madu
                   </a>
                 </h4>
               </div>
               <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                 <div class="panel-body">
                   <ul>
                     <?php foreach ($cat_madu as $madu): ?>
                     <li><a href="<?=site_url('menu/view_category/madu/'.$madu->id_madu.'/'.$pro_kedai->id_kedai)?>"><?php echo ucfirst($madu->jenis_madu) ?></a></li>
                     <?php endforeach; ?>
                   </ul>
                 </div>
               </div>
             </div>
             <div class="panel panel-success">
               <div class="panel-heading" role="tab" id="headingTwo">
                 <h4 class="panel-title">
                   <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                     Kemasan
                   </a>
                 </h4>
               </div>
               <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                 <div class="panel-body">
                   <ul>
                     <?php foreach ($cat_kemasan as $kemasan): ?>
                     <li><a href="<?=site_url('menu/view_category/kemasan/'.$kemasan->id_kemasan.'/'.$pro_kedai->id_kedai)?>"><?php echo ucfirst($kemasan->kemasan) ?></a></li>
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

                  <?php echo $this->session->flashdata('cartInfoNoLogin'); ?>

                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                                <img src="<?=site_url('assets/backend/plugins/jQuery-File-Upload-master/server/php/files/'.$pro_madu->gambar)?>" alt="" class="img-responsive">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                <h1 class="text-center"><?php echo ucfirst($pro_madu->jenis_madu); ?></h1>
                                <p class="price"><?php echo ucfirst($pro_madu->kemasan) ?></p>
                                <p class="price"><?php echo $this->convert->FormatRupiah($pro_madu->harga) ?></p>

                                <p class="text-center buttons">
                                    <?php echo $btnAddCartItem ?>
                                    <button type="button" class="btn btn-info"><i class="fa fa-info"></i> <?php echo $this->convert->stokStatus($pro_madu->status) ?></button>
                                </p>
                            </div>
                        </div>

                    </div>


                    <div class="box" id="details">
                        <p>
                            <h4>Detail Produk</h4>
                            <p><?php echo ucfirst($pro_madu->keterangan) ?></p>
                    </div>
                </div>
                <!-- /.col-md-9 -->
            </div>
