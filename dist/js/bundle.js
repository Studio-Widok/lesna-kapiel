(function(){function r(e,n,t){function o(i,f){if(!n[i]){if(!e[i]){var c="function"==typeof require&&require;if(!f&&c)return c(i,!0);if(u)return u(i,!0);var a=new Error("Cannot find module '"+i+"'");throw a.code="MODULE_NOT_FOUND",a}var p=n[i]={exports:{}};e[i][0].call(p.exports,function(r){var n=e[i][1][r];return o(n||r)},p,p.exports,r,e,n,t)}return n[i].exports}for(var u="function"==typeof require&&require,i=0;i<t.length;i++)o(t[i]);return o}return r})()({1:[function(require,module,exports){
/* MIT https://github.com/fabiospampinato/cash */
(function(){
"use strict";

var propMap = {
  /* GENERAL */
  "class": 'className',
  contenteditable: 'contentEditable',

  /* LABEL */
  "for": 'htmlFor',

  /* INPUT */
  readonly: 'readOnly',
  maxlength: 'maxLength',
  tabindex: 'tabIndex',

  /* TABLE */
  colspan: 'colSpan',
  rowspan: 'rowSpan',

  /* IMAGE */
  usemap: 'useMap'
};

function attempt(fn, arg) {
  try {
    return fn(arg);
  } catch (_a) {
    return arg;
  }
}

var doc = document,
    win = window,
    docEle = doc.documentElement,
    createElement = doc.createElement.bind(doc),
    div = createElement('div'),
    table = createElement('table'),
    tbody = createElement('tbody'),
    tr = createElement('tr'),
    isArray = Array.isArray,
    ArrayPrototype = Array.prototype,
    concat = ArrayPrototype.concat,
    filter = ArrayPrototype.filter,
    indexOf = ArrayPrototype.indexOf,
    map = ArrayPrototype.map,
    push = ArrayPrototype.push,
    slice = ArrayPrototype.slice,
    some = ArrayPrototype.some,
    splice = ArrayPrototype.splice;
var idRe = /^#(?:[\w-]|\\.|[^\x00-\xa0])*$/,
    classRe = /^\.(?:[\w-]|\\.|[^\x00-\xa0])*$/,
    htmlRe = /<.+>/,
    tagRe = /^\w+$/; // @require ./variables.ts

function find(selector, context) {
  return !selector || !isDocument(context) && !isElement(context) ? [] : classRe.test(selector) ? context.getElementsByClassName(selector.slice(1)) : tagRe.test(selector) ? context.getElementsByTagName(selector) : context.querySelectorAll(selector);
} // @require ./find.ts
// @require ./variables.ts


var Cash =
/** @class */
function () {
  function Cash(selector, context) {
    if (!selector) return;
    if (isCash(selector)) return selector;
    var eles = selector;

    if (isString(selector)) {
      var ctx = (isCash(context) ? context[0] : context) || doc;
      eles = idRe.test(selector) ? ctx.getElementById(selector.slice(1)) : htmlRe.test(selector) ? parseHTML(selector) : find(selector, ctx);
      if (!eles) return;
    } else if (isFunction(selector)) {
      return this.ready(selector); //FIXME: `fn.ready` is not included in `core`, but it's actually a core functionality
    }

    if (eles.nodeType || eles === win) eles = [eles];
    this.length = eles.length;

    for (var i = 0, l = this.length; i < l; i++) {
      this[i] = eles[i];
    }
  }

  Cash.prototype.init = function (selector, context) {
    return new Cash(selector, context);
  };

  return Cash;
}();

var fn = Cash.prototype,
    cash = fn.init;
cash.fn = cash.prototype = fn; // Ensuring that `cash () instanceof cash`

fn.length = 0;
fn.splice = splice; // Ensuring a cash collection gets printed as array-like in Chrome's devtools

if (typeof Symbol === 'function') {
  // Ensuring a cash collection is iterable
  fn[Symbol['iterator']] = ArrayPrototype[Symbol['iterator']];
}

fn.map = function (callback) {
  return cash(concat.apply([], map.call(this, function (ele, i) {
    return callback.call(ele, i, ele);
  })));
};

fn.slice = function (start, end) {
  return cash(slice.call(this, start, end));
}; // @require ./cash.ts


var dashAlphaRe = /-([a-z])/g;

function camelCase(str) {
  return str.replace(dashAlphaRe, function (match, letter) {
    return letter.toUpperCase();
  });
}

function each(arr, callback, _reverse) {
  if (_reverse) {
    var i = arr.length;

    while (i--) {
      if (callback.call(arr[i], i, arr[i]) === false) return arr;
    }
  } else {
    for (var i = 0, l = arr.length; i < l; i++) {
      if (callback.call(arr[i], i, arr[i]) === false) return arr;
    }
  }

  return arr;
}

cash.each = each;

fn.each = function (callback) {
  return each(this, callback);
};

fn.removeProp = function (prop) {
  return this.each(function (i, ele) {
    delete ele[propMap[prop] || prop];
  });
};

function extend(target) {
  var objs = [];

  for (var _i = 1; _i < arguments.length; _i++) {
    objs[_i - 1] = arguments[_i];
  }

  var length = arguments.length;
  if (!length) return {};
  if (length === 1) return extend(cash, target);

  for (var i = 1; i < length; i++) {
    for (var key in arguments[i]) {
      target[key] = arguments[i][key];
    }
  }

  return target;
}

cash.extend = extend;

fn.extend = function (plugins) {
  return extend(fn, plugins);
};

cash.guid = 1; // @require ./cash.ts

function matches(ele, selector) {
  var matches = ele && (ele['matches'] || ele['webkitMatchesSelector'] || ele['msMatchesSelector']);
  return !!matches && !!selector && matches.call(ele, selector);
}

function isCash(x) {
  return x instanceof Cash;
}

function isWindow(x) {
  return !!x && x === x.window;
}

function isDocument(x) {
  return !!x && x.nodeType === 9;
}

function isElement(x) {
  return !!x && x.nodeType === 1;
}

function isFunction(x) {
  return typeof x === 'function';
}

function isString(x) {
  return typeof x === 'string';
}

function isUndefined(x) {
  return x === undefined;
}

function isNull(x) {
  return x === null;
}

function isNumeric(x) {
  return !isNaN(parseFloat(x)) && isFinite(x);
}

cash.isWindow = isWindow;
cash.isFunction = isFunction;
cash.isNumeric = isNumeric;
cash.isArray = isArray;

fn.prop = function (prop, value) {
  if (!prop) return;

  if (isString(prop)) {
    prop = propMap[prop] || prop;
    if (arguments.length < 2) return this[0] && this[0][prop];
    return this.each(function (i, ele) {
      ele[prop] = value;
    });
  }

  for (var key in prop) {
    this.prop(key, prop[key]);
  }

  return this;
};

fn.get = function (index) {
  if (isUndefined(index)) return slice.call(this);
  index = Number(index);
  return this[index < 0 ? index + this.length : index];
};

fn.eq = function (index) {
  return cash(this.get(index));
};

fn.first = function () {
  return this.eq(0);
};

fn.last = function () {
  return this.eq(-1);
}; // @require ./matches.ts
// @require ./type_checking.ts


function getCompareFunction(comparator) {
  return isString(comparator) ? function (i, ele) {
    return matches(ele, comparator);
  } : isFunction(comparator) ? comparator : isCash(comparator) ? function (i, ele) {
    return comparator.is(ele);
  } : !comparator ? function () {
    return false;
  } : function (i, ele) {
    return ele === comparator;
  };
}

fn.filter = function (comparator) {
  var compare = getCompareFunction(comparator);
  return cash(filter.call(this, function (ele, i) {
    return compare.call(ele, i, ele);
  }));
}; // @require collection/filter.ts


function filtered(collection, comparator) {
  return !comparator ? collection : collection.filter(comparator);
} // @require ./type_checking.ts


var splitValuesRe = /\S+/g;

function getSplitValues(str) {
  return isString(str) ? str.match(splitValuesRe) || [] : [];
}

fn.hasClass = function (cls) {
  return !!cls && some.call(this, function (ele) {
    return isElement(ele) && ele.classList.contains(cls);
  });
};

fn.removeAttr = function (attr) {
  var attrs = getSplitValues(attr);
  return this.each(function (i, ele) {
    if (!isElement(ele)) return;
    each(attrs, function (i, a) {
      ele.removeAttribute(a);
    });
  });
};

function attr(attr, value) {
  if (!attr) return;

  if (isString(attr)) {
    if (arguments.length < 2) {
      if (!this[0] || !isElement(this[0])) return;
      var value_1 = this[0].getAttribute(attr);
      return isNull(value_1) ? undefined : value_1;
    }

    if (isUndefined(value)) return this;
    if (isNull(value)) return this.removeAttr(attr);
    return this.each(function (i, ele) {
      if (!isElement(ele)) return;
      ele.setAttribute(attr, value);
    });
  }

  for (var key in attr) {
    this.attr(key, attr[key]);
  }

  return this;
}

fn.attr = attr;

fn.toggleClass = function (cls, force) {
  var classes = getSplitValues(cls),
      isForce = !isUndefined(force);
  return this.each(function (i, ele) {
    if (!isElement(ele)) return;
    each(classes, function (i, c) {
      if (isForce) {
        force ? ele.classList.add(c) : ele.classList.remove(c);
      } else {
        ele.classList.toggle(c);
      }
    });
  });
};

fn.addClass = function (cls) {
  return this.toggleClass(cls, true);
};

fn.removeClass = function (cls) {
  if (arguments.length) return this.toggleClass(cls, false);
  return this.attr('class', '');
};

function pluck(arr, prop, deep, until) {
  var plucked = [],
      isCallback = isFunction(prop),
      compare = until && getCompareFunction(until);

  for (var i = 0, l = arr.length; i < l; i++) {
    if (isCallback) {
      var val_1 = prop(arr[i]);
      if (val_1.length) push.apply(plucked, val_1);
    } else {
      var val_2 = arr[i][prop];

      while (val_2 != null) {
        if (until && compare(-1, val_2)) break;
        plucked.push(val_2);
        val_2 = deep ? val_2[prop] : null;
      }
    }
  }

  return plucked;
}

function unique(arr) {
  return arr.length > 1 ? filter.call(arr, function (item, index, self) {
    return indexOf.call(self, item) === index;
  }) : arr;
}

cash.unique = unique;

fn.add = function (selector, context) {
  return cash(unique(this.get().concat(cash(selector, context).get())));
}; // @require core/type_checking.ts
// @require core/variables.ts


function computeStyle(ele, prop, isVariable) {
  if (!isElement(ele)) return;
  var style = win.getComputedStyle(ele, null);
  return isVariable ? style.getPropertyValue(prop) || undefined : style[prop] || ele.style[prop];
} // @require ./compute_style.ts


function computeStyleInt(ele, prop) {
  return parseInt(computeStyle(ele, prop), 10) || 0;
}

var cssVariableRe = /^--/; // @require ./variables.ts

function isCSSVariable(prop) {
  return cssVariableRe.test(prop);
} // @require core/camel_case.ts
// @require core/cash.ts
// @require core/each.ts
// @require core/variables.ts
// @require ./is_css_variable.ts


var prefixedProps = {},
    style = div.style,
    vendorsPrefixes = ['webkit', 'moz', 'ms'];

function getPrefixedProp(prop, isVariable) {
  if (isVariable === void 0) {
    isVariable = isCSSVariable(prop);
  }

  if (isVariable) return prop;

  if (!prefixedProps[prop]) {
    var propCC = camelCase(prop),
        propUC = "" + propCC[0].toUpperCase() + propCC.slice(1),
        props = (propCC + " " + vendorsPrefixes.join(propUC + " ") + propUC).split(' ');
    each(props, function (i, p) {
      if (p in style) {
        prefixedProps[prop] = p;
        return false;
      }
    });
  }

  return prefixedProps[prop];
}

; // @require core/type_checking.ts
// @require ./is_css_variable.ts

var numericProps = {
  animationIterationCount: true,
  columnCount: true,
  flexGrow: true,
  flexShrink: true,
  fontWeight: true,
  gridArea: true,
  gridColumn: true,
  gridColumnEnd: true,
  gridColumnStart: true,
  gridRow: true,
  gridRowEnd: true,
  gridRowStart: true,
  lineHeight: true,
  opacity: true,
  order: true,
  orphans: true,
  widows: true,
  zIndex: true
};

function getSuffixedValue(prop, value, isVariable) {
  if (isVariable === void 0) {
    isVariable = isCSSVariable(prop);
  }

  return !isVariable && !numericProps[prop] && isNumeric(value) ? value + "px" : value;
}

function css(prop, value) {
  if (isString(prop)) {
    var isVariable_1 = isCSSVariable(prop);
    prop = getPrefixedProp(prop, isVariable_1);
    if (arguments.length < 2) return this[0] && computeStyle(this[0], prop, isVariable_1);
    if (!prop) return this;
    value = getSuffixedValue(prop, value, isVariable_1);
    return this.each(function (i, ele) {
      if (!isElement(ele)) return;

      if (isVariable_1) {
        ele.style.setProperty(prop, value);
      } else {
        ele.style[prop] = value;
      }
    });
  }

  for (var key in prop) {
    this.css(key, prop[key]);
  }

  return this;
}

;
fn.css = css; // @optional ./css.ts
// @require core/attempt.ts
// @require core/camel_case.ts

var JSONStringRe = /^\s+|\s+$/;

function getData(ele, key) {
  var value = ele.dataset[key] || ele.dataset[camelCase(key)];
  if (JSONStringRe.test(value)) return value;
  return attempt(JSON.parse, value);
} // @require core/attempt.ts
// @require core/camel_case.ts


function setData(ele, key, value) {
  value = attempt(JSON.stringify, value);
  ele.dataset[camelCase(key)] = value;
}

function data(name, value) {
  if (!name) {
    if (!this[0]) return;
    var datas = {};

    for (var key in this[0].dataset) {
      datas[key] = getData(this[0], key);
    }

    return datas;
  }

  if (isString(name)) {
    if (arguments.length < 2) return this[0] && getData(this[0], name);
    if (isUndefined(value)) return this;
    return this.each(function (i, ele) {
      setData(ele, name, value);
    });
  }

  for (var key in name) {
    this.data(key, name[key]);
  }

  return this;
}

fn.data = data; // @optional ./data.ts

function getDocumentDimension(doc, dimension) {
  var docEle = doc.documentElement;
  return Math.max(doc.body["scroll" + dimension], docEle["scroll" + dimension], doc.body["offset" + dimension], docEle["offset" + dimension], docEle["client" + dimension]);
} // @require css/helpers/compute_style_int.ts


function getExtraSpace(ele, xAxis) {
  return computeStyleInt(ele, "border" + (xAxis ? 'Left' : 'Top') + "Width") + computeStyleInt(ele, "padding" + (xAxis ? 'Left' : 'Top')) + computeStyleInt(ele, "padding" + (xAxis ? 'Right' : 'Bottom')) + computeStyleInt(ele, "border" + (xAxis ? 'Right' : 'Bottom') + "Width");
}

each([true, false], function (i, outer) {
  each(['Width', 'Height'], function (i, prop) {
    var name = "" + (outer ? 'outer' : 'inner') + prop;

    fn[name] = function (includeMargins) {
      if (!this[0]) return;
      if (isWindow(this[0])) return outer ? this[0]["inner" + prop] : this[0].document.documentElement["client" + prop];
      if (isDocument(this[0])) return getDocumentDimension(this[0], prop);
      return this[0]["" + (outer ? 'offset' : 'client') + prop] + (includeMargins && outer ? computeStyleInt(this[0], "margin" + (i ? 'Top' : 'Left')) + computeStyleInt(this[0], "margin" + (i ? 'Bottom' : 'Right')) : 0);
    };
  });
});
each(['Width', 'Height'], function (index, prop) {
  var propLC = prop.toLowerCase();

  fn[propLC] = function (value) {
    if (!this[0]) return isUndefined(value) ? undefined : this;

    if (!arguments.length) {
      if (isWindow(this[0])) return this[0].document.documentElement["client" + prop];
      if (isDocument(this[0])) return getDocumentDimension(this[0], prop);
      return this[0].getBoundingClientRect()[propLC] - getExtraSpace(this[0], !index);
    }

    var valueNumber = parseInt(value, 10);
    return this.each(function (i, ele) {
      if (!isElement(ele)) return;
      var boxSizing = computeStyle(ele, 'boxSizing');
      ele.style[propLC] = getSuffixedValue(propLC, valueNumber + (boxSizing === 'border-box' ? getExtraSpace(ele, !index) : 0));
    });
  };
}); // @optional ./inner_outer.ts
// @optional ./normal.ts
// @require css/helpers/compute_style.ts

var defaultDisplay = {};

function getDefaultDisplay(tagName) {
  if (defaultDisplay[tagName]) return defaultDisplay[tagName];
  var ele = createElement(tagName);
  doc.body.insertBefore(ele, null);
  var display = computeStyle(ele, 'display');
  doc.body.removeChild(ele);
  return defaultDisplay[tagName] = display !== 'none' ? display : 'block';
} // @require css/helpers/compute_style.ts


function isHidden(ele) {
  return computeStyle(ele, 'display') === 'none';
}

var displayProperty = '___cd';

fn.toggle = function (force) {
  return this.each(function (i, ele) {
    if (!isElement(ele)) return;
    var show = isUndefined(force) ? isHidden(ele) : force;

    if (show) {
      ele.style.display = ele[displayProperty] || '';

      if (isHidden(ele)) {
        ele.style.display = getDefaultDisplay(ele.tagName);
      }
    } else {
      ele[displayProperty] = computeStyle(ele, 'display');
      ele.style.display = 'none';
    }
  });
};

fn.hide = function () {
  return this.toggle(false);
};

fn.show = function () {
  return this.toggle(true);
}; // @optional ./hide.ts
// @optional ./show.ts
// @optional ./toggle.ts


function hasNamespaces(ns1, ns2) {
  return !ns2 || !some.call(ns2, function (ns) {
    return ns1.indexOf(ns) < 0;
  });
}

var eventsNamespace = '___ce',
    eventsNamespacesSeparator = '.',
    eventsFocus = {
  focus: 'focusin',
  blur: 'focusout'
},
    eventsHover = {
  mouseenter: 'mouseover',
  mouseleave: 'mouseout'
},
    eventsMouseRe = /^(mouse|pointer|contextmenu|drag|drop|click|dblclick)/i; // @require ./variables.ts

function getEventNameBubbling(name) {
  return eventsHover[name] || eventsFocus[name] || name;
} // @require ./variables.ts


function getEventsCache(ele) {
  return ele[eventsNamespace] = ele[eventsNamespace] || {};
} // @require core/guid.ts
// @require events/helpers/get_events_cache.ts


function addEvent(ele, name, namespaces, selector, callback) {
  var eventCache = getEventsCache(ele);
  eventCache[name] = eventCache[name] || [];
  eventCache[name].push([namespaces, selector, callback]);
  ele.addEventListener(name, callback);
} // @require ./variables.ts


function parseEventName(eventName) {
  var parts = eventName.split(eventsNamespacesSeparator);
  return [parts[0], parts.slice(1).sort()]; // [name, namespace[]]
} // @require ./get_events_cache.ts
// @require ./has_namespaces.ts
// @require ./parse_event_name.ts


function removeEvent(ele, name, namespaces, selector, callback) {
  var cache = getEventsCache(ele);

  if (!name) {
    for (name in cache) {
      removeEvent(ele, name, namespaces, selector, callback);
    }
  } else if (cache[name]) {
    cache[name] = cache[name].filter(function (_a) {
      var ns = _a[0],
          sel = _a[1],
          cb = _a[2];
      if (callback && cb.guid !== callback.guid || !hasNamespaces(ns, namespaces) || selector && selector !== sel) return true;
      ele.removeEventListener(name, cb);
    });
  }
}

fn.off = function (eventFullName, selector, callback) {
  var _this = this;

  if (isUndefined(eventFullName)) {
    this.each(function (i, ele) {
      if (!isElement(ele) && !isDocument(ele) && !isWindow(ele)) return;
      removeEvent(ele);
    });
  } else if (!isString(eventFullName)) {
    for (var key in eventFullName) {
      this.off(key, eventFullName[key]);
    }
  } else {
    if (isFunction(selector)) {
      callback = selector;
      selector = '';
    }

    each(getSplitValues(eventFullName), function (i, eventFullName) {
      var _a = parseEventName(eventFullName),
          nameOriginal = _a[0],
          namespaces = _a[1],
          name = getEventNameBubbling(nameOriginal);

      _this.each(function (i, ele) {
        if (!isElement(ele) && !isDocument(ele) && !isWindow(ele)) return;
        removeEvent(ele, name, namespaces, selector, callback);
      });
    });
  }

  return this;
};

function on(eventFullName, selector, data, callback, _one) {
  var _this = this;

  if (!isString(eventFullName)) {
    for (var key in eventFullName) {
      this.on(key, selector, data, eventFullName[key], _one);
    }

    return this;
  }

  if (!isString(selector)) {
    if (isUndefined(selector) || isNull(selector)) {
      selector = '';
    } else if (isUndefined(data)) {
      data = selector;
      selector = '';
    } else {
      callback = data;
      data = selector;
      selector = '';
    }
  }

  if (!isFunction(callback)) {
    callback = data;
    data = undefined;
  }

  if (!callback) return this;
  each(getSplitValues(eventFullName), function (i, eventFullName) {
    var _a = parseEventName(eventFullName),
        nameOriginal = _a[0],
        namespaces = _a[1],
        name = getEventNameBubbling(nameOriginal),
        isEventHover = nameOriginal in eventsHover,
        isEventFocus = nameOriginal in eventsFocus;

    if (!name) return;

    _this.each(function (i, ele) {
      if (!isElement(ele) && !isDocument(ele) && !isWindow(ele)) return;

      var finalCallback = function finalCallback(event) {
        if (event.target["___i" + event.type]) return event.stopImmediatePropagation(); // Ignoring native event in favor of the upcoming custom one

        if (event.namespace && !hasNamespaces(namespaces, event.namespace.split(eventsNamespacesSeparator))) return;
        if (!selector && (isEventFocus && (event.target !== ele || event.___ot === name) || isEventHover && event.relatedTarget && ele.contains(event.relatedTarget))) return;
        var thisArg = ele;

        if (selector) {
          var target = event.target;

          while (!matches(target, selector)) {
            if (target === ele) return;
            target = target.parentNode;
            if (!target) return;
          }

          thisArg = target;
          event.___cd = true; // Delegate
        }

        if (event.___cd) {
          Object.defineProperty(event, 'currentTarget', {
            configurable: true,
            get: function get() {
              return thisArg;
            }
          });
        }

        Object.defineProperty(event, 'data', {
          configurable: true,
          get: function get() {
            return data;
          }
        });
        var returnValue = callback.call(thisArg, event, event.___td);

        if (_one) {
          removeEvent(ele, name, namespaces, selector, finalCallback);
        }

        if (returnValue === false) {
          event.preventDefault();
          event.stopPropagation();
        }
      };

      finalCallback.guid = callback.guid = callback.guid || cash.guid++;
      addEvent(ele, name, namespaces, selector, finalCallback);
    });
  });
  return this;
}

fn.on = on;

function one(eventFullName, selector, data, callback) {
  return this.on(eventFullName, selector, data, callback, true);
}

;
fn.one = one;

fn.ready = function (callback) {
  var cb = function cb() {
    return setTimeout(callback, 0, cash);
  };

  if (doc.readyState !== 'loading') {
    cb();
  } else {
    doc.addEventListener('DOMContentLoaded', cb);
  }

  return this;
};

fn.trigger = function (event, data) {
  if (isString(event)) {
    var _a = parseEventName(event),
        nameOriginal = _a[0],
        namespaces = _a[1],
        name_1 = getEventNameBubbling(nameOriginal);

    if (!name_1) return this;
    var type = eventsMouseRe.test(name_1) ? 'MouseEvents' : 'HTMLEvents';
    event = doc.createEvent(type);
    event.initEvent(name_1, true, true);
    event.namespace = namespaces.join(eventsNamespacesSeparator);
    event.___ot = nameOriginal;
  }

  event.___td = data;
  var isEventFocus = event.___ot in eventsFocus;
  return this.each(function (i, ele) {
    if (isEventFocus && isFunction(ele[event.___ot])) {
      ele["___i" + event.type] = true; // Ensuring the native event is ignored

      ele[event.___ot]();

      ele["___i" + event.type] = false; // Ensuring the custom event is not ignored
    }

    ele.dispatchEvent(event);
  });
}; // @optional ./off.ts
// @optional ./on.ts
// @optional ./one.ts
// @optional ./ready.ts
// @optional ./trigger.ts
// @require core/pluck.ts
// @require core/variables.ts


function getValue(ele) {
  if (ele.multiple && ele.options) return pluck(filter.call(ele.options, function (option) {
    return option.selected && !option.disabled && !option.parentNode.disabled;
  }), 'value');
  return ele.value || '';
}

var queryEncodeSpaceRe = /%20/g,
    queryEncodeCRLFRe = /\r?\n/g;

function queryEncode(prop, value) {
  return "&" + encodeURIComponent(prop) + "=" + encodeURIComponent(value.replace(queryEncodeCRLFRe, '\r\n')).replace(queryEncodeSpaceRe, '+');
}

var skippableRe = /file|reset|submit|button|image/i,
    checkableRe = /radio|checkbox/i;

fn.serialize = function () {
  var query = '';
  this.each(function (i, ele) {
    each(ele.elements || [ele], function (i, ele) {
      if (ele.disabled || !ele.name || ele.tagName === 'FIELDSET' || skippableRe.test(ele.type) || checkableRe.test(ele.type) && !ele.checked) return;
      var value = getValue(ele);

      if (!isUndefined(value)) {
        var values = isArray(value) ? value : [value];
        each(values, function (i, value) {
          query += queryEncode(ele.name, value);
        });
      }
    });
  });
  return query.slice(1);
};

function val(value) {
  if (!arguments.length) return this[0] && getValue(this[0]);
  return this.each(function (i, ele) {
    var isSelect = ele.multiple && ele.options;

    if (isSelect || checkableRe.test(ele.type)) {
      var eleValue_1 = isArray(value) ? map.call(value, String) : isNull(value) ? [] : [String(value)];

      if (isSelect) {
        each(ele.options, function (i, option) {
          option.selected = eleValue_1.indexOf(option.value) >= 0;
        }, true);
      } else {
        ele.checked = eleValue_1.indexOf(ele.value) >= 0;
      }
    } else {
      ele.value = isUndefined(value) || isNull(value) ? '' : value;
    }
  });
}

fn.val = val;

fn.clone = function () {
  return this.map(function (i, ele) {
    return ele.cloneNode(true);
  });
};

fn.detach = function (comparator) {
  filtered(this, comparator).each(function (i, ele) {
    if (ele.parentNode) {
      ele.parentNode.removeChild(ele);
    }
  });
  return this;
};

var fragmentRe = /^\s*<(\w+)[^>]*>/,
    singleTagRe = /^<(\w+)\s*\/?>(?:<\/\1>)?$/;
var containers = {
  '*': div,
  tr: tbody,
  td: tr,
  th: tr,
  thead: table,
  tbody: table,
  tfoot: table
}; //TODO: Create elements inside a document fragment, in order to prevent inline event handlers from firing
//TODO: Ensure the created elements have the fragment as their parent instead of null, this also ensures we can deal with detatched nodes more reliably

function parseHTML(html) {
  if (!isString(html)) return [];
  if (singleTagRe.test(html)) return [createElement(RegExp.$1)];
  var fragment = fragmentRe.test(html) && RegExp.$1,
      container = containers[fragment] || containers['*'];
  container.innerHTML = html;
  return cash(container.childNodes).detach().get();
}

cash.parseHTML = parseHTML;

fn.empty = function () {
  return this.each(function (i, ele) {
    while (ele.firstChild) {
      ele.removeChild(ele.firstChild);
    }
  });
};

function html(html) {
  if (!arguments.length) return this[0] && this[0].innerHTML;
  if (isUndefined(html)) return this;
  return this.each(function (i, ele) {
    if (!isElement(ele)) return;
    ele.innerHTML = html;
  });
}

fn.html = html;

fn.remove = function (comparator) {
  filtered(this, comparator).detach().off();
  return this;
};

function text(text) {
  if (isUndefined(text)) return this[0] ? this[0].textContent : '';
  return this.each(function (i, ele) {
    if (!isElement(ele)) return;
    ele.textContent = text;
  });
}

;
fn.text = text;

fn.unwrap = function () {
  this.parent().each(function (i, ele) {
    if (ele.tagName === 'BODY') return;
    var $ele = cash(ele);
    $ele.replaceWith($ele.children());
  });
  return this;
};

fn.offset = function () {
  var ele = this[0];
  if (!ele) return;
  var rect = ele.getBoundingClientRect();
  return {
    top: rect.top + win.pageYOffset,
    left: rect.left + win.pageXOffset
  };
};

fn.offsetParent = function () {
  return this.map(function (i, ele) {
    var offsetParent = ele.offsetParent;

    while (offsetParent && computeStyle(offsetParent, 'position') === 'static') {
      offsetParent = offsetParent.offsetParent;
    }

    return offsetParent || docEle;
  });
};

fn.position = function () {
  var ele = this[0];
  if (!ele) return;
  var isFixed = computeStyle(ele, 'position') === 'fixed',
      offset = isFixed ? ele.getBoundingClientRect() : this.offset();

  if (!isFixed) {
    var doc_1 = ele.ownerDocument;
    var offsetParent = ele.offsetParent || doc_1.documentElement;

    while ((offsetParent === doc_1.body || offsetParent === doc_1.documentElement) && computeStyle(offsetParent, 'position') === 'static') {
      offsetParent = offsetParent.parentNode;
    }

    if (offsetParent !== ele && isElement(offsetParent)) {
      var parentOffset = cash(offsetParent).offset();
      offset.top -= parentOffset.top + computeStyleInt(offsetParent, 'borderTopWidth');
      offset.left -= parentOffset.left + computeStyleInt(offsetParent, 'borderLeftWidth');
    }
  }

  return {
    top: offset.top - computeStyleInt(ele, 'marginTop'),
    left: offset.left - computeStyleInt(ele, 'marginLeft')
  };
};

fn.children = function (comparator) {
  return filtered(cash(unique(pluck(this, function (ele) {
    return ele.children;
  }))), comparator);
};

fn.contents = function () {
  return cash(unique(pluck(this, function (ele) {
    return ele.tagName === 'IFRAME' ? [ele.contentDocument] : ele.tagName === 'TEMPLATE' ? ele.content.childNodes : ele.childNodes;
  })));
};

fn.find = function (selector) {
  return cash(unique(pluck(this, function (ele) {
    return find(selector, ele);
  })));
}; // @require core/variables.ts
// @require collection/filter.ts
// @require traversal/find.ts


var HTMLCDATARe = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g,
    scriptTypeRe = /^$|^module$|\/(java|ecma)script/i,
    scriptAttributes = ['type', 'src', 'nonce', 'noModule'];

function evalScripts(node, doc) {
  var collection = cash(node);
  collection.filter('script').add(collection.find('script')).each(function (i, ele) {
    if (scriptTypeRe.test(ele.type) && docEle.contains(ele)) {
      // The script type is supported // The element is attached to the DOM // Using `documentElement` for broader browser support
      var script_1 = createElement('script');
      script_1.text = ele.textContent.replace(HTMLCDATARe, '');
      each(scriptAttributes, function (i, attr) {
        if (ele[attr]) script_1[attr] = ele[attr];
      });
      doc.head.insertBefore(script_1, null);
      doc.head.removeChild(script_1);
    }
  });
} // @require ./eval_scripts.ts


function insertElement(anchor, target, left, inside, evaluate) {
  if (inside) {
    // prepend/append
    anchor.insertBefore(target, left ? anchor.firstChild : null);
  } else {
    // before/after
    anchor.parentNode.insertBefore(target, left ? anchor : anchor.nextSibling);
  }

  if (evaluate) {
    evalScripts(target, anchor.ownerDocument);
  }
} // @require ./insert_element.ts


function insertSelectors(selectors, anchors, inverse, left, inside, reverseLoop1, reverseLoop2, reverseLoop3) {
  each(selectors, function (si, selector) {
    each(cash(selector), function (ti, target) {
      each(cash(anchors), function (ai, anchor) {
        var anchorFinal = inverse ? target : anchor,
            targetFinal = inverse ? anchor : target,
            indexFinal = inverse ? ti : ai;
        insertElement(anchorFinal, !indexFinal ? targetFinal : targetFinal.cloneNode(true), left, inside, !indexFinal);
      }, reverseLoop3);
    }, reverseLoop2);
  }, reverseLoop1);
  return anchors;
}

fn.after = function () {
  return insertSelectors(arguments, this, false, false, false, true, true);
};

fn.append = function () {
  return insertSelectors(arguments, this, false, false, true);
};

fn.appendTo = function (selector) {
  return insertSelectors(arguments, this, true, false, true);
};

fn.before = function () {
  return insertSelectors(arguments, this, false, true);
};

fn.insertAfter = function (selector) {
  return insertSelectors(arguments, this, true, false, false, false, false, true);
};

fn.insertBefore = function (selector) {
  return insertSelectors(arguments, this, true, true);
};

fn.prepend = function () {
  return insertSelectors(arguments, this, false, true, true, true, true);
};

fn.prependTo = function (selector) {
  return insertSelectors(arguments, this, true, true, true, false, false, true);
};

fn.replaceWith = function (selector) {
  return this.before(selector).remove();
};

fn.replaceAll = function (selector) {
  cash(selector).replaceWith(this);
  return this;
};

fn.wrapAll = function (selector) {
  var structure = cash(selector),
      wrapper = structure[0];

  while (wrapper.children.length) {
    wrapper = wrapper.firstElementChild;
  }

  this.first().before(structure);
  return this.appendTo(wrapper);
};

fn.wrap = function (selector) {
  return this.each(function (i, ele) {
    var wrapper = cash(selector)[0];
    cash(ele).wrapAll(!i ? wrapper : wrapper.cloneNode(true));
  });
};

fn.wrapInner = function (selector) {
  return this.each(function (i, ele) {
    var $ele = cash(ele),
        contents = $ele.contents();
    contents.length ? contents.wrapAll(selector) : $ele.append(selector);
  });
};

fn.has = function (selector) {
  var comparator = isString(selector) ? function (i, ele) {
    return find(selector, ele).length;
  } : function (i, ele) {
    return ele.contains(selector);
  };
  return this.filter(comparator);
};

fn.is = function (comparator) {
  var compare = getCompareFunction(comparator);
  return some.call(this, function (ele, i) {
    return compare.call(ele, i, ele);
  });
};

fn.next = function (comparator, _all, _until) {
  return filtered(cash(unique(pluck(this, 'nextElementSibling', _all, _until))), comparator);
};

fn.nextAll = function (comparator) {
  return this.next(comparator, true);
};

fn.nextUntil = function (until, comparator) {
  return this.next(comparator, true, until);
};

fn.not = function (comparator) {
  var compare = getCompareFunction(comparator);
  return this.filter(function (i, ele) {
    return (!isString(comparator) || isElement(ele)) && !compare.call(ele, i, ele);
  });
};

fn.parent = function (comparator) {
  return filtered(cash(unique(pluck(this, 'parentNode'))), comparator);
};

fn.index = function (selector) {
  var child = selector ? cash(selector)[0] : this[0],
      collection = selector ? this : cash(child).parent().children();
  return indexOf.call(collection, child);
};

fn.closest = function (comparator) {
  var filtered = this.filter(comparator);
  if (filtered.length) return filtered;
  var $parent = this.parent();
  if (!$parent.length) return filtered;
  return $parent.closest(comparator);
};

fn.parents = function (comparator, _until) {
  return filtered(cash(unique(pluck(this, 'parentElement', true, _until))), comparator);
};

fn.parentsUntil = function (until, comparator) {
  return this.parents(comparator, until);
};

fn.prev = function (comparator, _all, _until) {
  return filtered(cash(unique(pluck(this, 'previousElementSibling', _all, _until))), comparator);
};

fn.prevAll = function (comparator) {
  return this.prev(comparator, true);
};

fn.prevUntil = function (until, comparator) {
  return this.prev(comparator, true, until);
};

fn.siblings = function (comparator) {
  return filtered(cash(unique(pluck(this, function (ele) {
    return cash(ele).parent().children().not(ele);
  }))), comparator);
}; // @optional ./children.ts
// @optional ./closest.ts
// @optional ./contents.ts
// @optional ./find.ts
// @optional ./has.ts
// @optional ./is.ts
// @optional ./next.ts
// @optional ./next_all.ts
// @optional ./next_until.ts
// @optional ./not.ts
// @optional ./parent.ts
// @optional ./parents.ts
// @optional ./parents_until.ts
// @optional ./prev.ts
// @optional ./prev_all.ts
// @optional ./prev_until.ts
// @optional ./siblings.ts
// @optional attributes/index.ts
// @optional collection/index.ts
// @optional css/index.ts
// @optional data/index.ts
// @optional dimensions/index.ts
// @optional effects/index.ts
// @optional events/index.ts
// @optional forms/index.ts
// @optional manipulation/index.ts
// @optional offset/index.ts
// @optional traversal/index.ts
// @require core/index.ts
// @priority -100
// @require ./cash.ts
// @require ./variables.ts


if (typeof exports !== 'undefined') {
  // Node.js
  module.exports = cash;
} else {
  // Browser
  win['cash'] = win['$'] = cash;
}
})();
},{}],2:[function(require,module,exports){
const $ = require('cash-dom');
const createScrollItem = require('./widok-scrollItem.js');
const widok = require('./widok.js');

const fixedLink = $('.fixed-link');
const fixedLinkContainer = $('.fixed-link-container');

const fixedOrAbs = (scrollItem, isLayoutChange = false) => {
  const currentFixedLink = scrollItem.options.currentFixedLink;
  const currentFixedLinkH = scrollItem.options.currentFixedLinkH;
  const currentFixedLinkW = scrollItem.options.currentFixedLinkW;
  if (
    scrollItem.offset + currentFixedLinkH + widok.em > widok.s + widok.h ||
    scrollItem.offset + scrollItem.height < widok.s + widok.h
  ) {
    if (isLayoutChange || scrollItem.options.isFixed) {
      scrollItem.options.isFixed = false;
      currentFixedLink.removeClass('fixed');
      if (scrollItem.offset + scrollItem.height < widok.s + widok.h) {
        currentFixedLink.css({
          top: scrollItem.height - currentFixedLinkW - widok.em,
          bottom: 'auto',
        });
      } else if (
        scrollItem.offset + currentFixedLinkH + widok.em >
        widok.s + widok.h
      ) {
        currentFixedLink.css({
          bottom: 'auto',
          top: currentFixedLinkH - currentFixedLinkW,
        });
      }
    }
  } else {
    if (isLayoutChange || !scrollItem.options.isFixed) {
      scrollItem.options.isFixed = true;
      currentFixedLink.addClass('fixed');
      currentFixedLink.css({
        bottom: '1em',
        top: 'auto',
      });
    }
  }
};

$.each(fixedLinkContainer, (index, e) => {
  const currentFixedLink = $(fixedLink[index]);
  const item = createScrollItem(e, {
    onScroll: scrollItem => fixedOrAbs(scrollItem),
    isFixed: false,
    currentFixedLink,
    currentFixedLinkH: currentFixedLink.height(),
    currentFixedLinkW: currentFixedLink.width(),
  });

  item._onResize = () => {
    Object.getPrototypeOf(item)._onResize.call(item);
    item.options.currentFixedLinkH = item.options.currentFixedLink.height();
    item.options.currentFixedLinkW = item.options.currentFixedLink.width();
    fixedOrAbs(item, true);
  };
});

},{"./widok-scrollItem.js":7,"./widok.js":10,"cash-dom":1}],3:[function(require,module,exports){
const $ = require('cash-dom');
require('./nav');
require('./widok');
require('./sliders');

if ($('.fixed-link').length > 0) require('./fixed-link');

},{"./fixed-link":2,"./nav":4,"./sliders":5,"./widok":10,"cash-dom":1}],4:[function(require,module,exports){
const $ = require('cash-dom');

$('#burger').on('click', () => {
  $('#nav').toggleClass('opened');
});

},{"cash-dom":1}],5:[function(require,module,exports){
const $ = require('cash-dom');
const createSlider = require('./widok-slider');

$('.slider-with-bullets').each((index, element) => {
  createSlider({
    wrap: `#slider-with-bullets-${index} .slider`,
    bulletContainer: `#slider-with-bullets-${index} .bullets-container`,
    bulletSelector: `#slider-with-bullets-${index} .bullet`,
    useKeys: true,
    touchDrag: true,
    arrowPrev: `#slider-with-bullets-${index} .arrow-left`,
    arrowNext: `#slider-with-bullets-${index} .arrow-right`,
  });
});

createSlider({
  wrap: `.collections-slider .slider`,
  useKeys: true,
  touchDrag: true,
  // arrowPrev: `.slider-with-bullets .arrow-left`,
  // arrowNext: `.slider-with-bullets .arrow-right`,
});

},{"./widok-slider":8,"cash-dom":1}],6:[function(require,module,exports){
const $ = require('cash-dom');

const createHoverable = (function () {
  class Hoverable {
    constructor(element) {
      this.element = $(element);
      this.hasHoveredClass = false;
      this.isTouched = false;

      this.element.on({
        mouseenter: this.activate.bind(this),
        mouseleave: this.deactivate.bind(this),
        touchstart: () => {
          this.isTouched = true;
          clearTimeout(this.timeout);
          this.deactivate();
        },
        touchend: () => {
          clearTimeout(this.timeout);
          this.timeout = setTimeout(() => {
            this.isTouched = false;
          }, 100);
        },
      });
    }

    activate() {
      if (this.hasHoveredClass) return;
      if (this.isTouched) return;
      this.element.addClass('hovered');
      this.hasHoveredClass = true;
    }

    deactivate() {
      if (!this.hasHoveredClass) return;
      this.element.removeClass('hovered');
      this.hasHoveredClass = false;
    }
  }

  return function (options) {
    return new Hoverable(options);
  };
})();

if (typeof module !== 'undefined') module.exports = createHoverable;

},{"cash-dom":1}],7:[function(require,module,exports){
/**
 * create new scroll item
 * @param {selector} element element to scroll
 * @param {object} options extra options
 * @param {function} options.onScroll function(scrollItem)
 * @param {function} options.onStateChange function(prop, value, scrollItem)
 * @param {bool} options.addClasses = false; Adds classes like `.isOnScreen`
 * @returns {object} scrollItem
 */

const $ = require('cash-dom');
const widok = require('./widok');

const createScrollItem = (function () {
  class ScrollItem {
    constructor(element, options) {
      this.element = $(element);
      this.offset = 0;
      this.height = 0;
      this.addClasses = options.addClasses;
      this.isAboveScreen = false;
      this.isCrossingScreenTop = false;
      this.isCrossingScreenBottom = false;
      this.isBelowScreen = false;
      this.isOnScreen = false;
      this.options = options;
      this.onStateChange = this.options.onStateChange;
      this.onScroll = this.options.onScroll;
    }
    _onResize() {
      this.offset = this.element.offset().top;
      this.height = this.element.outerHeight();
      this._onScroll();
    }
    _onScroll() {
      this.checkScreenRelation();
      if (this.onScroll !== undefined) {
        this.onScroll.call(this, this);
      }
    }
    checkScreenRelation() {
      if (this.offset + this.height < widok.s) {
        this.setPropClass('AboveScreen', true);
        this.setPropClass('CrossingScreenTop', false);
        this.setPropClass('CrossingScreenBottom', false);
        this.setPropClass('BelowScreen', false);
        this.setPropClass('OnScreen', false);
        return;
      }
      if (this.offset > widok.s + widok.h) {
        this.setPropClass('AboveScreen', false);
        this.setPropClass('CrossingScreenTop', false);
        this.setPropClass('CrossingScreenBottom', false);
        this.setPropClass('BelowScreen', true);
        this.setPropClass('OnScreen', false);
        return;
      }
      this.setPropClass('AboveScreen', false);
      this.setPropClass('BelowScreen', false);
      this.setPropClass('OnScreen', true);
      this.setPropClass(
        'CrossingScreenTop',
        this.offset < widok.s && this.offset + this.height > widok.s
      );
      this.setPropClass(
        'CrossingScreenBottom',
        this.offset < widok.s + widok.h &&
          this.offset + this.height > widok.s + widok.h
      );
    }
    setPropClass(prop, value) {
      if (this['is' + prop] !== value) {
        this['is' + prop] = value;
        if (this.addClasses) {
          if (value) this.element.addClass(prop);
          else this.element.removeClass(prop);
        }
        if (this.onStateChange !== void 0) {
          this.onStateChange.call(this, prop, value, this);
        }
      }
    }
    screenPos(heightOffset) {
      if (heightOffset === void 0) heightOffset = 0;
      return (this.offset + this.height * heightOffset - widok.s) / widok.h;
    }
  }

  const scrollItemCollection = [];

  window.addEventListener('afterLayoutChange', function () {
    scrollItemCollection.map(function (e) {
      e._onResize();
    });
  });

  window.addEventListener('scroll', function () {
    scrollItemCollection.map(function (e) {
      e._onScroll();
    });
  });

  return function (element, options) {
    if (options === undefined) options = {};
    const scrollItem = new ScrollItem(element, options);
    scrollItemCollection.push(scrollItem);
    return scrollItem;
  };
})();

if (typeof module !== 'undefined') module.exports = createScrollItem;

},{"./widok":10,"cash-dom":1}],8:[function(require,module,exports){
/**
 * Create a slider. Vertical slider might not work yet.
 * @param {object} options extra options
 * @param {selector} options.wrap selector of the slider wrap
 * @param {selector} options.slideSelector default='.single-slide', selector of a single slide, searched inside wrap
 * @param {boolean} options.shouldHaveBullets default=true,
 * @param {selector} options.bulletContainer
 * @param {selector} options.bulletSelector
 * @param {boolean} options.isVertical default=false, direction of the slider
 * @param {number} options.initialSlide default=0, id of the initially selected slide
 * @param {number} options.duration default=300, duration of the sliding animation
 * @param {boolean} options.mouseDrag default=false, allows slider to be dragged with the mouse
 * @param {boolean} options.touchDrag default=false, allows slider to be dragged on a touchscreen
 * @param {boolean} options.slideOnWheel default=false,
 * @param {boolean} options.useKeys default=false, changes slides on arrow keys, can be changed later
 * @param {selector} options.arrowPrev selector of the up arrow, searched in the whole document
 * @param {selector} options.arrowNext analogous
 * @param {function} options.onActivate callback to be called when a slide activates
 * @param {function} options.onDeactivate analogous
 * @param {boolean} options.loop default=false
 * @param {string} options.animationType default="slide", 'fade' - fade effect
 * @param {boolean} options.slidesAsLinks default=false, clicking on a slide activates it
 * @param {boolean} options.adjustHeight default=false, after switching slides the height of the slider is changed
 * @returns Slider object
 */

const $ = require('cash-dom');
const createHoverable = require('./widok-hoverable');

const createSlider = (function () {
  class Slider {
    constructor(options) {
      this.id = ++Slider.lastId;
      this.wrap = $(options.wrap);
      if (this.wrap.length !== 1) return;

      this.prepareOptions(options);
      this.currentSlideId = this.options.initialSlide; // id of the current slide
      this.slideOffset = 0; // number of pixels from current slide beginning
      this.position = 0; // current scroll amount in pixels
      this.barSize = 0; // size of the entire scroll bar
      this.size = 0; // size of the sizer element
      this.isSliding = false; // is slider currently being animated
      this.isDragged = false; // is slider currently being dragged
      this.isEnabled = options.isEnabled;
      if (this.isEnabled === undefined) this.isEnabled = true;

      this.prepareArrows();
      this.prepareSlides();
      this.prepareWheel();
      this.prepareDrag();

      this.checkSize = this.checkSize.bind(this);
      this.onMouseMove = this.onMouseMove.bind(this);
      this.endMouseMove = this.endMouseMove.bind(this);
      window.addEventListener('layoutChange', this.checkSize);

      if (this.options.loop) {
        this.currentSlideId = this.slides.length / 3;
        this.applyPosition();
      }

      this.slides[this.currentSlideId].activate();
    }

    prepareOptions(options) {
      this.options = {
        slideOnWheel: false,
        shouldHaveBullets: true,
        slideSelector: '.single-slide',
        isVertical: false,
        initialSlide: 0,
        duration: 300,
        mouseDrag: false,
        touchDrag: false,
        useKeys: false,
        loop: false,
        slidesAsLinks: false,
        adjustHeight: false,
        animationType: 'slide',
      };
      for (const optionName in options) {
        this.options[optionName] = options[optionName];
      }
    }

    prepareSlides() {
      this.sizer = $('<div class="f3-slider-sizer">')
        .css({
          position: 'relative',
          height: '100%',
          margin: '0 auto',
        })
        .appendTo(this.wrap);
      this.bar = $('<div class="f3-slider-bar">').appendTo(this.sizer);
      this.slides = [];

      if (this.options.shouldHaveBullets) {
        if (this.options.bulletContainer === undefined) {
          this.bulletContainer = $(document.createElement('div'))
            .addClass('f3-slider-bullet-container')
            .appendTo(this.wrap)
            .on('touchstart', event => {
              if (!this.isEnabled) return;
              event.stopPropagation();
            });
        } else {
          this.bulletContainer = $(this.options.bulletContainer);
        }
      }

      const foundSlides = this.wrap.find(this.options.slideSelector);
      if (this.options.loop) {
        foundSlides.clone().map((index, element) => {
          let slide = new Slide(element, this);
          slide.element.appendTo(this.bar);
          this.slides.push(slide);
        });
        foundSlides.clone().map((index, element) => {
          let slide = new Slide(element, this);
          slide.element.appendTo(this.bar);
          this.slides.push(slide);
        });
      }
      foundSlides.map((index, element) => {
        let slide = new Slide(element, this);
        slide.element.appendTo(this.bar);
        this.slides.push(slide);
      });

      this.slides.forEach(slide => slide.createBullet());

      this.wrap.css({
        position: 'relative',
        overflow: 'hidden',
      });
      this.bar.css({
        position: 'absolute',
        height: 100 + '%',
        width: 100 + '%',
        left: 0,
      });
      if (!this.options.isVertical) {
        const weightSum = this.slides.reduce(
          (prev, curr) => prev + curr.weight,
          0
        );
        this.bar.css({
          width: weightSum * 100 + '%',
          display: 'flex',
          alignItems: 'flex-start',
        });
        this.slides.map(slide =>
          slide.element.css({
            width: (100 * slide.weight) / weightSum + '%',
          })
        );
      }
    }

    prepareArrows() {
      this.isArrowPrevActive = true;
      this.isArrowNextActive = true;
      this.arrowPrev = $(this.options.arrowPrev);
      this.arrowNext = $(this.options.arrowNext);
      if (this.options.arrowNext === undefined) {
        this.arrowNext = this.wrap.find('.arrow-next');
      }
      if (this.options.arrowPrev === undefined) {
        this.arrowPrev = this.wrap.find('.arrow-prev');
      }

      if (this.arrowNext.length > 0) {
        this.arrowNext.on({
          click: this.nextSlide.bind(this),
          touchstart: event => event.stopPropagation(),
        });
        createHoverable(this.arrowNext);
      }
      if (this.arrowPrev.length > 0) {
        this.arrowPrev.on({
          click: this.prevSlide.bind(this),
          touchstart: event => event.stopPropagation(),
        });
        createHoverable(this.arrowPrev);
      }
      $(window).on('keydown', event => {
        if (!this.options.useKeys) return;
        if (
          (!this.options.isVertical && event.which === 39) ||
          (this.options.isVertical && event.which === 40)
        ) {
          this.nextSlide();
        } else if (
          (!this.options.isVertical && event.which === 37) ||
          (this.options.isVertical && event.which === 38)
        ) {
          this.prevSlide();
        }
      });
    }

    prepareWheel() {
      if (this.options.slideOnWheel) {
        this.wrap.on('wheel', event => {
          if (!this.isEnabled) return;

          event.stopPropagation();
          event.preventDefault();
          if (this.isSliding) return;

          if (event.deltaY > 0) {
            const slideBottom = this.slides[this.currentSlideId].size;
            const wrapBottom = this.size - this.slideOffset;
            if (slideBottom <= wrapBottom + 1) {
              this.nextSlide();
            } else {
              this.slideOffset = Math.max(
                this.slideOffset - 150,
                -this.slides[this.currentSlideId].size + this.size
              );
              this.applyPosition();
            }
          } else if (event.deltaY < 0) {
            if (0 <= this.slideOffset + 1) {
              this.prevSlide();
            } else {
              this.slideOffset = Math.min(this.slideOffset + 150, 0);
              this.applyPosition();
            }
          }
        });
      }
    }

    prepareDrag() {
      if (this.options.touchDrag) {
        this.endDrag = this.endDrag.bind(this);
        this.onDrag = this.onDrag.bind(this);
        this.wrap.on('touchstart', event => {
          if (!this.isEnabled) return;
          // TODO: add an option to switch this
          // event.preventDefault();
          if (this.isSliding) return;
          this.dragStart = {
            x: event.changedTouches[0].pageX,
            y: event.changedTouches[0].pageY,
          };
          this.onMoveStart();
          window.addEventListener('touchend', this.endDrag);
          window.addEventListener('touchmove', this.onDrag);
        });
      }
      if (this.options.mouseDrag) {
        this.wrap.on('mousedown', event => {
          if (!this.isEnabled) return;
          event.preventDefault();
          if (this.isSliding) return;
          this.dragStart = {
            x: event.pageX,
            y: event.pageY,
          };
          this.onMoveStart();
          window.addEventListener('mouseup', this.endMouseMove);
          window.addEventListener('mousemove', this.onMouseMove);
        });
      }
    }

    onMoveStart() {
      this.isDragged = true;
      this.lastDrag = {
        lastSaveId: 0,
        values: [
          {
            x: this.dragStart.x,
            y: this.dragStart.y,
          },
        ],
      };
    }

    onDrag(event) {
      const currentPos = {
        x: event.changedTouches[0].pageX,
        y: event.changedTouches[0].pageY,
      };
      this.onMove(currentPos);
    }

    onMouseMove(event) {
      const currentPos = {
        x: event.pageX,
        y: event.pageY,
      };
      this.onMove(currentPos);
    }

    onMove(currentPos) {
      this.lastDrag.lastSaveId = (this.lastDrag.lastSaveId + 1) % 10;
      this.lastDrag.values[this.lastDrag.lastSaveId] = currentPos;
      const axis = this.options.isVertical ? 'y' : 'x';
      const diff = currentPos[axis] - this.dragStart[axis];
      this.position =
        this.slides[this.currentSlideId].offset - diff - this.slideOffset / 2;

      if (this.options.isVertical) {
        this.bar.css({
          top: -this.position,
        });
      } else {
        this.bar.css({
          left: -this.position,
        });
      }
    }

    endDrag(event) {
      const dragEnd = {
        x: event.changedTouches[0].pageX,
        y: event.changedTouches[0].pageY,
      };
      this.endMove(dragEnd);
      window.removeEventListener('touchend', this.endDrag);
      window.removeEventListener('touchmove', this.onDrag);
    }

    endMouseMove(event) {
      const dragEnd = {
        x: event.pageX,
        y: event.pageY,
      };
      this.endMove(dragEnd);
      window.removeEventListener('mouseup', this.endMouseMove);
      window.removeEventListener('mousemove', this.onMouseMove);
    }

    endMove(dragEnd) {
      const partNeededToSlide = 1 / 100;
      this.isDragged = false;
      const axis = this.options.isVertical ? 'y' : 'x';

      let currentPos = this.slides[this.currentSlideId].offset;
      currentPos -= dragEnd[axis] - this.dragStart[axis];

      const applyFoundSlide = found => {
        this.currentSlideId = found;
        this.slideOffset = 0;
      };

      // previous position
      if (dragEnd[axis] > this.dragStart[axis]) {
        let found = 0;
        for (let i = 0; i < this.slides.length; i++) {
          const slideCenter = this.slides[i].offset + this.slides[i].size / 2;
          const wrapStart = currentPos - this.slideOffset / 2;

          if (slideCenter > wrapStart) {
            found = i;
            break;
          }
        }

        const isSlidedEnoughToChange = () => {
          const slidedAmount = dragEnd[axis] - this.dragStart[axis];
          const amountNedeedToSlide =
            this.slides[this.currentSlideId].size * partNeededToSlide;
          return slidedAmount > amountNedeedToSlide;
        };

        if (this.currentSlideId === found) {
          if (isSlidedEnoughToChange() && found > 0) applyFoundSlide(found - 1);
        } else applyFoundSlide(found);
      }

      // next position
      else if (dragEnd[axis] < this.dragStart[axis]) {
        let found = this.slides.length - 1;
        for (let i = 0; i < this.slides.length; i++) {
          const slideCenter = this.slides[i].offset + this.slides[i].size / 2;
          const wrapEnd = currentPos - this.slideOffset / 2 + this.size;
          if (slideCenter > wrapEnd) {
            found = Math.max(i - 1, 0);
            break;
          }
        }

        const isSlidedEnoughToChange = () => {
          const slidedAmount = this.dragStart[axis] - dragEnd[axis];
          const amountNedeedToSlide =
            this.slides[this.currentSlideId].size * partNeededToSlide;
          return slidedAmount > amountNedeedToSlide;
        };

        if (this.currentSlideId === found) {
          if (isSlidedEnoughToChange() && found + 1 < this.slides.length)
            applyFoundSlide(found + 1);
        } else applyFoundSlide(found);
      }

      this.applyPosition();
    }

    checkSize() {
      if (this.options.isVertical) {
        this.size = this.sizer.height();
      } else {
        this.size = this.sizer.width();
      }
      this.slideOffset = 0;
      this.barSize = 0;
      this.gutter =
        this.slides[0].element.outerWidth(true) -
        this.slides[0].element.outerWidth();

      const sliderOffset = this.isVertical
        ? this.bar.offset().top
        : this.bar.offset().left;
      this.slides.map(slide => {
        this.barSize += slide.checkSize(sliderOffset);
      });
      this.applyPosition(0);

      if (!this.isVertical) {
        const maxHeight = this.slides.reduce(
          (prev, curr) => Math.max(prev, curr.element[0].scrollHeight),
          0
        );
        if (this.options.adjustHeight) {
          this.wrap.css({
            height: this.slides[this.currentSlideId].element[0].scrollHeight,
          });
        } else {
          this.wrap.css({
            height: maxHeight,
          });
        }
      }
    }

    prevSlide() {
      if (this.currentSlideId <= 0) return;
      if (this.isSliding) return;
      this.currentSlideId--;
      this.slideOffset = 0;
      this.applyPosition();
    }

    nextSlide() {
      if (this.currentSlideId >= this.slides.length - 1) return;
      if (this.isSliding) return;
      this.currentSlideId++;
      this.slideOffset = 0;
      this.applyPosition();
    }

    applyPosition(duration) {
      const adjustPosition = () => {
        if (this.options.loop) {
          const trueLength = this.slides.length / 3;
          let isAdjusted = false;
          if (this.currentSlideId < trueLength) {
            this.currentSlideId += trueLength;
            isAdjusted = true;
          } else if (this.currentSlideId >= 2 * trueLength) {
            this.currentSlideId -= trueLength;
            isAdjusted = true;
          }
          if (isAdjusted) {
            this.wrap.addClass('adjusting');
            this.applyPosition(0);
            setTimeout(() => {
              this.wrap.removeClass('adjusting');
            }, 100);
          }
        }
      };
      this.isSliding = true;
      if (duration === undefined) {
        duration = this.options.duration;
      }
      this.slideOffset = this.size - this.slides[this.currentSlideId].size;
      this.position =
        this.slides[this.currentSlideId].offset - this.slideOffset / 2;

      this.slides.forEach((slide, index) => {
        if (index < this.currentSlideId) slide.markAsPrev();
        else if (index > this.currentSlideId) slide.markAsNext();
        else slide.activate();
      });
      this.handleArrows();

      let css;
      if (this.options.animationType === 'fade') {
        css = {
          transition: `opacity ${duration / 2 / 1000}s`,
          opacity: 0,
        };
      } else {
        css = {
          transition: `${duration / 1000}s`,
        };
      }

      this.bar.css(css);

      if (this.options.isVertical) {
        css.top = -this.position;
      } else {
        css.left = -this.position;
      }

      if (this.options.animationType === 'fade') {
        setTimeout(() => {
          this.bar.css(css);
          this.bar.css({
            opacity: 1,
          });
          this.isSliding = false;

          // adjust the position if slider needs to loop
          adjustPosition();
        }, duration / 2);
      } else {
        this.bar.css(css);
        setTimeout(() => {
          this.bar.css({
            transition: 'none',
          });
          this.isSliding = false;

          // adjust the position if slider needs to loop
          adjustPosition();
        }, duration);
      }
      setTimeout(() => {
        if (this.options.adjustHeight) {
          this.wrap.css({
            height: this.slides[this.currentSlideId].element[0].scrollHeight,
          });
        }
      }, duration);
    }

    handleArrows() {
      if (this.currentSlideId === this.slides.length - 1) {
        if (this.isArrowNextActive) {
          this.arrowNext.addClass('disabled');
          this.isArrowNextActive = false;
        }
      } else if (!this.isArrowNextActive) {
        this.arrowNext.removeClass('disabled');
        this.isArrowNextActive = true;
      }

      if (this.currentSlideId === 0) {
        if (this.isArrowPrevActive) {
          this.arrowPrev.addClass('disabled');
          this.isArrowPrevActive = false;
        }
      } else if (!this.isArrowPrevActive) {
        this.arrowPrev.removeClass('disabled');
        this.isArrowPrevActive = true;
      }
    }
  }
  Slider.lastId = -1;

  class Slide {
    constructor(element, slider) {
      this.element = $(element);
      if (this.element.length !== 1) return;

      this.content = $('<div class="single-slide-content">')
        .append(this.element.children())
        .appendTo(this.element);

      this.slider = slider;
      this.weight = this.element.data('weight');
      if (this.weight === undefined) this.weight = 1;
      this.id = this.slider.slides.length;
      this.realId = this.id;
      this.directionToActive = undefined;
      this.size = 0;
      this.offset = 0;

      if (this.slider.options.slidesAsLinks) {
        this.element.on('click', () => {
          if (this.directionToActive === 0) return;
          if (this.slider.isSliding) return;
          this.goTo();
        });
      }
    }

    createBullet() {
      if (this.slider.bulletContainer) {
        if (this.slider.options.loop) {
          if (this.id >= (2 * this.slider.slides.length) / 3) {
            this.realId -= (this.slider.slides.length / 3) * 2;
          } else if (this.id >= this.slider.slides.length / 3) {
            this.realId -= this.slider.slides.length / 3;
          }
        }
        if (
          !this.slider.options.loop ||
          (this.id >= this.slider.slides.length / 3 &&
            this.id < (2 * this.slider.slides.length) / 3)
        ) {
          this.bullet = new Bullet(this.slider, this);
        } else {
          this.bulletLink = {
            isLink: true,
            target: this.slider.slides[
              this.realId + this.slider.slides.length / 3
            ],
          };
        }
      }
    }

    checkSize(sliderOffset) {
      if (this.slider.isVertical) {
        this.offset = this.element.offset().top - sliderOffset;
        this.size = this.content.outerHeight(true);
      } else {
        this.offset = this.element.offset().left - sliderOffset;
        this.size = this.content.outerWidth(true);
      }

      return this.size;
    }

    goTo() {
      this.slider.currentSlideId = this.id;
      this.slider.applyPosition();
    }

    activate() {
      if (this.directionToActive !== 0) {
        if (this.bullet !== undefined) this.bullet.element.addClass('active');
        else if (this.bulletLink !== undefined) {
          this.bulletLink.target.bullet.element.addClass('active');
        }
        this.element.addClass('active').removeClass('slide-prev slide-next');
        this.directionToActive = 0;
        if (this.slider.options.onActivate !== undefined) {
          this.slider.options.onActivate.call(this, this, this.slider);
        }
      }
    }

    deactivate() {
      if (
        this.directionToActive === 0 ||
        this.directionToActive === undefined
      ) {
        this.bullet && this.bullet.element.removeClass('active');
        this.element.removeClass('active');
        if (this.slider.options.onDeactivate !== undefined) {
          this.slider.options.onDeactivate.call(this, this, this.slider);
        }
      }
    }

    markAsPrev() {
      this.deactivate();
      if (this.directionToActive >= 0 || this.directionToActive === undefined) {
        this.element.removeClass('slide-next').addClass('slide-prev');
        this.directionToActive = -1;
      }
    }

    markAsNext() {
      this.deactivate();
      if (this.directionToActive <= 0 || this.directionToActive === undefined) {
        this.element.removeClass('slide-prev').addClass('slide-next');
        this.directionToActive = 1;
      }
    }
  }

  class Bullet {
    constructor(slider, slide, dummy) {
      this.slider = slider;
      this.slide = slide;
      if (this.slider.options.bulletSelector === undefined) {
        this.element = $(document.createElement('div'))
          .addClass('f3-slider-bullet')
          .appendTo(this.slider.bulletContainer);
      } else {
        this.element = this.slider.bulletContainer
          .find(this.slider.options.bulletSelector)
          .eq(this.slide.realId);
      }
      this.element.on('click', this.slide.goTo.bind(this.slide));
      createHoverable(this.element);
    }
  }

  return function (options) {
    return new Slider(options);
  };
})();

if (typeof module !== 'undefined') module.exports = createSlider;

},{"./widok-hoverable":6,"cash-dom":1}],9:[function(require,module,exports){
function throttle(ms, callback) {
  let lastCall = 0;
  let timeout;
  return a => {
    const now = new Date().getTime();
    if (now - lastCall >= ms) {
      lastCall = now;
      callback(a);
    } else {
      clearTimeout(timeout);
      timeout = setTimeout((a => callback.bind(this, a))(a), ms);
    }
  };
}

if (typeof module !== 'undefined') module.exports = throttle;

},{}],10:[function(require,module,exports){
const $ = require('cash-dom');
const throttle = require('./widok-throttle');

const widok = {
  h: 0,
  w: 0,
  s: 0,
  em: 0,
  sizeCheck: () => {
    widok.h = $(window).height();
    widok.w = $(window).width();
    widok.em = parseFloat($('body').css('font-size'));
    window.dispatchEvent(new CustomEvent('layoutChange'));
    widok.scrollCheck();
    window.dispatchEvent(new CustomEvent('afterLayoutChange'));
  },
  scrollCheck: () => {
    widok.s = window.scrollY;
  },
};

$(window).on({
  resize: throttle(100, widok.sizeCheck),
  load: widok.sizeCheck,
  scroll: widok.scrollCheck,
});

$(document).on('ready', widok.sizeCheck);

if (typeof module !== 'undefined') module.exports = widok;

},{"./widok-throttle":9,"cash-dom":1}]},{},[3])

//# sourceMappingURL=bundle.js.map
