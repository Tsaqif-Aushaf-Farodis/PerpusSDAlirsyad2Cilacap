<?php

/* @var $this yii\web\View */

$this->title = 'Sistem Informasi Perpustakaan';
?>
<div class="site-index">
    <div class="body-content">
        <div class="jumbotron text-center bg-transparent" id="jumbotron" style="padding: 15px; background-color: black; opacity: 100%;">
            <h1 class="display-4" style="color: whitesmoke;">Selamat Datang</h1>
            <p class="lead" style="color: whitesmoke;">Sistem Informasi Perpustakaan SD Al-Irsyad 02 Cilacap</p>
            <p>
                <?php if (Yii::$app->user->isGuest) : ?>
                    <a class="btn btn-lg btn-success" href="http://localhost:8080/index.php?r=user-management%2Fauth%2Flogin" style="width: 200px;">Login</a>
                <?php endif; ?>
            </p>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>
                                <?php
                                $qry="select count(*) from user";
                                $jml=\Yii::$app->db->createCommand($qry)->queryScalar();
                                echo $jml;  
                                ?>
                            </h3>
                            <p>Pengguna</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-edit"></i>
                        </div>
                        <a href="index.php?r=user-management%2Fuser%2Findex" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <!--small box-->
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3>
                                <?php
                                $qry="select count(*) from data_buku";
                                $jml=\Yii::$app->db->createCommand($qry)->queryScalar();
                                echo $jml; 
                                ?>
                            </h3>
                            <p>Daftar Buku</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-book"></i>
                        </div>
                        <a href="index.php?r=data-buku%2Findex" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>
                                <?php
                                $qry="select count(*) from peminjaman where status='Dipinjam'";
                                $jml=\Yii::$app->db->createCommand($qry)->queryScalar();
                                echo $jml; 
                                ?>
                            </h3>
                            <p>Dipinjam</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user-plus"></i>
                        </div>
                        <a href="index.php?r=peminjaman%2Ftransaksipinjam" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>
                                <?php
                                $qry="select count(*) from peminjaman where status='Dikembalikan'";
                                $jml=\Yii::$app->db->createCommand($qry)->queryScalar();
                                echo $jml; 
                                ?>
                            </h3>
                            <p>Dikembalikan</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-list"></i>
                        </div>
                        <a href="index.php?r=peminjaman%2Ftransaksikembali" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>
        </div>

        <div class="row text-center">
            <div class="col-sm-12">
                <div class="col-lg-4">
                    <a class="info-box bg-red btn" href="index.php?r=site%2Fdatabuku" style="padding: 0px;">
                        <span class="info-box-icon"><i class="fa fa-book"></i></span>
                        <div class="info-box-content" style="padding-top: 29px;">
                            <p style="font-size: 24px;">Data Buku &raquo;</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a class="info-box bg-yellow btn" href="index.php?r=peminjaman%2Fdipesan" style="padding: 0px;">
                        <span class="info-box-icon"><i class="fa fa-calendar"></i></span>
                        <div class="info-box-content" style="padding-top: 29px;">
                            <p style="font-size: 24px;">Riwayat &raquo;</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a class="info-box bg-blue btn" href="index.php?r=peminjaman%2Fcreate" style="padding: 0px;">
                        <span class="info-box-icon"><i class="fa fa-edit"></i></span>
                        <div class="info-box-content" style="padding-top: 29px;">
                            <p style="font-size: 24px;">Pemesanan &raquo;</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>