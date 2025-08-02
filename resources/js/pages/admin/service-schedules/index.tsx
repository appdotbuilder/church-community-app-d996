import React from 'react';
import { Head } from '@inertiajs/react';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Button } from '@/components/ui/button';
import { Badge } from '@/components/ui/badge';

interface ServiceSchedule {
    id: number;
    title: string;
    description?: string;
    type: string;
    location?: string;
    scheduled_at: string;
    is_active: boolean;
    created_at: string;
    updated_at: string;
}

interface PaginationLinks {
    url?: string;
    label: string;
    active: boolean;
}

interface Pagination {
    current_page: number;
    data: ServiceSchedule[];
    first_page_url: string;
    from: number;
    last_page: number;
    last_page_url: string;
    links: PaginationLinks[];
    next_page_url?: string;
    path: string;
    per_page: number;
    prev_page_url?: string;
    to: number;
    total: number;
}

interface Props {
    schedules: Pagination;
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
};

export default function ServiceSchedulesIndex({ schedules }: Props) {
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

    return (
        <>
            <Head title="Service Schedules - Admin" />
            <div className="min-h-screen bg-gray-50">
                <div className="container mx-auto px-4 py-8">
                    <div className="mb-8">
                        <div className="flex justify-between items-center">
                            <div>
                                <h1 className="text-3xl font-bold text-gray-900 mb-2">
                                    📅 Service Schedules
                                </h1>
                                <p className="text-gray-600">
                                    Manage church service schedules and meetings
                                </p>
                            </div>
                            <div className="flex gap-2">
                                <Button asChild variant="outline">
                                    <a href="/admin">← Back to Dashboard</a>
                                </Button>
                                <Button asChild>
                                    <a href="/admin/service-schedules/create">➕ Add Schedule</a>
                                </Button>
                            </div>
                        </div>
                    </div>

                    <Card>
                        <CardHeader>
                            <CardTitle>All Service Schedules</CardTitle>
                            <CardDescription>
                                Total: {schedules.total} schedules
                            </CardDescription>
                        </CardHeader>
                        <CardContent>
                            <div className="space-y-4">
                                {schedules.data.map((schedule) => (
                                    <div key={schedule.id} className="border rounded-lg p-4 hover:bg-gray-50">
                                        <div className="flex justify-between items-start">
                                            <div className="flex-1">
                                                <div className="flex items-center gap-2 mb-2">
                                                    <h3 className="font-semibold text-lg">{schedule.title}</h3>
                                                    <Badge variant={schedule.is_active ? 'default' : 'secondary'}>
                                                        {schedule.is_active ? 'Active' : 'Inactive'}
                                                    </Badge>
                                                </div>
                                                <p className="text-sm text-gray-600 mb-2">
                                                    {typeLabels[schedule.type as keyof typeof typeLabels]}
                                                </p>
                                                {schedule.description && (
                                                    <p className="text-gray-700 mb-2">{schedule.description}</p>
                                                )}
                                                <div className="text-sm text-gray-500">
                                                    📍 {schedule.location || 'No location specified'} • 
                                                    📅 {formatDate(schedule.scheduled_at)}
                                                </div>
                                            </div>
                                            <div className="flex gap-2 ml-4">
                                                <Button asChild size="sm" variant="outline">
                                                    <a href={`/admin/service-schedules/${schedule.id}`}>View</a>
                                                </Button>
                                                <Button asChild size="sm" variant="outline">
                                                    <a href={`/admin/service-schedules/${schedule.id}/edit`}>Edit</a>
                                                </Button>
                                            </div>
                                        </div>
                                    </div>
                                ))}

                                {schedules.data.length === 0 && (
                                    <div className="text-center py-8 text-gray-500">
                                        <p className="mb-4">No service schedules found.</p>
                                        <Button asChild>
                                            <a href="/admin/service-schedules/create">Create your first schedule</a>
                                        </Button>
                                    </div>
                                )}
                            </div>

                            {/* Pagination */}
                            {schedules.total > schedules.per_page && (
                                <div className="mt-6 flex justify-center">
                                    <div className="flex gap-2">
                                        {schedules.links.map((link, index) => (
                                            <Button
                                                key={index}
                                                asChild={!!link.url}
                                                variant={link.active ? 'default' : 'outline'}
                                                size="sm"
                                                disabled={!link.url}
                                            >
                                                {link.url ? (
                                                    <a href={link.url} dangerouslySetInnerHTML={{ __html: link.label }} />
                                                ) : (
                                                    <span dangerouslySetInnerHTML={{ __html: link.label }} />
                                                )}
                                            </Button>
                                        ))}
                                    </div>
                                </div>
                            )}
                        </CardContent>
                    </Card>
                </div>
            </div>
        </>
    );
}