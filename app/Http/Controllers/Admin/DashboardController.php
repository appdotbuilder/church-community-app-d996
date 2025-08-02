<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceSchedule;
use App\Models\SpecialEvent;
use App\Models\Devotional;
use App\Models\OrganizationStructure;
use App\Models\SickMember;
use App\Models\SecretariatItem;
use App\Models\FinancialRecord;
use App\Models\User;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $stats = [
            'service_schedules' => ServiceSchedule::count(),
            'special_events' => SpecialEvent::count(),
            'devotionals' => Devotional::count(),
            'organization_members' => OrganizationStructure::count(),
            'sick_members' => SickMember::active()->count(),
            'secretariat_items' => SecretariatItem::count(),
            'financial_records' => FinancialRecord::count(),
            'total_users' => User::count(),
        ];

        $recentSchedules = ServiceSchedule::latest()->limit(5)->get();
        $recentEvents = SpecialEvent::latest()->limit(5)->get();
        $recentDevotionals = Devotional::latest()->limit(5)->get();

        return Inertia::render('admin/dashboard', [
            'stats' => $stats,
            'recent_schedules' => $recentSchedules,
            'recent_events' => $recentEvents,
            'recent_devotionals' => $recentDevotionals,
        ]);
    }
}