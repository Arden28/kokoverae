<?php

namespace Modules\Employee\Livewire\Employees;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Modules\Employee\Entities\Department;
use Modules\Employee\Entities\Employee;
use Modules\Employee\Entities\Job;
use Modules\Employee\Entities\Workplace;

class Create extends Component
{
    public $name, $jobTitle, $phone, $mobile, $email, $society, $department, $manager, $job;

    public $work_address, $workplace, $role, $default_role;

    public $street, $street2, $city, $zip, $state, $country, $personal_email, $personal_phone, $bank_account_id, $language;

    public $marital, $children_no;

    public $contact_name, $contact_phone;

    public $certificate_level, $study_field, $school;

    public $visa_no, $work_permit_no, $visa_expiration_date, $work_permit_expiration_date;

    public $nationality, $national_id, $passport_no, $gender, $birthday, $birth_place, $birth_country, $is_resident;

    public $jobs, $employees, $departments, $workplaces;

    protected $rules = [
        'name' => 'required|string|max:50',
        'mobile' => 'nullable|string|max:60',
        'phone' => 'required|string|max:60',
        'email' => 'required|string|email|max:255',
        'society' => 'nullable|integer',
        'department' => 'nullable|integer',
        'job' => 'required|integer',
        'manager' => 'nullable|integer|gt:0',
        // Location
        'work_address' => 'nullable|string|max:100',
        'workplace' => 'nullable|integer|gt:0',
        'role' => 'nullable|string|max:60',
        'default_role' => 'nullable|string|max:60',
        // Personnal Info
        'street' => 'nullable|string|max:50',
        'street2' => 'nullable|string|max:50',
        'state' => 'nullable|string|max:50',
        'city' => 'nullable|string|max:50',
        'zip' => 'nullable|string',
        'country' => 'nullable|string',
        'personal_email' => 'nullable|string|email|max:255|unique:'.Employee::class,
        'personal_phone' => 'nullable|min:9|unique:'.Employee::class,
        'bank_account_id' => 'nullable|integer|max:255|unique:'.Employee::class,
        // Family Context Information
        'marital' => 'nullable|string',
        'children_no' => 'nullable|string',
        // Emergecy case
        'contact_name' => 'nullable|string|max:100',
        'contact_phone' => 'nullable|number',
        // Educational Information
        'certificate_level' => 'nullable|string|max:100',
        'study_field' => 'nullable|string|max:100',
        'school' => 'nullable|string|max:100',
        // Citizeship
        'nationality' => 'nullable|string|max:100',
        'national_id' => 'nullable|string|max:100',
        'passport_no' => 'nullable|string|max:100',
        'gender' => 'nullable|string',
        'birthday' => 'nullable',
        'birth_place' => 'nullable|string|max:100',
        'birth_country' => 'nullable|string|max:100',
        'is_resident' => 'nullable|boolean',
        // Work Permit
        'visa_no' => 'nullable|string|integer',
        'work_permit_no' => 'nullable|string|integer',
        'visa_expiration_date' => 'nullable',
        'work_permit_expiration_date' => 'nullable',


    ];

    protected $messages = [
        'title.required' => 'A title is required',
        'body.required' => 'A message is required',
    ];

    public function mount()
    {
        $this->employees = Employee::isCompany(current_company()->id)->get();
        $this->departments = Department::isCompany(current_company()->id)->get();
        $this->jobs = Job::isCompany(current_company()->id)->get();
        $this->workplaces = Workplace::isCompany(current_company()->id)->get();
    }

    public function storeEmp(){
        $this->validate();

        // Create a user for the employee
        $user = User::create([
            'name' => $this->name,
            'team_id' => Auth::user()->team->id,
            'current_company_id' => current_company()->id,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make('koverae'),
        ]);
        $user->save();

        // Create the employee
        $employee = Employee::create([
            'company_id' => $user->current_company_id,
            'user_id' => $user->id,
            'department_id' => $this->department,
            'job_id' => $this->job,
            'manager_id' => $this->manager,
            'work_address' => $this->work_address,
            'workplace_id' => $this->workplace,
            'date_of_hire' => now(),

            'role' => $this->role,
            'default_role' => $this->default_role,

            'street' => $this->street,
            'street2' => $this->street2,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'personal_email' => $this->personal_email,
            'personal_phone' => $this->personal_phone,
            'bank_account_id' => $this->bank_account_id,
            'languages' => 'fr',

            'certificate_level' => $this->certificate_level,
            'study_field' => $this->study_field,
            'school_study' => $this->school,

            'marital_status' => $this->marital,
            'children_no' => $this->children_no,

            'contact_name' => $this->contact_name,
            'contact_phone' => $this->contact_phone,

            'nationality' => $this->nationality,
            'national_id' => $this->national_id,
            'passport_no' => $this->passport_no,
            'gender' => $this->gender,
            'birthday' => $this->birthday,
            'birth_place' => $this->birth_place,
            'birth_country' => $this->birth_country,
            'is_resident' => $this->is_resident,

            'visa_no' => $this->visa_no,
            'work_permit_no' => $this->work_permit_no,
            'visa_expiration_date' => $this->visa_expiration_date,
            'work_permit_expiration_date' => $this->work_permit_expiration_date,

        ]);
        $employee->save();
        // Clear form fields after creating the department.
        // $this->reset(['name', 'manager', 'parent', 'company']);

        session()->flash('message', __("L'employé à bien été ajouté !"));
        return redirect()->route('employee', ['subdomain' => current_company()->domain_name]);
    }

    public function render()
    {
        return view('employee::livewire.employees.create')
        ->layout('layouts.master');
    }
}
