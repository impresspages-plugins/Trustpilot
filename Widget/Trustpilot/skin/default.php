
<div class="ipPluginTrustpilot">
	<div class="reviews row">
	<?php if ($reviews) { ?>
		<?php foreach($reviews as $review) { ?>
			<div class="review">
				<img src="<?php echo $review->getTrustScore()->imageUrl('medium'); ?>" alt="stars"/>
				<h3><?php echo $review->title(); ?></h3>
				<p class="desc">"<?php echo esc($review->content()); ?>"</p>
				<div class="author">
					<img class="avatar" src="<?php echo $review->getUser()->imageUrl(); ?>" alt="<?php echo esc($review->getUser()->name()); ?>" />
					<span class="name"><?php echo esc($review->getUser()->name()); ?></span>
					<span class="date">
						<time datetime="<?php echo ipFormatDate($review->getTime()->unixTime(), 'Trustpilot'); ?>"><?php echo $review->getTime()->humanDate(); ?></time>
					</span>
				</div>
			</div>
		<?php } ?>
	<?php } else { ?>
		<?php echo __('Please go to plugin settings and enter domain ID', 'Trustpilot'); ?>
	<?php } ?>
	</div>
</div>
