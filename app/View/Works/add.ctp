<div class="works form">
<?php echo $this->Form->create('Work',array('type'=>'file'));?>
	<fieldset>
		<legend><?php echo __('Add Work'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('artist_id',array('empty'=>'-- Select an Artist --','after'=>'<div class="after">Don\'t see the artist, <a href="/artists/add">add him/her</a>.</div>'));
		echo $this->Form->input('media_type',array('after'=>'<div class="after">Ex. Chalk, Acrylic, Oil, Crayon, Conté, Pen and ink, etc.</div>'));
		echo $this->Form->input('media_base',array('after'=>'<div class="after">Ex. Canvas, Metal, Paper, Wood etc.</div>'));
		echo $this->Form->input('publication_id',array('empty' => '-- Select a Publication --','after'=>'<div class="after">Don\'t see the publication, <a href="/publications/add">add it</a>.</div>'));
		if(!empty($upload)){
			echo $this->Form->input('upload_id',array('type'=>'hidden'));
			echo $this->Html->image($upload['Upload']['path'],array('width'=>'150px'));
			echo $this->Form->input('Upload.fileName', array('type' => 'file','label'=>false,'before'=>'<div class="before">If you\'d like to change the image. Pick a new one below.</div>','after'=>'Maximum size of 10MB. jpg, jpeg, gif, png.','id'=>'attach-local','after'=>'<a href="javascript:return false;" onclick="uploadViaUrl();" class="use-url">Use a URL instead</a>'));
		}else{
			echo $this->Form->input('Upload.fileName', array('type' => 'file','label'=>false,'before'=>'<div class="before">Add an image of the work.</div>','after'=>'Maximum size of 10MB. jpg, jpeg, gif, png.','id'=>'attach-local','after'=>'<a href="javascript:return false;" onclick="uploadViaUrl();" class="use-url">Use a URL instead</a>'));
		}
		echo $this->Form->input('Upload.url', array('type'=>'text','id'=>'attach-url','label'=>'Upload via URL'));
		echo $this->Html->image('/img/icons/delete.gif',array('alt'=>'Cancel','url'=>'javascript:uploadViaLocal(); return false;','class'=>'cancel-url','title'=>'Cancel and add a local file.'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Works'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Artists'), array('controller' => 'artists', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Artist'), array('controller' => 'artists', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Publications'), array('controller' => 'publications', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Publication'), array('controller' => 'publications', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Uploads'), array('controller' => 'uploads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Upload'), array('controller' => 'uploads', 'action' => 'add')); ?> </li>
	</ul>
</div>
<script type="text/javascript">
$(document).ready(function(){
	//Hide the add image by url field on load
	$('#attach-url').hide();
	$('#attach-url').parent().hide(); //Hide the label
	$('img.cancel-url').hide();
	
});

function uploadViaUrl(){
	$('#attach-url').css({width:'95%',float:'left'});
	$('img.cancel-url').show();
	$('#attach-local').hide();
	$('#attach-local').parent().hide(); //Hide the label
	
	$('.use-url').hide();
	$('#attach-url').val(''); //Clear the url
	$('#attach-url').show();
	$('#attach-url').parent().show(); //Show the label
	
	marker = $('<span />').insertBefore('#attach-url');
	$('#attach-url').detach().attr('type', 'text').insertAfter(marker);
	marker.remove();
}

function uploadViaLocal(){
	$('img.cancel-url').hide();
	$('#attach-url').val(''); //Clear the url
	$('.use-url').show();
	$('#attach-local').show();
	$('#attach-local').parent().show(); //Hide the label
	
	$('#attach-url').hide();
	$('#attach-url').parent().hide(); //Hide the label
}
</script>