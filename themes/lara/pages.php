<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $this->load->view($folder_themes.'/header');?>

<div class="main-wrapper bg-gray">
    <div class="container">
        <div class="row">
            <!-- page content -->
			<div class="halaman-arsip">
				<div class="col-md-12">
					<div class="blog-section">
						<?php $this->load->view($folder_themes.'/breadcrumb');?>
						<?php $this->load->view($folder_themes.'/template-parts/content-archive');?>
						<?php $this->load->view($folder_themes.'/template-parts/pagination/pagination');?>
					</div>
				</div>
				<!-- end content -->
				
			</div>
		</div>
        <div class="clearfix"></div>
        <!-- /.row -->
    </div>
</div>

<?php $this->load->view($folder_themes.'/footer');?>