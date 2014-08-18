
		<div class="members_form">
			<?php 
			echo $this->Form->create('Member', array('enctype' => 'multipart/form-data', 'novalidate' => true)); 
			?>

			<h2><?php echo __('Add Member'); ?></h2>

			<table cellpadding='0' cellspacing='1' width='100%'>
				<tr> 
					<td class="heading">First Name: </td> 
					<td class="data"><?php echo $this->Form->input('Member.member_gname', array('label' =>'','size'=>'30'));?></td> 
				</tr> 
				<tr> 
					<td class="heading">Middle Name: </td> 
					<td class="data"><?php echo $this->Form->input('Member.member_mname', array('label' =>'','size'=>'30'));?></td> 
				</tr> 
				<tr> 
					<td class="heading">Family Name: </td> 
					<td class="data"><?php echo $this->Form->input('Member.member_fname', array('label' =>'','size'=>'30'));?></td> 
				</tr>
				<tr>
					<td class="heading" width="20%"></td> 
					<td class="data"><br></td> 
				</tr> 
				<tr> 
					<td class="heading">Address: </td> 
					<td class="data"><?php echo $this->Form->input('Member.member_address', array('label' =>'','size'=>'30'));?></td> 
				</tr> 
				<tr> 
					<td class="heading">Postcode: </td> 
					<td class="data"><?php echo $this->Form->input('Member.member_postcode', array('label' =>'','size'=>'30'));?></td> 
				</tr>
				<tr>
					<td class="heading" width="20%"></td> 
					<td class="data"><br></td> 
				</tr>  
				<tr> 
					<td class="heading">Email: </td> 
					<td class="data"><?php echo $this->Form->input('Member.member_email', array('label' =>'','size'=>'30'));?></td> 
				</tr> 
				<tr> 
					<td class="heading">Phone Number: </td> 
					<td class="data"><?php echo $this->Form->input('Member.member_phone', array('label' =>'','size'=>'30'));?></td> 
				</tr> 
				<tr> 
					<td class="heading">Mobile Number: </td> 
					<td class="data"><?php echo $this->Form->input('Member.member_mobile', array('label' =>'','size'=>'30'));?></td> 
				</tr>
				
				<tr>
					<td class="heading"><h2><?php echo __('User Details'); ?></h2></td> 
				</tr>

				<?php
					echo $this->Form->create('User', array('enctype' => 'multipart/form-data', 'novalidate' => true));
				    $random = substr( md5(rand()), 0, 7);
				?>
				
				<tr> 
					<td class="heading">Member ID: </td> 
					<td class="data"><?php echo $this->Form->input('User.member_id', array('label' =>'', 'type' => 'text', 'value' => '2'));?></td> 
				</tr>
					<td class="heading">Username: </td> 
					<td class="data"><?php echo $this->Form->input('User.username', array('label' =>'', 'value' => $random));?></td> 
				</tr>
					<td class="heading">Email: </td> 
					<td class="data"><?php echo $this->Form->input('User.email', array('label' =>'', 'value' => 'xxx@test.com'));?></td> 
				</tr>
					<td class="heading">Password: </td> 
					<td class="data"><?php echo $this->Form->input('User.password', array('label' =>'', 'value' => '123abc'));?></td> 
				</tr>
				</tr>
					<td class="heading">Confirm Password: </td> 
					<td class="data"><?php echo $this->Form->input('User.password_confirm', array('label' =>'', 'value' => '123abc'));?></td> 
				</tr>
				</tr>
					<td class="heading">Role: </td> 
					<td class="data"><?php echo $this->Form->input('User.role', array('label' =>'', 'value' => 'member'));?></td> 
				</tr>
			</table>
	<div id="submitButtons">
		<button type="submit">Add Member <?php echo $this->Form->end(); ?></button>
	</div>
</div>
