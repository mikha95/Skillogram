<div class="container">
	<div name="post" class="row"> <?php
		foreach($posts as $post) { ?>			
			<div class="col-12 col-md-4">
				<div class="card mb-4">
					<img src="/OOP/users_images/<?php echo $post['image_name']; ?>" class="card-img-top" alt="image">
					<div class="card-body">
					<?php ($post['login'] == $_SESSION['login']) ? $ref = 'mypage.php' : $ref = 'user.php?login=' . $post['login']; ?>
						<p class="card-text font-weight-bold">
							<a href='<?php echo $ref;?>'><?php echo $post['login'];?></a>
						</p>			
						<p class="card-text"><?php echo $post['description']; ?></p>
					</div>
				</div>
			</div>
		<?php
		}
		?> 
	</div> 
</div>