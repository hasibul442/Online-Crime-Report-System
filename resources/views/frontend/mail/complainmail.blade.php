<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Complain Code</title>
</head>
<body>

    <div class="container-fluid">
        <h5 class="text-center">অভিনন্দন, আপনার অভিযোগটি নিবন্ধিত হয়েছে। অভিযোগের স্ট্যাটাস দেখার জন্য নিচের নাম্বারটি ব্যবহার করুন।</h5>
        <br>
        <p class="text-center h1 text-success">{{ $complain->complain_no }}</p>

        <h4>অভিযোগের বিবরণ:</h4>
        <p>{!! $complain->description !!}</p>
    </div>



</body>
</html>
