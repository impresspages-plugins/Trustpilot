
<div class="ipPluginTrustpilot">
	<div class="reviews row">
	<?php if ($review) { ?>
		<?php for($i=1; $i<=$reviewLimit; $i++) { ?>
			<div class="review">
				<img src="<?php echo $review[$i]->getTrustScore()->imageUrl('medium'); ?>" alt="stars"/>
				<h3><?php echo $review[$i]->title(); ?></h3>
				<p class="desc">"<?php echo esc($review[$i]->content()); ?>"</p>
				<img src="<?php echo $review[$i]->getUser()->imageUrl(); ?>" alt="<?php echo esc($review[$i]->getUser()->name()); ?>" class="user-img" />
				<span class="author"><?php echo esc($review[$i]->getUser()->name()); ?></span>
				<span class="date">
					<time datetime="<?php echo ipFormatDate($review[$i]->getTime()->unixTime(), 'Trustpilot'); ?>"><?php echo $review[$i]->getTime()->humanDate(); ?></time>
				</span>
			</div>
		<?php } ?>
	<?php } else { ?>
		<?php echo __('Please go to plugin settings and enter domain ID', 'Trustpilot'); ?>
	<?php } ?>
	</div>
</div>