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
-- Create the database if it doesn't exist
-- CREATE DATABASE IF NOT EXISTS document_tracking;
-- USE document_tracking;

-- Roles table
CREATE TABLE IF NOT EXISTS roles (
    role_id INT AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(50) NOT NULL UNIQUE,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Users table
CREATE TABLE IF NOT EXISTS users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    role_id INT NOT NULL,
    department_id INT,
    is_active BOOLEAN DEFAULT TRUE,
    last_login DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES roles(role_id) ON DELETE RESTRICT
);

-- Departments table
CREATE TABLE IF NOT EXISTS departments (
    department_id INT AUTO_INCREMENT PRIMARY KEY,
    department_name VARCHAR(100) NOT NULL UNIQUE,
    department_code VARCHAR(20),
    manager_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (manager_id) REFERENCES users(user_id) ON DELETE SET NULL
);

-- Update users table to add foreign key constraint after departments table is created
ALTER TABLE users
ADD CONSTRAINT fk_users_department
FOREIGN KEY (department_id) REFERENCES departments(department_id) ON DELETE SET NULL;

-- Document types table
CREATE TABLE IF NOT EXISTS document_types (
    type_id INT AUTO_INCREMENT PRIMARY KEY,
    type_name VARCHAR(100) NOT NULL UNIQUE,
    type_code VARCHAR(10) NOT NULL UNIQUE,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Documents table
CREATE TABLE IF NOT EXISTS documents (
    document_id INT AUTO_INCREMENT PRIMARY KEY,
    document_number VARCHAR(50) NOT NULL UNIQUE,
    type_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    content_path VARCHAR(255),
    created_by INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (type_id) REFERENCES document_types(type_id) ON DELETE RESTRICT,
    FOREIGN KEY (created_by) REFERENCES users(user_id) ON DELETE RESTRICT
);

-- Approval status table
CREATE TABLE IF NOT EXISTS approval_statuses (
    status_id INT AUTO_INCREMENT PRIMARY KEY,
    status_name VARCHAR(50) NOT NULL UNIQUE,
    description TEXT,
    color_code VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Approval workflows table
CREATE TABLE IF NOT EXISTS approval_workflows (
    workflow_id INT AUTO_INCREMENT PRIMARY KEY,
    workflow_name VARCHAR(100) NOT NULL,
    description TEXT,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Approval steps table
CREATE TABLE IF NOT EXISTS approval_steps (
    step_id INT AUTO_INCREMENT PRIMARY KEY,
    workflow_id INT NOT NULL,
    step_order INT NOT NULL,
    department_id INT,
    role_id INT,
    approver_id INT,
    is_required BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (workflow_id) REFERENCES approval_workflows(workflow_id) ON DELETE CASCADE,
    FOREIGN KEY (department_id) REFERENCES departments(department_id) ON DELETE RESTRICT,
    FOREIGN KEY (role_id) REFERENCES roles(role_id) ON DELETE RESTRICT,
    FOREIGN KEY (approver_id) REFERENCES users(user_id) ON DELETE RESTRICT
);

-- Document approvals table
CREATE TABLE IF NOT EXISTS document_approvals (
    approval_id INT AUTO_INCREMENT PRIMARY KEY,
    document_id INT NOT NULL,
    workflow_id INT NOT NULL,
    current_step INT NOT NULL,
    status_id INT NOT NULL,
    initiated_by INT NOT NULL,
    initiated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    completed_at DATETIME,
    FOREIGN KEY (document_id) REFERENCES documents(document_id) ON DELETE CASCADE,
    FOREIGN KEY (workflow_id) REFERENCES approval_workflows(workflow_id) ON DELETE RESTRICT,
    FOREIGN KEY (status_id) REFERENCES approval_statuses(status_id) ON DELETE RESTRICT,
    FOREIGN KEY (initiated_by) REFERENCES users(user_id) ON DELETE RESTRICT
);

-- Approval history table
CREATE TABLE IF NOT EXISTS approval_history (
    history_id INT AUTO_INCREMENT PRIMARY KEY,
    approval_id INT NOT NULL,
    step_id INT NOT NULL,
    status_id INT NOT NULL,
    approver_id INT,
    comments TEXT,
    action_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (approval_id) REFERENCES document_approvals(approval_id) ON DELETE CASCADE,
    FOREIGN KEY (step_id) REFERENCES approval_steps(step_id) ON DELETE RESTRICT,
    FOREIGN KEY (status_id) REFERENCES approval_statuses(status_id) ON DELETE RESTRICT,
    FOREIGN KEY (approver_id) REFERENCES users(user_id) ON DELETE SET NULL
);

-- Document notifications table
CREATE TABLE IF NOT EXISTS document_notifications (
    notification_id INT AUTO_INCREMENT PRIMARY KEY,
    document_id INT NOT NULL,
    user_id INT NOT NULL,
    message TEXT NOT NULL,
    is_read BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (document_id) REFERENCES documents(document_id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- Document attachments table
CREATE TABLE IF NOT EXISTS document_attachments (
    attachment_id INT AUTO_INCREMENT PRIMARY KEY,
    document_id INT NOT NULL,
    file_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    file_type VARCHAR(100),
    file_size INT,
    uploaded_by INT NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (document_id) REFERENCES documents(document_id) ON DELETE CASCADE,
    FOREIGN KEY (uploaded_by) REFERENCES users(user_id) ON DELETE RESTRICT
);

-- Insert sample data

-- Insert roles
INSERT INTO roles (role_name, description) VALUES
('admin', 'System administrator with full access'),
('manager', 'Department manager with approval rights'),
('employee', 'Regular employee with basic access'),
('viewer', 'Read-only access to documents');

-- Insert departments
INSERT INTO departments (department_name, department_code) VALUES
('Finance', 'FIN'),
('Human Resources', 'HR'),
('Logistics', 'LOG'),
('Information Technology', 'IT'),
('Operations', 'OPS');

-- Insert sample users (password is 'password' hashed)
INSERT INTO users (username, password, email, first_name, last_name, role_id, department_id) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin@example.com', 'Admin', 'User', 1, NULL),
('finance_mgr', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'finance@example.com', 'Finance', 'Manager', 2, 1),
('hr_mgr', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hr@example.com', 'HR', 'Manager', 2, 2),
('logistics_head', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'logistics@example.com', 'Logistics', 'Head', 2, 3),
('employee1', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'emp1@example.com', 'John', 'Doe', 3, 1),
('employee2', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'emp2@example.com', 'Jane', 'Smith', 3, 2);

-- Update department managers
UPDATE departments SET manager_id = 2 WHERE department_id = 1; -- Finance
UPDATE departments SET manager_id = 3 WHERE department_id = 2; -- HR
UPDATE departments SET manager_id = 4 WHERE department_id = 3; -- Logistics

-- Insert document types
INSERT INTO document_types (type_name, type_code, description) VALUES
('Purchase Order', 'PO', 'Documents for purchasing goods or services'),
('Memorandum', 'MEMO', 'Internal communication documents'),
('Delivery Receipt', 'DR', 'Documents for receiving goods'),
('Invoice', 'INV', 'Billing documents'),
('Contract', 'CONT', 'Legal agreements');

-- Insert approval statuses
INSERT INTO approval_statuses (status_name, description, color_code) VALUES
('Draft', 'Document is being prepared', '#6c757d'),
('Pending', 'Document is awaiting approval', '#ffc107'),
('In Review', 'Document is being reviewed', '#17a2b8'),
('Approved', 'Document has been approved', '#28a745'),
('Rejected', 'Document has been rejected', '#dc3545'),
('Cancelled', 'Document approval process was cancelled', '#6c757d');

-- Insert approval workflows
INSERT INTO approval_workflows (workflow_name, description) VALUES
('Purchase Order Approval', 'Workflow for approving purchase orders'),
('HR Document Approval', 'Workflow for approving HR-related documents'),
('Logistics Document Approval', 'Workflow for approving logistics documents');

-- Insert approval steps
-- Purchase Order workflow steps
INSERT INTO approval_steps (workflow_id, step_order, department_id, role_id, is_required) VALUES
(1, 1, 1, 2, TRUE), -- Finance Manager
(1, 2, 5, 2, TRUE); -- Operations Manager

-- HR Document workflow steps
INSERT INTO approval_steps (workflow_id, step_order, department_id, role_id, is_required) VALUES
(2, 1, 2, 2, TRUE); -- HR Manager

-- Logistics Document workflow steps
INSERT INTO approval_steps (workflow_id, step_order, department_id, role_id, is_required) VALUES
(3, 1, 3, 2, TRUE); -- Logistics Head

-- Insert sample documents
INSERT INTO documents (document_number, type_id, title, description, created_by) VALUES
('PO#00123', 1, 'Office Supplies Purchase', 'Purchase order for office supplies', 5),
('MEMO#998', 2, 'Policy Update Memo', 'Memo regarding updated company policies', 6),
('DR#0420', 3, 'IT Equipment Delivery', 'Delivery receipt for new IT equipment', 5);

-- Insert document approvals
INSERT INTO document_approvals (document_id, workflow_id, current_step, status_id, initiated_by) VALUES
(1, 1, 1, 2, 5), -- PO#00123 in Pending status, at Finance Manager step
(2, 2, 1, 2, 6), -- MEMO#998 in Pending status, at HR Manager step
(3, 3, 1, 3, 5); -- DR#0420 in In Review status, at Logistics Head step

-- Create indexes for better performance
CREATE INDEX idx_documents_type ON documents(type_id);
CREATE INDEX idx_documents_created_by ON documents(created_by);
CREATE INDEX idx_approvals_document ON document_approvals(document_id);
CREATE INDEX idx_approvals_status ON document_approvals(status_id);
CREATE INDEX idx_approval_history_approval ON approval_history(approval_id);
CREATE INDEX idx_users_role ON users(role_id);
CREATE INDEX idx_users_department ON users(department_id);
