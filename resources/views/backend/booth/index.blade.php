@extends('backend.master')
@section('content')
    <div class="main_screen">
        <div class="container-fluid">
            <div class="d-flex align-items-end my-4 gap-5">
                <div class="button mt-lg-5">
                    <a href="{{ route('add_booth') }}" class="btn create_btn"><span>Craete Booth</span><img
                            src="./assets/images/create_btn.svg" /></a>

                </div>
                {{-- <div class="col-md-2">
                    <input type="text" placeholder="Search" />
                </div> --}}
            </div>
            <div class="wrapper mt-lg-5">
                <table class="table table-bordered table-hover" cellspacing="0" width="100%">
                    <thead class="table_head">
                        <tr>
                            <th style="width:5%;">S No.</th>
                            <th style="width:20%;">
                                <span>Name</span><i class="bi bi-chevron-down"></i>
                            </th>
                            <th style="width:9%;">
                                <span>Category</span><i class="bi bi-chevron-down"></i>
                            </th>
                            <th style="width:8%;">
                                <span>Start Date</span><i class="bi bi-chevron-down"></i>
                            </th>
                            <th style="width:8%;">
                                <span>End Date</span><i class="bi bi-chevron-down"></i>
                            </th>
                            <th style="width:12%;">
                                <span>Location (City)</span><i class="bi bi-chevron-down"></i>
                            </th>
                            <th style="width:8%;">
                                <span>Status</span><i class="bi bi-chevron-down"></i>
                            </th>
                            <th style="width:8%;">
                                <span>Actions</span><i class="bi bi-chevron-down"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="event">
                        <tr>
                            <td>1</td>
                            <td>Dubai Expo Awards 2025</td>
                            <td>Promotion</td>
                            <td>12-01-2025</td>
                            <td>20-01-2025</td>
                            <td>Dubai</td>
                            <td>
                                <Select>
                                    <option value="">Completed</option>
                                    <option value="1">Running</option>
                                    <option value="2">Upcomming</option>
                                    <option value="3">Cancelled</option>
                                </Select>
                            </td>
                            <td>
                                <div class="actions d-flex gap-5">
                                    <a href="Javascript:void(0)"><img src="./assets/images/delete.svg" alt=""></a>
                                    <a href="Javascript:void(0)"><img src="./assets/images/edit.svg" alt=""></a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
