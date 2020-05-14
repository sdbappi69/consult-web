@extends('layout.app')
@section('css')
    <link rel="stylesheet" href="{{asset('/')}}css/videoConnector.css">
@endsection

@push('css')
    <style>
        .myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .myImg:hover {opacity: 0.7;}

        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1056; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        /* Add Animation */
        .modal-content{
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
            from {-webkit-transform:scale(0)}
            to {-webkit-transform:scale(1)}
        }

        @keyframes zoom {
            from {transform:scale(0)}
            to {transform:scale(1)}
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px){
            .modal-content {
                width: 100%;
            }
        }
    </style>
@endpush
@section('content')
    <meta name="video_token" content="{{$call_token}}">
    <meta name="displayName" content="{{auth()->user()->name}}">
    <meta name="resourceId" content="{{$room_name}}">
    <!-- /Page Header -->
    <div class="container mt-5">
        <div class="col-sm-12">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Patient Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="custom-tab">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active show" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home" aria-selected="true">Patient Information</a>
                                    <a class="nav-item nav-link" id="custom-nav-contact-tab" data-toggle="tab" href="#custom-nav-contact" role="tab" aria-controls="custom-nav-contact" aria-selected="false">Appointment Info</a>
                                    <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile" aria-selected="false">Previous Medical Documents</a>
                                    @if($appointment->date == date('Y-m-d') && ((date('H:i:s') >= date('H:i:s',strtotime($appointment->start))) && (date('H:i:s') <= date('H:i:s',strtotime($appointment->end)))))
                                        <a class="nav-item nav-link" id="appointment-log-tab" data-toggle="tab" href="#appointment-log" role="tab" aria-controls="appointment-log" aria-selected="false">Appointment Log</a>
                                    @endif
                                </div>
                            </nav>
                            <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                <div class="tab-pane fade active show" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">
                                    <div class="row table-responsive">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td colspan="2">
                                                    <img src="{{config('app.image_path').(json_decode($appointment->client->attributes)->image_url ?? 'user.png')}}" class="img img-thumbnail" width="160" alt="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Name</td>
                                                <td> {{$appointment->client->name}} </td>
                                            </tr>
                                            <tr>
                                                <td>Contact No</td>
                                                <td> {{$appointment->client->mobile}} </td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td> {{$appointment->client->email}} </td>
                                            </tr>
                                            <tr>
                                                <td>Age</td>
                                                <td>
                                                    @php
                                                        if(isset(json_decode($appointment->client->attributes)->birth_date)){
                                                            $dtToronto = \Carbon\Carbon::createFromFormat('Y-m-d',json_decode($appointment->client->attributes)->birth_date);
                                                            $dtVancouver = \Carbon\Carbon::createFromFormat('Y-m-d', date('Y-m-d'));
                                                            echo $dtVancouver->diffInYears($dtToronto).' Years';
                                                            }else{
                                                                echo 'Not define';
                                                            }
                                                    @endphp
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-nav-contact" role="tabpanel" aria-labelledby="custom-nav-contact-tab">
                                    <div class="row table-responsive">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>Doctor Name</td>
                                                <td>{{($appointment->provider->name ?? 'No Name')}}</td>
                                            </tr>
                                            <tr>
                                                <td>Appointment Category</td>
                                                <td>{{($appointment->category->name ?? 'No Name')}}</td>
                                            </tr>
                                            <tr>
                                                <td>Appointment Date</td>
                                                <td>{{ $appointment->date }}</td>
                                            </tr>
                                            <tr>
                                                <td>Appointment Time </td>
                                                <td>{{ $appointment->start}} to {{ $appointment->end}}</td>
                                            </tr>
                                            <tr>
                                                <td>Appointment Medium </td>
                                                <td>{{ $appointment->medium->name }}</td>
                                            </tr>
                                            <tr>
                                                <td> Appointment Fee </td>
                                                <td>Tk. {{ $appointment->fee }}</td>
                                            </tr>
                                            <tr>
                                                <td> Appointment Reschedule Fee </td>
                                                <td>Tk. {{ $appointment->reschedule_fee }}</td>
                                            </tr>
                                            <tr>
                                                <td> Appointment Service Fee </td>
                                                <td>Tk. {{ $appointment->service_charge }}</td>
                                            </tr>
                                            <tr>
                                                <td> Total Fee </td>
                                                <td>Tk. {{ $appointment->total }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                                    <div class="row">
                                        @if(isset($appointment->document))
                                            @forelse(json_decode($appointment->document->documents) as $file)
                                                @if(file_exists(config('app.upload_path').'/'.$file))
                                                    @if(strpos(mime_content_type(config('app.upload_path').'/'.$file),'image') === 0)
                                                        <div class="col-md-3">
                                                            <img src="{{config('app.image_path').$file}}" class="myImg img img-thumbnail" alt="">
                                                        </div>
                                                    @elseif(strpos(mime_content_type(config('app.upload_path').'/'.$file),'application') === 0 )
                                                        <div class="col-md-3 mb-3">
                                                            <a href="{{config('app.image_path').$file}}" target="_blank">
                                                                <span class="badge badge-success"> Click to view pdf file </span>
                                                            </a>
                                                        </div>
                                                    @else
                                                        <div class="col-md-3 mb-3">
                                                            <span class="badge badge-danger"> Invalid Document Found</span>
                                                        </div>
                                                    @endif
                                                @endif
                                            @empty
                                                <div class="col-md-12">
                                                    No documents found
                                                </div>
                                            @endforelse
                                        @else
                                            <div class="col-md-12">
                                                No documents found
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @if($appointment->date == date('Y-m-d') && ((date('H:i:s') >= date('H:i:s',strtotime($appointment->start))) && (date('H:i:s') <= date('H:i:s',strtotime($appointment->end)))))
                                    <div class="tab-pane fade" id="appointment-log" role="tabpanel" aria-labelledby="appointment-log-tab">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <p class="start-msg {{$appointment->status > 2 ? 'd-none' : null}}">Press start button to start your consultation log</p>
                                                <p class="end-msg {{$appointment->status > 4 ? null : 'd-none'}}">Press end button to close your consultation log</p>
                                                <button class="btn btn-success {{$appointment->status > 2 ? 'd-none' : null}} start-log-btn">Start</button>
                                                <button class="btn btn-success start-video-btn">Connect to video</button>
                                                <button class="btn btn-danger {{$appointment->status > 4 ? null : 'd-none'}} end-log-btn">End</button>
                                                <div class="card mt-4">
                                                    <div class="card-header">
                                                        <h4>Appointment Log & Conference</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        {{--<button onclick="joinCall()" class="btn btn-success mb-3"> <i class="fa fa-video-camera"></i>  Connect</button>--}}
                                                        {{--<button onclick="endCall()" class="btn btn-warning mb-3"> <i class="fa fa-mobile-alt"></i>  End Call</button>--}}
                                                        {{--<div id="renderer" class="mb-3" style="height: 450px;"> </div>--}}
                                                        <div id="error"></div>
                                                        <div id="message"></div>
                                                        <div id="connectionStatus"></div>
                                                        <div id="participantStatus"></div>
                                                        <div id="renderer" class="rendererWithOptions pluginOverlay"></div>
                                                        <div id="toolbarCenter" class="toolbar mb-4">
                                                            <!-- This button toggles the camera privacy on or off. -->
                                                            <button id="cameraButton" title="Camera Privacy" class="toolbarButton cameraOn"></button>

                                                            <!-- This button joins and leaves the conference. -->
                                                            <button id="joinLeaveButton" title="Join Conference" class="toolbarButton callStart"></button>

                                                            <!-- This button mutes and unmutes the users' microphone. -->
                                                            <button id="microphoneButton" title="Microphone Privacy" class="toolbarButton microphoneOn"></button>
                                                        </div>
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <td>Patient Name</td>
                                                                <td>Time</td>
                                                            </tr>
                                                            </thead>
                                                            <tbody id="log-body">
                                                            @foreach($appointment->getTimeLog as $log)
                                                                <tr>
                                                                    <td>{{$log->user->name}}</td>
                                                                    <td>{{date('Y-m-d h:i:s A',strtotime($log->time))}}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="imageModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
    </div>
@endsection
@section('script')
    <script src="{{asset('/')}}js/VidyoConnector.js"></script>
@endsection
@push('script')
    <script>
        // Get the modal
        var modal = document.getElementById("imageModal");
        $('.myImg').click(function(){
            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = $(this);
            var modalImg = document.getElementById("img01");
            modal.style.display = "block";
            modalImg.src = this.src;
        })
        // When the user clicks on <span> (x), close the modal
        $('.close').click(function() {
            modal.style.display = "none";
        });
    </script>
    @if($appointment->date == date('Y-m-d') && ((date('H:i:s') >= date('H:i:s',strtotime($appointment->start))) && (date('H:i:s') <= date('H:i:s',strtotime($appointment->end)))))
        <script>
            var configParams = {};
            var vidyoMediaBridge
            function onVidyoClientLoaded(status) {
                switch (status.state) {
                    case "READY":    // The library is operating normally
                        $("#connectionStatus").html("Ready to Connect");
                        $("#helper").addClass("hidden");
                        $("#optionsVisibilityButton").removeClass("hidden");
                        $("#renderer").removeClass("hidden");
                        $("#toolbarLeft").removeClass("hidden");
                        $("#toolbarCenter").removeClass("hidden");
                        $("#toolbarRight").removeClass("hidden");

                        // If configured to autoJoin, then show video full screen immediately
                        if (configParams.autoJoin === "1") {
                            $("#optionsVisibilityButton").addClass("showOptions").removeClass("hideOptions");
                            $("#renderer").addClass("rendererFullScreen").removeClass("rendererWithOptions");
                        } else
                            $("#options").removeClass("hidden");

                        // After the VidyoClient is successfully initialized a global VC object will become available
                        // All of the VidyoConnector gui and logic is implemented in VidyoConnector.js
                        var webrtcExtensionPath = "";
                        if (VCUtils.params.webrtc === "true") {
                            if (status.hasOwnProperty("downloadPathWebRTCExtensionFirefox"))
                                webrtcExtensionPath = status.downloadPathWebRTCExtensionFirefox;
                            else if (status.hasOwnProperty("downloadPathWebRTCExtensionChrome"))
                                webrtcExtensionPath = status.downloadPathWebRTCExtensionChrome;
                        }
                        StartVidyoConnector(VC, VCUtils.params.webrtc, webrtcExtensionPath, configParams);

                        break;
                    case "RETRYING": // The library operating is temporarily paused
                        $("#connectionStatus").html("Temporarily unavailable retrying in " + status.nextTimeout/1000 + " seconds");
                        break;
                    case "FAILED":   // The library operating has stopped
                        ShowFailed(status);
                        $("#connectionStatus").html("Failed: " + status.description);
                        break;
                    case "FAILEDVERSION":   // The library operating has stopped
                        UpdateHelperPaths(status);
                        ShowFailedVersion(status);
                        $("#connectionStatus").html("Failed: " + status.description);
                        break;
                    case "NOTAVAILABLE": // The library is not available
                        UpdateHelperPaths(status);
                        $("#connectionStatus").html(status.description);
                        break;
                }
                return true; // Return true to reload the plugins if not available
            }

            var log_start = {{($appointment->status == 2 || $appointment->status == 3) ? 1 : 0}}

            $('.start-log-btn').click(function () {
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes , I want to start.'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: "{{route('appointment.time.log',$appointment->id)}}",
                            method: 'POST',
                            'data': {
                                '_token': "{{csrf_token() }}",
                                'provider_start' : 1
                            },
                            success: function(data) {
                                if(data === 'success'){
                                    log_start = 1;
                                    $('.start-log-btn').addClass('d-none')
                                    $('.end-log-btn').removeClass('d-none')
                                    $('.start-msg').addClass('d-none')
                                    $('.end-msg').removeClass('d-none')
                                    loadVidyoClientLibrary(true,false)
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success',
                                        text: "Your consultation started.Please Make sure you press end button while it finished."
                                    })
                                }
                                else{
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops....',
                                        text: "Something went wrong"
                                    })
                                }
                            },
                            err: function(err) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops....',
                                    text: "Something went wrong"
                                })
                            }
                        });
                    }
                })
            })

            $('.end-log-btn').click(function () {
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes , I want to end.'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: "{{route('appointment.time.log',$appointment->id)}}",
                            method: 'POST',
                            'data': {
                                '_token': "{{csrf_token() }}",
                                'provider_end': 1
                            },
                            success: function(data) {
                                if(data === 'success'){
                                    $('.end-log-btn').addClass('d-none')
                                    $('.end-msg').addClass('d-none')
                                    log_start = 0
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success',
                                        text: 'Your consultation finished. Thank you!!!'
                                    })
                                }else{
                                    $('.end-log-btn').addClass('d-none')
                                    $('.end-msg').addClass('d-none')
                                    log_start = 0
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success',
                                        text: data
                                    })
                                }
                            },
                            err: function(err) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: "Your consultation started.Please Make sure you press end button while it finished."
                                })
                            }
                        });
                    }
                })
            })

            $('.start-video-btn').click(function () {
                loadVidyoClientLibrary()
                    $(this).addClass('d-none')
            })

            setInterval(function () {
                if(log_start == 1){
                    $.ajax({
                        url: "{{route('appointment.time.log',$appointment->id)}}",
                        method: 'POST',
                        'data': {
                            '_token': "{{csrf_token() }}"
                        },
                        success: function(data) {
                            console.log(data)
                            if(data !== 'success'){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops....',
                                    text: "Something went wrong"
                                })
                            }
                        },
                        err: function(err) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops....',
                                text: "Something went wrong"
                            })
                        }
                    })
                }
            },90000)

            setInterval(function () {
                $.ajax({
                    url: "{{route('appointment.time.log.get',$appointment->id)}}",
                    method: 'POST',
                    'data': {
                        '_token': "{{csrf_token() }}"
                    },
                    success: function(data) {
                        $('#log-body').html(data);
                    },
                    err: function(err) {
                        alert('Something went wrong!!!!')
                    }
                });
            },60000)

            function loadVidyoClientLibrary(webrtc, plugin) {
                // If webrtc, then set webrtcLogLevel
                var webrtcLogLevel = "";
                if (webrtc) {
                    // Set the WebRTC log level to either: 'info' (default), 'error', or 'none'
                    webrtcLogLevel = '&webrtcLogLevel=info';
                }

                //We need to ensure we're loading the VidyoClient library and listening for the callback.
                var script = document.createElement('script');
                script.type = 'text/javascript';
                script.src = 'https://static.vidyo.io/4.1.20.3/javascript/VidyoClient/VidyoClient.js?onload=onVidyoClientLoaded&webrtc=' + webrtc + '&plugin=' + plugin + webrtcLogLevel;
                document.getElementsByTagName('head')[0].appendChild(script);
            }
        </script>
    @endif
@endpush
