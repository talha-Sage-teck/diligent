<!--=======Hero-Area Starts Here=======-->
    <section class="hero-area">
        <div class="container">
            <div class="hero-content">
                <h2 class="title"><?php echo $page_heading ?></h2>
                <ul class="breadcrumb">
                    <li>
                        <a href="site_url()">Home</a>
                    </li>
                    <li>
                        <?php echo $page_slug ?>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!--=======Hero-Area Ends Here=======-->

<!--=======Privacy-Section Starts Here=======-->
    <section class="privacy-section padding-top padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="terms-condition">                        
                        <div class="item">
                            <?php echo $pageinfo->content ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=======Privacy-Section Ends Here=======-->