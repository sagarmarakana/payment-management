<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar toggle-sidebar">
    <ul class="side-menu toggle-menu">
        <li class="slide">
            <a class="side-menu__item" href="<?=base_url('admin/dashboard');?>">
                <span class="icon-menu-img"><img src="<?=base_url('assets/images/svgs/homepage.svg')?>" class="side_menu_img svg-1" alt="image"></span>
                <span class="side-menu__label">Dashboard</span>
            </a>
        </li>
        <?php if($this->session->userdata('user_type') == 1){ ?>
        <li class="slide">
            <a class="side-menu__item" href="<?=base_url('admin/users');?>">
                <span class="icon-menu-img"><img src="<?=base_url('assets/images/svg/user.svg')?>" class="side_menu_img svg-1" alt="image"></span>
                <span class="side-menu__label">Users</span>
            </a>
        </li>
        <?php } ?>
        <li class="slide">
            <a class="side-menu__item" href="<?=base_url('admin/banks');?>">
                <span class="icon-menu-img"><img src="<?=base_url('assets/images/svg/bank.svg')?>" class="side_menu_img svg-1" alt="image"></span>
                <span class="side-menu__label">Banks</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="<?=base_url('admin/wallet');?>">
                <span class="icon-menu-img"><img src="<?=base_url('assets/images/svg/wallets.svg')?>" class="side_menu_img svg-1" alt="image"></span>
                <span class="side-menu__label">Wallet</span>
            </a>
        </li>
    </ul>
</aside>