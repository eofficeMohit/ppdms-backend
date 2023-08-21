var Q=typeof globalThis<"u"?globalThis:typeof window<"u"?window:typeof global<"u"?global:typeof self<"u"?self:{};function T(e){return e&&e.__esModule&&Object.prototype.hasOwnProperty.call(e,"default")?e.default:e}var m={},D={get exports(){return m},set exports(e){m=e}},r={},y=Symbol.for("react.element"),V=Symbol.for("react.portal"),A=Symbol.for("react.fragment"),F=Symbol.for("react.strict_mode"),U=Symbol.for("react.profiler"),q=Symbol.for("react.provider"),L=Symbol.for("react.context"),M=Symbol.for("react.forward_ref"),N=Symbol.for("react.suspense"),z=Symbol.for("react.memo"),B=Symbol.for("react.lazy"),R=Symbol.iterator;function H(e){return null===e||"object"!=typeof e?null:"function"==typeof(e=R&&e[R]||e["@@iterator"])?e:null}var C={isMounted:function(){return!1},enqueueForceUpdate:function(){},enqueueReplaceState:function(){},enqueueSetState:function(){}},g=Object.assign,j={};function p(e,t,r){this.props=e,this.context=t,this.refs=j,this.updater=r||C}function O(){}function S(e,t,r){this.props=e,this.context=t,this.refs=j,this.updater=r||C}p.prototype.isReactComponent={},p.prototype.setState=function(e,t){if("object"!=typeof e&&"function"!=typeof e&&null!=e)throw Error("setState(...): takes an object of state variables to update or a function which returns an object of state variables.");this.updater.enqueueSetState(this,e,t,"setState")},p.prototype.forceUpdate=function(e){this.updater.enqueueForceUpdate(this,e,"forceUpdate")},O.prototype=p.prototype;var w=S.prototype=new O;w.constructor=S,g(w,p.prototype),w.isPureReactComponent=!0;var k=Array.isArray,x=Object.prototype.hasOwnProperty,E={current:null},P={key:!0,ref:!0,__self:!0,__source:!0};function I(e,t,r){var n,o={},u=null,a=null;if(null!=t)for(n in void 0!==t.ref&&(a=t.ref),void 0!==t.key&&(u=""+t.key),t)x.call(t,n)&&!P.hasOwnProperty(n)&&(o[n]=t[n]);var c=arguments.length-2;if(1===c)o.children=r;else if(1<c){for(var l=Array(c),f=0;f<c;f++)l[f]=arguments[f+2];o.children=l}if(e&&e.defaultProps)for(n in c=e.defaultProps)void 0===o[n]&&(o[n]=c[n]);return{$$typeof:y,type:e,key:u,ref:a,props:o,_owner:E.current}}function G(e,t){return{$$typeof:y,type:e.type,key:t,ref:e.ref,props:e.props,_owner:e._owner}}function b(e){return"object"==typeof e&&null!==e&&e.$$typeof===y}function W(e){var t={"=":"=0",":":"=2"};return"$"+e.replace(/[=:]/g,(function(e){return t[e]}))}var $=/\/+/g;function v(e,t){return"object"==typeof e&&null!==e&&null!=e.key?W(""+e.key):t.toString(36)}function _(e,t,r,n,o){var u=typeof e;("undefined"===u||"boolean"===u)&&(e=null);var a=!1;if(null===e)a=!0;else switch(u){case"string":case"number":a=!0;break;case"object":switch(e.$$typeof){case y:case V:a=!0}}if(a)return o=o(a=e),e=""===n?"."+v(a,0):n,k(o)?(r="",null!=e&&(r=e.replace($,"$&/")+"/"),_(o,t,r,"",(function(e){return e}))):null!=o&&(b(o)&&(o=G(o,r+(!o.key||a&&a.key===o.key?"":(""+o.key).replace($,"$&/")+"/")+e)),t.push(o)),1;if(a=0,n=""===n?".":n+":",k(e))for(var c=0;c<e.length;c++){var l=n+v(u=e[c],c);a+=_(u,t,r,l,o)}else if("function"==typeof(l=H(e)))for(e=l.call(e),c=0;!(u=e.next()).done;)a+=_(u=u.value,t,r,l=n+v(u,c++),o);else if("object"===u)throw t=String(e),Error("Objects are not valid as a React child (found: "+("[object Object]"===t?"object with keys {"+Object.keys(e).join(", ")+"}":t)+"). If you meant to render a collection of children, use an array instead.");return a}function d(e,t,r){if(null==e)return e;var n=[],o=0;return _(e,n,"","",(function(e){return t.call(r,e,o++)})),n}function J(e){if(-1===e._status){var t=e._result;(t=t()).then((function(t){(0===e._status||-1===e._status)&&(e._status=1,e._result=t)}),(function(t){(0===e._status||-1===e._status)&&(e._status=2,e._result=t)})),-1===e._status&&(e._status=0,e._result=t)}if(1===e._status)return e._result.default;throw e._result}var l={current:null},h={transition:null},K={ReactCurrentDispatcher:l,ReactCurrentBatchConfig:h,ReactCurrentOwner:E};r.Children={map:d,forEach:function(e,t,r){d(e,(function(){t.apply(this,arguments)}),r)},count:function(e){var t=0;return d(e,(function(){t++})),t},toArray:function(e){return d(e,(function(e){return e}))||[]},only:function(e){if(!b(e))throw Error("React.Children.only expected to receive a single React element child.");return e}},r.Component=p,r.Fragment=A,r.Profiler=U,r.PureComponent=S,r.StrictMode=F,r.Suspense=N,r.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED=K,r.cloneElement=function(e,t,r){if(null==e)throw Error("React.cloneElement(...): The argument must be a React element, but you passed "+e+".");var n=g({},e.props),o=e.key,u=e.ref,a=e._owner;if(null!=t){if(void 0!==t.ref&&(u=t.ref,a=E.current),void 0!==t.key&&(o=""+t.key),e.type&&e.type.defaultProps)var c=e.type.defaultProps;for(l in t)x.call(t,l)&&!P.hasOwnProperty(l)&&(n[l]=void 0===t[l]&&void 0!==c?c[l]:t[l])}var l=arguments.length-2;if(1===l)n.children=r;else if(1<l){c=Array(l);for(var f=0;f<l;f++)c[f]=arguments[f+2];n.children=c}return{$$typeof:y,type:e.type,key:o,ref:u,props:n,_owner:a}},r.createContext=function(e){return(e={$$typeof:L,_currentValue:e,_currentValue2:e,_threadCount:0,Provider:null,Consumer:null,_defaultValue:null,_globalName:null}).Provider={$$typeof:q,_context:e},e.Consumer=e},r.createElement=I,r.createFactory=function(e){var t=I.bind(null,e);return t.type=e,t},r.createRef=function(){return{current:null}},r.forwardRef=function(e){return{$$typeof:M,render:e}},r.isValidElement=b,r.lazy=function(e){return{$$typeof:B,_payload:{_status:-1,_result:e},_init:J}},r.memo=function(e,t){return{$$typeof:z,type:e,compare:void 0===t?null:t}},r.startTransition=function(e){var t=h.transition;h.transition={};try{e()}finally{h.transition=t}},r.unstable_act=function(){throw Error("act(...) is not supported in production builds of React.")},r.useCallback=function(e,t){return l.current.useCallback(e,t)},r.useContext=function(e){return l.current.useContext(e)},r.useDebugValue=function(){},r.useDeferredValue=function(e){return l.current.useDeferredValue(e)},r.useEffect=function(e,t){return l.current.useEffect(e,t)},r.useId=function(){return l.current.useId()},r.useImperativeHandle=function(e,t,r){return l.current.useImperativeHandle(e,t,r)},r.useInsertionEffect=function(e,t){return l.current.useInsertionEffect(e,t)},r.useLayoutEffect=function(e,t){return l.current.useLayoutEffect(e,t)},r.useMemo=function(e,t){return l.current.useMemo(e,t)},r.useReducer=function(e,t,r){return l.current.useReducer(e,t,r)},r.useRef=function(e){return l.current.useRef(e)},r.useState=function(e){return l.current.useState(e)},r.useSyncExternalStore=function(e,t,r){return l.current.useSyncExternalStore(e,t,r)},r.useTransition=function(){return l.current.useTransition()},r.version="18.2.0",D.exports=r;const Y=T(m);export{Y as R,Q as c,T as g,m as r};