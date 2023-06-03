<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品情報登録</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}"></head>
<body>
    <a href="{{ route('products.index') }}">戻る</a>
    <h1>商品情報登録</h1>

    <form method="post" action="{{ route('products.store') }}">
        @csrf

        <table>
            <tr>
                <th>商品名</th>
                <td><input type="text" name="product_name" value="{{ old('product_name') }}"></td>
                @error('product_name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </tr>
            <tr>
                <th>メーカー</th>
                <td>
                    <select name="company_name" value="{{ old('company_name') }}">
                        @foreach ($companies as $company)
                            <option>{{$company->company_name}}</option>
                        @endforeach
                    </select>
                </td>
                @error('company_name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </tr>
            <tr>
                <th>価格</th>
                <td><input type="text" name="price" value="{{ old('price') }}"></td>
                @error('price')
                    <div class="error">{{ $message }}</div>
                @enderror
            </tr>
            <tr>
                <th>在庫数</th>
                <td><input type="text" name="stock" value="{{ old('stock') }}"></td>
                @error('stock')
                    <div class="error">{{ $message }}</div>
                @enderror
            </tr>
            <tr>
                <th>コメント</th>
                <td><textarea name="comment"></textarea></td>
            </tr>
            <tr>
                <th>商品画像</th>
                <td><input type="file" name="img_path"></td>
            </tr>
        </table>
        <button>登録</button>
    </form>
</body>
</html>
