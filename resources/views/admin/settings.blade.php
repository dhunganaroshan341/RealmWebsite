@extends('admin.layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Form content -->
            <div class="row">
                <div class="col-md-12">
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <form action="" method="post" name="settingsFrom" id="settingsFrom">
                        <div class="card">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="website_title">Website Title</label>
                                    <input type="text" name="website_title" id="website_title" class="form-control" value="{{ $settings->website_title ?? '' }}">
                                    <p class="error website-title-error"></p>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ $settings->email ?? '' }}">
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control" value="{{ $settings->phone ?? '' }}">
                                </div>

                                <div class="form-group">
                                    <label for="copy">Copyright</label>
                                    <input type="text" name="copy" id="copy" class="form-control" value="{{ $settings->copy ?? '' }}">
                                </div>

                                <div class="mt-4">
                                    <h4><strong>Social Links</strong></h4>
                                    <hr>
                                    <div class="form-group">
                                        <label for="facebook_url">Facebook Url</label>
                                        <input type="text" name="facebook_url" id="facebook_url" class="form-control" value="{{ $settings->facebook_url ?? '' }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="twitter_url">Twitter Url</label>
                                        <input type="text" name="twitter_url" id="twitter_url" class="form-control" value="{{ $settings->twitter_url ?? '' }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="instagram_url">Instagram Url</label>
                                        <input type="text" name="instagram_url" id="instagram_url" class="form-control" value="{{ $settings->instagram_url ?? '' }}">
                                    </div>
                                </div>

                                <!-- Welcome Home Content -->
                                @include('components.welcome-home-form', ['home_welcome_content' => $homeWelcomeContent])
                                <!-- End Welcome Home Content -->
                                <h3 class="text-center border border-bottom rounded border-dark mt-4">Contact-Page Content</h3>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact_card_one">Contact Card One</label>
                                            <textarea name="contact_card_one" id="contact_card_one" class="summernote">{{ $settings->contact_card_one ?? '' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact_card_two">Contact Card Two</label>
                                            <textarea name="contact_card_two" id="contact_card_two" class="summernote">{{ $settings->contact_card_two ?? '' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="contact_card_three">Contact Card Three</label>
                                            <textarea name="contact_card_three" id="contact_card_three" class="summernote">{{ $settings->contact_card_three ?? '' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cta_title">Call To Action</label>
                                            <input type="text" name="cta_title" id="cta_title" class="form-control mt-2" value="{{ $settings->cta_title ?? 'title' }}">
                                            <input type="text" name="cta_link" id="cta_link" class="form-control mt-2" value="{{ $settings->cta_link ?? '' }}">
                                            <textarea name="cta_description" id="cta_description" class="summernote">{{ $settings->cta_description ?? '' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="service">Featured Services</label>
                                        <div class="row">
                                            <div class="col">
                                                <select name="service" id="service" class="form-control">
                                                    @foreach ($services as $service)
                                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <button type="button" onclick="addService();" class="btn btn-primary">Add Service</button>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-md-12" id="services-wrapper">
                                                @foreach ($featuredServices as $service)
                                                    <div class="ui-state-default" data-id="{{ $service->service_id }}" id="service-{{ $service->service_id }}">
                                                        <span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
                                                        {{ $service->name }}
                                                        <button type="button" onclick="deleteService({{ $service->service_id }});" class="btn btn-danger btn-sm">Delete</button>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection





@section('extraJs')

<script type="text/javascript">

    function deleteService(id) {
        $("#service-"+id).remove();
    }

    $( function() {
        $( "#services-wrapper" ).sortable();
    } );

    function addService(){
        var serviceId = $("#service").val()
        var serviceName = $("#service option:selected").text();

        var html = `<div class="ui-state-default" data-id='${serviceId}' id=service-${serviceId}><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>${serviceName} <button type="button" onclick="deleteService(${serviceId});" class='btn btn-danger btn-sm'>Delete</button></div>`;

        var isFound = false;

        $("#services-wrapper .ui-state-default").each(function(){
            var id = $(this).attr('data-id');
            if(id == serviceId){
                isFound = true;
            }
        });

        if(isFound == true){
            alert("You can not select same service again.");
        } else {
            $("#services-wrapper").append(html);
        }
    }

    $("#settingsFrom").submit(function(event){
        event.preventDefault();
        $("button[type='submit']").prop('disabled',true);

        var servicesString = $("#services-wrapper").sortable('serialize');
        //console.log(servicesString);
        //return false;
        var data = $("#settingsFrom").serializeArray();
        data[data.length] = {name: 'services', value : servicesString};

        $.ajax({
            url: '{{ route("settings.save") }}',
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function(response){
                $("button[type='submit']").prop('disabled',false);

                if(response.status == 200) {
                    // no error
                    window.location.href = '{{ route("settings.index") }}';
                    Lobibox.notify('success', {
                                position: 'top right',
                                msg: response.message
                            });
                } else {
                    // Here we will show errors
                    if(response.errors.website_title) {
                        $('.website-title-error').html(response.errors.website_title);
                    } else {
                        $('.website-title-error').html('');
                    }
                }
            }
        });
    });

    $("#name").change(function(){
        $("button[type='submit']").prop('disabled',true);
        $.ajax({
            url: '{{ route("blog.slug") }}',
            type: 'get',
            data: {name: $(this).val()},
            dataType: 'json',
            success: function(response){
                $("button[type='submit']").prop('disabled',false);
                $("#slug").val(response.slug);
            }
        })
    });


</script>

@endsection
