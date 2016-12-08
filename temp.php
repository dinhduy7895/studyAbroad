<?php $title = 'News' ;
include('connect.php');
?>
<?php include 'header.php'; ?>
	<section class="news">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 news-highlight">
					<div class="row center">
						<div class="new-single col-lg-12">
							<div class="new-single-image">
								<a href="#">
									<img src="img/new2.jpg " class="image-responsive" alt="">
								</a>
							</div>
							<div class="new-single-header">
								<div class="new-single-header-category">
									<span><a href="#">News in Day</a></span>
								</div>
								<h2 class="main-title">
									<a href="#" class="">_title</a>
								</h2>
								<div class="time-new-single">
									<span>Published at _date</span>
								</div>
								<div class="new-single-content">
										_headcontent
										<br>
										_content
									
								</div>
								<div class="register center">
									<a  data-toggle="modal" href="#myModal" class="register_link">Register Now</a>
									 <!-- Modal -->
									<div class="modal fade" id="myModal" role="dialog">
										<div class="modal-dialog">
										
											<!-- Modal content-->
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Please fill your information</h4>
												</div>
												<div class="modal-body">
													<p>Some text in the modal.</p>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
											</div>
										
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 new-recent ">
					<h4 class="new-recent-title">
						<span>RECENT POST</span>
					</h4>
					<ul class="new-feed ">
						<li class="single-feed fearture-feed">
							<div class="feed col-lg-12">
								<div class="feed-image">
									<a href="#">
										<img src="img/new2.jpg " class="image-responsive" alt="">
									</a>
								</div>
								<div class="feed-header">
									<h2 class="feed-title">
										<a href="#" class="">NAME ARTICLE</a>
									</h2>
									<div class="time-new-single">
										Published at 12:00 AM
									</div>
								</div>
							</div>
						</li>
						<li class="single-feed row">
							<div class="feed col-lg-12">
								<div class="feed-image col-lg-5">
									<a href="#">
										<img src="img/new2.jpg " class="image-responsive" alt="">
									</a>
								</div>
								<div class="feed-header col-lg-7">
									<h2 class="feed-title">
										<a href="#" class="">NAME ARTICLE</a>
									</h2>
									<div class="time-new-single">
										Published at 12:00 AM
									</div>
								</div>
							</div>
						</li>
						<li class="single-feed row">
							<div class="feed col-lg-12">
								<div class="feed-image col-lg-5">
									<a href="#">
										<img src="img/new2.jpg " class="image-responsive" alt="">
									</a>
								</div>
								<div class="feed-header col-lg-7">
									<h2 class="feed-title">
										<a href="#" class="">NAME ARTICLE</a>
									</h2>
									<div class="time-new-single">
										Published at 12:00 AM
									</div>
								</div>
							</div>
						</li>
						<li class="single-feed row">
							<div class="feed col-lg-12">
								<div class="feed-image col-lg-5">
									<a href="#">
										<img src="img/new2.jpg " class="image-responsive" alt="">
									</a>
								</div>
								<div class="feed-header col-lg-7">
									<h2 class="feed-title">
										<a href="#" class="">NAME ARTICLE</a>
									</h2>
									<div class="time-new-single">
										Published at 12:00 AM
									</div>
								</div>
							</div>
						</li>
						<li class="single-feed row">
							<div class="feed col-lg-12">
								<div class="feed-image col-lg-5">
									<a href="#">
										<img src="img/new2.jpg " class="image-responsive" alt="">
									</a>
								</div>
								<div class="feed-header col-lg-7">
									<h2 class="feed-title">
										<a href="#" class="">NAME ARTICLE</a>
									</h2>
									<div class="time-new-single">
										Published at 12:00 AM
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	
<?php include 'footer.php'; ?>