import React, { useState } from 'react';
import { Head, router } from '@inertiajs/react';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Button } from '@/components/ui/button';



const typeOptions = [
    { value: 'sunday', label: '🙏 Sunday Service' },
    { value: 'group', label: '👥 Group Service' },
    { value: 'youth', label: '🌟 Youth Ministry' },
    { value: 'children', label: '👶 Children/Sunday School' },
    { value: 'womens', label: '🌸 Women\'s Fellowship' },
    { value: 'mens', label: '💪 Men\'s Fellowship' },
    { value: 'elderly', label: '👴 Elderly Fellowship' },
];

export default function CreateServiceSchedule() {
    const [formData, setFormData] = useState({
        title: '',
        description: '',
        type: 'sunday',
        location: '',
        scheduled_at: '',
        is_active: true,
    });

    const [errors, setErrors] = useState<{[key: string]: string}>({});
    const [processing, setProcessing] = useState(false);

    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        setProcessing(true);

        router.post('/admin/service-schedules', formData, {
            onSuccess: () => {
                // Will redirect automatically
            },
            onError: (errors) => {
                setErrors(errors);
                setProcessing(false);
            },
            onFinish: () => {
                setProcessing(false);
            }
        });
    };

    const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLTextAreaElement | HTMLSelectElement>) => {
        const { name, value, type } = e.target;
        setFormData(prev => ({
            ...prev,
            [name]: type === 'checkbox' ? (e.target as HTMLInputElement).checked : value
        }));
    };

    return (
        <>
            <Head title="Create Service Schedule - Admin" />
            <div className="min-h-screen bg-gray-50">
                <div className="container mx-auto px-4 py-8">
                    <div className="mb-8">
                        <div className="flex justify-between items-center">
                            <div>
                                <h1 className="text-3xl font-bold text-gray-900 mb-2">
                                    ➕ Create Service Schedule
                                </h1>
                                <p className="text-gray-600">
                                    Add a new service schedule or meeting
                                </p>
                            </div>
                            <Button asChild variant="outline">
                                <a href="/admin/service-schedules">← Back to Schedules</a>
                            </Button>
                        </div>
                    </div>

                    <Card className="max-w-2xl">
                        <CardHeader>
                            <CardTitle>Schedule Details</CardTitle>
                        </CardHeader>
                        <CardContent>
                            <form onSubmit={handleSubmit} className="space-y-6">
                                <div>
                                    <label className="block text-sm font-medium text-gray-700 mb-2">
                                        Title *
                                    </label>
                                    <input
                                        type="text"
                                        name="title"
                                        value={formData.title}
                                        onChange={handleChange}
                                        className="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        placeholder="e.g., Sunday Morning Worship"
                                        required
                                    />
                                    {errors.title && (
                                        <p className="text-red-600 text-sm mt-1">{errors.title}</p>
                                    )}
                                </div>

                                <div>
                                    <label className="block text-sm font-medium text-gray-700 mb-2">
                                        Service Type *
                                    </label>
                                    <select
                                        name="type"
                                        value={formData.type}
                                        onChange={handleChange}
                                        className="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        required
                                    >
                                        {typeOptions.map((option) => (
                                            <option key={option.value} value={option.value}>
                                                {option.label}
                                            </option>
                                        ))}
                                    </select>
                                    {errors.type && (
                                        <p className="text-red-600 text-sm mt-1">{errors.type}</p>
                                    )}
                                </div>

                                <div>
                                    <label className="block text-sm font-medium text-gray-700 mb-2">
                                        Description
                                    </label>
                                    <textarea
                                        name="description"
                                        value={formData.description}
                                        onChange={handleChange}
                                        rows={3}
                                        className="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        placeholder="Brief description of the service..."
                                    />
                                    {errors.description && (
                                        <p className="text-red-600 text-sm mt-1">{errors.description}</p>
                                    )}
                                </div>

                                <div>
                                    <label className="block text-sm font-medium text-gray-700 mb-2">
                                        Location
                                    </label>
                                    <input
                                        type="text"
                                        name="location"
                                        value={formData.location}
                                        onChange={handleChange}
                                        className="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        placeholder="e.g., Main Sanctuary, Youth Hall"
                                    />
                                    {errors.location && (
                                        <p className="text-red-600 text-sm mt-1">{errors.location}</p>
                                    )}
                                </div>

                                <div>
                                    <label className="block text-sm font-medium text-gray-700 mb-2">
                                        Date & Time *
                                    </label>
                                    <input
                                        type="datetime-local"
                                        name="scheduled_at"
                                        value={formData.scheduled_at}
                                        onChange={handleChange}
                                        className="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        required
                                    />
                                    {errors.scheduled_at && (
                                        <p className="text-red-600 text-sm mt-1">{errors.scheduled_at}</p>
                                    )}
                                </div>

                                <div className="flex items-center">
                                    <input
                                        type="checkbox"
                                        name="is_active"
                                        checked={formData.is_active}
                                        onChange={handleChange}
                                        className="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                    />
                                    <label className="ml-2 text-sm text-gray-700">
                                        Active (visible to members)
                                    </label>
                                </div>

                                <div className="flex gap-4 pt-4">
                                    <Button type="submit" disabled={processing}>
                                        {processing ? 'Creating...' : '✓ Create Schedule'}
                                    </Button>
                                    <Button asChild variant="outline">
                                        <a href="/admin/service-schedules">Cancel</a>
                                    </Button>
                                </div>
                            </form>
                        </CardContent>
                    </Card>
                </div>
            </div>
        </>
    );
}