@include('layouts.header')

<header class="main-heading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                <div class="page-icon">
                    <i class="icon-users"></i>
                </div>
                <div class="page-title">
                    <h3>CMS</h3>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                <div class="daterange-container">
                    <a data-toggle="tooltip" class="btn btn-primary btn-sm btn-create"
                        href="{{ route('cms.index') }}"><i class="icon-eye"></i> View</a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END: .main-heading -->
<!-- BEGIN .main-content -->
<div class="main-content">
    <form id="SignUp" novalidate="novalidate"
        action="{{ isset($cms->id) ? route('cms.update', $cms->id) : route('cms.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="validation error">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true" id="cross">×</span></button>
                <i class="icon-warning2"></i><strong>Oh snap!</strong><br>

                @foreach ($errors->all() as $error)
                    {{ $error }}<br />
                @endforeach
            </div>
        @endif


        <input type="hidden" id="id" name="id" value="{{ isset($cms) ? $cms->id : '' }}">
        <div class="card">
            <div class="card-body">
                <div class="row gutters">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title *"
                                value="{{ isset($cms) ? $cms->title : '' }}" />
                        </div>
                        <textarea class="summernote" name="content" placeholder="Summernote *"
                            value="{{ isset($cms) ? $cms->content : '' }}">
                        {{ isset($cms) ? $cms->content : '' }}
                        </textarea>
                    </div>

                </div>
                <div class="actions clearfix">
                    <button type="submit" id="cms_submit" class="btn btn-primary"><span class="icon-save2"></span>
                        @if ($result['method'] == 'add')
                            Save
                        @else
                            Update
                        @endif
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- END: .main-content -->
@include('layouts.footer')
<script type="text/javascript">
    $(document).ready(function() {
        $('.datepicker').datetimepicker({
            format: 'Y-m-d',
            timepicker: false,
            closeOnDateSelect: true,
            scrollInput: false,
            maxDate: 'now()',
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 180,
            tabsize: 2
        });
        $("#cross").on('click', function() {
            $(".validation").hide();
        });
    });

        // $('.validation').hide();

        // $('#cms_submit').on('click', function(e) {
        //     event.preventDefault();
        //     title_val = $("#title").val();
        //     content_val = $(".summernote").val();
        //     console.log("here", title_val, content_val);

        //     if (title_val == "" || title_val == null && content_val == "" || content_val == null) {
        //         $('.validation').show();
        //     } else {
        //         window.location = "{{ route('user.store') }}";
        //     }


        // });


        

    // $("#SignUp").validate({
    //     rules: {
    //         title: {
    //             required: true,
    //         },
    //         content: {
    //             required: true,
    //         },
    //     },
    //     messages: {
    //         title: {
    //             required: "The Title fields is required",
    //         },
    //         content: {
    //             required: "The Content fields is required",
    //         },
    //     },

    //     submitHandler: function(form) {
    //         $(form).submit();
    //     }
    // });
</script>
