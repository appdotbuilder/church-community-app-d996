import React from 'react';
import { Head } from '@inertiajs/react';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Badge } from '@/components/ui/badge';

interface ServiceSchedule {
    id: number;
    title: string;
    description?: string;
    type: string;
    location?: string;
    scheduled_at: string;
}

interface SpecialEvent {
    id: number;
    title: string;
    description?: string;
    type: string;
    location?: string;
    event_date: string;
    requirements?: string;
}

interface Devotional {
    id: number;
    title: string;
    scripture_reference: string;
    content: string;
    devotional_date: string;
    author?: string;
}

interface OrganizationMember {
    id: number;
    position: string;
    name: string;
    phone?: string;
    email?: string;
    department: string;
}

interface SickMember {
    id: number;
    name: string;
    domicile_group: string;
    care_location: string;
    illness_description?: string;
    care_start_date: string;
}

interface SecretariatItem {
    id: number;
    title: string;
    content: string;
    type: string;
    announcement_date: string;
}

interface FinancialRecord {
    id: number;
    description: string;
    amount: number;
    type: string;
    receipt_date: string;
    donor_name?: string;
}

interface Props {
    service_schedules?: ServiceSchedule[];
    special_events?: SpecialEvent[];
    latest_devotional?: Devotional;
    organization_structure?: { [key: string]: OrganizationMember[] };
    sick_members?: SickMember[];
    secretariat_items?: { [key: string]: SecretariatItem[] };
    financial_records: FinancialRecord[];
    user_role: 'guest' | 'member' | 'admin';
    [key: string]: unknown;
}

const typeLabels = {
    sunday: '🙏 Sunday Service',
    group: '👥 Group Service',
    youth: '🌟 Youth Ministry',
    children: '👶 Children/Sunday School',
    womens: '🌸 Women\'s Fellowship',
    mens: '💪 Men\'s Fellowship',
    elderly: '👴 Elderly Fellowship',
    communion: '🍞 Holy Communion',
    baptism: '💧 Holy Baptism',
    confession: '✋ Confession of Faith',
    confirmation: '✅ Confirmation',
    marriage: '💒 Marriage Blessing',
    birthday: '🎂 Birthday Greetings',
    new_member: '🆕 New Members',
    intern: '📝 Interns',
    diakonia_commission: '💙 Diakonia Commission',
    worship_commission: '🎵 Worship Commission',
    special_fund: '💰 Special Fund',
    council_decision: '📋 Council Decisions',
    offering: '💝 Offering',
    special_envelope: '📧 Special Envelope',
    donation: '🎁 Individual Donation'
};

const departmentLabels = {
    leadership: '👑 Leadership',
    diakonia: '💙 Diakonia',
    worship: '🎵 Worship',
    youth: '🌟 Youth',
    children: '👶 Children',
    womens: '🌸 Women\'s',
    mens: '💪 Men\'s',
    elderly: '👴 Elderly'
};

export default function Welcome({
    service_schedules,
    special_events,
    latest_devotional,
    organization_structure,
    sick_members,
    secretariat_items,
    financial_records,
    user_role
}: Props) {
    const formatDate = (dateString: string) => {
        return new Date(dateString).toLocaleDateString('id-ID', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        });
    };

    const formatCurrency = (amount: number) => {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(amount);
    };

    if (user_role === 'guest') {
        return (
            <>
                <Head title="Church Community - Welcome" />
                <div className="min-h-screen bg-gradient-to-br from-blue-50 to-white">
                    <div className="container mx-auto px-4 py-8">
                        <div className="text-center mb-12">
                            <h1 className="text-4xl font-bold text-blue-900 mb-4">
                                ⛪ Welcome to Our Church Community
                            </h1>
                            <p className="text-xl text-gray-600 mb-8">
                                Connecting hearts, strengthening faith, building community
                            </p>
                            <div className="flex gap-4 justify-center">
                                <Button asChild size="lg">
                                    <a href="/login">🔑 Login</a>
                                </Button>
                                <Button asChild variant="outline" size="lg">
                                    <a href="/register">📝 Register</a>
                                </Button>
                            </div>
                        </div>

                        <div className="grid gap-6 md:grid-cols-2 lg:grid-cols-3 mb-12">
                            <Card>
                                <CardHeader>
                                    <CardTitle className="flex items-center gap-2">
                                        📅 Weekly Services
                                    </CardTitle>
                                </CardHeader>
                                <CardContent>
                                    <p>Join us for Sunday worship and group services throughout the week</p>
                                </CardContent>
                            </Card>
                            <Card>
                                <CardHeader>
                                    <CardTitle className="flex items-center gap-2">
                                        💙 Diakonia Ministry
                                    </CardTitle>
                                </CardHeader>
                                <CardContent>
                                    <p>Caring for our community members in times of need</p>
                                </CardContent>
                            </Card>
                            <Card>
                                <CardHeader>
                                    <CardTitle className="flex items-center gap-2">
                                        📖 Daily Devotionals
                                    </CardTitle>
                                </CardHeader>
                                <CardContent>
                                    <p>Grow in faith with our weekly spiritual reflections</p>
                                </CardContent>
                            </Card>
                        </div>

                        <Card>
                            <CardHeader>
                                <CardTitle>💰 Financial Reports - Recent Donations</CardTitle>
                                <CardDescription>
                                    Transparency in our community's financial stewardship
                                </CardDescription>
                            </CardHeader>
                            <CardContent>
                                <div className="space-y-4">
                                    {financial_records.map((record) => (
                                        <div key={record.id} className="flex justify-between items-center border-b pb-2">
                                            <div>
                                                <p className="font-medium">{record.description}</p>
                                                <p className="text-sm text-gray-500">
                                                    {typeLabels[record.type as keyof typeof typeLabels]} • {formatDate(record.receipt_date)}
                                                </p>
                                            </div>
                                            <Badge variant="secondary">
                                                {formatCurrency(record.amount)}
                                            </Badge>
                                        </div>
                                    ))}
                                </div>
                            </CardContent>
                        </Card>
                    </div>
                </div>
            </>
        );
    }

    return (
        <>
            <Head title="Church Community - Dashboard" />
            <div className="min-h-screen bg-gradient-to-br from-blue-50 to-white">
                <div className="container mx-auto px-4 py-8">
                    <div className="text-center mb-8">
                        <h1 className="text-4xl font-bold text-blue-900 mb-4">
                            ⛪ Church Community Dashboard
                        </h1>
                        <p className="text-xl text-gray-600">
                            Welcome back! Here's what's happening in our community
                        </p>
                        {user_role === 'admin' && (
                            <div className="mt-4">
                                <Button asChild>
                                    <a href="/admin">🔧 Admin Panel</a>
                                </Button>
                            </div>
                        )}
                    </div>

                    <div className="grid gap-6 lg:grid-cols-2">
                        {/* Service Schedules */}
                        {service_schedules && service_schedules.length > 0 && (
                            <Card>
                                <CardHeader>
                                    <CardTitle>📅 Upcoming Services</CardTitle>
                                </CardHeader>
                                <CardContent>
                                    <div className="space-y-3">
                                        {service_schedules.slice(0, 5).map((schedule) => (
                                            <div key={schedule.id} className="border-l-4 border-blue-500 pl-4">
                                                <h4 className="font-semibold">{schedule.title}</h4>
                                                <p className="text-sm text-gray-600">
                                                    {typeLabels[schedule.type as keyof typeof typeLabels]}
                                                </p>
                                                <p className="text-sm text-gray-500">
                                                    📍 {schedule.location} • {formatDate(schedule.scheduled_at)}
                                                </p>
                                            </div>
                                        ))}
                                    </div>
                                </CardContent>
                            </Card>
                        )}

                        {/* Special Events */}
                        {special_events && special_events.length > 0 && (
                            <Card>
                                <CardHeader>
                                    <CardTitle>✨ Special Events</CardTitle>
                                </CardHeader>
                                <CardContent>
                                    <div className="space-y-3">
                                        {special_events.slice(0, 5).map((event) => (
                                            <div key={event.id} className="border-l-4 border-purple-500 pl-4">
                                                <h4 className="font-semibold">{event.title}</h4>
                                                <p className="text-sm text-gray-600">
                                                    {typeLabels[event.type as keyof typeof typeLabels]}
                                                </p>
                                                <p className="text-sm text-gray-500">
                                                    📍 {event.location} • {formatDate(event.event_date)}
                                                </p>
                                                {event.requirements && (
                                                    <p className="text-sm text-blue-600 mt-1">
                                                        📝 {event.requirements}
                                                    </p>
                                                )}
                                            </div>
                                        ))}
                                    </div>
                                </CardContent>
                            </Card>
                        )}

                        {/* Latest Devotional */}
                        {latest_devotional && (
                            <Card className="lg:col-span-2">
                                <CardHeader>
                                    <CardTitle>📖 Latest Devotional</CardTitle>
                                </CardHeader>
                                <CardContent>
                                    <div className="bg-blue-50 p-6 rounded-lg">
                                        <h3 className="text-xl font-bold text-blue-900 mb-2">
                                            {latest_devotional.title}
                                        </h3>
                                        <p className="text-blue-700 font-semibold mb-3">
                                            📜 {latest_devotional.scripture_reference}
                                        </p>
                                        <p className="text-gray-700 leading-relaxed mb-4">
                                            {latest_devotional.content.substring(0, 300)}...
                                        </p>
                                        <div className="flex justify-between items-center">
                                            <p className="text-sm text-gray-500">
                                                {latest_devotional.author && `✍️ ${latest_devotional.author} • `}
                                                {formatDate(latest_devotional.devotional_date)}
                                            </p>
                                        </div>
                                    </div>
                                </CardContent>
                            </Card>
                        )}

                        {/* Sick Members - Diakonia */}
                        {sick_members && sick_members.length > 0 && (
                            <Card>
                                <CardHeader>
                                    <CardTitle>💙 Diakonia - Members in Care</CardTitle>
                                </CardHeader>
                                <CardContent>
                                    <div className="space-y-3">
                                        {sick_members.slice(0, 5).map((member) => (
                                            <div key={member.id} className="bg-blue-50 p-3 rounded">
                                                <h4 className="font-semibold text-blue-900">{member.name}</h4>
                                                <p className="text-sm text-blue-700">
                                                    🏠 Group: {member.domicile_group}
                                                </p>
                                                <p className="text-sm text-blue-600">
                                                    🏥 Care: {member.care_location}
                                                </p>
                                                <p className="text-xs text-gray-500">
                                                    Since: {new Date(member.care_start_date).toLocaleDateString('id-ID')}
                                                </p>
                                            </div>
                                        ))}
                                    </div>
                                </CardContent>
                            </Card>
                        )}

                        {/* Secretariat Items */}
                        {secretariat_items && Object.keys(secretariat_items).length > 0 && (
                            <Card>
                                <CardHeader>
                                    <CardTitle>📋 Secretariat Updates</CardTitle>
                                </CardHeader>
                                <CardContent>
                                    <div className="space-y-4">
                                        {Object.entries(secretariat_items).map(([type, items]) => (
                                            <div key={type}>
                                                <h4 className="font-semibold text-sm text-gray-700 mb-2">
                                                    {typeLabels[type as keyof typeof typeLabels]}
                                                </h4>
                                                {items.slice(0, 2).map((item) => (
                                                    <div key={item.id} className="ml-4 mb-2 border-l-2 border-gray-200 pl-3">
                                                        <p className="font-medium text-sm">{item.title}</p>
                                                        <p className="text-xs text-gray-500">
                                                            {new Date(item.announcement_date).toLocaleDateString('id-ID')}
                                                        </p>
                                                    </div>
                                                ))}
                                            </div>
                                        ))}
                                    </div>
                                </CardContent>
                            </Card>
                        )}

                        {/* Organization Structure */}
                        {organization_structure && Object.keys(organization_structure).length > 0 && (
                            <Card className="lg:col-span-2">
                                <CardHeader>
                                    <CardTitle>👥 Organization Structure</CardTitle>
                                </CardHeader>
                                <CardContent>
                                    <div className="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                                        {Object.entries(organization_structure).map(([department, members]) => (
                                            <div key={department} className="bg-gray-50 p-4 rounded-lg">
                                                <h4 className="font-bold text-gray-800 mb-3">
                                                    {departmentLabels[department as keyof typeof departmentLabels]}
                                                </h4>
                                                <div className="space-y-2">
                                                    {members.map((member) => (
                                                        <div key={member.id} className="text-sm">
                                                            <p className="font-semibold">{member.name}</p>
                                                            <p className="text-gray-600">{member.position}</p>
                                                            {member.phone && (
                                                                <p className="text-gray-500">📞 {member.phone}</p>
                                                            )}
                                                        </div>
                                                    ))}
                                                </div>
                                            </div>
                                        ))}
                                    </div>
                                </CardContent>
                            </Card>
                        )}

                        {/* Financial Records */}
                        <Card className="lg:col-span-2">
                            <CardHeader>
                                <CardTitle>💰 Recent Financial Records</CardTitle>
                                <CardDescription>
                                    Recent donations and offerings received by the church
                                </CardDescription>
                            </CardHeader>
                            <CardContent>
                                <div className="space-y-3">
                                    {financial_records.slice(0, 10).map((record) => (
                                        <div key={record.id} className="flex justify-between items-center border-b pb-2">
                                            <div>
                                                <p className="font-medium">{record.description}</p>
                                                <p className="text-sm text-gray-500">
                                                    {typeLabels[record.type as keyof typeof typeLabels]} • {formatDate(record.receipt_date)}
                                                    {record.donor_name && ` • 💝 ${record.donor_name}`}
                                                </p>
                                            </div>
                                            <Badge variant="secondary">
                                                {formatCurrency(record.amount)}
                                            </Badge>
                                        </div>
                                    ))}
                                </div>
                            </CardContent>
                        </Card>
                    </div>
                </div>
            </div>
        </>
    );
}