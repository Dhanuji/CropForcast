import 'package:flutter/material.dart';
import 'model.dart';

class CropDetailsScreen extends StatelessWidget {
  final Crop crop;

  CropDetailsScreen({required this.crop});

  @override
  Widget build(BuildContext context) {
    final cropNameSnakeCase = crop.cropName.replaceAll(' ', '_').toLowerCase();
    final image = 'assets/images/$cropNameSnakeCase.jpg';
    String imageAsset = '';
    String typeText = '';

    // Determine image and type text based on the color of the crop
    switch (crop.colour) {
      case 'Green':
        imageAsset = 'assets/images/best.jpg';
        typeText = 'Best';
        break;
      case 'Lime Green':
        imageAsset = 'assets/images/better.jpg';
        typeText = 'Better';
        break;
      case 'Yellow':
        imageAsset = 'assets/images/good.jpg';
        typeText = 'Good';
        break;
      case 'Orange':
        imageAsset = 'assets/images/bad.jpg';
        typeText = 'Bad';
        break;
      case 'Red':
        imageAsset = 'assets/images/worst.jpg';
        typeText = 'Worst';
        break;
      default:
        imageAsset = 'assets/images/default.jpg'; // Default image
        typeText = 'Default';
        break;
    }

    // Map the recommendation type to Sinhala text
    String getSinhalaRecommendation(String recommendation) {
      switch (recommendation) {
        case 'Best':
          return 'වඩාත් හොඳ මිලක් ලැබේවි.';
        case 'Better':
          return 'හොඳ මිලක් ලැබේවි.';
        case 'Good':
          return 'සාමාන්‍ය මිලක් ලැබේවි.';
        case 'Bad':
          return 'අඩු මිලක් ලැබේවි.';
        case 'Worst':
          return 'ඉතා අඩු මිලක් ලැබේවි.';
        default:
          return 'නිර්දේශයන් නොමැත.';
      }
    }

    final ColorScheme colorScheme = Theme.of(context).colorScheme;

    return Scaffold(
      body: SingleChildScrollView(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.stretch,
          children: [
            Container(
              height: 200.0, // Adjust as needed
              decoration: BoxDecoration(
                image: DecorationImage(
                  image: AssetImage('assets/images/header.jpg'),
                  fit: BoxFit.fitWidth,
                ),
              ),
            ),
            SizedBox(height: 10), // Add space between header and next section
            Container(
              color: Colors.grey[200],
              padding: EdgeInsets.symmetric(horizontal: 16, vertical: 8),
              child: Row(
                children: [
                  Image.asset(
                    imageAsset,
                    width: 50,
                    height: 50,
                    fit: BoxFit.cover,
                  ),
                  SizedBox(width: 16),
                  Text(
                    typeText,
                    style: TextStyle(
                      fontSize: 18,
                      fontWeight: FontWeight.bold,
                    ),
                  ),
                ],
              ),
            ),
            SizedBox(height: 10), // Add some space between sections
            Card(
              margin: EdgeInsets.all(8.0),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  ClipRRect(
                    borderRadius: BorderRadius.circular(8.0),
                    child: Image.asset(
                      image,
                      width: double.infinity,
                      fit: BoxFit.cover,
                    ),
                  ),
                  Padding(
                    padding: const EdgeInsets.all(16.0),
                    child: Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        Text(
                          '\n${crop.cropName} (${crop.sinhalaName})\n',
                          style: TextStyle(
                            fontSize: 20.0,
                            fontWeight: FontWeight.bold,
                          ),
                        ),
                        SizedBox(height: 8),
                        Text(
                          'Recommended Extent (නිර්දේශිත ප්‍රමාණය (හෙක්) සති දෙකක් සඳහා): '
                          '${crop.recommendedExtent}',
                          style: TextStyle(fontSize: 16),
                        ),
                        SizedBox(height: 8),
                        Text(
                          'Cultivated Within Two Weeks (මෙම සති දෙකේ වගා ප්‍රමාණය (හෙක්)): '
                          '${crop.cultivatedWithinTwoWeeks}',
                          style: TextStyle(fontSize: 16),
                        ),
                        SizedBox(height: 8),
                        Text(
                          'Balance Extent (මෙම සති දෙක ඇතුළත වගා කළ හැකි ප්‍රමාණය (හෙක්)): '
                          '${crop.balanceExtent}',
                          style: TextStyle(fontSize: 16),
                        ),
                        SizedBox(height: 8),
                        Text(
                          'Recommendations (නිර්දේශය): '
                          '${crop.recommendations}  (${getSinhalaRecommendation(crop.recommendations)})',
                          style: TextStyle(fontSize: 16),
                        ),
                        SizedBox(height: 8),
                        Text(
                          'Duration (කාලය): '
                          '${crop.durationFrom} - ${crop.durationTo}',
                          style: TextStyle(fontSize: 16),
                        ),
                      ],
                    ),
                  ),
                ],
              ),
            ),
            SizedBox(
                height: 10), // Add some space between the card and the button
            Container(
              padding: EdgeInsets.symmetric(horizontal: 16),
              child: ElevatedButton(
                onPressed: () {
                  Navigator.pop(context);
                },
                child: Text('Back'),
                style: ElevatedButton.styleFrom(
                  backgroundColor: Colors
                      .grey[800], // Use backgroundColor instead of primary
                  foregroundColor: Colors.white,
                  minimumSize: Size(
                      double.infinity, 50), // Adjust button width and height
                ),
              ),
            ),
            SizedBox(height: 20),
            Container(
              decoration: BoxDecoration(
                image: DecorationImage(
                  image: AssetImage('assets/images/footer.jpg'),
                  fit: BoxFit.fitWidth,
                ),
              ),
              height: 100, // Adjust as needed
            ),
          ],
        ),
      ),
    );
  }
}
