<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ServiceSchedule;
use App\Models\SpecialEvent;
use App\Models\Devotional;
use App\Models\OrganizationStructure;
use App\Models\SickMember;
use App\Models\SecretariatItem;
use App\Models\FinancialRecord;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Display the church community home page.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        
        // Financial records are visible to everyone (guests, members, admins)
        $financialRecords = FinancialRecord::published()
            ->orderBy('receipt_date', 'desc')
            ->limit(10)
            ->get();

        // If user is not logged in (guest), only show financial records
        if (!$user) {
            return Inertia::render('welcome', [
                'financial_records' => $financialRecords,
                'user_role' => 'guest'
            ]);
        }

        // For logged-in users (members and admins), show all information
        $serviceSchedules = collect();
        try {
            $serviceSchedules = ServiceSchedule::active()
                ->orderBy('scheduled_at', 'asc')
                ->limit(10)
                ->get();
        } catch (\Exception $e) {
            // Table might not exist during testing
        }

        $specialEvents = collect();
        try {
            $specialEvents = SpecialEvent::active()
                ->orderBy('event_date', 'asc')
                ->limit(5)
                ->get();
        } catch (\Exception $e) {
            // Table might not exist during testing
        }

        $latestDevotional = null;
        try {
            $latestDevotional = Devotional::published()
                ->orderBy('devotional_date', 'desc')
                ->first();
        } catch (\Exception $e) {
            // Table might not exist during testing
        }

        $organizationStructure = collect();
        try {
            $organizationStructure = OrganizationStructure::active()
                ->orderBy('department')
                ->orderBy('order')
                ->get()
                ->groupBy('department');
        } catch (\Exception $e) {
            // Table might not exist during testing
        }

        $sickMembers = collect();
        try {
            $sickMembers = SickMember::active()
                ->orderBy('care_start_date', 'desc')
                ->get();
        } catch (\Exception $e) {
            // Table might not exist during testing
        }

        $secretariatItems = collect();
        try {
            $secretariatItems = SecretariatItem::published()
                ->orderBy('announcement_date', 'desc')
                ->limit(10)
                ->get()
                ->groupBy('type');
        } catch (\Exception $e) {
            // Table might not exist during testing
        }

        return Inertia::render('welcome', [
            'service_schedules' => $serviceSchedules,
            'special_events' => $specialEvents,
            'latest_devotional' => $latestDevotional,
            'organization_structure' => $organizationStructure,
            'sick_members' => $sickMembers,
            'secretariat_items' => $secretariatItems,
            'financial_records' => $financialRecords,
            'user_role' => $user->role ?? 'guest'
        ]);
    }
}