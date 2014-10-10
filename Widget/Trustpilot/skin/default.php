
<div class="ipPluginTrustpilot">
	<div class="reviews row">
	<?php if ($reviews) { ?>
		<?php foreach($reviews as $review) { ?>
			<div class="review">
				<img src="<?php echo $review->getTrustScore()->imageUrl('medium'); ?>" alt="stars"/>
				<h3><?php echo $review->title(); ?></h3>
				<p class="desc">"<?php echo esc($review->content()); ?>"</p>
				<img src="<?php echo $review->getUser()->imageUrl(); ?>" alt="<?php echo esc($review->getUser()->name()); ?>" class="user-img" />
				<span class="author"><?php echo esc($review->getUser()->name()); ?></span>
				<span class="date">
					<time datetime="<?php echo ipFormatDate($review->getTime()->unixTime(), 'Trustpilot'); ?>"><?php echo $review->getTime()->humanDate(); ?></time>
				</span>
			</div>
		<?php } ?>
	<?php } else { ?>
		<?php echo __('Please go to plugin settings and enter domain ID', 'Trustpilot'); ?>
	<?php } ?>
	</div>
</div>
