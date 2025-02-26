<div>
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <h2 class="text-2xl font-bold mb-4">اختصر روابطك</h2>
        
        <form wire:submit.prevent="createShortUrl" class="space-y-4">
            <div>
                <label for="originalUrl" class="block text-sm font-medium text-gray-700 mb-1">ادخل رابطك</label>
                <input 
                    type="url" 
                    id="originalUrl" 
                    wire:model="originalUrl" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="https://example.com/very/long/url/that/needs/shortening"
                    required
                >
                @error('originalUrl') 
                    <span class="text-red-500 text-sm">{{ $message }}</span> 
                @enderror
            </div>
            
            <button 
                type="submit" 
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
                تقصير الرابط
            </button>
        </form>
    
            @if ($shortCode)
                <div class="mt-2 flex items-center space-x-2">
                    <input 
                        type="text" 
                        value="{{ url('/s/' . $shortCode) }}" 
                        class="flex-1 px-3 py-2 border border-gray-300 rounded-md bg-gray-50" 
                        readonly
                        id="shortUrlInput"
                    >
                </div>
            @endif
        
    </div>
    
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold mb-4">روابطك</h2>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">الرابط الأصلي</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">الرابط القصير</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">عدد الزيارات</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($shortUrls as $url)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-blue-600 truncate max-w-xs">
                                    <a target="_blank" href="{{ $url->original_url }}">{{ $url->original_url }}</a>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-blue-600"> 
                                    <a target="_blank" href="{{ $url->short_url }}">{{ $url->short_url }}</a>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $url->clicks }}</div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">
                                لا يوجد روابط حتى الآن
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-4">
            {{ $shortUrls->links() }}
        </div>
    </div>

</div>