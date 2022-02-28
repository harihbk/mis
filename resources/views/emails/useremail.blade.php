<DOCTYPE html>
    <html lang="en-US">

        <head>
            <meta charset="utf-8">
        </head>

        <body>
            <p>Dear {{$user->name}},</p>
            <p>
                You have added as {{$role}} in Best India Kart.Please find the credentials below:
            </p>
            <p>
                Email: {{$user->email}}
            </p>
            <p>
                Password: {{$password}}
            </p>
            {{-- @php
                $email = base64_encode($user->email);
            @endphp --}}
            <p>Click<a href="{{url($url)}}" > here</a> to change change password and login</p>
            <p>If you did not create an account, no further action is required.</p>

            <p>
                Best regards, <br>

                {{ config('app.name')}}
            </p>

        </body>

    </html>
