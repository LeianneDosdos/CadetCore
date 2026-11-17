
@php
    /* =====================================================
       TEMPORARY SAMPLE DATA
       REMOVE THIS SECTION WHEN CONNECTING THE DATABASE
       ===================================================== */

    $platoonName = "1st Platoon";
    $academicYear = "2026-2027";
    $semester = "1st Semester";
    $currentWeek = 5;
    $totalWeeks = 18;

    $platoonStrength = 45;
    $attendanceRate = 92;

    $recentEntries = [
        [
            'id' => 'MD-001',
            'date' => '2026-11-12',
            'cadet' => 'Juan Dela Cruz',
            'type' => 'Merit',
            'points' => 5,
            'reason' => 'Outstanding participation',
            'officer' => 'Platoon Leader'
        ],
        [
            'id' => 'MD-002',
            'date' => '2026-11-11',
            'cadet' => 'Pedro Santos',
            'type' => 'Demerit',
            'points' => -3,
            'reason' => 'Late arrival',
            'officer' => 'Platoon Leader'
        ],
        [
            'id' => 'MD-003',
            'date' => '2026-11-10',
            'cadet' => 'Maria Reyes',
            'type' => 'Merit',
            'points' => 3,
            'reason' => 'Assisted during training',
            'officer' => 'Platoon Leader'
        ]
    ];

    $attendanceCount = 41;
    $cadetCount = 45;

    $pointsProgress = 75;
    $netPoints = 25;

    $attentionItems = [
        '4 cadets have incomplete attendance records.',
        '2 cadets have pending merit/demerit reviews.'
    ];

    $nextInstructionDate = 'November 21, 2026';
    $nextInstructionTime = '6:00 AM';
    $nextInstructionLocation = 'CTU Parade Ground';

    /* =====================================================
       END OF TEMPORARY SAMPLE DATA
       ===================================================== */
@endphp


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CadetCore | Platoon Leader Dashboard</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap"
        rel="stylesheet">

</head>


<body>

    <div class="dashboard">

        <!-- SIDEBAR -->
        <aside class="sidebar">


            <!-- BRAND -->
            <div class="brand">

                <div class="logo">

                    <img src="{{ asset('images/cadetcore_logo.png') }}"
                        alt="CadetCore Logo">

                </div>

                <h2>CADETCORE</h2>

            </div>



            <!-- USER INFORMATION -->
            <div class="user-info">

                <p>LOGGED IN AS</p>

                <h3>Platoon Leader</h3>

            </div>



            <!-- SIDEBAR NAVIGATION -->
            <nav class="navigation">


                <!-- DASHBOARD -->
                <a href="{{ url('/platoon-leader/dashboard') }}"
                    class="nav-link active">

                    <span class="nav-icon">

                        <svg viewBox="0 0 24 24">

                            <path d="M3 10.5L12 3l9 7.5"></path>

                            <path d="M5 9.5V21h14V9.5"></path>

                        </svg>

                    </span>

                    Dashboard

                </a>



                <!-- TRAINING SCHEDULE -->
                <a href="{{ url('/platoon-leader/training-schedule') }}"
                    class="nav-link">

                    <span class="nav-icon">

                        <svg viewBox="0 0 24 24">

                            <path d="M9 6h12"></path>

                            <path d="M9 12h12"></path>

                            <path d="M9 18h12"></path>

                            <path d="M3 6h.01"></path>

                            <path d="M3 12h.01"></path>

                            <path d="M3 18h.01"></path>

                        </svg>

                    </span>

                    Training Schedule

                </a>



                <!-- MERIT / DEMERIT -->
                <a href="{{ url('/platoon-leader/merit-demerit') }}"
                    class="nav-link">

                    <span class="nav-icon">

                        <svg viewBox="0 0 24 24">

                            <path d="M12 2.5l3 6.2 6.8 1-4.9 4.8 1.2 6.8-6.1-3.2-6.1 3.2 1.2-6.8-4.9-4.8 6.8-1z"></path>

                        </svg>

                    </span>

                    Merit / Demerit

                </a>



                <!-- ATTENDANCE -->
                <a href="{{ url('/platoon-leader/attendance') }}"
                    class="nav-link">

                    <span class="nav-icon">

                        <svg viewBox="0 0 24 24">

                            <rect x="5" y="3" width="14" height="18" rx="1"></rect>

                            <path d="M9 7h6"></path>

                            <path d="M9 11h6"></path>

                            <path d="M9 15h6"></path>

                        </svg>

                    </span>

                    Attendance

                </a>


            </nav>



            <!-- SIGN OUT -->
            <div class="sidebar-bottom">

                <!-- TEMPORARY SIGN OUT LINK -->
                <!-- Connect this to Laravel authentication later -->

                <a href="#" class="nav-link">

                    <span class="nav-icon">

                        <svg viewBox="0 0 24 24">

                            <path d="M10 17l5-5-5-5"></path>

                            <path d="M15 12H3"></path>

                            <path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7"></path>

                        </svg>

                    </span>

                    Sign Out

                </a>

            </div>


        </aside>



        <!-- MAIN CONTENT -->
        <main class="main-content">


            <!-- PAGE HEADER -->
            <header class="page-header">

                <h1>
                    {{ $platoonName }} Dashboard
                </h1>

                <p>
                    AY {{ $academicYear }}
                    . {{ $semester }}
                    . Week {{ $currentWeek }}
                    of {{ $totalWeeks }}
                </p>

            </header>



            <!-- STATISTICS -->
            <section class="stats-container">


                <!-- PLATOON STRENGTH -->
                <div class="stat-card">

                    <p>PLATOON STRENGTH</p>

                    <h2>
                        {{ $platoonStrength }}
                    </h2>

                    <span>
                        {{ $platoonName }}
                    </span>

                </div>



                <!-- ATTENDANCE -->
                <div class="stat-card">

                    <p>ATTENDANCE</p>

                    <h2>
                        {{ $attendanceRate }}%
                    </h2>

                    <span>Current average</span>

                </div>


            </section>



            <!-- DASHBOARD GRID -->
            <section class="dashboard-grid">


                <!-- RECENT MERIT / DEMERIT ENTRIES -->
                <div class="entries-card">


                    <div class="card-header">

                        <h3>Recent Merit / Demerit Entries</h3>

                        <span>Last 7 days</span>

                    </div>



                    <!-- TABLE -->
                    <div class="table-container">

                        <table>


                            <thead>

                                <tr>

                                    <th>ENTRY ID</th>

                                    <th>DATE</th>

                                    <th>CADET</th>

                                    <th>TYPE</th>

                                    <th>POINTS</th>

                                    <th>REASON</th>

                                    <th>OFFICER</th>

                                </tr>

                            </thead>



                            <tbody>

                                @forelse ($recentEntries as $entry)

                                    <tr>


                                        <!-- ENTRY ID -->
                                        <td>
                                            {{ $entry['id'] }}
                                        </td>



                                        <!-- DATE -->
                                        <td>
                                            {{ $entry['date'] }}
                                        </td>



                                        <!-- CADET -->
                                        <td>
                                            {{ $entry['cadet'] }}
                                        </td>



                                        <!-- TYPE -->
                                        <td>

                                            @if ($entry['type'] === 'Merit')

                                                <span class="merit-badge">
                                                    Merit
                                                </span>

                                            @else

                                                <span class="demerit-badge">
                                                    Demerit
                                                </span>

                                            @endif

                                        </td>



                                        <!-- POINTS -->
                                        <td class="{{ $entry['points'] >= 0 ? 'positive' : 'negative' }}">

                                            {{ $entry['points'] >= 0 ? '+' : '' }}{{ $entry['points'] }}

                                        </td>



                                        <!-- REASON -->
                                        <td>
                                            {{ $entry['reason'] }}
                                        </td>



                                        <!-- OFFICER -->
                                        <td>
                                            {{ $entry['officer'] }}
                                        </td>


                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="7" class="empty-message">

                                            No recent merit or demerit entries.

                                        </td>

                                    </tr>

                                @endforelse


                            </tbody>

                        </table>

                    </div>


                </div>



                <!-- RIGHT COLUMN -->
                <div class="right-column">



                    <!-- PLATOON SUMMARY -->
                    <div class="summary-card">

                        <h3>Platoon Summary</h3>



                        <!-- ATTENDANCE PROGRESS -->
                        <div class="progress-item">


                            <div class="progress-label">

                                <strong>Attendance</strong>

                                <strong>
                                    {{ $attendanceRate }}%
                                </strong>

                            </div>



                            <div class="progress-bar">

                                <div class="progress-fill attendance-fill"
                                    style="width: {{ max(0, min(100, (float) $attendanceRate)) }}%;">

                                </div>

                            </div>



                            <p>

                                {{ $attendanceCount }}

                                of

                                {{ $cadetCount }}

                            </p>


                        </div>




                        <!-- NET POINTS PROGRESS -->
                        <div class="progress-item">


                            <div class="progress-label">

                                <strong>Net Points</strong>

                                <strong>
                                    {{ $pointsProgress }}%
                                </strong>

                            </div>



                            <div class="progress-bar">

                                <div class="progress-fill points-fill"
                                    style="width: {{ max(0, min(100, (float) $pointsProgress)) }}%;">

                                </div>

                            </div>



                            <p>
                                {{ $netPoints }} total
                            </p>


                        </div>


                    </div>




                    <!-- REQUIRES ATTENTION -->
                    <div class="attention-card">

                        <h3>Requires Attention</h3>


                        @forelse ($attentionItems as $item)

                            <p>

                                <span>⚠</span>

                                {{ $item }}

                            </p>

                        @empty

                            <p>
                                No pending items require attention.
                            </p>

                        @endforelse


                    </div>




                    <!-- NEXT MILITARY INSTRUCTION -->
                    <div class="instruction-card">

                        <h3>NEXT MILITARY INSTRUCTION</h3>


                        <h2>
                            {{ $nextInstructionDate }}
                        </h2>


                        <p>
                            {{ $nextInstructionTime }}
                        </p>


                        <div class="instruction-location">

                            {{ $nextInstructionLocation }}

                        </div>


                    </div>


                </div>


            </section>


        </main>


    </div>


</body>

</html>
