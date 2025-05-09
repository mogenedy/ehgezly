@php Auth::shouldUse('admin'); @endphp
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('admin/assets/images/ehgezly.jpg') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Ehgezly</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Services</div>
            </a>
            <ul>
                <li> <a href="{{ route('services.create') }}"><i class='bx bx-radio-circle'></i>Add Service</a>
                </li>
                <li> <a href="{{ route('services.index') }}"><i class='bx bx-radio-circle'></i>Service List</a>
                </li>
                <li> <a href="{{ route('services.statistics') }}"><i class='bx bx-radio-circle'></i>Statistics</a>
                </li>


            </ul>
        </li>
        <li class="menu-label">UI Elements</li>
        <li>

            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-category'></i>
                </div>
                <div class="menu-title">Roles Management</div>
            </a>

            <ul>

                <ul>
                    @can('show')
                        <li><a href="#">📄 Show something</a></li>
                    @endcan

                    @can('edit')
                        <li><a href="#">✏️ Edit something</a></li>
                    @endcan

                    @can('manage')
                        <li><a href="{{ route('roles.create') }}">Make New Role</a></li>
                        <li><a href="{{ route('roles.index') }}">Roles</a></li>
                    @endcan
                </ul>

            </ul>


        </li>
        <li>

            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-category'></i>
                </div>
                <div class="menu-title">Reservations</div>
            </a>
            <ul>
                <ul>
                    <li> <a href="{{ route('admin.reservations.create') }}"><i class='bx bx-radio-circle'></i>Add Reservations</a>
                    </li>
                    <li> <a href="{{ route('admin.reservations.index') }}"><i class='bx bx-radio-circle'></i>Reservations List</a>
                    </li>
                    <li> <a href="{{ route('admin.reservations.statistics') }}"><i class='bx bx-radio-circle'></i>Statistics</a>
                    </li>
                </ul>

            </ul>


        </li>

    </ul>
    <!--end navigation-->
</div>
