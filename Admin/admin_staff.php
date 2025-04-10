<?php require_once './Controller/auth.php';?>
<?php require_once './IncludeAdmin/header.php';?>
            <main>
                <div class="container">
                    <h1 class="text-center mt-3">Trang quản lý Nhân Viên Admin</h1>
              <?php require_once './View/Admin_UserView.php';?>
                </div>
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        const searchInput = document.getElementById('email');
                        searchInput.addEventListener('input', function () {
                            const searchText = this.value.toLowerCase();
                            const tableRows = document.querySelectorAll('table tr:not(:first-child)');
                            tableRows.forEach(function (row) {
                                const cellText = row.cells[2].innerText.toLowerCase();
                                if (cellText.includes(searchText)) {
                                    row.style.display = '';
                                } else {
                                    row.style.display = 'none';
                                }
                            });
                        });
                    });

                </script>
            </main>
        </div>
    </div>
    <?php
    require_once './IncludeAdmin/footer.php';
    ?>
