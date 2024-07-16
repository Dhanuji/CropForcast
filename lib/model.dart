class Crop {
  final int cropId;
  String cropName;
  String? sinhalaName;
  String? tamilName;
  final double recommendedExtent;
  final double cultivatedWithinTwoWeeks;
  final double balanceExtent;
  final String colour;
  final String recommendations;
  final String durationFrom;
  final String durationTo;
  final String createdAt;
  final String updatedAt;

  Crop({
    required this.cropId,
    required this.cropName,
    this.sinhalaName,
    this.tamilName,
    required this.recommendedExtent,
    required this.cultivatedWithinTwoWeeks,
    required this.balanceExtent,
    required this.colour,
    required this.recommendations,
    required this.durationFrom,
    required this.durationTo,
    required this.createdAt,
    required this.updatedAt,
  });

  // Method to update Sinhala and Tamil names when crop name changes
  void updateNames(
      String newCropName, String? newSinhalaName, String? newTamilName) {
    cropName = newCropName;
    sinhalaName = newSinhalaName;
    tamilName = newTamilName;
  }

  factory Crop.fromJson(Map<String, dynamic> json) {
    return Crop(
      cropId: json['crop_id'],
      cropName: json['crop_name'],
      sinhalaName: json['sinhala_name'] ?? '',
      tamilName: json['tamil_name'] ?? '',
      recommendedExtent: json['recommended_extent'].toDouble(),
      cultivatedWithinTwoWeeks: json['cultivated_within_two_weeks'].toDouble(),
      balanceExtent: json['balance_extent'].toDouble(),
      colour: json['colour'],
      recommendations: json['recommendations'],
      durationFrom: json['duration_from'],
      durationTo: json['duration_to'],
      createdAt: json['created_at'],
      updatedAt: json['updated_at'],
    );
  }
}

// CropData class remains the same

class CropData {
  final List<Crop> crops;

  CropData({required this.crops});

  factory CropData.fromJson(Map<String, dynamic> json) {
    final cropsList = json['crops'] as List<dynamic>;
    final crops = cropsList.map((crop) => Crop.fromJson(crop)).toList();
    return CropData(crops: crops);
  }
}
