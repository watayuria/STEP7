<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品情報詳細</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
</head>
<body>
    <a href="{{ route('products.index') }}">戻る</a>
    <h1>商品情報詳細</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>商品画像</th>
            <th>商品名</th>
            <th>メーカー名</th>
            <th>価格</th>
            <th>在庫数</th>
            <th>コメント</th>
        </tr>
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->img_path }}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->company ? $product->company->company_name : '' }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->comment }}</td>
            <td>
                <a href="{{ route('products.edit', $product) }}"><button type="button">編集</button></a>
            </td>
        </tr>
    </table>
</body>
</html>
