<!doctype html>
<html lang="en">
<head>
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="/resources/demos/style.css">
	<script>
	$(function() {
		$("#tabs").tabs();
	});	
	</script>
</head>

<body>

	<p></p>
	<div id="tabcont" type="container">
		<div id="tabs" align="left">
			<ul>
				<li><a href="#tabs1">View</a></li>
				<li><a href="#tabs2"><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $member['Member']['id'])); ?></a></li>
				<li><a href="#tabs3"><?php echo $this->Html->link(__('Back'), array('action' => 'index')); ?></a></li>
				<li><a href="#tabs4">
					<?php
					if($is_superuser) {
						echo $this->Form->postLink(__('Delete Member'), array('action' => 'delete', $member['Member']['id']), 
							null, __('Are you sure you want to delete # %s?', $member['Member']['id']));
					} 
					?>
				</a></li>
			</ul>
            <div style="float:right">
                <?php
                if($is_superuser) {
                    echo $this->Form->postLink(__('Reset Password'), array('controller'=>'users','action'=>'reset_password',
                            $member['User'][0]['id']),null, 'Are you sure you want to reset the password for '.
                        $member['Member']['member_gname'].' '.$member['Member']['member_fname'].'?');
                }
                ?>
            </div>

			<div id="tabs1";>
				<div class="members index">
					<h2>
						<?php echo __('Detailed Member View: '); ?>
						<?php echo h($member['Member']['member_gname']); ?>
					</h2>

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

				</div>
			</div>


			<div id="tabs2";>
				<div class="members form">
				</div>
			</div>

</div>
</div>

</body>
</html>
