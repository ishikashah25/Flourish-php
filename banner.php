<!-- banner -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<!-- Indicators-->
		<ol class="carousel-indicators">
			<?php 
			include_once 'connection.php';
			$query = mysqli_query($connection, "SELECT * FROM `banner` WHERE `active`= 'Y' ORDER BY `image_id` DESC");
			$convertedpath = 'admin/bannerimages/convert/TH';
			$i1 = 0;
			if ($query) {
				while($row = mysqli_fetch_assoc($query)){
			?>
			<li data-target="#myCarousel" data-slide-to="<?php echo $i1; ?>" <?php echo $i1 == 0 ? "class=\"active\"":"";?>></li>
			<?php
				$i1++; 	
				}
			}
			?>
		</ol>
		<div class="carousel-inner">
			<?php 
			$query1 = mysqli_query($connection, "SELECT * FROM `banner` WHERE `active`= 'Y' ORDER BY `image_id` DESC");
			$convertedpath = 'admin/bannerimages/convert/TH';
			$i = 0;
			if ($query1) {
				while($row1 = mysqli_fetch_assoc($query1)){
					$i++;
			?>
			<div class="carousel-item <?php echo $i == 1 ? "active" : "";?>">
				<img src="<?php echo "$convertedpath{$row1['image_index']}"; ?>">
			</div>
			<?php 
				}
			}
			?>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<!-- //banner -->