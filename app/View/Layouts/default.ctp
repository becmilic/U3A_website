
<head>
  <title>
    <?php echo "The University of The Third Age - "; ?> 
    <?php echo $title_for_layout; $user = $this->Session->read('Auth.User'); ?>
  </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <script type="text/javascript" src="jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="jquery.slidertron-1.3.js"></script>
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
    <link href="u3a.css" rel="stylesheet" type="text/css" media="all" />
    <link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
</head>

<?php echo $this->Html->css('u3a');?>
<?php echo $this->Html->script('jquery-1.10.2');
      echo $this->Html->script('jquery.dataTables');
      echo $this->Html->script('runtable');
      echo $this->Html->css('jquery.dataTables');
?>


<div id="shadowcont" class="container">
<body>
<div id="header-wrapper">
    <div id="header" class="container">
        <div id="logo">
            <h1><?php echo $this->Html->link('U3A', '/'); ?></h1>
            <span> Melbourne City</a></span>
        </div>
        <div id="menu" align="right">
  <?php if($this->Session->check('Auth.User')){ ?>

  <ul>
    <li><?php echo $this->Html->link('HOMEPAGE', '/'); ?> </li>
    <li><?php echo $this->Html->link('PROFILE', array('controller' => 'members', 'action' => 'view_profile', $user['member_id'])); ?></li>
    <li><?php echo $this->Html->link('MEMBERS', array('controller' => 'members', 'action' => 'index')); ?></li>
    <li><?php echo $this->Html->link('COURSES', array('controller' => 'courses', 'action' => 'index')); ?></li>
	<li><?php echo $this->Html->link('ENROL', array('controller' => 'courseenrolments', 'action' => 'index')); ?></li>
    <li><?php echo $this->Html->link('LOGOUT', array('controller' => 'users', 'action' => 'logout')); ?></li>
  </ul>



  <?php } else {?>

  <ul>
    <li class="current_page_item"><?php echo $this->Html->link('LOGIN', array('controller' => 'users', 'action' => 'login')); ?></li>
    <li><?php echo $this->Html->link('SIGN UP', array('controller' => 'members', 'action' => 'add')); ?></li>
  </ul>
  
  <?php } ?>
 </div>
    </div>
  

<div id="header-featured"> </div>

<div id="banner-wrapper" align ='right'>
  <?php 
    if($this->Session->check('Auth.User'))
    {
  ?>
    <h3>Welcome, <?php $user = $this->Session->read('Auth.User'); echo $user['username']; ?>.</h3>
  <?php 
    }

    else
    {
  ?>
    <h3>You are not logged in yet.</h3>
  <?php 
    }
  ?>
</div>
</div>


<div id="wrapper">
     <div id="featured-wrapper">
        <div id="featured" class="container" align ='center'>
            <?php echo $this->Session->flash(); echo $content_for_layout; ?>

        </div>
     </div>
</div>
<div id="copyright">
    <p>All rights reserved. | Design by Team 19 Monash University IE</a>.</p>
</div>
</body>
</shadowcont>
</html>
