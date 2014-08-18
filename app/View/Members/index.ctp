<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>jQuery UI Tabs - Default functionality</title>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script> $(function() {
		$("#tabs").tabs();
	});	
	</script>
</head>

<!-- if ($member['Member']['active'] == 1) -->
<!-- <?php echo $this->Html->link(__('Add Member'), array('action' => 'add')); ?> -->

<body>
	<p></p>
	<div id="tabcont" type="container">
		<div id="tabs" align="left">
			<ul>
				<li><a href="#tabs1">All Members</a></li>
				<li><a href="#tabs2">Active Members</a></li>
				<li><a href="#tabs3">Inactive Members</a></li>
				<li><a href="#tabs4">Add Member</a></li>
			</ul>

			<div id="tabs1">
				<div class="members index">
					<h2><?php echo __('All Members'); ?></h2>   

					<table id="table_id" cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th><?php echo $this->Paginator->sort('member_gname', 'First Name'); ?></th>
								<th><?php echo $this->Paginator->sort('member_fname', 'Last Name'); ?></th>
								<th><?php echo $this->Paginator->sort('member_address', 'Address'); ?></th>
								<th><?php echo $this->Paginator->sort('member_email', 'Email'); ?></th>
								<th><?php echo $this->Paginator->sort('member_phone', 'Phone No.'); ?></th>
								<th><?php echo $this->Paginator->sort('member_mobile', 'Mobile No.'); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($members as $member):  {?>
							<tr>
								<td><?php echo $this->Html->link((h($member['Member']['member_gname'])), array('action' => 'detailed', $member['Member']['id'])); ?>&nbsp;</td>
								<td><?php echo h($member['Member']['member_fname']); ?>&nbsp;</td>
								<td><?php echo h($member['Member']['member_address']); ?>&nbsp;</td>
								<td><?php echo h($member['Member']['member_email']); ?>&nbsp;</td>
								<td><?php echo h($member['Member']['member_phone']); ?>&nbsp;</td>
								<td><?php echo h($member['Member']['member_mobile']); ?>&nbsp;</td>
							</tr>
							<?php } endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>

			<div id="tabs2">
				<div class="members index">
					<h2><?php echo __('Active Members'); ?></h2>

					<table id="table_id1" cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th><?php echo $this->Paginator->sort('member_gname', 'First Name'); ?></th>
								<th><?php echo $this->Paginator->sort('member_fname', 'Last Name'); ?></th>
								<th><?php echo $this->Paginator->sort('member_address', 'Address'); ?></th>
								<th><?php echo $this->Paginator->sort('member_email', 'Email'); ?></th>
								<th><?php echo $this->Paginator->sort('member_phone', 'Phone No.'); ?></th>
								<th><?php echo $this->Paginator->sort('member_mobile', 'Mobile No.'); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($members as $member): 
							if ($member['Member']['active'] > 0) {
								?>
								<tr>
									<td><?php echo $this->Html->link((h($member['Member']['member_gname'])), array('action' => 'detailed', $member['Member']['id'])); ?>&nbsp;</td>
									<td><?php echo h($member['Member']['member_fname']); ?>&nbsp;</td>
									<td><?php echo h($member['Member']['member_address']); ?>&nbsp;</td>
									<td><?php echo h($member['Member']['member_email']); ?>&nbsp;</td>
									<td><?php echo h($member['Member']['member_phone']); ?>&nbsp;</td>
									<td><?php echo h($member['Member']['member_mobile']); ?>&nbsp;</td>
								</tr>
								<?php 
							}
							endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>

			<div id="tabs3">
				<div class="members index">
					<h2><?php echo __('Inactive Members'); ?></h2>
					<p></p>

					<table id="table_id2" cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th><?php echo $this->Paginator->sort('member_gname', 'First Name'); ?></th>
								<th><?php echo $this->Paginator->sort('member_fname', 'Last Name'); ?></th>
								<th><?php echo $this->Paginator->sort('member_address', 'Address'); ?></th>
								<th><?php echo $this->Paginator->sort('member_email', 'Email'); ?></th>
								<th><?php echo $this->Paginator->sort('member_phone', 'Phone No.'); ?></th>
								<th><?php echo $this->Paginator->sort('member_mobile', 'Mobile No.'); ?></th>
								<th class="actions"><?php echo __('Actions'); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($members as $member):
								if ($member['Member']['active'] < 1) {
							?>
									<tr>
										<td><?php echo $this->Html->link((h($member['Member']['member_gname'])), array('action' => 'detailed', $member['Member']['id'])); ?>&nbsp;</td>
										<td><?php echo h($member['Member']['member_fname']); ?>&nbsp;</td>
										<td><?php echo h($member['Member']['member_address']); ?>&nbsp;</td>
										<td><?php echo h($member['Member']['member_email']); ?>&nbsp;</td>
										<td><?php echo h($member['Member']['member_phone']); ?>&nbsp;</td>
										<td><?php echo h($member['Member']['member_mobile']); ?>&nbsp;</td>
										<td>
											<?php echo $this->Html->link(__('Activate'), array('action' => 'activate', $member['Member']['id']), array('class' => 'myButton')); ?>
										</td>
									</tr>
									<?php 
								}
								endforeach; 
								?>
							</tbody>
						</table>	
					</div>
				</div>

				<div id="tabs4">
					<div class="members form">
						<?php 
							echo $this->Form->create('Member', array('action'=>'add'), array('enctype' => 'multipart/form-data')); 
						?>
						<h2><?php echo __('Add Member'); ?></h2>
						<p></p>
						<table cellpadding='0' cellspacing='1' width='100%'>
							<tr> 
								<td class="heading">First Name: </td> 
								<td class="data"><?php echo $this->Form->input('member_gname', array('label' =>'','size'=>'30'));?></td> 
							</tr> 
							<tr> 
								<td class="heading">Middle Name: </td> 
								<td class="data"><?php echo $this->Form->input('member_mname', array('label' =>'','size'=>'30'));?></td> 
							</tr> 
							<tr> 
								<td class="heading">Family Name: </td> 
								<td class="data"><?php echo $this->Form->input('member_fname', array('label' =>'','size'=>'30'));?></td> 
							</tr>
							<tr>
								<td class="heading" width="20%"></td> 
								<td class="data"><br></td> 
							</tr> 
							<tr> 
								<td class="heading">Address: </td> 
								<td class="data"><?php echo $this->Form->input('member_address', array('label' =>'','size'=>'30'));?></td> 
							</tr> 
							<tr> 
								<td class="heading">Postcode: </td> 
								<td class="data"><?php echo $this->Form->input('member_postcode', array('label' =>'','size'=>'30'));?></td> 
							</tr>
							<tr>
								<td class="heading" width="20%"></td> 
								<td class="data"><br></td> 
							</tr>  
							<tr> 
								<td class="heading">Email: </td> 
								<td class="data"><?php echo $this->Form->input('member_email', array('label' =>'','size'=>'30'));?></td> 
							</tr> 
							<tr> 
								<td class="heading">Phone Number: </td> 
								<td class="data"><?php echo $this->Form->input('member_phone', array('label' =>'','size'=>'30'));?></td> 
							</tr> 
							<tr> 
								<td class="heading">Mobile Number: </td> 
								<td class="data"><?php echo $this->Form->input('member_mobile', array('label' =>'','size'=>'30'));?></td> 
							</tr> 
						</table>

						<div id="submitButtons">
							<button type="submit">Add Member<?php echo $this->Form->end(); ?></button>
							<button><?php echo $this->Html->link('Back', array('controller' => 'members', 'action' => 'index')); ?></button>
						</div>
					</div>
				</div>



			</div>
		</div>
