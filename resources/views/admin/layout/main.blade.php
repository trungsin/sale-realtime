<!DOCTYPE html>
<!--
* CoreUI Pro - Bootstrap Admin Template
* @version v2.1.12
* @link https://coreui.io/pro/
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* License (https://coreui.io/pro/license)
-->

<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Khai Tin Group">
    <meta name="author" content="Khai Tin Group">
    <meta name="keyword" content="Khai Tin Group">
    <meta name="keyword" content="Khai Tin Group">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Khai Tin Group</title>
    <!-- Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@coreui/icons@0.3.0/css/coreui-icons.min.css" integrity="sha256-SZP6esHHkBUUNHX5VtM0fLhlqWFCiZY78uiwt6cKY1A=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icon-css@3.4.6/css/flag-icon.min.css" integrity="sha256-YjcCvXkdRVOucibC9I4mBS41lXPrWfqY2BnpskhZPnw=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-line-icons@2.4.1/css/simple-line-icons.css" integrity="sha256-q5+FXlQok94jx7fkiX65EGbJ27/qobH6c6gmhngztLE=" crossorigin="anonymous">
    <!-- Main styles for this application-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@coreui/coreui@2.1.16/dist/css/coreui.min.css" integrity="sha256-lvsgjUQT72IM3r+HhRaDv7v2h6LS1707C13IAid9vwo=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/datatables.net-bs4@1.10.20/css/dataTables.bootstrap4.min.css" integrity="sha256-F+DaKAClQut87heMIC6oThARMuWne8+WzxIDT7jXuPA=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-progress@1.0.2/themes/blue/pace-theme-flash.css" integrity="sha256-Kk0yRO8JR3ajRG7oTKhiZuIF7mgZpEpFaafRrgwwx/I=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" integrity="sha256-FdatTf20PQr/rWg+cAKfl6j4/IY3oohFAJ7gVC3M34E=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-theme-bootstrap4@0.2.0-beta.6/dist/select2-bootstrap.min.css" integrity="sha256-gmfbK1tBFyiu3W2xaWVRPhT/hOYJXySOoYRUWuiECCU=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css" integrity="sha256-jyIuRMWD+rz7LdpWfybO8U6DA65JCVkjgrt31FFsnAE=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/quill-image-uploader@1.2.1/dist/quill.imageUploader.min.css" integrity="sha256-i+iQUZWM4meHpbeKoj+9Of4qiPG/I987KL323wUsS7s=" crossorigin="anonymous">

    <link href="{{ asset('admin/css/jquery.treeview.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jstree/3.0.9/themes/default/style.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="http://demo.expertphp.in/css/style.css" rel="stylesheet">
    @stack('styles')

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('css/style.css') }}" rel="stylesheet">
  </head>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <header class="app-header navbar">
      <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="{{ asset('admin/img/brand/logo.jpg') }}" height="40" alt="CoreUI Logo">
      </a>
      <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
      </button>

      @include('admin.layout.menu')
    </header>
    <div class="app-body">
      <div class="sidebar">
      @include('admin.layout.sidebar')
      </div>
      <main class="main">
        <div class="container-fluid">
        <!-- begin:: Content -->
        @yield('content')
        <!-- end:: Content -->
        </div>

      </main>

    </div>
    <footer class="app-footer">
        <div>
            <a href="https://online.khaitingroup.vn/">Khai Tin Group</a>
            <span>&copy; 2020+</span>
        </div>
    </footer>
    @stack('modals')

    @include('partial.flash-message')
    <!-- CoreUI and necessary plugins-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/pace-progress@1.0.2/pace.min.js" integrity="sha256-EPrkNjGEmCWyazb3A/Epj+W7Qm2pB9vnfXw+X6LImPM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/perfect-scrollbar@1.5.0/dist/perfect-scrollbar.min.js" integrity="sha256-j/qnOBgDhyaxF4wY5NBiWdmntJy4iDCUbc5Ba2XJKEA=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@2.1.16/dist/js/coreui.min.js" integrity="sha256-IEYW8sRtA+cOsgiyWfLZnsSXxew/8p4sqHogSZJ+bcQ=" crossorigin="anonymous"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui-plugin-chartjs-custom-tooltips@1.2.0/dist/js/custom-tooltips.min.js" integrity="sha256-DhmnVPOTF2fdeq/0ca0OIlDdIXexsHzpsrV50TNmVqs=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables.net@1.10.20/js/jquery.dataTables.min.js" integrity="sha256-LXQzPhL1IRyKkA7HpCOBi8I+OC8HqzHUYkjK8S+LKTs=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables.net-bs4@1.10.20/js/dataTables.bootstrap4.min.js" integrity="sha256-hJ44ymhBmRPJKIaKRf3DSX5uiFEZ9xB/qx8cNbJvIMU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables.net-buttons@1.6.1/js/dataTables.buttons.min.js" integrity="sha256-A0u/eam130+YZHyuok/oSzMwtnE+RwWejsCJG44jntk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootbox@5.4.0/bootbox.all.js" integrity="sha256-KJF/zuBtXaHtVBwIl63bSlVhP13NkO7Yn2096RtX7+g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/dropzone@5.7.0/dist/dropzone.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs4-toast@0.7.1/dist/toast.min.js" integrity="sha256-odaBmDsj1v3tlWD5VmThJF8QYJvDTqII0cgXxOUYjp8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
    <script src="{{ asset('admin/js/app/category/change.category.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js" integrity="sha256-vjFnliBY8DzX9jsgU/z1/mOuQxk7erhiP0Iw35fVhTU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.min.js" integrity="sha256-xnX1c4jTWYY3xOD5/hVL1h37HCCGJx+USguyubBZsHQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js" integrity="sha256-0cU7MzmVW8WcU0QoR07PlryCX5uCR1S4RlLUhK32cgk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-image-drop-module@1.0.3/image-drop.min.js" integrity="sha256-rW6AclI3lzcRoScw+YxbMniPrZS4sY5TDTyLhY6nfjk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-image-uploader@1.2.1/dist/quill.imageUploader.min.js" integrity="sha256-7aYkRThpGZ2Qri4rAqGQKgFNCDaVfx4eVqDCc6wm1yQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-magic-url@1.0.3/dist/index.js" integrity="sha256-FD07bbBY5uUHlkAaAxJz93Du0r9lRu8KN9ef4GjH0Tc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-delta-to-html@0.11.0/dist/browser/QuillDeltaToHtmlConverter.bundle.js" integrity="sha256-YCCzdXCIdyHdJyZaqQc2H6e5E166M4o8CyvFd4/fbLE=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/autosize@4.0.2/dist/autosize.min.js" integrity="sha256-dW8u4dvEKDThJpWRwLgGugbARnA3O2wqBcVerlg9LMc=" crossorigin="anonymous"></script>
    <script>window.imgBBKey = "{{ env('IMGBB_KEY') }}";</script>
    <script src="{{ mix('js/editor.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input@1.3.4/dist/bs-custom-file-input.min.js" integrity="sha256-e0DUqNhsFAzOlhrWXnMOQwRoqrCRlofpWgyhnrIIaPo=" crossorigin="anonymous"></script>

    <script src="{{ mix('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
