
YUI.add("bolt-project-daily",function(Y){BLT.add('l',function(){BLT.DD=new BLT.Class.DailyD();});var $=Y.get,$j=Y.JSON;BLT.Class.DailyD=function(){this.init();};BLT.Class.DailyD.prototype={store:{},init:function(){this.listingsStart=1;this.aid=false;this.currentSignupStep=1;var haspage=this.stripos(window.location.hash,'page');if(haspage){var hashspot=this.stripos(window.location,'#');var oldloc=""+window.location+"";var newloc=oldloc.substr(0,(hashspot))+"/page-"+window.location.hash.substr(haspage+4);window.location=newloc;}
Y.all('#hd form ul.reg input[type="text"]').each(function(el){el.set('value','enter your email address').addClass('off');el.on('focus',function(e){if(e.target.get('value')=='enter your email address'){e.target.set('value','');e.target.removeClass('off');}});});Y.all('ul.countdown').each(function(el){this.initCountdown(el);},this);if(Y.one('.show-more')){Y.one('.show-more').on('click',function(){Y.one('div.deal-meta').toggleClass('deal-meta-limit');Y.one('.show-more').toggleClass('show-less');},this);}
if(Y.one('.deal-list-filter')){this.aid=Y.one('#aid').get('value');Y.one('.deal-list-filter input[type=submit]').setStyle('display','none');var filtering=true;}else{var filtering=false;}
$('body').on('click',function(e){var tar=e.target,oTar=e.target;if(!BLT.Env.dev&&e.target.hasClass('track-buy')){var trackBuy=new Image();trackBuy.src="http://www.googleadservices.com/pagead/conversion/1021412138/?label=6IwnCL6lxAEQqoaG5wM&amp;guid=ON&amp;script=0";}
else if(e.target.hasClass('ac')&&filtering){e.halt();var id=e.target.get('id');if(e.target.hasClass('all')){Y.all('input.f'+id).each(function(item){item.set('checked',true);});this.reloadListingResults();}else if(e.target.hasClass('none')){Y.all('input.f'+id).each(function(item){item.set('checked',false);});this.reloadListingResults();}}else if(e.target.hasClass('page-change')&&filtering){e.halt();this.listingsStart=e.target.getAttribute('ls');window.location.hash='page'+this.listingsStart;this.reloadListingResults();}else if(e.target.hasClass('advance-signup')){this.advanceSignup();e.halt();}else if(tar.hasClass('changeloc')){try{_g.action('change-location',{});}catch(e){}
e.halt();this.toggleLocationChange(e,tar);}else if(tar.hasClass('emailfriend')){e.halt();this.emailFriend(e,tar);}},this);Y.all('input[type=checkbox]').on('change',function(e){this.reloadListingResults();},this);Y.all('div.signup ul.steps li .wrap input[type=text]').on('keydown',function(e){if(e.keyCode==13){this.advanceSignup();e.halt();}},this);if(BLT.Env.me['show-signup']){this.showRegPanel();}},toggleLocationChange:function(e,tar){var p=BLT.Obj.panel;var url=BLT.Obj.getXhrUrl('location',{'.return':BLT.Env.Urls.self});p.load(url,{'openAfter':true});},emailFriend:function(e,tar){var p=BLT.Obj.panel;var url=BLT.Obj.getXhrUrl('share',{'t':tar.getAttribute('t'),'id':tar.getAttribute('aid'),'.return':BLT.Env.Urls.self});p.load(url,{'openAfter':true});},reloadListingResults:function(){if(!Y.one('#ajax-listings')){return;}
Y.one('#ajax-listings').set('innerHTML','<div class="no-deals"><img src="http://s.dailyd.com/g-loader.gif" /><br />Loading...</div>');var url=BLT.Obj.getAjaxUrl('deals',{'do':'listings','.type':'pages','start':this.listingsStart,'area':this.aid});this.listingsStart=1;var params={'method':'POST','context':this,'form':{id:Y.one('form.filter'),useDisabled:true},'timeout':10000,'on':{'failure':function(){},'complete':function(id,o,a){var j=$j.parse(o.responseText);if(j.stat!=1){return;}
Y.one('#ajax-listings').set('innerHTML',j.html);var img=new Y.ImgLoadGroup({timeLimit:2,foldDistance:30});img.set('className','defer');try{_g.action("category",{});}catch(e){}
FB.XFBML.parse();}}};Y.io(url,params);},advanceSignup:function(){this.error=false;Y.all('form.signup input[type=text].step'+this.currentSignupStep).some(function(el){if(el.get('name')=='sub[email]'&&!(el.get('value').indexOf(".")>0&&el.get('value').indexOf("@")>0)){Y.one('.error-step'+this.currentSignupStep).set('innerHTML',el.getAttribute('label')+' must be a valid email address.');this.error=true;return true;}
if(el.get('name')=='sub[zip]'&&el.get('value')!=''&&(el.get('value').length>5||el.get('value').length<5)){Y.one('.error-step'+this.currentSignupStep).set('innerHTML',el.getAttribute('label')+' must be a valid five-digit zip code.');this.error=true;return true;}},this);if(!this.error){Y.one('.error-step'+this.currentSignupStep).set('innerHTML','');Y.Event.purgeElement('form.signup input[type=text].step'+this.currentSignupStep);}else{return;}
var elSteps=Y.one('ul.steps');var allSteps=elSteps.all('li');allSteps=allSteps.size();var pos=parseInt(elSteps.getStyle('left'));if(allSteps==this.currentSignupStep){Y.one('form.signup').submit();}
var movePos=pos-970;var anim=new Y.Anim({node:elSteps,easingOut:Y.Easing.easeOut,duration:.5,from:{left:pos},to:{left:movePos}});if(this.currentSignupStep<allSteps){anim.run();this.currentSignupStep=this.currentSignupStep+1;try{_g.beacon('pv',{'type':'signup-step','step':this.currentSignupStep});}catch(e){}}else{Y.one('form.signup').submit();}},updateLikes:function(){if(typeof BLT.Store.Likes=='undefined'){return;}
var likes={};for(var l in BLT.Store.Likes){var o=BLT.Store.Likes[l];likes[l]={'id':o.args.id,'type':o.args.type,'uid':o.args.uid};}
var url=BLT.Obj.getAjaxUrl('deals',{'do':'likes','.type':'pages'});var params={'method':'POST','context':this,'data':"data="+encodeURIComponent($j.stringify(likes)),'timeout':10000,'on':{'failure':function(){},'complete':function(id,o,a){var j=$j.parse(o.responseText);if(j.stat!=1){return;}
for(var d in j.data){var _d=j.data[d];Y.all('.like-'+_d.type+'-'+_d.id).each(function(el){var o=BLT.Store.Likes[_d.uid];if(_d.count>0){o.increment(false,_d.count);}});}}}};Y.io(url,params);},showRegPanel:function(){var panel=new BLT.Panel({'class':['reg-panel'],'modal':true});panel.load(BLT.Obj.getXhrUrl('register',{'format':'panel'}),{'openAfter':true});this.boys=0;this.girls=0;panel.on('panel:open',function(e){try{_g.beacon('pv',{'type':'signup-step-children'});}catch(e){}
Y.all('form.signup ul.kids li ul li').on('click',function(e){e.target.toggleClass('off');if(e.target.one('.info')){e.target.one('.info').toggleClass('off');}
var gender=e.target.getAttribute('gender');if(e.target.hasClass('off')){if(gender=='girl'){this.girls=this.girls-1;}
if(gender=='boy'){this.boys=this.boys-1;}
if(e.target.one('select')){e.target.one('select').set('value','default');}}else{if(gender=='girl'){this.girls=this.girls+1;}
if(gender=='boy'){this.boys=this.boys+1;}}
if(Y.one('.summary').hasClass('hidden')){Y.one('.summary').removeClass('hidden');}
var summary='I have no kids (yet)';var boy=false;var girl=false;if(this.boys==0){boy='No Boys';}else if(this.boys==1){boy='One Boy';}else if(this.boys==2){boy='Two Boys';}else if(this.boys==3){boy='Three Boys';}
if(this.girls==0){girl='No Girls';}else if(this.girls==1){girl='One Girl';}else if(this.girls==2){girl='Two Girls';}else if(this.girls==3){girl='Three Girls';}
summary='Yes, I have '+boy+' and '+girl+'';Y.one('.summary input[type=submit]').set('value',summary);Y.one('#boycount').set('value',this.boys);Y.one('#girlcount').set('value',this.girls);},this);},this);},initCountdown:function(el){if(!this.store.countdown){this.store.countdown=[];var self=this;window.setInterval(function(){for(var i in self.store.countdown){self.updateCountdown(self.store.countdown[i]);}},1000);}
var id=el.get('id').split('-');var ts=id[2]*1000;var info={'el':el,'ts':ts,'d':el.one('em.d'),'h':el.one('em.h'),'m':el.one('em.m'),'s':el.one('em.s')};var active=this.updateCountdown(info);if(active===true){this.store.countdown.push(info);}
else{el.set('innerHTML','<li class="expired">Deal has Expired!</li>');var deal=BLT.Obj.getParent(el,'deal');if(deal.get('tagName')=="LI"){deal.setStyle('opacity','.6');}}},updateCountdown:function(info){var now=new Date();var later=new Date(info.ts);if(now>later){return false;}
var days=Math.floor((later-now)/1000/60/60/24);var hours=Math.floor((later-now)/1000/60/60-(24*days));var minutes=Math.floor((later-now)/1000/60-(24*60*days)-(60*hours));var seconds=Math.floor((later-now)/1000-(24*60*60*days)-(60*60*hours)-(60*minutes));info.d.set('innerHTML',days);info.h.set('innerHTML',hours);info.m.set('innerHTML',minutes);info.s.set('innerHTML',seconds);return true;},stripos:function(f_haystack,f_needle,f_offset){var haystack=(f_haystack+'').toLowerCase();var needle=(f_needle+'').toLowerCase();var index=0;if((index=haystack.indexOf(needle,f_offset))!==-1){return index;}
return false;}}
Y.augment(BLT.Class.DailyD,Y.EventTarget);});