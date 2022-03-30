@php
    $details = \App\Models\GeneralSettings::orderBy('id','DESC')->first();
    if(!empty($details)):
        $companyName    = $details->companyName;
        $address        = $details->address;
        $phone          = $details->phone;
        $email          = $details->email;
        $lightlogo      = url('/').'/public/assets/images/logo/'.$details->frontLogo;
        $logo           = url('/').'/public/assets/images/logo/'.$details->randLogo;
        $favicon        = url('/').'/public/assets/images/logo/'.$details->favicon;
    else:
        $companyName    = "invoiceMyCRM";
        $address        = "";
        $phone          = "";
        $email          = "";
        $logo           = "{{ asset('/') }}assets/img/logo.png";
        $lightlogo      = "{{ asset('/') }}assets/img/logo-light.png";
        $favicon        = "{{ asset('/') }}assets/css/frontend/appd75d.css?id=949b14b0a8504644cabc";
    endif;
@endphp
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (empty($logo))
<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
@else
<img src="{{ $logo }}" style="box-sizing:border-box;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';max-width:100%;border:none;height:50px;max-height:75px;width:200px" alt="{{ $companyName }}"/>
@endif
</a>
</td>
</tr>
