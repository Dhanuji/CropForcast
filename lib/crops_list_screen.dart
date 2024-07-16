import 'package:flutter/material.dart';
import 'model.dart';
import 'crop_details_screen.dart';

class CropsListScreen extends StatefulWidget {
  final CropData cropData;
  CropsListScreen({required this.cropData});

  @override
  _CropsListScreenState createState() => _CropsListScreenState();
}

class _CropsListScreenState extends State<CropsListScreen> {
  String _toSnakeCase(String input) {
    return input.replaceAll(' ', '_').toLowerCase();
  }

  @override
  Widget build(BuildContext context) {
    final ColorScheme colorScheme = Theme.of(context).colorScheme;

    return Scaffold(
      appBar: PreferredSize(
        preferredSize: Size.fromHeight(200.0), // Adjust as needed
        child: AppBar(
          flexibleSpace: Container(
            decoration: BoxDecoration(
              image: DecorationImage(
                image: AssetImage('assets/images/header.jpg'),
                fit: BoxFit.fitWidth,
              ),
            ),
          ),
        ),
      ),
      body: Container(
        padding: EdgeInsets.all(16.0),
        child: ListView.builder(
          itemCount: widget.cropData.crops.length * 2 - 1,
          itemBuilder: (context, index) {
            if (index.isOdd) {
              return Divider();
            }
            final cropIndex = index ~/ 2;
            final crop = widget.cropData.crops[cropIndex];
            final cropName = crop.cropName;

            final cropNameSnakeCase = _toSnakeCase(cropName);
            return Card(
              elevation: 4.0,
              margin: EdgeInsets.symmetric(vertical: 8.0),
              child: ListTile(
                leading: ClipRRect(
                  borderRadius: BorderRadius.circular(6.0),
                  child: Image.asset(
                    'assets/images/$cropNameSnakeCase.jpg',
                    width: 50,
                    height: 400,
                    fit: BoxFit.contain,
                  ),
                ),
                title: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Text(
                      '${crop.cropName}',
                      style: TextStyle(fontWeight: FontWeight.bold),
                    ),
                    SizedBox(height: 5),
                    if (crop.sinhalaName != null)
                      Text(
                        '${crop.sinhalaName}',
                        style: TextStyle(fontStyle: FontStyle.italic),
                      ),
                    if (crop.tamilName != null)
                      Text(
                        '${crop.tamilName}',
                        style: TextStyle(fontStyle: FontStyle.italic),
                      ),
                  ],
                ),
                trailing: FloatingActionButton.extended(
                  backgroundColor: colorScheme.surface,
                  foregroundColor: colorScheme.onSurface,
                  onPressed: () {
                    Navigator.push(
                      context,
                      MaterialPageRoute(
                        builder: (context) => CropDetailsScreen(crop: crop),
                      ),
                    );
                  },
                  label: Text('විස්තර'),
                ),
              ),
            );
          },
        ),
      ),
      bottomNavigationBar: Container(
        height: 100.0, // Adjust as needed
        decoration: BoxDecoration(
          image: DecorationImage(
            image: AssetImage('assets/images/footer.jpg'),
            fit: BoxFit.fitWidth,
          ),
        ),
      ),
    );
  }
}
