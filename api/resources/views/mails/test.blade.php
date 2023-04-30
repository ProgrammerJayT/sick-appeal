<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Sick Application</title>
    <style>
        /* Inline styles go here */
        body {
            width: 100%;
            background: url(&quot;assets/img/bg.jpg&quot;) center / cover no-repeat, var(--bs-secondary);
        }

        .container {
            padding: 15px;
        }

        .col-md-6 {
            flex-basis: 0;
            flex-grow: 1;
            max-width: 100%;
        }

        img {
            width: 100%;
        }

        div[style*=background] {
            box-shadow: 0px 0px 16px rgb(255, 255, 255);
            border-radius: 20px;
            padding: 10px;
            background: rgba(163, 0, 16, 0.29);
        }

        h1 {
            width: 100%;
            color: #fff;
        }

        h4 {
            width: 100%;
            margin-top: 20px;
            color: #fff;
        }

        p {
            margin-top: 20px;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-md-flex flex-row justify-content-md-center">
                <img src="assets/img/schedule.png">
            </div>
            <div class="col-md-6 d-md-flex flex-column justify-content-md-center align-items-md-start">
                <div
                    style="background: rgba(163,0,16,0.29); box-shadow: 0px 0px 16px rgb(255,255,255); border-radius: 20px; padding: 10px;">
                    <h1>Hey Student!</h1>
                    <h4>You have a new test scheduled by your lecturer, on the {{ $date }}</h4>
                    <p>Please make sure not to miss, however you will get a chance to apply for a sick test, provided
                        that you have a valid reason for missing the initial test</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
