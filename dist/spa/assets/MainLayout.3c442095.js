import{g as ot,c as ee,j as $e,h as Ae,e as lt,Q as P,R as O}from"./use-router-link.cd4a8d0e.js";import{u as rt,a as ut,b as st,c as ct,d as dt,i as ie,e as ft,f as vt,j as mt,k as ht,g as pe,h as D,Q as S}from"./QItemSection.45a0d9dc.js";import{Q as Pe}from"./QInput.c8a43e23.js";import{Q as pt}from"./QSeparator.2695debe.js";import{Q as gt}from"./QList.34c0f73a.js";import{u as bt,a as yt}from"./use-key-composition.3ca68c99.js";import{c as J,n as xe,W as wt,t as oe,X as ge,G as Me,x as be,y as Se,v as ye,F as _t,J as We,Z as Y,ab as ke,r as L,h as p,z as x,D as Z,A as re,C as ue,p as B,j as T,k as te,a0 as Fe,ac as St,H as Ce,I as He,ad as le,a3 as Ct,_ as xt,ae as kt,o as M,S as E,w as f,f as d,e as H,g as A,af as qt,ag as zt}from"./index.b97f7fcb.js";import{g as Ee,s as Be}from"./touch.3df10340.js";import{c as Tt}from"./selection.9064d2eb.js";import{Q as Lt}from"./QPage.76403cc3.js";function we(t,u,o){const r=Se(t);let e,a=r.left-u.event.x,s=r.top-u.event.y,v=Math.abs(a),c=Math.abs(s);const l=u.direction;l.horizontal===!0&&l.vertical!==!0?e=a<0?"left":"right":l.horizontal!==!0&&l.vertical===!0?e=s<0?"up":"down":l.up===!0&&s<0?(e="up",v>c&&(l.left===!0&&a<0?e="left":l.right===!0&&a>0&&(e="right"))):l.down===!0&&s>0?(e="down",v>c&&(l.left===!0&&a<0?e="left":l.right===!0&&a>0&&(e="right"))):l.left===!0&&a<0?(e="left",v<c&&(l.up===!0&&s<0?e="up":l.down===!0&&s>0&&(e="down"))):l.right===!0&&a>0&&(e="right",v<c&&(l.up===!0&&s<0?e="up":l.down===!0&&s>0&&(e="down")));let i=!1;if(e===void 0&&o===!1){if(u.event.isFirst===!0||u.event.lastDir===void 0)return{};e=u.event.lastDir,i=!0,e==="left"||e==="right"?(r.left-=a,v=0,a=0):(r.top-=s,c=0,s=0)}return{synthetic:i,payload:{evt:t,touch:u.event.mouse!==!0,mouse:u.event.mouse===!0,position:r,direction:e,isFirst:u.event.isFirst,isFinal:o===!0,duration:Date.now()-u.event.time,distance:{x:v,y:c},offset:{x:a,y:s},delta:{x:r.left-u.event.lastX,y:r.top-u.event.lastY}}}}let $t=0;var _e=ot({name:"touch-pan",beforeMount(t,{value:u,modifiers:o}){if(o.mouse!==!0&&J.has.touch!==!0)return;function r(a,s){o.mouse===!0&&s===!0?_t(a):(o.stop===!0&&be(a),o.prevent===!0&&Me(a))}const e={uid:"qvtp_"+$t++,handler:u,modifiers:o,direction:Ee(o),noop:xe,mouseStart(a){Be(a,e)&&wt(a)&&(oe(e,"temp",[[document,"mousemove","move","notPassiveCapture"],[document,"mouseup","end","passiveCapture"]]),e.start(a,!0))},touchStart(a){if(Be(a,e)){const s=a.target;oe(e,"temp",[[s,"touchmove","move","notPassiveCapture"],[s,"touchcancel","end","passiveCapture"],[s,"touchend","end","passiveCapture"]]),e.start(a)}},start(a,s){if(J.is.firefox===!0&&ge(t,!0),e.lastEvt=a,s===!0||o.stop===!0){if(e.direction.all!==!0&&(s!==!0||e.modifiers.mouseAllDir!==!0&&e.modifiers.mousealldir!==!0)){const l=a.type.indexOf("mouse")>-1?new MouseEvent(a.type,a):new TouchEvent(a.type,a);a.defaultPrevented===!0&&Me(l),a.cancelBubble===!0&&be(l),Object.assign(l,{qKeyEvent:a.qKeyEvent,qClickOutside:a.qClickOutside,qAnchorHandled:a.qAnchorHandled,qClonedBy:a.qClonedBy===void 0?[e.uid]:a.qClonedBy.concat(e.uid)}),e.initialEvent={target:a.target,event:l}}be(a)}const{left:v,top:c}=Se(a);e.event={x:v,y:c,time:Date.now(),mouse:s===!0,detected:!1,isFirst:!0,isFinal:!1,lastX:v,lastY:c}},move(a){if(e.event===void 0)return;const s=Se(a),v=s.left-e.event.x,c=s.top-e.event.y;if(v===0&&c===0)return;e.lastEvt=a;const l=e.event.mouse===!0,i=()=>{r(a,l);let b;o.preserveCursor!==!0&&o.preservecursor!==!0&&(b=document.documentElement.style.cursor||"",document.documentElement.style.cursor="grabbing"),l===!0&&document.body.classList.add("no-pointer-events--children"),document.body.classList.add("non-selectable"),Tt(),e.styleCleanup=g=>{if(e.styleCleanup=void 0,b!==void 0&&(document.documentElement.style.cursor=b),document.body.classList.remove("non-selectable"),l===!0){const Q=()=>{document.body.classList.remove("no-pointer-events--children")};g!==void 0?setTimeout(()=>{Q(),g()},50):Q()}else g!==void 0&&g()}};if(e.event.detected===!0){e.event.isFirst!==!0&&r(a,e.event.mouse);const{payload:b,synthetic:g}=we(a,e,!1);b!==void 0&&(e.handler(b)===!1?e.end(a):(e.styleCleanup===void 0&&e.event.isFirst===!0&&i(),e.event.lastX=b.position.left,e.event.lastY=b.position.top,e.event.lastDir=g===!0?void 0:b.direction,e.event.isFirst=!1));return}if(e.direction.all===!0||l===!0&&(e.modifiers.mouseAllDir===!0||e.modifiers.mousealldir===!0)){i(),e.event.detected=!0,e.move(a);return}const _=Math.abs(v),w=Math.abs(c);_!==w&&(e.direction.horizontal===!0&&_>w||e.direction.vertical===!0&&_<w||e.direction.up===!0&&_<w&&c<0||e.direction.down===!0&&_<w&&c>0||e.direction.left===!0&&_>w&&v<0||e.direction.right===!0&&_>w&&v>0?(e.event.detected=!0,e.move(a)):e.end(a,!0))},end(a,s){if(e.event!==void 0){if(ye(e,"temp"),J.is.firefox===!0&&ge(t,!1),s===!0)e.styleCleanup!==void 0&&e.styleCleanup(),e.event.detected!==!0&&e.initialEvent!==void 0&&e.initialEvent.target.dispatchEvent(e.initialEvent.event);else if(e.event.detected===!0){e.event.isFirst===!0&&e.handler(we(a===void 0?e.lastEvt:a,e).payload);const{payload:v}=we(a===void 0?e.lastEvt:a,e,!0),c=()=>{e.handler(v)};e.styleCleanup!==void 0?e.styleCleanup(c):c()}e.event=void 0,e.initialEvent=void 0,e.lastEvt=void 0}}};if(t.__qtouchpan=e,o.mouse===!0){const a=o.mouseCapture===!0||o.mousecapture===!0?"Capture":"";oe(e,"main",[[t,"mousedown","mouseStart",`passive${a}`]])}J.has.touch===!0&&oe(e,"main",[[t,"touchstart","touchStart",`passive${o.capture===!0?"Capture":""}`],[t,"touchmove","noop","notPassiveCapture"]])},updated(t,u){const o=t.__qtouchpan;o!==void 0&&(u.oldValue!==u.value&&(typeof value!="function"&&o.end(),o.handler=u.value),o.direction=Ee(u.modifiers))},beforeUnmount(t){const u=t.__qtouchpan;u!==void 0&&(u.event!==void 0&&u.end(),ye(u,"main"),ye(u,"temp"),J.is.firefox===!0&&ge(t,!1),u.styleCleanup!==void 0&&u.styleCleanup(),delete t.__qtouchpan)}});const Oe=150;var Pt=ee({name:"QDrawer",inheritAttrs:!1,props:{...rt,...bt,side:{type:String,default:"left",validator:t=>["left","right"].includes(t)},width:{type:Number,default:300},mini:Boolean,miniToOverlay:Boolean,miniWidth:{type:Number,default:57},noMiniAnimation:Boolean,breakpoint:{type:Number,default:1023},showIfAbove:Boolean,behavior:{type:String,validator:t=>["default","desktop","mobile"].includes(t),default:"default"},bordered:Boolean,elevated:Boolean,overlay:Boolean,persistent:Boolean,noSwipeOpen:Boolean,noSwipeClose:Boolean,noSwipeBackdrop:Boolean},emits:[...ut,"onLayout","miniState"],setup(t,{slots:u,emit:o,attrs:r}){const e=te(),{proxy:{$q:a}}=e,s=yt(t,a),{preventBodyScroll:v}=ft(),{registerTimeout:c,removeTimeout:l}=st(),i=We(ke,Y);if(i===Y)return console.error("QDrawer needs to be child of QLayout"),Y;let _,w=null,b;const g=L(t.behavior==="mobile"||t.behavior!=="desktop"&&i.totalWidth.value<=t.breakpoint),Q=p(()=>t.mini===!0&&g.value!==!0),k=p(()=>Q.value===!0?t.miniWidth:t.width),y=L(t.showIfAbove===!0&&g.value===!1?!0:t.modelValue===!0),I=p(()=>t.persistent!==!0&&(g.value===!0||je.value===!0));function U(n,m){if(V(),n!==!1&&i.animate(),$(0),g.value===!0){const q=i.instances[ae.value];q!==void 0&&q.belowBreakpoint===!0&&q.hide(!1),W(1),i.isContainer.value!==!0&&v(!0)}else W(0),n!==!1&&ve(!1);c(()=>{n!==!1&&ve(!0),m!==!0&&o("show",n)},Oe)}function h(n,m){K(),n!==!1&&i.animate(),W(0),$(N.value*k.value),me(),m!==!0?c(()=>{o("hide",n)},Oe):l()}const{show:C,hide:z}=ct({showing:y,hideOnRouteChange:I,handleShow:U,handleHide:h}),{addToHistory:V,removeFromHistory:K}=dt(y,z,I),j={belowBreakpoint:g,hide:z},R=p(()=>t.side==="right"),N=p(()=>(a.lang.rtl===!0?-1:1)*(R.value===!0?1:-1)),qe=L(0),X=L(!1),se=L(!1),ze=L(k.value*N.value),ae=p(()=>R.value===!0?"left":"right"),ce=p(()=>y.value===!0&&g.value===!1&&t.overlay===!1?t.miniToOverlay===!0?t.miniWidth:k.value:0),de=p(()=>t.overlay===!0||t.miniToOverlay===!0||i.view.value.indexOf(R.value?"R":"L")>-1||a.platform.is.ios===!0&&i.isContainer.value===!0),G=p(()=>t.overlay===!1&&y.value===!0&&g.value===!1),je=p(()=>t.overlay===!0&&y.value===!0&&g.value===!1),Ne=p(()=>"fullscreen q-drawer__backdrop"+(y.value===!1&&X.value===!1?" hidden":"")),Xe=p(()=>({backgroundColor:`rgba(0,0,0,${qe.value*.4})`})),Te=p(()=>R.value===!0?i.rows.value.top[2]==="r":i.rows.value.top[0]==="l"),Ye=p(()=>R.value===!0?i.rows.value.bottom[2]==="r":i.rows.value.bottom[0]==="l"),Ue=p(()=>{const n={};return i.header.space===!0&&Te.value===!1&&(de.value===!0?n.top=`${i.header.offset}px`:i.header.space===!0&&(n.top=`${i.header.size}px`)),i.footer.space===!0&&Ye.value===!1&&(de.value===!0?n.bottom=`${i.footer.offset}px`:i.footer.space===!0&&(n.bottom=`${i.footer.size}px`)),n}),Ke=p(()=>{const n={width:`${k.value}px`,transform:`translateX(${ze.value}px)`};return g.value===!0?n:Object.assign(n,Ue.value)}),Ge=p(()=>"q-drawer__content fit "+(i.isContainer.value!==!0?"scroll":"overflow-auto")),Je=p(()=>`q-drawer q-drawer--${t.side}`+(se.value===!0?" q-drawer--mini-animate":"")+(t.bordered===!0?" q-drawer--bordered":"")+(s.value===!0?" q-drawer--dark q-dark":"")+(X.value===!0?" no-transition":y.value===!0?"":" q-layout--prevent-focus")+(g.value===!0?" fixed q-drawer--on-top q-drawer--mobile q-drawer--top-padding":` q-drawer--${Q.value===!0?"mini":"standard"}`+(de.value===!0||G.value!==!0?" fixed":"")+(t.overlay===!0||t.miniToOverlay===!0?" q-drawer--on-top":"")+(Te.value===!0?" q-drawer--top-padding":""))),Ze=p(()=>{const n=a.lang.rtl===!0?t.side:ae.value;return[[_e,nt,void 0,{[n]:!0,mouse:!0}]]}),et=p(()=>{const n=a.lang.rtl===!0?ae.value:t.side;return[[_e,Le,void 0,{[n]:!0,mouse:!0}]]}),tt=p(()=>{const n=a.lang.rtl===!0?ae.value:t.side;return[[_e,Le,void 0,{[n]:!0,mouse:!0,mouseAllDir:!0}]]});function fe(){it(g,t.behavior==="mobile"||t.behavior!=="desktop"&&i.totalWidth.value<=t.breakpoint)}x(g,n=>{n===!0?(_=y.value,y.value===!0&&z(!1)):t.overlay===!1&&t.behavior!=="mobile"&&_!==!1&&(y.value===!0?($(0),W(0),me()):C(!1))}),x(()=>t.side,(n,m)=>{i.instances[m]===j&&(i.instances[m]=void 0,i[m].space=!1,i[m].offset=0),i.instances[n]=j,i[n].size=k.value,i[n].space=G.value,i[n].offset=ce.value}),x(i.totalWidth,()=>{(i.isContainer.value===!0||document.qScrollPrevented!==!0)&&fe()}),x(()=>t.behavior+t.breakpoint,fe),x(i.isContainer,n=>{y.value===!0&&v(n!==!0),n===!0&&fe()}),x(i.scrollbarWidth,()=>{$(y.value===!0?0:void 0)}),x(ce,n=>{F("offset",n)}),x(G,n=>{o("onLayout",n),F("space",n)}),x(R,()=>{$()}),x(k,n=>{$(),he(t.miniToOverlay,n)}),x(()=>t.miniToOverlay,n=>{he(n,k.value)}),x(()=>a.lang.rtl,()=>{$()}),x(()=>t.mini,()=>{t.noMiniAnimation||t.modelValue===!0&&(at(),i.animate())}),x(Q,n=>{o("miniState",n)});function $(n){n===void 0?re(()=>{n=y.value===!0?0:k.value,$(N.value*n)}):(i.isContainer.value===!0&&R.value===!0&&(g.value===!0||Math.abs(n)===k.value)&&(n+=N.value*i.scrollbarWidth.value),ze.value=n)}function W(n){qe.value=n}function ve(n){const m=n===!0?"remove":i.isContainer.value!==!0?"add":"";m!==""&&document.body.classList[m]("q-body--drawer-toggle")}function at(){w!==null&&clearTimeout(w),e.proxy&&e.proxy.$el&&e.proxy.$el.classList.add("q-drawer--mini-animate"),se.value=!0,w=setTimeout(()=>{w=null,se.value=!1,e&&e.proxy&&e.proxy.$el&&e.proxy.$el.classList.remove("q-drawer--mini-animate")},150)}function nt(n){if(y.value!==!1)return;const m=k.value,q=ie(n.distance.x,0,m);if(n.isFinal===!0){q>=Math.min(75,m)===!0?C():(i.animate(),W(0),$(N.value*m)),X.value=!1;return}$((a.lang.rtl===!0?R.value!==!0:R.value)?Math.max(m-q,0):Math.min(0,q-m)),W(ie(q/m,0,1)),n.isFirst===!0&&(X.value=!0)}function Le(n){if(y.value!==!0)return;const m=k.value,q=n.direction===t.side,ne=(a.lang.rtl===!0?q!==!0:q)?ie(n.distance.x,0,m):0;if(n.isFinal===!0){Math.abs(ne)<Math.min(75,m)===!0?(i.animate(),W(1),$(0)):z(),X.value=!1;return}$(N.value*ne),W(ie(1-ne/m,0,1)),n.isFirst===!0&&(X.value=!0)}function me(){v(!1),ve(!0)}function F(n,m){i.update(t.side,n,m)}function it(n,m){n.value!==m&&(n.value=m)}function he(n,m){F("size",n===!0?t.miniWidth:m)}return i.instances[t.side]=j,he(t.miniToOverlay,k.value),F("space",G.value),F("offset",ce.value),t.showIfAbove===!0&&t.modelValue!==!0&&y.value===!0&&t["onUpdate:modelValue"]!==void 0&&o("update:modelValue",!0),Z(()=>{o("onLayout",G.value),o("miniState",Q.value),_=t.showIfAbove===!0;const n=()=>{(y.value===!0?U:h)(!1,!0)};if(i.totalWidth.value!==0){re(n);return}b=x(i.totalWidth,()=>{b(),b=void 0,y.value===!1&&t.showIfAbove===!0&&g.value===!1?C(!1):n()})}),ue(()=>{b!==void 0&&b(),w!==null&&(clearTimeout(w),w=null),y.value===!0&&me(),i.instances[t.side]===j&&(i.instances[t.side]=void 0,F("size",0),F("offset",0),F("space",!1))}),()=>{const n=[];g.value===!0&&(t.noSwipeOpen===!1&&n.push(B(T("div",{key:"open",class:`q-drawer__opener fixed-${t.side}`,"aria-hidden":"true"}),Ze.value)),n.push($e("div",{ref:"backdrop",class:Ne.value,style:Xe.value,"aria-hidden":"true",onClick:z},void 0,"backdrop",t.noSwipeBackdrop!==!0&&y.value===!0,()=>tt.value)));const m=Q.value===!0&&u.mini!==void 0,q=[T("div",{...r,key:""+m,class:[Ge.value,r.class]},m===!0?u.mini():Ae(u.default))];return t.elevated===!0&&y.value===!0&&q.push(T("div",{class:"q-layout__shadow absolute-full overflow-hidden no-pointer-events"})),n.push($e("aside",{ref:"content",class:Je.value,style:Ke.value},q,"contentclose",t.noSwipeClose!==!0&&g.value===!0,()=>et.value)),T("div",{class:"q-drawer-container"},n)}}}),Mt=ee({name:"QPageContainer",setup(t,{slots:u}){const{proxy:{$q:o}}=te(),r=We(ke,Y);if(r===Y)return console.error("QPageContainer needs to be child of QLayout"),Y;Fe(St,!0);const e=p(()=>{const a={};return r.header.space===!0&&(a.paddingTop=`${r.header.size}px`),r.right.space===!0&&(a[`padding${o.lang.rtl===!0?"Left":"Right"}`]=`${r.right.size}px`),r.footer.space===!0&&(a.paddingBottom=`${r.footer.size}px`),r.left.space===!0&&(a[`padding${o.lang.rtl===!0?"Right":"Left"}`]=`${r.left.size}px`),a});return()=>T("div",{class:"q-page-container",style:e.value},Ae(u.default))}});const{passive:De}=Ce,Et=["both","horizontal","vertical"];var Bt=ee({name:"QScrollObserver",props:{axis:{type:String,validator:t=>Et.includes(t),default:"vertical"},debounce:[String,Number],scrollTarget:{default:void 0}},emits:["scroll"],setup(t,{emit:u}){const o={position:{top:0,left:0},direction:"down",directionChanged:!1,delta:{top:0,left:0},inflectionPoint:{top:0,left:0}};let r=null,e,a;x(()=>t.scrollTarget,()=>{c(),v()});function s(){r!==null&&r();const _=Math.max(0,mt(e)),w=ht(e),b={top:_-o.position.top,left:w-o.position.left};if(t.axis==="vertical"&&b.top===0||t.axis==="horizontal"&&b.left===0)return;const g=Math.abs(b.top)>=Math.abs(b.left)?b.top<0?"up":"down":b.left<0?"left":"right";o.position={top:_,left:w},o.directionChanged=o.direction!==g,o.delta=b,o.directionChanged===!0&&(o.direction=g,o.inflectionPoint=o.position),u("scroll",{...o})}function v(){e=vt(a,t.scrollTarget),e.addEventListener("scroll",l,De),l(!0)}function c(){e!==void 0&&(e.removeEventListener("scroll",l,De),e=void 0)}function l(_){if(_===!0||t.debounce===0||t.debounce==="0")s();else if(r===null){const[w,b]=t.debounce?[setTimeout(s,t.debounce),clearTimeout]:[requestAnimationFrame(s),cancelAnimationFrame];r=()=>{b(w),r=null}}}const{proxy:i}=te();return x(()=>i.$q.lang.rtl,s),Z(()=>{a=i.$el.parentNode,v()}),ue(()=>{r!==null&&r(),c()}),Object.assign(i,{trigger:l,getPosition:()=>o}),xe}});function Ot(){const t=L(!He.value);return t.value===!1&&Z(()=>{t.value=!0}),t}const Ie=typeof ResizeObserver!="undefined",Qe=Ie===!0?{}:{style:"display:block;position:absolute;top:0;left:0;right:0;bottom:0;height:100%;width:100%;overflow:hidden;pointer-events:none;z-index:-1;",url:"about:blank"};var Re=ee({name:"QResizeObserver",props:{debounce:{type:[String,Number],default:100}},emits:["resize"],setup(t,{emit:u}){let o=null,r,e={width:-1,height:-1};function a(c){c===!0||t.debounce===0||t.debounce==="0"?s():o===null&&(o=setTimeout(s,t.debounce))}function s(){if(o!==null&&(clearTimeout(o),o=null),r){const{offsetWidth:c,offsetHeight:l}=r;(c!==e.width||l!==e.height)&&(e={width:c,height:l},u("resize",e))}}const{proxy:v}=te();if(v.trigger=a,Ie===!0){let c;const l=i=>{r=v.$el.parentNode,r?(c=new ResizeObserver(a),c.observe(r),s()):i!==!0&&re(()=>{l(!0)})};return Z(()=>{l()}),ue(()=>{o!==null&&clearTimeout(o),c!==void 0&&(c.disconnect!==void 0?c.disconnect():r&&c.unobserve(r))}),xe}else{let i=function(){o!==null&&(clearTimeout(o),o=null),l!==void 0&&(l.removeEventListener!==void 0&&l.removeEventListener("resize",a,Ce.passive),l=void 0)},_=function(){i(),r&&r.contentDocument&&(l=r.contentDocument.defaultView,l.addEventListener("resize",a,Ce.passive),s())};const c=Ot();let l;return Z(()=>{re(()=>{r=v.$el,r&&_()})}),ue(i),()=>{if(c.value===!0)return T("object",{style:Qe.style,tabindex:-1,type:"text/html",data:Qe.url,"aria-hidden":"true",onLoad:_})}}}}),Dt=ee({name:"QLayout",props:{container:Boolean,view:{type:String,default:"hhh lpr fff",validator:t=>/^(h|l)h(h|r) lpr (f|l)f(f|r)$/.test(t.toLowerCase())},onScroll:Function,onScrollHeight:Function,onResize:Function},setup(t,{slots:u,emit:o}){const{proxy:{$q:r}}=te(),e=L(null),a=L(r.screen.height),s=L(t.container===!0?0:r.screen.width),v=L({position:0,direction:"down",inflectionPoint:0}),c=L(0),l=L(He.value===!0?0:pe()),i=p(()=>"q-layout q-layout--"+(t.container===!0?"containerized":"standard")),_=p(()=>t.container===!1?{minHeight:r.screen.height+"px"}:null),w=p(()=>l.value!==0?{[r.lang.rtl===!0?"left":"right"]:`${l.value}px`}:null),b=p(()=>l.value!==0?{[r.lang.rtl===!0?"right":"left"]:0,[r.lang.rtl===!0?"left":"right"]:`-${l.value}px`,width:`calc(100% + ${l.value}px)`}:null);function g(h){if(t.container===!0||document.qScrollPrevented!==!0){const C={position:h.position.top,direction:h.direction,directionChanged:h.directionChanged,inflectionPoint:h.inflectionPoint.top,delta:h.delta.top};v.value=C,t.onScroll!==void 0&&o("scroll",C)}}function Q(h){const{height:C,width:z}=h;let V=!1;a.value!==C&&(V=!0,a.value=C,t.onScrollHeight!==void 0&&o("scrollHeight",C),y()),s.value!==z&&(V=!0,s.value=z),V===!0&&t.onResize!==void 0&&o("resize",h)}function k({height:h}){c.value!==h&&(c.value=h,y())}function y(){if(t.container===!0){const h=a.value>c.value?pe():0;l.value!==h&&(l.value=h)}}let I=null;const U={instances:{},view:p(()=>t.view),isContainer:p(()=>t.container),rootRef:e,height:a,containerHeight:c,scrollbarWidth:l,totalWidth:p(()=>s.value+l.value),rows:p(()=>{const h=t.view.toLowerCase().split(" ");return{top:h[0].split(""),middle:h[1].split(""),bottom:h[2].split("")}}),header:le({size:0,offset:0,space:!1}),right:le({size:300,offset:0,space:!1}),footer:le({size:0,offset:0,space:!1}),left:le({size:300,offset:0,space:!1}),scroll:v,animate(){I!==null?clearTimeout(I):document.body.classList.add("q-body--layout-animate"),I=setTimeout(()=>{I=null,document.body.classList.remove("q-body--layout-animate")},155)},update(h,C,z){U[h][C]=z}};if(Fe(ke,U),pe()>0){let z=function(){h=null,C.classList.remove("hide-scrollbar")},V=function(){if(h===null){if(C.scrollHeight>r.screen.height)return;C.classList.add("hide-scrollbar")}else clearTimeout(h);h=setTimeout(z,300)},K=function(j){h!==null&&j==="remove"&&(clearTimeout(h),z()),window[`${j}EventListener`]("resize",V)},h=null;const C=document.body;x(()=>t.container!==!0?"add":"remove",K),t.container!==!0&&K("add"),Ct(()=>{K("remove")})}return()=>{const h=lt(u.default,[T(Bt,{onScroll:g}),T(Re,{onResize:Q})]),C=T("div",{class:i.value,style:_.value,ref:t.container===!0?void 0:e,tabindex:-1},h);return t.container===!0?T("div",{class:"q-layout-container overflow-hidden",ref:e},[T(Re,{onResize:k}),T("div",{class:"absolute-full",style:w.value},[T("div",{class:"scroll",style:b.value},[C])])]):C}}});const Qt={data(){return{drawer:!1,miniState:!0}}},Ve=t=>(qt("data-v-3cf4ac5d"),t=t(),zt(),t),Rt={class:"fit","horizontal-thumb-style":{opacity:0}},At=Ve(()=>H("h6",{class:"q-my-md"},"VitalSynch",-1)),Wt=Ve(()=>H("br",null,null,-1)),Ft={class:"q-pb-md"},Ht={class:"row"},It={class:"col-8"},Vt={class:"col flex justify-end"},jt={class:"app-wrapper bg-white rounded-borders border-radius-3"};function Nt(t,u,o,r,e,a){const s=kt("router-view");return M(),E(Dt,{view:"hHh Lpr lff",container:"",style:{"min-height":"calc(100vh - 10px)"},position:"relative"},{default:f(()=>[d(Pt,{modelValue:e.drawer,"onUpdate:modelValue":u[0]||(u[0]=v=>e.drawer=v),"show-if-above":"",mini:e.miniState,onMouseover:u[1]||(u[1]=v=>e.miniState=!1),onMouseout:u[2]||(u[2]=v=>e.miniState=!0),width:250,breakpoint:500,bordered:"","content-class":"bg-grey-3",style:{position:"fixed",top:"0",left:"0",height:"100vh","z-index":"1000"}},{default:f(()=>[H("div",Rt,[d(gt,{padding:""},{default:f(()=>[B((M(),E(D,{clickable:""},{default:f(()=>[d(S,{avatar:""},{default:f(()=>[d(P,{name:"dashboard",class:"q-my-md"})]),_:1}),d(S,null,{default:f(()=>[At]),_:1})]),_:1})),[[O]]),B((M(),E(D,{clickable:""},{default:f(()=>[d(S,{avatar:""},{default:f(()=>[d(P,{name:"search"})]),_:1}),d(S,null,{default:f(()=>[d(Pe,{outlined:"","bg-color":"white",class:"full-width main-search",dense:"",placeholder:"Search"},{prepend:f(()=>[d(P,{name:"search"})]),_:1})]),_:1})]),_:1})),[[O]]),B((M(),E(D,null,{default:f(()=>[d(S,null,{default:f(()=>[A(" Activity ")]),_:1})]),_:1})),[[O]]),B((M(),E(D,{clickable:""},{default:f(()=>[d(S,{avatar:""},{default:f(()=>[d(P,{name:"dashboard"})]),_:1}),d(S,null,{default:f(()=>[A(" Dashboard ")]),_:1})]),_:1})),[[O]]),B((M(),E(D,{active:"",clickable:""},{default:f(()=>[d(S,{avatar:""},{default:f(()=>[d(P,{name:"groups"})]),_:1}),d(S,null,{default:f(()=>[A(" Patient Management ")]),_:1})]),_:1})),[[O]]),B((M(),E(D,{clickable:""},{default:f(()=>[d(S,{avatar:""},{default:f(()=>[d(P,{name:"pending_actions"})]),_:1}),d(S,null,{default:f(()=>[A(" Appointment Tracker ")]),_:1})]),_:1})),[[O]]),B((M(),E(D,{clickable:""},{default:f(()=>[d(S,{avatar:""},{default:f(()=>[d(P,{name:"notes"})]),_:1}),d(S,null,{default:f(()=>[A(" Clinical Documentation ")]),_:1})]),_:1})),[[O]]),B((M(),E(D,{clickable:""},{default:f(()=>[d(S,{avatar:""},{default:f(()=>[d(P,{name:"medication"})]),_:1}),d(S,null,{default:f(()=>[A(" Prescription Center ")]),_:1})]),_:1})),[[O]]),Wt,d(pt),B((M(),E(D,null,{default:f(()=>[d(S,null,{default:f(()=>[A(" Information ")]),_:1})]),_:1})),[[O]]),B((M(),E(D,{clickable:""},{default:f(()=>[d(S,{avatar:""},{default:f(()=>[d(P,{name:"help"})]),_:1}),d(S,null,{default:f(()=>[A(" Support ")]),_:1})]),_:1})),[[O]]),B((M(),E(D,{clickable:""},{default:f(()=>[d(S,{avatar:""},{default:f(()=>[d(P,{name:"settings"})]),_:1}),d(S,null,{default:f(()=>[A(" Settings ")]),_:1})]),_:1})),[[O]])]),_:1})])]),_:1},8,["modelValue","mini"]),d(Mt,null,{default:f(()=>[d(Lt,{padding:"",class:"bg-cyan-1"},{default:f(()=>[H("div",Ft,[H("div",Ht,[H("div",It,[d(Pe,{outlined:"","bg-color":"white",class:"full-width main-search",dense:"",placeholder:"Search Filter..."},{prepend:f(()=>[d(P,{name:"search"})]),_:1})]),H("div",Vt,[d(P,{name:"notifications",size:"32px"})])])]),H("div",jt,[d(s)])]),_:1})]),_:1})]),_:1})}var ia=xt(Qt,[["render",Nt],["__scopeId","data-v-3cf4ac5d"]]);export{ia as default};
