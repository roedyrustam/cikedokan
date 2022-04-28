<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $this->load->view($folder_themes.'/header');?>

<div class="section-post bg-gray">
	<div class="container">
		<div class="page-content">
		<?php if (isset($page_content)) {
			echo $page_content;
		} else { 
			$this->load->view($folder_themes.'/breadcrumb'); 
		    $this->load->view($folder_themes.'/template-parts/content-archive');
		    $this->load->view($folder_themes.'/template-parts/pagination/pagination');
		} ?>
		</div>
	    <!-- /.row -->
	</div>
<!-- end content -->
</div>

<?php $this->load->view($folder_themes.'/footer');?>