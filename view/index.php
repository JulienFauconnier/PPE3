<!doctype html>
<html class="no-js" lang="en">
<head>
    <?php include 'header.php'; ?>
</head>
<body>
<?php include 'navigation.php'; ?>

<div class="row">
    <div class="large-12 columns">
        <div class="panel">
            <div class="row">
                <div class="small-12 columns">
                    <center>
                        <svg height="128" width="256">
                            <defs>
                                <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
                                    <stop offset="0%" style="stop-color:rgb(30, 127, 203);stop-opacity:1"/>
                                    <stop offset="100%" style="stop-color:rgb(0, 127, 255);stop-opacity:1"/>
                                </linearGradient>
                            </defs>
                            <ellipse cx="50%" cy="50%" rx="85" ry="55" fill="url(#grad1)"/>
                            <text fill="#ffffff" font-size="64" font-family="Courier New Bold Italic" x="25%" y="66%">
                                GSB
                            </text>
                            Désolé, votre navigateur ne supporte pas les balises SVG.
                        </svg>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_SESSION['id'])) {
    ?>
    <div class="row">
        <div class="small-6 columns">
            <button onclick="document.location='index.php?page=equipements'" class="expand radius medium green">
                Equipements
            </button>
        </div>
        <div class="small-6 columns">
            <button onclick="document.location='index.php?page=tickets'" class="expand radius medium green">Tickets
            </button>
        </div>
    </div>
<?php } ?>
<div class="row">
    <div class="small-12 columns">
        <button onclick="document.location='index.php?page=statistiques'" class="expand radius medium green">
            Statistiques
        </button>
    </div>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
