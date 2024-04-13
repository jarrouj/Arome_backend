<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>

<body>
    @if($existingSubscriber)
    <h3>
        You're already subscribed.
    </h3>
    @else
    <h3>
        Hello Aroma Family, we wanted you to know that you received a new message from your website.
        Please Find the information provided below!
    </h3>
    <h4>Discount: {{ $subscriberData['discount'] }}</h4>
    <h4>Promo: {{ $subscriberData['promo'] }}</h4>

    @endif
</body>

</html>
