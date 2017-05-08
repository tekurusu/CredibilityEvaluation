/*
 * Copyright © 2016 Regular Labs - All Rights Reserved
 * License http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */var rl_tabs_urlscroll=0;var rl_tabs_use_hash=rl_tabs_use_hash||0;var rl_tabs_reload_iframes=rl_tabs_reload_iframes||0;var rl_tabs_init_timeout=rl_tabs_init_timeout||0;var RegularLabsTabs=null;(function($){"use strict";$(document).ready(function(){if(typeof(window['rl_tabs_use_hash'])!="undefined"){setTimeout(function(){RegularLabsTabs.init();},rl_tabs_init_timeout);}});RegularLabsTabs={timers:[],init:function(){var self=this;try{this.hash_id=decodeURIComponent(window.location.hash.replace('#',''));}catch(err){this.hash_id='';}
this.current_url=window.location.href;if(this.current_url.indexOf('#')!==-1){this.current_url=this.current_url.substr(0,this.current_url.indexOf('#'));}
$('.rl_tabs').removeClass('has_effects');this.showByURL();this.showByHash();this.initEqualHeights();setTimeout((function(){self.initActiveClasses();self.initClickMode();if(rl_tabs_use_hash){self.initHashHandling();}
self.initHashLinkList();if(rl_tabs_reload_iframes){self.initIframeReloading();}$('.rl_tabs').addClass('has_effects');}),1000);},show:function(id,scroll,openparents,slideshow){if(openparents){this.openParents(id,scroll);return;}
var self=this;var $el=this.getElement(id);if(!$el.length){return;}$el.tab('show');$el.closest('ul.nav-tabs').find('.rl_tabs-toggle').attr('aria-selected',false);$el.attr('aria-selected',true);$el.closest('div.rl_tabs').find('.tab-content').first().children().attr('aria-hidden',true);$('div#'+id).attr('aria-hidden',false);this.updateActiveClassesOnTabLinks($el);if(!slideshow){$el.focus();}},getElement:function(id){return this.getTabElement(id);},getTabElement:function(id){return $('a.rl_tabs-toggle[data-id="'+id+'"]');},getSliderElement:function(id){return $('#'+id+'.rl_sliders-body');},showByURL:function(){var id=this.getUrlVar();if(id==''){return;}
this.showByID(id);},showByHash:function(){if(this.hash_id==''){return;}
var id=this.hash_id;if(id==''||id.indexOf("&")!=-1||id.indexOf("=")!=-1){return;}
if($('a.rl_tabs-toggle[data-id="'+id+'"]').length==0){this.showByHashAnchor(id);return;}
if(!rl_tabs_use_hash){return;}
if(!rl_tabs_urlscroll){$('html,body').animate({scrollTop:0});}
this.showByID(id);},showByHashAnchor:function(id){if(id==''){return;}
var $anchor=$('a#anchor-'+id+',a#'+id+',a[name="'+id+'"]');if($anchor.length==0){return;}
$anchor=$anchor.first();if($anchor.closest('.rl_tabs').length==0){return;}
var $tab=$anchor.closest('.tab-pane').first();if($tab.find('.rl_sliders').length>0){return;}
this.openParents($tab.attr('id'),false);setTimeout(function(){$('html,body').animate({scrollTop:$anchor.offset().top});},250);},showByID:function(id){var $el=$('a.rl_tabs-toggle[data-id="'+id+'"]');if($el.length==0){return;}
this.openParents(id,rl_tabs_urlscroll);},openParents:function(id,scroll){var $el=this.getElement(id);if(!$el.length){return;}
var parents=[];var parent=this.getElementArray($el);while(parent){parents[parents.length]=parent;parent=this.getParent(parent.el);}
if(!parents.length){return false;}
this.stepThroughParents(parents,null,scroll);},stepThroughParents:function(parents,parent,scroll){var self=this;if(!parents.length&&parent){parent.el.focus();return;}
parent=parents.pop();if(parent.el.hasClass('in')||parent.el.parent().hasClass('active')){self.stepThroughParents(parents,parent,scroll);return;}
switch(parent.type){case'tab':if(typeof(window['RegularLabsTabs'])=="undefined"){self.stepThroughParents(parents,parent,scroll);break;}
parent.el.one('shown.bs.tab',function(){self.stepThroughParents(parents,parent,scroll);});RegularLabsTabs.show(parent.id);break;case'slider':if(typeof(window['RegularLabsSliders'])=="undefined"){self.stepThroughParents(parents,parent,scroll);break;}
parent.el.one('shown.bs.collapse',function(){self.stepThroughParents(parents,parent,scroll);});RegularLabsSliders.show(parent.id);break;}},getParent:function($el){if(!$el){return false;}
var $parent=$el.parent().closest('.rl_tabs-pane, .rl_sliders-body');if(!$parent.length){return false;}
return this.getElementArray($parent);},getElementArray:function($el){var id=$el.attr('data-toggle')?$el.attr('data-id'):$el.attr('id');var type=($el.hasClass('rl_tabs-pane')||$el.hasClass('rl_tabs-toggle'))?'tab':'slider'
return{'type':type,'id':id,'el':type=='tab'?this.getTabElement(id):this.getSliderElement(id)};},fixEqualHeights:function(parent){var self=this;setTimeout((function(){self.fixEqualTabHeights(parent);}),250);},fixEqualTabHeights:function(parent){parent=parent?'div.rl_tabs-pane#'+parent.attr('data-id'):'div.rl_tabs';$(parent+' ul.nav-tabs').each(function(){var $lis=$(this).children();var min_height=9999;var max_height=0;$lis.each(function(){$(this).find('a').first().height('auto');});setTimeout((function(){$lis.each(function(){min_height=Math.min(min_height,$(this).find('a').first().height());max_height=Math.max(max_height,$(this).find('a').first().height());});if(!max_height||min_height==max_height){return;}
$lis.each(function(){$(this).find('a').first().height(max_height);});}),10);});},initActiveClasses:function(){$('li.rl_tabs-tab-sm').removeClass('active');},updateActiveClassesOnTabLinks:function(active_el){active_el.parent().parent().find('.rl_tabs-toggle').each(function($i,el){$('a.rl_tabs-link[data-id="'+$(el).attr('data-id')+'"]').each(function($i,el){var $link=$(el);if($link.attr('data-toggle')||$link.hasClass('rl_tabs-toggle-sm')||$link.hasClass('rl_sliders-toggle-sm')){return;}
if($link.attr('data-id')!==active_el.attr('data-id')){$link.removeClass('active');return;}
$link.addClass('active');});});},initEqualHeights:function(){var self=this;self.fixEqualHeights();$('a.rl_tabs-toggle').on('shown.bs.tab',function(e){self.fixEqualHeights($(this));});$(window).resize(function(){self.fixEqualHeights();});},initHashLinkList:function(){var self=this;$('a[href^="#"],a[href^="'+this.current_url+'#"]').each(function($i,el){self.initHashLink(el);});},initHashLink:function(el){var self=this;var $link=$(el);if($link.attr('data-toggle')||$link.hasClass('rl_aliders-link')||$link.hasClass('rl_tabs-toggle-sm')||$link.hasClass('rl_sliders-toggle-sm')){return;}
var id=$link.attr('href').substr($link.attr('href').indexOf('#')+1);if(id==''){return;}
var scroll=false;var $anchor=$('a#anchor-'+id+',a#'+id+',a[name="'+id+'"]');if($anchor.length==0){return;}
$anchor=$anchor.first();if($anchor.closest('.rl_tabs').length==0){return;}
var $tab=$anchor.closest('.tab-pane').first();var tab_id=$tab.attr('id');if($link.closest('.rl_tabs').length>0){if($link.closest('.tab-pane').first().attr('id')==tab_id){return;}}
$link.click(function(e){e.preventDefault();self.openParents(tab_id);e.stopPropagation();});},initHashHandling:function(){if(!window.history.replaceState){return;}
var self=this;$('a.rl_tabs-toggle').on('shown.bs.tab',function(e){if($(this).closest('ul.nav-tabs').hasClass('rl_tabs-slideshow-switch')){return;}
history.replaceState({},'',self.current_url+'#'+$(this).attr('data-id'));e.stopPropagation();});},initClickMode:function(){var self=this;$('body').on('click.tab.data-api','a.rl_tabs-toggle',function(e){var $el=$(this);e.preventDefault();RegularLabsTabs.show($el.attr('data-id'),$el.hasClass('rl_tabs-doscroll'));$el.closest('ul.nav-tabs').removeClass('rl_tabs-slideshow-switch');e.stopPropagation();});},initIframeReloading:function(){$('.tab-pane.active iframe').each(function(){$(this).attr('reloaded',true);});$('a.rl_tabs-toggle').on('show.bs.tab',function(e){if(typeof initialize=='function'){initialize();}
var $el=$('#'+$(this).attr('data-id'));$el.find('iframe').each(function(){if(this.src&&!$(this).attr('reloaded')){this.src+='';$(this).attr('reloaded',true);}});});$(window).resize(function(){if(typeof initialize=='function'){initialize();}
$('.tab-pane iframe').each(function(){$(this).attr('reloaded',false);});$('.tab-pane.active iframe').each(function(){if(this.src){this.src+='';$(this).attr('reloaded',true);}});});},getUrlVar:function(){var search='tab';var query=window.location.search.substring(1);if(query.indexOf(search+'=')==-1){return'';}
var vars=query.split('&');for(var i=0;i<vars.length;i++){var keyval=vars[i].split('=');if(keyval[0]!=search){continue;}
return keyval[1];}
return'';}};})
(jQuery);