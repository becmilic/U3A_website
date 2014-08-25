<?php echo $this->Html->script('jquery.dataTables');?>
<?php echo $this->Html->css('jquery.dataTables');?>


<script> //action script code for datatables in course view
    //when the doucment is ready will perform the next function
    $(document).ready(function(){
        //takes the element from the table and applies the data table to it
        $('#courseTable').dataTable();

    });
</script>

<h2><?php echo __('Courses'); ?></h2>
<table id="courseTable" cellpadding="0" cellspacing="0">
    <thead>
    <tr>
        <th>Course Code</th>
        <th>Course Name</th>
        <th>Description</th>
        <th>Max Enrol Limit</th>
        <th>Difficulty</th>
        <th>Prerequisites</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($courses as $course): ?>
        <tr>
            <td><?php echo h($course['Course']['course_code']); ?>&nbsp;</td>
            <td><?php echo h($course['Course']['course_name']); ?>&nbsp;</td>
            <td><?php echo h($course['Course']['description']); ?>&nbsp;</td>
            <td><?php echo h($course['Course']['max_enrol_limit']); ?>&nbsp;</td>
            <td><?php echo h($course['Course']['difficulty']); ?>&nbsp;</td>
            <td><?php echo h($course['Course']['prerequisites']); ?>&nbsp;</td>
            <td class="actions">
                <?php echo $this->Html->link(__('View'), array('action' => 'view', $course['Course']['id'])); ?>
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $course['Course']['id'])); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $course['Course']['id']), null, __('Are you sure you want to delete # %s?', $course['Course']['id'])); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<div class="actions">
	<h2><?php echo __('Actions'); ?></h2>
	<ul>
		<li><?php echo $this->Html->link(__('New Course'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Course Files (Build 4.0)'), array('controller' => 'coursefiles', 'action' => 'index')); ?> </li>
	</ul>
</div>
