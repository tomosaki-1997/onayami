<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Text extends Model implements Searchable
{
    use HasFactory;

    protected $guarded = [];

    public function getSearchResult(): SearchResult
    {
        // A.検索結果のリンク先となるルートを入れる
       $url = route('text.show', $this->id);

        return new SearchResult(
           $this,
        //    B.検索結果で表示したいカラムを入れる
           $this->title,
           $url
        );
    }
