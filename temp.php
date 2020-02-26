<?php require APPROOT . '/views/inc/header.php'; ?>
  <?php flash('range_message'); ?>
  <div class="row mb-3">
    <div class="col-md-6">
      <h1>Ranges</h1>
    </div>
    <?php if (isset($_SESSION['user_id'])) : ?>
      <div class="col-md-6">
        <a href="<?php echo URLROOT; ?>/ranges/add" class="btn btn-primary pull-right">
          <i class="fa fa-pencil"></i> Add Range
        </a>
      </div>
    <?php endif; ?>
  </div>
  <?php foreach ($data['ranges'] as $range) : ?>
    <div class="card card-body mb-3">
      <h4 class="card-title"><?php echo $range->title; ?></h4>
      <div class="bg-light p-2 mb-3">
        Written by <?php echo $range->name; ?> on <?php echo $range->rangeCreated; ?>
      </div>
      <p class="card-text"><?php echo $range->body; ?></p>
      <img src="<?php echo URLROOT; ?>/img/uploads/ranges/<?php echo $range->img; ?>" alt="img" height="100" width="100">
      <a href="<?php echo URLROOT; ?>/ranges/show/<?php echo $range->rangeId; ?>" class="btn btn-dark">More</a>
    </div>
  <?php endforeach; ?>

  <h1>New products</h1>

  <?php foreach ($data['news'] as $new) : ?>
    <div class="card card-body mb-3">
      <h4 class="card-title"><?php echo $new->title; ?></h4>
      <div class="bg-light p-2 mb-3">
        Written by <?php echo $new->title; ?> on <?php echo $new->created_at; ?>
      </div>
      <p class="card-text"><?php echo $new->body; ?></p>
      <img src="<?php echo URLROOT; ?>/img/uploads/pharmaceuticals/<?php echo $new->img; ?>" alt="img" height="100" width="100">
      <a href="<?php echo URLROOT; ?>/ranges/show/<?php echo $new->newId; ?>" class="btn btn-dark">More</a>
    </div>
  <?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>