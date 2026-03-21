@extends('layouts.admin')
@section('content')
    <div class="container" id="kt_content_container">
        <!--begin::Row-->
        <div class="row g-xl-8">
            <!--begin:::Col-->
            <div class="col-xxl-5">
                <!--begin::List Widget 3-->
                <div class="card card-flush mb-5 mb-xl-8">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <h3 class="card-title fw-boldest">Latest Authors Sales</h3>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Icon-->
                            <a class="btn btn-sm btn-icon btn-circle btn-icon-success btn-active-light-success" href="#"
                                data-bs-toggle="modal" data-bs-target="#kt_modal_users_search">
                                <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Add New User">
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
                            <!--end::Icon-->
                            <!--begin::Icon-->
                            <a class="btn btn-sm btn-icon btn-circle btn-icon-primary btn-active-light-primary"
                                href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">
                                <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Add New Card">
                                    <!--begin::Svg Icon | path: icons/duotone/Interface/Image.svg-->
                                    <span class="svg-icon svg-icon-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.25"
                                                d="M2.45153 5.94826C2.71842 4.12109 4.12109 2.71842 5.94826 2.45153C7.54228 2.21869 9.6618 2 12 2C14.3382 2 16.4577 2.21869 18.0517 2.45153C19.8789 2.71842 21.2816 4.12109 21.5485 5.94826C21.7813 7.54228 22 9.6618 22 12C22 14.3382 21.7813 16.4577 21.5485 18.0517C21.2816 19.8789 19.8789 21.2816 18.0517 21.5485C16.4577 21.7813 14.3382 22 12 22C9.6618 22 7.54228 21.7813 5.94826 21.5485C4.12109 21.2816 2.71842 19.8789 2.45153 18.0517C2.21869 16.4577 2 14.3382 2 12C2 9.6618 2.21869 7.54228 2.45153 5.94826Z"
                                                fill="#12131A" />
                                            <path
                                                d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z"
                                                fill="#12131A" />
                                            <path
                                                d="M21.6642 17.2016C21.7024 16.8989 21.5962 16.5963 21.3805 16.3806L17.4143 12.4144C16.6332 11.6334 15.3669 11.6334 14.5858 12.4144L11.7072 15.2931C11.3166 15.6836 10.6835 15.6836 10.293 15.2931L9.41427 14.4144C8.63322 13.6334 7.36689 13.6334 6.58584 14.4144L2.93337 18.0669C2.68517 18.3151 2.57669 18.679 2.70674 19.005C3.24439 20.3529 4.45448 21.3303 5.94832 21.5485C7.54234 21.7813 9.66186 22 12.0001 22C14.3383 22 16.4578 21.7813 18.0518 21.5485C19.879 21.2816 21.2816 19.8789 21.5485 18.0517C21.5878 17.7828 21.6267 17.499 21.6642 17.2016Z"
                                                fill="#12131A" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                            </a>
                            <!--end::Icon-->
                            <!--begin::Icon-->
                            <a class="btn btn-sm btn-icon btn-circle btn-icon-danger btn-active-light-danger" href="#"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                data-kt-menu-flip="top-end">
                                <!--begin::Svg Icon | path: icons/duotone/Interface/Options-Square.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M2.36899 6.54184C2.65912 4.34504 4.34504 2.65912 6.54184 2.36899C8.05208 2.16953 9.94127 2 12 2C14.0587 2 15.9479 2.16953 17.4582 2.36899C19.655 2.65912 21.3409 4.34504 21.631 6.54184C21.8305 8.05208 22 9.94127 22 12C22 14.0587 21.8305 15.9479 21.631 17.4582C21.3409 19.655 19.655 21.3409 17.4582 21.631C15.9479 21.8305 14.0587 22 12 22C9.94127 22 8.05208 21.8305 6.54184 21.631C4.34504 21.3409 2.65912 19.655 2.36899 17.4582C2.16953 15.9479 2 14.0587 2 12C2 9.94127 2.16953 8.05208 2.36899 6.54184Z"
                                            fill="#12131A" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9 12C9 12.5523 8.55228 13 8 13C7.44772 13 7 12.5523 7 12C7 11.4477 7.44772 11 8 11C8.55228 11 9 11.4477 9 12ZM13 12C13 12.5523 12.5523 13 12 13C11.4477 13 11 12.5523 11 12C11 11.4477 11.4477 11 12 11C12.5523 11 13 11.4477 13 12ZM16 13C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11C15.4477 11 15 11.4477 15 12C15 12.5523 15.4477 13 16 13Z"
                                            fill="#12131A" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </a>
                            <!--begin::Menu 1-->
                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true">
                                <!--begin::Header-->
                                <div class="px-7 py-5">
                                    <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Menu separator-->
                                <div class="separator border-gray-200"></div>
                                <!--end::Menu separator-->
                                <!--begin::Form-->
                                <div class="px-7 py-5">
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-bold">Status:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <div>
                                            <select class="form-select form-select-solid" data-kt-select2="true"
                                                data-placeholder="Select option" data-allow-clear="true">
                                                <option></option>
                                                <option value="1">Approved</option>
                                                <option value="2">Pending</option>
                                                <option value="2">In Process</option>
                                                <option value="2">Rejected</option>
                                            </select>
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-bold">Member Type:</label>
                                        <!--end::Label-->
                                        <!--begin::Options-->
                                        <div class="d-flex">
                                            <!--begin::Options-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" value="1" />
                                                <span class="form-check-label">Author</span>
                                            </label>
                                            <!--end::Options-->
                                            <!--begin::Options-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="2"
                                                    checked="checked" />
                                                <span class="form-check-label">Customer</span>
                                            </label>
                                            <!--end::Options-->
                                        </div>
                                        <!--end::Options-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-bold">Notifications:</label>
                                        <!--end::Label-->
                                        <!--begin::Switch-->
                                        <div
                                            class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value=""
                                                name="notifications" checked="checked" />
                                            <label class="form-check-label">Enabled</label>
                                        </div>
                                        <!--end::Switch-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end">
                                        <button type="reset" class="btn btn-sm btn-white btn-active-light-primary me-2"
                                            data-kt-menu-dismiss="true">Reset</button>
                                        <button type="submit" class="btn btn-sm btn-primary"
                                            data-kt-menu-dismiss="true">Apply</button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Form-->
                            </div>
                            <!--end::Menu 1-->
                            <!--end::Icon-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Body-->
                    <div class="card-body pt-1">
                        <!--begin::Tabs-->
                        <ul class="nav rounded-pill flex-center bg-light overflow-auto flex-nowrap p-2 mb-8">
                            <!--begin::Tab nav-->
                            <li class="nav-item flex-equal">
                                <a class="nav-link btn btn-active-white btn-color-gray-500 btn-active-color-gray-700 py-2 px-4 fs-6 fw-bold active"
                                    data-bs-toggle="tab" href="#kt_lists_widget_3_tab_pane_1">Exclusive Authors</a>
                            </li>
                            <!--end::Tab nav-->
                            <!--begin::Tab nav-->
                            <li class="nav-item flex-equal mx-1">
                                <a class="nav-link btn btn-active-white btn-color-gray-500 btn-active-color-gray-700 py-2 px-4 fs-6 fw-bold"
                                    data-bs-toggle="tab" href="#kt_lists_widget_3_tab_pane_2">Statistics</a>
                            </li>
                            <!--end::Tab nav-->
                            <!--begin::Tab nav-->
                            <li class="nav-item flex-equal">
                                <a class="nav-link btn btn-active-white btn-color-gray-500 btn-active-color-gray-700 py-2 px-4 fs-6 fw-bold"
                                    data-bs-toggle="tab" href="#kt_lists_widget_3_tab_pane_3">Recent Trends</a>
                            </li>
                            <!--end::Tab nav-->
                        </ul>
                        <!--end::Tabs-->
                        <!--begin:Tab content-->
                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade active show" id="kt_lists_widget_3_tab_pane_1">
                                <!--begin::Section-->
                                <div class="mb-7">
                                    <!--begin::Heading-->
                                    <div class="fw-bold fs-4 text-gray-400 mb-5">24 Sep, 2021</div>
                                    <!--end::Heading-->
                                    <!--begin::Items-->
                                    <div class="overflow-auto mb-10">
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center mb-7">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-40px symbol-circle me-4">
                                                <span
                                                    class="symbol-label bg-light-primary text-primary fw-boldest">A</span>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::List content-->
                                            <div class="d-flex flex-column min-w-150px me-4">
                                                <a href="#"
                                                    class="fw-boldest text-gray-800 text-hover-primary fs-4">Piper
                                                    Aerostar</a>
                                                <div class="fw-bold fs-6 text-gray-400">iper-aircraft-class.jsp</div>
                                            </div>
                                            <!--end::List content-->
                                            <!--begin::Price-->
                                            <div class="ms-auto rounded-pill bg-light fw-bolder text-gray-600 py-1 px-3">
                                                2,040.00$</div>
                                            <!--end::Price-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center mb-7">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-40px symbol-circle me-4">
                                                <img alt="Pic" src="assets/media/avatars/150-3.jpg" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::List content-->
                                            <div class="d-flex flex-column min-w-150px me-4">
                                                <a href="#"
                                                    class="fw-boldest text-gray-800 text-hover-primary fs-4">Cirrus
                                                    SR22</a>
                                                <div class="fw-bold fs-6 text-gray-400">cirrus-aircraft.jsp</div>
                                            </div>
                                            <!--end::List content-->
                                            <!--begin::Price-->
                                            <div class="ms-auto rounded-pill bg-light fw-bolder text-gray-600 py-1 px-3">
                                                280.00$</div>
                                            <!--end::Price-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center mb-7">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-40px symbol-circle me-4">
                                                <span
                                                    class="symbol-label bg-light-success text-success fw-boldest">S</span>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::List content-->
                                            <div class="d-flex flex-column min-w-150px me-4">
                                                <a href="#"
                                                    class="fw-boldest text-gray-800 text-hover-primary fs-4">Beachcraft
                                                    Baron</a>
                                                <div class="fw-bold fs-6 text-gray-400">beachcraft-class.jsp</div>
                                            </div>
                                            <!--end::List content-->
                                            <!--begin::Price-->
                                            <div class="ms-auto rounded-pill bg-light fw-bolder text-gray-600 py-1 px-3">
                                                4,500.00$</div>
                                            <!--end::Price-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-40px symbol-circle me-4">
                                                <img alt="Pic" src="assets/media/avatars/150-7.jpg" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::List content-->
                                            <div class="d-flex flex-column min-w-150px me-4">
                                                <a href="#"
                                                    class="fw-boldest text-gray-800 text-hover-primary fs-4">Cessna
                                                    SF150</a>
                                                <div class="fw-bold fs-6 text-gray-400">cessna-aircraft-class.jsp</div>
                                            </div>
                                            <!--end::List content-->
                                            <!--begin::Price-->
                                            <div class="ms-auto rounded-pill bg-light fw-bolder text-gray-600 py-1 px-3">
                                                1,050.00$</div>
                                            <!--end::Price-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Items-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Section-->
                                <div class="mb-7">
                                    <!--begin::Heading-->
                                    <div class="fw-bold fs-4 text-gray-400 mb-5">30 Sep, 2021</div>
                                    <!--end::Heading-->
                                    <!--begin::Items-->
                                    <div class="overflow-auto">
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center mb-7">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-40px symbol-circle me-4">
                                                <span class="symbol-label bg-light-danger text-danger fw-boldest">T</span>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::List content-->
                                            <div class="d-flex flex-column min-w-150px me-4">
                                                <a href="#"
                                                    class="fw-boldest text-gray-800 text-hover-primary fs-4">Roadshow
                                                    Tesla</a>
                                                <div class="fw-bold fs-6 text-gray-400">roadshow-tesla.jsp</div>
                                            </div>
                                            <!--end::List content-->
                                            <!--begin::Price-->
                                            <div class="ms-auto rounded-pill bg-light fw-bolder text-gray-600 py-1 px-3">
                                                730.00$</div>
                                            <!--end::Price-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center mb-7">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-40px symbol-circle me-4">
                                                <span class="symbol-label bg-light-info text-info fw-boldest">R</span>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::List content-->
                                            <div class="d-flex flex-column min-w-150px me-4">
                                                <a href="#"
                                                    class="fw-boldest text-gray-800 text-hover-primary fs-4">Landmark
                                                    RH100</a>
                                                <div class="fw-bold fs-6 text-gray-400">landmark-class-jsp</div>
                                            </div>
                                            <!--end::List content-->
                                            <!--begin::Price-->
                                            <div class="ms-auto rounded-pill bg-light fw-bolder text-gray-600 py-1 px-3">
                                                850.00$</div>
                                            <!--end::Price-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center mb-7">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-40px symbol-circle me-4">
                                                <img alt="Pic" src="assets/media/avatars/150-5.jpg" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::List content-->
                                            <div class="d-flex flex-column min-w-150px me-4">
                                                <a href="#"
                                                    class="fw-boldest text-gray-800 text-hover-primary fs-4">Space Jump</a>
                                                <div class="fw-bold fs-6 text-gray-400">space-jump-module.jsp</div>
                                            </div>
                                            <!--end::List content-->
                                            <!--begin::Price-->
                                            <div class="ms-auto rounded-pill bg-light fw-bolder text-gray-600 py-1 px-3">
                                                2,300.00$</div>
                                            <!--end::Price-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-40px symbol-circle me-4">
                                                <img alt="Pic" src="assets/media/avatars/150-12.jpg" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::List content-->
                                            <div class="d-flex flex-column min-w-150px me-4">
                                                <a href="#"
                                                    class="fw-boldest text-gray-800 text-hover-primary fs-4">Flight
                                                    Carrier</a>
                                                <div class="fw-bold fs-6 text-gray-400">flight-module.jsp</div>
                                            </div>
                                            <!--end::List content-->
                                            <!--begin::Price-->
                                            <div class="ms-auto rounded-pill bg-light fw-bolder text-gray-600 py-1 px-3">
                                                3,150.00$</div>
                                            <!--end::Price-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Items-->
                                </div>
                                <!--end::Section-->
                            </div>
                            <!--end::Tab pane-->
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade" id="kt_lists_widget_3_tab_pane_2">
                                <!--begin::Chart-->
                                <div id="kt_lists_widget_3_chart" style="height: 350px"></div>
                                <!--end::Chart-->
                            </div>
                            <!--end::Tab pane-->
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade" id="kt_lists_widget_3_tab_pane_3">
                                <!--begin::Items-->
                                <div class="mb-0">
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-sm-center mb-7">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-50px symbol-circle me-5">
                                            <span class="symbol-label">
                                                <img src="assets/media/svg/brand-logos/plurk.svg"
                                                    class="h-50 align-self-center" alt="" />
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                            <div class="flex-grow-1 me-2">
                                                <a href="#"
                                                    class="text-gray-800 text-hover-primary fs-6 fw-bolder">Top Authors</a>
                                                <span class="text-muted fw-bold d-block fs-7">Mark, Rowling, Esther</span>
                                            </div>
                                            <span class="badge badge-light fw-bolder my-2">+82$</span>
                                        </div>
                                        <!--end::Section-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-sm-center mb-7">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-50px symbol-circle me-5">
                                            <span class="symbol-label">
                                                <img src="assets/media/svg/brand-logos/telegram.svg"
                                                    class="h-50 align-self-center" alt="" />
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                            <div class="flex-grow-1 me-2">
                                                <a href="#"
                                                    class="text-gray-800 text-hover-primary fs-6 fw-bolder">Popular
                                                    Authors</a>
                                                <span class="text-muted fw-bold d-block fs-7">Randy, Steve, Mike</span>
                                            </div>
                                            <span class="badge badge-light fw-bolder my-2">+280$</span>
                                        </div>
                                        <!--end::Section-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-sm-center mb-7">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-50px symbol-circle me-5">
                                            <span class="symbol-label">
                                                <img src="assets/media/svg/brand-logos/vimeo.svg"
                                                    class="h-50 align-self-center" alt="" />
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                            <div class="flex-grow-1 me-2">
                                                <a href="#"
                                                    class="text-gray-800 text-hover-primary fs-6 fw-bolder">New Users</a>
                                                <span class="text-muted fw-bold d-block fs-7">John, Pat, Jimmy</span>
                                            </div>
                                            <span class="badge badge-light fw-bolder my-2">+4500$</span>
                                        </div>
                                        <!--end::Section-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-sm-center mb-7">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-50px symbol-circle me-5">
                                            <span class="symbol-label">
                                                <img src="assets/media/svg/brand-logos/treva.svg"
                                                    class="h-50 align-self-center" alt="" />
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                            <div class="flex-grow-1 me-2">
                                                <a href="#"
                                                    class="text-gray-800 text-hover-primary fs-6 fw-bolder">Premium
                                                    Themes</a>
                                                <span class="text-muted fw-bold d-block fs-7">Alex, Kate, Dave</span>
                                            </div>
                                            <span class="badge badge-light fw-bolder my-2">+1500$</span>
                                        </div>
                                        <!--end::Section-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-sm-center mb-7">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-50px symbol-circle me-5">
                                            <span class="symbol-label">
                                                <img src="assets/media/svg/brand-logos/bebo.svg"
                                                    class="h-50 align-self-center" alt="" />
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                            <div class="flex-grow-1 me-2">
                                                <a href="#"
                                                    class="text-gray-800 text-hover-primary fs-6 fw-bolder">Active
                                                    Customers</a>
                                                <span class="text-muted fw-bold d-block fs-7">Mark, Rowling, Esther</span>
                                            </div>
                                            <span class="badge badge-light fw-bolder my-2">+4500$</span>
                                        </div>
                                        <!--end::Section-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-sm-center mb-7">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-50px symbol-circle me-5">
                                            <span class="symbol-label">
                                                <img src="assets/media/svg/brand-logos/kickstarter.svg"
                                                    class="h-50 align-self-center" alt="" />
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                            <div class="flex-grow-1 me-2">
                                                <a href="#"
                                                    class="text-gray-800 text-hover-primary fs-6 fw-bolder">Bestseller
                                                    Theme</a>
                                                <span class="text-muted fw-bold d-block fs-7">Disco, Retro, Sports</span>
                                            </div>
                                            <span class="badge badge-light fw-bolder my-2">+4500$</span>
                                        </div>
                                        <!--end::Section-->
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-sm-center">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-50px symbol-circle me-5">
                                            <span class="symbol-label">
                                                <img src="assets/media/svg/brand-logos/fox-hub.svg"
                                                    class="h-50 align-self-center" alt="" />
                                            </span>
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                            <div class="flex-grow-1 me-2">
                                                <a href="#"
                                                    class="text-gray-800 text-hover-primary fs-6 fw-bolder">Fox Broker
                                                    App</a>
                                                <span class="text-muted fw-bold d-block fs-7">Finance, Corporate,
                                                    Apps</span>
                                            </div>
                                            <span class="badge badge-light fw-bolder my-2">+4500$</span>
                                        </div>
                                        <!--end::Section-->
                                    </div>
                                    <!--end::Item-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Tab pane-->
                        </div>
                        <!--end:Tab content-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::List Widget 3-->
                <!--begin::Slider Widget 1-->
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body pt-5">
                        <div id="kt_stats_widget_8_carousel" class="carousel carousel-custom carousel-stretch slide"
                            data-bs-ride="carousel" data-bs-interval="8000">
                            <!--begin::Heading-->
                            <div class="d-flex flex-stack flex-wrap">
                                <span class="fs-4 text-gray-400 fw-boldest pe-2">Announcements</span>
                                <!--begin::Carousel Indicators-->
                                <ol class="p-0 m-0 carousel-indicators carousel-indicators-dots">
                                    <li data-bs-target="#kt_stats_widget_8_carousel" data-bs-slide-to="0"
                                        class="ms-1 active"></li>
                                    <li data-bs-target="#kt_stats_widget_8_carousel" data-bs-slide-to="1" class="ms-1">
                                    </li>
                                    <li data-bs-target="#kt_stats_widget_8_carousel" data-bs-slide-to="2" class="ms-1">
                                    </li>
                                    <li data-bs-target="#kt_stats_widget_8_carousel" data-bs-slide-to="3" class="ms-1">
                                    </li>
                                </ol>
                                <!--end::Carousel Indicators-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Carousel-->
                            <div class="carousel-inner pt-6">
                                <!--begin::Item-->
                                <div class="carousel-item active">
                                    <div class="carousel-wrapper">
                                        <div class="d-flex flex-column justify-content-between flex-grow-1">
                                            <a href=""
                                                class="fs-2 text-gray-800 text-hover-primary fw-boldest">Rider Admin Launch
                                                Day</a>
                                            <p class="text-gray-600 fs-6 fw-bold pt-4 mb-0">To start a blog, think of a
                                                topic about and first brainstorm ways to write details</p>
                                        </div>
                                        <!--begin::Info-->
                                        <div class="d-flex flex-stack pt-8">
                                            <span class="badge badge-light-primary fs-7 fw-boldest me-2">OCT 05, 10</span>
                                            <a href="#"
                                                class="btn btn-light btn-sm btn-color-muted fs-7 fw-boldest px-5"
                                                data-bs-toggle="modal" data-bs-target="#kt_modal_create_account">Join</a>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="carousel-item">
                                    <div class="carousel-wrapper">
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column justify-content-between flex-grow-1">
                                            <a href=""
                                                class="fs-2 text-gray-800 text-hover-primary fw-boldest">Rider Dashboard
                                                Launch</a>
                                            <p class="text-gray-600 fs-6 fw-bold pt-4 mb-0">To start a blog, think of a
                                                topic about and first brainstorm ways to write details</p>
                                        </div>
                                        <!--end::Title-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-stack pt-8">
                                            <span class="badge badge-light-primary fs-7 fw-boldest me-2">DEC 03, 20</span>
                                            <a href="#"
                                                class="btn btn-light btn-sm btn-color-muted fs-7 fw-boldest px-5"
                                                data-bs-toggle="modal" data-bs-target="#kt_modal_create_account">Join</a>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="carousel-item">
                                    <div class="carousel-wrapper">
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column justify-content-between flex-grow-1">
                                            <a href=""
                                                class="fs-2 text-gray-800 text-hover-primary fw-boldest">Reached 50,000
                                                Sales</a>
                                            <p class="text-gray-600 fs-6 fw-bold pt-4 mb-0">To start a blog, think of a
                                                topic about and first brainstorm ways to write details</p>
                                        </div>
                                        <!--end::Title-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-stack pt-8">
                                            <span class="badge badge-light-primary fs-7 fw-boldest me-2">NOV 06, 23</span>
                                            <a href="#"
                                                class="btn btn-light btn-sm btn-color-muted fs-7 fw-boldest px-5"
                                                data-bs-toggle="modal" data-bs-target="#kt_modal_create_account">Join</a>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="carousel-item">
                                    <div class="carousel-wrapper">
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column justify-content-between flex-grow-1">
                                            <a href=""
                                                class="fs-2 text-gray-800 text-hover-primary fw-boldest">Reached 50,000
                                                Sales</a>
                                            <p class="text-gray-600 fs-6 fw-bold pt-4 mb-0">To start a blog, think of a
                                                topic about and first brainstorm ways to write details</p>
                                        </div>
                                        <!--end::Title-->
                                        <!--begin::Info-->
                                        <div class="d-flex flex-stack pt-8">
                                            <span class="badge badge-light-primary fs-7 fw-boldest me-2">AUG 01, 13</span>
                                            <a href="#"
                                                class="btn btn-light btn-sm btn-color-muted fs-7 fw-boldest px-5"
                                                data-bs-toggle="modal" data-bs-target="#kt_modal_create_account">Join</a>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Carousel-->
                        </div>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Slider Widget 1-->
                <!--begin::List Widget 4-->
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Header-->
                    <div class="card-header align-items-center border-0 mt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="fw-boldest text-dark fs-2">Folders</span>
                            <span class="text-gray-400 mt-2 fw-bold fs-6">32 Active Folders</span>
                        </h3>
                        <div class="card-toolbar">
                            <!--begin::Menu-->
                            <button type="button"
                                class="btn btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                data-kt-menu-flip="top-end">
                                <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="5" y="5" width="5" height="5" rx="1"
                                                fill="#000000" />
                                            <rect x="14" y="5" width="5" height="5" rx="1"
                                                fill="#000000" opacity="0.3" />
                                            <rect x="5" y="14" width="5" height="5" rx="1"
                                                fill="#000000" opacity="0.3" />
                                            <rect x="14" y="14" width="5" height="5" rx="1"
                                                fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </button>
                            <!--begin::Menu 3-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3"
                                data-kt-menu="true">
                                <!--begin::Heading-->
                                <div class="menu-item px-3">
                                    <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
                                </div>
                                <!--end::Heading-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Create Invoice</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link flex-stack px-3">Create Payment
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                            title="Specify a target name for future usage and reference"></i></a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Generate Bill</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                    data-kt-menu-placement="left-start" data-kt-menu-flip="center, top">
                                    <a href="#" class="menu-link px-3">
                                        <span class="menu-title">Subscription</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <!--begin::Menu sub-->
                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Plans</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Billing</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Statements</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator my-2"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content px-3">
                                                <!--begin::Switch-->
                                                <label class="form-check form-switch form-check-custom form-check-solid">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input w-30px h-20px" type="checkbox"
                                                        value="1" checked="checked" name="notifications" />
                                                    <!--end::Input-->
                                                    <!--end::Label-->
                                                    <span class="form-check-label text-muted fs-6">Recuring</span>
                                                    <!--end::Label-->
                                                </label>
                                                <!--end::Switch-->
                                            </div>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu sub-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-1">
                                    <a href="#" class="menu-link px-3">Settings</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu 3-->
                            <!--end::Menu-->
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-1">
                        <!--begin::Item-->
                        <div class="d-flex flex-stack item-border-hover px-3 py-2 ms-n4 mb-3">
                            <!--begin::Section-->
                            <div class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40px symbol-circle me-4">
                                    <span class="symbol-label bg-light-primary">
                                        <!--begin::Svg Icon | path: icons/duotone/Clothes/Crown.svg-->
                                        <span class="svg-icon svg-icon-1 svg-icon-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <path
                                                    d="M11.2600599,5.81393408 L2,16 L22,16 L12.7399401,5.81393408 C12.3684331,5.40527646 11.7359848,5.37515988 11.3273272,5.7466668 C11.3038503,5.7680094 11.2814025,5.79045722 11.2600599,5.81393408 Z"
                                                    fill="#000000" opacity="0.3" />
                                                <path
                                                    d="M12.0056789,15.7116802 L20.2805786,6.85290308 C20.6575758,6.44930487 21.2903735,6.42774054 21.6939717,6.8047378 C21.8964274,6.9938498 22.0113578,7.25847607 22.0113578,7.535517 L22.0113578,20 L16.0113578,20 L2,20 L2,7.535517 C2,7.25847607 2.11493033,6.9938498 2.31738608,6.8047378 C2.72098429,6.42774054 3.35378194,6.44930487 3.7307792,6.85290308 L12.0056789,15.7116802 Z"
                                                    fill="#000000" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Title-->
                                <div class="ps-1 mb-1">
                                    <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-boldest">Project
                                        Alice</a>
                                    <div class="text-gray-400 fw-bold">Phase 1 development</div>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Label-->
                            <span class="badge badge-light rounded-pill fs-7 fw-boldest">43 files</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-stack item-border-hover px-3 py-2 ms-n4 mb-3">
                            <!--begin::Section-->
                            <div class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40px symbol-circle me-4">
                                    <span class="symbol-label bg-light-danger">
                                        <!--begin::Svg Icon | path: icons/duotone/Code/Warning-2.svg-->
                                        <span class="svg-icon svg-icon-1 svg-icon-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <path
                                                    d="M11.1669899,4.49941818 L2.82535718,19.5143571 C2.557144,19.9971408 2.7310878,20.6059441 3.21387153,20.8741573 C3.36242953,20.9566895 3.52957021,21 3.69951446,21 L21.2169432,21 C21.7692279,21 22.2169432,20.5522847 22.2169432,20 C22.2169432,19.8159952 22.1661743,19.6355579 22.070225,19.47855 L12.894429,4.4636111 C12.6064401,3.99235656 11.9909517,3.84379039 11.5196972,4.13177928 C11.3723594,4.22181902 11.2508468,4.34847583 11.1669899,4.49941818 Z"
                                                    fill="#000000" opacity="0.3" />
                                                <rect fill="#000000" x="11" y="9" width="2" height="7"
                                                    rx="1" />
                                                <rect fill="#000000" x="11" y="17" width="2" height="2"
                                                    rx="1" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Title-->
                                <div class="ps-1 mb-1">
                                    <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-boldest">HR
                                        Confidential</a>
                                    <div class="text-gray-400 fw-bold">Confidential staff documents</div>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Label-->
                            <span class="badge badge-light rounded-pill fs-7 fw-boldest">24 files</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-stack item-border-hover px-3 py-2 ms-n4 mb-3">
                            <!--begin::Section-->
                            <div class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40px symbol-circle me-4">
                                    <span class="symbol-label bg-light-success">
                                        <!--begin::Svg Icon | path: icons/duotone/General/Thunder.svg-->
                                        <span class="svg-icon svg-icon-1 svg-icon-success">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M12.3740377,19.9389434 L18.2226499,11.1660251 C18.4524142,10.8213786 18.3592838,10.3557266 18.0146373,10.1259623 C17.8914367,10.0438285 17.7466809,10 17.5986122,10 L13,10 L13,4.47708173 C13,4.06286817 12.6642136,3.72708173 12.25,3.72708173 C11.9992351,3.72708173 11.7650616,3.85240758 11.6259623,4.06105658 L5.7773501,12.8339749 C5.54758575,13.1786214 5.64071616,13.6442734 5.98536267,13.8740377 C6.10856331,13.9561715 6.25331908,14 6.40138782,14 L11,14 L11,19.5229183 C11,19.9371318 11.3357864,20.2729183 11.75,20.2729183 C12.0007649,20.2729183 12.2349384,20.1475924 12.3740377,19.9389434 Z"
                                                        fill="#000000" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Title-->
                                <div class="ps-1 mb-1">
                                    <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-boldest">Project
                                        Rider</a>
                                    <div class="text-gray-400 fw-bold">New frontend admin theme</div>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Label-->
                            <span class="badge badge-light rounded-pill fs-7 fw-boldest">75 files</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-stack item-border-hover px-3 py-2 ms-n4 mb-3">
                            <!--begin::Section-->
                            <div class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40px symbol-circle me-4">
                                    <span class="symbol-label bg-light-info">
                                        <!--begin::Svg Icon | path: icons/duotone/Design/Image.svg-->
                                        <span class="svg-icon svg-icon-1 svg-icon-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <path
                                                        d="M6,5 L18,5 C19.6568542,5 21,6.34314575 21,8 L21,17 C21,18.6568542 19.6568542,20 18,20 L6,20 C4.34314575,20 3,18.6568542 3,17 L3,8 C3,6.34314575 4.34314575,5 6,5 Z M5,17 L14,17 L9.5,11 L5,17 Z M16,14 C17.6568542,14 19,12.6568542 19,11 C19,9.34314575 17.6568542,8 16,8 C14.3431458,8 13,9.34314575 13,11 C13,12.6568542 14.3431458,14 16,14 Z"
                                                        fill="#000000" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Title-->
                                <div class="ps-1 mb-1">
                                    <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-boldest">Banner
                                        Assets</a>
                                    <div class="text-gray-400 fw-bold">Collection of banner images</div>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Label-->
                            <span class="badge badge-light rounded-pill fs-7 fw-boldest">16 files</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="d-flex flex-stack item-border-hover px-3 py-2 ms-n4 mb-6">
                            <!--begin::Section-->
                            <div class="d-flex align-items-center">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40px symbol-circle me-4">
                                    <span class="symbol-label bg-light-warning">
                                        <!--begin::Svg Icon | path: icons/duotone/Design/Component.svg-->
                                        <span class="svg-icon svg-icon-1 svg-icon-warning">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <path
                                                    d="M12.7442084,3.27882877 L19.2473374,6.9949025 C19.7146999,7.26196679 20.003129,7.75898194 20.003129,8.29726722 L20.003129,15.7027328 C20.003129,16.2410181 19.7146999,16.7380332 19.2473374,17.0050975 L12.7442084,20.7211712 C12.2830594,20.9846849 11.7169406,20.9846849 11.2557916,20.7211712 L4.75266256,17.0050975 C4.28530007,16.7380332 3.99687097,16.2410181 3.99687097,15.7027328 L3.99687097,8.29726722 C3.99687097,7.75898194 4.28530007,7.26196679 4.75266256,6.9949025 L11.2557916,3.27882877 C11.7169406,3.01531506 12.2830594,3.01531506 12.7442084,3.27882877 Z M12,14.5 C13.3807119,14.5 14.5,13.3807119 14.5,12 C14.5,10.6192881 13.3807119,9.5 12,9.5 C10.6192881,9.5 9.5,10.6192881 9.5,12 C9.5,13.3807119 10.6192881,14.5 12,14.5 Z"
                                                    fill="#000000" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <!--end::Symbol-->
                                <!--begin::Title-->
                                <div class="ps-1 mb-1">
                                    <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-boldest">Icon
                                        Assets</a>
                                    <div class="text-gray-400 fw-bold">Collection of SVG icons</div>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Label-->
                            <span class="badge badge-light rounded-pill fs-7 fw-boldest">64 files</span>
                            <!--end::Label-->
                        </div>
                        <!--end::Item-->
                        <!--begin::Alert-->
                        <div class="rounded border border-primary bg-light-primary border-dashed px-6 py-5">
                            <a href="#" class="link-primary fw-bolder fs-6 me-1">Intive New .NET Collaborators</a>
                            <span class="text-gray-800 fw-bold fs-6">to creating great outstanding business to business
                                .jsp modular class outstanding scripts</span>
                        </div>
                        <!--end::Alert-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::List Widget 4-->
            </div>
            <!--end:::Col-->
            <!--begin:::Col-->
            <div class="col-xxl-7">
                <!--begin::Row-->
                <div class="row g-xl-8">
                    <!--begin:::Col-->
                    <div class="col-xl-6">
                        <!--begin::Engage widget 1-->
                        <div class="card card-xl-stretch mb-5 mb-xl-8">
                            <!--begin::Card body-->
                            <div class="card-body bgi-no-repeat bgi-size-contain bgi-position-x-end bgi-position-y-center"
                                style="background-image:url('assets/media/illustrations/customer.png')">
                                <!--begin::Title-->
                                <div class="fw-boldest fs-3 mb-2">Quick Start Project</div>
                                <!--end::Title-->
                                <!--begin::Description-->
                                <div class="fw-bold fs-6 text-gray-400 mb-7">Earn $200 bonus now</div>
                                <!--end::Description-->
                                <!--begin::Link-->
                                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_create_account">Quick Start</a>
                                <!--end::Link-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Engage widget 1-->
                    </div>
                    <!--end:::Col-->
                    <!--begin:::Col-->
                    <div class="col-xl-6">
                        <!--begin::Chart Widget 1-->
                        <div class="card card-xl-stretch mb-5 mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body p-0 d-flex justify-content-between flex-column">
                                <div class="d-flex flex-stack card-p flex-grow-1">
                                    <!--begin::Icon-->
                                    <div class="symbol symbol-45px symbol-circle">
                                        <div class="symbol-label">
                                            <!--begin::Svg Icon | path: icons/duotone/Shopping/Cart4.svg-->
                                            <span class="svg-icon svg-icon-2x">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.25"
                                                        d="M3.19406 11.1644C3.09247 10.5549 3.56251 10 4.18045 10H19.8195C20.4375 10 20.9075 10.5549 20.8059 11.1644L19.4178 19.4932C19.1767 20.9398 17.9251 22 16.4586 22H7.54138C6.07486 22 4.82329 20.9398 4.58219 19.4932L3.19406 11.1644Z"
                                                        fill="#7E8299" />
                                                    <path
                                                        d="M2 9.5C2 8.67157 2.67157 8 3.5 8H20.5C21.3284 8 22 8.67157 22 9.5C22 10.3284 21.3284 11 20.5 11H3.5C2.67157 11 2 10.3284 2 9.5Z"
                                                        fill="#7E8299" />
                                                    <path
                                                        d="M10 13C9.44772 13 9 13.4477 9 14V18C9 18.5523 9.44772 19 10 19C10.5523 19 11 18.5523 11 18V14C11 13.4477 10.5523 13 10 13Z"
                                                        fill="#7E8299" />
                                                    <path
                                                        d="M14 13C13.4477 13 13 13.4477 13 14V18C13 18.5523 13.4477 19 14 19C14.5523 19 15 18.5523 15 18V14C15 13.4477 14.5523 13 14 13Z"
                                                        fill="#7E8299" />
                                                    <g opacity="0.25">
                                                        <path
                                                            d="M10.7071 3.70711C11.0976 3.31658 11.0976 2.68342 10.7071 2.29289C10.3166 1.90237 9.68342 1.90237 9.29289 2.29289L4.29289 7.29289C3.90237 7.68342 3.90237 8.31658 4.29289 8.70711C4.68342 9.09763 5.31658 9.09763 5.70711 8.70711L10.7071 3.70711Z"
                                                            fill="#7E8299" />
                                                        <path
                                                            d="M13.2929 3.70711C12.9024 3.31658 12.9024 2.68342 13.2929 2.29289C13.6834 1.90237 14.3166 1.90237 14.7071 2.29289L19.7071 7.29289C20.0976 7.68342 20.0976 8.31658 19.7071 8.70711C19.3166 9.09763 18.6834 9.09763 18.2929 8.70711L13.2929 3.70711Z"
                                                            fill="#7E8299" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Text-->
                                    <div class="d-flex flex-column text-end">
                                        <a href="#"
                                            class="fw-boldest text-gray-800 text-hover-primary fs-2">Orders</a>
                                        <span class="text-gray-400 fw-bold fs-6">Sep 1 - Sep 16 2020</span>
                                    </div>
                                    <!--end::Text-->
                                </div>
                                <!--begin::Chart-->
                                <div class="pt-1">
                                    <div id="kt_chart_widget_1_chart" class="card-rounded-bottom h-125px"></div>
                                </div>
                                <!--end::Chart-->
                            </div>
                        </div>
                        <!--end::Chart Widget 1-->
                    </div>
                    <!--end:::Col-->
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row g-xl-8">
                    <!--begin:::Col-->
                    <div class="col">
                        <!--begin::Table Widget 1-->
                        <div class="card card-xxl-stretch mb-5 mb-xl-3">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5 pb-3">
                                <!--begin::Card title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-boldest text-gray-800 fs-2">Teams Progress</span>
                                    <span class="text-gray-400 fw-bold mt-2 fs-6">890,344 Sales</span>
                                </h3>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Search-->
                                    <div class="position-relative pe-6 my-1">
                                        <!--begin::Svg Icon | path: icons/duotone/General/Search.svg-->
                                        <span
                                            class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    <path
                                                        d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                        fill="#000000" fill-rule="nonzero" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <input type="text"
                                            class="w-150px form-control form-control-sm form-control-solid ps-10"
                                            name="search" value="" placeholder="Search" />
                                    </div>
                                    <!--end::Search-->
                                    <div class="my-1">
                                        <!--begin::Select-->
                                        <select class="form-select form-select-sm form-select-solid fw-bolder w-125px"
                                            data-control="select2" data-placeholder="All Users" data-hide-search="true">
                                            <option value="1" selected="selected">All Users</option>
                                            <option value="2">Active users</option>
                                            <option value="3">Pending users</option>
                                        </select>
                                        <!--end::Select-->
                                    </div>
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body py-0">
                                <!--begin::Table-->
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-bordered table-row-dashed gy-5"
                                        id="kt_table_widget_1">
                                        <!--begin::Table body-->
                                        <tbody>
                                            <!--begin::Table row-->
                                            <tr class="text-start text-gray-400 fw-boldest fs-7 text-uppercase">
                                                <th class="w-20px ps-0">
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="checkbox"
                                                            data-kt-check="true"
                                                            data-kt-check-target="#kt_table_widget_1 .form-check-input"
                                                            value="1" />
                                                    </div>
                                                </th>
                                                <th class="min-w-200px px-0">Authors</th>
                                                <th class="min-w-125px">Company</th>
                                                <th class="min-w-125px">Progress</th>
                                                <th class="text-end pe-2 min-w-70px">Action</th>
                                            </tr>
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            <tr>
                                                <!--begin::Checkbox-->
                                                <td class="p-0">
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="1" />
                                                    </div>
                                                </td>
                                                <!--end::Checkbox-->
                                                <!--begin::Author=-->
                                                <td class="p-0">
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Logo-->
                                                        <div class="symbol symbol-circle symbol-50px me-2">
                                                            <span class="symbol-label">
                                                                <img alt="" class="w-25px"
                                                                    src="assets/media/svg/brand-logos/aven.svg" />
                                                            </span>
                                                        </div>
                                                        <!--end::Logo-->
                                                        <div class="ps-3">
                                                            <a href="#"
                                                                class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">Brad
                                                                Simmons</a>
                                                            <span class="text-gray-400 fw-bold d-block">HTML, JS,
                                                                ReactJS</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <!--end::Author=-->
                                                <!--begin::Company=-->
                                                <td>
                                                    <span class="text-gray-800 fw-boldest fs-5 d-block">Intertico</span>
                                                    <span class="text-gray-400 fw-bold">Web, UI/UX Design</span>
                                                </td>
                                                <!--end::Company=-->
                                                <!--begin::Progress=-->
                                                <td>
                                                    <div class="d-flex flex-column w-100 me-2 mt-2">
                                                        <span class="text-gray-400 me-2 fw-boldest mb-2">65%</span>
                                                        <div class="progress bg-light-danger w-100 h-5px">
                                                            <div class="progress-bar bg-danger" role="progressbar"
                                                                style="width: 65%"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <!--end::Company=-->
                                                <!--begin::Action=-->
                                                <td class="pe-0 text-end">
                                                    <a href="#"
                                                        class="btn btn-light text-muted fw-boldest btn-sm px-5">View</a>
                                                </td>
                                                <!--end::Action=-->
                                            </tr>
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            <tr>
                                                <!--begin::Checkbox-->
                                                <td class="p-0">
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="1" />
                                                    </div>
                                                </td>
                                                <!--end::Checkbox-->
                                                <!--begin::Author=-->
                                                <td class="p-0">
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Logo-->
                                                        <div class="symbol symbol-circle symbol-50px me-2">
                                                            <span class="symbol-label">
                                                                <img alt="" class="w-25px"
                                                                    src="assets/media/svg/brand-logos/leaf.svg" />
                                                            </span>
                                                        </div>
                                                        <!--end::Logo-->
                                                        <div class="ps-3">
                                                            <a href="#"
                                                                class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">Jessie
                                                                Clarcson</a>
                                                            <span class="text-gray-400 fw-bold d-block">C#, ASP.NET, MS
                                                                SQL</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <!--end::Author=-->
                                                <!--begin::Company=-->
                                                <td>
                                                    <span class="text-gray-800 fw-boldest fs-5 d-block">Agoda</span>
                                                    <span class="text-gray-400 fw-bold">Houses &amp; Hotels</span>
                                                </td>
                                                <!--end::Company=-->
                                                <!--begin::Progress=-->
                                                <td>
                                                    <div class="d-flex flex-column w-100 me-2 mt-2">
                                                        <span class="text-gray-400 me-2 fw-boldest mb-2">85%</span>
                                                        <div class="progress bg-light-danger w-100 h-5px">
                                                            <div class="progress-bar bg-primary" role="progressbar"
                                                                style="width: 85%"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <!--end::Company=-->
                                                <!--begin::Action=-->
                                                <td class="pe-0 text-end">
                                                    <a href="#"
                                                        class="btn btn-light text-muted fw-boldest btn-sm px-5">View</a>
                                                </td>
                                                <!--end::Action=-->
                                            </tr>
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            <tr>
                                                <!--begin::Checkbox-->
                                                <td class="p-0">
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="1" />
                                                    </div>
                                                </td>
                                                <!--end::Checkbox-->
                                                <!--begin::Author=-->
                                                <td class="p-0">
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Logo-->
                                                        <div class="symbol symbol-circle symbol-50px me-2">
                                                            <span class="symbol-label">
                                                                <img alt="" class="w-25px"
                                                                    src="assets/media/svg/brand-logos/atica.svg" />
                                                            </span>
                                                        </div>
                                                        <!--end::Logo-->
                                                        <div class="ps-3">
                                                            <a href="#"
                                                                class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">Lebron
                                                                Wayde</a>
                                                            <span class="text-gray-400 fw-bold d-block">PHP, Laravel,
                                                                VueJS</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <!--end::Author=-->
                                                <!--begin::Company=-->
                                                <td>
                                                    <span class="text-gray-800 fw-boldest fs-5 d-block">RoadGee</span>
                                                    <span class="text-gray-400 fw-bold">Transportation</span>
                                                </td>
                                                <!--end::Company=-->
                                                <!--begin::Progress=-->
                                                <td>
                                                    <div class="d-flex flex-column w-100 me-2 mt-2">
                                                        <span class="text-gray-400 me-2 fw-boldest mb-2">40%</span>
                                                        <div class="progress bg-light-danger w-100 h-5px">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                style="width: 40%"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <!--end::Company=-->
                                                <!--begin::Action=-->
                                                <td class="pe-0 text-end">
                                                    <a href="#"
                                                        class="btn btn-light text-muted fw-boldest btn-sm px-5">View</a>
                                                </td>
                                                <!--end::Action=-->
                                            </tr>
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            <tr>
                                                <!--begin::Checkbox-->
                                                <td class="p-0">
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="1" />
                                                    </div>
                                                </td>
                                                <!--end::Checkbox-->
                                                <!--begin::Author=-->
                                                <td class="p-0">
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Logo-->
                                                        <div class="symbol symbol-circle symbol-50px me-2">
                                                            <span class="symbol-label">
                                                                <img alt="" class="w-25px"
                                                                    src="assets/media/svg/brand-logos/volicity-9.svg" />
                                                            </span>
                                                        </div>
                                                        <!--end::Logo-->
                                                        <div class="ps-3">
                                                            <a href="#"
                                                                class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">Natali
                                                                Trump</a>
                                                            <span class="text-gray-400 fw-bold d-block">Python,
                                                                ReactJS</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <!--end::Author=-->
                                                <!--begin::Company=-->
                                                <td>
                                                    <span class="text-gray-800 fw-boldest fs-5 d-block">The Hill</span>
                                                    <span class="text-gray-400 fw-bold">Insurance</span>
                                                </td>
                                                <!--end::Company=-->
                                                <!--begin::Progress=-->
                                                <td>
                                                    <div class="d-flex flex-column w-100 me-2 mt-2">
                                                        <span class="text-gray-400 me-2 fw-boldest mb-2">71%</span>
                                                        <div class="progress bg-light-danger w-100 h-5px">
                                                            <div class="progress-bar bg-info" role="progressbar"
                                                                style="width: 71%"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <!--end::Company=-->
                                                <!--begin::Action=-->
                                                <td class="pe-0 text-end">
                                                    <a href="#"
                                                        class="btn btn-light text-muted fw-boldest btn-sm px-5">View</a>
                                                </td>
                                                <!--end::Action=-->
                                            </tr>
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            <tr>
                                                <!--begin::Checkbox-->
                                                <td class="p-0">
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="1" />
                                                    </div>
                                                </td>
                                                <!--end::Checkbox-->
                                                <!--begin::Author=-->
                                                <td class="p-0">
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Logo-->
                                                        <div class="symbol symbol-circle symbol-50px me-2">
                                                            <span class="symbol-label">
                                                                <img alt="" class="w-25px"
                                                                    src="assets/media/svg/brand-logos/aven.svg" />
                                                            </span>
                                                        </div>
                                                        <!--end::Logo-->
                                                        <div class="ps-3">
                                                            <a href="#"
                                                                class="text-gray-800 fw-boldest fs-5 text-hover-primary mb-1">Brad
                                                                Simmons</a>
                                                            <span class="text-gray-400 fw-bold d-block">HTML, JS,
                                                                ReactJS</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <!--end::Author=-->
                                                <!--begin::Company=-->
                                                <td>
                                                    <span class="text-gray-800 fw-boldest fs-5 d-block">Intertico</span>
                                                    <span class="text-gray-400 fw-bold">Web, UI/UX Design</span>
                                                </td>
                                                <!--end::Company=-->
                                                <!--begin::Progress=-->
                                                <td>
                                                    <div class="d-flex flex-column w-100 me-2 mt-2">
                                                        <span class="text-gray-400 me-2 fw-boldest mb-2">65%</span>
                                                        <div class="progress bg-light-danger w-100 h-5px">
                                                            <div class="progress-bar bg-danger" role="progressbar"
                                                                style="width: 65%"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <!--end::Company=-->
                                                <!--begin::Action=-->
                                                <td class="pe-0 text-end">
                                                    <a href="#"
                                                        class="btn btn-light text-muted fw-boldest btn-sm px-5">View</a>
                                                </td>
                                                <!--end::Action=-->
                                            </tr>
                                            <!--end::Table row-->
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Table Widget 1-->
                    </div>
                    <!--end:::Col-->
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row g-xl-8">
                    <!--begin:::Col-->
                    <div class="col-xl-6">
                        <!--begin::List Widget 1-->
                        <div class="card card-xl-stretch mb-5 mb-xl-8">
                            <!--begin::Header-->
                            <div class="card-header align-items-center border-0 mt-5">
                                <!--begin::Heading-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="fw-boldest text-dark fs-2">My Competitors</span>
                                    <span class="text-gray-400 mt-2 fw-bold fs-6">More than 400+ new members</span>
                                </h3>
                                <!--end::Heading-->
                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Menu-->
                                    <button type="button"
                                        class="btn btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                        data-kt-menu-flip="top-end">
                                        <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="5" y="5" width="5" height="5" rx="1"
                                                        fill="#000000" />
                                                    <rect x="14" y="5" width="5" height="5" rx="1"
                                                        fill="#000000" opacity="0.3" />
                                                    <rect x="5" y="14" width="5" height="5" rx="1"
                                                        fill="#000000" opacity="0.3" />
                                                    <rect x="14" y="14" width="5" height="5" rx="1"
                                                        fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </button>
                                    <!--begin::Menu 1-->
                                    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true">
                                        <!--begin::Header-->
                                        <div class="px-7 py-5">
                                            <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Menu separator-->
                                        <div class="separator border-gray-200"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Form-->
                                        <div class="px-7 py-5">
                                            <!--begin::Input group-->
                                            <div class="mb-10">
                                                <!--begin::Label-->
                                                <label class="form-label fw-bold">Status:</label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <div>
                                                    <select class="form-select form-select-solid" data-kt-select2="true"
                                                        data-placeholder="Select option" data-allow-clear="true">
                                                        <option></option>
                                                        <option value="1">Approved</option>
                                                        <option value="2">Pending</option>
                                                        <option value="2">In Process</option>
                                                        <option value="2">Rejected</option>
                                                    </select>
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10">
                                                <!--begin::Label-->
                                                <label class="form-label fw-bold">Member Type:</label>
                                                <!--end::Label-->
                                                <!--begin::Options-->
                                                <div class="d-flex">
                                                    <!--begin::Options-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                        <input class="form-check-input" type="checkbox" value="1" />
                                                        <span class="form-check-label">Author</span>
                                                    </label>
                                                    <!--end::Options-->
                                                    <!--begin::Options-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="2"
                                                            checked="checked" />
                                                        <span class="form-check-label">Customer</span>
                                                    </label>
                                                    <!--end::Options-->
                                                </div>
                                                <!--end::Options-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Input group-->
                                            <div class="mb-10">
                                                <!--begin::Label-->
                                                <label class="form-label fw-bold">Notifications:</label>
                                                <!--end::Label-->
                                                <!--begin::Switch-->
                                                <div
                                                    class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        name="notifications" checked="checked" />
                                                    <label class="form-check-label">Enabled</label>
                                                </div>
                                                <!--end::Switch-->
                                            </div>
                                            <!--end::Input group-->
                                            <!--begin::Actions-->
                                            <div class="d-flex justify-content-end">
                                                <button type="reset"
                                                    class="btn btn-sm btn-white btn-active-light-primary me-2"
                                                    data-kt-menu-dismiss="true">Reset</button>
                                                <button type="submit" class="btn btn-sm btn-primary"
                                                    data-kt-menu-dismiss="true">Apply</button>
                                            </div>
                                            <!--end::Actions-->
                                        </div>
                                        <!--end::Form-->
                                    </div>
                                    <!--end::Menu 1-->
                                    <!--end::Menu-->
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-5">
                                <!--begin::Item-->
                                <div class="d-flex mb-6">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-60px symbol-2by3 me-4">
                                        <img src="assets/media/stock/600x400/img-17.jpg" class="mw-100" alt="" />
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                            <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-boldest">Cup
                                                &amp; Green</a>
                                            <span class="text-gray-400 fw-bold fs-7 my-1">Study highway types</span>
                                            <span class="text-gray-400 fw-bold fs-7">By:
                                                <a href="#" class="text-primary fw-bold">CoreAd</a></span>
                                        </div>
                                        <!--end::Title-->
                                        <!--begin::Info-->
                                        <div class="text-end py-lg-0 py-2">
                                            <span class="text-gray-800 fw-boldest fs-3">24,900</span>
                                            <span class="text-gray-400 fs-7 fw-bold d-block">Sales</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="d-flex mb-6">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-60px symbol-2by3 me-4">
                                        <img src="assets/media/stock/600x400/img-10.jpg" class="mw-100" alt="" />
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                            <a href="#"
                                                class="fs-5 text-gray-800 text-hover-primary fw-boldest">Yellow Hearts</a>
                                            <span class="text-gray-400 fw-bold fs-7 my-1">Study highway types</span>
                                            <span class="text-gray-400 fw-bold fs-7">By:
                                                <a href="#" class="text-primary fw-bold">KeenThemes</a></span>
                                        </div>
                                        <!--end::Title-->
                                        <!--begin::Info-->
                                        <div class="text-end py-lg-0 py-2">
                                            <span class="text-gray-800 fw-boldest fs-3">70,380</span>
                                            <span class="text-gray-400 fs-7 fw-bold d-block">Sales</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="d-flex mb-6">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-60px symbol-2by3 me-4">
                                        <img src="assets/media/stock/600x400/img-1.jpg" class="mw-100" alt="" />
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                            <a href="#"
                                                class="fs-5 text-gray-800 text-hover-primary fw-boldest">Nike &amp;
                                                Blue</a>
                                            <span class="text-gray-400 fw-bold fs-7 my-1">Study highway types</span>
                                            <span class="text-gray-400 fw-bold fs-7">By:
                                                <a href="#" class="text-primary fw-bold">Invision Inc.</a></span>
                                        </div>
                                        <!--end::Title-->
                                        <!--begin::Info-->
                                        <div class="text-end py-lg-0 py-2">
                                            <span class="text-gray-800 fw-boldest fs-3">7,200</span>
                                            <span class="text-gray-400 fs-7 fw-bold d-block">Sales</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="d-flex mb-">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-60px symbol-2by3 me-4">
                                        <img src="assets/media/stock/600x400/img-9.jpg" class="mw-100" alt="" />
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center flex-wrap flex-grow-1 mt-n2 mt-lg-n1">
                                        <!--begin::Title-->
                                        <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pe-3">
                                            <a href="#" class="fs-5 text-gray-800 text-hover-primary fw-boldest">Red
                                                Boots</a>
                                            <span class="text-gray-400 fw-bold fs-7 my-1">Study highway types</span>
                                            <span class="text-gray-400 fw-bold fs-7">By:
                                                <a href="#" class="text-primary fw-bold">Figma Studio</a></span>
                                        </div>
                                        <!--end::Title-->
                                        <!--begin::Info-->
                                        <div class="text-end py-lg-0 py-2">
                                            <span class="text-gray-800 fw-boldest fs-3">36,450</span>
                                            <span class="text-gray-400 fs-7 fw-bold d-block">Sales</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::List Widget 1-->
                    </div>
                    <!--end:::Col-->
                    <!--begin:::Col-->
                    <div class="col-xl-6">
                        <!--begin::List Widget 2-->
                        <div class="card card-xl-stretch mb-5 mb-xl-8">
                            <!--begin::Header-->
                            <div class="card-header align-items-center border-0 mt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="fw-boldest text-dark fs-2">My Agents</span>
                                    <span class="text-gray-400 mt-2 fw-bold fs-6">More than 400+ new members</span>
                                </h3>
                                <div class="card-toolbar">
                                    <!--begin::Menu-->
                                    <button type="button"
                                        class="btn btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                        data-kt-menu-flip="top-end">
                                        <!--begin::Svg Icon | path: icons/duotone/Layout/Layout-4-blocks-2.svg-->
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="5" y="5" width="5" height="5" rx="1"
                                                        fill="#000000" />
                                                    <rect x="14" y="5" width="5" height="5" rx="1"
                                                        fill="#000000" opacity="0.3" />
                                                    <rect x="5" y="14" width="5" height="5" rx="1"
                                                        fill="#000000" opacity="0.3" />
                                                    <rect x="14" y="14" width="5" height="5" rx="1"
                                                        fill="#000000" opacity="0.3" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </button>
                                    <!--begin::Menu 2-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold w-200px"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content fs-6 text-dark fw-bolder px-3 py-4">Quick Actions
                                            </div>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator mb-3 opacity-75"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">New Ticket</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">New Customer</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                            data-kt-menu-placement="right-start" data-kt-menu-flip="left-start, top">
                                            <!--begin::Menu item-->
                                            <a href="#" class="menu-link px-3">
                                                <span class="menu-title">New Group</span>
                                                <span class="menu-arrow"></span>
                                            </a>
                                            <!--end::Menu item-->
                                            <!--begin::Menu sub-->
                                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">Admin Group</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">Staff Group</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a href="#" class="menu-link px-3">Member Group</a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu sub-->
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">New Contact</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator mt-3 opacity-75"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content px-3 py-3">
                                                <a class="btn btn-primary btn-sm px-4" href="#">Generate
                                                    Reports</a>
                                            </div>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu 2-->
                                    <!--end::Menu-->
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-5">
                                <!--begin::Item-->
                                <div class="d-flex flex-stack mb-7">
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-circle symbol-40px me-4">
                                            <img src="assets/media/avatars/150-3.jpg" alt="" />
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="ps-1">
                                            <a href="#"
                                                class="fs-6 text-gray-800 text-hover-primary fw-boldest">Anne Clarc</a>
                                            <div class="fs-7 text-gray-400 fw-bold mt-1">HTML, CSS, Laravel</div>
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Section-->
                                    <!--begin::Label-->
                                    <a href="#"
                                        class="btn btn-light btn-color-muted fw-boldest btn-sm px-5">Details</a>
                                    <!--end::Label-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="d-flex flex-stack mb-7">
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-circle symbol-40px me-4">
                                            <img src="assets/media/avatars/150-2.jpg" alt="" />
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="ps-1">
                                            <a href="#"
                                                class="fs-6 text-gray-800 text-hover-primary fw-boldest">Brad Simmons</a>
                                            <div class="fs-7 text-gray-400 fw-bold mt-1">HTML, JS, ReactJS</div>
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Section-->
                                    <!--begin::Label-->
                                    <a href="#"
                                        class="btn btn-light btn-color-muted fw-boldest btn-sm px-5">Details</a>
                                    <!--end::Label-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="d-flex flex-stack mb-7">
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-circle symbol-40px me-4">
                                            <img src="assets/media/avatars/150-4.jpg" alt="" />
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="ps-1">
                                            <a href="#"
                                                class="fs-6 text-gray-800 text-hover-primary fw-boldest">Randy Trent</a>
                                            <div class="fs-7 text-gray-400 fw-bold mt-1">C#, ASP.NET, MS SQL</div>
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Section-->
                                    <!--begin::Label-->
                                    <a href="#"
                                        class="btn btn-light btn-color-muted fw-boldest btn-sm px-5">Details</a>
                                    <!--end::Label-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="d-flex flex-stack mb-7">
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-circle symbol-40px me-4">
                                            <img src="assets/media/avatars/150-5.jpg" alt="" />
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="ps-1">
                                            <a href="#"
                                                class="fs-6 text-gray-800 text-hover-primary fw-boldest">Ricky Hunt</a>
                                            <div class="fs-7 text-gray-400 fw-bold mt-1">PHP, Laravel, VueJS</div>
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Section-->
                                    <!--begin::Label-->
                                    <a href="#"
                                        class="btn btn-light btn-color-muted fw-boldest btn-sm px-5">Details</a>
                                    <!--end::Label-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="d-flex flex-stack mb-">
                                    <!--begin::Section-->
                                    <div class="d-flex align-items-center">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-circle symbol-40px me-4">
                                            <img src="assets/media/avatars/150-6.jpg" alt="" />
                                        </div>
                                        <!--end::Symbol-->
                                        <!--begin::Title-->
                                        <div class="ps-1">
                                            <a href="#"
                                                class="fs-6 text-gray-800 text-hover-primary fw-boldest">Jessie
                                                Clarcson</a>
                                            <div class="fs-7 text-gray-400 fw-bold mt-1">ReactJS</div>
                                        </div>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Section-->
                                    <!--begin::Label-->
                                    <a href="#"
                                        class="btn btn-light btn-color-muted fw-boldest btn-sm px-5">Details</a>
                                    <!--end::Label-->
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::List Widget 2-->
                    </div>
                    <!--end:::Col-->
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row g-xl-8">
                    <!--begin:::Col-->
                    <div class="col">
                        <!--begin::Chart widget 2-->
                        <div class="card card-xl-stretch mb-5 mb-xl-8">
                            <!--begin::Body-->
                            <div class="card-body pb-0 px-0">
                                <!--begin::Header-->
                                <div class="d-flex flex-stack px-9">
                                    <!--begin::Info-->
                                    <div class="d-flex flex-column">
                                        <h2 class="text-dark mb-1 fs-2 fw-boldest">Sales Summary</h2>
                                        <span class="text-gray-400 fw-bold fs-6">27 New Deals</span>
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Tabs-->
                                    <ul class="nav nav-pills nav-line-pills border rounded p-1">
                                        <li class="nav-item me-2">
                                            <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-400 py-2 px-5 fs-6 fw-bold active"
                                                data-bs-toggle="tab" href="#kt_charts_widget_3_tab_pane_1"
                                                id="kt_charts_widget_3_tab_1">Day</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-active-light btn-active-color-gray-700 btn-color-gray-400 py-2 px-5 fs-6 fw-bold"
                                                data-bs-toggle="tab" href="#kt_charts_widget_3_tab_pane_2"
                                                id="kt_charts_widget_3_tab_2">Month</a>
                                        </li>
                                    </ul>
                                    <!--end::Tabs-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Tab content-->
                                <div class="tab-content pt-8">
                                    <!--begin::Tab pane-->
                                    <div class="tab-pane fade active show" id="kt_charts_widget_3_tab_pane_1">
                                        <!--begin::Chart-->
                                        <div id="kt_charts_widget_3_chart_1" style="height: 350px"></div>
                                        <!--end::Chart-->
                                    </div>
                                    <!--end::Tab pane-->
                                    <!--begin::Tab pane-->
                                    <div class="tab-pane fade" id="kt_charts_widget_3_tab_pane_2">
                                        <!--begin::Chart-->
                                        <div id="kt_charts_widget_3_chart_2" style="height: 350px"></div>
                                        <!--end::Chart-->
                                    </div>
                                    <!--end::Tab pane-->
                                </div>
                                <!--end::Tab content-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Chart widget 2-->
                    </div>
                    <!--end:::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end:::Col-->
        </div>
        <!--end::Row-->
        <!--begin::Modals-->
        <!--begin::Modal - Create account-->
        <div class="modal fade" id="kt_modal_create_account" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog mw-1000px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Title-->
                        <h2>Create Account</h2>
                        <!--end::Title-->
                        <!--begin::Close-->
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                        fill="#000000">
                                        <rect fill="#000000" x="0" y="7" width="16" height="2"
                                            rx="1" />
                                        <rect fill="#000000" opacity="0.5"
                                            transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                            x="0" y="7" width="16" height="2" rx="1" />
                                    </g>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body scroll-y m-5">
                        <!--begin::Stepper-->
                        <div class="stepper stepper-links d-flex flex-column" id="kt_create_account_stepper">
                            <!--begin::Nav-->
                            <div class="stepper-nav py-5">
                                <!--begin::Step 1-->
                                <div class="stepper-item current" data-kt-stepper-element="nav">
                                    <h3 class="stepper-title">Account Type</h3>
                                </div>
                                <!--end::Step 1-->
                                <!--begin::Step 2-->
                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <h3 class="stepper-title">Account Info</h3>
                                </div>
                                <!--end::Step 2-->
                                <!--begin::Step 3-->
                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <h3 class="stepper-title">Business Details</h3>
                                </div>
                                <!--end::Step 3-->
                                <!--begin::Step 4-->
                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <h3 class="stepper-title">Billing Details</h3>
                                </div>
                                <!--end::Step 4-->
                                <!--begin::Step 5-->
                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <h3 class="stepper-title">Completed</h3>
                                </div>
                                <!--end::Step 5-->
                            </div>
                            <!--end::Nav-->
                            <!--begin::Form-->
                            <form class="mx-auto mw-600px w-100 py-10" novalidate="novalidate"
                                id="kt_create_account_form">
                                <!--begin::Step 1-->
                                <div class="current" data-kt-stepper-element="content">
                                    <!--begin::Wrapper-->
                                    <div class="w-100">
                                        <!--begin::Heading-->
                                        <div class="pb-10 pb-lg-15">
                                            <!--begin::Title-->
                                            <h2 class="fw-bolder d-flex align-items-center text-dark">Choose Account Type
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Billing is issued based on your selected account type"></i>
                                            </h2>
                                            <!--end::Title-->
                                            <!--begin::Notice-->
                                            <div class="text-gray-400 fw-bold fs-6">If you need more info, please check
                                                out
                                                <a href="#" class="link-primary fw-bolder">Help Page</a>.
                                            </div>
                                            <!--end::Notice-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Input group-->
                                        <div class="fv-row">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
                                                <div class="col-lg-6">
                                                    <!--begin::Option-->
                                                    <input type="radio" class="btn-check" name="account_type"
                                                        value="personal" checked="checked"
                                                        id="kt_create_account_form_account_type_personal" />
                                                    <label
                                                        class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center mb-10"
                                                        for="kt_create_account_form_account_type_personal">
                                                        <!--begin::Svg Icon | path: icons/duotone/Interface/User.svg-->
                                                        <span class="svg-icon svg-icon-3x me-5">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path
                                                                    d="M17 6C17 8.76142 14.7614 11 12 11C9.23858 11 7 8.76142 7 6C7 3.23858 9.23858 1 12 1C14.7614 1 17 3.23858 17 6Z"
                                                                    fill="#121319" />
                                                                <path opacity="0.25" fill-rule="evenodd"
                                                                    clip-rule="evenodd"
                                                                    d="M18.818 14.1248C18.2016 13.4101 17.1428 13.4469 16.3149 13.9001C15.0338 14.6013 13.5635 15 12 15C10.4365 15 8.96618 14.6013 7.68505 13.9001C6.85717 13.4469 5.79841 13.4101 5.182 14.1248C3.82222 15.7014 3 17.7547 3 20V21C3 22.1045 3.89543 23 5 23H19C20.1046 23 21 22.1045 21 21V20C21 17.7547 20.1778 15.7014 18.818 14.1248Z"
                                                                    fill="#191213" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <!--begin::Info-->
                                                        <span class="d-block fw-bold text-start">
                                                            <span class="text-dark fw-bolder d-block fs-4 mb-2">Personal
                                                                Account</span>
                                                            <span class="text-gray-400 fw-bold fs-6">If you need more
                                                                info, please check it out</span>
                                                        </span>
                                                        <!--end::Info-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-lg-6">
                                                    <!--begin::Option-->
                                                    <input type="radio" class="btn-check" name="account_type"
                                                        value="corporate"
                                                        id="kt_create_account_form_account_type_corporate" />
                                                    <label
                                                        class="btn btn-outline btn-outline-dashed btn-outline-default p-7 d-flex align-items-center"
                                                        for="kt_create_account_form_account_type_corporate">
                                                        <!--begin::Svg Icon | path: icons/duotone/Interface/Briefcase.svg-->
                                                        <span class="svg-icon svg-icon-3x me-5">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none">
                                                                <path opacity="0.25"
                                                                    d="M2 10C2 8.34315 3.34315 7 5 7H19C20.6569 7 22 8.34315 22 10V19C22 20.6569 20.6569 22 19 22H5C3.34315 22 2 20.6569 2 19V10Z"
                                                                    fill="#12131A" />
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M9 4C8.44772 4 8 4.44772 8 5V8C8 8.55228 7.55228 9 7 9C6.44772 9 6 8.55228 6 8V5C6 3.34315 7.34315 2 9 2H15C16.6569 2 18 3.34315 18 5V8C18 8.55228 17.5523 9 17 9C16.4477 9 16 8.55228 16 8V5C16 4.44772 15.5523 4 15 4H9Z"
                                                                    fill="#12131A" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <!--begin::Info-->
                                                        <span class="d-block fw-bold text-start">
                                                            <span class="text-dark fw-bolder d-block fs-4 mb-2">Corporate
                                                                Account</span>
                                                            <span class="text-gray-400 fw-bold fs-6">Create corporate
                                                                account to mane users</span>
                                                        </span>
                                                        <!--end::Info-->
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Step 1-->
                                <!--begin::Step 2-->
                                <div data-kt-stepper-element="content">
                                    <!--begin::Wrapper-->
                                    <div class="w-100">
                                        <!--begin::Heading-->
                                        <div class="pb-10 pb-lg-15">
                                            <!--begin::Title-->
                                            <h2 class="fw-bolder text-dark">Account Info</h2>
                                            <!--end::Title-->
                                            <!--begin::Notice-->
                                            <div class="text-gray-400 fw-bold fs-6">If you need more info, please check
                                                out
                                                <a href="#" class="link-primary fw-bolder">Help Page</a>.
                                            </div>
                                            <!--end::Notice-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Input group-->
                                        <div class="mb-10 fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center form-label mb-3">Specify Team Size
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Provide your team size to help us setup your billing"></i></label>
                                            <!--end::Label-->
                                            <!--begin::Row-->
                                            <div class="row mb-2" data-kt-buttons="true">
                                                <!--begin::Col-->
                                                <div class="col">
                                                    <!--begin::Option-->
                                                    <label
                                                        class="btn btn-outline btn-outline-dashed btn-outline-default w-100 p-4">
                                                        <input type="radio" class="btn-check"
                                                            name="account_team_size" value="1-1" />
                                                        <span class="fw-bolder fs-3">1-1</span>
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col">
                                                    <!--begin::Option-->
                                                    <label
                                                        class="btn btn-outline btn-outline-dashed btn-outline-default w-100 p-4 active">
                                                        <input type="radio" class="btn-check"
                                                            name="account_team_size" checked="checked"
                                                            value="2-10" />
                                                        <span class="fw-bolder fs-3">2-10</span>
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col">
                                                    <!--begin::Option-->
                                                    <label
                                                        class="btn btn-outline btn-outline-dashed btn-outline-default w-100 p-4">
                                                        <input type="radio" class="btn-check"
                                                            name="account_team_size" value="10-50" />
                                                        <span class="fw-bolder fs-3">10-50</span>
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col">
                                                    <!--begin::Option-->
                                                    <label
                                                        class="btn btn-outline btn-outline-dashed btn-outline-default w-100 p-4">
                                                        <input type="radio" class="btn-check"
                                                            name="account_team_size" value="50+" />
                                                        <span class="fw-bolder fs-3">50+</span>
                                                    </label>
                                                    <!--end::Option-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                            <!--begin::Hint-->
                                            <div class="form-text">Customers will see this shortened version of your
                                                statement descriptor</div>
                                            <!--end::Hint-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-10 fv-row">
                                            <!--begin::Label-->
                                            <label class="form-label mb-3">Team Account Name</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input type="text"
                                                class="form-control form-control-lg form-control-solid"
                                                name="account_name" placeholder="" value="" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-0 fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center form-label mb-5">Select Account Plan
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Monthly billing will be based on your account plan"></i></label>
                                            <!--end::Label-->
                                            <!--begin::Options-->
                                            <div class="mb-0">
                                                <!--begin:Option-->
                                                <label class="d-flex flex-stack mb-5 cursor-pointer">
                                                    <!--begin:Label-->
                                                    <span class="d-flex align-items-center me-2">
                                                        <!--begin::Icon-->
                                                        <span class="symbol symbol-50px me-6">
                                                            <span class="symbol-label">
                                                                <!--begin::Svg Icon | path: icons/duotone/Interface/Bank.svg-->
                                                                <span class="svg-icon svg-icon-1 svg-icon-gray-600">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none">
                                                                        <path opacity="0.25"
                                                                            d="M4 10H8V17H10V10H14V17H16V10H20V17C21.1046 17 22 17.8954 22 19V20C22 21.1046 21.1046 22 20 22H4C2.89543 22 2 21.1046 2 20V19C2 17.8954 2.89543 17 4 17V10Z"
                                                                            fill="#12131A" />
                                                                        <path
                                                                            d="M2 7.35405C2 6.53624 2.4979 5.80083 3.25722 5.4971L11.2572 2.2971C11.734 2.10637 12.266 2.10637 12.7428 2.2971L20.7428 5.4971C21.5021 5.80083 22 6.53624 22 7.35405V7.99999C22 9.10456 21.1046 9.99999 20 9.99999H4C2.89543 9.99999 2 9.10456 2 7.99999V7.35405Z"
                                                                            fill="#12131A" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </span>
                                                        <!--end::Icon-->
                                                        <!--begin::Description-->
                                                        <span class="d-flex flex-column">
                                                            <span
                                                                class="fw-bolder text-gray-800 text-hover-primary fs-5">Company
                                                                Account</span>
                                                            <span class="fs-6 fw-bold text-gray-400">Use images to enhance
                                                                your post flow</span>
                                                        </span>
                                                        <!--end:Description-->
                                                    </span>
                                                    <!--end:Label-->
                                                    <!--begin:Input-->
                                                    <span class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="radio"
                                                            name="account_plan" value="1" />
                                                    </span>
                                                    <!--end:Input-->
                                                </label>
                                                <!--end::Option-->
                                                <!--begin:Option-->
                                                <label class="d-flex flex-stack mb-5 cursor-pointer">
                                                    <!--begin:Label-->
                                                    <span class="d-flex align-items-center me-2">
                                                        <!--begin::Icon-->
                                                        <span class="symbol symbol-50px me-6">
                                                            <span class="symbol-label">
                                                                <!--begin::Svg Icon | path: icons/duotone/Interface/Doughnut.svg-->
                                                                <span class="svg-icon svg-icon-1 svg-icon-gray-600">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none">
                                                                        <path opacity="0.25" fill-rule="evenodd"
                                                                            clip-rule="evenodd"
                                                                            d="M11 4.25769C11 3.07501 9.9663 2.13515 8.84397 2.50814C4.86766 3.82961 2 7.57987 2 11.9999C2 13.6101 2.38057 15.1314 3.05667 16.4788C3.58731 17.5363 4.98303 17.6028 5.81966 16.7662L5.91302 16.6728C6.60358 15.9823 6.65613 14.9011 6.3341 13.9791C6.11766 13.3594 6 12.6934 6 11.9999C6 9.62064 7.38488 7.56483 9.39252 6.59458C10.2721 6.16952 11 5.36732 11 4.39046V4.25769ZM16.4787 20.9434C17.5362 20.4127 17.6027 19.017 16.7661 18.1804L16.6727 18.087C15.9822 17.3964 14.901 17.3439 13.979 17.6659C13.3594 17.8823 12.6934 17.9999 12 17.9999C11.3066 17.9999 10.6406 17.8823 10.021 17.6659C9.09899 17.3439 8.01784 17.3964 7.3273 18.087L7.23392 18.1804C6.39728 19.017 6.4638 20.4127 7.52133 20.9434C8.86866 21.6194 10.3899 21.9999 12 21.9999C13.6101 21.9999 15.1313 21.6194 16.4787 20.9434Z"
                                                                            fill="#12131A" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M13 4.39046C13 5.36732 13.7279 6.16952 14.6075 6.59458C16.6151 7.56483 18 9.62064 18 11.9999C18 12.6934 17.8823 13.3594 17.6659 13.9791C17.3439 14.9011 17.3964 15.9823 18.087 16.6728L18.1803 16.7662C19.017 17.6028 20.4127 17.5363 20.9433 16.4788C21.6194 15.1314 22 13.6101 22 11.9999C22 7.57987 19.1323 3.82961 15.156 2.50814C14.0337 2.13515 13 3.07501 13 4.25769V4.39046Z"
                                                                            fill="#12131A" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </span>
                                                        <!--end::Icon-->
                                                        <!--begin::Description-->
                                                        <span class="d-flex flex-column">
                                                            <span
                                                                class="fw-bolder text-gray-800 text-hover-primary fs-5">Developer
                                                                Account</span>
                                                            <span class="fs-6 fw-bold text-gray-400">Use images to your
                                                                post time</span>
                                                        </span>
                                                        <!--end:Description-->
                                                    </span>
                                                    <!--end:Label-->
                                                    <!--begin:Input-->
                                                    <span class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="radio"
                                                            checked="checked" name="account_plan" value="2" />
                                                    </span>
                                                    <!--end:Input-->
                                                </label>
                                                <!--end::Option-->
                                                <!--begin:Option-->
                                                <label class="d-flex flex-stack mb-0 cursor-pointer">
                                                    <!--begin:Label-->
                                                    <span class="d-flex align-items-center me-2">
                                                        <!--begin::Icon-->
                                                        <span class="symbol symbol-50px me-6">
                                                            <span class="symbol-label">
                                                                <!--begin::Svg Icon | path: icons/duotone/Interface/Line-03-Down.svg-->
                                                                <span class="svg-icon svg-icon-1 svg-icon-gray-600">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        width="24" height="24"
                                                                        viewBox="0 0 24 24" fill="none">
                                                                        <path opacity="0.25"
                                                                            d="M1 5C1 3.89543 1.89543 3 3 3H21C22.1046 3 23 3.89543 23 5V19C23 20.1046 22.1046 21 21 21H3C1.89543 21 1 20.1046 1 19V5Z"
                                                                            fill="#12131A" />
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M20.8682 17.5035C21.1422 17.9831 20.9756 18.5939 20.4961 18.8679C20.0166 19.1419 19.4058 18.9753 19.1317 18.4958L15.8834 12.8113C15.6612 12.4223 15.2073 12.2286 14.7727 12.3373L9.71238 13.6024C8.40847 13.9283 7.04688 13.3473 6.38005 12.1803L3.13174 6.49582C2.85773 6.0163 3.02433 5.40545 3.50385 5.13144C3.98337 4.85743 4.59422 5.02403 4.86823 5.50354L8.11653 11.1881C8.33881 11.5771 8.79268 11.7707 9.22731 11.6621L14.2876 10.397C15.5915 10.071 16.9531 10.6521 17.6199 11.819L20.8682 17.5035Z"
                                                                            fill="#12131A" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </span>
                                                        </span>
                                                        <!--end::Icon-->
                                                        <!--begin::Description-->
                                                        <span class="d-flex flex-column">
                                                            <span
                                                                class="fw-bolder text-gray-800 text-hover-primary fs-5">Testing
                                                                Account</span>
                                                            <span class="fs-6 fw-bold text-gray-400">Use images to enhance
                                                                time travel rivers</span>
                                                        </span>
                                                        <!--end:Description-->
                                                    </span>
                                                    <!--end:Label-->
                                                    <!--begin:Input-->
                                                    <span class="form-check form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="radio"
                                                            name="account_plan" value="3" />
                                                    </span>
                                                    <!--end:Input-->
                                                </label>
                                                <!--end::Option-->
                                            </div>
                                            <!--end::Options-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Step 2-->
                                <!--begin::Step 3-->
                                <div data-kt-stepper-element="content">
                                    <!--begin::Wrapper-->
                                    <div class="w-100">
                                        <!--begin::Heading-->
                                        <div class="pb-10 pb-lg-12">
                                            <!--begin::Title-->
                                            <h2 class="fw-bolder text-dark">Business Details</h2>
                                            <!--end::Title-->
                                            <!--begin::Notice-->
                                            <div class="text-gray-400 fw-bold fs-6">If you need more info, please check
                                                out
                                                <a href="#" class="link-primary fw-bolder">Help Page</a>.
                                            </div>
                                            <!--end::Notice-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Label-->
                                            <label class="form-label required">Business Name</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input name="business_name"
                                                class="form-control form-control-lg form-control-solid"
                                                value="Keenthemes Inc." />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center form-label">
                                                <span class="required">Shortened Descriptor</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover"
                                                    data-bs-trigger="hover" data-bs-html="true"
                                                    data-bs-content="&lt;div class='p-4 rounded bg-light'&gt; &lt;div class='d-flex flex-stack text-muted mb-4'&gt; &lt;i class='fas fa-university fs-3 me-3'&gt;&lt;/i&gt; &lt;div class='fw-bold'&gt;INCBANK **** 1245 STATEMENT&lt;/div&gt; &lt;/div&gt; &lt;div class='d-flex flex-stack fw-bold text-gray-600'&gt; &lt;div&gt;Amount&lt;/div&gt; &lt;div&gt;Transaction&lt;/div&gt; &lt;/div&gt; &lt;div class='separator separator-dashed my-2'&gt;&lt;/div&gt; &lt;div class='d-flex flex-stack text-dark fw-bolder mb-2'&gt; &lt;div&gt;USD345.00&lt;/div&gt; &lt;div&gt;KEENTHEMES*&lt;/div&gt; &lt;/div&gt; &lt;div class='d-flex flex-stack text-muted mb-2'&gt; &lt;div&gt;USD75.00&lt;/div&gt; &lt;div&gt;Hosting fee&lt;/div&gt; &lt;/div&gt; &lt;div class='d-flex flex-stack text-muted'&gt; &lt;div&gt;USD3,950.00&lt;/div&gt; &lt;div&gt;Payrol&lt;/div&gt; &lt;/div&gt; &lt;/div&gt;"></i>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input name="business_descriptor"
                                                class="form-control form-control-lg form-control-solid"
                                                value="KEENTHEMES" />
                                            <!--end::Input-->
                                            <!--begin::Hint-->
                                            <div class="form-text">Customers will see this shortened version of your
                                                statement descriptor</div>
                                            <!--end::Hint-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--begin::Label-->
                                            <label class="form-label required">Corporation Type</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <select name="business_type"
                                                class="form-select form-select-lg form-select-solid"
                                                data-control="select2" data-placeholder="Select..."
                                                data-allow-clear="true" data-hide-search="true">
                                                <option></option>
                                                <option value="1">S Corporation</option>
                                                <option value="1">C Corporation</option>
                                                <option value="2">Sole Proprietorship</option>
                                                <option value="3">Non-profit</option>
                                                <option value="4">Limited Liability</option>
                                                <option value="5">General Partnership</option>
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10">
                                            <!--end::Label-->
                                            <label class="form-label">Business Description</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <textarea name="business_description" class="form-control form-control-lg form-control-solid" rows="3"></textarea>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-0">
                                            <!--begin::Label-->
                                            <label class="fs-6 fw-bold form-label required">Contact Email</label>
                                            <!--end::Label-->
                                            <!--begin::Input-->
                                            <input name="business_email"
                                                class="form-control form-control-lg form-control-solid"
                                                value="corp@support.com" />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Step 3-->
                                <!--begin::Step 4-->
                                <div data-kt-stepper-element="content">
                                    <!--begin::Wrapper-->
                                    <div class="w-100">
                                        <!--begin::Heading-->
                                        <div class="pb-10 pb-lg-15">
                                            <!--begin::Title-->
                                            <h2 class="fw-bolder text-dark">Billing Details</h2>
                                            <!--end::Title-->
                                            <!--begin::Notice-->
                                            <div class="text-gray-400 fw-bold fs-6">If you need more info, please check
                                                out
                                                <a href="#" class="text-primary fw-bolder">Help Page</a>.
                                            </div>
                                            <!--end::Notice-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column mb-7 fv-row">
                                            <!--begin::Label-->
                                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                <span class="required">Name On Card</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="Specify a card holder's name"></i>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" class="form-control form-control-solid"
                                                placeholder="" name="card_name" value="Max Doe" />
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-column mb-7 fv-row">
                                            <!--begin::Label-->
                                            <label class="required fs-6 fw-bold form-label mb-2">Card Number</label>
                                            <!--end::Label-->
                                            <!--begin::Input wrapper-->
                                            <div class="position-relative">
                                                <!--begin::Input-->
                                                <input type="text" class="form-control form-control-solid"
                                                    placeholder="Enter card number" name="card_number"
                                                    value="4111 1111 1111 1111" />
                                                <!--end::Input-->
                                                <!--begin::Card logos-->
                                                <div class="position-absolute translate-middle-y top-50 end-0 me-5">
                                                    <img src="assets/media/svg/card-logos/visa.svg" alt=""
                                                        class="h-25px" />
                                                    <img src="assets/media/svg/card-logos/mastercard.svg" alt=""
                                                        class="h-25px" />
                                                    <img src="assets/media/svg/card-logos/american-express.svg"
                                                        alt="" class="h-25px" />
                                                </div>
                                                <!--end::Card logos-->
                                            </div>
                                            <!--end::Input wrapper-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-10">
                                            <!--begin::Col-->
                                            <div class="col-md-8 fv-row">
                                                <!--begin::Label-->
                                                <label class="required fs-6 fw-bold form-label mb-2">Expiration
                                                    Date</label>
                                                <!--end::Label-->
                                                <!--begin::Row-->
                                                <div class="row fv-row">
                                                    <!--begin::Col-->
                                                    <div class="col-6">
                                                        <select name="card_expiry_month"
                                                            class="form-select form-select-solid" data-control="select2"
                                                            data-hide-search="true" data-placeholder="Month">
                                                            <option></option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                        </select>
                                                    </div>
                                                    <!--end::Col-->
                                                    <!--begin::Col-->
                                                    <div class="col-6">
                                                        <select name="card_expiry_year"
                                                            class="form-select form-select-solid" data-control="select2"
                                                            data-hide-search="true" data-placeholder="Year">
                                                            <option></option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                            <option value="2025">2025</option>
                                                            <option value="2026">2026</option>
                                                            <option value="2027">2027</option>
                                                            <option value="2028">2028</option>
                                                            <option value="2029">2029</option>
                                                            <option value="2030">2030</option>
                                                            <option value="2031">2031</option>
                                                        </select>
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-md-4 fv-row">
                                                <!--begin::Label-->
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                    <span class="required">CVV</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7"
                                                        data-bs-toggle="tooltip" title="Enter a card CVV code"></i>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input wrapper-->
                                                <div class="position-relative">
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid"
                                                        minlength="3" maxlength="4" placeholder="CVV"
                                                        name="card_cvv" />
                                                    <!--end::Input-->
                                                    <!--begin::CVV icon-->
                                                    <div class="position-absolute translate-middle-y top-50 end-0 me-3">
                                                        <!--begin::Svg Icon | path: icons/duotone/Shopping/Credit-card.svg-->
                                                        <span class="svg-icon svg-icon-2hx">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                width="24px" height="24px" viewBox="0 0 24 24"
                                                                version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <rect fill="#000000" opacity="0.3" x="2" y="5"
                                                                        width="20" height="14"
                                                                        rx="2" />
                                                                    <rect fill="#000000" x="2" y="8" width="20"
                                                                        height="3" />
                                                                    <rect fill="#000000" opacity="0.3" x="16" y="14"
                                                                        width="4" height="2"
                                                                        rx="1" />
                                                                </g>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::CVV icon-->
                                                </div>
                                                <!--end::Input wrapper-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::Label-->
                                            <div class="me-5">
                                                <label class="fs-6 fw-bold form-label">Save Card for further
                                                    billing?</label>
                                                <div class="fs-7 fw-bold text-gray-400">If you need more info, please
                                                    check budget planning</div>
                                            </div>
                                            <!--end::Label-->
                                            <!--begin::Switch-->
                                            <label class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    checked="checked" />
                                                <span class="form-check-label fw-bold text-gray-400">Save Card</span>
                                            </label>
                                            <!--end::Switch-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Step 4-->
                                <!--begin::Step 5-->
                                <div data-kt-stepper-element="content">
                                    <!--begin::Wrapper-->
                                    <div class="w-100">
                                        <!--begin::Heading-->
                                        <div class="pb-8 pb-lg-10">
                                            <!--begin::Title-->
                                            <h2 class="fw-bolder text-dark">Your Are Done!</h2>
                                            <!--end::Title-->
                                            <!--begin::Notice-->
                                            <div class="text-gray-400 fw-bold fs-6">If you need more info, please
                                                <a href="authentication/sign-in/basic.html"
                                                    class="link-primary fw-bolder">Sign In</a>.
                                            </div>
                                            <!--end::Notice-->
                                        </div>
                                        <!--end::Heading-->
                                        <!--begin::Body-->
                                        <div class="mb-0">
                                            <!--begin::Text-->
                                            <div class="fs-6 text-gray-600 mb-5">Writing headlines for blog posts is as
                                                much an art as it is a science and probably warrants its own post, but for
                                                all advise is with what works for your great &amp; amazing audience.</div>
                                            <!--end::Text-->
                                            <!--begin::Alert-->
                                            <!--begin::Notice-->
                                            <div
                                                class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                                                <!--begin::Icon-->
                                                <!--begin::Svg Icon | path: icons/duotone/Code/Warning-1-circle.svg-->
                                                <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <circle fill="#000000" opacity="0.3" cx="12"
                                                            cy="12" r="10" />
                                                        <rect fill="#000000" x="11" y="7" width="2"
                                                            height="8" rx="1" />
                                                        <rect fill="#000000" x="11" y="16" width="2"
                                                            height="2" rx="1" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                <!--end::Icon-->
                                                <!--begin::Wrapper-->
                                                <div class="d-flex flex-stack flex-grow-1">
                                                    <!--begin::Content-->
                                                    <div class="fw-bold">
                                                        <h4 class="text-gray-800 fw-bolder">We need your attention!</h4>
                                                        <div class="fs-6 text-gray-600">To start using great tools,
                                                            please, please
                                                            <a href="#" class="fw-bolder">Create Team Platform</a>
                                                        </div>
                                                    </div>
                                                    <!--end::Content-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </div>
                                            <!--end::Notice-->
                                            <!--end::Alert-->
                                        </div>
                                        <!--end::Body-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Step 5-->
                                <!--begin::Actions-->
                                <div class="d-flex flex-stack pt-15">
                                    <!--begin::Wrapper-->
                                    <div class="mr-2">
                                        <button type="button" class="btn btn-lg btn-light-primary me-3"
                                            data-kt-stepper-action="previous">
                                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Left-2.svg-->
                                            <span class="svg-icon svg-icon-4 me-1">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <rect fill="#000000" opacity="0.3"
                                                            transform="translate(15.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-15.000000, -12.000000)"
                                                            x="14" y="7" width="2" height="10"
                                                            rx="1" />
                                                        <path
                                                            d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z"
                                                            fill="#000000" fill-rule="nonzero"
                                                            transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997)" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Back</button>
                                    </div>
                                    <!--end::Wrapper-->
                                    <!--begin::Wrapper-->
                                    <div>
                                        <button type="button" class="btn btn-lg btn-primary me-3"
                                            data-kt-stepper-action="submit">
                                            <span class="indicator-label">Submit
                                                <!--begin::Svg Icon | path: icons/duotone/Navigation/Right-2.svg-->
                                                <span class="svg-icon svg-icon-3 ms-2 me-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <polygon points="0 0 24 0 24 24 0 24" />
                                                            <rect fill="#000000" opacity="0.5"
                                                                transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)"
                                                                x="7.5" y="7.5" width="2" height="9"
                                                                rx="1" />
                                                            <path
                                                                d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                                fill="#000000" fill-rule="nonzero"
                                                                transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                                        </g>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon--></span>
                                            <span class="indicator-progress">Please wait...
                                                <span
                                                    class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                        </button>
                                        <button type="button" class="btn btn-lg btn-primary"
                                            data-kt-stepper-action="next">Continue
                                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Right-2.svg-->
                                            <span class="svg-icon svg-icon-4 ms-1 me-0">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <rect fill="#000000" opacity="0.5"
                                                            transform="translate(8.500000, 12.000000) rotate(-90.000000) translate(-8.500000, -12.000000)"
                                                            x="7.5" y="7.5" width="2" height="9"
                                                            rx="1" />
                                                        <path
                                                            d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                            fill="#000000" fill-rule="nonzero"
                                                            transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon--></button>
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Actions-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Stepper-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - Create project-->
        <!--begin::Modal - Users Search-->
        <div class="modal fade" id="kt_modal_users_search" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header pb-0 border-0 justify-content-end">
                        <!--begin::Close-->
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                        fill="#000000">
                                        <rect fill="#000000" x="0" y="7" width="16" height="2"
                                            rx="1" />
                                        <rect fill="#000000" opacity="0.5"
                                            transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                            x="0" y="7" width="16" height="2" rx="1" />
                                    </g>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--begin::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                        <!--begin::Content-->
                        <div class="text-center mb-13">
                            <h1 class="mb-3">Search Users</h1>
                            <div class="text-gray-400 fw-bold fs-5">Invite Collaborators To Your Project</div>
                        </div>
                        <!--end::Content-->
                        <!--begin::Search-->
                        <div id="kt_modal_users_search_handler" data-kt-search-keypress="true"
                            data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="inline">
                            <!--begin::Form-->
                            <form data-kt-search-element="form" class="w-100 position-relative mb-5"
                                autocomplete="off">
                                <!--begin::Hidden input(Added to disable form autocomplete)-->
                                <input type="hidden" />
                                <!--end::Hidden input-->
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotone/General/Search.svg-->
                                <span
                                    class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 ms-5 translate-middle-y">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <path
                                                d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-lg form-control-solid px-15"
                                    name="search" value=""
                                    placeholder="Search by username, full name or email..."
                                    data-kt-search-element="input" />
                                <!--end::Input-->
                                <!--begin::Spinner-->
                                <span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5"
                                    data-kt-search-element="spinner">
                                    <span class="spinner-border h-15px w-15px align-middle text-gray-400"></span>
                                </span>
                                <!--end::Spinner-->
                                <!--begin::Reset-->
                                <span
                                    class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 me-5 d-none"
                                    data-kt-search-element="clear">
                                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                                    <span class="svg-icon svg-icon-2 svg-icon-lg-1 me-0">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                                fill="#000000">
                                                <rect fill="#000000" x="0" y="7" width="16" height="2"
                                                    rx="1" />
                                                <rect fill="#000000" opacity="0.5"
                                                    transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                                    x="0" y="7" width="16" height="2" rx="1" />
                                            </g>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <!--end::Reset-->
                            </form>
                            <!--end::Form-->
                            <!--begin::Wrapper-->
                            <div class="py-5">
                                <!--begin::Suggestions-->
                                <div data-kt-search-element="suggestions">
                                    <!--begin::Heading-->
                                    <h3 class="fw-bold mb-5">Recently searched:</h3>
                                    <!--end::Heading-->
                                    <!--begin::Users-->
                                    <div class="mh-375px scroll-y me-n7 pe-7">
                                        <!--begin::User-->
                                        <a href="#"
                                            class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle me-5">
                                                <img alt="Pic" src="assets/media/avatars/150-1.jpg" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Info-->
                                            <div class="fw-bold">
                                                <span class="fs-6 text-gray-800 me-2">Emma Smith</span>
                                                <span class="badge badge-light">Art Director</span>
                                            </div>
                                            <!--end::Info-->
                                        </a>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <a href="#"
                                            class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle me-5">
                                                <span class="symbol-label bg-light-danger text-danger fw-bold">M</span>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Info-->
                                            <div class="fw-bold">
                                                <span class="fs-6 text-gray-800 me-2">Melody Macy</span>
                                                <span class="badge badge-light">Marketing Analytic</span>
                                            </div>
                                            <!--end::Info-->
                                        </a>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <a href="#"
                                            class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle me-5">
                                                <img alt="Pic" src="assets/media/avatars/150-2.jpg" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Info-->
                                            <div class="fw-bold">
                                                <span class="fs-6 text-gray-800 me-2">Max Smith</span>
                                                <span class="badge badge-light">Software Enginer</span>
                                            </div>
                                            <!--end::Info-->
                                        </a>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <a href="#"
                                            class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle me-5">
                                                <img alt="Pic" src="assets/media/avatars/150-4.jpg" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Info-->
                                            <div class="fw-bold">
                                                <span class="fs-6 text-gray-800 me-2">Sean Bean</span>
                                                <span class="badge badge-light">Web Developer</span>
                                            </div>
                                            <!--end::Info-->
                                        </a>
                                        <!--end::User-->
                                        <!--begin::User-->
                                        <a href="#"
                                            class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-35px symbol-circle me-5">
                                                <img alt="Pic" src="assets/media/avatars/150-15.jpg" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Info-->
                                            <div class="fw-bold">
                                                <span class="fs-6 text-gray-800 me-2">Brian Cox</span>
                                                <span class="badge badge-light">UI/UX Designer</span>
                                            </div>
                                            <!--end::Info-->
                                        </a>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Users-->
                                </div>
                                <!--end::Suggestions-->
                                <!--begin::Results(add d-none to below element to hide the users list by default)-->
                                <div data-kt-search-element="results" class="d-none">
                                    <!--begin::Users-->
                                    <div class="mh-375px scroll-y me-n7 pe-7">
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="0">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='0']"
                                                        value="0" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="assets/media/avatars/150-1.jpg" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Emma
                                                        Smith</a>
                                                    <div class="fw-bold text-gray-400">e.smith@kpmg.com.au</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1">Guest</option>
                                                    <option value="2" selected="selected">Owner</option>
                                                    <option value="3">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="1">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='1']"
                                                        value="1" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span
                                                        class="symbol-label bg-light-danger text-danger fw-bold">M</span>
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Melody
                                                        Macy</a>
                                                    <div class="fw-bold text-gray-400">melody@altbox.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1" selected="selected">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="2">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='2']"
                                                        value="2" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="assets/media/avatars/150-2.jpg" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Max
                                                        Smith</a>
                                                    <div class="fw-bold text-gray-400">max@kt.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3" selected="selected">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="3">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='3']"
                                                        value="3" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="assets/media/avatars/150-4.jpg" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Sean
                                                        Bean</a>
                                                    <div class="fw-bold text-gray-400">sean@dellito.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1">Guest</option>
                                                    <option value="2" selected="selected">Owner</option>
                                                    <option value="3">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="4">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='4']"
                                                        value="4" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="assets/media/avatars/150-15.jpg" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Brian
                                                        Cox</a>
                                                    <div class="fw-bold text-gray-400">brian@exchange.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3" selected="selected">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="5">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='5']"
                                                        value="5" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span
                                                        class="symbol-label bg-light-warning text-warning fw-bold">M</span>
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Mikaela
                                                        Collins</a>
                                                    <div class="fw-bold text-gray-400">mikaela@pexcom.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1">Guest</option>
                                                    <option value="2" selected="selected">Owner</option>
                                                    <option value="3">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="6">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='6']"
                                                        value="6" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="assets/media/avatars/150-8.jpg" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Francis
                                                        Mitcham</a>
                                                    <div class="fw-bold text-gray-400">f.mitcham@kpmg.com.au</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3" selected="selected">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="7">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='7']"
                                                        value="7" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span
                                                        class="symbol-label bg-light-danger text-danger fw-bold">O</span>
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Olivia
                                                        Wild</a>
                                                    <div class="fw-bold text-gray-400">olivia@corpmail.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1">Guest</option>
                                                    <option value="2" selected="selected">Owner</option>
                                                    <option value="3">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="8">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='8']"
                                                        value="8" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span
                                                        class="symbol-label bg-light-primary text-primary fw-bold">N</span>
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Neil
                                                        Owen</a>
                                                    <div class="fw-bold text-gray-400">owen.neil@gmail.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1" selected="selected">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="9">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='9']"
                                                        value="9" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="assets/media/avatars/150-6.jpg" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Dan
                                                        Wilson</a>
                                                    <div class="fw-bold text-gray-400">dam@consilting.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3" selected="selected">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="10">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='10']"
                                                        value="10" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span
                                                        class="symbol-label bg-light-danger text-danger fw-bold">E</span>
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Emma
                                                        Bold</a>
                                                    <div class="fw-bold text-gray-400">emma@intenso.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1">Guest</option>
                                                    <option value="2" selected="selected">Owner</option>
                                                    <option value="3">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="11">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='11']"
                                                        value="11" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="assets/media/avatars/150-7.jpg" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Ana
                                                        Crown</a>
                                                    <div class="fw-bold text-gray-400">ana.cf@limtel.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1" selected="selected">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="12">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='12']"
                                                        value="12" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-info text-info fw-bold">A</span>
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Robert
                                                        Doe</a>
                                                    <div class="fw-bold text-gray-400">robert@benko.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3" selected="selected">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="13">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='13']"
                                                        value="13" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="assets/media/avatars/150-17.jpg" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">John
                                                        Miller</a>
                                                    <div class="fw-bold text-gray-400">miller@mapple.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3" selected="selected">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="14">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='14']"
                                                        value="14" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span
                                                        class="symbol-label bg-light-success text-success fw-bold">L</span>
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Lucy
                                                        Kunic</a>
                                                    <div class="fw-bold text-gray-400">lucy.m@fentech.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1">Guest</option>
                                                    <option value="2" selected="selected">Owner</option>
                                                    <option value="3">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="15">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='15']"
                                                        value="15" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="assets/media/avatars/150-10.jpg" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">Ethan
                                                        Wilder</a>
                                                    <div class="fw-bold text-gray-400">ethan@loop.com.au</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1" selected="selected">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                        <!--begin::Separator-->
                                        <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                                        <!--end::Separator-->
                                        <!--begin::User-->
                                        <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="16">
                                            <!--begin::Details-->
                                            <div class="d-flex align-items-center">
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-5">
                                                    <input class="form-check-input" type="checkbox" name="users"
                                                        data-kt-check="true" data-kt-check-target="[data-user-id='16']"
                                                        value="16" />
                                                </label>
                                                <!--end::Checkbox-->
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="assets/media/avatars/150-17.jpg" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Details-->
                                                <div class="ms-5">
                                                    <a href="#"
                                                        class="fs-5 fw-bolder text-gray-900 text-hover-primary mb-2">John
                                                        Miller</a>
                                                    <div class="fw-bold text-gray-400">miller@mapple.com</div>
                                                </div>
                                                <!--end::Details-->
                                            </div>
                                            <!--end::Details-->
                                            <!--begin::Access menu-->
                                            <div class="ms-2 w-100px">
                                                <select class="form-select form-select-solid form-select-sm"
                                                    data-control="select2" data-hide-search="true">
                                                    <option value="1">Guest</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3" selected="selected">Can Edit</option>
                                                </select>
                                            </div>
                                            <!--end::Access menu-->
                                        </div>
                                        <!--end::User-->
                                    </div>
                                    <!--end::Users-->
                                    <!--begin::Actions-->
                                    <div class="d-flex flex-center mt-15">
                                        <button type="reset" id="kt_modal_users_search_reset"
                                            data-bs-dismiss="modal" class="btn btn-active-light me-3">Cancel</button>
                                        <button type="submit" id="kt_modal_users_search_submit"
                                            class="btn btn-primary">Add Selected Users</button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Results-->
                                <!--begin::Empty-->
                                <div data-kt-search-element="empty" class="text-center d-none">
                                    <!--begin::Message-->
                                    <div class="fw-bold py-10 mb-10">
                                        <div class="text-gray-600 fs-3 mb-2">No users found</div>
                                        <div class="text-gray-400 fs-6">Try to search by username, full name or email...
                                        </div>
                                    </div>
                                    <!--end::Message-->
                                    <!--begin::Illustration-->
                                    <div class="text-center px-4">
                                        <img src="assets/media/illustrations/alert.png" alt=""
                                            class="mw-100 mh-200px" />
                                    </div>
                                    <!--end::Illustration-->
                                </div>
                                <!--end::Empty-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - Users Search-->
        <!--begin::Modal - New Card-->
        <div class="modal fade" id="kt_modal_new_card" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header">
                        <!--begin::Modal title-->
                        <h2 class="mb-0">Add New Card</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                            <!--begin::Svg Icon | path: icons/duotone/Interface/Close-Square.svg-->
                            <span class="svg-icon svg-icon-2x">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd"
                                        d="M2.36899 6.54184C2.65912 4.34504 4.34504 2.65912 6.54184 2.36899C8.05208 2.16953 9.94127 2 12 2C14.0587 2 15.9479 2.16953 17.4582 2.36899C19.655 2.65912 21.3409 4.34504 21.631 6.54184C21.8305 8.05208 22 9.94127 22 12C22 14.0587 21.8305 15.9479 21.631 17.4582C21.3409 19.655 19.655 21.3409 17.4582 21.631C15.9479 21.8305 14.0587 22 12 22C9.94127 22 8.05208 21.8305 6.54184 21.631C4.34504 21.3409 2.65912 19.655 2.36899 17.4582C2.16953 15.9479 2 14.0587 2 12C2 9.94127 2.16953 8.05208 2.36899 6.54184Z"
                                        fill="#12131A" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8.29289 8.29289C8.68342 7.90237 9.31658 7.90237 9.70711 8.29289L12 10.5858L14.2929 8.29289C14.6834 7.90237 15.3166 7.90237 15.7071 8.29289C16.0976 8.68342 16.0976 9.31658 15.7071 9.70711L13.4142 12L15.7071 14.2929C16.0976 14.6834 16.0976 15.3166 15.7071 15.7071C15.3166 16.0976 14.6834 16.0976 14.2929 15.7071L12 13.4142L9.70711 15.7071C9.31658 16.0976 8.68342 16.0976 8.29289 15.7071C7.90237 15.3166 7.90237 14.6834 8.29289 14.2929L10.5858 12L8.29289 9.70711C7.90237 9.31658 7.90237 8.68342 8.29289 8.29289Z"
                                        fill="#12131A" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>
                    <!--end::Modal header-->
                    <!--begin::Modal body-->
                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                        <!--begin::Form-->
                        <form id="kt_modal_new_card_form" class="form" action="#">
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">Name On Card</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                        title="Specify a card holder's name"></i>
                                </label>
                                <!--end::Label-->
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    name="card_name" value="Max Doe" />
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-7 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-bold form-label mb-2">Card Number</label>
                                <!--end::Label-->
                                <!--begin::Input wrapper-->
                                <div class="position-relative">
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid"
                                        placeholder="Enter card number" name="card_number"
                                        value="4111 1111 1111 1111" />
                                    <!--end::Input-->
                                    <!--begin::Card logos-->
                                    <div class="position-absolute translate-middle-y top-50 end-0 me-5">
                                        <img src="assets/media/svg/card-logos/visa.svg" alt=""
                                            class="h-25px" />
                                        <img src="assets/media/svg/card-logos/mastercard.svg" alt=""
                                            class="h-25px" />
                                        <img src="assets/media/svg/card-logos/american-express.svg" alt=""
                                            class="h-25px" />
                                    </div>
                                    <!--end::Card logos-->
                                </div>
                                <!--end::Input wrapper-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="row mb-10">
                                <!--begin::Col-->
                                <div class="col-md-8 fv-row">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-bold form-label mb-2">Expiration Date</label>
                                    <!--end::Label-->
                                    <!--begin::Row-->
                                    <div class="row fv-row">
                                        <!--begin::Col-->
                                        <div class="col-6">
                                            <select name="card_expiry_month" class="form-select form-select-solid"
                                                data-control="select2" data-hide-search="true"
                                                data-placeholder="Month">
                                                <option></option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-6">
                                            <select name="card_expiry_year" class="form-select form-select-solid"
                                                data-control="select2" data-hide-search="true"
                                                data-placeholder="Year">
                                                <option></option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                                <option value="2027">2027</option>
                                                <option value="2028">2028</option>
                                                <option value="2029">2029</option>
                                                <option value="2030">2030</option>
                                                <option value="2031">2031</option>
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-md-4 fv-row">
                                    <!--begin::Label-->
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">CVV</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                            title="Enter a card CVV code"></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input wrapper-->
                                    <div class="position-relative">
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid" minlength="3"
                                            maxlength="4" placeholder="CVV" name="card_cvv" />
                                        <!--end::Input-->
                                        <!--begin::CVV icon-->
                                        <div class="position-absolute translate-middle-y top-50 end-0 me-3">
                                            <!--begin::Svg Icon | path: icons/duotone/Shopping/Credit-card.svg-->
                                            <span class="svg-icon svg-icon-2hx">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <rect fill="#000000" opacity="0.3" x="2" y="5" width="20"
                                                            height="14" rx="2" />
                                                        <rect fill="#000000" x="2" y="8" width="20"
                                                            height="3" />
                                                        <rect fill="#000000" opacity="0.3" x="16" y="14"
                                                            width="4" height="2" rx="1" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </div>
                                        <!--end::CVV icon-->
                                    </div>
                                    <!--end::Input wrapper-->
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="d-flex flex-stack">
                                <!--begin::Label-->
                                <div class="me-5">
                                    <label class="fs-6 fw-bold form-label">Save Card for further billing?</label>
                                    <div class="fs-7 fw-bold text-gray-400">If you need more info, please check budget
                                        planning</div>
                                </div>
                                <!--end::Label-->
                                <!--begin::Switch-->
                                <label class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="1"
                                        checked="checked" />
                                    <span class="form-check-label fw-bold text-gray-400">Save Card</span>
                                </label>
                                <!--end::Switch-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="text-center pt-15">
                                <button type="reset" id="kt_modal_new_card_cancel"
                                    class="btn btn-white me-3">Discard</button>
                                <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
                                    <span class="indicator-label">Submit</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Modal body-->
                </div>
                <!--end::Modal content-->
            </div>
            <!--end::Modal dialog-->
        </div>
        <!--end::Modal - New Card-->
        <!--end::Modals-->
    </div>
@endsection
