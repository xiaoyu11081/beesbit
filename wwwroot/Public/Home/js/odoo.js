! function(t, e) {
  "object" == typeof exports && "object" == typeof module ? module.exports = e() : "function" == typeof define && define.amd ? define([], e) : "object" == typeof exports ? exports.odoo = e() : t.odoo = e()
}(this, function() {
  return function(t) {
    function e(a) {
      if (r[a]) return r[a].exports;
      var n = r[a] = {
        exports: {},
        id: a,
        loaded: !1
      };
      return t[a].call(n.exports, n, n.exports, e), n.loaded = !0, n.exports
    }
    var r = {};
    return e.m = t, e.c = r, e.p = "/", e(0)
  }([function(t, e, r) {
    "use strict";

    function a(t) {
      return t && t.__esModule ? t : {
        "default": t
      }
    }
    Object.defineProperty(e, "__esModule", {
      value: !0
    });
    var n = r(2);
    Object.defineProperty(e, "default", {
      enumerable: !0,
      get: function() {
        return a(n)["default"]
      }
    })
  }, function(t, e) {
    "use strict";
    Object.defineProperty(e, "__esModule", {
      value: !0
    }), e["default"] = function(t) {
      var e = void 0,
        r = function a(r) {
          e = requestAnimationFrame(a), t(r)
        };
      return r(0),
        function() {
          return cancelAnimationFrame(e)
        }
    }
  }, function(t, e, r) {
    "use strict";

    function a(t) {
      return t && t.__esModule ? t : {
        "default": t
      }
    }
    Object.defineProperty(e, "__esModule", {
      value: !0
    });
    var n = r(1),
      l = a(n),
      o = r(5),
      i = r(10),
      u = a(i),
      c = 10,
      f = 3,
      d = function(t, e, r, a) {
        var n, l = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 0],
          i = (n = o.append.call(t, "g"), o.attr).call(n, "id", "digit-" + a);
        return l.forEach(function(t, n) {
          var l;
          (l = (l = (l = (l = o.append.call(i, "text"), o.attr).call(l, "y", -n * e * r), o.style).call(l, "font-size", e + "px"), o.style).call(l, "filter", "url(#motionFilter-" + a + ")"), o.text).call(l, t)
        }), i
      },
      s = function(t, e, r) {
        var a;
        return (a = (a = (a = o.append.call(t, "g"), o.append).call(a, "text"), o.style).call(a, "font-size", r + "px"), o.text).call(a, e)
      },
      p = function(t, e) {
        var r;
        return (r = (r = (r = (r = (r = (r = (r = o.append.call(t, "filter"), o.attr).call(r, "id", "motionFilter-" + e), o.attr).call(r, "width", "300%"), o.attr).call(r, "x", "-100%"), o.append).call(r, "feGaussianBlur"), o.attr).call(r, "class", "blurValues"), o.attr).call(r, "in", "SourceGraphic"), o.attr).call(r, "stdDeviation", "0 0")
      },
      v = function(t) {
        var e;
        return (e = (e = (e = (e = (e = (e = (e = (e = (e = (e = (e = (e = (e = (e = (e = (e = (e = (e = (e = (e = (e = (e = (e = (e = o.append.call(t, "linearGradient"), o.attr).call(e, "id", "gradient"), o.attr).call(e, "x1", "0%"), o.attr).call(e, "y1", "0%"), o.attr).call(e, "x2", "0%"), o.attr).call(e, "y2", "100%"), o.append).call(e, "stop"), o.attr).call(e, "offset", "0"), o.attr).call(e, "stop-color", "white"), o.attr).call(e, "stop-opacity", "0"), o.select).call(e, "#gradient"), o.append).call(e, "stop"), o.attr).call(e, "offset", "0.2"), o.attr).call(e, "stop-color", "white"), o.attr).call(e, "stop-opacity", "1"), o.select).call(e, "#gradient"), o.append).call(e, "stop"), o.attr).call(e, "offset", "0.8"), o.attr).call(e, "stop-color", "white"), o.attr).call(e, "stop-opacity", "1"), o.select).call(e, "#gradient"), o.append).call(e, "stop"), o.attr).call(e, "offset", "1"), o.attr).call(e, "stop-color", "white"), o.attr).call(e, "stop-opacity", "0")
      },
      y = function(t) {
        var e;
        return (e = (e = (e = (e = (e = (e = (e = o.append.call(t, "mask"), o.attr).call(e, "id", "mask"), o.append).call(e, "rect"), o.attr).call(e, "x", 0), o.attr).call(e, "y", 0), o.attr).call(e, "width", "100%"), o.attr).call(e, "height", "100%"), o.attr).call(e, "fill", "url(#gradient)")
      },
      h = function(t, e, r) {
        var a;
        return (a = (a = (a = o.attr.call(t, "width", e), o.attr).call(a, "height", r), o.attr).call(a, "viewBox", "0 0 " + e + " " + r), o.style).call(a, "overflow", "hidden")
      };
    e["default"] = function(t) {
      var e, r = t.el,
        a = t.value,
        n = t.lineHeight,
        i = void 0 === n ? 1.35 : n,
        g = t.letterSpacing,
        m = void 0 === g ? 1 : g,
        b = t.animationDelay,
        _ = void 0 === b ? 100 : b,
        x = t.letterAnimationDelay,
        j = void 0 === x ? 100 : x,
        M = (0, o.select)(r),
        P = window.getComputedStyle(M),
        O = parseInt(P.fontSize, 10),
        w = (O * i - O) / 2 + O / 10,
        S = O * i - w,
        D = 0,
        E = O * i + w;
      M.innerHTML = "";
      var F = o.append.call(M, "svg"),
        k = (e = o.append.call(F, "svg"), o.attr).call(e, "mask", "url(#mask)"),
        A = o.append.call(F, "defs");
      v(A), y(A);
      var B = String(a).replace(/ /g, " ").split(""),
        N = B.map(function(t, e) {
          return isNaN(parseInt(t, 10)) ? {
            isDigit: !1,
            node: s(k, t, O),
            value: t,
            offset: {
              x: 0,
              y: S
            }
          } : {
            isDigit: !0,
            id: e,
            node: d(k, O, i, e),
            filter: p(A, e),
            value: Number(t),
            offset: {
              x: 0,
              y: S
            }
          }
        }),
        z = [],
        C = N.filter(function(t) {
          return t.isDigit
        });
      C.forEach(function(t, e) {
        var r = (f * c + t.value) * (O * i),
          a = (0, u["default"])({
            from: 0,
            to: r,
            delay: (C.length - 1 - e) * j + _,
            step: function(e) {
              var a;
              t.offset.y = S + e % (O * i * c), (a = t.node, o.attr).call(a, "transform", "translate(" + t.offset.x + ", " + t.offset.y + ")");
              var n = r / 2,
                l = Math.abs(Math.abs(e - n) - n) / 100;
              (a = (0, o.select)("#motionFilter-" + t.id + " .blurValues"), o.attr).call(a, "stdDeviation", "0 " + l)
            },
            end: 0 === e ? function() {
              return q()
            } : function(t) {
              return t
            }
          });
        z.push(a)
      });
      var G = function(t) {
          D = 0, N.forEach(function(t) {
            var e = t.node.getBBox(),
              r = e.width;
            t.offset.x = D, D += r + m
          }), N.forEach(function(t) {
            var e;
            (e = t.node, o.attr).call(e, "transform", "translate(" + t.offset.x + ", " + t.offset.y + ")")
          }), h(F, D, E), z.forEach(function(e) {
            return e.update(t)
          })
        },
        q = (0, l["default"])(G);
      return q
    }
  }, function(t, e, r) {
    "use strict";

    function a(t) {
      return t && t.__esModule ? t : {
        "default": t
      }
    }
    Object.defineProperty(e, "__esModule", {
      value: !0
    }), e["default"] = function(t) {
      var e = document.createElementNS(l["default"].svg, t);
      return this.appendChild(e), e
    };
    var n = r(6),
      l = a(n)
  }, function(t, e) {
    "use strict";
    Object.defineProperty(e, "__esModule", {
      value: !0
    }), e["default"] = function(t, e) {
      return this.setAttribute(t, e), this
    }
  }, function(t, e, r) {
    "use strict";

    function a(t) {
      return t && t.__esModule ? t : {
        "default": t
      }
    }
    Object.defineProperty(e, "__esModule", {
      value: !0
    });
    var n = r(7);
    Object.defineProperty(e, "select", {
      enumerable: !0,
      get: function() {
        return a(n)["default"]
      }
    });
    var l = r(3);
    Object.defineProperty(e, "append", {
      enumerable: !0,
      get: function() {
        return a(l)["default"]
      }
    });
    var o = r(4);
    Object.defineProperty(e, "attr", {
      enumerable: !0,
      get: function() {
        return a(o)["default"]
      }
    });
    var i = r(8);
    Object.defineProperty(e, "style", {
      enumerable: !0,
      get: function() {
        return a(i)["default"]
      }
    });
    var u = r(9);
    Object.defineProperty(e, "text", {
      enumerable: !0,
      get: function() {
        return a(u)["default"]
      }
    })
  }, function(t, e) {
    "use strict";
    Object.defineProperty(e, "__esModule", {
      value: !0
    }), e["default"] = {
      svg: "http://www.w3.org/2000/svg"
    }
  }, function(t, e) {
    "use strict";
    Object.defineProperty(e, "__esModule", {
      value: !0
    }), e["default"] = function(t) {
      return t === String(t) ? document.querySelector(t) : t
    }
  }, function(t, e) {
    "use strict";
    Object.defineProperty(e, "__esModule", {
      value: !0
    }), e["default"] = function(t, e) {
      var r = arguments.length <= 2 || void 0 === arguments[2] ? "" : arguments[2];
      return this.style.setProperty(t, e, r), this
    }
  }, function(t, e) {
    "use strict";
    Object.defineProperty(e, "__esModule", {
      value: !0
    }), e["default"] = function(t) {
      return this.textContent = t, this
    }
  }, function(t, e) {
    "use strict";
    Object.defineProperty(e, "__esModule", {
      value: !0
    });
    var r = function(t) {
      return ((t *= 2) <= 1 ? t * t * t : (t -= 2) * t * t + 2) / 2
    };
    e["default"] = function(t) {
      var e = t.from,
        a = t.to,
        n = t.duration,
        l = void 0 === n ? 3e3 : n,
        o = t.delay,
        i = void 0 === o ? 0 : o,
        u = t.easing,
        c = void 0 === u ? r : u,
        f = t.start,
        d = void 0 === f ? function(t) {
          return t
        } : f,
        s = t.step,
        p = void 0 === s ? function(t) {
          return t
        } : s,
        v = t.end,
        y = void 0 === v ? function(t) {
          return t
        } : v,
        h = e,
        g = 0,
        m = !1,
        b = function(t) {
          if (!m) {
            g || (g = t, d(h));
            var r = Math.min(Math.max(t - g - i, 0), l) / l;
            h = c(r) * (a - e) + e, p(h), 1 === r && (m = !0, y(h))
          }
        };
      return {
        update: b
      }
    }
  }])
});
