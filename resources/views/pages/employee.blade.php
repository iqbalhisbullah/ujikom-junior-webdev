@extends('layouts.dashboard')

@section('content')
<div class="iq-card">
    <div class="iq-card-header d-flex justify-content-between align-items-center">
        <div class="iq-header-title">
            <h4 class="card-title">Employee List</h4>
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
            Add Employee
        </button>
    </div>
    <div class="iq-card-body">
        <div class="table-responsive">
            <table id="employee-list-table" class="table table-striped table-bordered mt-4" role="grid"
                aria-describedby="employee-list-page-info">
                <thead>
                    <tr class="table-dark">
                        <th>Name</th>
                        <th>Position</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Address</Address>
                        </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>{{ $employee->phone_number }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->address }}</td>
                        <td>
                            <div class="flex align-items-center list-employee-action">
                                <a onclick="openEditModal('{{ $employee->id }}')" data-toggle="tooltip"
                                    data-placement="top" title="" data-original-title="Edit" href="#">
                                    <i class="ri-pencil-line"></i></a>

                                <a onclick="deleteemployee('{{ $employee->id }}')" data-toggle="tooltip"
                                    data-placement="top" title="" data-original-title="Delete" href="#"><i
                                        class="ri-delete-bin-line"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card-body">
    <!-- Basic Modal -->

    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addForm">
                        <div class="form-group">
                            <label for="addName">Nama</label>
                            <input required type="text" class="form-control" id="addName" name="name">
                        </div>
                        <div class="form-group">
                            <label for="addPosition">Position</label>
                            <input required type="position" class="form-control" id="addPosition" name="position">
                        </div>

                        <div class="form-group">
                            <label for="addPhoneNumber">Phone Number</label>
                            <input required type="text" class="form-control" id="addPhoneNumber" name="phone_number">
                        </div>

                        <div class="form-group">
                            <label for="addEmail">Email</label>
                            <input required type="email" class="form-control" id="addEmail" name="email">
                        </div>

                        <div class="form-group">
                            <label for="addAddress">Address</label>
                            <input required type="address" class="form-control" id="addAddress" name="address">
                        </div>

                        <div class="form-group">
                            <label for="addStartdate">Start date</label>
                            <input required type="startdate" class="form-control" id="addAStartdate" name="startdate">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div><!-- End Basic Modal-->

</div>







@endsection
