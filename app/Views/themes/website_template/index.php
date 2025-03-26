<header class="hero-header position-relative overflow-hidden" style="background-image: url(<?php echo base_url().$settings->header_bg_img; ?>);"> 
    <div class="container position-relative">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-7">
                        <!-- text-gradient-pink-blue -->
                        <h1 class="header-title"><?php echo esc($article[0]->article1_en); ?> </h1>
                        <p class="header-des"><?php echo esc($article[0]->article2_en); ?></p>
                        <div class="btn-wrap">
                            <?php if($isUser){ ?>
                                <a href="<?php echo base_url('nfts/create'); ?>" type="button" class="btn btn-outline-primary"><?php echo display('Mint'); ?></a>
                            <?php }else{ ?>
                                <button class="btn btn-outline-primary ms-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><?php echo display('Mint'); ?></button>
                            <?php } ?>

                            <a href="<?php echo base_url('all'); ?>" type="button" class="btn btn-primary"><?php echo display('Search'); ?></a> 
                        </div>
                    </div>

                    <?php if(isset($featured)){ ?>
                    <div class="col-md-5">
                        <a href="<?php echo base_url('nft/asset/details/'.$featured->token_id.'/'.$featured->nftId.'/'.$featured->contract_address); ?>">
                        <div class="nft-card mt-5 mt-md-0">
                            <div class="nft-card-img mb-4">
                                <img src="<?php echo base_url().$featured->file; ?>" class="img-fluid">
                            </div>
                            <div class="g-4 justify-content-center row">
                                <div class="col-auto">
                                    <h6 class="mb-2"><?php echo display('Owner'); ?></h6>
                                    <div class="creators creator-primary d-flex align-items-center">
                                        <div class="position-relative">
                                            <?php if($featuredOwner->image){ ?>
                                                <img src="<?php echo base_url('public/uploads/dashboard/new')."/".$featuredOwner->image ?>" class="avatar avatar-md-sm shadow-md rounded-pill" alt="">
                                            <?php }else{ ?>
                                                <img src="<?php echo base_url('public/uploads/dashboard/user.png') ?>" class="avatar avatar-md-sm shadow-md rounded-pill" alt="">
                                            <?php } ?>
                                            <span class="verified text-primary">
                                                <i class="mdi mdi-check-decagram"></i>
                                            </span>
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-0 fw-semi-bold"><a class="text-dark name"><?php echo esc($featuredOwner->f_name.' '.$featuredOwner->l_name) ?></a></h6>
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <h6 class="mb-2"><?php if(strlen($featuredCollection) > 8){echo substr($featuredCollection, 0, 8).'..';}else{echo esc($featuredCollection);}  ?></h6>
                                    <div class="fw-semi-bold text-dark"> 
                                        <span class="fs-5"><?php if(strlen($featured->name) > 8){echo substr($featured->name, 0, 8).'..';}else{echo esc($featured->name);}  ?></span> 
                                    </div>
                                </div> 

                                <div class="col-auto">
                                    <h6 class="mb-2"><?php echo display('Auction_Ends'); ?></h6>
                                    <div class="fw-semi-bold fs-5 text-dark"><?php echo esc($featured->auctionDateTime); ?></div>
                                </div>
                                
                            </div>
                        </div>
                        </a>
                    </div>
                    <?php } else { ?>

                        <div class="col-md-5"> 

                            <div class="nft-card mt-5 mt-md-0">
                                <div class="nft-card-img mb-4">
                                    
                                    <img src="https://www.topgirona.com/uploads/s1/31/40/8/giscom-real-estate.jpeg" class="img-fluid">
                                    <!--<img src="<?php echo base_url().'/public/assets/dist/img/avatar/avatar-2.png'; ?>" class="img-fluid">-->
                                </div> 
                            </div> 
                        </div>

                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" preserveAspectRatio="none" viewBox="0 0 1680 40"
        class="position-absolute width-full z-1" style="bottom: -1px;">
        <path d="M0 40h1680V30S1340 0 840 0 0 30 0 30z" fill="#f0f0f0"></path>
    </svg>
</header>

<section class="section-pd pb-0">
    <div class="container">
        <h3 class="fw-bold mb-4"><?php echo display('Latest_NFTs'); ?></h3>
        <div class="row g-3 item-wrap">
            <?php 
            if(count($nfts) > 0){
                foreach ($nfts as $key => $nft) {    
            ?>
                <div class="col-sm-6 col-md-4 col-lg-3 myfvt"> 
                    <div class="card nft-items nft-primary rounded-7 border-0 overflow-hidden mb-1 p-4" startdate="<?php echo esc($nft->start_date); ?>" enddate="<?php echo esc($nft->end_date); ?>"> 
                        <div class="nft-image rounded-7 position-relative">
                            <?php 
                            $fileExtension = pathinfo($nft->file, PATHINFO_EXTENSION); 
                            if ($fileExtension == 'mp4' || $fileExtension == 'webm') { ?>
                                <a href="<?php echo base_url('nft/asset/details/'.$nft->token_id.'/'.$nft->nftId.'/'.$nft->contract_address); ?>" class="item-img position-relative overflow-hidden d-block">
                                    <video loop="true" autoplay="autoplay" muted> <source src="<?php echo base_url().'/'.$nft->file; ?>" type="video/mp4"> </video>
                                </a>
                            <?php      
                            }else if($fileExtension == 'mp3'){  ?>
                                <a href="<?php echo base_url('nft/asset/details/'.$nft->token_id.'/'.$nft->nftId.'/'.$nft->contract_address); ?>" class="item-img position-relative overflow-hidden d-block">
                                    <audio controls src="<?php echo base_url().'/'.$nft->file; ?>">   </audio>
                                </a>
                            <?php 
                            }else{
                            ?> 
                                <a href="<?php echo base_url('nft/asset/details/'.$nft->token_id.'/'.$nft->nftId.'/'.$nft->contract_address); ?>" class="item-img position-relative overflow-hidden d-block">
                                    <img src="<?php echo base_url().$nft->file; ?>" class="img-fluid" alt="">
                                </a>
                            <?php } ?>

                            <div class="nft-time-counter position-absolute rounded-pill title-dark">
                                <i class="uil uil-clock"></i> 
                                <small id="auction-item-51"><?php echo esc($nft->auctionDateTime); ?></small>
                            </div>
                        </div>
                        
                        <div class="card-body content position-relative mt-3">
                            <div class="d-flex justify-content-between mb-2">
                                <div class="img-group">
                                    <?php foreach($nft->favorite3img as $key=>$image){  ?>
                                    <a href="" class="user-avatar <?php if ($key > 0) echo 'ms-n3';  ?>">
                                        <?php  
                                        if($image->image){ ?>
                                            <img src="<?php echo base_url('public/uploads/dashboard/new')."/".$image->image ?>" alt="user" class="avatar avatar-sm-sm img-thumbnail border-0 shadow-sm rounded-circle">
                                        <?php }else{  ?>
                                            <img src="<?php echo base_url('public/uploads/dashboard/user.png') ?>" class="avatar avatar-md-sm shadow-md rounded-pill" alt="">
                                        <?php } ?>
                                    </a>
                                    <?php } ?> 
                                </div>
                                <span class="like-btn">
                                    <button class="like-wrap text-muted d-flex align-items-center fw-semi-bold favorite_item" id="favorite_item" nftId="<?php echo esc($nft->nftId); ?>" favoriteVal="<?php echo esc($nft->favoriteVal); ?>">
                                        <svg class="like-icon_<?php echo esc($nft->nftId); ?> <?php if($nft->favoriteActive==1) {echo "like-active";} ?>" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"> </path>
                                        </svg>
                                        <span class="like-number_<?php echo esc($nft->nftId); ?> ms-1"><?php echo esc($nft->favoriteVal) ?></span>
                                    </button>
                                </span>
                            </div>

                            <a href="<?php echo base_url('nft/asset/details/'.$nft->token_id.'/'.$nft->nftId.'/'.$nft->contract_address); ?>" class="d-block fw-semi-bold h6 text-dark text-truncate title">
                                <?php if(strlen($nft->name) > 14){ echo substr(esc($nft->name), 0, 15).'.. #'.esc($nft->token_id); } else { echo esc($nft->name).' #'.esc($nft->token_id); } ?>
                            </a>

                            <div class="d-flex justify-content-between mt-2">
                                <small class="rate fw-semi-bold text-primary"><?php echo number_format(esc($nft->min_price), 6, '.', ',').' '.SYMBOL(); ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php 
                }
            } else {
                // Mostrar 10 imágenes predeterminadas si no hay datos en $nfts
                $image_urls = [
                    "https://http2.mlstatic.com/D_NQ_NP_2X_687053-MLA69458539812_052023-O.webp",
                    "https://statics.forbesargentina.com/2024/09/crop/66d5b5c9bfb0b__600x390.webp",
                    "https://static1.sosiva451.com/90345821/db8741e8-477e-4b20-aab1-d55d6a88277c_u_small.jpg",
                    "https://static1.sosiva451.com/16819021/627c54f0-deaf-4499-9f9f-541064efd432_u_small.jpg",
                    "https://static1.sosiva451.com/46737351/958e8f2e-e4ce-4ba6-99ab-c029ee9ac1c2_u_small.jpg",
                    "https://static1.sosiva451.com/91595361/59dadac8-71d9-435a-8d5f-56c3313037f7_u_small.jpg",
                    "https://static1.sosiva451.com/62168361/dc05f8ef-0601-4922-a74a-664b619ac89b_u_small.jpg",
                    "https://static1.sosiva451.com/18531061/0a6cb324-ea42-4e83-9778-63cc7ada6264_u_small.jpg",
                    "https://static1.sosiva451.com/95723361/38b1f614-6e58-4e42-b559-2a72a223e477_u_small.jpg",
                    "https://img.nuroa.com/eyJidWNrZXQiOiJwcmQtbGlmdWxsY29ubmVjdC1iYWNrZW5kLWIyYi1pbWFnZXMiLCJrZXkiOiJwcm9wZXJ0aWVzLzZkMTcwYTliLWFlMWItNDQ5Yi04NjQxLTgwNzNiMTc2Y2YzNy9lNjkwN2E3ZC05YTg5LTQ3MzctODU4YS1kMWU5ZjAyMTdkOTUuanBnIiwiYnJhbmQiOiJOVVJPQSIsImVkaXRzIjp7InJlc2l6ZSI6eyJ3aWR0aCI6NjUyLCJoZWlnaHQiOjQ4OSwiZml0IjoiY292ZXIifX19"
                ];

                for ($i = 0; $i < 10; $i++) {
            ?>
                <div class="col-sm-6 col-md-4 col-lg-3 myfvt"> 
                    <div class="card nft-items nft-primary rounded-7 border-0 overflow-hidden mb-1 p-4" startdate="2022-05-15 00:00:00" enddate="2022-05-16 23:59:00"> 
                        <div class="nft-image rounded-7 position-relative"> 
                            <a class="item-img position-relative overflow-hidden d-block">
                               <img src="<?php echo $image_urls[$i]; ?>" class="img-fluid" alt="Inmueble <?php echo $i+1; ?>">
                            </a> 
                        </div> 
                    </div>
                </div>
            <?php 
                }
            }
            ?>
        </div>
    </div>
</section>


<section class="section-pd pb-0">
    <div class="container">
        <h3 class="fw-bold mb-4"><?php echo display('Top_Collections'); ?></h3>
        <?php 
            if(count($topCollections) > 0){
        ?>
        <div class="collection-card-carousel owl-carousel owl-theme">
            <!-- Collection card item -->

            <?php 
            foreach($topCollections as $key => $collection){ 
            ?>
            <a href="<?php echo base_url('collection').'/'.$collection->slug ?>" target="_blank" class="bg-white collection-card d-block p-3 rounded-7">
                <div class="d-flex masonry-wrap">
                    <?php if($collection->logo_image){ ?>
                        <div class="masonry-start">
                            <img src="<?php echo base_url().$collection->logo_image; ?>" class="masonry-img-lg" alt="" />
                        </div>
                    <?php  }else{  ?>
                        <div class="masonry-start">
                            <img src="<?php echo esc($frontendAssets); ?>/img/collectors/lg-01.jpg" class="masonry-img-lg" alt="" />
                        </div>
                    <?php } ?>
                    <div class="masonry-end d-flex flex-column ms-1">
                        <?php  
                        if(!empty($collection->images)){
                            foreach($collection->images as $k=> $image){ 
                                $fileExtension = pathinfo($image->file, PATHINFO_EXTENSION);
                                if($image->file && $fileExtension != 'mp4' && $fileExtension != 'webm' && $fileExtension != 'mp3'){ 
                                    echo "<img src='".base_url()."".$image->file."' class='masonry-img-sm'>"; 
                                    if($k == 0){
                                        echo '<div class="masonry-devider mt-1"></div>';
                                    }
                                }else{
                                   echo '<img src="'.$frontendAssets.'/img/collectors/sm-05.jpg" class="masonry-img-sm" alt="">'; 
                                }
                            }
                        }else{  ?>
                            
                            <img src="http://157.245.152.153/public/assets/website/img/collectors/sm-05.jpg" class="masonry-img-sm" alt="">
                                <div class="masonry-devider mt-1"></div>
                            <img src="http://157.245.152.153/public/assets/website/img/collectors/sm-06.jpg" class="masonry-img-sm" alt="">
                        
                        <?php
                        }
                        ?>
                      
                    </div>
                </div>
                <div class="collection-card-text pt-2 px-2 text-dark">
                    <h4 class="fw-bold mb-0"><?php echo esc($collection->title); ?></h4>
                    <p class="fw-semi-bold mb-0 mt-1 text-muted"><?php echo esc($collection->totalNft); ?> <?php echo display('in_collection'); ?></p>
                </div>
            </a>
            <?php 
                }  
            ?>  
        </div>

        <?php  
         } else{   
        ?> 
        <?php
// Arreglo de URLs de imágenes desde Internet
$images = [
    'https://www.vacispropiedades.com.ar/Upload/Directos/Desarrollos/ffbc20cuatro-estaciones-3.jpg',
    'https://www.vacispropiedades.com.ar/Upload/Directos/Desarrollos/31e0beplanta.jpg',
    'https://www.vacispropiedades.com.ar/Upload/Directos/Desarrollos/e213decuatro-estaciones-2.jpg',
    'https://www.vacispropiedades.com.ar/Upload/Directos/Desarrollos/96945ecuatro-estaciones-4.jpg',
    'https://www.vacispropiedades.com.ar/Upload/Directos/Desarrollos/53e516120-2.jpg',
    'https://www.vacispropiedades.com.ar/Upload/Directos/Desarrollos/3d701bcuatro-estaciones-5.jpg',
    'https://www.vacispropiedades.com.ar/Upload/Directos/Desarrollos/804d88planta1.jpg',
    'https://www.vacispropiedades.com.ar/Upload/Directos/Desarrollos/804d88planta1.jpg'
];


// Número de tarjetas en el carrusel
$numCards = 5;

// Generar imágenes únicas para cada tarjeta
$carouselItems = [];
for ($i = 0; $i < $numCards; $i++) {
    $availableImages = $images;
    $imageLgIndex = array_rand($availableImages);
    $imageLg = $availableImages[$imageLgIndex];
    unset($availableImages[$imageLgIndex]);

    $imageSm1Index = array_rand($availableImages);
    $imageSm1 = $availableImages[$imageSm1Index];
    unset($availableImages[$imageSm1Index]);

    $imageSm2Index = array_rand($availableImages);
    $imageSm2 = $availableImages[$imageSm2Index];

    $carouselItems[] = [
        'imageLg' => $imageLg,
        'imageSm1' => $imageSm1,
        'imageSm2' => $imageSm2
    ];
}
?>

<div class="collection-card-carousel owl-carousel owl-theme">
    <?php foreach ($carouselItems as $item): ?>
        <a class="bg-white collection-card d-block p-3 rounded-7">
            <div class="d-flex masonry-wrap">
                <div class="masonry-start">
                    <img src="<?php echo $item['imageLg']; ?>" class="masonry-img-lg" alt="">
                </div>
                <div class="masonry-end d-flex flex-column ms-1">
                    <img src="<?php echo $item['imageSm1']; ?>" class="masonry-img-sm">
                    <div class="masonry-devider mt-1"></div>
                    <img src="<?php echo $item['imageSm2']; ?>" class="masonry-img-sm">
                </div>
            </div>
        </a>
    <?php endforeach; ?>
</div>

        <?php  

        } 

        ?>
    </div>
</section>

<section class="section-pd">
    <div class="container">
        <h3 class="fw-bold mb-4"><?php echo display('Top_Sellers'); ?></h3>
        <div class="row g-4">

            <?php 
            if(count($topCollections) > 0){
            foreach ($topSellers as $key => $seller) {  
            ?>
            <div class="col-lg-3 col-md-4">
                <div class="creators creator-primary d-flex align-items-center">
                    <span class="fw-bold text-dark"><?php echo str_pad(($key+1), 2, "0", STR_PAD_LEFT); ?>.</span>
                    <div class="d-flex align-items-center ms-3">
                        <div class="position-relative d-inline-flex">
                            <?php if($seller->image){ ?>
                                <a href="<?php echo base_url('nft').'/'.$seller->wallet_address ?>"><img src="<?php echo base_url('public/uploads/dashboard/new/'.$seller->image); ?>" class="avatar avatar-md-sm shadow-md rounded-pill" alt=""></a>
                            <?php } else { ?>
                                <a href="<?php echo base_url('nft').'/'.$seller->wallet_address ?>"><img src="<?php echo base_url(); ?>/public/uploads/dashboard/no-picture.jpg" class="avatar avatar-md-sm shadow-md rounded-pill" alt=""></a>
                            <?php } ?>
                            <?php if($seller->is_verified == 1){ ?>        
                            <span class="verified text-primary">
                                <svg width="20" height="20" viewBox="0 0 12 12" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.78117 0.743103C5.29164 -0.247701 6.70826 -0.247701 7.21872 0.743103C7.52545 1.33846 8.21742 1.62509 8.8553 1.42099C9.91685 1.08134 10.9186 2.08304 10.5789 3.1446C10.3748 3.78247 10.6614 4.47445 11.2568 4.78117C12.2476 5.29164 12.2476 6.70826 11.2568 7.21872C10.6614 7.52545 10.3748 8.21742 10.5789 8.8553C10.9186 9.91685 9.91685 10.9186 8.8553 10.5789C8.21742 10.3748 7.52545 10.6614 7.21872 11.2568C6.70826 12.2476 5.29164 12.2476 4.78117 11.2568C4.47445 10.6614 3.78247 10.3748 3.1446 10.5789C2.08304 10.9186 1.08134 9.91685 1.42099 8.8553C1.62509 8.21742 1.33846 7.52545 0.743103 7.21872C-0.247701 6.70826 -0.247701 5.29164 0.743103 4.78117C1.33846 4.47445 1.62509 3.78247 1.42099 3.1446C1.08134 2.08304 2.08304 1.08134 3.1446 1.42099C3.78247 1.62509 4.47445 1.33846 4.78117 0.743103Z"
                                        fill="#feda03"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8.43961 4.23998C8.64623 4.43922 8.65221 4.76823 8.45297 4.97484L5.40604 8.13462L3.54703 6.20676C3.34779 6.00014 3.35377 5.67113 3.56039 5.47189C3.76701 5.27266 4.09602 5.27864 4.29526 5.48525L5.40604 6.63718L7.70475 4.25334C7.90398 4.04672 8.23299 4.04074 8.43961 4.23998Z"
                                        fill="#000000"></path>
                                </svg>
                            </span>
                            <?php } ?> 
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 fw-bold"><a href="<?php echo base_url('nft').'/'.$seller->wallet_address; ?>" class="text-dark name"><?php echo esc($seller->f_name).' '.esc($seller->l_name); ?></a></h6>
                            <small class="text-muted"><?php echo esc($seller->totalNft); ?> <?php echo display('NFTs'); ?></small>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                } 

            }else{

            for ($i=0; $i < 8; $i++) {  
            ?>

            <div class="col-lg-3 col-md-4">
                <div class="creators creator-primary d-flex align-items-center">
                    <span class="fw-bold text-dark"><?php echo esc($i+1); ?>.</span>
                    <div class="d-flex align-items-center ms-3">
                        <div class="position-relative d-inline-flex">
                           <a >
                                <img src="<?php echo base_url().'/public/uploads/settings/1737735847_ae04bb89736fc8fe5d2c.png'; ?>" class="avatar avatar-md-sm shadow-md rounded-pill" alt="">
                            </a>                                            
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 fw-bold"><a class="text-dark name"><?php echo display('Inmobiliaria'); ?></a></h6>
                            <small class="text-muted"><?php echo display('0_NFTs'); ?></small>
                        </div>
                    </div>
                </div>
            </div>
              
            <?php 

            }
        } 

        ?>
        </div>
    </div>
</section>
  