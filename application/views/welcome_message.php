<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Homework List</title>

	<style type="text/css">

	/* Style the header with a grey background and some padding */
	.header {
		background-image: url(<?php echo base_url("assets/backgrounds.jpg")?>);
   		background-repeat: repeat;
		width: 100%;
		top: 0;
		left: 0;
  		overflow: hidden;
  		padding: 20px 70px;
  		position: fixed;
	}

/* Style the header links */
.header a {
  float: left;
  color: white;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 0 px;
}

/* Style the logo link (notice that we set the same value of line-height and font-size to prevent the header to increase when the font gets bigger */
.header a.logo {
  font-size: 25px;
  font-weight: bold;
  color: white;
}

/* Change the background color on mouse-over */
.header a:hover {
  background-color: lavender;
  color: royalblue;
}

/* Style the active/current link*/
.header a.active {
  color: royalblue;
}

/* Float the link section to the right */
.header-right {
	float: right;
	padding-top: 21px;
}

* {
    box-sizing: border-box;
}

label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

/* Add media queries for responsiveness - when the screen is 600px wide or less, stack the links on top of each other */ 
@media screen and (max-width: 600px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  .header-right {
    float: none;
  }
}

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

#task {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#task td, #task th {
    border: 1px solid #ddd;
    padding: 8px;
}

#task tr:nth-child(even){background-color: #f2f2f2;}

#task tr:hover {background-color: #ddd;}

#task th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: middle;
    background-color: dodgerblue;
    color: white;
}

	body {
		background-image: url(<?php echo base_url("assets/backgrounds.jpg")?>);
   		background-repeat: repeat;
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		background-color: white;
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>

<div class="header">
  <img style="vertical-align:middle" src="<?php echo base_url("assets/Welcome2.png")?>">
  <div class="header-right">
    <a class="active" href="<?php echo site_url('welcome') ?>">Home</a>
    <a href="<?php echo site_url('welcome/form_input') ?>">Add New Task</a>

  </div>
</div>

<body>
<br><br><br>
<div id="container" class="container">
	<h1>Homework List</h1>

	<div id="body">
		<h3>Always pay attention to the DUE DATE!</h3>
		 <table id="task">
		 	<tr>
				<th>No</th>
				<th>Due Date</th>
				<th>Class</th>
				<th>Assignment</th>
				<th>Note</th>
				<th>Opsi</th>
			</tr>
			<?php 
				$no = 1;
				foreach($hasil as $r){ ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $r['due_date'] ?></td>
				<td><?php echo $r['class'] ?></td>
				<td><?php echo $r['Assignment'] ?></td>
				<td><?php echo $r['Note'] ?></td>
				<td>
					<a href="<?php echo site_url('Welcome/form_edit/'.$r['task_id']) ?>">Edit</a> ||
					<a href="<?php echo site_url('Welcome/delete/'.$r['task_id']) ?>" onclick="return confirm('Are you sure you want to delete this task?')">Delete</a>
				</td>
			</tr>
			<?php } ?>
		 </table>
	</div>

	<p class="footer">Copyright &copy; Restu Triadi and powered by <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>