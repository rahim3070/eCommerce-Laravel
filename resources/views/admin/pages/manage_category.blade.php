@extends('admin.admin_master')
@section('admin_content')
<div class="breadcrumbs" id="breadcrumbs">
    <script type="text/javascript">
        try {
            ace.settings.check('breadcrumbs', 'fixed')
        } catch (e) {
        }
    </script>
    <ul class="breadcrumb">
        <li><i class="ace-icon fa fa-tachometer home-icon"></i><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
        <li class="active">Category</li>
        <li><a href="{{URL::to('manage-category')}}">Manage Category</a></li>
    </ul><!-- /.breadcrumb -->
    <!--    <div class="nav-search" id="nav-search">
            <form class="form-search">
                <span class="input-icon">
                    <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                    <i class="ace-icon fa fa-search nav-search-icon"></i>
                </span>
            </form>
        </div> /.nav-search -->
</div>
<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <div class="row">
                <div class="col-xs-12 widget-container-col">
                    <div class="widget-box">
                        <div class="widget-header">
                            <h5 class="widget-title">Manage Category ...</h5>
                            <div class="widget-toolbar">
                                <a href="#" data-action="fullscreen" class="orange2"><i class="ace-icon fa fa-expand"></i></a>
                                <a href="#" data-action="reload"><i class="ace-icon fa fa-refresh"></i></a>
                                <a href="#" data-action="collapse"><i class="ace-icon fa fa-chevron-up"></i></a>
                                <a href="#" data-action="close"><i class="ace-icon fa fa-times"></i></a>
                            </div>
                        </div>
                        <div class="widget-body">
                            <div class="widget-main">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="clearfix">
                                            <div class="pull-right tableTools-container"></div>
                                        </div>
                                        <div>
                                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="center">
                                                            <label class="pos-rel">
                                                                <input type="checkbox" class="ace" />
                                                                <span class="lbl"></span>
                                                            </label>
                                                        </th>
                                                        <th class="hidden">Category ID</th>
                                                        <th class="hidden">Parent ID</th>
                                                        <th>Category Name</th>
                                                        <th>Publication Status</th>
                                                        <th>Status</th>
                                                        <!--<th>Actions</th>-->
<!--                                                        <th class="hidden-480"></th>
                                                        <th class="hidden-480"></th>-->
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php
                                                    foreach ($all_category_info as $v_category) {
                                                        ?>
                                                        <tr>
                                                            <td class="center"><label class="pos-rel"><input type="checkbox" class="ace" /><span class="lbl"></span></label></td>
                                                            <td class="hidden"><?php echo $v_category->category_id ?></td>
                                                            <td class="hidden"><?php echo $v_category->parent_id ?></td>
                                                            <td><?php echo $v_category->category_name ?></td>
                                                            <td>
                                                                <?php
                                                                if ($v_category->publication_status == 1) {
                                                                    ?>
                                                                    <span class="label label-success arrowed">Published</span>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <span class="label label-danger arrowed-in">Unpublished</span>
                                                                <?php } ?>
                                                            </td>
                                                            <td>                                                                
                                                                <?php
                                                                if ($v_category->deletion_status == 1) {
                                                                    ?>
                                                                    <span class="label label-danger arrowed-in">Deleted</span>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <span class="label label-success arrowed"> Not Deleted</span>
                                                                <?php } ?>

                                                                <?php
                                                                if ($v_category->is_featured == 1) {
                                                                    ?>
                                                                    <span class="label label-success arrowed-in">Featured</span>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <span class="label label-danger arrowed"> Not Featured</span>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <div class="hidden-sm hidden-xs action-buttons">
                                                                    <?php
                                                                    if ($v_category->publication_status == 1) {
                                                                        ?>
                                                                        <a class="blue" href="{{URL::to('/unpublished-category/'.$v_category->category_id)}}"><i class="ace-icon fa fa-unlock bigger-130"></i></a>
                                                                    <?php } else {
                                                                        ?>
                                                                        <a class="blue" href="{{URL::to('/published-category/'.$v_category->category_id)}}"><i class="ace-icon fa fa-lock bigger-130"></i></a>
                                                                    <?php } ?>
                                                                    <a class="green" href="{{URL::to('/edit-category/'.$v_category->category_id)}}"><i class="ace-icon fa fa-pencil bigger-130"></i></a>

                                                                    <?php
                                                                    $admin_level = Session::get('admin_level');

                                                                    if ($admin_level == 1) {
                                                                        ?>
                                                                        <?php
                                                                        if ($v_category->deletion_status == 1) {
                                                                            ?>
                                                                            <a class="blue" href="{{URL::to('/undo-category/'.$v_category->category_id)}}"><i class="ace-icon fa fa-undo bigger-130"></i></a>
                                                                        <?php } else {
                                                                            ?>
                                                                            <a class="red" href="{{URL::to('/delete-category/'.$v_category->category_id)}}"><i class="ace-icon fa fa-trash-o bigger-130"></i></a>
                                                                        <?php } ?>
                                                                    <?php } ?>

                                                                    <?php
                                                                    if (($v_category->is_featured == 1) && ($v_category->parent_id == 0)) {
                                                                        ?>
                                                                        <a class="blue" href="{{URL::to('/remove-featured-category/'.$v_category->category_id)}}"><i class="ace-icon fa fa-eye bigger-130"></i></a>
                                                                    <?php } else {
                                                                        ?>
                                                                        <a class="red" href="{{URL::to('/add-featured-category/'.$v_category->category_id)}}"><i class="ace-icon fa fa-eye-slash bigger-130"></i></a>
                                                                    <?php } ?>
                                                                </div>
                                                                <div class="hidden-md hidden-lg">
                                                                    <div class="inline pos-rel">
                                                                        <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                                            <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                                                        </button>

                                                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                                            <?php
                                                                            if ($v_category->publication_status == 1) {
                                                                                ?>
                                                                                <li><a href="{{URL::to('/unpublished-category/'.$v_category->category_id)}}" class="tooltip-info" data-rel="tooltip" title="Unpublished"><span class="blue"><i class="ace-icon fa fa-unlock bigger-120"></i></span></a></li>
                                                                            <?php } else {
                                                                                ?>
                                                                                <li><a href="{{URL::to('/published-category/'.$v_category->category_id)}}" class="tooltip-info" data-rel="tooltip" title="Published"><span class="blue"><i class="ace-icon fa fa-lock bigger-120"></i></span></a></li>
                                                                            <?php } ?>
                                                                            <li><a href="{{URL::to('/edit-category/'.$v_category->category_id)}}" class="tooltip-success" data-rel="tooltip" title="Edit"><span class="green"><i class="ace-icon fa fa-pencil-square-o bigger-120"></i></span></a></li>
                                                                            <?php
                                                                            $admin_level = Session::get('admin_level');

                                                                            if ($admin_level == 1) {
                                                                                ?>
                                                                                <?php
                                                                                if ($v_category->deletion_status == 1) {
                                                                                    ?>
                                                                                    <li><a href="{{URL::to('/undo-category/'.$v_category->category_id)}}" class="tooltip-error" data-rel="tooltip" title="Undo"><span class="red"><i class="ace-icon fa fa-undo bigger-120"></i></span></a></li>
                                                                                <?php } else {
                                                                                    ?>
                                                                                    <li><a href="{{URL::to('/delete-category/'.$v_category->category_id)}}" class="tooltip-error" data-rel="tooltip" title="Delete"><span class="red"><i class="ace-icon fa fa-trash-o bigger-120"></i></span></a></li>
                                                                                <?php } ?>
                                                                            <?php } ?>
                                                                                    
                                                                            <?php
                                                                            if (($v_category->is_featured == 1) && ($v_category->parent_id == 0)) {
                                                                                ?>
                                                                                <li><a href="{{URL::to('/remove-featured-category/'.$v_category->category_id)}}" class="tooltip-info" data-rel="tooltip" title="Not Featured"><span class="blue"><i class="ace-icon fa fa-eye bigger-120"></i></span></a></li>
                                                                            <?php } else {
                                                                                ?>
                                                                                <li><a href="{{URL::to('/add-featured-category/'.$v_category->category_id)}}" class="tooltip-info" data-rel="tooltip" title="Featured"><span class="blue"><i class="ace-icon fa fa-eye-slash bigger-120"></i></span></a></li>
                                                                                        <?php } ?>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.span -->
            </div>
            <!-- /.row -->
            <!-- PAGE CONTENT ENDS -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
@endsection