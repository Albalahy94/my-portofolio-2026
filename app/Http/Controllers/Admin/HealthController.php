<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HealthController extends Controller
{
    public function index()
    {
        // Disk Usage
        $drive = substr(base_path(), 0, 3);
        $diskTotal = @disk_total_space($drive) ?: 0;
        $diskFree = @disk_free_space($drive) ?: 0;
        $diskUsed = $diskTotal - $diskFree;
        $diskPercentage = $diskTotal > 0 ? round(($diskUsed / $diskTotal) * 100, 2) : 0;

        // RAM Usage (Windows specific)
        $freeMem = 0;
        $totalMem = 0;
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $mem = shell_exec('wmic OS get FreePhysicalMemory,TotalVisibleMemorySize /Value');
            if ($mem) {
                preg_match('/FreePhysicalMemory=(\d+)/', $mem, $freeMatch);
                preg_match('/TotalVisibleMemorySize=(\d+)/', $mem, $totalMatch);
                if (isset($freeMatch[1]) && isset($totalMatch[1])) {
                    $freeMem = $freeMatch[1] * 1024; // KB to B
                    $totalMem = $totalMatch[1] * 1024; // KB to B
                }
            }
        }

        $ramUsed = $totalMem - $freeMem;
        $ramPercentage = $totalMem > 0 ? round(($ramUsed / $totalMem) * 100, 2) : 0;

        // CPU Load (Windows)
        $cpuLoad = 0;
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $load = shell_exec('wmic cpu get loadpercentage /Value');
            preg_match('/LoadPercentage=(\d+)/', $load, $matches);
            $cpuLoad = $matches[1] ?? 0;
        }

        $stats = [
            'disk' => [
                'total' => $this->formatBytes($diskTotal),
                'used' => $this->formatBytes($diskUsed),
                'free' => $this->formatBytes($diskFree),
                'percentage' => $diskPercentage
            ],
            'ram' => [
                'total' => $this->formatBytes($totalMem),
                'used' => $this->formatBytes($ramUsed),
                'free' => $this->formatBytes($freeMem),
                'percentage' => $ramPercentage
            ],
            'cpu' => [
                'load' => $cpuLoad
            ]
        ];

        return view('admin.health', compact('stats'));
    }

    public function clearCache()
    {
        try {
            \Illuminate\Support\Facades\Artisan::call('optimize:clear');
            return redirect()->back()->with('success', __('System cache cleared successfully!'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', __('Failed to clear cache: ') . $e->getMessage());
        }
    }

    private function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $bytes /= (1 << (10 * $pow));
        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}
