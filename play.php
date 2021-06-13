<head>
  <script type="text/javascript" src="https://cdnjs.​cloudflare.com/ajax/libs/clappr/0.4.3/clappr.min.js"></script>
</head><body>
  <div id="player"></div>
  <script>
    var player = new Clappr.Player({source: "jioo.php?q=800&c=<?php echo $_GET["c"]; ?>", mimeType: "application/x-mpegURL",parentId: "#player"});
  </script>
</body>