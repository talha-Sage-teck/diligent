<!--=======Hero-Area Starts Here=======-->

<section class="hero-area">
  <div class="container">
    <div class="hero-content">
      <h2 class="title"><?php echo $page_heading ?></h2>
      <ul class="breadcrumb">
        <li> <a href="<?php echo site_url() ?>">Home</a> </li>
        <li> <?php echo $page_slug ?> </li>
      </ul>
    </div>
  </div>
</section>
<!--=======Hero-Area Ends Here=======--> 

<!--=======Faq-Section Starts Here=======-->
<section class="faq-section padding-top padding-bottom">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="faq-header">
          <h3 class="title">general FAQ</h3>
        </div>
        <?php if (!empty($faq_data)){ ?>
        <div class="faq-style-one">
          <?php        
			foreach($faq_data as $nfo){
			?>
          <div class="faq-item">
            <div class="faq-number">
              <div class="thumb"></div>
            </div>
            <div class="faq-content">
              <h5 class="faq-title"><?php echo $nfo->question ?></h5>
              <p><?php echo nl2br($nfo->answer) ?></p>
            </div>
          </div>
          <?php }?>
        </div>
        <!-- ./faq-style-one -->
        <?php }?>
      </div>
    </div>
  </div>
</section>
<!--=======Faq-Section Ends Here=======-->