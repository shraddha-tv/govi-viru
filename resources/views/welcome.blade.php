<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <button onclick="signin()">get data</button>

                </div>
            </div>
        </div>
        <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
        <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-app.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>

        <!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
        <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-analytics.js"></script>

        <!-- Add Firebase products that you want to use -->
        <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.14.2/firebase-firestore.js"></script>
        <script>
            // TODO: Replace the following with your app's Firebase project configuration
            var firebaseConfig = {
                apiKey: "AIzaSyA3bkTnG7jah3NYVlDfNWTeDLo-1oA9fVs",
                authDomain: "fir-phone-auth-test-1-643ec.firebaseapp.com",
                databaseURL: "https://fir-phone-auth-test-1-643ec.firebaseio.com",
                projectId: "fir-phone-auth-test-1-643ec",
                storageBucket: "fir-phone-auth-test-1-643ec.appspot.com",
                messagingSenderId: "720383824990",
                appId: "1:720383824990:web:f58b702809855682f310cf",
                measurementId: "G-LJ9T6T4KHN"
            };

            // Initialize Firebase
            firebase.initializeApp(firebaseConfig);
            async function signin() {
                console.log('signing in')
                let creds = await firebase.auth().signInWithEmailAndPassword('test@testing.lk', 'test@testing.lk')
                console.log({ creds })
                let token = await creds.user.getIdToken()
                console.log({ token })
                let headers = { Authorization: 'Bearer ' + token }
                let me = await axios.get('/api/phone?phoneNo=0713095808', { headers })
                console.log({ me })
            }
          </script>
    </body>
</html>
