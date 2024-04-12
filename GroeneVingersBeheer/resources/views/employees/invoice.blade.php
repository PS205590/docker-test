<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
</head>
<body>
<h1>Invoice</h1>
<ul>
    @foreach($selectedItems as $item)
        <li>{{ $item['name'] }} - ${{ $item['price'] }}</li>
    @endforeach
</ul>
<p>Total: ${{ array_sum(array_column($selectedItems, 'price')) }}</p>
</body>
</html>
