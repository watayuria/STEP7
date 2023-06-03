<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品情報編集</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}"></head>
<body>
    <a href="{{ route('products.show', $product) }}">戻る</a>
    <h1>商品情報編集</h1>

    <form method="post" action="{{ route('products.update', $product) }}">
        @method('PATCH')
        @csrf

        <table>
            <tr>
                <th>商品名</th>
                <td><input type="text" name="product_name" value="{{ old('product_name', $product->product_name) }}"></td>
                @error('product_name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </tr>
            <tr>
                <th>メーカー</th>
                <td>
                    <select name="company_name">
                        @foreach ($companies as $company)
                            <option value="{{ $company->company_name }}"{{ old('company_name', $product->company->company_name) == $company->company_name ? ' selected' : '' }}>{{ $company->company_name }}</option>
                        @endforeach
                    </select>
                </td>
                @error('company_name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </tr>
            <tr>
                <th>価格</th>
                <td><input type="text" name="price" value="{{ $product->price }}"></td>
                @error('price')
                    <div class="error">{{ $message }}</div>
                @enderror
            </tr>
            <tr>
                <th>在庫数</th>
                <td><input type="text" name="stock" value="{{ $product->stock }}"></td>
                @error('stock')
                    <div class="error">{{ $message }}</div>
                @enderror
            </tr>
            <tr>
                <th>コメント</th>
                <td><textarea name="comment" value="{{ $product->comment }}"></textarea></td>
            </tr>
            <tr>
                <th>商品画像</th>
                <td><input type="file" name="img_path" value="{{ $product->img_path }}"></td>
            </tr>
        </table>
        <button>更新</button>
    </form>
</body>
</html>
