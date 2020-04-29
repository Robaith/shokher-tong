<?php require('top.php');
$cat_id = mysqli_real_escape_string($con,$_GET['id']);
$get_product = get_product($con,'',$cat_id);
 ?>
    <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            
            <!-- Start Cart Panel -->
            <div class="shopping__cart">
                <div class="shopping__cart__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    <div class="shp__cart__wrap">
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <img src="images/product-2/sm-smg/1.jpg" alt="product images">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="product-details.html">BO&Play Wireless Speaker</a></h2>
                                <span class="quantity">QTY: 1</span>
                                <span class="shp__price">$105.00</span>
                            </div>
                            <div class="remove__btn">
                                <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>
                        <div class="shp__single__product">
                            <div class="shp__pro__thumb">
                                <a href="#">
                                    <img src="images/product-2/sm-smg/2.jpg" alt="product images">
                                </a>
                            </div>
                            <div class="shp__pro__details">
                                <h2><a href="product-details.html">Brone Candle</a></h2>
                                <span class="quantity">QTY: 1</span>
                                <span class="shp__price">$25.00</span>
                            </div>
                            <div class="remove__btn">
                                <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                            </div>
                        </div>
                    </div>
                    <ul class="shoping__total">
                        <li class="subtotal">Subtotal:</li>
                        <li class="total__price">$130.00</li>
                    </ul>
                    <ul class="shopping__btn">
                        <li><a href="cart.html">View Cart</a></li>
                        <li class="shp__checkout"><a href="checkout.html">Checkout</a></li>
                    </ul>
                </div>
            </div>
            <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Products</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Grid -->
        <section class="htc__product__grid bg__white ptb--100">
            <div class="container">
                <div class="row">
                	<?php if (count($get_product)>0) { ?>
                		
                	
                    <div class="col-lg-9 col-lg-push-3 col-md-9 col-md-push-3 col-sm-12 col-xs-12">
                        <div class="htc__product__rightidebar">
                            <div class="htc__grid__top">
                                <div class="htc__select__option">
                                    
                                </div>
                                
                                <!-- Start List And Grid View -->
                                <ul class="view__mode" role="tablist">
                                    <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>
                                    <li role="presentation" class="list-view"><a href="#list-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                                </ul>
                                <!-- End List And Grid View -->
                            </div>
                            <!-- Start Product View -->
                            <div class="row">
                                <div class="shop__grid__view__wrap">
                                    <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                        <!-- Start Single Product -->
                                        <?php 
                            			
                            			foreach ($get_product as $list) {
                            
                            			?>
                                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                            <div class="category">
                                    			<div class="ht__cat__thumb">
                                        			<a href="product.php?id=<?php echo $list['id'] ?>">
                                            			<img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image'] ?>" alt="product images" height="385" width="290">
                                        			</a>
                                    			</div>
                                    		<div class="fr__product__inner">
                                        		<h4><a href="product-details.html"><?php echo $list['p_name'] ?></a></h4>
                                        		<ul class="fr__pro__prize">
                                            		<li class="old__prize"><?php echo $list['mrp'] ?></li>
                                            		<li><?php echo $list['price'] ?></li>
                                        		</ul>
                                    		</div>
                                			</div>
                                        </div>
                                        <?php } ?>

                                    </div>
                                    <div role="tabpanel" id="list-view" class="single-grid-view tab-pane fade clearfix">
                                        <div class="col-xs-12">
                                            <div class="ht__list__wrap">
                                                <!-- Start List Product -->
                                                <?php 
                            			
                            					foreach ($get_product as $list) {
                            
                            					?>
                                                <div class="ht__list__product">
                                                    <div class="ht__list__thumb">
                                                        <a href="product-details.html"><img class="one" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image'] ?>" alt="product images"></a>
                                                    </div>
                                                    <div class="htc__list__details">
                                                        <h2><a href="product-details.html"><?php echo $list['p_name'] ?></a></h2>
                                                        <ul  class="pro__prize">
                                                            <li class="old__prize"><?php echo $list['mrp'] ?></li>
                                                            <li><?php echo $list['price'] ?></li>
                                                        </ul>
                                                        
                                                        <p><?php echo $list['description'] ?></p>
                                                        <div class="fr__list__btn">
                                                            <a class="fr__btn" href="cart.html">Add To Cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <!-- End List Product -->
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Product View -->
                        </div>
                        
                    </div>
                    <div class="col-lg-3 col-lg-pull-9 col-md-3 col-md-pull-9 col-sm-12 col-xs-12 smt-40 xmt-40">
                        <div class="htc__product__leftsidebar">
                            <!-- Start Best Sell Area -->
                            <div class="htc__recent__product">
                                <h2 class="title__line--4">best seller</h2>
                                <div class="htc__recent__product__inner">
                                    <!-- Start Single Product -->
                                    <div class="htc__best__product">
                                        <div class="htc__best__pro__thumb">
                                            <a href="product-details.html">
                                                <img src="images/product-2/sm-smg/1.jpg" alt="small product">
                                            </a>
                                        </div>
                                        <div class="htc__best__product__details">
                                            <h2><a href="product-details.html">Product Title Here</a></h2>
                                            <ul class="rating">
                                                <li><i class="icon-star icons"></i></li>
                                                <li><i class="icon-star icons"></i></li>
                                                <li><i class="icon-star icons"></i></li>
                                                <li class="old"><i class="icon-star icons"></i></li>
                                                <li class="old"><i class="icon-star icons"></i></li>
                                            </ul>
                                            <ul  class="pro__prize">
                                                <li class="old__prize">$82.5</li>
                                                <li>$75.2</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Product -->
                                    
                                </div>
                            </div>
                            <!-- End Best Sell Area -->
                        </div>
                    </div>
                <?php } 
                else{
                	echo "No data found" ;
                }
                ?>
                </div>
            </div>
        </section>
        <!-- End Product Grid -->
        <!-- Start Brand Area -->
        <div class="htc__brand__area bg__cat--4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ht__brand__inner">
                            <ul class="brand__list owl-carousel clearfix">
                                <li><a href="#"><img src="images/brand/1.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/2.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/3.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/4.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/5.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/5.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/1.png" alt="brand images"></a></li>
                                <li><a href="#"><img src="images/brand/2.png" alt="brand images"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Brand Area -->
        <!-- Start Banner Area -->
        <div class="htc__banner__area">
            <ul class="banner__list owl-carousel owl-theme clearfix">
                <li><a href="product-details.html"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/3.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/4.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/5.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/6.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/1.jpg" alt="banner images"></a></li>
                <li><a href="product-details.html"><img src="images/banner/bn-3/2.jpg" alt="banner images"></a></li>
            </ul>
        </div>

<?php require('footer.php') ?>