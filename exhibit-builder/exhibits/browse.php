<?php
$title = __('Browse Exhibits');
echo head(array(
    'title' => $title,
    'bodyclass' => 'exhibits browse',
));
?>
<div id="primary">
    <div id="exhibits-title" class="row page-header">
        <div class="col-xs-12">
            <h1><?php echo $title; ?> <?php echo __('(%s total)', $total_results); ?></h1>
        </div>
    </div>
<?php if (count($exhibits) > 0): ?>
<nav class="navigation" id="secondary-nav">
    <?php echo nav(array(
        array(
            'label' => __('Browse All'),
            'uri' => url('exhibits'),
        ),
        array(
            'label' => __('Browse by Tag'),
            'uri' => url('exhibits/tags'),
        ),
    )); ?>
</nav>

<?php echo $pagination_links = pagination_links(); ?>

<?php $exhibitCount = 0; ?>
<?php foreach (loop('exhibit') as $exhibit): ?>
    <?php $exhibitCount++; ?>
    <div class="row">
    <div class="exhibit col-xs-12 <?php if ($exhibitCount%2==1) echo ' even'; else echo ' odd'; ?>">
        <h2><?php echo link_to_exhibit(); ?></h2>
        <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
        <div class="description"><?php echo $exhibitDescription; ?></div>
        <?php endif; ?>
        <?php if ($exhibitTags = tag_string('exhibit', 'exhibits')): ?>
        <p class="tags"><?php echo $exhibitTags; ?></p>
        <?php endif; ?>
    </div>
    </div>
<?php endforeach; ?>

<?php echo $pagination_links; ?>

<?php else: ?>
<p><?php echo __('There are no exhibits available yet.'); ?></p>
<?php endif; ?>

</div>
<?php echo foot();