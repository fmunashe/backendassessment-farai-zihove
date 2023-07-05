<?php

namespace App\Http\Livewire\Todo;

use App\Enums\UserTypeEnum;
use App\Models\Todo;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class TodoIndex extends LivewireDatatable
{
    public $hideable = "select";

    public function builder()
    {
        if (auth()->user()->user_type == UserTypeEnum::USER) {
            return Todo::query()
                ->with(['user'])
                ->where('user_id', '=', auth()->user()->id);

        }
        return Todo::query()->with(['user']);
    }

    public function columns()
    {
        ini_set('memory_limit', '-1');
        return [
            NumberColumn::name('id')
                ->label(trans('ID')),

            Column::name('title')
                ->searchable()
                ->filterable()
                ->label(trans('Title')),

            Column::name('description')
                ->searchable()
                ->filterable()
                ->label(trans('Description')),

            Column::name('user.name')
                ->searchable()
                ->filterable()
                ->label(trans('Author')),

            Column::callback(['id'], function ($id) {
                $todo = Todo::query()->where('id', '=', $id)->first();
                return view('todos.todo_action_buttons',
                    ['todo' => $todo]);
            })
                ->unsortable()
                ->excludeFromExport(),
        ];
    }
}
