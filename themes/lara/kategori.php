<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- widget Menu-->
<div class="widget-menu_kategori-index">
    <ul id="ul-menu-index" class="main">
        <?php foreach($menu_kiri as $data){?>
            <li class="cat-item-index">
               <a href="<?php echo get_kategori_url( $data['id'] ); ?>"> <span class="iconfont"><i class="fa fa-file-text-o"></i></span> <?php echo $data['nama']; if(count($data['submenu'])>0) { echo "<span class='caret'></span>"; } ?></a>
                <?php if( count( $data['submenu'] ) > 0 ): ?>
                    <ul class="submenu">
                        <?php foreach($data['submenu'] as $submenu): ?>
                            <li>
                                <a href="<?php echo get_kategori_url( $submenu['id'] ); ?>"><?php echo $submenu['nama']?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </li>
        <?php }?>
    </ul>
</div>