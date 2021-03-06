<div class="app-menu">
  <div class="p-4 h-100">
    <div class="scroll">
      <div class="border-0 card-default mb-2">
        <div class="card-header px-0 pb-3 d-flex">
          <div class="media w-100">
            <div class="media-body my-auto">
              <h4 class="card-title mb-0">Classes</h4>
            </div>
            <?php if($is_admin): ?>
            <div class="media-right float-right">
              <a href="javascript:void(0);" class="btn btn-header-secondary icon-button" data-toggle="tooltip" data-placement="left" data-html="true" title="Click to Edit<br>Categories" id="edit-categories" style="font-size:1rem;">
                <i class="fa fa-pencil-alt">
                </i>
              </a>
            </div>
            <?php endif; ?>
          </div>
        </div>
        <div>
          <ul class="list-unstyled mb-5">
            <?php if (!empty($batches)): ?>
            <?php foreach ($batches as $category): ?>
            <li class="d-flex">
              <div class="flex-grow-1 my-auto <?php echo ($cat_id == $category['batch_id']) ? 'text-primary' : ''; ?>">
                <?php if ($is_admin) { ?>
                  <a href="<?php echo site_url('coaching/courses/index/' . $coaching_id . '/' . $category['batch_id']); ?>" class="py-2 d-block text-decoration-none <?php echo ($cat_id == $category['batch_id']) ? 'text-primary' : ''; ?>">
                <?php } else { ?>
                  <a href="<?php echo site_url('coaching/courses/direct_courses/' . $coaching_id . '/' . $category['batch_id']); ?>" class="py-2 d-block text-decoration-none <?php echo ($cat_id == $category['batch_id']) ? 'text-primary' : ''; ?>">
                <?php } ?>
                  <i class="iconsminds-right <?php echo ($cat_id == $category['batch_id']) ? 'text-primary' : ''; ?>">
                  </i>
                  <?php echo $category['batch_name']; ?>
                </a>
              </div>
              <?php if($is_admin): ?>
              <div class="flex-shrink-1 my-auto h-100 edit-category" style="display: none;">
                <button type="button" class="edit-cat btn btn-header-secondary icon-button" data-toggle="modal" data-target="#editCategories" data-id="<?php echo $category['batch_id']; ?>" data-value="<?php echo $category['batch_name']; ?>">
                  <div class="d-flex h-100 justify-content-center align-items-center">
                    <i class="simple-icon-pencil text-primary m-0">
                    </i>
                  </div>
                </button>
              </div>
              <?php endif; ?>
            </li>
            <?php endforeach;?>
            <?php endif;?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <a class="app-menu-button d-inline-block d-xl-none" href="#">
    <i class="simple-icon-options">
    </i>
  </a>
</div>
