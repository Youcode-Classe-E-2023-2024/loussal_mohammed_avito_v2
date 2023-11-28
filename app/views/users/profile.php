<?php if(isset($_SESSION['admin_id'])  ) : ?>
   <?php require APPROOT . '/views/inc/adminHeader.php'; ?>
<?php else : ?>
   <?php require APPROOT . '/views/inc/header.php'; ?>
<?php endif; ?>
<div class="app-container">
<?php if(isset($_SESSION['user_id'])  ) : ?>
<div class="sidebar-container" style="margin-left:15px;">
        <ul class="sidebar-items">
            <li class="sidebar-item"><img src="<?php echo URLROOT; ?>/img/home-icon.png" ><a href="<?php echo URLROOT; ?>" class="sidebar-link">Home</a></li>
            <li class="sidebar-item"><img src="<?php echo URLROOT; ?>/img/add-icon.png" ><a href="<?php echo URLROOT; ?>/publications/add" class="sidebar-link">Add Publication</a></li>
            <li class="sidebar-item"><img src="<?php echo URLROOT; ?>/img/books-icon.png" ><a href="<?php echo URLROOT; ?>/publications/myPublication" class="sidebar-link">My publications</a></li>
        </ul>
</div>
<?php endif; ?>
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div id="content" class="content content-full-width">
            <!-- begin profile -->
            <div class="profile">
            
               <div class="profile-header">
                  <!-- BEGIN profile-header-cover -->
                  <div class="profile-header-cover"></div>
                  <!-- END profile-header-cover -->
                  <!-- BEGIN profile-header-content -->
                  <div class="profile-header-content">
                     <!-- BEGIN profile-header-img -->
                     <div class="profile-header-img">
                        <img src="<?php echo URLROOT . "/img/" . $data['user']->imgUrl ?>" style="width:100%; height:100%;" >
                     </div>
                     <!-- END profile-header-img -->
                     <!-- BEGIN profile-header-info -->
                     <div class="profile-header-info">
                        <h4 class="m-t-10 m-b-5"><?php echo ucwords($data['user']->name);  ?></h4>
                        <p class="m-b-10"><?php echo ucwords($data['user']->city);  ?></p>
                        <?php if($data['whoIsLoggedIn'] === 1): ?>
                        <a href="<?php echo URLROOT . "/users/edit/" . $data['user']->id; ?>" class="btn btn-sm btn-info mb-2">Edit Profile</a>
                        <?php endif; ?>
                     </div>
                     <!-- END profile-header-info -->
                  </div>
                  <!-- END profile-header-content -->
                  <!-- BEGIN profile-header-tab -->
                  <ul class="profile-header-tab nav nav-tabs">
                     <li class="nav-item"><a href=""  class="nav-link_" onclick="pagination(1)">POSTS</a></li>
                     <li class="nav-item"><a href="#"  class="nav-link_" onclick="pagination(2)">ABOUT</a></li>
                  </ul>
                  <!-- END profile-header-tab -->
               </div>
            </div>
            <!-- end profile -->
            <!-- begin profile-content -->
            <div class="profile-content">
               <!-- begin tab-content -->
               <div class="tab-content p-0">
                  <!-- begin #profile-post tab -->
                  <div class="tab-pane fade active show" id="profile-post">
                     <!-- begin timeline -->
                     <ul class="timeline" id="page1">
                     <?php foreach($data['publications'] as $pub) : ?>
                        <li>
                           <!-- begin timeline-time -->
                           <div class="timeline-time">
                              <span class="date"><?php echo $pub->diffTime ?></span>
                              
                           </div>
                           <!-- end timeline-time -->
                           <!-- begin timeline-icon -->
                           <div class="timeline-icon">
                              <a href="javascript:;">&nbsp;</a>
                           </div>
                           <!-- end timeline-icon -->
                           <!-- begin timeline-body -->
                           <div class="timeline-body">
                              <div class="timeline-header">
                                 <span class="userimage"><img src="<?php echo URLROOT . "/img/" . $pub->user_img;  ?>" alt=""></span>
                                 <span class="username"><a href="javascript:;"><?php echo $pub->user_name;  ?></a> <small></small></span>
                                 
                              </div>
                              <div class="timeline-img">
                                 <img src="<?php echo URLROOT . "/img/" . $pub->pub_img ?>" alt="">
                              </div>
                              <div class="timeline-likes">
                                 
                                 <div class="stats">
                                    <span class="fa-stack fa-fw stats-icon">
                                    <i class="fa fa-circle fa-stack-2x text-danger"></i>
                                    <i class="fa fa-heart fa-stack-1x fa-inverse t-plus-1"></i>
                                    </span>
                                    
                                    <span class="stats-total">4.3k</span>
                                 </div>
                              </div>
                              <!-- <div class="timeline-footer">
                                 <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i class="fa fa-thumbs-up fa-fw fa-lg m-r-3"></i> Like</a>
                                 
                              </div> -->
                              
                           </div>
                           <!-- end timeline-body -->
                        </li>
                        <?php endforeach; ?>

                     </ul>
                     <div id="page2" class="about">
                        <ul>
                           <li><img src="<?php echo URLROOT . "/img/email-icon.png" ?>" alt=""><p><?php echo $data['user']->email ?></p></li>
                           <li><img src="<?php echo URLROOT . "/img/location-icon.png" ?>" alt=""><p><?php echo $data['user']->city ?></p></li>

                        </ul>
                     </div>

                     <!-- end timeline -->
                  </div>
                  <!-- end #profile-post tab -->
               </div>
               <!-- end tab-content -->
            </div>
            <!-- end profile-content -->
         </div>
      </div>
   </div>
</div>   

    
    
</div>
   <!-- <?php print_r($data) ?> -->
<?php require APPROOT . '/views/inc/footer.php'; ?>

