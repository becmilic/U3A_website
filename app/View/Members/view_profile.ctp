<div class="members view">
<h2>
	<?php echo __('Member Details - Member ID: '); ?>
	<?php echo h($member['Member']['id']); ?>
</h2>
</div>

<div id="navcontainer">
<ul id="navlist">
		<li><?php echo $this->Html->link(__('Edit Member'), array('action' => 'edit_profile', $member['Member']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Back'), array('action' => 'index')); ?> </li>
</ul>
</div>
  
<table width="80%"> 
<tr> 
<td class="heading" width="20%">Name:</td> 
<td class="data"><?php echo h($member['Member']['member_gname']); ?></td> 
</tr> 
<tr> 
<td class="heading" width="20%">Middle Name:</td> 
<td class="data"><?php echo h($member['Member']['member_mname']); ?></td> 
</tr> 
<tr> 
<td class="heading" width="20%">Last Name:</td> 
<td class="data"><?php echo h($member['Member']['member_fname']); ?></td> 
</tr>
<tr>
	<td class="heading" width="20%"></td> 
	<td class="data"><br></td> 
</tr> 
<tr> 
<td class="heading" width="20%">Address:</td> 
<td class="data"><?php echo h($member['Member']['member_address']); ?></td> 
</tr> 
<tr> 
<td class="heading" width="20%">Postcode:</td> 
<td class="data"><?php echo h($member['Member']['member_postcode']); ?></td> 
</tr> 
<tr>
	<td class="heading" width="20%"></td> 
	<td class="data"><br></td> 
</tr> 
<tr> 
<td class="heading" width="20%">Email:</td> 
<td class="data"><?php echo h($member['Member']['member_email']); ?></td> 
</tr> 
<tr> 
<td class="heading" width="20%">Phone:</td> 
<td class="data"><?php echo h($member['Member']['member_phone']); ?></td> 
</tr>
<tr> 
<td class="heading" width="20%">Mobile:</td> 
<td class="data"><?php echo h($member['Member']['member_mobile']); ?></td> 
</tr>
</table>

<br>
<div class="related">
	<h2>
	  <?php echo __('Accounts belonging to'); ?>
	  <?php echo h($member['Member']['member_gname']); ?>
	</h2>
	<p></p>
	<?php if (!empty($member['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('User Name'); ?></th>
		<th><?php echo __('User Password'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($member['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $this->Html->link($user['email'], array('controller' => 'users', 'action' => 'view', $user['id'])); ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td>
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
