<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Achiefments</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- my tweaks -->
    <link href="custom.css" rel="stylesheet">
  </head>

  <body style="padding-top: 50px; padding-bottom: 20px;">
    <?php
      require 'gubbins.php';
      if ( isset( $_GET['game'] ) && !empty( $_GET['game'] )) {
        $game = $_GET['game'];
      } else {
        $game = "all";
      }
      if ( isset( $_GET['showComplete'] ) && !empty( $_GET['showComplete'] )) {
        $showComplete = $_GET['showComplete'];
      } else {
        $showComplete = false;
      }
      if ( isset( $_GET['type'] ) && !empty( $_GET['type'] )) {
        $type = $_GET['type'];
      } else {
        $type = all;
      }
      if ( isset( $_GET['gamertag'] ) && !empty( $_GET['gamertag'] )) {
        $gamertag = $_GET['gamertag'];
        $safertag = urlencode($gamertag);
        $xuid = get_xuid($gamertag);
      } else {
        echo "ERROR: No Gamertag supplied.";
        exit;
      }
    ?>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Achiefments</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Game <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li<?php if ( $game == "all" ) { echo " class=\"active\""; } ?>><a href="?game=all&gamertag=<?php echo $safertag; ?>">All</a></li>
                <li role="separator" class="divider"></li>
                <li<?php if ( $game == "H1" ) { echo " class=\"active\""; } ?>><a href="?game=H1&gamertag=<?php echo $safertag; ?>">Halo: CE</a></li>
                <li<?php if ( $game == "H2" ) { echo " class=\"active\""; } ?>><a href="?game=H2&gamertag=<?php echo $safertag; ?>">Halo 2</a></li>
                <li<?php if ( $game == "H3" ) { echo " class=\"active\""; } ?>><a href="?game=H3&gamertag=<?php echo $safertag; ?>">Halo 3</a></li>
                <li<?php if ( $game == "ODST" ) { echo " class=\"active\""; } ?>><a href="?game=ODST&gamertag=<?php echo $safertag; ?>">Halo 3: ODST</a></li>
                <li<?php if ( $game == "H4" ) { echo " class=\"active\""; } ?>><a href="?game=H4&gamertag=<?php echo $safertag; ?>">Halo 4</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Type <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li<?php if ( $type == "all" ) { echo " class=\"active\""; } ?>><a href="?game=<?php echo $game; ?>&gamertag=<?php echo $safertag; ?>">All</a></li>
                <li<?php if ( $type == "skulls" ) { echo " class=\"active\""; } ?>><a href="?game=<?php echo $game; ?>&type=skulls&gamertag=<?php echo $safertag; ?>">Skulls</a></li>
                <li<?php if ( $type == "terminals" ) { echo " class=\"active\""; } ?>><a href="?game=<?php echo $game; ?>&type=terminals&gamertag=<?php echo $safertag; ?>">Terminals</a></li>
                <li<?php if ( $type == "time" ) { echo " class=\"active\""; } ?>><a href="?game=<?php echo $game; ?>&type=time&gamertag=<?php echo $safertag; ?>">Time</a></li>
                <li<?php if ( $type == "score" ) { echo " class=\"active\""; } ?>><a href="?game=<?php echo $game; ?>&type=score&gamertag=<?php echo $safertag; ?>">Score</a></li>
                <li<?php if ( $type == "mp" ) { echo " class=\"active\""; } ?>><a href="?game=<?php echo $game; ?>&type=mp&gamertag=<?php echo $safertag; ?>">Multiplayer</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><?php echo $gamertag; ?></a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <div class="container">
     <?php
      echo "<div class=\"page_header\"><h1>" . ucfirst(str_replace("H","Halo ",$game)) . "</h1></div>";
      foreach (get_achievements("1144039928", $xuid) as $key => $achievement) {
        switch ($game) {
          case 'H1':
            if ( preg_match("/^Halo CE:/", $achievement["description"] ) == 1 ) {
              print_achievement($key);
            }
            break;
          case 'H2':
            if ( preg_match("/^Halo 2/", $achievement["description"] ) == 1 ) {
              print_achievement($key);
            }
            break;
          case 'H3':
            if ( preg_match("/^Halo 3:/", $achievement["description"] ) == 1 ) {
              print_achievement($key);
            }
            break;
          case 'ODST':
            if ( preg_match("/^H3: ODST:/", $achievement["description"] ) == 1 ) {
              print_achievement($key);
            }
            break;
          case 'H4':
            if ( preg_match("/^Halo 4/", $achievement["description"] ) == 1 ) {
              print_achievement($key);
            }
            break;
          default:
            print_achievement($key);
            break;
        }
      }
    ?>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
