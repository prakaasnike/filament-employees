<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use App\Models\Country;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class EmployeeStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $ind = Country::where('country_code', 'IND')->withCount('employees')->first();
        $np = Country::where('country_code', 'NP')->withCount('employees')->first();
        return [
            Card::make('All Employees', Employee::all()->count()),
            Card::make('Indian Employees', $ind ? $ind->employees_count : 0),
            Card::make('Nepali Employees',  $np ? $np->employees_count : 0),

        ];
    }
}
