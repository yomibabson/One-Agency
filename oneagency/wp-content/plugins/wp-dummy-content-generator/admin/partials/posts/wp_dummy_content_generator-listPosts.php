<?php
global $wpdb;
if(isset($_GET['action']) && $_GET['action'] == 'wp_dummy_content_generator_deleteposts'){
	wp_dummy_content_generatorDeleteFakePosts();
	wp_redirect("admin.php?page=wp_dummy_content_generator-posts&tab=view_posts&status=success");
}
$wp_dummy_content_generatorQueryData = wp_dummy_content_generatorGetFakePostsList();
$wp_dummy_content_generatorPostData = $wp_dummy_content_generatorQueryData->posts;
$wp_dummy_content_generatorActual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 ?>
 <h2>Bellow are all the posts generated by this plugin 
 	<?php if ( !empty($wp_dummy_content_generatorPostData) ) { ?>
	 	<span class="deleteSpan">
	 		<a onclick="return confirm('Are you sure you want to delete all fake posts?')" class="wp_dummy_content_generator-btn wp_dummy_content_generator-btnRed" href="<?=$wp_dummy_content_generatorActual_link?>&action=wp_dummy_content_generator_deleteposts">Delete all posts</a>
	 	</span>
 	<?php } ?>
 </h2>
<table id="wp_dummy_content_generatorListPostsTbl" class="stripe" style="width:100%">
	<thead>
		<tr>
			<th>#</th>
			<th>Post title</th>
			<th>Post type</th>
			<th>Post Status</th>
			<th>Created date</th>
		</tr>
	</thead>
	<tbody>
		<?php
		if ( !empty($wp_dummy_content_generatorPostData) ) {
			$counter = 1;
			foreach ($wp_dummy_content_generatorPostData as $key => $postDatavalue){ ?>
				<tr>
					<td><?=$counter?></td>
					<td><?=$postDatavalue->post_title?></td>
					<td><?=$postDatavalue->post_type?></td>

					<td><?=$postDatavalue->post_status?></td>
					<td><?=date("F jS, Y", strtotime($postDatavalue->post_date));?></td>
				</tr>
				<?php
				$counter++;
			}
			wp_reset_postdata();
		} ?>
	</tbody>
</table>