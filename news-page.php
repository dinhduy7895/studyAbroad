<?php require_once 'functions/connect.php' ;
session_start();?>
<?php $title = 'News' ?>
<?php include 'inc/header.php'; ?>
	<section class="news">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 tarbar">
					<a href="news-page.php?id=0" class="split  <?php if(isset($_GET['id']) && $_GET['id']==0 ) echo " active" ?> "  >News in day</a>
					<a href="news-page.php?id=1" class="split  <?php if(isset($_GET['id']) && $_GET['id']==1 ) echo " active" ?> "  >Recruit</a>
					<a href="news-page.php" class="split  <?php if(!isset($_GET['id'])) echo " active" ?> "   >All</a>
				</div>
				<div class="col-lg-9 news-highlight">
					<div class="row center">
						<?php  
								if(isset($_GET['id'])){
									if($_GET['id'] != 0)
									$sql = "SELECT n.*, u.NameUniversity FROM news n, university u where u.IdUniversity = n.IdUniversity and n.IdScholarship != 0  ORDER BY Id DESC limit 3";
									else
									$sql = "SELECT n.*, u.NameUniversity FROM news n, university u where u.IdUniversity = n.IdUniversity and n.IdScholarship = 0  ORDER BY Id DESC limit 3";
								}
								else
								$sql = "SELECT n.*, u.NameUniversity FROM news n, university u where u.IdUniversity = n.IdUniversity ORDER BY Id DESC limit 3";

								$q = $conn->query($sql);
					            $q->setFetchMode(PDO::FETCH_ASSOC);
					            while ($row = $q->fetch()):
						?>
						<div class="col-lg-12">
							<div class="new-title-bar center">
								<div class="title-bar">
									<span>CATEGORY</span>
									
									<?php
										echo "<a href=' news-page.php?id=".$row['IdScholarship']."'>";
										if($row['IdScholarship']== 0) echo "<h1>NEWS IN DAY </h1>";
										else 				echo "<h1>RECRUIT</h1>";
										echo "</a>";
									 ?>
									
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
									<a href="<?php echo $row['Url'] ?>" class=""><?php echo $row['Title']; ?></a>
								</h2>
								<div class="time-new-single">
									<span>Published at <?php echo $row['Datenews']; ?><br></span>
									<span>Upload by  <?php echo $row['NameUniversity']; ?></span>
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
						  	$sql = "SELECT n.*, u.NameUniversity FROM news n, university u where u.IdUniversity = n.IdUniversity ORDER BY Id DESC limit 6";
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
										<span>Published at <?php echo $row['Datenews']; ?><br></span>
										<span>Upload by  <?php echo $row['NameUniversity']; ?></span>
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
	
<?php include 'inc/footer.php'; ?>