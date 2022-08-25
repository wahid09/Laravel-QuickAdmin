<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="robots" content="noindex, nofollow">
  <title>Laravel log viewer</title>
  <link rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
  <style>
    body {
      padding: 25px;
    }

    h1 {
      font-size: 1.5em;
      margin-top: 0;
    }

    #table-log {
        font-size: 0.85rem;
    }

    .sidebar {
        font-size: 0.85rem;
        line-height: 1;
    }

    .btn {
        font-size: 0.7rem;
    }

    .stack {
      font-size: 0.85em;
    }

    .date {
      min-width: 75px;
    }

    .text {
      word-break: break-all;
    }

    a.llv-active {
      z-index: 2;
      background-color: #f5f5f5;
      border-color: #777;
    }

    .list-group-item {
      word-break: break-word;
    }

    .folder {
      padding-top: 15px;
    }

    .div-scroll {
      height: 80vh;
      overflow: hidden auto;
    }
    .nowrap {
      white-space: nowrap;
    }
    .list-group {
            padding: 5px;
        }




    /**
    * DARK MODE CSS
    */

    body[data-theme="dark"] {
      background-color: #151515;
      color: #cccccc;
    }

    [data-theme="dark"] a {
      color: #4da3ff;
    }

    [data-theme="dark"] a:hover {
      color: #a8d2ff;
    }

    [data-theme="dark"] .list-group-item {
      background-color: #1d1d1d;
      border-color: #444;
    }

    [data-theme="dark"] a.llv-active {
        background-color: #0468d2;
        border-color: rgba(255, 255, 255, 0.125);
        color: #ffffff;
    }

    [data-theme="dark"] a.list-group-item:focus, [data-theme="dark"] a.list-group-item:hover {
      background-color: #273a4e;
      border-color: rgba(255, 255, 255, 0.125);
      color: #ffffff;
    }

    [data-theme="dark"] .table td, [data-theme="dark"] .table th,[data-theme="dark"] .table thead th {
      border-color:#616161;
    }

    [data-theme="dark"] .page-item.disabled .page-link {
      color: #8a8a8a;
      background-color: #151515;
      border-color: #5a5a5a;
    }

    [data-theme="dark"] .page-link {
      background-color: #151515;
      border-color: #5a5a5a;
    }

    [data-theme="dark"] .page-item.active .page-link {
      color: #fff;
      background-color: #0568d2;
      border-color: #007bff;
    }

    [data-theme="dark"] .page-link:hover {
      color: #ffffff;
      background-color: #0051a9;
      border-color: #0568d2;
    }

    [data-theme="dark"] .form-control {
      border: 1px solid #464646;
      background-color: #151515;
      color: #bfbfbf;
    }

    [data-theme="dark"] .form-control:focus {
      color: #bfbfbf;
      background-color: #212121;
      border-color: #4a4a4a;
  }

  </style>

  <script>
    function initTheme() {
      const darkThemeSelected =
        localStorage.getItem('darkSwitch') !== null &&
        localStorage.getItem('darkSwitch') === 'dark';
      darkSwitch.checked = darkThemeSelected;
      darkThemeSelected ? document.body.setAttribute('data-theme', 'dark') :
        document.body.removeAttribute('data-theme');
    }

    function resetTheme() {
      if (darkSwitch.checked) {
        document.body.setAttribute('data-theme', 'dark');
        localStorage.setItem('darkSwitch', 'dark');
      } else {
        document.body.removeAttribute('data-theme');
        localStorage.removeItem('darkSwitch');
      }
    }
  </script>
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col sidebar mb-3">
      <h1><i class="fa fa-calendar" aria-hidden="true"></i> Laravel Log Viewer</h1>
      <p class="text-muted"><i>by Rap2h</i></p>

      <div class="custom-control custom-switch" style="padding-bottom:20px;">
        <input type="checkbox" class="custom-control-input" id="darkSwitch">
        <label class="custom-control-label" for="darkSwitch" style="margin-top: 6px;">Dark Mode</label>
      </div>

      <div class="list-group div-scroll">
        <?php $__currentLoopData = $folders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $folder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="list-group-item">
            <?php
            \Rap2hpoutre\LaravelLogViewer\LaravelLogViewer::DirectoryTreeStructure( $storage_path, $structure );
            ?>

          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <a href="?l=<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt($file)); ?>"
             class="list-group-item <?php if($current_file == $file): ?> llv-active <?php endif; ?>">
            <?php echo e($file); ?>

          </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
    <div class="col-10 table-container">
      <?php if($logs === null): ?>
        <div>
          Log file >50M, please download it.
        </div>
      <?php else: ?>
        <table id="table-log" class="table table-striped" data-ordering-index="<?php echo e($standardFormat ? 2 : 0); ?>">
          <thead>
          <tr>
            <?php if($standardFormat): ?>
              <th>Level</th>
              <th>Context</th>
              <th>Date</th>
            <?php else: ?>
              <th>Line number</th>
            <?php endif; ?>
            <th>Content</th>
          </tr>
          </thead>
          <tbody>

          <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr data-display="stack<?php echo e($key); ?>">
              <?php if($standardFormat): ?>
                <td class="nowrap text-<?php echo e($log['level_class']); ?>">
                  <span class="fa fa-<?php echo e($log['level_img']); ?>" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo e($log['level']); ?>

                </td>
                <td class="text"><?php echo e($log['context']); ?></td>
              <?php endif; ?>
              <td class="date"><?php echo e($log['date']); ?></td>
              <td class="text">
                <?php if($log['stack']): ?>
                  <button type="button"
                          class="float-right expand btn btn-outline-dark btn-sm mb-2 ml-2"
                          data-display="stack<?php echo e($key); ?>">
                    <span class="fa fa-search"></span>
                  </button>
                <?php endif; ?>
                <?php echo e($log['text']); ?>

                <?php if(isset($log['in_file'])): ?>
                  <br/><?php echo e($log['in_file']); ?>

                <?php endif; ?>
                <?php if($log['stack']): ?>
                  <div class="stack" id="stack<?php echo e($key); ?>"
                       style="display: none; white-space: pre-wrap;"><?php echo e(trim($log['stack'])); ?>

                  </div>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </tbody>
        </table>
      <?php endif; ?>
      <div class="p-3">
        <?php if($current_file): ?>
          <a href="?dl=<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt($current_file)); ?><?php echo e(($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : ''); ?>">
            <span class="fa fa-download"></span> Download file
          </a>
          -
          <a id="clean-log" href="?clean=<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt($current_file)); ?><?php echo e(($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : ''); ?>">
            <span class="fa fa-sync"></span> Clean file
          </a>
          -
          <a id="delete-log" href="?del=<?php echo e(\Illuminate\Support\Facades\Crypt::encrypt($current_file)); ?><?php echo e(($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : ''); ?>">
            <span class="fa fa-trash"></span> Delete file
          </a>
          <?php if(count($files) > 1): ?>
            -
            <a id="delete-all-log" href="?delall=true<?php echo e(($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : ''); ?>">
              <span class="fa fa-trash-alt"></span> Delete all files
            </a>
          <?php endif; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<!-- jQuery for Bootstrap -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<!-- FontAwesome -->
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<!-- Datatables -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

<script>

  // dark mode by https://github.com/coliff/dark-mode-switch
  const darkSwitch = document.getElementById('darkSwitch');

  // this is here so we can get the body dark mode before the page displays
  // otherwise the page will be white for a second... 
  initTheme();

  window.addEventListener('load', () => {
    if (darkSwitch) {
      initTheme();
      darkSwitch.addEventListener('change', () => {
        resetTheme();
      });
    }
  });

  // end darkmode js
        
  $(document).ready(function () {
    $('.table-container tr').on('click', function () {
      $('#' + $(this).data('display')).toggle();
    });
    $('#table-log').DataTable({
      "order": [$('#table-log').data('orderingIndex'), 'desc'],
      "stateSave": true,
      "stateSaveCallback": function (settings, data) {
        window.localStorage.setItem("datatable", JSON.stringify(data));
      },
      "stateLoadCallback": function (settings) {
        var data = JSON.parse(window.localStorage.getItem("datatable"));
        if (data) data.start = 0;
        return data;
      }
    });
    $('#delete-log, #clean-log, #delete-all-log').click(function () {
      return confirm('Are you sure?');
    });
  });
</script>
</body>
</html>
<?php /**PATH D:\laragon\www\QuickAdmin\vendor\rap2hpoutre\laravel-log-viewer\src\Rap2hpoutre\LaravelLogViewer/../../views/log.blade.php ENDPATH**/ ?>