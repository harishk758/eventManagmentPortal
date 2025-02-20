@extends('backend.master')
@section('content')
    <!-- MAIN SCREEN -->
    <div class="main_screen">
        <div class="top_bar d-flex align-items-center">
            {{-- <i class="bi bi-arrow-left-short"></i> --}}
            <a href="{{ route('home') }}" class="text-white">
                <i class="bi bi-arrow-left-short">
                </i>
            </a>

            <div class="page_heading text-center w-100">
                Summary - {{ $eventDetails['event_name'] }}
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 mt-3">
                    <label for="boothsize1" class="form-label">Event Name</label>
                    <input type="text" id="Boothsize1" placeholder="Enter Name" value="{{ $eventDetails['event_name'] }}"
                        readonly>
                </div>
                <div class="col-md-3 mt-3">
                    <label for="boothsize2" class="form-label">Event Start Date</label>
                    <input type="text" id="Boothsize1" placeholder="Enter Name"
                        value="{{ date('Y-M-d', strtotime($eventDetails['start_date'])) }}" readonly>
                </div>
                <div class="col-md-3 mt-3">
                    <label for="boothsize3" class="form-label">Event End Date</label>
                    <input type="text" id="Boothsize3" placeholder="Enter Name"
                        value="{{ date('Y-M-d', strtotime($eventDetails['end_date'])) }}" readonly>
                </div>
                <div class="col-md-3 mt-3">
                    <label for="boothsize4" class="form-label">Country</label>
                    <input type="text" id="Boothsize4" placeholder="Enter Name" value="{{ $eventDetails['country'] }}"
                        readonly>
                </div>
                <div class="col-md-3 mt-3">
                    <label for="boothsize5" class="form-label">Address</label>
                    <input type="text" id="Boothsize5" placeholder="Enter Name" value="{{ $eventDetails['address'] }}"
                        readonly>
                </div>
                <div class="col-md-3 mt-3">
                    <label for="boothsize6" class="form-label">City</label>
                    <input type="text" id="Boothsize6" placeholder="Enter Name" value="{{ $eventDetails['city'] }}"
                        readonly>
                </div>
                <div class="col-md-3 mt-3">
                    <label for="boothsize7" class="form-label">Creator Name</label>
                    <input type="text" id="Boothsize7" placeholder="Enter Name"
                        value="{{ $eventDetails['creator_name'] }}" readonly>
                </div>
                <div class="col-md-3 mt-3">
                    <label for="boothsize8" class="form-label">Creator Designation</label>
                    <input type="text" id="Boothsize8" placeholder="Enter Name"
                        value="{{ $eventDetails['creator_designation'] }}" readonly>
                </div>
                <div class="col-md-3 mt-3">
                    <label for="boothsize9" class="form-label">Event Category</label>
                    <input type="text" id="Boothsize9" placeholder="Enter Name"
                        value="{{ $eventDetails['event_category'] }}" readonly>
                </div>
                <div class="col-md-9 mt-3">
                    <label for="boothsize10" class="form-label">Event Description</label>
                    {{-- <input type="text" id="Boothsize10" placeholder="Enter Name" readonly> --}}
                    <textarea id="Boothsize10" class="form-control" readonly>{{ $eventDetails['event_description'] }}</textarea>
                </div>
            </div>

            <!-- Booth Summary Accordion -->
            {{-- <div class="booth_summary mt-4">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Booth 1 Details
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <label for="boothsize1" class="form-label">Booth Size</label>
                                    <input type="text" id="Boothsize1" placeholder="Enter Name" readonly>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="boothsize2" class="form-label">Booth Size</label>
                                    <input type="text" id="Boothsize2" placeholder="Enter Name" readonly>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="boothsize3" class="form-label">Booth Size</label>
                                    <input type="text" id="Boothsize3" placeholder="Enter Name" readonly>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="boothsize3" class="form-label">Booth Size</label>
                                    <input type="text" id="Boothsize3" placeholder="Enter Name" readonly>
                                </div>
                                <div class="col-md-8 mt-3">
                                    <label for="boothsize3" class="form-label">Booth Size</label>
                                    <input type="text" id="Boothsize3" placeholder="Enter Name" readonly>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="boothsize1" class="form-label">Booth Size</label>
                                    <input type="text" id="Boothsize1" placeholder="Enter Name" readonly>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="boothsize2" class="form-label">Booth Size</label>
                                    <input type="text" id="Boothsize2" placeholder="Enter Name" readonly>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="boothsize3" class="form-label">Booth Size</label>
                                    <input type="text" id="Boothsize3" placeholder="Enter Name" readonly>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="boothsize1" class="form-label">Booth Size</label>
                                    <input type="text" id="Boothsize1" placeholder="Enter Name" readonly>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="boothsize2" class="form-label">Booth Size</label>
                                    <input type="text" id="Boothsize2" placeholder="Enter Name" readonly>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="boothsize3" class="form-label">Booth Size</label>
                                    <input type="text" id="Boothsize3" placeholder="Enter Name" readonly>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="boothsize3" class="form-label">Booth Size</label>
                                    <input type="text" id="Boothsize3" placeholder="Enter Name" readonly>
                                    <textarea id="Boothsize10" class="form-control"  readonly></textarea>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Accordion Item #2
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Accordion Item #3
                        </button>
                      </h2>
                      <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                      </div>
                    </div>
                  </div>
            </div> --}}


            <!-- Booth Summary Accordion -->

            <div class="booth_summary mt-4">
                <div class="accordion" id="accordionExample">
                    @foreach ($eventDetails->booths as $index => $booth)
                        @php
                            $booth->vendors = collect($booth->vendors);
                            $boothTeamMembers = $teamMembers->filter(function ($member) use ($booth) {
                                return in_array($booth->id, explode(',', $member->booth_id));
                            });
                        @endphp
                        {{-- @php
                            $booth->vendors = collect($booth->vendors);
                            $boothTeamMembers = $teamMembers->filter(fn($member) => in_array($booth->booth_id, json_decode($member->booth_id, true) ?? []));
                            $boothChecklists = $checklists->filter(fn($task) => in_array($booth->booth_id, json_decode($task->booth_id, true) ?? []));
                            $boothExpenses = $expenses->filter(fn($expense) => in_array($booth->booth_id, json_decode($expense->booth_id, true) ?? []));
                        @endphp --}}
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button {{ $index == 0 ? '' : 'collapsed' }}" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                    aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                    aria-controls="collapse{{ $index }}">
                                    Booth {{ $index + 1 }} Details
                                </button>
                            </h2>
                            <div id="collapse{{ $index }}"
                                class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-4 mt-3">
                                            <label class="form-label">Booth Name</label>
                                            <input type="text" class="form-control" value="{{ $booth->booth_name }}"
                                                readonly>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label class="form-label">Booth Size</label>
                                            <input type="text" class="form-control" value="{{ $booth->booth_size }}"
                                                readonly>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label class="form-label">Booth Area</label>
                                            <input type="text" class="form-control" value="{{ $booth->booth_area }}"
                                                readonly>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label class="form-label">Booth Cost</label>
                                            <input type="text" class="form-control" value="{{ $booth->booth_cost }}"
                                                readonly>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label class="form-label">Booth Superviser</label>
                                            <input type="text" class="form-control"
                                                value="{{ $booth->booth_supervisor }}" readonly>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" readonly>{{ $booth->booth_requirements }}</textarea>
                                        </div>
                                    </div>
                                    <h5 class="mt-3">Vendors</h5>
                                    <div class="row">
                                        <div class="col-md-4 mt-3">
                                            <label class="form-label">Vendor Name</label>
                                            <input type="text" class="form-control"
                                                value="{{ $booth->vendors['vendor_name'] }}" readonly>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label class="form-label">Vendor Email</label>
                                            <input type="text" class="form-control"
                                                value="{{ $booth->vendors['vendor_email'] }}" readonly>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label class="form-label">Vendor Company</label>
                                            <input type="text" class="form-control"
                                                value="{{ $booth->vendors['vendor_company'] }}" readonly>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label class="form-label">Vendor Address</label>
                                            <input type="text" class="form-control"
                                                value="{{ $booth->vendors['vendor_address'] }}" readonly>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label class="form-label">Vendor City</label>
                                            <input type="text" class="form-control"
                                                value="{{ $booth->vendors['vendor_city'] }}" readonly>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label class="form-label">Country</label>
                                            <input type="text" class="form-control"
                                                value="{{ $booth->vendors['country_id'] }}" readonly>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label class="form-label">Vendor Description</label>
                                            <input type="text" class="form-control"
                                                value="{{ $booth->vendors['vendor_description'] }}" readonly>
                                        </div>
                                    </div>

                                    <!-- Team Members -->
                                    <h5 class="mt-4">Team Members</h5>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>S.R.</th>
                                                <th>Team Member</th>
                                                <th>Email</th>
                                                <th>Contact Number</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($boothTeamMembers as $index => $member)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $member->member->member_name }}</td>
                                                    <td>{{ $member->member->email }}</td>
                                                    <td>{{ $member->member->contact_number }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3">No team members found.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <!-- Checklist -->
                                    <h5 class="mt-4">Checklist Tasks</h5>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>S.R.</th>
                                                <th>Checklist Task</th>
                                                <th>Status</th>
                                                <th>Due Date</th>
                                                <th>Assigned To</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($checklists->where('booth_id', $booth->id) as $task)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $task->task }}</td>
                                                    <td>{{ $task->status }}</td>
                                                    <td>{{ $task->due_date->format('d/m/Y') }}</td>
                                                    <td>{{ $task->teamMember->member_name }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3">No checklists found.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <!-- Expenses -->
                                    <h5 class="mt-4">Expenses</h5>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>S.R.</th>
                                                <th>Expense Name</th>
                                                <th>Amount</th>
                                                <th>Due Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($expenses->where('booth_id', $booth->id) as $expense)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $expense->expense_name }}</td>
                                                    <td>{{ $expense->ammount }}</td>
                                                    <td>{{ $expense->due_date->format('d/m/Y') }} </td>
                                                    <td>{{ $expense->status }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3">No expenses found.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>





            {{-- old --}}
            {{-- <div class="booth_summary mt-4">
                <div class="accordion" id="accordionExample">
                    @foreach ($eventDetails->booths as $index => $booth)
                        @php $booth->vendors = collect($booth->vendors); @endphp
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button {{ $index == 0 ? '' : 'collapsed' }}" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                    aria-expanded="{{ $index == 0 ? 'true' : 'false' }}"
                                    aria-controls="collapse{{ $index }}">
                                    Booth {{ $index + 1 }} Details
                                </button>
                            </h2>
                            <div id="collapse{{ $index }}"
                                class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-4 mt-3">
                                            <label class="form-label">Booth Name</label>
                                            <input type="text" class="form-control" value="{{ $booth->booth_name }}"
                                                readonly>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label class="form-label">Booth Size</label>
                                            <input type="text" class="form-control" value="{{ $booth->booth_size }}"
                                                readonly>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label class="form-label">Booth Area</label>
                                            <input type="text" class="form-control" value="{{ $booth->booth_area }}"
                                                readonly>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label class="form-label">Booth Cost</label>
                                            <input type="text" class="form-control" value="{{ $booth->booth_cost }}"
                                                readonly>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label class="form-label">Booth Superviser</label>
                                            <input type="text" class="form-control"
                                                value="{{ $booth->booth_supervisor }}" readonly>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" readonly>{{ $booth->booth_requirements }}</textarea>
                                        </div>
                                    </div>
                                    <h5 class="mt-3">Vendors</h5>
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <strong>Vendor Name :- {{ $booth->vendors['vendor_name'] }}</strong>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Vendor Email :- {{ $booth->vendors['vendor_email'] }}</strong>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Vendor Company :- {{ $booth->vendors['vendor_company'] }}</strong>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Vendor Address :- {{ $booth->vendors['vendor_address'] }}</strong>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Vendor City :- {{ $booth->vendors['vendor_city'] }}</strong>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Country :- {{ $booth->vendors['country_id'] }}</strong>
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Vendor Description :-
                                                {{ $booth->vendors['vendor_description'] }}</strong>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div> --}}

            {{-- <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Team Member</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teamMembers as $member)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $member->member_id }}</td>
                            <td>sarveshgupta@gmail.com</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $teamMembers->links('pagination::bootstrap-4') }} --}}


        </div>
    </div>
@endsection
