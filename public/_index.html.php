<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />
	<title>David Högberg</title>

	<meta name="description" content="The virtual home of David Högberg. He does web programming, both frontend and backend, and especially likes Python, Django and Heroku." />
	<meta name="viewport" content="width=device-width" />
	<meta name="keywords" content="homepage, personal, web, web developer, programming, django, python, heroku, desmo, seemytree, see my tree, filmsugen" />
	<meta name="dc.language" content="en-US" />

	<link rel="stylesheet" type="text/css" href="/css/style.css" />
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-47812800-1', 'hgbrg.se');
		ga('send', 'pageview');
	</script>
</head>
<body>
		
<!--[if lte IE 8]>
<div id="outdated-browser">
	<h4>You're using an outdated browser</h4>
	<p>
		If this page looks weird to you, that's most likely why. Please upgrade to a modern browser such as <a href="http://www.firefox.com">Firefox</a>, <a href="http://www.apple.com/safari/download/">Safari</a>, <a href="http://www.google.com/chrome">Chrome</a> or <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">Internet Explorer</a>.
	</p>
</div>
<![endif]-->

<div id="doc">
	<div id="intro">
		<h1 class="struct">David Högberg</h1>
		<p>
			Hello there! You have found the virtual home of <strong>David Högberg</strong>.
		</p>
		<p>
			I do consulting in web development. Both frontend and backend. I especially enjoy Python, Django and Heroku.
		</p>
	</div>
	<!-- /intro -->

	<div id="main" class="g g3">
		<div id="current" class="s1">
			<h2 class="hilite1">Current projects</h2>		
				<h3>Desmo</h3>
				<p>
					Desmo helps e-commerce do good, by building a platform for raising money to non-profits while shopping online.
				</p>
				<p>
					See <a href="http://desmo.org">desmo.org</a>.
				</p>

				<h3>SeeMyTree</h3>
				<p>
					SeeMyTree raises money for farmers in rural India to help them plant trees. By constructing a system for tracking the status of each individual farmer and tree, we give donors total transparency as to where their money go.
				</p>
				<p>
					The first version is in the final stages.
				</p>
		</div>
		<!-- /current -->

		<div id="what-i-do" class="s2">
			<h2 class="hilite2">What I do</h2>

			<h3>Technical areas of interest</h3>
			<ul>
				<li>Web programming (client + server side).</li>
				<li>Usability and interface design.</li>
				<li>Web standards and the semantic web.</li>
				<li>REST style applications.</li>
			</ul>

			<h3>Specific technologies</h3>
			<ul>
				<li>Django</li>
				<li>(My\Postgre)SQL</li>
				<li>PHP</li>
				<li>HTML</li>
				<li>CSS</li>
				<li>Javascript</li>
			</ul>

			<h3>Around the web</h3>
			<p>
				Connect with me on <a href="https://twitter.com/dfh99">Twitter</a>, <a href="http://www.linkedin.com/profile/view?id=149147855">LinkedIn</a>, <a href="http://www.facebook.com/dfh99">Facebook</a>, <a href="https://pinboard.in/u:dfh">Pinboard</a>, <a href="http://instagram.com/dhgbrg">Instagram</a>, <a href="http://github.com/dfh">GitHub</a>.
			</p>
		</div>
		<!-- /what-i-do -->

		<div id="contact" class="s3">
			<h2 class="hilite3">Contact me</h2>
<?php
require '_contact_form.html.php';
?>
		</div>
		<!-- /contact -->
	</div>
	<!-- /main -->

	<div class="g g1" id="recent">
		<div class="s1">
		<h2 class="hilite1">Recent activity</h2>
			<h3>Pinboard <small>(<a href="http://feeds.pinboard.in/rss/secret:7211c054947bf77d4e50/u:dfh/" class="feed">RSS</a>)</small></h3>

<?php
$bookmarks = pinboard_get_recent(15);
if ($bookmarks && is_array($bookmarks)):
?>
			<ul>
<?php
	foreach ($bookmarks as $uri => $i):
?>
				<li>
					<a href="<?= str_replace('&', '&amp;', $uri) ?>"><?= $i['title'] ?></a>
					<span class="desc"><?= $i['description'] ?></span>
				</li>
<?php
	endforeach;
?>
			</ul>
<?php
endif;
?>
		</div>
	</div>
	<!-- /recent -->

	<div id="footer">
		<p>
			<a href="http://creativecommons.org/licenses/by-sa/4.0/">Copyright</a> © 2009–<?= date('Y') ?> <a href="/">David Högberg</a> (view <a href="https://github.com/dfh/hgbrgse">source</a>)
		</p>
	</div>
	<!-- /footer -->

</div>
<!-- /doc -->
</body>
</html>
