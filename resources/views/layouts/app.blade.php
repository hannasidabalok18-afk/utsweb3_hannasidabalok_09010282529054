<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan UTS - Sage & Cream Edition</title>
    
    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- Custom Modern Sage CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>

    <!-- SIDEBAR KIRI ELEGAN -->
    <div class="sidebar d-flex flex-column justify-content-between">
        <div>
            <!-- Brand Logo -->
            <div class="brand-logo d-flex align-items-center gap-3 mb-4">
                <div class="bg-white text-success rounded-3 d-flex align-items-center justify-content-center p-2" style="width: 38px; height: 38px;">
                    <i class="bi bi-book-fill fs-5" style="color: var(--sage-dark) !important;"></i>
                </div>
                <div>
                    <h6 class="fw-bold m-0 text-white" style="letter-spacing: 0.3px;">Perpustakaan</h6>
                    <span class="text-white-50" style="font-size: 11px;">Management System</span>
                </div>
            </div>

            <!-- Menu items -->
            <div class="text-white-50 small fw-bold mb-2 px-2" style="font-size: 11px; letter-spacing: 0.8px;">MAIN MENU</div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="bi bi-grid-1x2-fill me-3 fs-6"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('books.index') }}" class="nav-link {{ request()->routeIs('books.*') ? 'active' : '' }}">
                        <i class="bi bi-journal-album me-3 fs-6"></i> Data Buku
                    </a>
                </li>
            </ul>
        </div>

        <!-- User profile & Logout bottom -->
        <div class="pt-3 border-top border-white border-opacity-10">
            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link text-white-50 border-0 bg-transparent w-100 text-start px-2 py-2">
                        <i class="bi bi-box-arrow-right me-2 fs-6"></i> Logout
                    </button>
                </form>
            @endauth
        </div>
    </div>

    <!-- MAIN CONTENT AREA -->
    <div class="main-content">
        <!-- Top Navigation / User Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <span class="text-muted small fw-medium">
                    <i class="bi bi-calendar3 me-2"></i>{{ \Carbon\Carbon::now()->isoFormat('dddd, DD MMMM YYYY') }}
                </span>
            </div>
            
            <div class="d-flex align-items-center gap-3">
                <div class="text-end">
                    <div class="fw-bold" style="font-size: 14px;">{{ Auth::user()->name ?? 'Administrator' }}</div>
                    <div class="text-muted" style="font-size: 11px;">{{ Auth::user()->email ?? 'admin@perpustakaan.com' }}</div>
                </div>
                <div class="bg-white border rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 42px; height: 42px; color: var(--sage-dark);">
                    <i class="bi bi-person-fill fs-5"></i>
                </div>
            </div>
        </div>

        <!-- Alert Notification -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="background-color: var(--sage-light); color: var(--sage-dark); border-radius: 14px;">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>