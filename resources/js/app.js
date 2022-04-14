/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

require('./bootstrap');

const $document = $(document);

window.toast = (content, configs = {}) => {
    configs = Object.assign(
        {
            title: 'Notice',
            type: 'error',
            delay: 8000,
        },
        configs
    );

    $.toast({
        title: `<i class="icons cui-bell"></i> ${configs.title}`,
        subtitle: new Date().toLocaleTimeString(),
        content: content,
        pause_on_hover: true,
        type: configs.type,
        delay: configs.delay,
    });
};

/* global bootbox */
function deleteConfirm(e) {
    e.preventDefault();
    const $this = $(e.currentTarget);

    bootbox.confirm({
        message: '<p>Data will be permanently deleted and cannot be recovered!</p><p class="lead">Are you sure?</p>',
        buttons: {
            confirm: {
                label: 'Permanently delete',
                className: 'btn-light',
            },
            cancel: {
                label: 'Cancel',
                className: 'btn-danger',
            },
        },
        callback: result => {
            if (!result) return;
            $document.off('submit', 'form.delete', deleteConfirm);
            $this.trigger('submit');
        },
    });
}
$document.on('submit', 'form.delete', deleteConfirm);

$document.tooltip({
    selector: '[data-toggle="tooltip"]',
    container: 'body',
    boundary: 'viewport',
});
$document.on('inserted.bs.tooltip', '[data-toggle="tooltip"]', e => {
    const $this = $(e.currentTarget);
    const $img = $('.tooltip .img-thumbnail');

    if ($img.length)
        $img.on('load error', () => {
            $this.tooltip('update');
        });
});
$document.on('click', () => {
    $('.tooltip.show').detach();
});

$document.on('draw.dt', 'table', e => {
    const $table = $(e.currentTarget);

    const $popovers = $table.find('[data-toggle="popover"]');
    if ($popovers.length) {
        $popovers.each((i, ele) => {
            const $popover = $(ele);
            const base64 = $popover.data('base64');
            const config = {
                container: 'body',
                boundary: 'viewport',
                placement: 'auto',
                trigger: 'focus',
                html: true,
                sanitize: false,
            };
            if (base64) config.content = atob(base64);
            $popover.popover(config);
        });
    }

    setTimeout(() => {
        $table.attr('style', 'border-collapse: collapse !important');
    }, 0);
});

$.fn.select2.defaults.set('theme', 'bootstrap');
$.fn.select2.defaults.set('containerCssClass', ':all:');
$.fn.select2.defaults.set('dropdownAutoWidth', true);
$.fn.select2.defaults.set('width', 'resolve');
$.fn.select2.defaults.set('placeholder', '');
$.fn.select2.defaults.set('allowClear', true);
$('.auto-select2').select2();

window.slugify = (str, s = '-') => {
    str = str.toString();
    str = str.replace(/\W+/g, ' ');
    str = str.trim();
    str = str.replace(/\s/g, s);
    str = str.toLowerCase();

    return str;
};

window.usdCurrency = number => {
    const formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
    });

    return formatter.format(number);
};

window.copyTextToClipboard = text => {
    let copyFrom = document.createElement('textarea');
    copyFrom.textContent = text;
    document.body.appendChild(copyFrom);

    copyFrom.select();
    document.execCommand('copy');
    copyFrom.blur();

    document.body.removeChild(copyFrom);
};

/* global toast, copyTextToClipboard */
$document.on('click', '.copy-to-clipboard', e => {
    copyTextToClipboard(e.target.dataset.clipboardText);
    toast('Copied!', {
        type: 'info',
        delay: 1000,
    });
});

/* global bsCustomFileInput */
bsCustomFileInput.init();
