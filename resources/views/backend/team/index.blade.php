@extends('backend.master')
@section('content')
    <div class="main_screen">
        <!-- COMMON CODE END -->
        <div class="container-fluid">


            <div class="d-flex align-items-end my-4 gap-5">
                <div class="button mt-lg-5">
                    <a href="javascript:void(0)" class="btn create_btn" id="openModal" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        <span>Create Team</span>
                        <img src="./assets/images/create_btn.svg" />
                    </a>
                </div>
                <div class="col-md-2 button">
                    <input type="text" placeholder="Search" />
                </div>
            </div>
            {{-- <div class="d-flex align-items-end my-4 gap-5">
            <div class="button mt-lg-5">
                <a href="" class="btn create_btn" id="openModal"><span>Add Team Member</span><img
                        src="./assets/images/create_btn.svg" /></a>

            </div>
            <div class="col-md-2">
                <input type="text" placeholder="Search" />
            </div>
        </div> --}}

            {{-- modal --}}
            <div class="modal" id="teamModal">
                <div class="modal-content event_form">
                    <span class="close" id="closeModal"><i class="fa-solid fa-x"></i></span>
                    <div class="page_title text-center my-md-4 my-lg-2"><span>Team Member Details</span></div>
                    <form action="{{ route('team.store') }}" method="POST" id="teamForm" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-between input_row">
                            <div class="form-group text_field50">
                                <label for="membername" class="form-label">Member Name</label>
                                <input id="membername" type="text" name="member_name" required>
                            </div>

                            <div class="form-group text_field50">
                                <label class="form-label" for="Designation">Designation</label>
                                <input type="text" id="Designation" name="designation" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between input_row">
                            <div class="form-group text_field50">
                                <label class="form-label" for="Email">Email</label>
                                <input type="email" id="Email" name="email" required>
                            </div>

                            <div class="form-group text_field50">
                                <label class="form-label" for="contact">Contact No.</label>
                                <input type="text" id="contact" name="contact_number" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between input_row">
                            <div class="input_grp"> <label for="aadharfront" class="form-label">Aadhar Front</label>
                                <input id="aadharfront" type="file" name="aadhaar_front" accept=".jpg, .png, .jpeg">
                            </div>
                            <div class="input_grp"> <label for="aadharback" class="form-label">Aadhar Back</label>
                                <input id="aadharback" type="file" name="aadhaar_back" accept=".jpg, .png, .jpeg">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between input_row align-items-center">
                            <div class="input_grp w-50"> <label for="pancard" class="form-label">Pan Card</label>
                                <input id="pancard" type="file" name="pancard" accept=".jpg, .png, .jpeg">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="wrapper mt-lg-5">
                <table class="table table-bordered table-hover" cellspacing="0" width="100%">
                  <thead class="table_head">
                    <tr>
                      <th style="width:5%;">S No.</th>
                      <th style="width:15%;">
                        <span>Member Name</span>
                      </th>
                      <th style="width:12%;">
                        <span>Designation</span>
                      </th>
                      <th style="width:15%;">
                        <span>Email</span>
                      <th style="width:7%;">
                        <span>Contact No.</span>
                      </th>
                      <th style="width:11%;">
                        <span>Assign Action</span>
                      </th>
                      <th style="width:8%;">
                        <span>Not Assigned</span>
                      </th>
                      <th style="width:8%;">
                        <span>Actions</span>
                      </th>
                    </tr>
                  </thead>
                  <tbody id="team">
                    @foreach ($show as $item)
                    <tr>
                      <td>{{ $item->id }}</td>
                      <td>{{ $item->member_name }}</td>
                      <td>{{ $item->designation }}</td>
                      <td>{{ $item->email }}</td>
                      <td>{{ $item->contact_number}}</td>
                      <td>
                        <div class="team_actions d-flex gap-4">
                          <a href="Javascript:void(0)" class="d-flex gap-3 text-warning align-items-center"><img
                              src="./assets/images/team_edit.svg">Edit</a>
                          <a href="Javascript:void(0)" class="d-flex gap-3 text-danger align-items-center"><img
                              src="./assets/images/team_remove.svg">Remove</a>
                        </div>
                      </td>
                      <td>Assigned</td>
                      <td>
                        <div class="actions d-flex gap-5">
                          <a href="Javascript:void(0)"><img src="./assets/images/delete.svg" alt=""></a>
                          <a href="Javascript:void(0)"><img src="./assets/images/edit.svg" alt=""></a>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
        </div>
    </div>
@endsection
