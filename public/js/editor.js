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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/editor.js":
/*!********************************!*\
  !*** ./resources/js/editor.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

/* global Quill, ImageUploader, QuillDeltaToHtmlConverter, imgBBKey, autosize */
// const Bold = Quill.import('formats/bold');
// Bold.tagName = 'B';
// Quill.register(Bold, true);
// const Inline = Quill.import('blots/inline');
// class fontSizeBlot extends Inline {
//     static create(value) {
//         let node = super.create();
//         node.setAttribute('size', value);
//         return node;
//     }
// }
// fontSizeBlot.blotName = 'fontSize';
// fontSizeBlot.tagName = 'FONT';
// fontSizeBlot.whitelist = ['1', '2', '3', '4', '5', '6', '7'];
// fontSizeBlot.whitelist.unshift(false);
// Quill.register(fontSizeBlot);
Quill.register('modules/imageUploader', ImageUploader);
var quillConfigs = {
  theme: 'snow',
  modules: {
    toolbar: [[{
      header: []
    }, {
      font: []
    }], ['bold', 'italic', 'underline'], [{
      align: ''
    }, {
      align: 'center'
    }, {
      align: 'right'
    }], [{
      list: 'ordered'
    }, {
      list: 'bullet'
    }], [{
      indent: '-1'
    }, {
      indent: '+1'
    }], [{
      color: []
    }, 'blockquote', 'code-block', 'link', 'image'], ['clean']],
    imageResize: {
      modules: ['Resize', 'DisplaySize']
    },
    imageDrop: true,
    imageUploader: {
      upload: function upload(file) {
        return new Promise(function (resolve, reject) {
          var formData = new FormData();
          formData.append('image', file);
          fetch("https://api.imgbb.com/1/upload?key=".concat(imgBBKey), {
            method: 'POST',
            body: formData
          }).then(function (response) {
            return response.json();
          }).then(function (result) {
            resolve(result.data.url);
          })["catch"](function (error) {
            reject('Upload failed');
            console.error('Error:', error);
          });
        });
      }
    },
    magicUrl: true
  },
  scrollingContainer: '#editorContainer'
};

function quillConverter(deltaOps) {
  var converter = new QuillDeltaToHtmlConverter(deltaOps, {
    inlineStyles: true
  }); // converter.renderCustomWith(customOp => {
  //     if (customOp.insert.type === 'fontSize') {
  //         let val = customOp.insert.value;
  //         return `<font size="${val.id}">${val.text}</font>`;
  //     } else {
  //         return 'Unmanaged custom blot!';
  //     }
  // });

  return converter;
}

function standardInit(standardEditor, HTMLEditor) {
  var deltaOps = standardEditor.getContents().ops;
  var delta2html = quillConverter(deltaOps).convert().trim();
  if ($(delta2html).text().trim() === '') delta2html = '';
  HTMLEditor.value = delta2html;
}

function quillInit(standardEditor, value) {
  var delta = standardEditor.clipboard.convert(value);
  standardEditor.setContents(delta, 'silent');
}

function editorChange(standardEditor, HTMLEditor) {
  HTMLEditor.removeEventListener('input', quillInit);
  standardEditor.on('editor-change', function () {
    standardInit(standardEditor, HTMLEditor);
  });
}

function htmlChange(standardEditor, HTMLEditor) {
  HTMLEditor.addEventListener('input', function (e) {
    quillInit(standardEditor, e.target.value);
  });
  standardEditor.off('editor-change');
  autosize.update(HTMLEditor);
}

function toggleEditor(standardEditor, HTMLEditor) {
  $('.nav-editor').on('shown.bs.tab', function (e) {
    if (e.target.classList.contains('is-html')) {
      htmlChange(standardEditor, HTMLEditor);
    } else {
      editorChange(standardEditor, HTMLEditor);
    }
  });
}

window.editorInit = function (standard, html) {
  var standardEditor = new Quill(standard, quillConfigs);
  var HTMLEditor = document.querySelector(html);
  quillInit(standardEditor, HTMLEditor.value);
  editorChange(standardEditor, HTMLEditor);
  toggleEditor(standardEditor, HTMLEditor);
  autosize(HTMLEditor);
};

/***/ }),

/***/ 1:
/*!**************************************!*\
  !*** multi ./resources/js/editor.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Volumes/DATA/Data/php_project/sale-real-property/resources/js/editor.js */"./resources/js/editor.js");


/***/ })

/******/ });