<?php
//--------------------------------------------------------------------
//-  File          : documentation/manpages/template.php
//-  Project       : FVWM Home Page
//-  Programmer    : Uwe Pross
//--------------------------------------------------------------------

// This is an autogenerated file, use perllib2php to create it.

//--------------------------------------------------------------------
// this manpages should not appear in the navigation structure
// so we hide its contents from navgen
//--------------------------------------------------------------------
if (strlen("$navigation_check") > 0) return;

$rel_path = "./../..";

//--------------------------------------------------------------------
// load some global definitions
//--------------------------------------------------------------------
include("$rel_path/definitions.inc");

//--------------------------------------------------------------------
// Site definitions
//--------------------------------------------------------------------
$title          = "FVWM - Perl library - FVWM::Event";
$heading        = "FVWM - Perl library - FVWM::Event";
$link_name      = "Perl library";
$link_picture   = "pictures/icons/doc_manpages";
$parent_site    = "documentation";
$child_sites    = array();
$requested_file = basename(my_get_global("PHP_SELF", "SERVER"));
$this_site      = "manpages";

//--------------------------------------------------------------------
// load the layout file
//--------------------------------------------------------------------
if (strlen($site_has_been_loaded) == 0) {
	$site_has_been_loaded = "true";
	if (strlen($layout) > 0) {
		$file = "$rel_path/layout_$layout.inc";
		if (file_exists($file)) $layout_file = $file;
	}
	include(sec_filename($layout_file));
	exit();
}
?>

<?php decoration_window_start("Manual page for FVWM::Event in unstable branch (2.5.7)"); ?>

<H1>FVWM::Event</H1>
Section: FVWM Perl library (3)<BR>Updated: 2003-04-15<BR>Source: <a href="ftp://ftp.fvwm.org/pub/fvwm/devel/sources/perllib/FVWM/Event.pm">FVWM/Event.pm</a><br>
<A HREF="#index">This page contents</A>
 - <a href="./">Return to main index</A><HR>

<A NAME="lbAB">&nbsp;</A>
<H2>NAME</H2>

FVWM::Event - the FVWM event object passed to event handlers
<A NAME="lbAC">&nbsp;</A>
<H2>SYNOPSIS</H2>

<A NAME="ixAAC"></A>
<blockquote><pre>  use lib `fvwm-perllib dir`;
  use FVWM::Module;</pre></blockquote>
<P>

<blockquote><pre>  my $module = new FVWM::Module(Mask =&gt; M_FOCUS_CHANGE);</pre></blockquote>
<P>

<blockquote><pre>  # auto-raise all windows
  sub autoRaise ($$) {
      my ($module, $event) = @_;
      $module-&gt;debug(&quot;Got &quot; . $event-&gt;name . &quot;\n&quot;);
      $module-&gt;debug(&quot;\t$_: &quot; . $event-&gt;args-&gt;{$_} . &quot;\n&quot;)
          foreach sort keys %{$event-&gt;args};
      $module-&gt;send(&quot;Raise&quot;, $event-&gt;_win_id);
  }
  $module-&gt;addHandler(M_FOCUS_CHANGE, \&amp;autoRaise);</pre></blockquote>
<P>

<blockquote><pre>  $module-&gt;eventLoop;</pre></blockquote>
<A NAME="lbAD">&nbsp;</A>
<H2>DESCRIPTION</H2>

<A NAME="ixAAD"></A>
To be written.
<A NAME="lbAE">&nbsp;</A>
<H2>METHODS</H2>

<A NAME="ixAAE"></A>
<DL COMPACT>
<DT><B>new</B> <I>type</I> <I>argValues</I><DD>
<A NAME="ixAAF"></A>
Constructs event object of the given <I>type</I>.
<I>argValues</I> is either an array ref of event's arguments (every event type
has its own argument list, see FVWM::EventNames) or a packed string of
these arguments as received from the <I><a href="<?php echo conv_link_target('./../manpages/unstable/fvwm.php');?>">fvwm</a></I> pipe.
<DT><B>type</B><DD>
<A NAME="ixAAG"></A>
Returns event's type (usually long integer).
<DT><B>argNames</B><DD>
<A NAME="ixAAH"></A>
Returns an array ref of the event argument names.


<P>


<blockquote><pre>    print &quot;$_ &quot; foreach @{$event-&gt;argNames});</pre></blockquote>


<P>


Note that this array of names is statical and may be not synchronized
in some cases with the actual argument values described in the two methods
below.
<DT><B>argTypes</B><DD>
<A NAME="ixAAI"></A>
Returns an array ref of the event argument types.


<P>


<blockquote><pre>    print &quot;$_ &quot; foreach @{$event-&gt;argTypes});</pre></blockquote>


<P>


Note that this array of types is statical and may be not synchronized
in some cases with the actual argument values described in the two methods
below.
<DT><B>argValues</B><DD>
<A NAME="ixAAJ"></A>
Returns an array ref of the event argument values.
In the previous versions of the library, all argument values were passed
to event handlers, now only one event method is passed. Calling this
method is the way to emulate the old behaviour.


<P>


Note that you should know the order of arguments, so the suggested way
is to use <TT>&quot;args&quot;</TT> instead, although it is a bit slower.
<DT><B>args</B><DD>
<A NAME="ixAAK"></A>
Returns hash ref of the named event argument values.


<P>


<blockquote><pre>    print &quot;[Debug] Got event &quot;, $event-&gt;type, &quot; with args:\n&quot;;
    while (($name, $value) = each %{$event-&gt;args})
        { print &quot;\t$name: $value\n&quot;; }</pre></blockquote>
<DT><B>isExtended</B><DD>
<A NAME="ixAAL"></A>
For technical reasons there are 2 categories of <FONT>FVWM</FONT> events, regular and
extended. This was done to enable more events. With introdution of the
extended event types (with the highest bit set) it is now possible to have
31+31=62 different event types rather than 32. This is a good point, the bad
point is that only event types of the same category may be masked (or-ed)
together. This method returns 1 or 0 depending on whether the event is
extended or not.
<DT><B>name</B><DD>
<A NAME="ixAAM"></A>
Returns a string representing the event name (like ``M_ADD_WINDOW''), it is
the same as the corresponding C/Perl constant. May be (and in fact is)
used for debugging.
<DT><B>propagationAllowed</B> [<I>bool</I>]<DD>
<A NAME="ixAAN"></A>
Sets or returns a boolean value that indicates enabling or disabling of
this event propagation.
<DT><B>_</B><I>name</I><DD>
<A NAME="ixAAO"></A>
This is a shortcut for <TT>$event</TT>-&gt;args-&gt;{'name'}. Returns the named event
argument. See FVWM::EventNames for names of all event argument names.
</DL>
<A NAME="lbAF">&nbsp;</A>
<H2>AUTHOR</H2>

<A NAME="ixAAP"></A>
Mikhael Goikhman &lt;<A HREF="mailto:migo@homemail.com">migo@homemail.com</A>&gt;.
<A NAME="lbAG">&nbsp;</A>
<H2>SEE ALSO</H2>

<A NAME="ixAAQ"></A>
For more information, see fvwm, <a href="<?php echo conv_link_target('./FVWM::Module.php');?>">FVWM::Module</a>, <a href="<?php echo conv_link_target('./FVWM::Constants.php');?>">FVWM::Constants</a> and
FVWM::EventNames.
<P>

<HR>
<A NAME="index">&nbsp;</A><H2>Index</H2>
<DL>
<DT><A HREF="#lbAB">NAME</A><DD>
<DT><A HREF="#lbAC">SYNOPSIS</A><DD>
<DT><A HREF="#lbAD">DESCRIPTION</A><DD>
<DT><A HREF="#lbAE">METHODS</A><DD>
<DT><A HREF="#lbAF">AUTHOR</A><DD>
<DT><A HREF="#lbAG">SEE ALSO</A><DD>
</DL>
<HR>
This document was created by
man2html,
using the manual pages.<BR>
Time: 00:51:46 GMT, April 19, 2003


<?php decoration_window_end(); ?>

<!-- Automatically generated by perllib2php on 19-Apr-2003 03:51:35 -->