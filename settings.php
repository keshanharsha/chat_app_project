<?php session_start(); ?>
<?php   
  include_once('db/conn.php');
  include('includes/header.php'); 

  if (isset($_POST['edit_profile'])) {
      $users_id=$_POST['users_id'];
      $f_name=$_POST['f_name'];
      $l_name=$_POST['l_name'];
      $about=$_POST['about'];
      $tp=$_POST['tp'];

      $img1="";  
        if (isset($_FILES['img']['name']) && !empty($_FILES['img']['name'])) {
            $image = $_FILES['img']['name'];
            $temp_img1 = $_FILES['img']['tmp_name'];
             $img1=" ,image='$image' ";
        }

        if(count($error)==0){
          /*users_id,first_name,last_name,email,password,tp,image,country,about,active_status,last_active_time,delete_status,status*/
          move_uploaded_file($temp_img1,"assets/images/$image");
          $query="UPDATE users SET first_name='$f_name',last_name='$l_name',about='$about',tp='$tp' $img1 WHERE users_id='$users_id' LIMIT 1";
          if (mysqli_query($conn,$query)) {
              header('location:log_out.php');
          }
        }
  }

 ?>

<body>
  <div id="preloader"></div>
<!-- App -->
<main class="app">
  <!-- Header -->
  <header class="header">
    <div class="arrow"><a href="home.php"  style="text-decoration: none;   color: inherit;"><i class="fa fa-chevron-left fa-lg" aria-hidden="true"></i></a></div>
    <h1 class="header__title_settings" style="margin-left: -20px;">Settigns</h1>
  </header>
  <!-- Messages -->
  <section class="messages">
    <header class="messages__filter">
    </header>

<form action="" method="post"  enctype="multipart/form-data">
    <div style="background-color: rgb(241, 241, 241); border-radius: 5px;margin: 0px 5px 5px 5px;padding: 10px 0px 10px 0px;">

      <h1 class="sub_header" style="margin-left: 20px; margin-bottom: 8px; font-weight: 600;">Account Settings</h1>
      <input type="hidden" name="users_id" value="<?php echo $_SESSION['users_id'];?>">
      <div class="button_area">
        <i class="far fa-edit" style="margin-left: 20px;margin-right: 5px;"></i>
        <input type="text" name="f_name" value="<?php echo $_SESSION['first_name'];?>" placeholder="First name" style="width: 80%;">
      </div>
       <div class="button_area">
        <i class="far fa-edit" style="margin-left: 20px;margin-right: 5px;"></i>
        <input type="text" name="l_name" value="<?php echo $_SESSION['last_name'];?>" placeholder="Last name" style="width: 80%;">
      </div>

      <div class="button_area">
        <i class="far fa-edit" style="margin-left: 20px;margin-right: 5px;"></i>
        <input type="text" name="about" value="<?php echo $_SESSION['about'];?>" placeholder="About" style="width: 80%;">
      </div>

      <div class="button_area">
        <i class="far fa-edit" style="margin-left: 20px;margin-right: 5px;"></i>
        <input type="text" name="tp" value="<?php echo $_SESSION['tp'];?>" placeholder="Telephone" style="width: 80%;">
      </div>

      <div class="button_area">
        <i class="far fa-edit" style="margin-left: 20px;margin-right: 5px;"></i>
        <input type="text" name="email" value="<?php echo $_SESSION['email'];?>" placeholder="email" style="width: 80%;" disabled>
      </div>
      <div class="button_area">
         <i clas="far fa-edit" style="margin-left: 20px;margin-right: 5px;"></i>
        <input type="file" class="custom-file-input" name="img" style="width: 80%;">
      </div>
      
    </div>
   
    <div style="background-color: rgb(241, 241, 241); border-radius: 5px;margin: 0px 5px 5px 5px;padding: 10px 0px 10px 0px;">

      <h1 class="sub_header" style="margin-left: 20px; margin-bottom: 8px; font-weight: 600;">Privacy Settings</h1>
      <div class="button_area">
        <label for="" style="margin-left: 20px;margin-right: 5px;">Active user</label>
      </div>
      
    </div>
    <div style="background-color: rgb(241, 241, 241); border-radius: 5px;margin: 0px 5px 5px 5px;padding: 10px 0px 10px 0px;">

      <div class="button_area">
        <input type="submit" value="Save Changes" name="edit_profile"> 
      </div>
    </div>
 </form>
  </section>
</main>
<!-- partial -->
  <script  src="js/tinymce.min.js"></script>
  <script>
    var loader = document.getElementById("preloader");
    window.addEventListener("load", function(){
      loader.style.display = "none";
    });
  </script>
</body>
</html>
