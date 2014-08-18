<div class="edit profile view">

	<?php 
		$user = $this->Session->read('Auth.User');
		echo $this->Form->create('Member'); 
	?>
	<fieldset>
		<legend><?php echo __('Edit Member'); ?></legend>
	<?php
		echo $this->Form->input('id', array('label' => 'ID: '));
		echo $this->Form->input('member_gname', array('label' => 'Given Name: '));
		echo $this->Form->input('member_mname', array('label' => 'Middle Name: '));
		echo $this->Form->input('member_fname', array('label' => 'Family Name: '));
		echo $this->Form->input('member_address', array('label' => 'Address: '));
		echo $this->Form->input('member_postcode', array('label' => 'Postcode: '));
		echo $this->Form->input('member_email', array('label' => 'Email: '));
		echo $this->Form->input('member_phone', array('label' => 'Phone No.: '));
		echo $this->Form->input('member_mobile', array('label' => 'Mobile No.: '));
	?>
	</fieldset>
	<p></p>
	<?php echo $this->Form->end(__('Confirm Edit')); ?>
</div>
<div class="actions">
	<h2><?php echo __('Actions'); ?></h2>
	<ul>
		<li><?php echo $this->Html->link(__('Back'), array('action' => 'view_profile', $user['member_id'])); ?></li>
	</ul>
</div>