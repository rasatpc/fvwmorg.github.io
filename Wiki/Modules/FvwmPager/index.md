---
title: FvwmPager
type: module
weight: 900
description: |
  FvwmPager shows a miniature view of the Fvwm Desktops and Pages.
  This can be configured to show only the Current Desktop or any
  selection of Desktops.
---
# FvwmPager

* TOC
{:toc}

The FvwmPager module shows a miniature view of the Fvwm desktops which are
specified in the command line. This is a useful reminder of where your
active windows are. Windows in the pager are shown in the same color as
their fvwm decorations.  The pager can be used to change your viewport into
the current desktop, to change desktops, or to move windows around.

## Configuration and Use

To show the layout of your desktop. All the Pages and Desktops you have set
up, and the windows opened in each.

{% highlight fvwm %}
DestroyModuleConfig FvwmPager: *
*FvwmPager: Geometry 150x150-0+0
*FvwmPager: Colorset * 9
*FvwmPager: HilightColorset * 10
*FvwmPager: BalloonColorset * 9
*FvwmPager: WindowColorsets 9 10
*FvwmPager: Font "xft:Sans:Bold:pixelsize=12:minspace=True:antialias=True"
*FvwmPager: Balloons All
*FvwmPager: BalloonFont "xft:Sans:Bold:pixelsize=12:minspace=True:antialias=True"
*FvwmPager: BallonYOffset +2
*FvwmPager: Window3dBorders
*FvwmPager: MiniIcons
*FvwmPager: UseSkipList
*FvwmPager: Rows 3
{% endhighlight %}

{% highlight fvwm %}
Style "FvwmPager" NoTitle, !Handles, !Borders, Sticky, WindowListSkip, \
  CirculateSkip, StaysOnBottom, FixedPosition, FixedSize, !Iconifiable
{% endhighlight %}

To launch the FvwmPager, you run it as **Module FvwmPager**

For a full list of FvwmPager configuration options see the FvwmPager manpage.
