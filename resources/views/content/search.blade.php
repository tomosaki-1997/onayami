@if (count($results) > 0)
    <ul>
        @foreach ($results as $result)
            <li>{{ $result->name }}</li>
        @endforeach
    </ul>
@else
    <p>検索結果がありません。</p>
@endif
