import React from 'react';
import { Head } from '@inertiajs/react';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Button } from '@/components/ui/button';

interface Stats {
    service_schedules: number;
    special_events: number;
    devotionals: number;
    organization_members: number;
    sick_members: number;
    secretariat_items: number;
    financial_records: number;
    total_users: number;
}

interface RecentItem {
    id: number;
    title: string;
    created_at: string;
}

interface Props {
    stats: Stats;
    recent_schedules: RecentItem[];
    recent_events: RecentItem[];
    recent_devotionals: RecentItem[];
    [key: string]: unknown;
}

export default function AdminDashboard({ stats, recent_schedules, recent_events, recent_devotionals }: Props) {
    return (
        <>
            <Head title="Admin Dashboard - Church Community" />
            <div className="min-h-screen bg-gray-50">
                <div className="container mx-auto px-4 py-8">
                    <div className="mb-8">
                        <h1 className="text-3xl font-bold text-gray-900 mb-2">
                            🔧 Admin Dashboard
                        </h1>
                        <p className="text-gray-600">
                            Manage your church community content and data
                        </p>
                        <div className="mt-4">
                            <Button asChild variant="outline">
                                <a href="/">← Back to Church Home</a>
                            </Button>
                        </div>
                    </div>

                    {/* Stats Grid */}
                    <div className="grid gap-6 md:grid-cols-2 lg:grid-cols-4 mb-8">
                        <Card>
                            <CardHeader className="pb-2">
                                <CardTitle className="text-sm font-medium">📅 Service Schedules</CardTitle>
                            </CardHeader>
                            <CardContent>
                                <div className="text-2xl font-bold">{stats.service_schedules}</div>
                            </CardContent>
                        </Card>
                        <Card>
                            <CardHeader className="pb-2">
                                <CardTitle className="text-sm font-medium">✨ Special Events</CardTitle>
                            </CardHeader>
                            <CardContent>
                                <div className="text-2xl font-bold">{stats.special_events}</div>
                            </CardContent>
                        </Card>
                        <Card>
                            <CardHeader className="pb-2">
                                <CardTitle className="text-sm font-medium">📖 Devotionals</CardTitle>
                            </CardHeader>
                            <CardContent>
                                <div className="text-2xl font-bold">{stats.devotionals}</div>
                            </CardContent>
                        </Card>
                        <Card>
                            <CardHeader className="pb-2">
                                <CardTitle className="text-sm font-medium">💙 Sick Members</CardTitle>
                            </CardHeader>
                            <CardContent>
                                <div className="text-2xl font-bold">{stats.sick_members}</div>
                            </CardContent>
                        </Card>
                        <Card>
                            <CardHeader className="pb-2">
                                <CardTitle className="text-sm font-medium">👥 Organization</CardTitle>
                            </CardHeader>
                            <CardContent>
                                <div className="text-2xl font-bold">{stats.organization_members}</div>
                            </CardContent>
                        </Card>
                        <Card>
                            <CardHeader className="pb-2">
                                <CardTitle className="text-sm font-medium">📋 Secretariat</CardTitle>
                            </CardHeader>
                            <CardContent>
                                <div className="text-2xl font-bold">{stats.secretariat_items}</div>
                            </CardContent>
                        </Card>
                        <Card>
                            <CardHeader className="pb-2">
                                <CardTitle className="text-sm font-medium">💰 Financial Records</CardTitle>
                            </CardHeader>
                            <CardContent>
                                <div className="text-2xl font-bold">{stats.financial_records}</div>
                            </CardContent>
                        </Card>
                        <Card>
                            <CardHeader className="pb-2">
                                <CardTitle className="text-sm font-medium">👤 Total Users</CardTitle>
                            </CardHeader>
                            <CardContent>
                                <div className="text-2xl font-bold">{stats.total_users}</div>
                            </CardContent>
                        </Card>
                    </div>

                    {/* Management Sections */}
                    <div className="grid gap-6 lg:grid-cols-2 mb-8">
                        <Card>
                            <CardHeader>
                                <CardTitle>📅 Service Schedule Management</CardTitle>
                                <CardDescription>
                                    Manage weekly services and group meetings
                                </CardDescription>
                            </CardHeader>
                            <CardContent>
                                <div className="space-y-2 mb-4">
                                    {recent_schedules.slice(0, 3).map((schedule) => (
                                        <div key={schedule.id} className="text-sm text-gray-600">
                                            • {schedule.title}
                                        </div>
                                    ))}
                                </div>
                                <Button asChild size="sm">
                                    <a href="/admin/service-schedules">Manage Schedules</a>
                                </Button>
                            </CardContent>
                        </Card>

                        <Card>
                            <CardHeader>
                                <CardTitle>✨ Special Events</CardTitle>
                                <CardDescription>
                                    Manage special church events and ceremonies
                                </CardDescription>
                            </CardHeader>
                            <CardContent>
                                <div className="space-y-2 mb-4">
                                    {recent_events.slice(0, 3).map((event) => (
                                        <div key={event.id} className="text-sm text-gray-600">
                                            • {event.title}
                                        </div>
                                    ))}
                                </div>
                                <Button asChild size="sm" variant="outline">
                                    <a href="#">Manage Events (Coming Soon)</a>
                                </Button>
                            </CardContent>
                        </Card>

                        <Card>
                            <CardHeader>
                                <CardTitle>📖 Devotionals</CardTitle>
                                <CardDescription>
                                    Create and manage weekly devotionals
                                </CardDescription>
                            </CardHeader>
                            <CardContent>
                                <div className="space-y-2 mb-4">
                                    {recent_devotionals.slice(0, 3).map((devotional) => (
                                        <div key={devotional.id} className="text-sm text-gray-600">
                                            • {devotional.title}
                                        </div>
                                    ))}
                                </div>
                                <Button asChild size="sm" variant="outline">
                                    <a href="#">Manage Devotionals (Coming Soon)</a>
                                </Button>
                            </CardContent>
                        </Card>

                        <Card>
                            <CardHeader>
                                <CardTitle>💙 Diakonia Ministry</CardTitle>
                                <CardDescription>
                                    Manage sick members and care information
                                </CardDescription>
                            </CardHeader>
                            <CardContent>
                                <p className="text-sm text-gray-600 mb-4">
                                    Track and update member care needs
                                </p>
                                <Button asChild size="sm" variant="outline">
                                    <a href="#">Manage Diakonia (Coming Soon)</a>
                                </Button>
                            </CardContent>
                        </Card>

                        <Card>
                            <CardHeader>
                                <CardTitle>📋 Secretariat</CardTitle>
                                <CardDescription>
                                    Manage announcements and secretariat items
                                </CardDescription>
                            </CardHeader>
                            <CardContent>
                                <p className="text-sm text-gray-600 mb-4">
                                    Birthdays, new members, council decisions
                                </p>
                                <Button asChild size="sm" variant="outline">
                                    <a href="#">Manage Secretariat (Coming Soon)</a>
                                </Button>
                            </CardContent>
                        </Card>

                        <Card>
                            <CardHeader>
                                <CardTitle>💰 Financial Records</CardTitle>
                                <CardDescription>
                                    Manage financial receipts and donations
                                </CardDescription>
                            </CardHeader>
                            <CardContent>
                                <p className="text-sm text-gray-600 mb-4">
                                    Track offerings, donations, and special funds
                                </p>
                                <Button asChild size="sm" variant="outline">
                                    <a href="#">Manage Finances (Coming Soon)</a>
                                </Button>
                            </CardContent>
                        </Card>
                    </div>

                    <Card>
                        <CardHeader>
                            <CardTitle>🚀 Quick Actions</CardTitle>
                            <CardDescription>
                                Common administrative tasks
                            </CardDescription>
                        </CardHeader>
                        <CardContent>
                            <div className="grid gap-4 md:grid-cols-3">
                                <Button asChild>
                                    <a href="/admin/service-schedules/create">➕ Add Service Schedule</a>
                                </Button>
                                <Button asChild variant="outline">
                                    <a href="#">➕ Add Special Event</a>
                                </Button>
                                <Button asChild variant="outline">
                                    <a href="#">➕ Add Devotional</a>
                                </Button>
                            </div>
                        </CardContent>
                    </Card>
                </div>
            </div>
        </>
    );
}