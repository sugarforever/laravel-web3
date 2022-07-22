<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Calendar extends Component
{
    public $years;
    public $months;
    public $selectedYear;
    public $selectedMonth;
    public $show;

    public $queryString = [
        'selectedYear' => [
            'as' => 'year'
        ],
        'selectedMonth' => [
            'as' => 'month'
        ]
    ];

    public function mount()
    {
        $this->show = false;
        $this->years = [2022, 2023, 2024];
        $this->months = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
    }

    public function render()
    {
        return view('livewire.calendar');
    }

    public function getDaysProperty()
    {
        $firstDay = $this->selectedYear . '-' . $this->selectedMonth . '-01';
        $dayOfWeek = date('w', strtotime($firstDay));

        $days = [];

        for ($i = 0; $i < $dayOfWeek - 1; $i = $i + 1) {
            $days[] = '';
        }

        $numberOfDays = date('t', strtotime($firstDay));
        for ($i = 0; $i < $numberOfDays; $i = $i + 1) {
            $days[] = ($i + 1);
        }

        $lastDay = $this->selectedYear . '-' . $this->selectedMonth . '-' . $numberOfDays;
        $lastDayOfWeek = date('w', strtotime($lastDay));

        $colsToAdd = 7 - $lastDayOfWeek;
        for ($i = 0; $i < $colsToAdd; $i = $i + 1) {
            $days[] = '';
        }
        return $days;
    }

    public function onSave()
    {
        Log::debug("Saving user inputs");
        $this->show = false;
    }
}
