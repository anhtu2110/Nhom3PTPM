<?php require_once './Controller/auth.php';?>
<?php require_once './IncludeAdmin/header.php';?>
<style>
   .image-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    .col-md-4 img{
        border-radius: 50%;
        width: 300px;
        height: 300px;   
        object-fit: cover;
        border: 3px solid greenyellow;
    }
    .btn-them{
        margin-left: 5px;
    }

    .form-group {
        margin-bottom: 20px;
    }
  .form_profile{
    box-shadow:0 0 80px rgba(49, 48, 48, 0.1);
    border-radius: 0 10px 10px 0;
  }
</style>

    <div class="container mt-5 ">
        <?php 
            require_once './View/ProfileView.php';
        ?>
        
        <script>
            document.getElementById('view').addEventListener('click', function() {
                var input = document.getElementById('Password');
                var eyeIcon = document.getElementById('view');
        
                if (input.type === 'password') {
                    input.type = 'text';
                    eyeIcon.classList.remove('fa-eye');
                    eyeIcon.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    eyeIcon.classList.remove('fa-eye-slash');
                    eyeIcon.classList.add('fa-eye');
                }
            });
        </script>
        
        
        <?php
    require_once './IncludeAdmin/footer.php';
    ?>