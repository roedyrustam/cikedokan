<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $this->load->view($folder_themes.'/header');?>

<div class="surat-content">
	<?php echo $page_content; ?>
</div>


<?php $this->load->view($folder_themes.'/footer');?>