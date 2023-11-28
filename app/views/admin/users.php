<?php require APPROOT . '/views/inc/adminHeader.php'; ?>
<div class="app-container">
    <div class="publications-container">
        <!-- <?php print_r($data) ?> -->
        <table class="table table-dark table-striped" style="bottom: 0; position: relative; top: 0;" >
            <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Full Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">City</th>
                  <th scope="col">Role</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($data['users'] as $user) : ?>
                <tr>
                  <th scope="row"><?php echo $user->id;  ?></th>
                  <td><img src="<?php echo URLROOT ?>/img/<?php echo $user->imgUrl ?>" alt="" srcset="" style="width:40px;height:40px;border-radius:20px;margin-right:10px" ><a href="<?php echo URLROOT . "/users/profile/" .  $user->id;  ?> " style="text-decoration:none;color:#fff;" ><?php echo $user->name;  ?></a></td>
                  <td><?php echo $user->email;  ?></td>
                  <td><?php echo $user->city;  ?></td>
                  <td><?php echo $user->role;  ?></td>
                </tr>
                
                <?php endforeach; ?>
              </tbody>
        </table>
    </div>
    
    
    
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>

