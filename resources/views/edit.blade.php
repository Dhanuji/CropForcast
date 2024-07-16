<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Crop') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Form to Edit Crop -->
                <form action="{{ route('crop.update', $crop->crop_id) }}" method="POST" class="mb-6">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-2 sm:col-span-1">
                            <label for="crop_name" class="block text-sm font-medium text-gray-700">Name of the Crop</label>
                            <select name="crop_name" id="crop_name" class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" required>
                                <option value="">Select Crop Name</option>
                                <option value="Beans" {{ $crop->crop_name == 'Beans' ? 'selected' : '' }}>Beans</option>
                                <option value="Beet Roots" {{ $crop->crop_name == 'Beet Roots' ? 'selected' : '' }}>Beet Roots</option>
                                <option value="Bitter Gourd" {{ $crop->crop_name == 'Bitter Gourd' ? 'selected' : '' }}>Bitter Gourd</option>
                                <option value="Brinjal" {{ $crop->crop_name == 'Brinjal' ? 'selected' : '' }}>Brinjal</option>
                                <option value="Cabbage" {{ $crop->crop_name == 'Cabbage' ? 'selected' : '' }}>Cabbage</option>
                                <option value="Capsicum" {{ $crop->crop_name == 'Capsicum' ? 'selected' : '' }}>Capsicum</option>
                                <option value="Carrot" {{ $crop->crop_name == 'Carrot' ? 'selected' : '' }}>Carrot</option>
                                <option value="Cucumber" {{ $crop->crop_name == 'Cucumber' ? 'selected' : '' }}>Cucumber</option>
                                <option value="Leeks" {{ $crop->crop_name == 'Leeks' ? 'selected' : '' }}>Leeks</option>
                                <option value="Long Bean" {{ $crop->crop_name == 'Long Bean' ? 'selected' : '' }}>Long Bean</option>
                                <option value="Luffa" {{ $crop->crop_name == 'Luffa' ? 'selected' : '' }}>Luffa</option>
                                <option value="Okra" {{ $crop->crop_name == 'Okra' ? 'selected' : '' }}>Okra</option>
                                <option value="Pumpkin" {{ $crop->crop_name == 'Pumpkin' ? 'selected' : '' }}>Pumpkin</option>
                                <option value="Raddish" {{ $crop->crop_name == 'Raddish' ? 'selected' : '' }}>Raddish</option>
                                <option value="Snake Gourd" {{ $crop->crop_name == 'Snake Gourd' ? 'selected' : '' }}>Snake Gourd</option>
                                <option value="Tomato" {{ $crop->crop_name == 'Tomato' ? 'selected' : '' }}>Tomato</option>
                               </select>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="recommended_extent" class="block text-sm font-medium text-gray-700">Recommended Extent</label>
                            <input type="number" name="recommended_extent" id="recommended_extent" step="0.01" class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" value="{{ $crop->recommended_extent }}" required disabled>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="cultivated_within_two_weeks" class="block text-sm font-medium text-gray-700">Cultivated within these two weeks</label>
                            <input type="number" name="cultivated_within_two_weeks" id="cultivated_within_two_weeks" step="0.01" class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" value="{{ $crop->cultivated_within_two_weeks }}" required>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="balance_extent" class="block text-sm font-medium text-gray-700">Balance Extent</label>
                            <input type="number" name="balance_extent" id="balance_extent" step="0.01" class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" value="{{ $crop->balance_extent }}" disabled>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                        <label for="colour" class="block text-sm font-medium text-gray-700">Colour</label>
                            <select name="colour" id="colour" class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" required>
                                <option value="Red" {{ $crop->colour == 'Red' ? 'selected' : '' }}>Red</option>
                                <option value="Orange" {{ $crop->colour == 'Orange' ? 'selected' : '' }}>Orange</option>
                                <option value="Yellow" {{ $crop->colour == 'Yellow' ? 'selected' : '' }}>Yellow</option>
                                <option value="Lime Green" {{ $crop->colour == 'Lime Green' ? 'selected' : '' }}>Lime Green</option>
                                <option value="Green" {{ $crop->colour == 'Green' ? 'selected' : '' }}>Green</option>
                            </select>
                        </div>

                        <div class="col-span-2 sm:col-span-1">
                            <label for="recommendations" class="block text-sm font-medium text-gray-700">Recommendations</label>
                            <select name="recommendations" id="recommendations" class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" required disabled>
                                <option value="Best" {{ $crop->recommendations == 'Best' ? 'selected' : '' }}>Best</option>
                                <option value="Better" {{ $crop->recommendations == 'Better' ? 'selected' : '' }}>Better</option>
                                <option value="Good" {{ $crop->recommendations == 'Good' ? 'selected' : '' }}>Good</option>
                                <option value="Bad" {{ $crop->recommendations == 'Bad' ? 'selected' : '' }}>Bad</option>
                                <option value="Worst" {{ $crop->recommendations == 'Worst' ? 'selected' : '' }}>Worst</option>
                            </select>
                        </div>

                        <div class="col-span-2 sm:col-span-1">
                            <label for="duration_from" class="block text-sm font-medium text-gray-700">Duration From</label>
                            <input type="date" name="duration_from" id="duration_from" class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" value="{{ $crop->duration_from }}" required>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="duration_to" class="block text-sm font-medium text-gray-700">Duration To</label>
                            <input type="date" name="duration_to" id="duration_to" class="mt-1 p-2 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" value="{{ $crop->duration_to }}" required>
                        </div>
                    </div>
                    <div class="mt-4 flex justify-end">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 disabled:opacity-25 transition">Update Crop</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    // Function to update recommendations based on color
    function updateRecommendations() {
        var colourSelect = document.getElementById('colour');
        var recommendationsSelect = document.getElementById('recommendations');

        var color = colourSelect.value;
        var recommendation = '';

        // Determine recommendation based on color
        switch (color) {
            case 'Green':
                recommendation = 'Better';
                break;
            case 'Lime Green':
                recommendation = 'Best';
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
        for (var i = 0; i < recommendationsSelect.options.length; i++) {
            if (recommendationsSelect.options[i].value === recommendation) {
                recommendationsSelect.selectedIndex = i;
                break;
            }
        }
    }

    // Event listener for color change to update recommendations
    document.getElementById('colour').addEventListener('change', updateRecommendations);

    // Function to calculate and update balance extent
    function updateBalanceExtent() {
        var recommendedExtent = parseFloat(document.getElementById('recommended_extent').value);
        var cultivatedWithinTwoWeeks = parseFloat(document.getElementById('cultivated_within_two_weeks').value);
        var balanceExtentInput = document.getElementById('balance_extent');

        // Calculate balance_extent
        var balanceExtent = recommendedExtent - cultivatedWithinTwoWeeks;

        // Set the calculated balance_extent value
        balanceExtentInput.value = isNaN(balanceExtent) ? '' : balanceExtent.toFixed(2);
    }

    // Call the function initially to calculate and set the balance extent
    updateBalanceExtent();

    // Event listeners for recommended_extent and cultivated_within_two_weeks fields
    document.getElementById('recommended_extent').addEventListener('input', updateBalanceExtent);
    document.getElementById('cultivated_within_two_weeks').addEventListener('input', updateBalanceExtent);

    // Function to update recommended extent based on selected crop name
    function updateRecommendedExtent() {
        var cropNameSelect = document.getElementById('crop_name');
        var recommendedExtentInput = document.getElementById('recommended_extent');
        var cropName = cropNameSelect.value;

        // Define recommended extent values for each crop
        var recommendedExtentValues = {
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
            'Tomato': 215.00
        };

        // Set recommended extent based on selected crop name
        recommendedExtentInput.value = recommendedExtentValues[cropName];
        // Disable recommended extent field
        recommendedExtentInput.disabled = true;

        // Update balance extent
        updateBalanceExtent();
    }

    // Event listener for crop name change to update recommended extent
    document.getElementById('crop_name').addEventListener('change', updateRecommendedExtent);

    // Call the function initially to set the recommended extent based on the selected crop name
    updateRecommendedExtent();
</script>

</x-app-layout>
