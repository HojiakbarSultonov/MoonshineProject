<?php

namespace App\MoonShine\Resources;

use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\Image;
use \MoonShine\Fields\Text;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class ArticleResource extends Resource
{
	public static string $model = Article::class;

	public static string $title = 'Статьи';

	public function fields(): array
	{
		return [
		    ID::make()->sortable(),
         Grid::make([
             Column::make([
                     Block::make('Ma\'lumotlar', [
                         Text::make('title')
                             ->hint('Hint')
                             ->addLink('Link', 'https://cutcode.dev')
                             ->required(),
                         Text::make('title')
                             ->hint('Hint')
                             ->addLink('Link', 'https://cutcode.dev')
                             ->required(),
//                         Text::make('Slug'),
//                         Text::make('thumbnail'),
//                         Text::make('description'),
//                         Image::make('photo')
                     ])
                 ])->columnSpan(8),
             Column::make([
                 Block::make('Ma\'lumotlar', [
                    Tabs::make( [
                        Tab::make('vkladka 1',[
                            Text::make('title')
                                ->hint('Hint')
                                ->addLink('Link', 'https://cutcode.dev')
                                ->required(),

//                         Text::make('Slug'),
//                         Text::make('thumbnail'),
//                         Text::make('description'),
//                         Image::make('photo')
                        ]),
                        Tab::make('vkladka 2',[
                            Text::make('title')
                                ->hint('Hint')
                                ->addLink('Link', 'https://cutcode.dev')
                                ->required(),

//                     Text::make('Slug'),
//                         Text::make('thumbnail'),
//                         Text::make('description'),
//                         Image::make('photo')
                        ])
                    ])
                 ])
             ])->columnSpan(4)

         ])

        ];


	}

	public function rules(Model $item): array
	{
	    return [];
    }

    public function search(): array
    {
        return ['id'];
    }

    public function filters(): array
    {
        return [];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
        ];
    }
}
