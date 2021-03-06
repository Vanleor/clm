<section id="main-content">
  <section class="wrapper">
    <!-- page start-->
    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading">
            Rewards
            <?php if ($flash_msg = $this->session->flash_msg): ?>
              <br><sub style="color: <?php echo $flash_msg['color'] ?>"><?php echo $flash_msg['message'] ?></sub>
            <?php endif; ?>
          </header>
          <div class="panel-body">
            <p>
              <button type="button" class="add-btn btn btn-success btn-sm">Add new</button>
            </p>
            <div class="table-responsive" style="overflow: hidden; outline: none;" tabindex="1">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Points needed</th>
                    <th>Master class</th>
                    <th>Winners</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (count($rewards) > 0 ): ?>

                  <?php $i = 1; foreach ($rewards as $key => $value): ?>
                    <tr>
                      <th scope="row"><?php echo $i++ ?></th>
                      <td><?php echo $value->title ?></td>
                      <td><?php echo $value->description ?></td>
                      <td><a href="<?php echo $value->image_url ?>" target="_blank">
                        <img src="<?php echo $value->image_url ?>" alt="" style="max-width:90px">
                      </a></td>
                      <td><?php echo $value->cost ?></td>
                      <td><?php echo ucfirst($value->master_class); ?></td>
                      <td><?php echo $value->winners . "/" . $value->total_winners_allowed ?></td>
                      <td>
                        <button type="button"
                        data-payload='<?php echo json_encode(['id' => $value->id, 'title' => $value->title, 'description' => $value->description, 'image_url' => $value->image_url, 'cost' => $value->cost, 'total_winners_allowed' => $value->total_winners_allowed, 'class_available' => $value->class_available ])?>'
                        class="edit-row btn btn-info btn-xs">Edit</button>
                        <button type="button" data-id='<?php echo $value->id; ?>'
                          class="btn btn-delete btn-danger btn-xs">Delete</button>
                        </td>
                      </tr>
                    <?php endforeach; ?>

                  <?php else: ?>
                    <tr>
                      <td colspan="7" style="text-align:center">Empty table data</td>
                    </tr>
                  <?php endif; ?>
                  </tbody>
                </table>
                <style>
                  .active_lg {
                    background: lightgray !important
                  }
                </style>
                <ul class="pagination">
                  <ul class='pagination'>
                    <?php
                    $page = ($this->input->get('page')) ?: 1;
                    for ($i=1; $i <= $total_pages; $i++) { ?>
                      <li><a
                        class="<?php echo ($i == $page) ? 'active_lg' : '' ?>"
                        href="<?php echo base_url('admin/rewards')
                        . "?page=" . $i;
                        ?>"><?php echo $i ?></a></li>
                      <?php } ?>
                    </ul>
                  </ul>
              </div>
            </div>
          </section>
        </div>
      </div>
      <!-- page end-->
    </section>
  </section>

  <!-- Modal -->
  <div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Manage</h4>
        </div>
        <div class="modal-body">

          <form role="form" method="post" enctype='multipart/form-data'>
            <div class="form-group">
              <label >Title</label>
              <input type="text" class="form-control" name="title" placeholder="Name">
            </div>
            <div class="form-group">
              <label >Cost (Points needed)</label>
              <input min="0" type="number" class="form-control" name="cost" placeholder="Cost (Points needed)">
            </div>
            <div class="form-group">
              <label>Total winners allowed</label>
              <input min="0" type="number" class="form-control" name="total_winners_allowed" placeholder="Total winners allowed">
            </div>
            <div class="form-group">
              <label >Description</label>
              <textarea name="description" placeholder="Description"
              class="form-control" style="resize:vertical"
              rows="8" cols="60"></textarea>
            </div>
            <div class="form-group">
              <label >Class availability<br>
                <sub>Note: Lower classes are available when a seller has a greater class. <br>
                  Example: Classic rewards are always available in Gold ranking users.
                </sub>
              </label>
              <select class="form-control" name="class_available">
                <?php foreach ($tiers as $key => $value): ?>
                  <option value="<?php echo $value ?>"><?php echo ucfirst($key) ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label >Image</label>
              <input type="file" name="image_url" class="default" accept=".jpg,.png,.jpeg">
            </div>

          </div>
          <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
            <input class="btn btn-info" type="submit" value="Save changes">
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- modal -->

  <script src="<?php echo base_url('public/admin/js/custom/') ?>rewards_management.js"></script>
  <script src="<?php echo base_url('public/admin/js/custom/') ?>generic.js"></script>
