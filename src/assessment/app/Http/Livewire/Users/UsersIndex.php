<?php

namespace App\Http\Livewire\Users;

use App\Enums\UserTypeEnum;
use App\Models\ContractStatus;
use App\Models\SeniorityLevel;
use App\Models\Specialisation;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use mysql_xdevapi\Collection;

class UsersIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public $seniorityLevels;
    public $specialisations;
    public $contractStatus;


    public function render()
    {
        $this->seniorityLevels = SeniorityLevel::all();
        $this->specialisations = Specialisation::all();
        $this->contractStatus = ContractStatus::all();
        if (auth()->user()->type == UserTypeEnum::ADMIN || auth()->user()->type == UserTypeEnum::SUPER_ADMIN) {
            if ($this->search != null) {
                $users = User::with(['certificationsAndEducation', 'achievements',
                    'seniorityLevel', 'firmExperiences', 'professionalExperience',
                    'internationalExperiences', 'softwareExperiences', 'additionalExperiences', 'hostFirms', 'firstTimeAuditClients',
                    'clientRevenues', 'industries', 'listedClients', 'sectors', 'scheduling'])
                    ->where('name', 'like', '%' . $this->search . '%')
                    ->orWhereHas('seniorityLevel', function ($query) {
                        $query->where('seniorityLevelDescription', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('specialisation', function ($query) {
                        $query->where('specialisationDescription', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('contractStatus', function ($query) {
                        $query->where('contractStatusDescription', 'like', '%' . $this->search . '%');
                    })
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('saproEmail', 'like', '%' . $this->search . '%')
                    ->orWhere('type', 'like', '%' . $this->search . '%')
                    ->orWhere('saproId', 'like', '%' . $this->search . '%')->latest()->paginate(10);
            } else {
                $users = User::query()->with(['certificationsAndEducation', 'achievements',
                    'seniorityLevel', 'firmExperiences', 'professionalExperience',
                    'internationalExperiences', 'softwareExperiences', 'additionalExperiences', 'hostFirms', 'firstTimeAuditClients',
                    'clientRevenues', 'industries', 'listedClients', 'sectors', 'scheduling'])->paginate(10);
            }
        } else {
            $users = User::query()
                ->where('id', '=', auth()->user()->id)
                ->with(['certificationsAndEducation', 'achievements',
                    'seniorityLevel', 'firmExperiences', 'professionalExperience',
                    'internationalExperiences', 'softwareExperiences', 'additionalExperiences', 'hostFirms', 'firstTimeAuditClients',
                    'clientRevenues', 'industries', 'listedClients', 'sectors', 'scheduling'])
                ->paginate(10);
        }

        return view('livewire.users.users-index', compact('users'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function clearSearch()
    {
        $this->reset('search');
    }
}
