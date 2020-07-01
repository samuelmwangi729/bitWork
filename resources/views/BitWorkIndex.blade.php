@extends('layouts.app')
@section('content')
<div class="row-fluid">


    <!-- BitWork Slider  -->
    <div class="ulockd-home-slider">
        <div class="container-fluid">
            <div class="row">
                <div class="pogoSlider" id="js-main-slider">
                    <div class="pogoSlider-slide" style="background-image:url(img/banner-img.png);">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="slide_text">
                                        <h3>Professional<br>CryptoLancers</h3>
                                        <br>
                                        <h4><span class="theme_color">For your Anonymous Projects</span></h4>
                                        <br>
                                        <p>Showcase your Skills to the world Using {{ config('app.name') }}  And Get Hired</p>
                                        <a class="contact_bt" href="/register">Join Us                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              &nbsp;<i class="fa fa-user-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pogoSlider-slide" style="background-image:url(img/banner-img.png);">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="slide_text">
                                        <h3>{{ config('app.name') }} Pay Safe</h3>
                                        <br>
                                        <h4><span class="theme_color">Via Escrow</span></h4>
                                        <br>
                                        <p>We hold funds paid to freelancers In Safe Deposits until  the Projects are complete</p>
                                        <a class="contact_bt" href="about.html">Read More &nbsp; &rarr;</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->
    
	<!-- section -->
    <div class="section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_left">
						   <div class="left">
						     <p class="section_count text-center" style="font-size:25px;font-weight:bold;color:#d9273f;background-color:#e0e2df;border-radius:30px">Need Work Done?</p>
						   </div>
						   <div class="right">
                            <h2><span class="theme_color">Get Work</span> Done On the Go</h2>
                            <p class="large">With the Available number of freelancers, We have highly Skilled freelancers  and thus Delivering high quality Outputs</p>
						  </div>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- end section -->

    <!-- section -->
    <div class="section dark_bg">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-12 text_align_center padding_0">
                    <div class="full">
                        <img class="img-responsive" src="img/img-2png.png" alt="#" />
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 white_fonts layout_padding padding_left_right">
                    <h3 class="small_heading">EVERYTHING<br>YOU NEED IN ONE PLATFORM</h3>
                    <p>
                        No Matter What You Need. There Is always a freelancer to get it Done all the way from 
                        web design,Digital Marketing and a lot more.Thus with Professionals, you can trust them by browing their prevoius projects together
                        with their portfolios.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
	
	<!-- section -->
    <div class="section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_left">
						   <div class="right">
                            <div class="right">
                                <p class="small_tag text-center">Top Rated Services</p>
                            </div>
                            <h2 class="text-center"><span>Pay for Quality</span> <span class="theme_color">We are always  Here to make sure that all goes smoothly for both Parties</span></h2>
                          </div>	
                        </div>
                    </div>
                </div>
            </div>
			<div class="row margin-top_30">
			
			   <div class="col-sm-6 col-md-4">
			     <div class="service_blog">
				    <div class="service_icons">
					   <img width="75" height="75" src="img/icon-1.png" alt="#">
					</div>
					<div class="full">
					   <h4>DIGITAL marketing</h4>
					</div>
					<div class="full">
					  <p>From $500 USD</p>
					</div>
				 </div>
			   </div>
			   
			   <div class="col-sm-6 col-md-4">
			     <div class="service_blog">
				    <div class="service_icons">
					   <img width="75" height="75" src="img/icon-2.png" alt="#">
					</div>
					<div class="full">
					   <h4>Business Plans</h4>
					</div>
					<div class="full">
					  <p>From $500 USD</p>
					</div>
				 </div>
			   </div>
			   
			   <div class="col-sm-6 col-md-4">
			     <div class="service_blog">
				    <div class="service_icons">
					   <img width="75" height="75" src="img/icon-3.png" alt="#">
					</div>
					<div class="full">
					   <h4>Data Science & Analysis</h4>
					</div>
					<div class="full">
					  <p>From $500 USD</p>
					</div>
				 </div>
			   </div>
			   
			   <div class="col-sm-6 col-md-4">
			     <div class="service_blog">
				    <div class="service_icons">
					   <img width="75" height="75" src="img/icon-4.png" alt="#">
					</div>
					<div class="full">
					   <h4>Marketing</h4>
					</div>
					<div class="full">
					  <p>From $500 USD</p>
					</div>
				 </div>
			   </div>
			   
			   <div class="col-sm-6 col-md-4">
			     <div class="service_blog">
				    <div class="service_icons">
					   <img width="75" height="75" src="img/icon-5.png" alt="#">
					</div>
					<div class="full">
					   <h4>SEO</h4>
					</div>
					<div class="full">
					  <p>From $500 USD</p>
					</div>
				 </div>
			   </div>
			   
			   <div class="col-sm-6 col-md-4">
			     <div class="service_blog">
				    <div class="service_icons">
					   <img width="75" height="75" src="img/icon-6.png" alt="#">
					</div>
					<div class="full">
					   <h4>Website Development</h4>
					</div>
					<div class="full">
					  <p>From $500 USD</p>
					</div>
				 </div>
			   </div>
			   
			   
			</div>
        </div>
    </div>
	<!-- end section -->
	<!-- section -->
    <div class="section layout_padding" style="background-color:#e5e2e0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_left white_fonts">
						   <div class="right">
						    <h2><span class="theme_color">Hire Top Talent Across The Planet With {{ config('app.name') }} </h2>
                          </div>	
                        </div>
                    </div>
                </div>
            </div>
			<div class="row margin-top_30">
                <div class="col-lg-12">
                    <div class="full">
                        <a href="/Membership/Plans" class="contact_bt">View Plans &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
    <br>

</div>
@endsection