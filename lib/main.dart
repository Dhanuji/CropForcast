import 'dart:convert';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'model.dart';
import 'crops_list_screen.dart'; // Import the CropsListScreen

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'බෝග පුරෝකථනය / Crop Forecasting',
      home: CropDataScreen(),
    );
  }
}

class CropDataScreen extends StatefulWidget {
  @override
  _CropDataScreenState createState() => _CropDataScreenState();
}

class _CropDataScreenState extends State<CropDataScreen> {
  CropData? _cropData; // Make _cropData nullable
  bool _isLoading = true;
  String _errorMessage = '';

  @override
  void initState() {
    super.initState();
    _fetchData();
  }

  Future<void> _fetchData() async {
    try {
      final response =
          await http.get(Uri.parse('http://10.0.2.2:8000/api/crops'));
      if (response.statusCode == 200) {
        final jsonData = jsonDecode(response.body);
        setState(() {
          _cropData = CropData.fromJson(jsonData);
          _errorMessage = ''; // Clear any previous error message
        });
      } else {
        throw Exception('Failed to load crop data: ${response.reasonPhrase}');
      }
    } catch (e) {
      setState(() {
        _errorMessage = 'Error fetching data: $e';
      });
      print('Error: $e');
    } finally {
      setState(() {
        _isLoading = false;
      });
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('බෝග පුරෝකථනය / Crop Forecasting'),
      ),
      body: _isLoading
          ? Center(
              child: CircularProgressIndicator(),
            )
          : _cropData == null
              ? Center(
                  child: Text('Failed to load crop data: $_errorMessage'),
                )
              : CropsListScreen(cropData: _cropData!),
    );
  }
}
