<?php require APPROOT . '/views/inc/header.php'; ?>
  <?php flash('pharmaceutical_message'); ?>
  <div class="row mb-3">
    <div class="col-md-6">
      <h1>Pharmaceuticals</h1>
    </div>
    <?php if (isset($_SESSION['user_id'])) : ?>
      <div class="col-md-6">
        <a href="<?php echo URLROOT; ?>/pharmaceuticals/add" class="btn btn-primary pull-right">
          <i class="fa fa-pencil"></i> Add Pharmaceutical
        </a>
      </div>
      <?php endif; ?>
  </div>
  <?php foreach($data['pharmaceuticals'] as $pharmaceutical) : ?>
    <div class="card card-body mb-3">
      <h4 class="card-title"><?php echo $pharmaceutical->title; ?></h4>
      <div class="bg-light p-2 mb-3">
        Written by <?php echo $pharmaceutical->name; ?> on <?php echo $pharmaceutical->pharmaceuticalCreated; ?>
      </div>
      <p class="card-text"><?php echo $pharmaceutical->body; ?></p>
      <a href="<?php echo URLROOT; ?>/pharmaceuticals/show/<?php echo $pharmaceutical->pharmaceuticalId; ?>" class="btn btn-dark">More</a>
    </div>
    <?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>