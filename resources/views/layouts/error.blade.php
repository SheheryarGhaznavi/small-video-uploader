@if ($errors->any())
<div class="row justify-content-center">
        <div class="col-md-8"> 
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                <ul style="margin: 0px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif

@if (session('success'))
<div class="row justify-content-center">
        <div class="col-md-8"> 
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                <ul style="margin: 0px;">
                    <li>{{ session('success') }}</li>
                </ul>
            </div>
        </div>
    </div>
@endif

@if (session('info'))
<div class="row justify-content-center">
        <div class="col-md-8"> 
            <div class="alert alert-info alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                <ul style="margin: 0px;">
                    <li>{{ session('info') }}</li>
                </ul>
            </div>
        </div>
    </div>
@endif

@if (session('warning'))
<div class="row justify-content-center">
        <div class="col-md-8"> 
            <div class="alert alert-warning alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                <ul style="margin: 0px;">
                    <li>{{ session('warning') }}</li>
                </ul>
            </div>
        </div>
    </div>
@endif

@if (session('danger'))
<div class="row justify-content-center">
        <div class="col-md-8"> 
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                <ul style="margin: 0px;">
                    <li>{{ session('danger') }}</li>
                </ul>
            </div>
        </div>
    </div>
@endif