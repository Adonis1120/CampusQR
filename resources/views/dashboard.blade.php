<x-layouts.app :title="__('QR Attendance Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        {{-- Overview Cards --}}
        <x-sections.panel :column="3">
            <!-- Total Students Card -->
            <div class="relative group flex flex-col p-6 bg-gradient-to-br from-zinc-50 to-white dark:from-zinc-900/20 dark:to-neutral-800 rounded-xl border border-zinc-100 dark:border-zinc-900/30 hover:border-zinc-300 dark:hover:border-zinc-500 transition-all shadow-sm hover:shadow-md">
                <div class="flex justify-between items-start mb-2">
                    <div>
                        <p class="text-sm font-medium text-zinc-600 dark:text-zinc-300">Total Students</p>
                        <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-100">1,250</h2>
                    </div>
                    <div class="p-2 rounded-lg bg-zinc-100 dark:bg-zinc-900/40">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-zinc-600 dark:text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-auto">
                    <div class="flex items-center text-xs text-zinc-600 dark:text-zinc-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        <span>↑ 5% from last month</span>
                    </div>
                </div>
            </div>
        
            <!-- Today's Attendance Card -->
            <div class="relative group flex flex-col p-6 bg-gradient-to-br from-green-50 to-white dark:from-green-900/20 dark:to-neutral-800 rounded-xl border border-green-100 dark:border-green-900/30 hover:border-green-300 dark:hover:border-green-500 transition-all shadow-sm hover:shadow-md">
                <div class="flex justify-between items-start mb-2">
                    <div>
                        <p class="text-sm font-medium text-green-600 dark:text-green-300">Today's Attendance</p>
                        <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-100">87%</h2>
                    </div>
                    <div class="p-2 rounded-lg bg-green-100 dark:bg-green-900/40">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-auto">
                    <div class="flex items-center text-xs text-green-600 dark:text-green-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Updated 5 mins ago</span>
                    </div>
                </div>
            </div>
        
            <!-- QR Scans Today Card -->
            <div class="relative group flex flex-col p-6 bg-gradient-to-br from-blue-50 to-white dark:from-blue-900/20 dark:to-neutral-800 rounded-xl border border-blue-100 dark:border-blue-900/30 hover:border-blue-300 dark:hover:border-blue-500 transition-all shadow-sm hover:shadow-md">
                <div class="flex justify-between items-start mb-2">
                    <div>
                        <p class="text-sm font-medium text-blue-600 dark:text-blue-300">QR Scans Today</p>
                        <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-100">328</h2>
                    </div>
                    <div class="p-2 rounded-lg bg-blue-100 dark:bg-blue-900/40">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-auto">
                    <div class="flex items-center text-xs text-blue-600 dark:text-blue-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        <span>↑ 15% from yesterday</span>
                    </div>
                </div>
            </div>
        </x-sections.panel>

        {{-- Main Content Area --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 h-full">
            {{-- Attendance Chart --}}
            <div class="lg:col-span-1 relative h-full bg-white dark:bg-neutral-800 rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 shadow-sm">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Weekly Attendance</h3>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 text-xs bg-zinc-800 dark:bg-zinc-700 text-white dark:text-zinc-200 rounded-full">This Week</button>
                        <button class="px-3 py-1 text-xs bg-gray-100 dark:bg-neutral-700 text-gray-600 dark:text-gray-300 rounded-full">Last Week</button>
                    </div>
                </div>
                <div class="h-80">
                    <canvas id="attendanceChart"></canvas>
                </div>
            </div>

            {{-- Recent Scans --}}
            <div class="relative h-full bg-white dark:bg-neutral-800 rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 shadow-sm">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Recent QR Scans</h3>
                    <button class="text-xs text-primary-600 dark:text-primary-400">View All</button>
                </div>
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 mt-1">
                            <div class="h-2 w-2 rounded-full bg-green-500"></div>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Juan Dela Cruz</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Grade 12 - STEM | Scanned at Main Gate</p>
                            <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">2 mins ago</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 mt-1">
                            <div class="h-2 w-2 rounded-full bg-green-500"></div>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Maria Santos</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Grade 11 - HUMSS | Scanned at Library</p>
                            <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">15 mins ago</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 mt-1">
                            <div class="h-2 w-2 rounded-full bg-yellow-500"></div>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Pedro Bautista</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Grade 10 - Diamond | Late Arrival (8:15 AM)</p>
                            <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">1 hour ago</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 mt-1">
                            <div class="h-2 w-2 rounded-full bg-green-500"></div>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Ana Reyes</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Grade 9 - Emerald | Scanned at Gym</p>
                            <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">2 hours ago</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 mt-1">
                            <div class="h-2 w-2 rounded-full bg-red-500"></div>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Carlos Gonzales</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">Grade 12 - ABM | Absent (No scan today)</p>
                            <p class="text-xs text-gray-400 dark:text-gray-500 mt-1">Last scan: yesterday</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Quick Stats --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-white dark:bg-neutral-800 rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 shadow-sm">
                <div class="flex items-center space-x-3">
                    <div class="p-2 rounded-lg bg-zinc-100 dark:bg-zinc-900/40">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-zinc-600 dark:text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">QR Codes Generated</p>
                        <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-200">1,250</h3>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-neutral-800 rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 shadow-sm">
                <div class="flex items-center space-x-3">
                    <div class="p-2 rounded-lg bg-amber-100 dark:bg-amber-900/40">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-600 dark:text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Late Arrivals Today</p>
                        <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-200">28</h3>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-neutral-800 rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 shadow-sm">
                <div class="flex items-center space-x-3">
                    <div class="p-2 rounded-lg bg-emerald-100 dark:bg-emerald-900/40">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600 dark:text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Present Today</p>
                        <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-200">1,089</h3>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-neutral-800 rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 shadow-sm">
                <div class="flex items-center space-x-3">
                    <div class="p-2 rounded-lg bg-rose-100 dark:bg-rose-900/40">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-rose-600 dark:text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Absent Today</p>
                        <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-200">161</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Chart.js Implementation --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Attendance Chart
            const attendanceCtx = document.getElementById('attendanceChart').getContext('2d');
            new Chart(attendanceCtx, {
                type: 'bar',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                    datasets: [{
                        label: 'Attendance Rate',
                        data: [85, 82, 90, 87, 88, 76],
                        backgroundColor: 'rgba(56, 168, 60, 0.7)',
                        borderColor: 'rgba(56, 168, 60, 1)',
                        borderWidth: 1,
                        borderRadius: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            titleFont: { size: 12 },
                            bodyFont: { size: 12 },
                            padding: 10,
                            cornerRadius: 6,
                            callbacks: {
                                label: function(context) {
                                    return context.raw + '% attendance';
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            },
                            ticks: {
                                callback: function(value) {
                                    return value + '%';
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        });
    </script>
</x-layouts.app>