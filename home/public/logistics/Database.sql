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
-- Create the database if it doesn't exist
-- CREATE DATABASE IF NOT EXISTS company_management;
-- USE company_management;

-- Departments table
CREATE TABLE IF NOT EXISTS departments (
    department_id INT AUTO_INCREMENT PRIMARY KEY,
    department_name VARCHAR(100) NOT NULL UNIQUE,
    department_code VARCHAR(20),
    manager_name VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Findings categories table
CREATE TABLE IF NOT EXISTS findings_categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(100) NOT NULL,
    severity_level ENUM('Low', 'Medium', 'High', 'Critical') NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Audits table
CREATE TABLE IF NOT EXISTS audits (
    audit_id INT AUTO_INCREMENT PRIMARY KEY,
    department_id INT NOT NULL,
    audit_date DATE NOT NULL,
    audit_title VARCHAR(255) NOT NULL,
    findings TEXT,
    status ENUM('Pending', 'In Progress', 'Completed', 'Closed') NOT NULL DEFAULT 'Pending',
    severity ENUM('None', 'Low', 'Medium', 'High', 'Critical') NOT NULL DEFAULT 'None',
    auditor_name VARCHAR(100),
    resolution_date DATE,
    resolution_notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (department_id) REFERENCES departments(department_id) ON DELETE RESTRICT
);

-- Audit findings table (for more detailed findings)
CREATE TABLE IF NOT EXISTS audit_findings (
    finding_id INT AUTO_INCREMENT PRIMARY KEY,
    audit_id INT NOT NULL,
    category_id INT NOT NULL,
    finding_description TEXT NOT NULL,
    recommendation TEXT,
    status ENUM('Open', 'In Progress', 'Resolved', 'Closed') NOT NULL DEFAULT 'Open',
    assigned_to VARCHAR(100),
    due_date DATE,
    resolution_date DATE,
    resolution_notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (audit_id) REFERENCES audits(audit_id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES findings_categories(category_id) ON DELETE RESTRICT
);

-- Audit documents table (for attachments)
CREATE TABLE IF NOT EXISTS audit_documents (
    document_id INT AUTO_INCREMENT PRIMARY KEY,
    audit_id INT NOT NULL,
    document_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    file_type VARCHAR(50),
    file_size INT,
    uploaded_by VARCHAR(100),
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (audit_id) REFERENCES audits(audit_id) ON DELETE CASCADE
);

-- Insert sample departments
INSERT INTO departments (department_name, department_code, manager_name) VALUES
('Logistics', 'LOG', 'John Smith'),
('Procurement', 'PROC', 'Jane Doe'),
('Finance', 'FIN', 'Robert Johnson'),
('Human Resources', 'HR', 'Emily Williams'),
('Information Technology', 'IT', 'Michael Brown');

-- Insert sample findings categories
INSERT INTO findings_categories (category_name, severity_level, description) VALUES
('Inventory Discrepancy', 'High', 'Differences between physical inventory and system records'),
('Documentation Issue', 'Medium', 'Missing or incomplete documentation'),
('Process Non-compliance', 'High', 'Failure to follow established processes'),
('Security Vulnerability', 'Critical', 'Identified security risks or breaches'),
('Operational Inefficiency', 'Low', 'Processes that could be optimized for better efficiency');

-- Insert sample audits matching your example data
INSERT INTO audits (department_id, audit_date, audit_title, findings, status, severity, auditor_name) VALUES
((SELECT department_id FROM departments WHERE department_name = 'Logistics'), 
 '2025-04-01', 
 'Quarterly Logistics Audit', 
 'Inventory mismatch detected', 
 'Completed', 
 'High', 
 'David Anderson'),
 
((SELECT department_id FROM departments WHERE department_name = 'Procurement'), 
 '2025-03-15', 
 'Procurement Process Audit', 
 'No issues found', 
 'Closed', 
 'None', 
 'Sarah Miller');

-- Insert sample detailed findings
INSERT INTO audit_findings (audit_id, category_id, finding_description, recommendation, status) VALUES
(1, 
 (SELECT category_id FROM findings_categories WHERE category_name = 'Inventory Discrepancy'),
 'Physical count showed 15 fewer items than system inventory for SKU-12345',
 'Conduct full inventory reconciliation and implement cycle counting',
 'Open'),
 
(1,
 (SELECT category_id FROM findings_categories WHERE category_name = 'Process Non-compliance'),
 'Receiving process not following documented procedures for high-value items',
 'Retrain warehouse staff on proper receiving procedures',
 'In Progress');

-- Create indexes for better performance
CREATE INDEX idx_audits_department ON audits(department_id);
CREATE INDEX idx_audits_date ON audits(audit_date);
CREATE INDEX idx_findings_audit ON audit_findings(audit_id);
CREATE INDEX idx_findings_category ON audit_findings(category_id);

