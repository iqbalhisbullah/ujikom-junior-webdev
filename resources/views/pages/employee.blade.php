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
            <table id="employee-list-table" class="table mt-4 table-striped table-bordered" role="grid"
                aria-describedby="employee-list-page-info">
                <thead>
                    <tr class="table-dark">
                        <th>Id</th>
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
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->name }}</td>
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

                                <a onclick="deleteEmployee('{{ $employee->id }}')" data-toggle="tooltip"
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
    <div class="modal fade" id="basicModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Employee</h5>
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
                            <label for="addNumber">Employee Number</label>
                            <input required type="number" class="form-control" id="addnumber" name="addnumber">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="createEmployee()">Submit</button>
                </div>
            </div>
        </div>
    </div><!-- End Basic Modal-->

    <!-- Edit Modal-->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <div class="form-group">
                            <label for="editName">Nama</label>
                            <input required type="text" class="form-control" id="editName" name="name">
                        </div>
                        <div class="form-group">
                            <label for="editPosition">Position</label>
                            <input required type="position" class="form-control" id="editPosition" name="position">
                        </div>

                        <div class="form-group">
                            <label for="editPhoneNumber">Phone Number</label>
                            <input required type="text" class="form-control" id="editPhoneNumber" name="phone_number">
                        </div>

                        <div class="form-group">
                            <label for="editEmail">Email</label>
                            <input required type="email" class="form-control" id="editEmail" name="email">
                        </div>

                        <div class="form-group">
                            <label for="editAddress">Address</label>
                            <input required type="address" class="form-control" id="editAddress" name="address">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="editEmployee()">Submit</button>
                </div>
            </div>
        </div>
    </div><!-- End Basic Modal-->

</div>

@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    let employeeId = null;

            // saat buka modal addModal kosongkan form, hapus class is-invalid dan invalid-feedback
            $('#addModal').on('show.bs.modal', function(e) {
                $('#addForm').trigger('reset');
                $('#addForm input').removeClass('is-invalid');
                $('#addForm .invalid-feedback').remove();
            });

            $('#editModal').on('show.bs.modal', function(e) {
                $('#editForm input').removeClass('is-invalid');
                $('#editForm .invalid-feedback').remove();
            });

            function createEmployee() {
                const url = "{{ route('api.employees.store') }}";

                // ambil form data
                let data = {
                    name: $('#addName').val(),
                    address: $('#addAddress').val(),
                    email: $('#addEmail').val(),
                    phone_number: $('#addPhoneNumber').val(),
                    position: $('#addPosition').val(),
                };

                // kirim data ke server POST /employees
                $.post(url, data)
                    .done((response) => {
                        // tampilkan pesan sukses
                        toastr.success(response.message, 'Sukses');

                        // reload halaman setelah 3 detik
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    })
                    .fail((error) => {
                        // ambil response error
                        let response = error.responseJSON;

                        // tampilkan pesan error
                        toastr.error(response.message, 'Error');

                        // tampilkan error validation
                        if (response.errors) {
                            // loop object errors
                            for (const error in response.errors) {
                                // cari input name yang error pada #addForm
                                let input = $(`#addForm input[name="${error}"]`);

                                // tambahkan class is-invalid pada input
                                input.addClass('is-invalid');

                                // buat elemen class="invalid-feedback"
                                let feedbackElement = `<div class="invalid-feedback">`;
                                feedbackElement += `<ul class="list-unstyled">`;
                                response.errors[error].forEach((message) => {
                                    feedbackElement += `<li>${message}</li>`;
                                });
                                feedbackElement += `</ul>`;
                                feedbackElement += `</div>`;

                                // tambahkan class invalid-feedback setelah input
                                input.after(feedbackElement);
                            }
                        }
                    });
            }

            function editEmployee() {
                let url = "{{ route('api.employees.update', ':employeeId') }}";
                url = url.replace(':employeeId', employeeId);

                // ambil form data
                let data = {
                    name: $('#editName').val(),
                    address: $('#editAddress').val(),
                    email: $('#editEmail').val(),
                    phone_number: $('#editPhoneNumber').val(),
                    position: $('#editPosition').val(),
                    _method: 'PUT'
                };

                // kirim data ke server POST /employees
                $.post(url, data)
                    .done((response) => {
                        // tampilkan pesan sukses
                        toastr.success(response.message, 'Success');

                        // reload halaman setelah 3 detik
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    })
                    .fail((error) => {
                        // ambil response error
                        let response = error.responseJSON;

                        // tampilkan pesan error
                        toastr.error(response.message, 'Error');

                        // tampilkan error validation
                        if (response.errors) {
                            // loop object errors
                            for (const error in response.errors) {
                                // cari input name yang error pada #editForm
                                let input = $(`#editForm input[name="${error}"]`);

                                // tambahkan class is-invalid pada input
                                input.addClass('is-invalid');

                                // buat elemen class="invalid-feedback"
                                let feedbackElement = `<div class="invalid-feedback">`;
                                feedbackElement += `<ul class="list-unstyled">`;
                                response.errors[error].forEach((message) => {
                                    feedbackElement += `<li>${message}</li>`;
                                });
                                feedbackElement += `</ul>`;
                                feedbackElement += `</div>`;

                                // tambahkan class invalid-feedback setelah input
                                input.after(feedbackElement);
                            }
                        }
                    });
            }

            function deleteEmployee(employeeId) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'The employee will be deleted, you cannot revert this action!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        let url = "{{ route('api.employees.destroy', ':employeeId') }}";
                        url = url.replace(':employeeId', employeeId);

                        $.post(url, {
                                _method: 'DELETE'
                            })
                            .done((response) => {
                                toastr.success(response.message, 'Sukses');

                                setTimeout(() => {
                                    location.reload();
                                }, 1000);
                            })
                            .fail((error) => {
                                toastr.error('Failed to delete employee', 'Error');
                            });
                    }
                });
            }

            function openEditModal(id) {
                // mengisi variabel employeeId dengan id yang dikirim dari tombol edit
                employeeId = id;

                // ambil data pegawai dari server
                let url = `{{ route('api.employees.show', ':employeeId') }}`;
                url = url.replace(':employeeId', employeeId);

                // ambil data pegawai
                $.get(url)
                    .done((response) => {
                        // isi form editModal dengan data pegawai
                        $('#editName').val(response.data.name);
                        $('#editAddress').val(response.data.address);
                        $('#editEmail').val(response.data.email);
                        $('#editPhoneNumber').val(response.data.phone_number);
                        $('#editPosition').val(response.data.position);

                        // tampilkan modal editModal
                        $('#editModal').modal('show');
                    })
                    .fail((error) => {
                        // tampilkan pesan error
                        toastr.error('Failed to fetch employee', 'Error');
                    });
            }
</script>
@endpush
