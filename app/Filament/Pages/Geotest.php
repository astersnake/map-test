<?php

namespace App\Filament\Pages;

use Cheesegrits\FilamentGoogleMaps\Fields\Geocomplete;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;

class Geotest extends Page
{
    public $street = '';
    public $location = '';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.geotest';

    public function getFormSchema(): array
    {
        return [
            Grid::make()
                ->schema(
                    [
                        TextInput::make('street')
                            ->label('Street')
                            ->placeholder('Street')
                            ->required(),
                        Geocomplete::make('location')
                            ->isLocation()
                            ->geocodeOnLoad()
                            ->reverseGeocode([
                                'street' => '%L',
                            ]),
                    ]
                )
        ];
    }
}
