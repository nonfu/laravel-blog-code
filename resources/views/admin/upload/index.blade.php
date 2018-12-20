@extends('admin.layout')

@section('content')
    <div class="container">

        {{-- 顶部工具栏 --}}
        <div class="row page-title-row">
            <div class="col-md-6">
                <h3 class="pull-left">上传 </h3>
                <div class="pull-left">
                    <ul class="breadcrumb">
                        @foreach ($breadcrumbs as $path => $disp)
                            <li><a href="/admin/upload?folder={{ $path }}">{{ $disp }}</a></li>
                        @endforeach
                        <li class="active">{{ $folderName }}</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 text-right">
                <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#modal-folder-create">
                    <i class="fa fa-plus-circle"></i> 新增目录
                </button>
                <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#modal-file-upload">
                    <i class="fa fa-upload"></i> 上传
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

                @include('admin.partials.errors')
                @include('admin.partials.success')

                <table id="uploads-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>名称</th>
                        <th>类型</th>
                        <th>日期</th>
                        <th>尺寸</th>
                        <th data-sortable="false">操作</th>
                    </tr>
                    </thead>
                    <tbody>

                    {{-- 子目录 --}}
                    @foreach ($subfolders as $path => $name)
                        <tr>
                            <td>
                                <a href="/admin/upload?folder={{ $path }}">
                                    <i class="fa fa-folder fa-lg fa-fw"></i>
                                    {{ $name }}
                                </a>
                            </td>
                            <td>目录</td>
                            <td>-</td>
                            <td>-</td>
                            <td>
                                <button type="button" class="btn btn-xs btn-danger" onclick="delete_folder('{{ $name }}')">
                                    <i class="fa fa-times-circle fa-lg"></i>
                                    删除
                                </button>
                            </td>
                        </tr>
                    @endforeach

                    {{-- 所有文件 --}}
                    @foreach ($files as $file)
                        <tr>
                            <td>
                                <a href="{{ $file['webPath'] }}">
                                    @if (is_image($file['mimeType']))
                                        <i class="fa fa-image fa-lg fa-fw"></i>
                                    @else
                                        <i class="fa fa-file fa-lg fa-fw"></i>
                                    @endif
                                    {{ $file['name'] }}
                                </a>
                            </td>
                            <td>{{ $file['mimeType'] ? : 'Unknown' }}</td>
                            <td>{{ $file['modified']->format('Y-m-d g:ia') }}</td>
                            <td>{{ human_filesize($file['size']) }}</td>
                            <td>
                                <button type="button" class="btn btn-xs btn-danger" onclick="delete_file('{{ $file['name'] }}')">
                                    <i class="fa fa-times-circle fa-lg"></i>
                                    删除
                                </button>
                                @if (is_image($file['mimeType']))
                                    <button type="button" class="btn btn-xs btn-success" onclick="preview_image('{{ $file['webPath'] }}')">
                                        <i class="fa fa-eye fa-lg"></i>
                                        预览
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

    @include('admin.upload._modals')

@stop

@section('scripts')
    <script>

        // 确认文件删除
        function delete_file(name) {
            $("#delete-file-name1").html(name);
            $("#delete-file-name2").val(name);
            $("#modal-file-delete").modal("show");
        }

        // 确认目录删除
        function delete_folder(name) {
            $("#delete-folder-name1").html(name);
            $("#delete-folder-name2").val(name);
            $("#modal-folder-delete").modal("show");
        }

        // 预览图片
        function preview_image(path) {
            $("#preview-image").attr("src", path);
            $("#modal-image-view").modal("show");
        }

        // 初始化数据
        $(function() {
            $("#uploads-table").DataTable();
        });
    </script>
@stop