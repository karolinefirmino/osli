var thisTarget,isMTinterface;BroadcastChannel&&(thisTarget=window.TvrMT?"MTinterface":"outsideTab",MTBroadCast={BroadcastChannel:!1,observer:!1,thisTarget:thisTarget,isMTinterface:isMTinterface="MTinterface"===thisTarget,isOutsideTab:!isMTinterface,actionWhenVisible:!1,MTDynFrontData:!1,stat:{},init:function(e){MTBroadCast.isOutsideTab&&e&&(this.MTDynFrontData=e,this.listenForBuilderPublish()),this.createBroadcastChannel(),document.addEventListener("visibilitychange",MTBroadCast.visibilityChanged),this.BroadcastChannel.onmessage=function(e){!e||(e=e.data)&&e.update&&e.updateTarget===MTBroadCast.thisTarget&&(MTBroadCast.tabIsHidden()?MTBroadCast.actionWhenVisible=e:MTBroadCast.runAction(e))}},log:function(){},runAction:function(e){MTBroadCast.update[e.update](e),MTBroadCast.actionWhenVisible=!1},tabIsHidden:function(){return"hidden"===document.visibilityState},visibilityChanged:function(){"visible"===document.visibilityState&&setTimeout(function(){MTBroadCast.actionWhenVisible&&MTBroadCast.runAction(MTBroadCast.actionWhenVisible)},20)},createBroadcastChannel:function(){this.BroadcastChannel=new BroadcastChannel("microthemer")},broadcastChange:function(e){this.BroadcastChannel||this.createBroadcastChannel(),MTBroadCast.log("postMessage",e),this.BroadcastChannel.postMessage(e)},closeBroadcast:function(){this.BroadcastChannel.close(),this.BroadcastChannel=!1,document.removeEventListener("visibilitychange",MTBroadCast.visibilityChanged)},toggleSyncBrowserTabs:function(e){e?MTBroadCast.init():MTBroadCast.closeBroadcast()},observeTarget:function(t,a){a.observerConfig=a.observerConfig||{};var e=new MutationObserver(function(e){e.forEach(function(e){a.item.apply(this,[t,e].concat(a.args||[]))})});e.observe(t,a.observerConfig),MTBroadCast.observer=e},disconnectObserver:function(){MTBroadCast.observer.disconnect()},docReady:function(e){"complete"===document.readyState||"interactive"===document.readyState?setTimeout(e,1):document.addEventListener("DOMContentLoaded",e)},observeDomChange:function(e,a,t,o,n){t=t||document,o=o||"class";t=(n=n||{}).el||t.querySelector(e);MTBroadCast.log("We have observeDomChange",e,a,t,n),t&&MTBroadCast.observeTarget(t,{observerConfig:{attributeFilter:[o],attributeOldValue:n.attributeOldValue,subtree:n.subtree,childList:n.childList},item:function(e,t){MTBroadCast.log("The mutation",t),("class"===o&&(!n.attributeOldValue&&e.classList.contains(a)||n.attributeOldValue&&t.oldValue.match(n.attributeOldValue))||"style"===o&&e[o][a.property]===a.value||"dataset"===n.change&&e[n.change][a.key]===a.value&&!n.attributeOldValue||t.oldValue===n.attributeOldValue||"disabled"===o&&e.disabled===a||("addedNodes"===o||"removedNodes"===o)&&t[o].length&&t[o][0].classList&&t[o][0].classList.contains(a))&&(MTBroadCast.log("Some kind of update happened in a Builder"),MTBroadCast.BroadcastChannel.postMessage({update:"sitePreview",updateTarget:"MTinterface",MTDynFrontData:MTBroadCast.MTDynFrontData}),n.cb&&n.cb.item.apply(this,n.args||[]))}})},listenForBuilderPublish:function(){MTBroadCast.docReady(function(){MTBroadCast.stat.body=document.body;var e,t=document.body.dataset,a=!1,o=!1;document.documentElement.classList.contains("et-fb-app-frame")&&(a="divi"),t.hasOwnProperty("builderMode")?a="bricks":document.body.classList.contains("brz-ed")?a="brizy":document.body.classList.contains("znpb-editor-preview")?a="zion":"wppb-page-builder"===document.body.id?a="wppb":document.getElementById("breakdance_canvas")?a="breakdance":document.documentElement.dataset.op3Layer?a="optimizePress":document.body.classList.contains("tve_editor_page")?a="thrive":t.hasOwnProperty("elementorDeviceMode")?a="elementor":document.documentElement.classList.contains("fl-builder-is-showing-toolbar")?a="FLBuilder":"CTFrontendBuilder"===document.documentElement.getAttribute("ng-app")&&(a="oxygen"),a&&(MTBroadCast.log("We have a builder",a),e=MTBroadCast[a].click,o=MTBroadCast[a].observe,e&&document.addEventListener("click",e),o&&o())})},divi:{observe:function(){setTimeout(function(){MTBroadCast.observeDomChange("button.et-fb-button--save-draft",!1,window.parent.document,"disabled"),MTBroadCast.observeDomChange("button.et-fb-button--publish",!1,window.parent.document,"disabled")},4e3)}},bricks:{observe:function(){MTBroadCast.observeDomChange("#bricks-preview-message","show")}},brizy:{observe:function(){setTimeout(function(){MTBroadCast.observeDomChange("div.brz-ed-fixed-bottom-panel__btn svg.brz-icon-svg","brz-d-none",window.parent.document)},2e3)}},zion:{observe:function(){MTBroadCast.observeDomChange(".znpb-editor-header__page-save-wrapper--save","znpb-editor-icon-wrapper",window.parent.document,"addedNodes",{subtree:!0,childList:!0})}},wppb:{observe:function(){setTimeout(function(){MTBroadCast.observeDomChange("#wppb-builder-page-tools","wppb-toastr-success",window.parent.document,"addedNodes",{subtree:!0,childList:!0})},2e3)}},breakdance:{observe:function(){setTimeout(function(){MTBroadCast.observeDomChange('button[data-test-id="main-save-button"]',"v-btn__loader",window.parent.document,"removedNodes",{subtree:!0,childList:!0})},2e3)}},optimizePress:{observe:function(){setTimeout(function(){var e=window.parent.document;MTBroadCast.observeDomChange(!1,{key:"op3ButtonStatus",value:"success"},e,"data-op3-button-status",{el:e.getElementById("header").querySelector("a.save"),attributeOldValue:"pending",change:"dataset"})},2e3)}},thrive:{observe:function(){var e=window.parent.document;MTBroadCast.observeDomChange(!1,!1,e,"class",{el:e.getElementById("tcb-editor-settings").querySelector("a.save"),attributeOldValue:"tve-disabled"})}},elementor:{observe:function(){MTBroadCast.observeDomChange("#elementor-panel-saver-button-publish","elementor-disabled",window.parent.document)}},FLBuilder:{observe:function(){MTBroadCast.observeDomChange("div.fl-builder-bar","is-hidden",window.parent.document)}},oxygen:{observe:function(){MTBroadCast.observeDomChange("#ct-page-overlay",{property:"display",value:"none"},window.parent.document,"style")}},update:{css:function(e){var t="reload="+(new Date).getTime(),a=e.gfURL,o="microthemer_g_font-css",n=document.getElementById(o),s=document.getElementById("microthemer-css")||document.querySelector('link[href*="micro-themes"]');s&&(s.href=e.mtURL+"?"+t),n&&!a?n.remove():!n&&a?((e=document.createElement("link")).id=o,e.href=a+"&"+t,e.rel="stylesheet",e.media="all",document.head.appendChild(e)):n&&a&&(n.href=a+"&"+t)},sitePreview:function(e){MTBroadCast.log("Received message to reload the site preview",e);var t=window.TvrMT,a=t.MTF,o=t.TvrUi,n=a.getMTDynFrontData(),s=a.get_current_url(),t=decodeURIComponent(e.MTDynFrontData["iframe-url"]);n["page-id"]!==e.MTDynFrontData["page-id"]&&s!==t||(o.resumeIframeScroll={top:a.stat.win.scrollY,left:a.stat.win.scrollX,behaviour:"auto"},o.change_preview_url(o.stat.settingsMenu.find(".change-preview-url")))}}});