<div>
    <div class="k_form_sheet_bg">

        <form wire:submit.prepend="update({{ $employee->id }})">
        @csrf
        <!-- Status bar -->
        <div class="k_form_statusbar position-relative d-flex justify-content-between mb-0 mb-md-2 pb-2 pb-md-0">

            <div id="statusbar" class="k_statusbar_buttons d-flex align-items-center align-content-around flex-wrap gap-1">
                <button id="top-button" type="button" class="btn btn-secondary">
                    <span>
                        {{ __('Nouveau') }}
                    </span>
                </button>
                <button id="top-button" type="submit" wire:target="update({{ $employee->id }})" class="btn btn-secondary">
                    <span>
                        <i class="bi bi-cloud-arrow-up"></i>
                        {{ __('Enregistrer') }}
                    </span>
                </button>

                <!-- Dropdown button -->
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Action
                    </button>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">{{ __('Nouveau') }}</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-cloud-arrow-up"></i> {{ __('Enregistrer') }}</a></li>
                    <!--<li><hr class="dropdown-divider"></li>-->
                    </ul>
                </div>
            </div>

        </div>
        <!-- Sheet Card -->
        <div class="k_form_sheet position-relative">

            <div class="row justify-content-between position-relative w-100 m-0 mb-2">
                <!-- title-->
                <div class="ke_title mw-75 pe-2 ps-0">
                    <!-- Name -->
                    <h1 class="d-flex flex-row align-items-center">
                        <input type="text"wire:model="name" class="k_input" id="name_k">
                    </h1>
                    <!-- Job Title -->
                    <h2>
                        <input type="text" wire:model="jobTitle" class="k_input" id="job_title" placeholder="Poste de travail">
                    </h2>

                    <!-- tags -->
                    <!-- <div class="k_field_tags d-inline-flex flex-wrap gap-1 k_tags_input k_input">
                        <div class="k-autocomplete dropdown">
                            <input type="text" id="category_input_0 k-autocomplete-input k_input">
                        </div>
                    </div> -->

                </div>
                <!-- Employee Avatar -->
                <div class="k_employee_avatar m-0 p-0">
                    <!-- Image Uploader -->
                    <img src="{{ asset('assets/images/people/default_avatar.png') }}" alt="" class="img img-fluid">
                    <!-- <small class="k_button_icon">
                        <i class="bi bi-circle text-success align-middle"></i>
                    </small>-->
                    <!-- Image selector -->
                    <div class="select-file d-flex position-absolute justify-content-between w100 bottom-0">
                        <button class="k_select_file_button btn btn-light border-0 rounded-circle m-1 p-1">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="k_select_file_button btn btn-light border-0 rounded-circle m-1 p-1">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>

            </div>

            <div class="row">
                <!-- Left Side -->
                <div class="k_inner_group col-md-6 col-lg-6">
                    <!-- Input Form Label -->
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                        <label class="k_form_label">
                            {{ __('Téléphone portable') }} :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                        <input type="tel" wire:model="phone" class="k_input" id="mobile_phone_0" placeholder="Ex: +242069481592">
                    </div>

                    <!-- Input Form Label -->
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                        <label class="k_form_label">
                            {{ __('Téléphone professionnel') }} :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                        <input type="tel" wire:model="mobile" class="k_input" id="work_phone_0" placeholder="Ex: +242069481592">
                    </div>

                    <!-- Input Form Label -->
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                        <label class="k_form_label">
                            {{ __('Adresse email professionnelle') }} :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                        <input type="email" wire:model="email" class="k_input" id="work_email_0" placeholder="Ex: nom@example.com">
                    </div>

                    <!-- Input Form Label -->
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                        <label class="k_form_label">
                            {{ __('Entreprise') }} :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                        <select class="k-autocomplete-input-0 k_input" id="company_id_0">
                            <option value="">Banéo</option>
                        </select>
                    </div>

                </div>
                <!-- Right Side -->
                <div class="k_inner_group col-md-6 col-lg-6">
                    <!-- Input Form Label -->
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                        <label class="k_form_label">
                            {{ __('Département') }} :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                        <select wire:model="department" class="k-autocomplete-input k_input" id="department_id_0">
                            <option value=""></option>
                            @foreach($departments as $d)
                                <option {{ $d->id == $employee->department->id ? 'selected' : '' }} value="{{ $d->id }}">{{ $d->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- JobTitle -->
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                        <label class="k_form_label">
                            {{ __('Poste de travail') }} :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                        <select wire:model="job" class="k-autocomplete-input k_input" id="job_id_0">
                            <option value=""></option>
                            @foreach($jobs as $j)
                                <option {{ $j->id == $employee->job->id ? 'selected' : '' }} value="{{ $j->id }}">{{ $j->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Input Form Label -->
                    <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                        <label class="k_form_label">
                            {{ __('Manager') }} :
                        </label>
                    </div>
                    <!-- Input Form -->
                    <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                        <select wire:model="manager" class="k-autocomplete-input-0 k_input" id="manager_id_0">
                            <option value=""></option>
                            @foreach($employees as $manager)
                                <option {{ $manager->id == $employee->manager_id ? 'selected' : '' }} value="{{ $manager->id }}">{{ $manager->user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>
            <div class="k_notebokk_headers">
                <!-- Tab Link -->
                <ul class="nav nav-tabs flex-row flex-nowrap" data-bs-toggle="tabs">
                    <li class="nav-item">
                      <a class="nav-link active" data-bs-toggle="tab" href="#profesionnal">{{ __('Informations professionnelles') }}</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-bs-toggle="tab" href="#personnal">{{ __('Informations personnelles') }}</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-bs-toggle="tab" href="#rh">{{ __('Paramètre RH') }}</a>
                    </li>
                </ul>
            </div>
            <!-- Tab Content -->

                <!-- Professionnal -->
                <div class="tab-pane active show" id="profesionnal">
                    <div class="row">
                        <!-- Left Side -->
                        <div class="k_work_employee_main col-lg-8 flex-grow-0">
                            <!-- Localisation -->
                            <div class="k_inner_group col-md-12 col-lg-12">
                                <!-- separator -->
                                <div class="g-col-sm-2">
                                    <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                        {{ __('Emplacement') }}
                                    </div>
                                </div>

                                <!-- Professionnal address -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        {{ __('Adresse professionnelle') }} :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <select wire:model="work_address" class="k-autocomplete-input-0 k_input" id="company_address_0">
                                        <option value="">Banéo</option>
                                    </select>
                                </div>

                                <!-- Work Place -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        {{ __('Lieu de travail') }} :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <select wire:model="workplace" class="k-autocomplete-input-0 k_input" id="work_place_0">
                                        <option value=""></option>
                                        @foreach($workplaces as $w)
                                            <option {{ $w->id == $employee->workplace_id ? 'selected' : '' }} value="{{ $w->id }}">{{ $w->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="k_inner_group col-md-12 col-lg-12">
                                <!-- separator -->
                                <div class="g-col-sm-2">
                                    <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                        {{ __('Planning') }}
                                    </div>
                                </div>
                                <!-- Input Form Label -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        {{ __('Rôle') }} :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <select class="k-autocomplete-input-0 k_input" id="company_id_0">
                                        <option value=""></option>
                                    </select>
                                </div>

                                <!-- Input Form Label -->
                                <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                    <label class="k_form_label">
                                        {{ __('Rôle par defaut') }} :
                                    </label>
                                </div>
                                <!-- Input Form -->
                                <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                    <select class="k-autocomplete-input-0 k_input" id="company_id_0">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Right Side -->
                        <div class="k_employee_right col-lg-4 px-0 ps-lg-5 pe-lg-4">
                            <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                {{ __('Organigramme') }}
                            </div>
                            <div class="k_field_widget k_readonly_modifer position-relative">
                                <div class="k-alert alert-azure">
                                    <b>{{ __('Aucun ordre hiérarchique') }}</b>
                                    <p>{{ __('Cet employé n\'a pas de responsable ni de subordonnés.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Personnal -->
                <div class="tab-pane" id="personnal">
                    <div class="row align-items-start">

                        <!-- Left Side -->
                        <div class="k_inner_group col-lg-6">
                            <!-- separator -->
                            <div class="g-col-sm-2">
                                <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                    {{ __('Coordonnées Personnelles') }}
                                </div>
                            </div>
                            <!-- Adresse -->
                            <div class="k_wrap_label text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Adresse') }} :
                                </label>
                            </div>
                            <div class="k_address_format">
                                <div class="row">
                                    <div class="col-12" style="margin-bottom: 10px;">
                                        <input type="text" wire:model="street" id="street" class="k_input" placeholder="Rue 1....">
                                    </div>
                                    <div class="col-12" style="margin-bottom: 10px;">
                                        <input type="text" wire:model="street2" id="street2_0" class="k_input" placeholder="Rue 2......">
                                    </div>
                                    <div class="col-4 d-flex align-items-center" style="margin-bottom: 10px;">
                                        <input type="text" wire:model="city" id="city_0" class="k_input" placeholder="Ville">
                                    </div>
                                    <div class="col-4 d-flex align-items-center" style="margin-bottom: 10px;">
                                        <select name="" class="k_input" id="state_id_0">
                                            <option value="">{{ __('Département') }}</option>
                                        </select>
                                    </div>
                                    <div class="col-4 d-flex align-items-center" style="margin-bottom: 10px;">
                                        <input type="text" wire:model="zip" id="zip_0" class="k_input" placeholder="Code postal">
                                    </div>
                                    <div class="col-12" style="margin-bottom: 10px;">
                                        <select name="" class="k_input" id="country_id_0">
                                            <option value="">{{ __('Pays') }}</option>
                                        </select>
                                    </div>

                                </div>

                            </div>
                            <!-- Email -->
                            <!-- Input Form Label -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Email') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <input type="email" wire:model="personal_email" class="k_input" id="personnal_email_0" placeholder="Ex: nom@example.com">
                            </div>
                            <!-- Phone -->
                            <!-- Input Form Label -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Téléphone') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <input type="tel" wire:model="personal_phone" class="k_input" id="personnal_phone_0">
                            </div>

                            <!-- Bank Account -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Numéro de compte bancaire') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <input type="text" wire:model="bank_account_id" class="k_input" id="bank_account_id">
                            </div>

                            <!-- Language -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Langue') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <select wire:model="language" class="k_input" id="language_id">
                                    <option value="">{{ __('Français') }}</option>
                                </select>
                            </div>

                        </div>

                        <!-- Right Side -->
                        <div class="k_inner_group col-lg-6">
                            <!-- separator -->
                            <div class="g-col-sm-2">
                                <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                    {{ __('Contexte Familiale') }}
                                </div>
                            </div>
                            <!-- Marital -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Etat civil') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <select wire:model="marital" class="k_input" id="marital_0">
                                    <option {{ $marital == 'single' ? 'selected' : '' }} value="single">
                                        {{ __('Célibataire') }}
                                    </option>
                                    <option {{ $marital == 'married' ? 'selected' : '' }} value="married">
                                        {{ __('Marié(e)') }}
                                    </option>
                                    <option {{ $marital == 'cohabitant' ? 'selected' : '' }} value="cohabitant">
                                        {{ __('Concubin(e)') }}
                                    </option>
                                    <option {{ $marital == 'divorced' ? 'selected' : '' }} value="divorced">
                                        {{ __('Divorcé(e)') }}
                                    </option>
                                    <option {{ $marital == 'widower' ? 'selected' : '' }} value="widower">
                                        {{ __('Veuf(ve)') }}
                                    </option>
                                </select>
                                @error('marital') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Children -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Nombre d\'enfants') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <input wire:model="children_no" type="text" class="k_input" id="children_0" >
                                @error('children_no') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- separator -->
                            <div class="g-col-sm-2">
                                <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                    {{ __('En cas d\'urgence') }}
                                </div>
                            </div>

                            <!-- Contact Name -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Nom du contact') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <input type="text" wire:model="contact_name" class="k_input" id="contact_name_0" >
                                @error('contact_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Contact Phone -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Numéro du contact') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <input type="text" wire:model="contact_phone" class="k_input" id="contact_phone_0" >
                                @error('contact_phone') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                        </div>

                        <!-- Left Side -->
                        <div class="k_inner_group col-lg-6">

                            <!-- separator -->
                            <div class="g-col-sm-2">
                                <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                    {{ __('Education') }}
                                </div>
                            </div>

                            <!-- Certificate -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Niveau du certificat') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <select class="k_input" wire:model="certificate_level" id="certificate_0" >
                                    <option {{ $employee->certificate_level == 'diploma' ? 'selected' : '' }} value="diploma">{{ __('Bachelier') }}</option>
                                    <option {{ $employee->certificate_level == 'master' ? 'selected' : '' }} value="master">{{ __('Master') }}</option>
                                    <option {{ $employee->certificate_level == 'phd' ? 'selected' : '' }} value="phd">{{ __('Docteur') }}</option>
                                    <option {{ $employee->certificate_level == 'others' ? 'selected' : '' }}  value="others">{{ __('Autre') }}</option>
                                    <option value=""></option>
                                </select>
                                @error('certificate_level') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Study field -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Champ d\'étude') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <input type="text" wire:model="study_field" class="k_input" id="study_field_0">
                                @error('study_field') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Study school -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Etablissement scolaire') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <input type="text" wire:model="school_study" class="k_input" id="school_study_0">
                                @error('school_study') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- separator -->
                            <div class="g-col-sm-2">
                                <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                    {{ __('Permis de travail') }}
                                </div>
                            </div>

                            <!-- Visa No -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('N° de visa') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <input type="text" wire:model="visa_no" class="k_input" id="visa_no_0">
                                @error('visa_no') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Permit No -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('N° de permit de travail') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <input type="text" wire:model="work_permit_no" class="k_input" id="work_permit_no_0">
                                @error('work_permit_no') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Visa Expiration -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Date d\'expiration du visa') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <input type="date" wire:model="" class="k_input" id="visa_expiration_date_0">
                                @error('visa_expiration_date') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Permit Expiration -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Date d\'expiration du permit de travail') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <input type="date" wire:model="work_permit_expiration_date" class="k_input" id="permit_expiration_date_0">
                                @error('work_permit_expiration_date') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Permit File -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Permit de travail') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <div class="k_field_widget k_field_work_permit_upload">
                                    <label for="" class="k_select_field_button btn btn-secondary">
                                        <span>
                                            {{ __('Chargez votre fichier') }}
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- Right Side -->
                        <div class="k_inner_group col-lg-6">

                            <!-- separator -->
                            <div class="g-col-sm-2">
                                <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                    {{ __('Citoyenneté') }}
                                </div>
                            </div>

                            <!-- Nationnality -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Nationnalité (pays)') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <select class="k_input" wire:model="nationality" id="nationality_0" >
                                    <option value="congo">Congo</option>
                                </select>
                                @error('nationality') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- CNI -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('N° CNI') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <input type="text" wire:model="national_id" class="k_input" id="cni_0" >
                                @error('national_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Passport -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('N° de passeport') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <input type="text" wire:model="passport_no" class="k_input" id="passport_0" >
                                @error('passport_no') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <!-- Gender -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Genre') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <select class="k_input" id="gender_0">
                                    <option value="">{{ __('Masculin') }}</option>
                                    <option value="">{{ __('Feminin') }}</option>
                                </select>
                            </div>

                            <!-- Birthday -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Date de naissance') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <input type="date" class="k_input" id="birthday_0" >
                            </div>

                            <!-- Place of birth -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Lieu de naissance') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <input type="text" class="k_input" id="place_of_birth_0" >
                            </div>

                            <!-- Country of birth -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Pays de naissance') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <input type="date" class="k_input" id="country_of_birth_0" >
                            </div>

                            <!-- Non redident -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('N\'est pas un résident') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <input type="checkbox" class="form-check-input" id="is_non_resident_0" >
                            </div>
                        </div>

                    </div>
                </div>

                <!-- HR Settings -->
                <div class="tab-pane" id="rh">
                    <div class="row align-items-start">

                        <!-- Left Side -->
                        <div class="k_inner_group col-lg-6">
                            <!-- separator -->
                            <div class="g-col-sm-2">
                                <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                    {{ __('Status') }}
                                </div>
                            </div>

                            <!-- Employee Type -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Type d\'employé') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <select class="k_input" id="employee_type_1">
                                    <option value="employee">
                                        {{ __('Employé(e)') }}
                                    </option>
                                    <option value="student">
                                        {{ __('Etudiant(e)') }}
                                    </option>
                                    <option value="intern">
                                        {{ __('Stagiaire') }}
                                    </option>
                                    <option value="contractor">
                                        {{ __('Contractant') }}
                                    </option>
                                    <option value="freelance">
                                        {{ __('Travailleur indépendant') }}
                                    </option>
                                </select>
                            </div>

                            <!-- Employee User -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Utilisateur associé') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <select class="k_input" id="user_id_1">
                                    <option value="">
                                        {{ Auth::user()->name }}
                                    </option>
                                </select>
                            </div>

                        </div>
                        <!-- Right Side -->
                        <div class="k_inner_group col-lg-6">
                            <!-- separator -->
                            <div class="g-col-sm-2">
                                <div class="k_horizontal_separator mt-4 mb-3 text-uppercase fw-bolder small">
                                    {{ __('Présence / Point de vente') }}
                                </div>
                            </div>

                            <!-- ID Badge -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('ID du badge') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="k_row">
                                <input type="text" class="k_input" id="qr_code_badge">
                                <button class="btn btn-link">
                                     {{ __('Générer un code') }}
                                </button>
                            </div>

                            <!-- PIN code -->
                            <div class="k_cell k_wrap_label flex-grow-1 flex-sm-grow-0 text-break text-900">
                                <label class="k_form_label">
                                    {{ __('Code PIN') }} :
                                </label>
                            </div>
                            <!-- Input Form -->
                            <div class="text-break k_cell k_wrap_input flex-sm-grow-0">
                                <input type="number" class="k_input" id="pin_code_0">
                            </div>

                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
