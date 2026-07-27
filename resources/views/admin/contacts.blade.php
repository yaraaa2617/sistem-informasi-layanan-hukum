<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            📨 Pesan Kontak <span class="text-sm text-gray-500">({{ $contacts->total() }})</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto">
            @if($contacts->count() > 0)
                <div class="bg-white shadow-2xl rounded-xl overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gradient-to-r from-blue-50 to-indigo-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase">Nama</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase">Email</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase">Subjek</th>
                                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase">Waktu</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($contacts as $contact)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-gray-900">{{ $contact->name }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="mailto:{{ $contact->email }}" class="text-blue-600 hover:underline font-mono text-sm">
                                            {{ $contact->email }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900">{{ Str::limit($contact->subject, 40) }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $contact->created_at->diffForHumans() }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="px-6 py-4 bg-gray-50">
                        {{ $contacts->appends(request()->query())->links() }}
                    </div>
                </div>
            @else
                <div class="text-center py-20 bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl">
                    <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-inbox text-3xl text-gray-400"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-700 mb-2">Belum Ada Pesan</h3>
                    <p class="text-gray-500 text-lg">Pesan kontak dari user akan muncul di sini</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
