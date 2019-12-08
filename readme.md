# Base for my Wordpress plugins

This Wordpress plugin will provide basic functionality which will be used in any kind of my plugins.
So i've not to write it multiple times again.

## What is the intention?

As I want to start programming Wordpress plugins and themes and decided not
to spam the whole menu with small and big plugins, this plugin will provide
a overview over installed plugins under one menu point - found in the plugins
section.

I will support some basic classes which are used in my whole projects.

## What are the components, and what are there intention?

The first thing that has made me thought of programming wordpress is
that there is no namespace for variables and functions. Even if i define
a simple variable in the plugin main script it will be present in the
whole programm. Thats why i start my plugins generaly in a function
this should, if it not needed another way, the only function that will be
stored by my plugins on the global scope.

So i decided, and because i'm familiar with it, to programm OOP. All data 
and functions will be encapsulated for this one class.

I think, this could be comprehensibly.

The next Problem on this way is ... autoloading.

### Autoloader

My Autoloader allows me to load my classes. Each Plugin can register it's 
Path to classes with it's plugin name and the autloader will find the
file automaticly - there for the file- and classname has to follow an specific
rule.

### Registry

I don't know if i need it realy, but i like it's simple concept on 
encapsulate data and objects. It's much easier to deal with this class
as with the global scope variables.

### View

I want to manage some rendering stuff on the view site. I will provide some
View Scripts beside the views template. Combine them and tell Wordpress how 
to render it.

### Event Class

I'm wondering, maybe because of backward compatilibity issues, the WordPress
hooks does not support closures. Supported since 5.3.0.
My first implementation has been made of an Event Manager, but this does
not suite to the system in total. I make the decission to break it down
to the point, supporting closures with an normal class callable as a simple
Event. No Functions flying arround within the global space.

I know i could use Namespaces, but i feel very well with my current solution.

Thats what the Plugin is made for.