<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crop Forecast Admin Panel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Form to Add New Crop -->
                <form action="{{ route('crop.store') }}" method="POST" class="mb-6 grid grid-cols-2 gap-4">
                    @csrf
                    <div class="col-span-2 sm:col-span-1">
                        <label for="crop_name" class="block text-sm font-medium text-gray-700">Name of the Crop</label>
                        <select name="crop_name" id="crop_name" class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" required>
                            <option value="">Select Crop Name</option>
                            <option value="Beans">Beans</option>
                            <option value="Beet Roots">Beet Roots</option>
                            <option value="Bitter Gourd">Bitter Gourd</option>
                            <option value="Brinjal">Brinjal</option>
                            <option value="Cabbage">Cabbage</option>
                            <option value="Capsicum">Capsicum</option>
                            <option value="Carrot">Carrot</option>
                            <option value="Cucumber">Cucumber</option>
                            <option value="Leeks">Leeks</option>
                            <option value="Long Bean">Long Bean</option>
                            <option value="Luffa">Luffa</option>
                            <option value="Okra">Okra</option>
                            <option value="Pumpkin">Pumpkin</option>
                            <option value="Raddish">Raddish</option>
                            <option value="Snake Gourd">Snake Gourd</option>
                            <option value="Tomato">Tomato</option>
                        </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="recommended_extent" class="block text-sm font-medium text-gray-700">Recommended Extent</label>
                        <input type="number" name="recommended_extent" id="recommended_extent" step="0.01" class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" required disabled>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="cultivated_within_two_weeks" class="block text-sm font-medium text-gray-700">Cultivated within these two weeks</label>
                        <input type="number" name="cultivated_within_two_weeks" id="cultivated_within_two_weeks" step="0.01" class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" required>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="balance_extent" class="block text-sm font-medium text-gray-700">Balance Extent</label>
                        <input type="number" name="balance_extent" id="balance_extent" step="0.01" class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" required disabled>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="colour" class="block text-sm font-medium text-gray-700">Colour</label>
                        <select name="colour" id="colour" class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" required>
                            <option value="Red">Red</option>
                            <option value="Orange">Orange</option>
                            <option value="Yellow">Yellow</option>
                            <option value="Lime Green">Lime Green</option>
                            <option value="Green">Green</option>
                        </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="recommendations" class="block text-sm font-medium text-gray-700">Recommendations</label>
                        <select name="recommendations" id="recommendations" class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" required disabled>
                            <option value="Worst">Worst</option>
                            <option value="Bad">Bad</option>
                            <option value="Good">Good</option>
                            <option value="Better">Better</option>
                            <option value="Best">Best</option>
                            
                            
                            
                        </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="duration_from" class="block text-sm font-medium text-gray-700">Duration From</label>
                        <input type="date" name="duration_from" id="duration_from" class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" required>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="duration_to" class="block text-sm font-medium text-gray-700">Duration To</label>
                        <input type="date" name="duration_to" id="duration_to" class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" required>
                    </div>
                    <div class="col-span-2 flex justify-end">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 disabled:opacity-25 transition">Add Crop</button>
                    </div>
                </form>

                <!-- Table to Display Crops -->
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Crop Name</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Recommended Extent</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cultivated Extent</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Balance Extent</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Colour</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Recommendations</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Duration From</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Duration To</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($crops as $crop)
                                        <tr class="@if($crop->colour == 'Lime Green') bg-green-500
                                                    @elseif($crop->colour == 'Green') bg-green-700
                                                    @elseif($crop->colour == 'Yellow') bg-yellow-300
                                                    @elseif($crop->colour == 'Red') bg-red-600
                                                    @elseif($crop->colour == 'Orange') bg-orange-500
                                                    @endif">
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $crop->crop_name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $crop->recommended_extent }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $crop->cultivated_within_two_weeks }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $crop->balance_extent }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $crop->colour }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $crop->recommendations }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $crop->duration_from }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $crop->duration_to }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="{{ route('crop.edit', $crop->crop_id) }}" class="inline-block bg-black text-white px-4 py-2 rounded-md font-bold transition duration-300 ease-in-out hover:bg-gray-800 mr-2">Edit</a>
                                                <form action="{{ route('crop.destroy', $crop->crop_id) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-block bg-black text-white px-4 py-2 rounded-md font-bold transition duration-300 ease-in-out hover:bg-gray-800 focus:outline-none">Delete</button>
                                                </form>
                                            </td>



                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function calculateBalanceExtent() {
            var recommendedExtent = parseFloat(document.getElementById('recommended_extent').value);
            var cultivatedWithinTwoWeeks = parseFloat(document.getElementById('cultivated_within_two_weeks').value);
            var balanceExtentInput = document.getElementById('balance_extent');

            // Calculate balance_extent
            var balanceExtent = recommendedExtent - cultivatedWithinTwoWeeks;

            // Set the calculated balance_extent value
            balanceExtentInput.value = isNaN(balanceExtent) ? '' : balanceExtent.toFixed(2);
        }

        // Event listeners for recommended_extent and cultivated_within_two_weeks fields
        document.getElementById('recommended_extent').addEventListener('input', calculateBalanceExtent);
        document.getElementById('cultivated_within_two_weeks').addEventListener('input', calculateBalanceExtent);

        // Event listener for color change to update recommendations
        document.getElementById('colour').addEventListener('change', function() {
            // Your existing code for updating recommendations based on color
        });

        document.getElementById('colour').addEventListener('change', function() {
            var color = this.value;
            var recommendationsSelect = document.getElementById('recommendations');

            // Set default value
            var recommendation = 'Better';

            // Set recommendation based on color
            switch(color) {
                case 'Green':
                    recommendation = 'Best';
                    break;
                case 'Lime Green':
                    recommendation = 'Better';
                    break;
                case 'Yellow':
                    recommendation = 'Good';
                    break;
                case 'Orange':
                    recommendation = 'Bad';
                    break;
                case 'Red':
                    recommendation = 'Worst';
                    break;
            }

            // Set the selected recommendation
            for(var i = 0; i < recommendationsSelect.options.length; i++) {
                if(recommendationsSelect.options[i].value === recommendation) {
                    recommendationsSelect.selectedIndex = i;
                    break;
                }
            }
        });

        document.getElementById('crop_name').addEventListener('change', function() {
            var cropName = this.value;
            var recommendedExtentInput = document.getElementById('recommended_extent');

            // Object to map crop names to recommended extents
            var recommendedExtents = {
                'Beans': 350.00,
                'Beet Roots': 100.00,
                'Bitter Gourd': 135.00,
                'Brinjal': 450.00,
                'Cabbage': 175.00,
                'Capsicum': 140.00,
                'Carrot': 125.00,
                'Cucumber': 125.00,
                'Leeks': 80.00,
                'Long Bean': 325.00,
                'Luffa': 125.00,
                'Okra': 250.00,
                'Pumpkin': 275.00,
                'Raddish': 100.00,
                'Snake Gourd': 140.00,
                'Tomato': 215.00,
                // Add more crop names and recommended extents as needed
            };

            // Set recommended extent based on selected crop name
            if (recommendedExtents.hasOwnProperty(cropName)) {
                recommendedExtentInput.value = recommendedExtents[cropName];
            } else {
                recommendedExtentInput.value = ''; // Clear value if crop name not found
            }
        });
    </script>
</x-app-layout>

