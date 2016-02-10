<!doctype html>
<html class="no-js" lang="en">
<head>
    <link href="css/vendor/normalize.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="css/vendor/foundation.css" media="screen" rel="stylesheet" type="text/css"/>
    <link href="css/pizza.css" media="screen, projector, print" rel="stylesheet" type="text/css"/>
    <script src="js/vendor/modernizr.js"></script>
    <?php include 'header.php'; ?>
</head>
<body>
<?php include 'navigation.php'; ?>

<div class="row">
    <div class="large-12 columns">
        <div class="panel">
            <h3>We&rsquo;re stoked you want to try Foundation! </h3>
            <p>To get going, this file (index.html) includes some basic styles you can modify, play around with, or
                totally destroy to get going.</p>
            <p>Once you've exhausted the fun in this document, you should check out:</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="large-12 columns">
        <h3>Graphs</h3>
    </div>
</div>

<div class="row">
    <div class="large-2 small-12 columns">
        <ul data-pie-id="donut" data-options='{"donut":"true"}'>
            <li data-value="25">Test 1</li>
            <li data-value="35">Test 2</li>
            <li data-value="25">Test 3</li>
            <li data-value="15">Test 4</li>
        </ul>
    </div>
    <div class="large-2 small-12 columns">
        <div id="donut"></div>
    </div>
    <div class="large-2 small-12 columns">
        <ul data-bar-id="bar">
            <li data-value="198">Test 1</li>
            <li data-value="128">Test 2</li>
            <li data-value="032">Test 3</li>
            <li data-value="064">Test 4</li>
        </ul>
    </div>
    <div class="large-2 small-12 columns">
        <div id="bar" style="height: 256px;"></div>
    </div>
    <div class="large-2 small-12 columns">
        <ul data-line-id="line">
            <li data-y="00" data-x="00">Test 1</li>
            <li data-y="10" data-x="10">Test 2</li>
            <li data-y="20" data-x="20">Test 3</li>
            <li data-y="30" data-x="30">Test 3</li>
        </ul>
    </div>
    <div class="large-2 small-12 columns">
        <div id="line" style="height: 256px;"></div>
    </div>
</div>

<script src="js/vendor/dependencies.js"></script>
<script src="js/pizza.js"></script>
<script>
    $(window).load(function () {
        Pizza.init();
        $(document).foundation();
    });
</script>

<?php include 'footer.php'; ?>
</body>
</html>
