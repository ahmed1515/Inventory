<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use OwenMelbz\RadioField\RadioButton;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\File;

class Item extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Item::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),

            RadioButton::make('Item Number')
            ->options([
                0 => 'System Generated',
                1 => 'Custom Item Number',
            ])
            ->default(0) // optional
            ->stack() // optional (required to show hints)
            ->marginBetween() // optional
            ->skipTransformation() // optional
            ->toggle([  // optional
                0 => ['item_num'] // will hide max_skips and skip_sponsored when the value is 1
            ]),

            Text::make('Custom Item Number','item_num')->withMeta([
                'extraAttributes' => [
                    'placeholder' => 'Enter Custom Item Number',
                ],
            ])->required(),

            Text::make('Item Name')->withMeta([
                'extraAttributes' => [
                    'placeholder' => 'Enter Custom Item Number',
                ],
            ])->required(),

            Text::make('Item Category')->withMeta([
                'extraAttributes' => [
                    'placeholder' => 'Enter Custom Item Number',
                ],
            ])->required(),

            Trix::make('Item Description')->alwaysShow()->required(),

            File::make('Item Image'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
