<?

/**
 * Benefits Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-sections.php' which is triggered by 'sections.php'.
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       mars_1.0.0
 *
 */
?>
<?php $tabs = get_sub_field('tab');?>
<section class="section section-tabs" style="background-image: url(<?= get_sub_field('background') ?>)">
<ul class="nav nav-tabs" id="benefits" role="tablist">
<?php for ($i=0; $i < count($tabs) ; $i++) { ?>
  <li class="nav-item" role="presentation">
    <a class="nav-link <?= $i === 0 ? ' active' : ''?>"
	id="b-<?= $i?>-link"
	data-toggle="tab"
	data-target="#b-tab-<?= $i?>"
	role="tab"
	aria-controls="b-tab-<?= $i?>"
	aria-selected="<?= $i === 0 ? 'true' : 'false' ?>"><?= $tabs[$i]['label_tab']?></a>
  </li>
<?php }?>

</ul>
<div class="container">
<div class="tab-content" id="benefitsContent">
<?php for ($y=0; $y < count($tabs) ; $y++) {
 $list = $tabs[$y]['list'];
?>
  <div class="tab-pane fade <?= $y === 0 ? ' show active' : ''?>"
  id="b-tab-<?= $y?>"
  role="tabpanel"
  aria-labelledby="b-<?= $y?>-link">
	<h2 class="text-center mb-5"><?= $tabs[$y]['title']?></h2>
	<div class="row">
	<?php foreach ($list as $item ) : $image = $item['img']; ?>
	<div class="col-sm-4 text-center">
		<img src="<?= $image['sizes']['medium']; ?>" alt="<?= $image['alt']; ?>" class="img-circle img-shadow"/>
		<h3 class="item-title"><?= $item['title'] ?></h3>
		<p class="item-desc"><?= $item['desc'] ?></p>
	</div>
	<?php endforeach; ?>
	</div>
  </div>
<?php }?>
</div>
</div>
</section>