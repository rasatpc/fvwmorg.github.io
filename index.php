<?php
//--------------------------------------------------------------------
//-  File          : index.php
//-  Project       : FVWM Home Page
//-  Date          : Fri Mar 14 21:32:08 2003
//-  Programmer    : Uwe Pross
//-  Last modified : <07.04.2003 08:22:18 uwp>
//--------------------------------------------------------------------

if (strlen($rel_path) == 0) $rel_path = ".";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include($rel_path.'/definitions.inc'); 

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM Home Page";
$heading        = "Welcome to The Official FVWM Home Page";
$link_name      = "Home";
$link_picture   = "pictures/icons/home";
$parent_site    = "top";
$child_sites    = array("fvwm_cats");
//  RBW...
//  Must be able to cope with register_globals = off.
//$requested_file = basename(my_get_global("PHP_SELF", &$_SERVER));
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));

$this_site      = "home";

//--------------------------------------------------------------------
// check if we should stop here
//--------------------------------------------------------------------
if( strlen("$navigation_check") > 0 ) return;

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if( strlen("$site_has_been_loaded") == 0 ) {
  $site_has_been_loaded = "true";
  if( strlen($layout) > 0 ) {
    $file = $rel_path."/layout_".$layout.".inc";
    if( file_exists($file) ) $layout_file = $file;
  }
  include(sec_filename("$layout_file"));
  exit();
}

?>
  <?php decoration_window_start("The Official Home Page of FVWM"); ?>
  <p>
    FVWM is an extremely powerful ICCCM-compliant multiple virtual desktop
    window manager for the X&nbsp;Window system.  Development is active,
    and support is excellent.  Check it out!
  </p>
    
  <p><a href="index.html">old html version</a></p>
  
  <table border="0" cellpadding="0" cellspacing="0" summary="latest news">
    <tr>
      <td>Latest Stable Release: &nbsp;</td>
      <td><b>2.4.15</b></td>
    </tr>
    <tr> 
      <td>Latest Unstable Release:  &nbsp;</td>
      <td><b>2.5.6</b></td>
    </tr>
  </table>
    
  <center>
    <h2>Quick jumps</h2>
    <?php insert_quick_jump_list(array(
                                       "download",
                                       "features",
                                       "faq",
                                       "screenshots",
                                       "manpages",
                                       "example_menus",
                                       "example_vectorbuttons",
                                       "example_pixmapbuttons",
                                       "icons",
                                       "mailing_lists",
                                       "mail_archive",
                                       "developers",
                                       "acknowledgements",
                                       "fvwm_cats"));
    ?>
    </center>
      
    <style type="text/css">
    <!--
    a.done {
      color:#bbbbbb;
      text-decoration:line-through;
      font-weight:normal;
    }
    -->
    </style>

    <b>Sub sites to do</b><br><br>
	<table border="0" cellpadding="0" cellspacing="0" width="100%" summary="to do list">
	  <tr>
	    <td width="50%">
	    <ul>
	      <li><a href="download.html" class="done">Download</a></li>
	      <li><a href="features.html" class="done">Features</a></li>
	      <li><a href="generated/NEWS.html" class="done">Latest News</a></li>
	      <li><a href="generated/FAQ.html" class="done">FAQ</a></li>
	      <li><a href="screenshots/" class="done">Screen Shots</a></li>
	      <li><a href="generated/manpages/">Manual Pages</a></li>
	      <li><a href="sample-menus/index.html" class="done">Sample Menus</a></li>
	      <li><a href="vector-buttons/vector-buttons.html" class="done">Vector Buttons</a></li>
	    </ul>
	    </td>
	    <td width="50%"><ul>
		<li><a href="icons.html" class="done">Icons and Sounds Download</a></li>
		<li><a href="links.html" class="done">Links</a></li>
		<li><a href="mailinglist.html">Mailing List and IRC channel Info</a></li>
		<li><a href="http://www.hpc.uh.edu/fvwm/archive">Mail Archive</a></li>
		<li><a href="http://www.fvwm.org/cgi-bin/fvwm-bug">FVWM Bug Reporting</a></li>
		<li><a href="developers.html">Developer Info (CVS, Modules)</a></li>
		<li><a href="generated/AUTHORS.html">Acknowledgements</a></li>
		<li><a href="fvwm-cats/" class="done">Other Important Info ^_^</a></li>
	      </ul>
	     </td>
	</tr>
      </table>

      <p>
	For the time of development latest changes on this web tree are 
	stated here. This part is going to be removed before the web site
	is published officially. The contents of latest_news.txt follows:
      </p>
      
      <pre>
  <?php
      if (file_exists("latest_news.txt"))
         include "latest_news.txt";
      else
         echo "file latest_news.txt does not exist.";
  
      echo ".</pre>\n";

      decoration_window_end(); 
      pop_decoration_path();
   ?>

<!--
  Please don't modify the rest of the page. Reserved for mirrors.
-->
<!--
  This is the original source. Mirrors should replace this comment.
-->

<!-- LocalWords: FVWM
-->
