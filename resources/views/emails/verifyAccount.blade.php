@php
    if(!empty($details)):
        $companyName    = $details->companyName;
    else:
        $companyName    = "invoiceMyCRM";
    endif;
@endphp
@component('mail::message')
# Introduction

<p>Hello Mr. {{ $name }}</p>
<p>Thanks for creating your account with our company. Please verify your account to continue</p>

@component('mail::button', ['url' => $url])
Verify Email
@endcomponent
<p>If you're having trouble clicking the "Verify Email Address" button, copy and paste the URL below into your web browser: {{ $url }}</p>
Thanks,<br>
{{ $companyName }}
@endcomponent
