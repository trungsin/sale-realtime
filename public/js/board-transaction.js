/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/board-transaction.js":
/*!*******************************************!*\
  !*** ./resources/js/board-transaction.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance"); }

function _iterableToArrayLimit(arr, i) { if (!(Symbol.iterator in Object(arr) || Object.prototype.toString.call(arr) === "[object Arguments]")) { return; } var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }

var $document = $(document);
var host = window.location.origin;
$document.ready(function () {
  loadTransaction();
  setInterval(function () {
    loadTransaction();
  }, 700);
});
$document.on('click', '.lock-doing', function (e) {
  e.preventDefault();
  var id_block = $("#".concat(e.currentTarget.id)).data('block');
  var ajaxUrl = "".concat(host, "/api/blocks/").concat(id_block); // form

  $('#form-detail').hide();
  $('#form-dat-coc').hide();
  $("#form-dat-coc")[0].reset();
  $('#form-dat-cho').hide();
  $('#form-dat-cho')[0].reset(); // btn

  $('#btn-coc').hide();
  $('#btn-cho').hide();
  $('#btn-huy-coc').hide();
  if (typeof $('#btn-confirm-coc') != 'undefined') $('#btn-confirm-coc').hide();
  $('#modal-transaction .load').show();
  $('#modal-transaction').modal('show');
  $.getJSON(ajaxUrl).done(function (result) {
    if (result.success == true) {
      var data = result.data;

      for (var _i = 0, _Object$entries = Object.entries(data); _i < _Object$entries.length; _i++) {
        var _Object$entries$_i = _slicedToArray(_Object$entries[_i], 2),
            key = _Object$entries$_i[0],
            value = _Object$entries$_i[1];

        if (typeof $("#modal-transaction .".concat(key)) !== 'undefined' && data != null) {
          if (key == "img_cmnd_truoc" || key == "img_cmnd_sau" || key == "img_xac_nhan") $("#modal-transaction #form-detail .".concat(key)).attr('src', "".concat(host, "/").concat(value));else $("#modal-transaction .".concat(key)).val(value);
        }
      }

      switch (data.tinh_trang) {
        case "con":
          $('#form-dat-cho').show();
          $('#btn-cho').show();
          break;

        case "booking":
          $('#form-dat-coc').show();
          if (data.dat_coc) $('#btn-coc').show();
          break;

        case "coc":
          $('#form-detail').show();
          if (data.huy_coc) $('#btn-huy-coc').show();
          if (typeof $('#btn-confirm-coc') != 'undefined') $('#btn-confirm-coc').show();

        case "xac-nhan":
          $('#form-detail').show();
          break;

        default:
          break;
      }

      $('#modal-transaction .load').hide();
    }
  }).fail(function (err) {
    console.error(err);
  });
});
$('#btn-cho').click(function (e) {
  e.preventDefault();
  $('#modal-transaction .load').show();
  var url = "".concat(host, "/blocks/dat-cho");
  var form_data = $('#form-dat-cho').serialize();
  doTransaction(url, form_data);
});
$('#btn-coc').click(function (e) {
  e.preventDefault();
  $('#modal-transaction .load').show();
  $("#form-dat-coc").submit();
});
$('#btn-huy-coc').click(function (e) {
  e.preventDefault();
  $('#modal-transaction .load').show();
  var url = "".concat(host, "/blocks/huy-coc");
  var form_data = $('#form-detail').serialize();
  doTransaction(url, form_data);
});
$('#btn-confirm-coc').click(function (e) {
  e.preventDefault();
  $('#modal-transaction .load').show();
  var url = "".concat(host, "/blocks/xac-nhan-coc");
  var form_data = $('#form-detail').serialize();
  doTransaction(url, form_data);
});
$("#form-dat-coc").on('submit', function (event) {
  event.preventDefault();
  var url = "".concat(host, "/blocks/dat-coc");
  var form_data = new FormData($(this)[0]);
  doTransactionImg(url, form_data);
});

function doTransaction(url_post, form_data) {
  $.ajax({
    type: 'POST',
    url: url_post,
    data: form_data,
    success: function success(result) {
      if (result.success) {
        var lock = result.data;
        $('#block-' + lock.id).removeClass();
        $('#block-' + lock.id).addClass("col-md-2 col-6 lock ".concat(lock.tinh_trang, " lock-doing"));
      }

      $('#modal-transaction').modal('hide');
    },
    error: function error(xhr, textStatus, errorThrown) {
      console.error(errorThrown);
    }
  });
}

function doTransactionImg(url_post, form_data) {
  $.ajax({
    type: 'POST',
    url: url_post,
    data: form_data,
    processData: false,
    contentType: false,
    success: function success(result) {
      if (result.success) {
        var lock = result.data;
        $('#block-' + lock.id).removeClass();
        $('#block-' + lock.id).addClass("col-md-2 col-6 lock ".concat(lock.tinh_trang, " lock-doing"));
      }

      $('#modal-transaction').modal('hide');
    },
    error: function error(xhr, textStatus, errorThrown) {
      console.error(errorThrown);
    }
  });
}
/* global bootbox */


function loadTransaction() {
  var $transaction = $("#transaction");
  var ajaxUrl = "".concat(host, "/api/transactions/").concat($id_du_an, "/new");

  if ($transaction.html().trim() != '') {
    ajaxUrl = "".concat(host, "/api/transactions/").concat($id_du_an, "/update");
  }

  $.getJSON(ajaxUrl).done(function (result) {
    if (result.success == true) {
      if ($transaction.html().trim() == '') {
        var $content = '';
        $.each(result.data, function (index, value) {
          $content = $content + "\n\t\t\t\t\t<div class=\"row\">\n\t\t\t\t    \t<div class=\"col-md-12\">\n\t\t\t\t            <p>".concat(value.ma, " - ").concat(value.ghi_chu, "</p>\n\t\t\t\t        </div>");
          $.each(value.cac_lo, function (index, lock) {
            $content = $content + "\n\t\t\t\t    \t<div class=\"col-md-2 col-6 lock ".concat(lock.tinh_trang, " lock-doing\" id=\"block-").concat(lock.id, "\"\n\t\t\t\t    \t\tdata-block='").concat(lock.id, "'\n\t\t\t\t    \t>\n\t\t\t\t            <div class=\"content\">\n\t\t\t\t                <p>").concat(lock.ma_lo, "</p>\n\t\t\t\t                <p>").concat(lock.thong_tin, "</p>\n\t\t\t\t                <p>").concat(lock.dien_tich, "</p>\n\t\t\t\t                <p class=\"name_nhan_vien\">").concat(lock.name == null ? "" : "Nh\xE2n vi\xEAn : ".concat(lock.name), "</p>\n\t\t\t\t            </div>\n\t\t\t\t        </div>");
          });
          $content = $content + "</div>";
        });
        $transaction.append($content);
      } else {
        $.each(result.data, function (index, value) {
          $.each(value.cac_lo, function (index, lock) {
            $('#block-' + lock.id).removeClass();
            $('#block-' + lock.id).addClass("col-md-2 col-6 lock ".concat(lock.tinh_trang, " lock-doing"));
            if (lock.name != null) $('#block-' + lock.id + ' .name_nhan_vien').text("Nh\xE2n vi\xEAn : ".concat(lock.name));else $('#block-' + lock.id + ' .name_nhan_vien').text("");
          });
        });
      }
    }
  }).fail(function (err) {
    console.error(err);
  });
}

/***/ }),

/***/ 2:
/*!*************************************************!*\
  !*** multi ./resources/js/board-transaction.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Volumes/DATA/Data/php_project/sale-real-property/resources/js/board-transaction.js */"./resources/js/board-transaction.js");


/***/ })

/******/ });