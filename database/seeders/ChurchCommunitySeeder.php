<?php

namespace Database\Seeders;

use App\Models\ServiceSchedule;
use App\Models\SpecialEvent;
use App\Models\Devotional;
use App\Models\OrganizationStructure;
use App\Models\SickMember;
use App\Models\SecretariatItem;
use App\Models\FinancialRecord;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ChurchCommunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@church.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create member user
        User::create([
            'name' => 'Member User',
            'email' => 'member@church.com',
            'password' => Hash::make('password'),
            'role' => 'member',
        ]);

        // Service Schedules
        ServiceSchedule::create([
            'title' => 'Sunday Morning Worship',
            'description' => 'Main Sunday service with communion',
            'type' => 'sunday',
            'location' => 'Main Sanctuary',
            'scheduled_at' => now()->next('Sunday')->setTime(10, 0),
            'is_active' => true,
        ]);

        ServiceSchedule::create([
            'title' => 'Youth Fellowship',
            'description' => 'Weekly youth gathering and worship',
            'type' => 'youth',
            'location' => 'Youth Hall',
            'scheduled_at' => now()->next('Friday')->setTime(19, 0),
            'is_active' => true,
        ]);

        ServiceSchedule::create([
            'title' => 'Women\'s Fellowship Meeting',
            'description' => 'Monthly women\'s fellowship and bible study',
            'type' => 'womens',
            'location' => 'Fellowship Hall',
            'scheduled_at' => now()->addWeek()->next('Saturday')->setTime(14, 0),
            'is_active' => true,
        ]);

        // Special Events
        SpecialEvent::create([
            'title' => 'Holy Communion Service',
            'description' => 'Monthly communion service',
            'type' => 'communion',
            'location' => 'Main Sanctuary',
            'event_date' => now()->addWeeks(2)->next('Sunday')->setTime(10, 0),
            'requirements' => 'Baptized members only',
            'is_active' => true,
        ]);

        SpecialEvent::create([
            'title' => 'Baptism Service',
            'description' => 'Baptism for new believers',
            'type' => 'baptism',
            'location' => 'Church Garden Pool',
            'event_date' => now()->addMonth()->next('Sunday')->setTime(15, 0),
            'requirements' => 'Pre-baptism class completion required',
            'is_active' => true,
        ]);

        // Devotionals
        Devotional::create([
            'title' => 'Walking in Faith',
            'scripture_reference' => 'Hebrews 11:1-6',
            'content' => 'Faith is the substance of things hoped for, the evidence of things not seen. Today, let us reflect on what it means to walk by faith and not by sight. In our daily challenges, we are called to trust in God\'s promises even when we cannot see the outcome. Faith is not blind belief, but confident trust in God\'s character and His word. As we navigate through uncertainties, may we remember that our faith in God is the foundation that keeps us grounded and gives us hope for tomorrow.',
            'devotional_date' => now()->toDateString(),
            'author' => 'Pastor John Smith',
            'is_published' => true,
        ]);

        // Organization Structure
        OrganizationStructure::create([
            'position' => 'Senior Pastor',
            'name' => 'Rev. John Smith',
            'phone' => '+62 812 3456 7890',
            'email' => 'pastor@church.com',
            'department' => 'leadership',
            'order' => 1,
            'is_active' => true,
        ]);

        OrganizationStructure::create([
            'position' => 'Youth Pastor',
            'name' => 'David Wilson',
            'phone' => '+62 813 4567 8901',
            'email' => 'youth@church.com',
            'department' => 'youth',
            'order' => 1,
            'is_active' => true,
        ]);

        OrganizationStructure::create([
            'position' => 'Diakonia Coordinator',
            'name' => 'Sarah Johnson',
            'phone' => '+62 814 5678 9012',
            'email' => 'diakonia@church.com',
            'department' => 'diakonia',
            'order' => 1,
            'is_active' => true,
        ]);

        // Sick Members
        SickMember::create([
            'name' => 'Mrs. Mary Anderson',
            'domicile_group' => 'Group A - North',
            'care_location' => 'General Hospital Room 201',
            'illness_description' => 'Post-surgery recovery',
            'care_start_date' => now()->subDays(5)->toDateString(),
            'status' => 'active',
            'notes' => 'Visited by Pastor John on Monday',
        ]);

        SickMember::create([
            'name' => 'Mr. Robert Chen',
            'domicile_group' => 'Group C - East',
            'care_location' => 'Home Care',
            'illness_description' => 'Flu recovery',
            'care_start_date' => now()->subDays(3)->toDateString(),
            'status' => 'active',
            'notes' => 'Meals provided by fellowship group',
        ]);

        // Secretariat Items
        SecretariatItem::create([
            'title' => 'Birthday Celebrations This Week',
            'content' => 'We celebrate the birthdays of: Maria Santos (Jan 15), Peter Kim (Jan 17), and Lisa Brown (Jan 19). Please join us in wishing them God\'s blessings!',
            'type' => 'birthday',
            'announcement_date' => now()->toDateString(),
            'is_published' => true,
        ]);

        SecretariatItem::create([
            'title' => 'Welcome New Members',
            'content' => 'Please welcome our new church members: The Johnson family who joined us last Sunday after completing their membership class.',
            'type' => 'new_member',
            'announcement_date' => now()->subDays(2)->toDateString(),
            'is_published' => true,
        ]);

        SecretariatItem::create([
            'title' => 'Council Meeting Decision - Building Fund',
            'content' => 'The church council has approved the establishment of a building renovation fund. Goal amount: $50,000 for sanctuary improvements.',
            'type' => 'council_decision',
            'announcement_date' => now()->subWeek()->toDateString(),
            'is_published' => true,
        ]);

        // Financial Records
        FinancialRecord::create([
            'description' => 'Sunday Morning Offering',
            'amount' => 2500000,
            'type' => 'offering',
            'receipt_date' => now()->subDays(1)->toDateString(),
            'is_published' => true,
        ]);

        FinancialRecord::create([
            'description' => 'Building Fund Special Envelope',
            'amount' => 5000000,
            'type' => 'special_envelope',
            'receipt_date' => now()->subDays(3)->toDateString(),
            'donor_name' => 'Anonymous Donor',
            'is_published' => true,
        ]);

        FinancialRecord::create([
            'description' => 'Youth Ministry Donation',
            'amount' => 1000000,
            'type' => 'donation',
            'receipt_date' => now()->subWeek()->toDateString(),
            'donor_name' => 'Smith Family',
            'is_published' => true,
        ]);

        FinancialRecord::create([
            'description' => 'Christmas Special Offering',
            'amount' => 7500000,
            'type' => 'offering',
            'receipt_date' => now()->subMonth()->toDateString(),
            'is_published' => true,
        ]);
    }
}