<?php

namespace App\Http\Livewire\Users;

use App\Enums\UserAvailability;
use App\Enums\UserTypeEnum;
use App\Models\ContractStatus;
use App\Models\Country;
use App\Models\QualificationCategory;
use App\Models\SeniorityLevel;
use App\Models\Specialisation;
use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class UserDatatables extends LivewireDatatable
{

    public $hideable = "select";

    public function builder()
    {
        if (auth()->user()->user_type == UserTypeEnum::USER) {
            return User::query()->with('todos')
                ->where('id', '=', auth()->user()->id);
//                ->join('certifications_and_education', 'certifications_and_education.saproId', '=', 'users.saproId');

        }
        return User::query()->with('todos');
//            ->leftJoin('schedulings', 'schedulings.saproId', '=', 'users.saproId');
    }

    public function columns()
    {
        ini_set('memory_limit', '-1');
        return [
            NumberColumn::name('id')
                ->label(trans('ID')),

            Column::name('name')
                ->searchable()
                ->filterable()
                ->label(trans('Name')),

            Column::name('surname')
                ->searchable()
                ->filterable()
                ->label(trans('Surname')),
            Column::name('email')
                ->searchable()
                ->filterable()
                ->label(trans('Email')),

            Column::name('user_type')
                ->searchable()
                ->filterable($this->roles)
                ->label(trans('Role')),

            Column::callback(['id'], function ($id) {
                $user = User::query()->where('id', '=', $id)->first();
                return view('users.user_action_buttons',
                    ['user' => $user]);
            })
                ->unsortable()
            ->excludeFromExport(),
        ];
    }
    public function getRolesProperty()
    {
        return [UserTypeEnum::SUPER_ADMIN, UserTypeEnum::ADMIN, UserTypeEnum::USER, UserTypeEnum::REPORTING];
    }

}
