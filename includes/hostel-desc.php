<div class="hostel-desc">
	<h4>Description</h4>
	<p>
		<?= $description;?>
	</p>
</div>
<div class="hostel-desc">
	<h4>Details</h4>
	<ul class="row">
		<?php
		foreach ($features as $key):
			if (!empty($key)) {
				?>
				<li class="col-md-4">

					<p><?= $key;?></p>
				</li>
				<?php
			}
		endforeach;?>
	</ul>
</div>