
<?php session_start();
require('connect_to_quest.php');
?>
<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" ></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="about.html">About</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">More Pages <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="sidebar-left.html">Left Sidebar</a></li>
							<li class="active"><a href="sidebar-right.html">Right Sidebar</a></li>
						</ul>
					</li>
					<li><a href="contact.html">Contact</a></li>
					<li>
		<?php if (empty($_SESSION['idEXP']) or empty($_SESSION['idUSER'])) { ?>

      <div class="btn-group" >
        <button id="con" class="btn btn-block btn-success"><span class="glyphicon glyphicon-user"></span> connexion</button>
      
     
  
    <script>
     
      
      $("#con").click(function() { 
        $("#infos").modal({ remote: "connexionQuest.php" } ,"show");
      });
      
    </script></li> 
</div> <?php } else {echo'connecté';}?>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 