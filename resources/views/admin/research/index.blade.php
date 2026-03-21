@extends('layouts.admin')
@section('title', 'Research Management')
@section('content')
    <div class="container" id="kt_content_container">

        <div class="row g-xl-8">
            <!-- Research Table -->
            <div class="col-xxl-12">
                <div class="card card-xxl-stretch mb-5 mb-xl-3">
                    <div class="card-header border-0 pt-5 pb-3">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-boldest text-gray-800 fs-2">Research Management</span>
                            <span class="text-gray-400 fw-bold mt-2 fs-6">Manage your research projects</span>
                        </h3>
                        <div class="card-toolbar">
                            <div class="my-1">
                                <a class="btn btn-sm btn-icon btn-circle btn-icon-success btn-active-light-success"
                                    href="#" data-bs-toggle="modal" data-bs-target="#createResearchModal">
                                    <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Add New Research">
                                        <!--begin::Svg Icon | path: icons/duotone/Interface/Plus-Square.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M6.54184 2.36899C4.34504 2.65912 2.65912 4.34504 2.36899 6.54184C2.16953 8.05208 2 9.94127 2 12C2 14.0587 2.16953 15.9479 2.36899 17.4582C2.65912 19.655 4.34504 21.3409 6.54184 21.631C8.05208 21.8305 9.94127 22 12 22C14.0587 22 15.9479 21.8305 17.4582 21.631C19.655 21.3409 21.3409 19.655 21.631 17.4582C21.8305 15.9479 22 14.0587 22 12C22 9.94127 21.8305 8.05208 21.631 6.54184C21.3409 4.34504 19.655 2.65912 17.4582 2.36899C15.9479 2.16953 14.0587 2 12 2C9.94127 2 8.05208 2.16953 6.54184 2.36899Z"
                                                    fill="#12131A" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M12 17C12.5523 17 13 16.5523 13 16V13H16C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H13V8C13 7.44772 12.5523 7 12 7C11.4477 7 11 7.44772 11 8V11H8C7.44772 11 7 11.4477 7 12C7 12.5523 7.44771 13 8 13H11V16C11 16.5523 11.4477 17 12 17Z"
                                                    fill="#12131A" />
                                            </svg>
                                        </span>

                                        <!--end::Svg Icon-->
                                    </span>
                                </a>
                            </div>
                            <!-- Search -->
                            <div class="position-relative pe-6 my-1">
                                <span
                                    class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
                                    <!-- SVG icon here -->
                                </span>
                                <input type="text" class="w-150px form-control form-control-sm form-control-solid ps-10"
                                    id="searchInput" placeholder="Search" />
                            </div>
                            <!-- Filter -->
                            <div class="my-1">
                                <select class="form-select form-select-sm form-select-solid fw-bolder w-300px"
                                    id="campusFilter">
                                    <option value="">Select School Campus</option>
                                    @foreach ($campuses as $campus)
                                        <option value="{{ $campus->id }}">{{ $campus->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card-body py-0">
                        <div id="all_researches">
                            <div class="text-center py-5">
                                <span class="spinner-border text-primary"></span>
                                <div class="mt-2">Loading...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Create Research Modal -->
        <div class="modal fade" id="createResearchModal" tabindex="-1" aria-labelledby="createResearchLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title"><i class="bi bi-person-badge-fill me-2"></i> Create Research</h5>
                        <button type="button" class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                            data-bs-dismiss="modal" aria-label="Close" id="close_header_btn">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">

                        <!-- Info Alert -->
                        <div class="alert alert-primary d-flex align-items-start mb-4">
                            <i class="bi bi-info-circle-fill fs-3 me-3"></i>
                            <div>
                                <strong>Creating research:</strong>
                                <p class="mb-0">Fill in the details below to create a new research entry.</p>
                            </div>
                        </div>

                        <!-- Form -->
                        <form action="{{ route('admin.researches.store') }}" method="POST" id="CreateResearch"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- Research Title -->
                            <div class="mb-3">
                                <label class="form-label">Research Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-solid" name="title"
                                    placeholder="Research Title">
                                <span class="text-danger error-text title_error"></span>
                            </div>

                            <!-- Author & Adviser -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Author <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-solid" name="author"
                                        placeholder="Author">
                                    <span class="text-danger error-text author_error"></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Adviser <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-solid" name="adviser"
                                        placeholder="Adviser">
                                    <span class="text-danger error-text adviser_error"></span>
                                </div>
                            </div>



                            <!-- Campus & Department -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Campus <span class="text-danger">*</span></label>
                                    <select class="form-select form-select-solid" name="campus_id" id="campusSelect">
                                        <option value="">Select Campus</option>
                                        @foreach ($campuses as $campus)
                                            <option value="{{ $campus->id }}">{{ $campus->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-text campus_id_error"></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Department <span class="text-danger">*</span></label>
                                    <select class="form-select form-select-solid" name="department_id"
                                        id="departmentSelect">
                                        <option value="">Select Department</option>
                                        <!-- Options will be dynamically loaded -->
                                    </select>
                                    <span class="text-danger error-text department_id_error"></span>
                                </div>
                            </div>
                            <!-- Course & Major -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Course <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-solid" name="course"
                                        placeholder="Course">
                                    <span class="text-danger error-text course_error"></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Major <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-solid" name="major"
                                        placeholder="Major">
                                    <span class="text-danger error-text major_error"></span>
                                </div>
                            </div>

                            <!-- Academic Year & Publication Status -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Academic Year <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-solid" name="academic_year"
                                        placeholder="Academic Year">
                                    <span class="text-danger error-text academic_year_error"></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Publication Status <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select form-select-solid" name="publication_status">
                                        <option value="">Select Status</option>
                                        <option value="published">Published</option>
                                        <option value="unpublished">Unpublished</option>
                                    </select>
                                    <span class="text-danger error-text publication_status_error"></span>
                                </div>
                            </div>

                            <!-- Publication -->
                            <div class="mb-3">
                                <label class="form-label">Publication <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-solid" name="publication"
                                    placeholder="Publication">
                                <span class="text-danger error-text publication_error"></span>
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea class="form-control form-control-solid" name="description" placeholder="Type here . . ." cols="30"
                                    rows="5"></textarea>
                                <span class="text-danger error-text description_error"></span>
                            </div>

                            <!-- Abstract File -->
                            <div class="mb-3">
                                <label class="form-label">Abstract File <span class="text-danger">*</span></label>
                                <input type="file" class="form-control form-control-solid" name="abstract_document"
                                    accept=".pdf,.doc,.docx">
                                <span class="text-danger error-text abstract_document_error"></span>
                            </div>

                            <!-- Full Research Paper -->
                            <div class="mb-3">
                                <label class="form-label">Full Research Paper <span class="text-danger">*</span></label>
                                <input type="file" class="form-control form-control-solid" name="full_paper_file"
                                    accept=".pdf,.doc,.docx">
                                <span class="text-danger error-text full_paper_file_error"></span>
                            </div>

                            <!-- Buttons -->
                            <div class="mt-4 d-flex justify-content-end">
                                <button type="button" class="btn btn-sm btn-secondary me-2"
                                    data-bs-dismiss="modal"> <i class="bi bi-x-circle me-1"></i> Close</button>
                                <button type="submit" class="btn btn-sm btn-primary" id="btn_submit"><i class="bi bi-check2-circle me-1"></i>Submit</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- View Research Modal (Populated Dynamically) -->
        <div class="modal fade" id="viewResearchModal" tabindex="-1" aria-labelledby="viewResearchLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title"><i class="bi bi-file-earmark-text me-2"></i> View Research</h5>
                        <button type="button" class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                            data-bs-dismiss="modal" aria-label="Close">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">

                        <!-- Info Alert -->
                        <div class="alert alert-warning d-flex align-items-start mb-4">
                            <i class="bi bi-info-circle-fill fs-3 me-3"></i>
                            <div>
                                <strong>Research Details:</strong>
                                <p class="mb-0">All details below are read-only. You can view the attached files using
                                    the buttons.</p>
                            </div>
                        </div>

                        <!-- Form -->
                        <form enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="view_id" name="id">

                            <!-- Research Title -->
                            <div class="mb-3">
                                <label class="form-label">Research Title</label>
                                <input type="text" class="form-control form-control-solid" id="view_title" readonly>
                            </div>

                            <!-- Author & Adviser -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Author</label>
                                    <input type="text" class="form-control form-control-solid" id="view_author"
                                        readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Adviser</label>
                                    <input type="text" class="form-control form-control-solid" id="view_adviser"
                                        readonly>
                                </div>
                            </div>

                            <!-- Campus & Department -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Campus</label>
                                    <input type="text" class="form-control form-control-solid" id="view_campus"
                                        readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Department</label>
                                    <input type="text" class="form-control form-control-solid" id="view_department"
                                        readonly>
                                </div>
                            </div>

                            <!-- Course & Major -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Course</label>
                                    <input type="text" class="form-control form-control-solid" id="view_course"
                                        readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Major</label>
                                    <input type="text" class="form-control form-control-solid" id="view_major"
                                        readonly>
                                </div>
                            </div>

                            <!-- Academic Year & Publication Status -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Academic Year</label>
                                    <input type="text" class="form-control form-control-solid" id="view_academic_year"
                                        readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Publication Status</label>
                                    <select class="form-select form-select-solid" id="view_publication_status" disabled>
                                        <option value="">Select Status</option>
                                        <option value="published">Published</option>
                                        <option value="unpublished">Unpublished</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Publication -->
                            <div class="mb-3">
                                <label class="form-label">Publication</label>
                                <input type="text" class="form-control form-control-solid" id="view_publication"
                                    readonly>
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control form-control-solid" id="view_description" rows="4" readonly></textarea>
                            </div>

                            <!-- Abstract File -->
                            <div class="mb-3">
                                <label class="form-label">Abstract File</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-solid"
                                        id="view_abstract_document" readonly>
                                    <button class="btn btn-warning" type="button" id="view_abstract_pdf_btn">
                                        <i class="bi bi-eye"></i> View
                                    </button>
                                </div>
                            </div>

                            <!-- Full Research Paper -->
                            <div class="mb-3">
                                <label class="form-label">Full Research Paper</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-solid"
                                        id="view_full_paper_file" readonly>
                                    <button class="btn btn-warning" type="button" id="view_research_paper_pdf_btn">
                                        <i class="bi bi-eye"></i> View
                                    </button>
                                </div>
                            </div>

                            <!-- Modal Buttons -->
                            <div class="d-flex justify-content-end mt-4">
                                <button type="button" class="btn btn-secondary me-2"
                                    data-bs-dismiss="modal"> <i class="bi bi-x-circle me-1"></i>Close</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Research Modal -->
        <div class="modal fade" id="editResearchModal" tabindex="-1" aria-labelledby="editResearchLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title"><i class="bi bi-pencil-square me-2"></i> Edit Research</h5>
                        <button type="button" class="btn btn-icon btn-sm btn-active-light-primary ms-2"
                            data-bs-dismiss="modal" aria-label="Close" id="edit_close_header_btn">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">

                        <!-- Info Alert -->
                        <div class="alert alert-warning d-flex align-items-start mb-4">
                            <i class="bi bi-info-circle-fill fs-3 me-3"></i>
                            <div>
                                <strong>Editing research:</strong>
                                <p class="mb-0">Update the details below and submit to save changes.</p>
                            </div>
                        </div>

                        <!-- Form -->
                        <form id="EditResearchForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="edit_id">

                            <!-- Research Title -->
                            <div class="mb-3">
                                <label class="form-label">Research Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-solid" name="title"
                                    id="edit_title" placeholder="Research Title">
                                <span class="text-danger error-text title_error"></span>
                            </div>

                            <!-- Author & Adviser -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Author <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-solid" name="author"
                                        id="edit_author" placeholder="Author">
                                    <span class="text-danger error-text author_error"></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Adviser <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-solid" name="adviser"
                                        id="edit_adviser" placeholder="Adviser">
                                    <span class="text-danger error-text adviser_error"></span>
                                </div>
                            </div>

                            <!-- Campus & Department -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Campus <span class="text-danger">*</span></label>
                                    <select class="form-select form-select-solid" name="campus_id"
                                        id="edit_campusSelect">
                                        <option value="">Select Campus</option>
                                        @foreach ($campuses as $campus)
                                            <option value="{{ $campus->id }}">{{ $campus->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger error-text campus_id_error"></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Department <span class="text-danger">*</span></label>
                                    <select class="form-select form-select-solid" name="department_id"
                                        id="edit_departmentSelect">
                                        <option value="">Select Department</option>
                                    </select>
                                    <span class="text-danger error-text department_id_error"></span>
                                </div>
                            </div>

                            <!-- Course & Major -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Course <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-solid" name="course"
                                        id="edit_course" placeholder="Course">
                                    <span class="text-danger error-text course_error"></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Major <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-solid" name="major"
                                        id="edit_major" placeholder="Major">
                                    <span class="text-danger error-text major_error"></span>
                                </div>
                            </div>

                            <!-- Academic Year & Publication Status -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Academic Year <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-solid" name="academic_year"
                                        id="edit_academic_year" placeholder="Academic Year">
                                    <span class="text-danger error-text academic_year_error"></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Publication Status <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select form-select-solid" name="publication_status"
                                        id="edit_publication_status">
                                        <option value="">Select Status</option>
                                        <option value="published">Published</option>
                                        <option value="unpublished">Unpublished</option>
                                    </select>
                                    <span class="text-danger error-text publication_status_error"></span>
                                </div>
                            </div>

                            <!-- Publication -->
                            <div class="mb-3">
                                <label class="form-label">Publication <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-solid" name="publication"
                                    id="edit_publication" placeholder="Publication">
                                <span class="text-danger error-text publication_error"></span>
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label class="form-label">Description <span class="text-danger">*</span></label>
                                <textarea class="form-control form-control-solid" name="description" id="edit_description"
                                    placeholder="Type here . . ." rows="5"></textarea>
                                <span class="text-danger error-text description_error"></span>
                            </div>

                            <!-- Abstract File -->
                            <div class="mb-3">
                                <label class="form-label">Abstract File</label>
                                <input type="file" class="form-control form-control-solid" name="abstract_document"
                                    accept=".pdf,.doc,.docx">
                                <span class="text-danger error-text abstract_document_error"></span>
                            </div>

                            <!-- Full Research Paper -->
                            <div class="mb-3">
                                <label class="form-label">Full Research Paper</label>
                                <input type="file" class="form-control form-control-solid" name="full_paper_file"
                                    accept=".pdf,.doc,.docx">
                                <span class="text-danger error-text full_paper_file_error"></span>
                            </div>

                            <!-- Buttons -->
                            <div class="d-flex justify-content-end mt-4">
                                <button type="button" class="btn btn-secondary me-2"
                                    data-bs-dismiss="modal"> <i class="bi bi-x-circle me-1"></i>Close</button>
                                <button type="submit" class="btn btn-primary" id="btn_edit_submit"> <i class="bi bi-check2-circle me-1"></i>Update</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                // CSRF setup for AJAX
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                 // -----------------------------
                // GLOBAL AJAX ERROR HANDLER
                // -----------------------------
                $(document).ajaxError(function(event, xhr) {
                    if (xhr.status === 403) {
                        Swal.fire(
                            'Permission Denied',
                            xhr.responseJSON?.message || 'You do not have permission to perform this action.',
                            'error'
                        );
                    }
                });


                //Onchange event for campus select to load corresponding departments
                $('#campusSelect').on('change', function() {
                    var campusId = $(this).val();
                    if (campusId) {
                        $.ajax({
                            url: '/researches/departments/' + campusId,
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                var deptSelect = $('#departmentSelect');
                                deptSelect.empty();
                                deptSelect.append('<option value="">Select Department</option>');
                                $.each(data, function(key, value) {
                                    deptSelect.append('<option value="' + value.id + '">' +
                                        value.name + '</option>');
                                });
                            }
                        });
                    } else {
                        $('#departmentSelect').empty();
                        $('#departmentSelect').append('<option value="">Select Department</option>');
                    }
                });



                function GetResearchRecord(search = '', campus_id = '') {
                    $.get('{{ route('admin.researches.fetch') }}', {
                            search,
                            campus_id
                        })
                        .done(function(response) {
                            $("#all_researches").html(response);
                            $("#kt_table_widget_1").DataTable({
                                "order": [
                                    [0, "asc"]
                                ],
                                "language": {
                                    "lengthMenu": "Show _MENU_"
                                }
                            });
                        });
                }

                // Search input
                $('#searchInput').on('keyup', function() {
                    var search = $(this).val();
                    var campus_id = $('#campusFilter').val();
                    GetResearchRecord(search, campus_id);
                });

                // Campus select
                $('#campusFilter').on('change', function() {
                    var campus_id = $(this).val();
                    var search = $('#searchInput').val();
                    GetResearchRecord(search, campus_id);
                });

                // Initial fetch of research records
                GetResearchRecord();

                //Create Research
                $("#CreateResearch").on('submit', function(e) {
                    e.preventDefault();
                    $("#btn_submit").html(
                        'Please wait <span class="fas fa-spinner fa-spin align-middle ms-2"></span>');
                    $('#btn_submit').attr("disabled", true);
                    var form = this;

                    $.ajax({
                        url: $(form).attr('action'),
                        method: $(form).attr('method'),
                        data: new FormData(form),
                        processData: false,
                        dataType: "json",
                        contentType: false,
                        beforeSend: function() {

                            $(form).find('span.error-text').text('');

                        },
                        success: function(response) {

                            if (response.status == 422) {
                                $('#btn_submit').removeAttr("disabled");
                                $.each(response.error, function(prefix, val) {
                                    $(form).find('span.' + prefix + '_error').text(val[0]);
                                });
                                $("#btn_submit").text('Submit');

                            } else {

                                $(form)[0].reset();
                                $('#btn_submit').removeAttr("disabled");
                                $('#btn_submit').text('Submit');

                                GetResearchRecord();

                                $("#createResearchModal").modal('hide'); //hide the modal

                                // SWEETALERT
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Research Created Successfully.',
                                    showConfirmButton: true,
                                })
                            }

                            $('#close_btn').on('click', function() {
                                $("#CreateResearch").find('span.text-danger').text('');
                            });

                            $('#close_header_btn').on('click', function() {
                                $("#CreateResearch").find('span.text-danger').text('');
                            });

                        }
                    });
                });
                // View Research Abstract
                $(document).on('click', '.research_view', function(e) {
                    e.preventDefault();
                    let id = $(this).data('id');

                    $.ajax({
                        url: '{{ route('admin.researches.view') }}',
                        method: 'GET',
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            // Clear previous data
                            $('#viewResearchModal input, #viewResearchModal textarea').val('');
                            $('#view_abstract_pdf_btn').removeData('url');
                            $('#view_research_paper_pdf_btn').removeData('url');

                            // Populate form
                            $("#view_abstract_id").val(response.id);
                            $("#view_title").val(response.title);
                            $("#view_author").val(response.author);
                            $("#view_adviser").val(response.adviser);
                            $("#view_campus").val(response.campus.name);
                            $("#view_department").val(response.department.name);
                            $("#view_course").val(response.course);
                            $("#view_major").val(response.major);
                            $("#view_academic_year").val(response.academic_year);
                            $("#view_publication_status").val(response.publication_status);
                            $("#view_publication").val(response.publication);
                            $("#view_description").val(response.description);

                            // Show file names (readonly inputs)
                            $("#view_abstract_document").val(response.abstract_file_name);
                            $("#view_full_paper_file").val(response.research_paper_file_name);

                            // Set correct data-url for buttons
                            let AbstractPdfURL =
                                '{{ route('admin.researches.view_abstract_pdf', ':id') }}'.replace(
                                    ':id', response.id) + '?t=' + new Date().getTime();
                            $("#view_abstract_pdf_btn").data('url', AbstractPdfURL);

                            let ResearchFileURL =
                                '{{ route('admin.researches.view_research_pdf', ':id') }}'.replace(
                                    ':id', response.id) + '?t=' + new Date().getTime();
                            $("#view_research_paper_pdf_btn").data('url', ResearchFileURL);
                        },
                        error: function(err) {
                            console.log('Failed to fetch research details.');
                        }
                    });
                });

                // View PDF Abstract
                $(document).on('click', '#view_abstract_pdf_btn', function(e) {
                    e.preventDefault();
                    let AbstractPdfURL = $(this).data('url'); // must match .data('url')
                    if (AbstractPdfURL) {
                        window.open(AbstractPdfURL, '_blank');
                    } else {
                        alert('PDF file not available.');
                    }
                });

                // View Full Research Paper
                $(document).on('click', '#view_research_paper_pdf_btn', function(e) {
                    e.preventDefault();
                    let ResearchFileURL = $(this).data('url');
                    if (ResearchFileURL) {
                        window.open(ResearchFileURL, '_blank');
                    } else {
                        alert('Research file not available.');
                    }
                });

                // Clear modal when hidden
                $('#viewResearchModal').on('hidden.bs.modal', function(e) {
                    $('#viewResearchModal input, #viewResearchModal textarea').val('');
                    $('#view_abstract_pdf_btn').removeData('url');
                    $('#view_research_paper_pdf_btn').removeData('url');
                });

                // On clicking edit
                $(document).on('click', '.research_edit', function(e) {
                    e.preventDefault();
                    let id = $(this).data('id');

                    $('#EditResearchForm').find('span.error-text').text('');

                    $.get('{{ route('admin.researches.view') }}', {
                        id: id
                    }, function(res) {
                        $('#edit_id').val(res.id);
                        $('#edit_title').val(res.title);
                        $('#edit_author').val(res.author);
                        $('#edit_adviser').val(res.adviser);
                        $('#edit_course').val(res.course);
                        $('#edit_major').val(res.major);
                        $('#edit_academic_year').val(res.academic_year);
                        $('#edit_publication_status').val(res.publication_status);
                        $('#edit_publication').val(res.publication);
                        $('#edit_description').val(res.description);

                        // Populate campus
                        $('#edit_campusSelect').val(res.campus.id);

                        // Populate department after campus options are loaded
                        if (res.campus.id) {
                            $.get('/researches/departments/' + res.campus.id, function(data) {
                                let deptSelect = $('#edit_departmentSelect');
                                deptSelect.empty().append(
                                    '<option value="">Select Department</option>');

                                $.each(data, function(key, value) {
                                    deptSelect.append('<option value="' + value.id +
                                        '">' + value.name + '</option>');
                                });

                                // Now set the department value
                                deptSelect.val(res.department.id);
                            });
                        }

                        $('#editResearchModal').modal('show');
                    });
                });

                // On campus change, load departments
                $('#edit_campusSelect').on('change', function() {
                    let campusId = $(this).val();
                    let deptSelect = $('#edit_departmentSelect');
                    deptSelect.empty().append('<option value="">Select Department</option>');

                    if (campusId) {
                        $.get('/researches/departments/' + campusId, function(data) {
                            $.each(data, function(key, value) {
                                deptSelect.append('<option value="' + value.id + '">' + value
                                    .name + '</option>');
                            });
                        });
                    }
                });

                // Submit edit form
                $('#EditResearchForm').on('submit', function(e) {
                    e.preventDefault();
                    let id = $('#edit_id').val();
                    let formData = new FormData(this);


                    $("#btn_edit_submit").html('Please wait <span class="fas fa-spinner fa-spin align-middle ms-2"></span>');
                    $('#btn_edit_submit').attr("disabled", true);
                    $.ajax({
                        url: 'researches/update/' + id, // Assuming standard resource route
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(res) {
                            if (res.status === 422) {
                                $.each(res.error, function(prefix, val) {
                                    $('#EditResearchForm').find('span.' + prefix + '_error')
                                        .text(val[0]);
                                });
                                $('#btn_edit_submit').removeAttr('disabled').text('Update');
                            } else {
                                $('#EditResearchForm')[0].reset();
                                $('#editResearchModal').modal('hide');
                                $('#btn_edit_submit').removeAttr('disabled').text('Update');

                                // Refresh table
                                GetResearchRecord();

                                Swal.fire({
                                    icon: 'success',
                                    title: 'Research Updated Successfully!',
                                    showConfirmButton: true
                                });
                            }
                        }
                    });
                });

                $(document).on('click', '.research_delete', function() {

                    const id = $(this).data('id');

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {

                        if (!result.isConfirmed) return;

                        $.ajax({
                            url: "{{ route('admin.departments.destroy', ':id') }}".replace(':id', id),
                            method: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function() {
                                GetDepartmentRecord();

                                Swal.fire({
                                    icon: 'success',
                                    title: 'Department Deleted Successfully',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                            }
                        });
                    });
                });

            });
        </script>

    @endpush
@endsection
