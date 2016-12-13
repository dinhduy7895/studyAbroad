<?php $title = 'Home';
session_start();  ?>
<?php require_once 'functions/connect.php' ;?>
<?php include 'inc/header.php'; ?>
	<section id="slider" class="slider">
		<div id="carousel" class="carousel slide" data-ride="carousel" data-interval="false">
			<ol class="carousel-indicators">
			      <li data-target="#carousel" data-slide-to="0" class="active"></li>
			      <li data-target="#carousel" data-slide-to="1"></li>
			      <li data-target="#carousel" data-slide-to="2"></li>
			    </ol>
			<div class="carousel-inner" role="listbox">
				<div class="item active single-slider">
					<img src="img/slide1.jpg" alt="Chania" class=" img-responsive img-100">
					<div class="carousel-caption">
						<h3>RETAIN</h3>
						<div class="banner-content">
							<p>Our single-minded focus<br> is our students</p>
							<p>Enrolling the best<br>and brightest</p>
						</div>
						<h3><a class="read" href="#">READ MORE</a></h3>
					</div>
				</div>
				<div class="item single-slider">
					<img src="img/slide2.jpg" alt="Chania" class=" img-responsive img-100">
					<div class="carousel-caption">
						<h3>RETAIN</h3>
						<div class="banner-content">
							<p>Our single-minded focus<br> is our students</p>
							<p>Enrolling the best<br>and brightest</p>
						</div>
						<h3><a class="read" href="#">READ MORE</a></h3>
					</div>
				</div>
				<div class="item single-slider">
					<img src="img/slide3.jpg" alt="Chania" class=" img-responsive img-100">
					<div class="carousel-caption">
						<h3>RETAIN</h3>
						<div class="banner-content">
							<p>Our single-minded focus<br> is our students</p>
							<p>Enrolling the best<br>and brightest</p>
						</div>
						<h3><a class="read" href="#">READ MORE</a></h3>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="spot">
		<div class="container">
			<div class="row">
	            <div class="col-lg-4 col-md-4"data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft; ">
	                <div class="box box_skin">
	                    <p class="def letter"style='color:#1ff0ec'>i</p>

	                    <div class="heading">
	                        <p class="def">Intelligent</p>

	                        
	                    </div>
	                    <p class="text-icon">Intelligent Strategy Solutions provides high quality training and consultancy services. 
						We deliver quality and value. Our strength is in SME growth and development. Our facilitators focuses on SME business and operation improvement.</p>
	                    
	                </div>
	            </div>

	            <div class="col-lg-4 col-md-4 " data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
	                <div class="box box_skin">
	                    <p class="def letter"style='color:#b6d5e8'>c</p>

	                    <div class="heading">
	                        <p class="def" >Creative</p>

	                        
	                    </div>
	                    <p class="text-icon">A creative strategy is generally the result of a team composed of one or more copywriters, an art director and a creative director. 
						The creative strategy generally explains how the advertising campaign will meet the advertising objectives of the business.</p>
	                   
	                </div>
	            </div>

	            <div class="col-lg-4 col-md-4 " data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
	                <div class="box box_skin">
	                    <p class="def letter" style='color:#ddcaee'>d</p>

	                    <div class="heading">
	                        <p class="def">Dynamic</p>
	                    </div>
	                    <p class="text-icon">The dynamic model of the strategy process is a way of understanding how strategic actions occur. It recognizes that strategic planning is dynamic, that is, strategy-making involves a complex pattern of actions and reactions. 
						It is partially planned and partially.</p>
	                    
	                </div>
	            </div>
			</div>		
		</div>
	</section>
	<section id = "invest" class="about-us">
		<div class="container" >
			<div class="invest_area"> 
				<h1>INVEST IN YOUR <span>FUTURE</span></h1>
				<p>"The Seven Social Sins are:
					<br/>Wealth without work.
					<br/>Pleasure without conscience.
					<br/>Knowledge without character.
					<br/>Commerce without morality.
					<br/>Science without humanity.
					<br/>Worship without sacrifice.
					<br/>Politics without principle.
					<br/>
					From a sermon given by Frederick Lewis Donaldson in Westminster Abbey, London, on March 20, 1925.” 
					<br/>― Frederick Lewis Donaldson
				</p>
			</div>
		</div>
	</section>

	<section class="news">
		<div class="container">
				<div class="col-lg-12 views-field-title"> <span class="title-content">In The News</span> </div>
				<div class="col-lg-7 col-md-7 new-left">
	                <div class="view-content">
                        <?php  
							  	$sql = "SELECT * FROM news ORDER BY Id DESC limit 2";
					            $q = $conn->query($sql);
					            $q->setFetchMode(PDO::FETCH_ASSOC);
					            while ($row = $q->fetch()):
						?>
	                    <div class="views-row ">
	                        <div class="views-field-field-picture">
	                            <div class="field-content"><img typeof="foaf:Image" src="admin/files/<?php echo $row['Image']; ?>" width="940" height="626" alt="" />
	                            </div>
	                            <div class="back-ground-title"></div>
	                        <div class="views-field-field-headline">
	                            <div class="field-content center "><a href="<?php echo $row['Url'] ?>" class="title-dr"> <?php echo $row['Title']; ?></a></div>
	                        </div>
	                        </div>
	                        
	                        <div class=" views-field-body">
	                            <div class="field-content">
	                                <?php echo $row['HeadContext']; ?>
	                            </div>
	                        </div>
	                        <div class="views-field-field-more-link-1">
	                            <div class="field-content red-link"><a href="<?php echo $row['Url'] ?>" target="_blank">Learn More</a>
	                            </div>
	                        </div>
	                    </div>
                        <?php endwhile; ?>
	                   
	                </div>
	            </div>

	            <div class="col-lg-5 col-md-5 new-right">
	            	<div id="block-views-recent-news-block" class="block block-views box_skin">
	                    <div class="content">
	                        <div class="view-recent-survey block clearfix center">
	                            <div class="view-header">
	                                <h2>CatPulse</h2>
	                                <p>Stay ahead of the curve by being in touch with the ever-changing culture of today’s students. CatPulse gives us a snapshot of the attitudes and beliefs of UA students. We know, in real time, what it’s like to be a Wildcat today.</p>
	                            </div>



	                            <div class="view-content">
	                                
	                                    <div class="catpulse_right">
	                                        <span class="catpulseicon"></span>
	                                        <div class="catpulse_content">
	                                            <h1 class="field-content">83%</h1>
	                                            <div class="catpulse_text">
	                                                <p class="field-content">of Wildcats plan to pursue a professional, master&#039;s, or doctoral degree. </p> <span class="field-content red-link"><a href="senior-vice-president/surveys.html">Learn More</a></span> </div>
	                                        </div>
	                                    </div>
	                               
	                            </div>
	                        </div>
	                    </div>
               		</div>
	            </div>

		</div>
	</section>
	
	<section class="adverst">
		<div class="ad-slide">
			<div id="ad-myCarousel" class="carousel slide" data-ride="carousel">									
				<!-- Indicators -->
			    <ol class="carousel-indicators" id="footer-caro">
			      <li data-target="#ad-myCarousel" data-slide-to="0" class="active"></li>
			      <li data-target="#ad-myCarousel" data-slide-to="1"></li>
			      <li data-target="#ad-myCarousel" data-slide-to="2"></li>
			      <li data-target="#ad-myCarousel" data-slide-to="3"></li>
			    </ol>
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
					    <img src="img/spot1.jpg" alt="Chania" class="slides">
					</div>
					<div class="item ">
					    <img src="img/spot3.jpg" alt="Chania" class="slides">
					</div>
					<div class="item ">
					    <img src="img/spot4.jpg" alt="Chania" class="slides"  >
					</div>
					<div class="item ">
					    <img src="img/spot5.jpg" alt="Chania" class="slides">
					</div>
				</div> <!-- end slide -->
			</div>	
		</div>
	</section>

	<?php include 'inc/footer.php'; ?>