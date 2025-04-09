<?php require_once './Controller/auth.php';?>
   <?php require_once './IncludeAdmin/header.php';?>
            <main>
                    <div class="add_blog">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="text-center mt-5">Thêm Nội dung Blog</h3>
                                <div class="container mt-4">
                                <?php require_once './View/Add_BlogView.php'?>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
            </main>

		</div>
	</div>
    <?php
    require_once './IncludeAdmin/footer.php';
    ?>
