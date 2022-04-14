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

const quillConfigs = {
    theme: 'snow',
    modules: {
        toolbar: [
            [{ header: [] }, { font: [] }],
            ['bold', 'italic', 'underline'],
            [{ align: '' }, { align: 'center' }, { align: 'right' }],
            [{ list: 'ordered' }, { list: 'bullet' }],
            [{ indent: '-1' }, { indent: '+1' }],
            [{ color: [] }, 'blockquote', 'code-block', 'link', 'image'],
            ['clean'],
        ],
        imageResize: {
            modules: ['Resize', 'DisplaySize'],
        },
        imageDrop: true,
        imageUploader: {
            upload: file => {
                return new Promise((resolve, reject) => {
                    const formData = new FormData();
                    formData.append('image', file);

                    fetch(`https://api.imgbb.com/1/upload?key=${imgBBKey}`, {
                        method: 'POST',
                        body: formData,
                    })
                        .then(response => response.json())
                        .then(result => {
                            resolve(result.data.url);
                        })
                        .catch(error => {
                            reject('Upload failed');
                            console.error('Error:', error);
                        });
                });
            },
        },
        magicUrl: true,
    },
    scrollingContainer: '#editorContainer',
};

function quillConverter(deltaOps) {
    let converter = new QuillDeltaToHtmlConverter(deltaOps, {
        inlineStyles: true,
    });
    // converter.renderCustomWith(customOp => {
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
    const deltaOps = standardEditor.getContents().ops;

    let delta2html = quillConverter(deltaOps)
        .convert()
        .trim();
    if (
        $(delta2html)
            .text()
            .trim() === ''
    )
        delta2html = '';

    HTMLEditor.value = delta2html;
}

function quillInit(standardEditor, value) {
    const delta = standardEditor.clipboard.convert(value);
    standardEditor.setContents(delta, 'silent');
}

function editorChange(standardEditor, HTMLEditor) {
    HTMLEditor.removeEventListener('input', quillInit);
    standardEditor.on('editor-change', () => {
        standardInit(standardEditor, HTMLEditor);
    });
}

function htmlChange(standardEditor, HTMLEditor) {
    HTMLEditor.addEventListener('input', e => {
        quillInit(standardEditor, e.target.value);
    });
    standardEditor.off('editor-change');
    autosize.update(HTMLEditor);
}

function toggleEditor(standardEditor, HTMLEditor) {
    $('.nav-editor').on('shown.bs.tab', function(e) {
        if (e.target.classList.contains('is-html')) {
            htmlChange(standardEditor, HTMLEditor);
        } else {
            editorChange(standardEditor, HTMLEditor);
        }
    });
}

window.editorInit = (standard, html) => {
    let standardEditor = new Quill(standard, quillConfigs);
    let HTMLEditor = document.querySelector(html);

    quillInit(standardEditor, HTMLEditor.value);
    editorChange(standardEditor, HTMLEditor);
    toggleEditor(standardEditor, HTMLEditor);
    autosize(HTMLEditor);
};
