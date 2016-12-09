<?php require_once 'connect.php' ?>
<?php $title = 'News' ?>
<?php include 'header.php'; ?>
	<section class="news">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 news-highlight">
					<div class="row center">
						<?php  
							  	$sql = "SELECT * FROM news ORDER BY Id DESC limit 3";
					            $q = $conn->query($sql);
					            $q->setFetchMode(PDO::FETCH_ASSOC);
					            while ($row = $q->fetch()):
						?>
						<div class="col-lg-12">
							<div class="new-title-bar center">
								<div class="title-bar">
									<span>CATEGORY</span>
									<h1>Name CATEGORY</h1>
								</div>
							</div>
						</div>
						<div class="new-single col-lg-12">
							<div class="new-single-image">
								<a href="#">
									<img src="admin/files/<?php echo $row['Image']; ?>" class="image-responsive" alt="">
								</a>
							</div>
							<div class="new-single-header">
								<h2 class="main-title">
									<a href="#" class=""><?php echo $row['Title']; ?></a>
								</h2>
								<div class="time-new-single">
									<span>Published at <?php echo $row['Datenews']; ?></span>
								</div>
								<div class="new-single-content">
									<?php echo $row['HeadContext']; ?>
								</div>
								<div class="new-single-more">
									<a href="<?php echo $row['Url'] ?>">continue reading</a>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
					</div>
				</div>
				<div class="col-lg-3 new-recent ">
					<h4 class="new-recent-title">
						<span>RECENT POST</span>
					</h4>
					<ul class="new-feed ">
						<li class="single-feed fearture-feed">
						<?php  
						  	$sql = "SELECT * FROM news ORDER BY Id DESC limit 6";
				            $q = $conn->query($sql);
				            $q->setFetchMode(PDO::FETCH_ASSOC);
				            $count = 0;
				            while ($row = $q->fetch()):
				            	$count++;
				            	if ($count > 3) {
						?>
							<div class="feed col-lg-12">
								<div class="feed-image">
									<a href="#">
										<img src="admin/files/<?php echo $row['Image']; ?>" class="image-responsive" alt="">
									</a>
								</div>
								<div class="feed-header">
									<h2 class="feed-title">
										<a href="#" class=""><?php echo $row['Title']; ?></a>
									</h2>
									<div class="time-new-single">
										<span>Published at <?php echo $row['Datenews']; ?></span>
									</div>
								</div>
							</div>
						<?php }
							else {
								continue;
							}
							endwhile; ?>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
	</section>
	
<?php include 'footer.php'; ?>