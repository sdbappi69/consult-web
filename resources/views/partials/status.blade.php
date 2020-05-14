<!-- error/success messages -->
{{--@if (count($errors))--}}
{{--<div class="alert alert-danger alert-with-border alert-dismissible alert-message" role="alert">--}}
{{--<i class="ti-alert m-r-10"></i> {{ $errors->all()[0] }}--}}
{{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--<span aria-hidden="true">&times;</span>--}}
{{--</button>--}}
{{--</div>--}}
{{--@endif--}}

{{--@if(session()->has('success'))--}}
{{--<div class="alert alert-success alert-with-border alert-dismissible alert-message" role="alert">--}}
{{--<i class="ti-check m-r-10"></i> {{ session()->get('success') }}--}}
{{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--<span aria-hidden="true">&times;</span>--}}
{{--</button>--}}
{{--</div>--}}
{{--@endif--}}

{{--@if(session()->has('error'))--}}
{{--<div class="alert alert-danger alert-with-border alert-dismissible alert-message" role="alert">--}}
{{--<i class="ti-alert m-r-10"></i> {{ session()->get('error') }}--}}
{{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--<span aria-hidden="true">&times;</span>--}}
{{--</button>--}}
{{--</div>--}}
{{--@endif--}}
{{--<!-- END -->--}}

@push('script')
      <script>
            if({{count($errors)}}){
                  Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: "{{$errors->first()}}"
                  })
            }
            if("{{session()->has('success')}}"){
                  Swal.fire({
                        icon: 'success',
                        title: 'Success...',
                        text: "{{session()->get('success')}}"
                  })
            }
            if("{{session()->has('error')}}"){
                  Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: "{{session()->get('error')}}"
                  })
            }
      </script>
@endpush