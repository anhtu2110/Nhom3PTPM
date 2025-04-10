<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Nhom3PTPM/Controller/CheckOutController.php';
$controller = new CheckOut_controller();
$result = $controller->Show_Tinh();
?>
<div class="row">
    <div class="col-md-4">
        <label for="province">Tỉnh/Thành Phố:</label>
        <input type="hidden" id="provinceName" name="provinceName">
        <select id="province" name="province" class="form-select" required>
            <option value="" disabled selected>Chọn Tỉnh/Thành Phố</option>
            <?php
                foreach($result as $item){
                    echo '<option value="'.$item['matp'].'">'.$item['name'].'</option>';
                }
            ?>
        </select>
    </div>
    <div class="col-md-4">
        <label for="district">Huyện/Quận:</label>
        <input type="hidden" id="districtName" name="districtName">
        <select id="district" name="district" class="form-select" required>
            <option value="" disabled selected>Chọn Huyện/Quận</option>
        </select>
    </div>
    <div class="col-md-4">
        <label for="ward">Xã/Phường:</label>
        <input type="hidden" id="wardName" name="wardName">
        <select id="ward" name="ward" class="form-select" required>
            <option value="" disabled selected>Chọn Xã/Phường</option>
        </select>
    </div>
</div>
<script>
$(document).ready(function() {
    $("#province").change(function(e) {
        e.preventDefault();
        let provinceId = $(this).val();
        let provinceName = $(this).find("option:selected").text();
        let data = {
            provinceId: provinceId
        }
        $.ajax({
            type: "POST",
            url: "http://192.168.126.128:80/TestCNPM/Controller/CheckOutController.php",
            data: data,
            dataType: "json",
            success: function(response) {
                console.log(response);
                $("#district").html(
                    '<option value="" disabled selected>Chọn Huyện/Quận</option>');
                if ($.isArray(response)) {
                    response.forEach(item => {
                        $("#district").append('<option value="' + item.maqh + '">' +
                            item.name + '</option>');
                    });
                } else {
                    console.log('Expected an array but got:', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
    $("#district").change(function(e) {
        e.preventDefault();
        let districtId = $(this).val();
        let data = {
            districtId: districtId
        }
        $.ajax({
            type: "POST",
            url: "http://192.168.126.128:80/TestCNPM/Controller/CheckOutController.php",
            data: data,
            dataType: "json",
            success: function(response) {
                console.log(response);
                $("#ward").html(
                    '<option value="" disabled selected>Chọn Xã/Phường</option>');
                if ($.isArray(response)) {
                    response.forEach(item => {
                        $("#ward").append('<option value"' + item.xaid + '">' +
                            item.name + '</option>');
                    });
                } else {
                    console.log('Expected an array but got:', response);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
});
</script>