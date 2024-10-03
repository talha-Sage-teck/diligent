<!--=======Banner-Section Starts Here=======-->
    <section class="banner-section">
        <div class="container">
            <div class="row">
                <div class="banner-thumb">
                    <img src="<?php echo base_url('assets/public/images/banner/banner-thumb.png') ?>" alt="banner">
                </div>
            </div>
            <div class="banner-content">
                <h1 class="title">
                    <?php echo $home_data->header_heading ?>
                </h1>
                <p>
                    <?php echo $home_data->header_text ?>
                </p>
            </div>
        </div>
    </section>
    <!--=======Banner-Section Ends Here=======-->
    
    
    <!--=======Feature-Section Starts Here=======-->
    <div class="feature-section">
        <!--=======Feature-Slide-Section Starts Here=======-->
        <section class="feature-slide-section padding-top padding-bottom">
            <div class="anime-1">
                <img src="<?php echo base_url('assets/public/images/animation/01.png') ?>" alt="animation">
            </div>
            <div class="anime-2">
                <img src="<?php echo base_url('assets/public/images/animation/02.png') ?>" alt="animation">
            </div>
            <div class="anime-3">
                <img src="<?php echo base_url('assets/public/images/animation/03.png') ?>" alt="animation">
            </div>
            <div class="anime-4">
                <img src="<?php echo base_url('assets/public/images/animation/04.png') ?>" alt="animation">
            </div>
            <div class="anime-5">
                <img src="<?php echo base_url('assets/public/images/animation/05.png') ?>" alt="animation">
            </div>
            <div class="container">
                <div class="feature-slider">
                    <div class="swiper-wrapper">
                    <?php for($i=1; $i<=3; $i++){?>
                        <div class="swiper-slide">
                            <div class="feature-item">
                                <div class="feature-thumb">
                                    <img src="<?php echo base_url('assets/public/images/feature/feature0'.$i.'.png') ?>" alt="feature">
                                </div>
                                <div class="feature-content">
                                    <h5 class="title"><?php echo $home_data->{'service'.$i.'_heading'} ?></h5>
                                    <p><?php echo $home_data->{'service'.$i.'_text'} ?></p>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </section>
        <!--=======Feature-Slide-Section Ends Here=======-->
        <div class="trigon-2">
            <img class="wow slideInRight" src="<?php echo base_url('assets/public/css/img/trigon02.png') ?>" alt="css" data-wow-delay="1s" data-wow-duration="1s">
        </div>
        <div class="anime-2">
            <img src="<?php echo base_url('assets/public/images/animation/02.png') ?>" alt="animation">
        </div>
        <div class="anime-4">
            <img src="<?php echo base_url('assets/public/images/animation/04.png') ?>" alt="animation">
        </div>
        <div class="anime-5">
            <img src="<?php echo base_url('assets/public/images/animation/05.png') ?>" alt="animation">
        </div>
        <!--=======About-Us-Section Starts Here=======-->
        <section class="about-section padding-bottom">
            <div class="trigon-1 wow slideInLeft" data-wow-delay="1s" data-wow-duration="1s">
                <img src="<?php echo base_url('assets/public/css/img/trigon01.png') ?>" alt="css">
            </div>
            <div class="container mw-xl-100">
                <div class="about-wrapper">
                    <div class="about-thumb wow slideInLeft" data-wow-duration="1.5s">
                        <img src="<?php echo base_url('assets/public/images/about/about.png') ?>" alt="about">
                    </div>
                    <div class="about-content">
                        <div class="section-header left-style">
                            <span class="cate">why choose us</span>
                            <h2 class="title"><?php echo $home_data->choose_heading ?></h2>
                            <p><?php echo $home_data->choose_text ?></p>
                        </div>
                        <div class="about-area">
                            <div class="about--item one">
                                <div class="about--thumb">
                                    <img src="<?php echo base_url('assets/public/images/about/about01.png') ?>" alt="about">
                                </div>
                                <div class="about--content">
                                    <h4 class="title"><?php echo $home_data->choose1_heading ?></h4>
                                    <p><?php echo $home_data->choose1_text ?></p>
                                </div>
                            </div>
                            <div class="about--item two">
                                <div class="about--thumb">
                                    <img src="<?php echo base_url('assets/public/images/about/about02.png') ?>" alt="about">
                                </div>
                                <div class="about--content">
                                    <h4 class="title"><?php echo $home_data->choose2_heading ?></h4>
                                    <p><?php echo $home_data->choose2_text ?></p>
                                </div>
                            </div>
                            <div class="about--item three">
                                <div class="about--thumb">
                                    <img src="<?php echo base_url('assets/public/images/about/about03.png') ?>" alt="about">
                                </div>
                                <div class="about--content">
                                    <h4 class="title"><?php echo $home_data->choose3_heading ?></h4>
                                    <p><?php echo $home_data->choose3_text ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=======About-Us-Section Ends Here=======-->
    </div>
    <!--=======Feature-Section Ends Here=======-->


    <!--=======Ticket-Section Starts Here=======-->
    <section class="ticket-section padding-bottom padding-top bg_img" data-background="<?php echo base_url('assets/public/images/ticket/ticket-bg01.jpg') ?>">
        <div class="container">
            <div class="section-header light-color">
                <span class="cate"><?php echo $home_data->plan_subheading ?></span>
                <h2 class="title"><?php echo $home_data->plan_heading ?></h2>
                <p><?php echo $home_data->plan_text ?></p>
            </div>
            <?php if (!empty($packages)){ ?>
            <div class="ticket-slider">
                <div class="swiper-wrapper">
                <?php 
				$n = 1;
				foreach($packages as $package){?>
                
                    <div class="swiper-slide">
					<?php 
					  $attributes = array('class' => '',
											'enctype' => "multipart/form-data",
											'role' => 'form');
					  echo form_open('packages', $attributes) ?>
                        <div class="ticket-item bg-<?php echo $n ?>">
                            <div class="ticket-thumb">
                                <div class="thumb">
                                    <img src="<?php echo base_url('assets/public/images/ticket/ticket0'.$n.'.png') ?>" alt="ticket">
                                </div>
                            </div>
                            <div class="ticket-content">
                                <span class="name"><?php echo $package->title ?></span>
                                <h3 class="title"><?php echo $package->daily_percentage_earnings ?>%</h3>
                                <span class="duration">For <?php echo $package->contract_duration ?> Days</span>
                                <p class="info">Deposit Included</p>
                                <input type="hidden" name="package" value="<?php echo $package->id ?>" />
                                <button type="submit" name="purchase" value="purchase" class="custom-button">invest now</button>
                            </div>
                        </div><?php echo form_close();?>
                    </div>
                    
                    <?php $n++; }?>
                </div>
            </div>
            <?php }?>
        </div>
    </section>
    <!--=======Ticket-Section Ends Here=======-->


    <!--=======Flow-Section Starts Here=======-->
    <div class="flow-section padding-top padding-bottom-2">
        <div class="container">
            <div class="flow-wrapper mb-40-none">
                <div class="flow-item one">
                    <div class="flow-thumb">
                        <div class="thumb">
                            01
                        </div>
                    </div>
                    <h5 class="title">Create Account</h5>
                </div>
                <div class="flow-item two">
                    <div class="flow-thumb">
                        <div class="thumb">
                            02
                        </div>
                    </div>
                    <h5 class="title">choose plan</h5>
                </div>
                <div class="flow-item three">
                    <div class="flow-thumb">
                        <div class="thumb">
                            03
                        </div>
                    </div>
                    <h5 class="title">investment</h5>
                </div>
                <div class="flow-item four">
                    <div class="flow-thumb">
                        <div class="thumb">
                            04
                        </div>
                    </div>
                    <h5 class="title">get profit</h5>
                </div>
            </div>
        </div>
    </div>
    <!--=======Flow-Section Ends Here=======-->

    <!--=======Deposite-Section Starts Here=======-->
    <section class="deposite-section padding-bottom padding-top-2 oh d-none">
        <div class="trigon-3">
            <img class="wow slideInRight" src="<?php echo base_url('assets/public/css/img/trigon06.png') ?>" alt="css" data-wow-delay="1s" data-wow-duration="1s">
        </div>
        <div class="trigon-1 wow slideInLeft" data-wow-delay="1s" data-wow-duration="1s">
            <img src="<?php echo base_url('assets/public/css/img/trigon04.png') ?>" alt="css">
        </div>
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xl-9">
                    <div class="deposite-content">
                        <div class="section-header left-style">
                            <span class="cate">not hidden charge</span>
                            <h2 class="title">Last Deposits & Withdrawals</h2>
                            <p>Sed vivamus ut ut vestibulum mollis id, dictumst scelerisque blandit urna quam arcu, bibendum
                                sed semper sapien. Et orci quia suspendisse aliquam</p>
                        </div>
                        <div class="deposite-tab tab">
                            <ul class="tab-menu">
                                <li class="active">
                                    deposits
                                </li>
                                <li>
                                    withdrawals
                                </li>
                            </ul>
                            <div class="tab-area">
                                <div class="tab-item active">
                                    <div class="deposite--area">
                                        <ul class="deposit-area">
                                            <li>
                                                <a href="#0" class="thumb">
                                                    <img src="<?php echo base_url('assets/public/images/withdraw/with-1.png') ?>" alt="withdraw">
                                                </a>
                                                <div class="content">
                                                    <a href="#0" class="name">Rafuj</a>
                                                    <span class="amount">$150.00</span>
                                                    <span class="date">20 Jun, 2019</span>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#0" class="thumb">
                                                    <img src="<?php echo base_url('assets/public/images/withdraw/with-2.png') ?>" alt="withdraw">
                                                </a>
                                                <div class="content">
                                                    <a href="#0" class="name">Raihan</a>
                                                    <span class="amount">$250.00</span>
                                                    <span class="date">20 Jun, 2019</span>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#0" class="thumb">
                                                    <img src="<?php echo base_url('assets/public/images/withdraw/with-4.png') ?>" alt="withdraw">
                                                </a>
                                                <div class="content">
                                                    <a href="#0" class="name">Fahad</a>
                                                    <span class="amount">$350.00</span>
                                                    <span class="date">20 Jun, 2019</span>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#0" class="thumb">
                                                    <img src="<?php echo base_url('assets/public/images/withdraw/with-3.png') ?>" alt="withdraw">
                                                </a>
                                                <div class="content">
                                                    <a href="#0" class="name">Foiz</a>
                                                    <span class="amount">$120.00</span>
                                                    <span class="date">20 Jun, 2019</span>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#0" class="thumb">
                                                    <img src="<?php echo base_url('assets/public/images/withdraw/with-5.png') ?>" alt="withdraw">
                                                </a>
                                                <div class="content">
                                                    <a href="#0" class="name">Bela</a>
                                                    <span class="amount">$450.00</span>
                                                    <span class="date">20 Jun, 2019</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-item">
                                    <div class="deposite--area">
                                        <ul class="deposit-area">
                                            <li>
                                                <a href="#0" class="thumb">
                                                    <img src="<?php echo base_url('assets/public/images/withdraw/with-2.png') ?>" alt="withdraw">
                                                </a>
                                                <div class="content">
                                                    <a href="#0" class="name">Raihan</a>
                                                    <span class="amount">$250.00</span>
                                                    <span class="date">20 Jun, 2019</span>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#0" class="thumb">
                                                    <img src="<?php echo base_url('assets/public/images/withdraw/with-4.png') ?>" alt="withdraw">
                                                </a>
                                                <div class="content">
                                                    <a href="#0" class="name">Fahad</a>
                                                    <span class="amount">$350.00</span>
                                                    <span class="date">20 Jun, 2019</span>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#0" class="thumb">
                                                    <img src="<?php echo base_url('assets/public/images/withdraw/with-1.png') ?>" alt="withdraw">
                                                </a>
                                                <div class="content">
                                                    <a href="#0" class="name">Rafuj</a>
                                                    <span class="amount">$150.00</span>
                                                    <span class="date">20 Jun, 2019</span>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#0" class="thumb">
                                                    <img src="<?php echo base_url('assets/public/images/withdraw/with-3.png') ?>" alt="withdraw">
                                                </a>
                                                <div class="content">
                                                    <a href="#0" class="name">Foiz</a>
                                                    <span class="amount">$120.00</span>
                                                    <span class="date">20 Jun, 2019</span>
                                                </div>
                                            </li>
                                            <li>
                                                <a href="#0" class="thumb">
                                                    <img src="<?php echo base_url('assets/public/images/withdraw/with-5.png') ?>" alt="withdraw">
                                                </a>
                                                <div class="content">
                                                    <a href="#0" class="name">Bela</a>
                                                    <span class="amount">$450.00</span>
                                                    <span class="date">20 Jun, 2019</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 d-none d-xl-block">
                    <img src="<?php echo base_url('assets/public/images/withdraw/man.png') ?>" alt="withdraw">
                </div>
            </div>
        </div>
    </section>
    <!--=======Deposite-Section Ends Here=======-->


<!--=======Client-Section Starts Here=======-->
    <section class="client-section padding-bottom padding-top">
        <div class="container">
            <div class="section-header">
                <span class="cate"><?php echo $home_data->feedback_subheading ?></span>
                <h2 class="title"><?php echo $home_data->feedback_heading ?></h2>
                <p><?php echo $home_data->feedback_text ?></p>
            </div>
            <div class="client-wrapper">
                <div class="client-map">
                    <div class="map">
                        <img src="<?php echo base_url('assets/public/images/client/map.png') ?>" alt="client">
                    </div>
                    <div class="thumb-1">
                        <img src="<?php echo base_url('assets/public/images/client/01.jpg') ?>" alt="client">
                    </div>
                    <div class="thumb-2">
                        <img src="<?php echo base_url('assets/public/images/client/02.jpg') ?>" alt="client">
                    </div>
                    <div class="thumb-3">
                        <img src="<?php echo base_url('assets/public/images/client/03.jpg') ?>" alt="client">
                    </div>
                    <div class="thumb-4">
                        <img src="<?php echo base_url('assets/public/images/client/04.jpg') ?>" alt="client">
                    </div>
                    <div class="thumb-5">
                        <img src="<?php echo base_url('assets/public/images/client/05.jpg') ?>" alt="client">
                    </div>
                    <div class="thumb-6">
                        <img src="<?php echo base_url('assets/public/images/client/06.jpg') ?>" alt="client">
                    </div>
                    <div class="client-navigation">
                        <div class="client-prev active">
                            <i class="flaticon-left-arrow"></i>
                        </div>
                        <div class="client-next">
                            <i class="flaticon-right-arrow"></i>
                        </div>
                    </div>
                </div>
                <?php if (!empty($testimonials)){ ?>
                <div class="client-slider">
                    <div class="swiper-wrapper">
                    <?php foreach($testimonials as $testimonial){?>
                        <div class="swiper-slide">
                            <div class="client-item">
                                <div class="client-thumb">
                                    <a href="#0">
                                        <img src="<?php echo base_url('uploads/testimonials/thumbs/'.$testimonial->image) ?>" alt="client">
                                    </a>
                                </div>
                                <div class="client-content">
                                    <h5 class="title">
                                        <a href="#0"><?php echo $testimonial->name ?></a>
                                    </h5>
                                    <span class="info">Top Investor</span>
                                    <p>
                                        <span>
                                            <?php echo $testimonial->testimonial_text ?>
                                        </span>
                                    </p>
                                    <div class="ratings">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </section>
    <!--=======Client-Section Ends Here=======-->

    <!--=======Profit-Section Starts Here=======-->
    <section class="profit-section padding-bottom padding-top">
        <div class="trigon-3">
            <img class="wow slideInRight" src="<?php echo base_url('assets/public/css/img/trigon05.png') ?>" alt="css" data-wow-delay="1s" data-wow-duration="1s">
        </div>
        <div class="container">
            <div class="row align-items-end">
                <div class="col-xl-3">
                    <div class="profit-thumb bg_img" data-background="<?php echo base_url('assets/public/images/profit/profit01.png') ?>">
                        <div class="rtl">
                            <img src="<?php echo base_url('assets/public/images/profit/profit01.png') ?>" alt="profit">
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 pl-xl-5">
                    <div class="section-header left-style">
                        <span class="cate"><?php echo $home_data->calculate_subheading ?></span>
                        <h2 class="title"><?php echo $home_data->calculate_heading ?></h2>
                        <p><?php echo $home_data->calculate_text ?></p>
                    </div>
                    <?php if(!empty($packages)){?>
                    <form class="profit-form row justify-content-center">
                        <div class="form-group col-sm-6">
                            <h6 class="profil-title" >Plan <span class="" id="package-loader" style="display:none"><i class="fa fas fa-spinner fa-spin"></i></span></h6>
                            <select class="select-bar" id="select-package">
                            <option value="">Select Plan</option>
                            <?php foreach($packages as $package){?>
                                <option value="<?php echo $package->id ?>"><?php echo $package->title ?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <h6 class="profil-title">Compounding</h6>
                            <input id="daily-profit" type="text" class="" value="" name="" readonly="readonly"  />
                        </div>
                        <div class="form-group col-sm-6">
                            <h6 class="profil-title">Minimum Investment</h6>
                            <input id="min-inv" type="text" placeholder="" readonly="readonly">
                        </div>
                        <div class="form-group col-sm-6">
                            <h6 class="profil-title">Plan duration</h6>
                            <input id="plan-duration" type="text" placeholder="" readonly="readonly">
                        </div>
                        
                        
                        <div class="form-group col-sm-6">
                            <h6 class="profil-title">Profit</h6>
                            <input id="profit-percent" type="text" placeholder="" readonly="readonly">
                        </div>
                        <div class="form-group col-sm-6">
                            <h6 class="profil-title">Total Returns</h6>
                            <input id="total-profit" type="text" placeholder="" readonly="readonly">
                        </div>
                    </form>
                    <?php }?>
                </div>
            </div>
        </div>
    </section>
    <!--=======Profit-Section Ends Here=======-->

    <!--=======Counter-Section Starts Here=======-->
    <div class="counter-section padding-bottom">
        <div class="container">
            <div class="counter-wrapper">
                <div class="counter-item">
                    <div class="counter-thumb">
                        <div class="thumb">
                            <div class="odometer" data-odometer-final="<?php echo $home_data->counter_limit_1 ?>">00</div>
                        </div>
                    </div>
                    <h5 class="title"><?php echo $home_data->counter_title_1 ?></h5>
                </div>
                <div class="counter-item two">
                    <div class="counter-thumb">
                        <div class="thumb">
                            <div class="odometer" data-odometer-final="<?php echo $home_data->counter_limit_2 ?>">00</div>
                        </div>
                    </div>
                    <h5 class="title"><?php echo $home_data->counter_title_2 ?></h5>
                </div>
                <div class="counter-item three">
                    <div class="counter-thumb">
                        <div class="thumb">
                            <div class="odometer" data-odometer-final="<?php echo $home_data->counter_limit_3 ?>">00</div>
                        </div>
                    </div>
                    <h5 class="title"><?php echo $home_data->counter_title_3 ?></h5>
                </div>
                <div class="counter-item four">
                    <div class="counter-thumb">
                        <div class="thumb ">
                            <div class="odometer" data-odometer-final="<?php echo $home_data->counter_limit_4 ?>">00</div>
                        </div>
                    </div>
                    <h5 class="title"><?php echo $home_data->counter_title_4 ?></h5>
                </div>
            </div>
        </div>
    </div>
    <!--=======Counter-Section Ends Here=======-->

    <!--=======Comission-Section Starts Here=======-->
    <section class="comission-section padding-top padding-bottom-2 oh">
        <div class="container mw-xl-100">
            <div class="comission-wrapper">
                <div class="comission-content">
                    <div class="section-header left-style">
                        <span class="cate"><?php echo $home_data->referral_subheding ?></span>
                        <h2 class="title"><?php echo $home_data->referral_heading ?></h2>
                    </div>
                    <div class="content">
                        <?php echo $home_data->referral_text ?>
                        <a href="#0" class="custom-button no-radius">get start now</a>
                    </div>
                </div>
                <div class="comission-thumb">
                    <div class="com-bg z-999">
                        <img src="<?php echo base_url('assets/public/images/comission/comission-bg.png') ?>" alt="comission">
                    </div>
                    <div class="thumb">
                        <img src="<?php echo base_url('assets/public/images/comission/main-thumb.png') ?>" alt="comission">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=======Comission-Section Ends Here=======-->


    <!--=======Comission-Section Starts Here=======-->
    <section class="comission-section padding-top-2 padding-bottom-2 oh">
        <div class="container mw-xl-100">
            <div class="about-wrapper align-items-end">
                <div class="about-thumb wow slideInLeft" data-wow-duration="1.5s">
                    <img src="<?php echo base_url('assets/public/images/comission/mission.png') ?>" alt="mission">
                </div>
                <div class="comission-content">
                        <div class="section-header left-style">
                            <span class="cate"><?php echo $home_data->mission_subheading ?></span>
                            <h2 class="title"><?php echo $home_data->mission_heading ?></h2>
                        </div>
                        <div class="content">
                            <?php echo $home_data->mission_text ?>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <!--=======Comission-Section Ends Here=======-->


<script type="text/javascript">
$(document).ready(function(e) {
    $('#select-package').change(function(e){
		var package_id = $(this).val();
		console.log(package_id);
		if(package_id!=''){
		  calculate_profit(package_id);
		}
		});
});

function calculate_profit(plan_id){
	$('#package-loader').show();
	
	$.getJSON("<?php echo site_url('packages/ajax_get_package') ?>",
	{package_id: plan_id},
	function(data, status){
	  $('#plan-duration').val(data.contract_duration);
	  $('#min-inv').val(data.min_deposit);
	  $('#daily-profit').val(data.daily_earnings);
	  $('#profit-percent').val(data.profit);
	  $('#total-profit').val(data.total_profit);
	  //console.log(data.contract_duration);
	  
	  $('#package-loader').hide();
	}
	);
	
	}
</script>
