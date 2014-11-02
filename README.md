OWeb ManiaPlanet Manialinks
=================

### This OWeb module adds ManiaPlanet Manialink support to the OWeb Framework. 

**The module is in developpement stage and will only work with OWeb 0.4.0 which is also in developement**

## How to use
By default OWeb is created to generate web pages, with css, js headers. But it modular structure of it allows to define a new displayHandler that will make the creation of Manialink pages with Maniascript in it much simpler. 

To use this we will just replace the Template handler, So first install module and oweb framework using composer.

```
    "require": {
        "php": ">=5.3",
        "oliverde8/oweb-framework": "dev-dev",
        "oliverde8/oweb-mp-manialink": "dev-master"
    },
```

See the oweb project to see the first steps on how to set up oweb :  https://github.com/oliverde8/OWeb-Framework

Now to use manialink, edit you config/config.xml file and new Template extension in the '<OWeb><extensions>' section
'''
<extension name="Maniaplanet\Manialink\displayMode\module\Extension\Template"/>
'''
Using the OWeb extension engine this will replace the default Template engine, with the one built for Manialinks. 

## TODO
* Create error pages for manialink (at the moment fallbacks on html error pages)
* get eXpansion script support and add it to here. 
