# Base for my Wordpress plugins

This WordPress Plugin will provide basic functionality which will be used in any kind of my plugins.
So i've not to write it multiple times again.

## What is the intention?

As I want to start programming WordPress Plugins and themes and decided not
to spam the whole menu with small and big plugins, this plugin will provide
a overview over installed plugins under one menu point - found in the plugins
section.

I will support some basic classes which are used in my whole projects.

## What are the components, and what are there intention?

The first thing that has made me thought of programming WordPress is
that there is no namespace for variables and functions. Even if I define
a simple variable in the plugin main script it will be present in the
whole program. That's why I start my plugins generally in a function
this should, if it not needed another way, the only function that will be
stored by my plugins on the global scope.

So I decided, and because I'm familiar with it, to program OOP. All data 
and functions will be encapsulated for this one class.

I think, this could be comprehensibly.

The next Problem on this way is ... autoloading.

### Autoloader

My autoloader allows me to load my classes. Each plugin can register it's 
path to classes with it's plugin name and the autloader will find the
file automatically - there for the file- and classname has to follow an specific
rule.

### Registry

I don't know if I need it really, but I like it's simple concept on 
encapsulate data and objects. It's much easier to deal with this class
as with the global scope variables.

### View

I want to manage some rendering stuff on the view site. I will provide some
view scripts beside the views template. Combine them and tell WordPress how 
to render it.

### Event Class

I'm wondering, maybe because of backward compatibility issues, the WordPress
Hooks does not support closures. Supported since 5.3.0.
My first implementation has been made of an Event Manager, but this does
not suite to the system in total. I make the decision to break it down
to the point, supporting closures with an normal class callable as a simple
event. No functions flying around within the global space.