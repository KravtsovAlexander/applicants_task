/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "../assets/js/functions.js":
/*!*********************************!*\
  !*** ../assets/js/functions.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "mapTable": () => (/* binding */ mapTable),
/* harmony export */   "sortTable": () => (/* binding */ sortTable)
/* harmony export */ });
function _createForOfIteratorHelper(o, allowArrayLike) { var it; if (typeof Symbol === "undefined" || o[Symbol.iterator] == null) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = o[Symbol.iterator](); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it.return != null) it.return(); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

/**
 * Mark up a table for later sorting
 * @param {HTMLElement} table
 */
function mapTable(table) {
  var ths = table.querySelector("thead").querySelectorAll("th"),
      trs = table.querySelector("tbody").querySelectorAll("tr");
  ths.forEach(function (th, index) {
    th.setAttribute("data-th", index);
    trs.forEach(function (tr) {
      tr.querySelectorAll("td")[index].setAttribute("data-td", index);
    });
  });
}
/**
 * Sort table by clicking on a relevant <th>
 * @param {Event} event 
 */


function sortTable(event) {
  var tBody = document.querySelector("tbody"),
      trs = tBody.querySelectorAll("tr"),
      thId = event.target.dataset.th,
      tempArr = [],
      elemArr = [];
  trs.forEach(function (tr) {
    var tds = tr.querySelectorAll("td");
    tds.forEach(function (td) {
      var tdId = td.dataset.td;

      if (tdId === thId) {
        tempArr.push(td.innerText);
        elemArr.push(td);
      }
    });
  });
  tempArr.sort(function (a, b) {
    return a.localeCompare(b);
  });
  var isSortedAlready = tempArr.every(function (elem, index) {
    return elem === elemArr[index].innerText;
  });

  if (isSortedAlready) {
    var _iterator = _createForOfIteratorHelper(tempArr.reverse()),
        _step;

    try {
      var _loop = function _loop() {
        var tempElem = _step.value;
        elemArr.forEach(function (elem) {
          if (elem.innerText === tempElem) tBody.append(elem.parentElement);
        });
      };

      for (_iterator.s(); !(_step = _iterator.n()).done;) {
        _loop();
      }
    } catch (err) {
      _iterator.e(err);
    } finally {
      _iterator.f();
    }
  } else {
    var _iterator2 = _createForOfIteratorHelper(tempArr),
        _step2;

    try {
      var _loop2 = function _loop2() {
        var tempElem = _step2.value;
        elemArr.forEach(function (elem) {
          if (elem.innerText === tempElem) tBody.append(elem.parentElement);
        });
      };

      for (_iterator2.s(); !(_step2 = _iterator2.n()).done;) {
        _loop2();
      }
    } catch (err) {
      _iterator2.e(err);
    } finally {
      _iterator2.f();
    }
  }
}



/***/ }),

/***/ "../node_modules/bootstrap/dist/css/bootstrap.min.css":
/*!************************************************************!*\
  !*** ../node_modules/bootstrap/dist/css/bootstrap.min.css ***!
  \************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "../assets/styles/styles.scss":
/*!************************************!*\
  !*** ../assets/styles/styles.scss ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!****************************!*\
  !*** ../assets/js/list.js ***!
  \****************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _styles_styles_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../styles/styles.scss */ "../assets/styles/styles.scss");
/* harmony import */ var _node_modules_bootstrap_dist_css_bootstrap_min_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../node_modules/bootstrap/dist/css/bootstrap.min.css */ "../node_modules/bootstrap/dist/css/bootstrap.min.css");
/* harmony import */ var _functions_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./functions.js */ "../assets/js/functions.js");


 // search highlighting

var query = document.getElementById("search").dataset["query"],
    cells = document.querySelector("tbody").querySelectorAll("td");
cells.forEach(function (cell) {
  var match = cell.innerText.search(query);
  if (match === -1) return;
  cell.innerHTML = cell.innerHTML.slice(0, match) + "<span style='background: yellow'>" + cell.innerHTML.slice(match, match + query.length) + "</span>" + cell.innerHTML.slice(match + query.length);
}); // table sorting

var table = document.querySelector("table");
(0,_functions_js__WEBPACK_IMPORTED_MODULE_2__.mapTable)(table);
table.querySelector("thead").querySelectorAll("th").forEach(function (th) {
  th.addEventListener("click", _functions_js__WEBPACK_IMPORTED_MODULE_2__.sortTable);
});
})();

/******/ })()
;
//# sourceMappingURL=list.bundle.js.map