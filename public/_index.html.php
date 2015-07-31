<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8" />
    <title>David Högberg</title>

    <meta name="description" content="The virtual home of David Högberg. He does web programming, both frontend and backend, and especially likes Python, Django and Heroku." />
    <meta name="viewport" content="width=device-width,initial-zoom=1" />
    <meta name="keywords" content="homepage, personal, web, web developer, programming, django, python, heroku, desmo, seemytree, see my tree, filmsugen" />
    <meta name="dc.language" content="en-US" />
    <link rel="stylesheet" type="text/css" href="/style.css" />
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
          Currently I spend most of my time recovering from severe burnout, learning Nutritional Balancing and working on private projects.
	</p>
      </div>
      <div id="main" class="g g3">
	<div id="current" class="s1">
	  <h2 class="hilite1">Current projects</h2>
          <h3>Näringsbalansering.se</h3>
          <p>
            My new blog. Swedish only.
          </p>
          <p>
            See <a href="http://näringsbalansering.se">näringsbalansering.se</a>
          </p>
          <h3>Nutritional Balancing</h3>
          <p>
            I'm currently completing the basic course, then plan on
            becoming an approved Nutritional Balancing practitioner.
          </p>
	</div>
	<div id="what-i-do" class="s2">
	  <h2 class="hilite2">What I do</h2>

	  <h3>Programming</h3>
	  <ul>
	    <li>Web programming (client + server side).</li>
	    <li>Usability and interface design.</li>
	    <li>Web standards and the semantic web.</li>
	    <li>REST style applications.</li>
	  </ul>

          <h3>Writing</h3>
          <ul>
            <li><a href="http://näringsbalansering.se">Näringsbalansering.se</a> (Swedish only)</li>
          </ul>
          
	  <h3>Around the web</h3>
	  <p>
	    Connect with me on <a href="https://twitter.com/dfh99">Twitter</a>, <a href="http://www.linkedin.com/profile/view?id=149147855">LinkedIn</a>, <a href="http://www.facebook.com/dfh99">Facebook</a>, <a href="https://pinboard.in/u:dfh">Pinboard</a>, <a href="http://instagram.com/dhgbrg">Instagram</a>, <a href="http://github.com/dfh">GitHub</a>.
	  </p>
	</div>
	<div id="contact" class="s3">
	  <h2 class="hilite3">Contact me</h2>
          <?php
             require '_contact_form.html.php';
             ?>
	</div>
      </div>
      <div class="g g1" id="recent">
	<div class="s1">
	  <h2 class="hilite1">Recently bookmarked</h2>
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
      <div id="footer">
	<p>
	  <a href="https://www.gnu.org/licenses/gpl.html">Copyright</a> © 2009–<?= date('Y') ?> <a href="/">David Högberg</a> (view <a href="https://github.com/dfh/hgbrgse">source</a>)
	</p>
      </div>
    </div>
  </body>
</html>


