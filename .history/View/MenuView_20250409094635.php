<div class="col-md-7 d-flex align-items-center wow slideInDown">
    <div class="container-fluid col-md-12">
        <ul class="nav">
            <?php
            // require_once('./Controller/MenuController.php');
            require_once($_SERVER['DOCUMENT_ROOT'].'/TestCNPM/Controller/MenuController.php');


            $controller = new MenuController();
            $dropdownItems = $controller->displayMenu();

            // require_once('./View/MenuView.php');
            ?>
            <?php foreach ($dropdownItems as $menuItem) : ?>
            <li class="nav-item" id="<?php echo isset($menuItem['MenuID']) ? $menuItem['MenuID'] : ''; ?>">
                <a class="nav-link" href="<?php echo isset($menuItem['Link']) ? $menuItem['Link'] : '#'; ?>">
                    <?php echo isset($menuItem['Title']) ? $menuItem['Title'] : 'Unknown Title'; ?>
                </a>
                <?php if (!empty($menuItem['dropdown'])) : ?>
                <div class="container">
                    <div class="test">
                        <ul class="an">
                            <?php foreach ($menuItem['dropdown'] as $dropdownItem) : ?>
                            <li>
                                <a
                                    href="<?php echo isset($dropdownItem['#newproduct']) ? $dropdownItem['#newproduct'] : '#newproduct'; ?>">
                                    <?php echo isset($dropdownItem['Title']) ? $dropdownItem['Title'] : 'Unknown Title'; ?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <?php endif; ?>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>