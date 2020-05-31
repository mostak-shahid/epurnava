@extends('layouts.dashboard')
@include('includes.functions')
@section('content')
<div class="container auth-page">
    <div class="content-wrap">
        <div class="row">
            @include('dashboard.menu')
            <div class="col-md-6">
                <div class="bg-white dashboard-wrapper">
                    <h2 class="text-center auth-title small-border font-xs-24 line-height-xs-30 mb30 mb-xs-20">{{ __('Address Book') }}</h2>
                    @php($address = get_user_meta($profile, 'address'))
                    @if(is_array($address) && sizeof($address))
                        <div class="default-address px30 px-xs-0 mb40">
                            <h5 class="font-16 line-height-26 text-purple font-weight-bold pb10 mb20 border-bottom">Default Address</h5>
                            @php($n=0)
                            @foreach($address as $data)
                                @if($data['type'] == 'default')
                                    <div class="address-desc position-relative">
                                        <ul class="list-inline address-action body-2">
                                            <li class="list-inline-item"><a class="text-blue edit-address" href="#" data-id="{{$n}}">Edit</a></li>
                                        </ul>
                                        <div class="address-unit mb15">
                                            <div class="caption text-black-60">Name :</div>
                                            <strong>{{$data['first_name']}} {{$data['last_name']}}</strong>
                                        </div>
                                        <div class="address-unit mb15">
                                            <div class="caption text-black-60">Address :</div>
                                            <strong>{{$data['address']}}</strong>
                                        </div>
                                        <div class="address-unit">
                                            <div class="caption text-black-60">Mobile No :</div>
                                            <strong>{{$data['phone']}}</strong>
                                        </div>
                                    </div>
                                @endif
                                @php($n++)
                            @endforeach
                        </div>
                        <div class="other-address px30 px-xs-0">
                            <h5 class="font-16 line-height-26 text-black-80 font-weight-bold pb10 mb20 border-bottom">Other Address</h5>
                            @php($n=0)
                            @foreach($address as $data)
                                @if($data['type'] == 'other')
                                    <div class="address-desc position-relative">
                                        <ul class="list-inline address-action body-2">
                                            <li class="list-inline-item"><a class="text-blue edit-address" href="#" data-id="{{$n}}">Edit</a></li>
                                            <li class="list-inline-item"><a class="text-red" href="{{route('dashboard.address.delete',['id'=>$n])}}" data-id="{{$n}}">Delete</a></li>
                                            <li class="list-inline-item"><a class="text-purple" href="{{route('dashboard.address.setdefault',['id'=>$n])}}" data-id="{{$n}}">Set as Default</a></li>
                                        </ul>
                                        <div class="address-unit mb15">
                                            <div class="caption text-black-60">Name :</div>
                                            <strong>{{$data['first_name']}} {{$data['last_name']}}</strong>
                                        </div>
                                        <div class="address-unit mb15">
                                            <div class="caption text-black-60">Address :</div>
                                            <strong>{{$data['address']}}</strong>
                                        </div>
                                        <div class="address-unit">
                                            <div class="caption text-black-60">Mobile No :</div>
                                            <strong>{{$data['phone']}}</strong>
                                        </div>
                                    </div>
                                @endif
                                @php($n++)
                            @endforeach
                        </div>
                    @endif
                    <div class="row justify-content-center mt40">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-theme btn-theme-primary btn-font add-address">{{ __('Add New Address') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addressModal" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="addressModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-body auth-wrapper">
                    <h3 class="modal-title text-center mb30">{{__('Create Address')}}</h3>
                    <form method="POST" action="{{route('dashboard.address.store')}}" class="needs-validation" novalidate>
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group position-relative pt20">
                                    <input id="first_name" type="text" class="form-control theme-input" name="first_name" required>
                                    <label for="first_name" class="smooth animated-label font-lato">{{ __('First Name') }}</label>
                                    <span class="invalid-feedback font-lato">Please enter a valid first name</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group position-relative pt20">
                                    <input id="last_name" type="text" class="form-control theme-input" name="last_name">
                                    <label for="last_name" class="smooth animated-label font-lato">{{ __('Last Name') }}</label>
                                    <span class="invalid-feedback font-lato">Please enter a valid last name</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group position-relative pt20">
                            <input id="phone" type="tel" class="form-control theme-input" name="phone" required>
                            <label for="phone" class="smooth animated-label font-lato">{{ __('Mobile No') }}</label>
                            <span class="invalid-feedback font-lato">Please enter a valid mobile no</span>
                        </div>
                        <div class="form-group position-relative pt20">
                            <input id="fax" type="tel" class="form-control theme-input" name="fax">
                            <label for="fax" class="smooth animated-label font-lato">{{ __('Fax (Optional)') }}</label>
                        </div>
                        <div class="form-group position-relative pt20">
                            <input id="address" type="text" class="form-control theme-input" name="address" required>
                            <label for="address" class="smooth animated-label font-lato">{{ __('Address') }}</label>
                            <span class="invalid-feedback font-lato">Please enter a valid address</span>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group position-relative pt20">
                                    <select class="custom-select theme-input" id="district">
                                        <option></option>
                                        <option value="1">Dhaka</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <label for="district" class="smooth animated-label font-lato">{{ __('District') }}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group position-relative pt20">
                                    <input id="old_postcode" type="text" class="form-control theme-input" name="postcode">
                                    <label for="old_postcode" class="smooth animated-label font-lato">{{ __('Post Code') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="default" name="default">
                            <label class="custom-control-label caption" for="default">Save it as a default shipping address</label>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6"><button type="button" class="btn btn-theme btn-theme-light btn-font" data-dismiss="modal">{{__('Cancel')}}</button></div>
                            <div class="col-md-6"><button type="submit" class="btn btn-theme btn-theme-light-alt btn-font btn-action">{{__('Create')}}</button></div>
                        </div>
                        <input type="hidden" id="address_id" name="address_id" value="new">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    jQuery(document).ready(function($){
        $('.edit-address').click(function(e){
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                url:"{{route('address.single')}}"+"/"+id,
                type:"GET",
                dataType:"json",
                success: function(result){
                    console.log(result);
                    if(result.first_name) {
                        $('#first_name').val(result.first_name).addClass('not-null');
                    } else {
                        $('#first_name').val('').removeClass('not-null');
                    }
                    if(result.last_name) {
                        $('#last_name').val(result.last_name).addClass('not-null');
                    } else {
                        $('#last_name').val('').removeClass('not-null');
                    }
                    if(result.phone) {
                        $('#phone').val(result.phone).addClass('not-null');
                    } else {
                        $('#phone').val('').removeClass('not-null');
                    }
                    if(result.fax) {
                        $('#fax').val(result.fax).addClass('not-null');
                    } else {
                        $('#fax').val('').removeClass('not-null');
                    }
                    if(result.address) {
                        $('#address').val(result.address).addClass('not-null');
                    } else {
                        $('#address').val('').removeClass('not-null');
                    }
                    if(result.district) {
                        $('#district').val(result.district).addClass('not-null');
                    } else {
                        $('#district').val('').removeClass('not-null');
                    }
                    if(result.postcode) {
                        $('#postcode').val(result.postcode).addClass('not-null');
                    } else {
                        $('#postcode').val('').removeClass('not-null');
                    }
                    if(result.type == 'default') {
                        $('#default').prop( "checked", true );
                    } else{
                        $('#default').prop( "checked", false );
                    }
                    $('#address_id').val(id);
                    $('.modal-title').html("{{__('Edit Address')}}");
                    $('.btn-action').html("{{__('Update')}}");
                    $('#addressModal').modal('show');
                },
                error: function(errorThrown){
                    console.log(errorThrown);
                }
            });
        });
        $('.add-address').click(function(e){
            e.preventDefault();
            $('#address_id').val('new');
            $('.modal-title').html("{{__('Create Address')}}");
            $('.btn-action').html("{{__('Create')}}");
            $('#addressModal').modal('show');
        });
        $('#addressModal').on('shown.bs.modal', function () {
            $('#first_name').trigger('focus')
        });

    });
</script>
@endsection
