<?php require APPROOT . '/views/inc/adminHeader.php'; ?>
<div class="app-container">
    <div class="publications-container">
        <!-- <?php print_r($data) ?> -->
        <table class="table table-dark table-striped" style="bottom: 0; position: relative; top: 0;" >
            <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Creator</th>
                  <th scope="col">Description</th>
                  <th scope="col">Price</th>
                  <th scope="col">Create At</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($data['publications'] as $pub) : ?>
                <tr>
                  <th scope="row"><?php echo $pub->pub_id;  ?></th>
                  <td><?php echo $pub->pub_title;  ?></td>
                  <td><?php echo $pub->user_name;  ?></td>
                  <td><?php echo $pub->pub_title;  ?></td>
                  <td><?php echo $pub->pub_description;  ?></td>
                  <td><?php echo $pub->pub_created_at;  ?></td>
                  <td><a onclick="new CustomAlertAdmin().alerts('<?php echo $pub->pub_id ?>', '<?php echo $pub->pub_title ?>')"><img src="<?php echo URLROOT;?>/img/delete-icon.png" alt=""></a></td>
                </tr>
                
                <?php endforeach; ?>
              </tbody>
        </table>
    </div>
    
    
    
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>

