<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>商品情報一覧</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}"></head>
<body>
    <h1>商品情報一覧</h1>
    <div class="FormGroup">
        <a href="{{ route('products.create') }}"> <button type="button">新規登録</button></a>
        <form method="get" action="{{ route('products.index') }}">
            @csrf

            <input type="text" name="keyword" value="{{ $keyword }}">
            <select name="company_name">
                <option value="">すべて</option>
                @foreach ($companies as $company)
                    <option value="{{ $company->company_name }}">{{$company->company_name}}</option>
                @endforeach
            </select>
            <input type="submit" value="検索">
        </form>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>商品画像</th>
            <th>商品名</th>
            <th>価格</th>
            <th>在庫数</th>
            <th>メーカー名</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->img_path }}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->company->company_name }}</td>
            <td>
                <a href="{{ route('products.show', $product) }}"><button type="button">詳細</button></a>
            </td>
            <td>
            <form method="post" action="{{ route('products.destroy', $product) }}" onclick='return confirm("削除しますか？")'>
                @method('DELETE')
                @csrf

                <button>削除</button>
            </form>
            </td>
        </tr>
        @endforeach
    </table>
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-dropdown-link>
    </form>
</body>
</html>
