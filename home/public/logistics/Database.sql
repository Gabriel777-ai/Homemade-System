<?php


class AssetManager {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
        $this->createAssetsTable();
        $this->insertSampleData();
    }
    
    
    public function createAssetsTable() {
        $sql = "CREATE TABLE IF NOT EXISTS assets (
            asset_id INT AUTO_INCREMENT PRIMARY KEY,
            asset_name VARCHAR(255) NOT NULL,
            asset_location VARCHAR(100),
            serial_number VARCHAR(100),
            purchase_date DATE,
            warranty_expiry DATE,
            status ENUM('Active', 'Maintenance', 'Retired') DEFAULT 'Active',
            notes TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        
        try {
            $this->db->exec($sql);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    /**
     * Insert sample data if table is empty
     */
    public function insertSampleData() {
        $count = $this->db->query("SELECT COUNT(*) FROM assets")->fetchColumn();
        
        if ($count == 0) {
            $sql = "INSERT INTO assets (asset_name, asset_location, serial_number, status) VALUES 
                ('Desktop PC', 'IT Dept', '12345678', 'Active'),
                ('Projector', 'Meeting Room', '87654321', 'Active')";
            $this->db->exec($sql);
        }
    }
    
    /**
     * Get all assets
     */
    public function getAllAssets() {
        $query = "SELECT * FROM assets ORDER BY asset_name";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Get a single asset by ID
     */
    public function getAssetById($assetId) {
        $query = "SELECT * FROM assets WHERE asset_id = :asset_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':asset_id', $assetId);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    /**
     * Add a new asset
     */
    public function addAsset($assetData) {
        $query = "INSERT INTO assets (asset_name, asset_location, serial_number, purchase_date, 
                  warranty_expiry, status, notes) 
                  VALUES (:asset_name, :asset_location, :serial_number, :purchase_date, 
                  :warranty_expiry, :status, :notes)";
        
        $stmt = $this->db->prepare($query);
        
        // Bind parameters
        $stmt->bindParam(':asset_name', $assetData['asset_name']);
        $stmt->bindParam(':asset_location', $assetData['asset_location']);
        $stmt->bindParam(':serial_number', $assetData['serial_number']);
        $stmt->bindParam(':purchase_date', $assetData['purchase_date']);
        $stmt->bindParam(':warranty_expiry', $assetData['warranty_expiry']);
        $stmt->bindParam(':status', $assetData['status']);
        $stmt->bindParam(':notes', $assetData['notes']);
        
        return $stmt->execute();
    }
    
    /**
     * Update an existing asset
     */
    public function updateAsset($assetId, $assetData) {
        $query = "UPDATE assets SET 
                  asset_name = :asset_name, 
                  asset_location = :asset_location, 
                  serial_number = :serial_number, 
                  purchase_date = :purchase_date, 
                  warranty_expiry = :warranty_expiry, 
                  status = :status, 
                  notes = :notes
                  WHERE asset_id = :asset_id";
        
        $stmt = $this->db->prepare($query);
        
        // Bind parameters
        $stmt->bindParam(':asset_id', $assetId);
        $stmt->bindParam(':asset_name', $assetData['asset_name']);
        $stmt->bindParam(':asset_location', $assetData['asset_location']);
        $stmt->bindParam(':serial_number', $assetData['serial_number']);
        $stmt->bindParam(':purchase_date', $assetData['purchase_date']);
        $stmt->bindParam(':warranty_expiry', $assetData['warranty_expiry']);
        $stmt->bindParam(':status', $assetData['status']);
        $stmt->bindParam(':notes', $assetData['notes']);
        
        return $stmt->execute();
    }
    
    /**
     * Delete an asset
     */
    public function deleteAsset($assetId) {
        $query = "DELETE FROM assets WHERE asset_id = :asset_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':asset_id', $assetId);
        
        return $stmt->execute();
    }
    
    /**
     * Search assets by keyword
     */
    public function searchAssets($keyword) {
        $keyword = "%$keyword%";
        $query = "SELECT * FROM assets 
                  WHERE asset_name LIKE :keyword 
                  OR asset_location LIKE :keyword 
                  OR serial_number LIKE :keyword 
                  ORDER BY asset_name";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':keyword', $keyword);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Get assets by status
     */
    public function getAssetsByStatus($status) {
        $query = "SELECT * FROM assets WHERE status = :status ORDER BY asset_name";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':status', $status);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Get assets by location
     */
    public function getAssetsByLocation($location) {
        $query = "SELECT * FROM assets WHERE asset_location = :location ORDER BY asset_name";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':location', $location);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Get all unique locations
     */
    public function getAllLocations() {
        $query = "SELECT DISTINCT asset_location FROM assets WHERE asset_location IS NOT NULL ORDER BY asset_location";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}
?>
