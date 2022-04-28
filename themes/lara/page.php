<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $this->load->view($folder_themes.'/header');?>

<div class="section-post bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
			    <div class="page-content">
			    <?php if (isset($page_content)) {
			        echo $page_content;
			        } else { 
			            $this->load->view($folder_themes.'/template-parts/content-profile'); 
			    } ?>
			    </div>
			</div>
			<div class="col-md-4">
				<?php $this->load->view($folder_themes.'/sidebar');?>
			</div>
		</div>
	    <!-- /.row -->
	</div>
<!-- end content -->
</div>

<?php $this->load->view($folder_themes.'/footer');?>