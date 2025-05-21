
CREATE TABLE assets (
    asset_id INT AUTO_INCREMENT PRIMARY KEY,
    asset_name VARCHAR(100) NOT NULL,
    asset_type VARCHAR(50) NOT NULL,
    serial_number VARCHAR(50) UNIQUE,
    purchase_date DATE,
    purchase_price DECIMAL(10, 2),
    location_id INT,
    department_id INT,
    status VARCHAR(20) DEFAULT 'Active',
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE departments (
    department_id INT AUTO_INCREMENT PRIMARY KEY,
    department_name VARCHAR(100) NOT NULL,
    department_code VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE locations (
    location_id INT AUTO_INCREMENT PRIMARY KEY,
    location_name VARCHAR(100) NOT NULL,
    building VARCHAR(50),
    floor VARCHAR(10),
    room VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE asset_maintenance (
    maintenance_id INT AUTO_INCREMENT PRIMARY KEY,
    asset_id INT NOT NULL,
    maintenance_date DATE NOT NULL,
    maintenance_type VARCHAR(50) NOT NULL,
    performed_by VARCHAR(100),
    cost DECIMAL(10, 2),
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (asset_id) REFERENCES assets(asset_id) ON DELETE CASCADE
);


CREATE TABLE asset_assignments (
    assignment_id INT AUTO_INCREMENT PRIMARY KEY,
    asset_id INT NOT NULL,
    assigned_to VARCHAR(100) NOT NULL,
    assigned_date DATE NOT NULL,
    return_date DATE,
    assignment_status VARCHAR(20) DEFAULT 'Active',
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (asset_id) REFERENCES assets(asset_id) ON DELETE CASCADE
);


ALTER TABLE assets 
ADD CONSTRAINT fk_department 
FOREIGN KEY (department_id) REFERENCES departments(department_id);

ALTER TABLE assets 
ADD CONSTRAINT fk_location 
FOREIGN KEY (location_id) REFERENCES locations(location_id);


INSERT INTO departments (department_name, department_code) VALUES
('IT Department', 'IT'),
('Marketing', 'MKT'),
('Human Resources', 'HR'),
('Finance', 'FIN'),
('Operations', 'OPS');


INSERT INTO locations (location_name, building, floor, room) VALUES
('Main Office - IT Room', 'Main Building', '1', 'IT-101'),
('Main Office - Meeting Room', 'Main Building', '2', 'MR-201'),
('Main Office - Finance Department', 'Main Building', '3', 'FIN-301'),
('Warehouse', 'Warehouse Building', '1', 'WH-101'),
('Remote Office', 'Branch Office', '1', 'BO-101');

-- Insert assets
INSERT INTO assets (asset_name, asset_type, serial_number, purchase_date, purchase_price, location_id, department_id, status) VALUES
('Desktop PC', 'Computer', '12345678', '2022-01-15', 1200.00, 1, 1, 'Active'),
('Projector', 'Presentation Equipment', '87654321', '2021-11-10', 800.00, 2, 1, 'Active'),
('Laptop - Dell XPS', 'Computer', 'DL789456', '2022-03-20', 1500.00, 1, 1, 'Active'),
('iPhone 13', 'Mobile Device', 'IP123987', '2022-02-05', 999.00, 3, 4, 'Active'),
('Office Printer', 'Printer', 'HP456789', '2021-10-01', 350.00, 1, 1, 'Active'),
('Conference Table', 'Furniture', 'FN789123', '2020-05-15', 1200.00, 2, 1, 'Active'),
('Security Camera', 'Security Equipment', 'SC159753', '2022-01-30', 250.00, 4, 5, 'Active'),
('MacBook Pro', 'Computer', 'AP789012', '2022-04-10', 2500.00, 3, 2, 'Active'),
('Desk Chair', 'Furniture', 'CH456123', '2021-08-15', 350.00, 1, 3, 'Active'),
('Whiteboard', 'Office Equipment', 'WB123456', '2021-09-20', 150.00, 2, 1, 'Active'),
('Server Rack', 'IT Equipment', 'SR987654', '2020-11-05', 3500.00, 1, 1, 'Active'),
('Network Switch', 'IT Equipment', 'NS654321', '2021-12-10', 1200.00, 1, 1, 'Active'),
('Tablet - iPad Pro', 'Mobile Device', 'TB123789', '2022-01-25', 1100.00, 2, 2, 'Active'),
('Shredder', 'Office Equipment', 'SH456789', '2021-07-15', 200.00, 3, 4, 'Active'),
('Coffee Machine', 'Kitchen Equipment', 'CM789123', '2021-06-10', 300.00, 2, 1, 'Maintenance');


INSERT INTO asset_assignments (asset_id, assigned_to, assigned_date, assignment_status, notes) VALUES
(1, 'John Smith', '2022-01-20', 'Active', 'Primary workstation'),
(3, 'Sarah Johnson', '2022-03-25', 'Active', 'For development work'),
(4, 'Michael Brown', '2022-02-10', 'Active', 'Company phone'),
(8, 'Emily Davis', '2022-04-15', 'Active', 'For design work'),
(13, 'Robert Wilson', '2022-02-01', 'Active', 'For presentations'),
(5, 'David Lee', '2021-10-15', 'Returned', 'Temporary use'),
(3, 'David Lee', '2021-12-10', 'Returned', 'Borrowed during office renovation'),
(9, 'Jennifer Taylor', '2021-09-01', 'Active', 'Ergonomic chair for back issues');


INSERT INTO asset_maintenance (asset_id, maintenance_date, maintenance_type, performed_by, cost, notes) VALUES
(1, '2022-06-15', 'Routine Checkup', 'IT Support', 0.00, 'Regular maintenance'),
(2, '2022-05-20', 'Bulb Replacement', 'External Vendor', 120.00, 'Replaced projector bulb'),
(5, '2022-04-10', 'Toner Replacement', 'Office Admin', 85.00, 'Replaced all toners'),
(15, '2022-06-20', 'Repair', 'Vendor Service', 75.00, 'Fixed water leakage issue'),
(11, '2022-03-15', 'Firmware Update', 'IT Support', 0.00, 'Updated to latest firmware'),
(12, '2022-02-25', 'Configuration', 'IT Support', 0.00, 'Reconfigured for new network setup'),
(2, '2021-12-10', 'Cleaning', 'Maintenance Staff', 0.00, 'Deep cleaned the projector'),
(5, '2021-11-15', 'Part Replacement', 'External Vendor', 150.00, 'Replaced drum unit');


CREATE TABLE asset_categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(50) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO asset_categories (category_name, description) VALUES
('IT Equipment', 'Computers, servers, networking equipment'),
('Office Furniture', 'Desks, chairs, cabinets'),
('Mobile Devices', 'Phones, tablets, laptops'),
('Office Equipment', 'Printers, scanners, shredders'),
('Presentation Equipment', 'Projectors, screens, whiteboards'),
('Kitchen Equipment', 'Coffee machines, refrigerators, microwaves');


ALTER TABLE assets ADD COLUMN category_id INT;
ALTER TABLE assets ADD CONSTRAINT fk_category FOREIGN KEY (category_id) REFERENCES asset_categories(category_id);


UPDATE assets SET category_id = 1 WHERE asset_type IN ('Computer', 'IT Equipment');
UPDATE assets SET category_id = 2 WHERE asset_type IN ('Furniture');
UPDATE assets SET category_id = 3 WHERE asset_type IN ('Mobile Device');
UPDATE assets SET category_id = 4 WHERE asset_type IN ('Printer', 'Office Equipment');
UPDATE assets SET category_id = 5 WHERE asset_type IN ('Presentation Equipment');
UPDATE assets SET category_id = 6 WHERE asset_type IN ('Kitchen Equipment');


CREATE TABLE vendors (
    vendor_id INT AUTO_INCREMENT PRIMARY KEY,
    vendor_name VARCHAR(100) NOT NULL,
    contact_person VARCHAR(100),
    phone VARCHAR(20),
    email VARCHAR(100),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO vendors (vendor_name, contact_person, phone, email, address) VALUES
('TechSupplies Inc.', 'James Wilson', '555-123-4567', 'james@techsupplies.com', '123 Tech Blvd, Tech City, TC 12345'),
('Office Essentials', 'Mary Johnson', '555-234-5678', 'mary@officeessentials.com', '456 Office St, Business City, BC 23456'),
('IT Solutions', 'Robert Brown', '555-345-6789', 'robert@itsolutions.com', '789 Solution Ave, IT City, IC 34567'),
('Furniture Plus', 'Susan Davis', '555-456-7890', 'susan@furnitureplus.com', '101 Chair Lane, Furniture Town, FT 45678'),
('Mobile World', 'David Smith', '555-567-8901', 'david@mobileworld.com', '202 Phone Road, Mobile City, MC 56789');


ALTER TABLE assets ADD COLUMN vendor_id INT;
ALTER TABLE assets ADD CONSTRAINT fk_vendor FOREIGN KEY (vendor_id) REFERENCES vendors(vendor_id);


UPDATE assets SET vendor_id = 1 WHERE asset_id IN (1, 3, 11, 12);
UPDATE assets SET vendor_id = 2 WHERE asset_id IN (5, 10, 14);
UPDATE assets SET vendor_id = 3 WHERE asset_id IN (2, 7);
UPDATE assets SET vendor_id = 4 WHERE asset_id IN (6, 9);
UPDATE assets SET vendor_id = 5 WHERE asset_id IN (4, 8, 13);


CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    email VARCHAR(100) UNIQUE,
    role ENUM('admin', 'manager', 'user') NOT NULL DEFAULT 'user',
    department_id INT,
    is_active BOOLEAN DEFAULT TRUE,
    last_login DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (department_id) REFERENCES departments(department_id)
);

-- Insert sample users (password is 'password' hashed with bcrypt)
INSERT INTO users (username, password, first_name, last_name, email, role, department_id) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Admin', 'User', 'admin@company.com', 'admin', 1),
('manager', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Manager', 'User', 'manager@company.com', 'manager', 2),
('user', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Regular', 'User', 'user@company.com', 'user', 3);


CREATE TABLE audit_log (
    log_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    action_type ENUM('create', 'update', 'delete', 'login', 'logout', 'other') NOT NULL,
    table_name VARCHAR(50),
    record_id INT,
    old_values TEXT,
    new_values TEXT,
    ip_address VARCHAR(45),
    user_agent TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);


INSERT INTO audit_log (user_id, action_type, table_name, record_id, old_values, new_values, ip_address) VALUES
(1, 'create', 'assets', 15, NULL, '{"asset_name":"Coffee Machine","asset_type":"Kitchen Equipment","status":"Active"}', '192.168.1.100'),
(1, 'update', 'assets', 15, '{"status":"Active"}', '{"status":"Maintenance"}', '192.168.1.100'),
(2, 'create', 'asset_maintenance', 8, NULL, '{"asset_id":5,"maintenance_type":"Part Replacement","cost":150.00}', '192.168.1.101'),
(3, 'login', NULL, NULL, NULL, NULL, '192.168.1.102'),
(1, 'delete', 'asset_assignments', 5, '{"asset_id":5,"assigned_to":"David Lee","assignment_status":"Active"}', NULL, '192.168.1.100');


CREATE TABLE asset_depreciation (
    depreciation_id INT AUTO_INCREMENT PRIMARY KEY,
    asset_id INT NOT NULL,
    purchase_value DECIMAL(10, 2) NOT NULL,
    current_value DECIMAL(10, 2) NOT NULL,
    depreciation_method ENUM('straight_line', 'declining_balance', 'units_of_production') NOT NULL,
    useful_life_years INT,
    salvage_value DECIMAL(10, 2),
    last_calculated_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (asset_id) REFERENCES assets(asset_id) ON DELETE CASCADE
);


INSERT INTO asset_depreciation (asset_id, purchase_value, current_value, depreciation_method, useful_life_years, salvage_value, last_calculated_date) VALUES
(1, 1200.00, 960.00, 'straight_line', 5, 100.00, '2023-01-01'),
(2, 800.00, 560.00, 'straight_line', 4, 80.00, '2023-01-01'),
(3, 1500.00, 1350.00, 'straight_line', 5, 150.00, '2023-01-01'),
(4, 999.00, 799.20, 'straight_line', 3, 100.00, '2023-01-01'),
(11, 3500.00, 2450.00, 'straight_line', 7, 350.00, '2023-01-01');


CREATE TABLE scheduled_maintenance (
    schedule_id INT AUTO_INCREMENT PRIMARY KEY,
    asset_id INT NOT NULL,
    maintenance_type VARCHAR(50) NOT NULL,
    scheduled_date DATE NOT NULL,
    frequency ENUM('one_time', 'daily', 'weekly', 'monthly', 'quarterly', 'yearly') NOT NULL,
    assigned_to VARCHAR(100),
    estimated_cost DECIMAL(10, 2),
    notes TEXT,
    status ENUM('scheduled', 'completed', 'cancelled') DEFAULT 'scheduled',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (asset_id) REFERENCES assets(asset_id) ON DELETE CASCADE
);


INSERT INTO scheduled_maintenance (asset_id, maintenance_type, scheduled_date, frequency, assigned_to, estimated_cost, status) VALUES
(2, 'Bulb Check', '2023-07-15', 'quarterly', 'IT Support', 50.00, 'scheduled'),
(5, 'Toner Replacement', '2023-08-01', 'monthly', 'Office Admin', 85.00, 'scheduled'),
(11, 'Server Backup', '2023-07-10', 'weekly', 'IT Support', 0.00, 'scheduled'),
(12, 'Network Check', '2023-09-01', 'monthly', 'IT Support', 0.00, 'scheduled'),
(15, 'Descaling', '2023-07-20', 'monthly', 'Office Admin', 20.00, 'scheduled');


CREATE TABLE asset_documents (
    document_id INT AUTO_INCREMENT PRIMARY KEY,
    asset_id INT NOT NULL,
    document_type ENUM('manual', 'warranty', 'invoice', 'contract', 'other') NOT NULL,
    file_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    uploaded_by INT,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    notes TEXT,
    FOREIGN KEY (asset_id) REFERENCES assets(asset_id) ON DELETE CASCADE,
    FOREIGN KEY (uploaded_by) REFERENCES users(user_id)
);


INSERT INTO asset_documents (asset_id, document_type, file_name, file_path, uploaded_by, notes) VALUES
(1, 'manual', 'desktop_manual.pdf', '/documents/manuals/desktop_manual.pdf', 1, 'User manual for the desktop PC'),
(1, 'warranty', 'desktop_warranty.pdf', '/documents/warranties/desktop_warranty.pdf', 1, '3-year warranty document'),
(2, 'manual', 'projector_manual.pdf', '/documents/manuals/projector_manual.pdf', 1, 'User manual for the projector'),
(3, 'invoice', 'laptop_invoice.pdf', '/documents/invoices/laptop_invoice.pdf', 1, 'Purchase invoice for Dell XPS laptop'),
(11, 'contract', 'server_maintenance_contract.pdf', '/documents/contracts/server_maintenance_contract.pdf', 1, 'Annual maintenance contract');


CREATE TABLE asset_checkout_requests (
    request_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    asset_id INT,
    asset_type VARCHAR(50),
    request_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    needed_from_date DATE NOT NULL,
    needed_until_date DATE,
    purpose TEXT NOT NULL,
    status ENUM('pending', 'approved', 'rejected', 'completed', 'cancelled') DEFAULT 'pending',
    approved_by INT,
    approval_date DATETIME,
    notes TEXT,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (asset_id) REFERENCES assets(asset_id),
    FOREIGN KEY (approved_by) REFERENCES users(user_id)
);


INSERT INTO asset_checkout_requests (user_id, asset_id, needed_from_date, needed_until_date, purpose, status, approved_by, approval_date) VALUES
(3, 13, '2023-07-15', '2023-07-20', 'Client presentation', 'approved', 2, '2023-07-10 14:30:00'),
(3, 8, '2023-08-01', '2023-08-15', 'Remote work during travel', 'pending', NULL, NULL),
(2, NULL, '2023-07-25', '2023-07-26', 'Need a projector for team meeting', 'approved', 1, '2023-07-20 09:15:00'),
(3, 4, '2023-09-01', '2023-12-31', 'Need company phone for new project', 'pending', NULL, NULL);

-- Create audit_departments table (if not already exists from asset management)
CREATE TABLE IF NOT EXISTS departments (
    department_id INT AUTO_INCREMENT PRIMARY KEY,
    department_name VARCHAR(100) NOT NULL,
    department_code VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create audit_types table
CREATE TABLE audit_types (
    audit_type_id INT AUTO_INCREMENT PRIMARY KEY,
    type_name VARCHAR(100) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create auditors table
CREATE TABLE auditors (
    auditor_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE,
    phone VARCHAR(20),
    is_internal BOOLEAN DEFAULT TRUE,
    organization VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create audits table (main table)
CREATE TABLE audits (
    audit_id INT AUTO_INCREMENT PRIMARY KEY,
    department_id INT NOT NULL,
    audit_type_id INT NOT NULL,
    audit_date DATE NOT NULL,
    start_date DATE,
    end_date DATE,
    status ENUM('planned', 'in_progress', 'completed', 'cancelled') DEFAULT 'planned',
    lead_auditor_id INT,
    summary TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (department_id) REFERENCES departments(department_id),
    FOREIGN KEY (audit_type_id) REFERENCES audit_types(audit_type_id),
    FOREIGN KEY (lead_auditor_id) REFERENCES auditors(auditor_id)
);

-- Create audit_team table (for multiple auditors per audit)
CREATE TABLE audit_team (
    audit_team_id INT AUTO_INCREMENT PRIMARY KEY,
    audit_id INT NOT NULL,
    auditor_id INT NOT NULL,
    role VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (audit_id) REFERENCES audits(audit_id) ON DELETE CASCADE,
    FOREIGN KEY (auditor_id) REFERENCES auditors(auditor_id)
);

-- Create findings table
CREATE TABLE findings (
    finding_id INT AUTO_INCREMENT PRIMARY KEY,
    audit_id INT NOT NULL,
    finding_type ENUM('non_conformity', 'observation', 'opportunity', 'positive') NOT NULL,
    severity ENUM('critical', 'major', 'minor', 'info') NOT NULL,
    description TEXT NOT NULL,
    evidence TEXT,
    status ENUM('open', 'in_progress', 'closed', 'verified') DEFAULT 'open',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (audit_id) REFERENCES audits(audit_id) ON DELETE CASCADE
);

-- Create corrective_actions table
CREATE TABLE corrective_actions (
    action_id INT AUTO_INCREMENT PRIMARY KEY,
    finding_id INT NOT NULL,
    description TEXT NOT NULL,
    assigned_to VARCHAR(100),
    due_date DATE,
    completion_date DATE,
    status ENUM('planned', 'in_progress', 'completed', 'verified', 'overdue') DEFAULT 'planned',
    verification_notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (finding_id) REFERENCES findings(finding_id) ON DELETE CASCADE
);

-- Create audit_documents table
CREATE TABLE audit_documents (
    document_id INT AUTO_INCREMENT PRIMARY KEY,
    audit_id INT NOT NULL,
    document_type ENUM('plan', 'checklist', 'report', 'evidence', 'other') NOT NULL,
    file_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    uploaded_by VARCHAR(100),
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    notes TEXT,
    FOREIGN KEY (audit_id) REFERENCES audits(audit_id) ON DELETE CASCADE
);

-- Create audit_schedule table
CREATE TABLE audit_schedule (
    schedule_id INT AUTO_INCREMENT PRIMARY KEY,
    department_id INT NOT NULL,
    audit_type_id INT NOT NULL,
    planned_date DATE NOT NULL,
    frequency ENUM('one_time', 'monthly', 'quarterly', 'semi_annual', 'annual') DEFAULT 'one_time',
    last_audit_date DATE,
    next_audit_date DATE,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (department_id) REFERENCES departments(department_id),
    FOREIGN KEY (audit_type_id) REFERENCES audit_types(audit_type_id)
);

-- Create audit_standards table
CREATE TABLE audit_standards (
    standard_id INT AUTO_INCREMENT PRIMARY KEY,
    standard_name VARCHAR(100) NOT NULL,
    standard_number VARCHAR(50),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create audit_standard_mapping table (many-to-many relationship)
CREATE TABLE audit_standard_mapping (
    mapping_id INT AUTO_INCREMENT PRIMARY KEY,
    audit_id INT NOT NULL,
    standard_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (audit_id) REFERENCES audits(audit_id) ON DELETE CASCADE,
    FOREIGN KEY (standard_id) REFERENCES audit_standards(standard_id)
);

-- Create audit_checklists table
CREATE TABLE audit_checklists (
    checklist_id INT AUTO_INCREMENT PRIMARY KEY,
    audit_type_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (audit_type_id) REFERENCES audit_types(audit_type_id)
);

-- Create checklist_items table
CREATE TABLE checklist_items (
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    checklist_id INT NOT NULL,
    question TEXT NOT NULL,
    guidance TEXT,
    standard_reference VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (checklist_id) REFERENCES audit_checklists(checklist_id) ON DELETE CASCADE
);

-- Create audit_responses table
CREATE TABLE audit_responses (
    response_id INT AUTO_INCREMENT PRIMARY KEY,
    audit_id INT NOT NULL,
    item_id INT NOT NULL,
    response ENUM('compliant', 'non_compliant', 'partial', 'not_applicable') NOT NULL,
    notes TEXT,
    evidence TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (audit_id) REFERENCES audits(audit_id) ON DELETE CASCADE,
    FOREIGN KEY (item_id) REFERENCES checklist_items(item_id)
);

-- Insert sample data for departments (if not already exists)
INSERT INTO departments (department_name, department_code) 
SELECT * FROM (SELECT 'Logistics', 'LOG') AS tmp
WHERE NOT EXISTS (
    SELECT department_name FROM departments WHERE department_name = 'Logistics'
) LIMIT 1;

INSERT INTO departments (department_name, department_code) 
SELECT * FROM (SELECT 'Procurement', 'PROC') AS tmp
WHERE NOT EXISTS (
    SELECT department_name FROM departments WHERE department_name = 'Procurement'
) LIMIT 1;

INSERT INTO departments (department_name, department_code) 
SELECT * FROM (SELECT 'Quality Assurance', 'QA') AS tmp
WHERE NOT EXISTS (
    SELECT department_name FROM departments WHERE department_name = 'Quality Assurance'
) LIMIT 1;

INSERT INTO departments (department_name, department_code) 
SELECT * FROM (SELECT 'Production', 'PROD') AS tmp
WHERE NOT EXISTS (
    SELECT department_name FROM departments WHERE department_name = 'Production'
) LIMIT 1;

-- Insert sample data for audit_types
INSERT INTO audit_types (type_name, description) VALUES
('Internal Audit', 'Regular audits conducted by internal staff to ensure compliance with company policies'),
('External Audit', 'Audits conducted by third-party organizations for certification or regulatory purposes'),
('Compliance Audit', 'Audits specifically focused on regulatory compliance'),
('Process Audit', 'Audits focused on specific business processes'),
('System Audit', 'Audits of management systems such as quality or environmental management systems');

-- Insert sample data for auditors
INSERT INTO auditors (first_name, last_name, email, phone, is_internal, organization) VALUES
('John', 'Smith', 'john.smith@company.com', '555-123-4567', TRUE, 'Internal Audit Department'),
('Sarah', 'Johnson', 'sarah.johnson@company.com', '555-234-5678', TRUE, 'Quality Assurance'),
('Michael', 'Brown', 'michael.brown@externalfirm.com', '555-345-6789', FALSE, 'ABC Certification Body'),
('Emily', 'Davis', 'emily.davis@company.com', '555-456-7890', TRUE, 'Compliance Department'),
('Robert', 'Wilson', 'robert.wilson@auditfirm.com', '555-567-8901', FALSE, 'XYZ Audit Services');

-- Insert sample data for audits
INSERT INTO audits (department_id, audit_type_id, audit_date, start_date, end_date, status, lead_auditor_id, summary) VALUES
((SELECT department_id FROM departments WHERE department_name = 'Logistics'), 1, '2025-04-01', '2025-04-01', '2025-04-03', 'completed', 1, 'Annual internal audit of logistics department processes'),
((SELECT department_id FROM departments WHERE department_name = 'Procurement'), 1, '2025-03-15', '2025-03-15', '2025-03-16', 'completed', 2, 'Quarterly review of procurement processes and vendor management'),
((SELECT department_id FROM departments WHERE department_name = 'Quality Assurance'), 2, '2025-05-10', '2025-05-10', '2025-05-12', 'planned', 3, 'ISO 9001 certification audit'),
((SELECT department_id FROM departments WHERE department_name = 'Production'), 4, '2025-02-20', '2025-02-20', '2025-02-22', 'completed', 1, 'Process audit of manufacturing line efficiency'),
((SELECT department_id FROM departments WHERE department_name = 'Logistics'), 3, '2025-06-15', '2025-06-15', NULL, 'planned', 4, 'Compliance audit for new transportation regulations');

-- Insert sample data for audit_team
INSERT INTO audit_team (audit_id, auditor_id, role) VALUES
(1, 1, 'Lead Auditor'),
(1, 2, 'Team Member'),
(2, 2, 'Lead Auditor'),
(2, 4, 'Team Member'),
(3, 3, 'Lead Auditor'),
(3, 5, 'Team Member'),
(4, 1, 'Lead Auditor'),
(5, 4, 'Lead Auditor'),
(5, 2, 'Team Member');

-- Insert sample data for findings
INSERT INTO findings (audit_id, finding_type, severity, description, evidence, status) VALUES
(1, 'non_conformity', 'major', 'Inventory mismatch detected', 'Physical count showed 15% discrepancy with system records', 'open'),
(1, 'observation', 'minor', 'Receiving process documentation needs updating', 'Current documentation is dated 2023 and does not reflect new system implementation', 'open'),
(2, 'positive', 'info', 'Vendor evaluation process is well-implemented', 'All vendors have up-to-date evaluations and proper documentation', 'closed'),
(4, 'non_conformity', 'minor', 'Preventive maintenance schedule not followed', 'Two machines missed scheduled maintenance in January', 'in_progress'),
(4, 'opportunity', 'info', 'Potential for automation in quality checking process', 'Manual checks could be replaced with vision system for higher accuracy', 'open');

-- Insert sample data for corrective_actions
INSERT INTO corrective_actions (finding_id, description, assigned_to, due_date, completion_date, status) VALUES
(1, 'Conduct full inventory reconciliation and identify root cause of discrepancy', 'James Wilson', '2025-04-30', NULL, 'in_progress'),
(1, 'Implement cycle counting procedure to prevent future mismatches', 'James Wilson', '2025-05-15', NULL, 'planned'),
(2, 'Update receiving process documentation to reflect new system', 'Maria Garcia', '2025-04-20', NULL, 'planned'),
(4, 'Reschedule missed maintenance and perform immediately', 'David Lee', '2025-03-01', '2025-02-28', 'completed'),
(4, 'Review and update preventive maintenance scheduling system', 'David Lee', '2025-03-15', NULL, 'in_progress');

-- Insert sample data for audit_standards
INSERT INTO audit_standards (standard_name, standard_number, description) VALUES
('ISO 9001', 'ISO 9001:2015', 'Quality Management System requirements'),
('ISO 14001', 'ISO 14001:2015', 'Environmental Management System requirements'),
('ISO 45001', 'ISO 45001:2018', 'Occupational Health and Safety Management System'),
('GMP', 'Good Manufacturing Practices', 'Guidelines for manufacturing, testing, and quality assurance'),
('GDP', 'Good Distribution Practices', 'Guidelines for proper distribution practices for pharmaceutical products');

-- Insert sample data for audit_standard_mapping
INSERT INTO audit_standard_mapping (audit_id, standard_id) VALUES
(1, 5), -- Logistics audit mapped to GDP
(2, 1), -- Procurement audit mapped to ISO 9001
(3, 1), -- QA audit mapped to ISO 9001
(3, 2), -- QA audit also mapped to ISO 14001
(4, 4); -- Production audit mapped to GMP

-- Insert sample data for audit_checklists
INSERT INTO audit_checklists (audit_type_id, title, description) VALUES
(1, 'Internal Quality Audit Checklist', 'Standard checklist for internal quality audits'),
(2, 'ISO 9001 Audit Checklist', 'Comprehensive checklist for ISO 9001 certification audits'),
(3, 'Regulatory Compliance Checklist', 'Checklist for verifying compliance with regulations'),
(4, 'Process Efficiency Audit Checklist', 'Checklist for evaluating process efficiency and effectiveness'),
(5, 'Management System Audit Checklist', 'Checklist for auditing management systems');

-- Insert sample data for checklist_items
INSERT INTO checklist_items (checklist_id, question, guidance, standard_reference) VALUES
(1, 'Are quality policies documented and communicated to all employees?', 'Check for policy documents and evidence of communication', 'ISO 9001:2015 5.2'),
(1, 'Is there a process for handling nonconforming products?', 'Verify procedure exists and is followed', 'ISO 9001:2015 8.7'),
(2, 'Has the organization determined external and internal issues relevant to its purpose?', 'Look for context analysis documentation', 'ISO 9001:2015 4.1'),
(2, 'Are quality objectives established at relevant functions, levels and processes?', 'Check for documented objectives and their monitoring', 'ISO 9001:2015 6.2'),
(3, 'Are all required licenses and permits current and available?', 'Check expiration dates and completeness', 'Regulatory Requirement'),
(3, 'Are employees trained on relevant regulatory requirements?', 'Verify training records', 'Regulatory Requirement'),
(4, 'Is the process flow documented and optimized?', 'Check process maps and look for bottlenecks', 'Process Efficiency'),
(4, 'Are key performance indicators defined and monitored?', 'Verify KPIs and their tracking mechanism', 'Process Efficiency'),
(5, 'Is management review conducted at planned intervals?', 'Check management review minutes and schedule', 'ISO 9001:2015 9.3'),
(5, 'Is there a process for addressing risks and opportunities?', 'Verify risk assessment documentation', 'ISO 9001:2015 6.1');

-- Insert sample data for audit_responses
INSERT INTO audit_responses (audit_id, item_id, response, notes, evidence) VALUES
(1, 7, 'non_compliant', 'Process flow documentation is outdated', 'Current flow chart dated 2022, does not include new warehouse area'),
(1, 8, 'partial', 'KPIs defined but not consistently monitored', 'Monthly reports missing for February and March'),
(2, 1, 'compliant', 'Quality policy well documented and posted in all areas', 'Policy document rev.3 dated 2024-01-15, communication emails, posters observed'),
(2, 2, 'compliant', 'Nonconforming product procedure in place and followed', 'Procedure QP-023 rev.2, records of recent nonconformities properly handled'),
(4, 7, 'compliant', 'Process flow well documented with recent optimization', 'Updated flow charts with time studies showing 15% improvement'),
(4, 8, 'compliant', 'Comprehensive KPI dashboard implemented', 'Daily and weekly KPI tracking observed with action plans for deviations');

-- Insert sample data for audit_schedule
INSERT INTO audit_schedule (department_id, audit_type_id, planned_date, frequency, last_audit_date, next_audit_date) VALUES
((SELECT department_id FROM departments WHERE department_name = 'Logistics'), 1, '2025-04-01', 'quarterly', '2025-04-03', '2025-07-01'),
((SELECT department_id FROM departments WHERE department_name = 'Procurement'), 1, '2025-03-15', 'quarterly', '2025-03-16', '2025-06-15'),
((SELECT department_id FROM departments WHERE department_name = 'Quality Assurance'), 2, '2025-05-10', 'annual', NULL, '2025-05-10'),
((SELECT department_id FROM departments WHERE department_name = 'Production'), 4, '2025-02-20', 'semi_annual', '2025-02-22', '2025-08-20'),
((SELECT department_id FROM departments WHERE department_name = 'Logistics'), 3, '2025-06-15', 'annual', NULL, '2025-06-15');

-- Insert sample data for audit_documents
INSERT INTO audit_documents (audit_id, document_type, file_name, file_path, uploaded_by, notes) VALUES
(1, 'plan', 'logistics_audit_plan.pdf', '/documents/audit/plans/logistics_audit_plan.pdf', 'John Smith', 'Detailed audit plan with scope and schedule'),
(1, 'report', 'logistics_audit_report.pdf', '/documents/audit/reports/logistics_audit_report.pdf', 'John Smith', 'Final audit report with findings'),
(2, 'plan', 'procurement_audit_plan.pdf', '/documents/audit/plans/procurement_audit_plan.pdf', 'Sarah Johnson', 'Audit plan for procurement department'),
(2, 'checklist', 'procurement_audit_checklist.xlsx', '/documents/audit/checklists/procurement_audit_checklist.xlsx', 'Sarah Johnson', 'Completed audit checklist'),
(2, 'report', 'procurement_audit_report.pdf', '/documents/audit/reports/procurement_audit_report.pdf', 'Sarah Johnson', 'Final audit report with no findings'),
(4, 'evidence', 'production_maintenance_records.pdf', '/documents/audit/evidence/production_maintenance_records.pdf', 'John Smith', 'Evidence of missed maintenance');

-- Create a view for recent audits (matching the PHP page display)
CREATE VIEW recent_audits_view AS
SELECT 
    d.department_name AS Department,
    a.audit_date AS Date,
    CASE 
        WHEN EXISTS (SELECT 1 FROM findings f WHERE f.audit_id = a.audit_id AND f.finding_type = 'non_conformity') 
        THEN 'Inventory mismatch detected' 
        ELSE 'No issues found' 
    END AS Findings
FROM 
    audits a
JOIN 
    departments d ON a.department_id = d.department_id
WHERE 
    a.status = 'completed'
ORDER BY 
    a.audit_date DESC
LIMIT 10;

-- Create a stored procedure to get audit findings by department
DELIMITER //
CREATE PROCEDURE GetAuditFindingsByDepartment(IN dept_name VARCHAR(100))
BEGIN
    SELECT 
        a.audit_date,
        at.type_name AS audit_type,
        f.finding_type,
        f.severity,
        f.description,
        f.status
    FROM 
        findings f
    JOIN 
        audits a ON f.audit_id = a.audit_id
    JOIN 
        departments d ON a.department_id = d.department_id
    JOIN 
        audit_types at ON a.audit_type_id = at.audit_type_id
    WHERE 
        d.department_name = dept_name
    ORDER BY 
        a.audit_date DESC, f.severity ASC;
END //
DELIMITER ;

-- Create a stored procedure to schedule a new audit
DELIMITER //
CREATE PROCEDURE ScheduleNewAudit(
    IN dept_name VARCHAR(100),
    IN audit_type VARCHAR(100),
    IN planned_date DATE,
    IN audit_frequency VARCHAR(20),
    OUT success BOOLEAN
)
BEGIN
    DECLARE dept_id INT;
    DECLARE type_id INT;
    
    -- Get department ID
    SELECT department_id INTO dept_id FROM departments WHERE department_name = dept_name;
    
    -- Get audit type ID
    SELECT audit_type_id INTO type_id FROM audit_types WHERE type_name = audit_type;
    
    -- Check if department and audit type exist
    IF dept_id IS NULL OR type_id IS NULL THEN
        SET success = FALSE;
    ELSE
        -- Insert into audit_schedule
        INSERT INTO audit_schedule (department_id, audit_type_id, planned_date, frequency, next_audit_date)
        VALUES (dept_id, type_id, planned_date, audit_frequency, planned_date);
        
        SET success = TRUE;
    END IF;
END //
DELIMITER ;

-- Create a trigger to update next_audit_date when an audit is completed
DELIMITER //
CREATE TRIGGER update_next_audit_date
AFTER UPDATE ON audits
FOR EACH ROW
BEGIN
    IF NEW.status = 'completed' AND OLD.status != 'completed' THEN
        UPDATE audit_schedule
        SET 
            last_audit_date = NEW.end_date,
            next_audit_date = CASE 
                WHEN frequency = 'monthly' THEN DATE_ADD(NEW.end_date, INTERVAL 1 MONTH)
                WHEN frequency = 'quarterly' THEN DATE_ADD(NEW.end_date, INTERVAL 3 MONTH)
                WHEN frequency = 'semi_annual' THEN DATE_ADD(NEW.end_date, INTERVAL 6 MONTH)
                WHEN frequency = 'annual' THEN DATE_ADD(NEW.end_date, INTERVAL 1 YEAR)
                ELSE NULL
            END
        WHERE 
            department_id = NEW.department_id AND 
            audit_type_id = NEW.audit_type_id;
    END IF;
END //
DELIMITER ;

-- Create a function to calculate audit statistics
DELIMITER //
CREATE FUNCTION GetAuditComplianceRate(audit_id INT) 
RETURNS DECIMAL(5,2)
DETERMINISTIC
BEGIN
    DECLARE total_responses INT;
    DECLARE compliant_responses INT;
    DECLARE compliance_rate DECIMAL(5,2);
    
    -- Get total responses
    SELECT COUNT(*) INTO total_responses 
    FROM audit_responses 
    WHERE audit_responses.audit_id = audit_id;
    
    -- Get compliant responses
    SELECT COUNT(*) INTO compliant_responses 
    FROM audit_responses 
    WHERE audit_responses.audit_id = audit_id 
    AND response IN ('compliant');
    
    -- Calculate compliance rate
    IF total_responses > 0 THEN
        SET compliance_rate = (compliant_responses / total_responses) * 100;
    ELSE
        SET compliance_rate = 0;
    END IF;
    
    RETURN compliance_rate;
END //
DELIMITER ;

-- Create an index for better performance
CREATE INDEX idx_audit_date ON audits(audit_date);
CREATE INDEX idx_finding_status ON findings(status);
CREATE INDEX idx_department_id ON audits(department_id);

-- Create the database (uncomment if you need to create a new database)
-- CREATE DATABASE document_tracking;
-- USE document_tracking;

-- Create roles table
CREATE TABLE roles (
    role_id INT AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(50) NOT NULL UNIQUE,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create departments table
CREATE TABLE departments (
    department_id INT AUTO_INCREMENT PRIMARY KEY,
    department_name VARCHAR(100) NOT NULL,
    department_code VARCHAR(10),
    manager_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Create users table
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    department_id INT,
    role_id INT NOT NULL,
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (department_id) REFERENCES departments(department_id),
    FOREIGN KEY (role_id) REFERENCES roles(role_id)
);

-- Update departments table with manager_id foreign key
ALTER TABLE departments
ADD CONSTRAINT fk_manager
FOREIGN KEY (manager_id) REFERENCES users(user_id);

-- Create document_types table
CREATE TABLE document_types (
    document_type_id INT AUTO_INCREMENT PRIMARY KEY,
    type_name VARCHAR(50) NOT NULL,
    type_code VARCHAR(10) NOT NULL UNIQUE,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create approval_levels table
CREATE TABLE approval_levels (
    level_id INT AUTO_INCREMENT PRIMARY KEY,
    level_name VARCHAR(50) NOT NULL,
    level_order INT NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create document_type_approval_workflow table
CREATE TABLE document_type_approval_workflow (
    workflow_id INT AUTO_INCREMENT PRIMARY KEY,
    document_type_id INT NOT NULL,
    level_id INT NOT NULL,
    approver_role_id INT,
    approver_department_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (document_type_id) REFERENCES document_types(document_type_id),
    FOREIGN KEY (level_id) REFERENCES approval_levels(level_id),
    FOREIGN KEY (approver_role_id) REFERENCES roles(role_id),
    FOREIGN KEY (approver_department_id) REFERENCES departments(department_id)
);

-- Create documents table
CREATE TABLE documents (
    document_id INT AUTO_INCREMENT PRIMARY KEY,
    reference_number VARCHAR(50) NOT NULL UNIQUE,
    document_type_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    file_path VARCHAR(255),
    created_by INT NOT NULL,
    current_approval_level INT DEFAULT 1,
    status ENUM('Draft', 'Pending', 'In Review', 'Approved', 'Rejected', 'Cancelled') DEFAULT 'Draft',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (document_type_id) REFERENCES document_types(document_type_id),
    FOREIGN KEY (created_by) REFERENCES users(user_id),
    FOREIGN KEY (current_approval_level) REFERENCES approval_levels(level_id)
);

-- Create document_approvals table
CREATE TABLE document_approvals (
    approval_id INT AUTO_INCREMENT PRIMARY KEY,
    document_id INT NOT NULL,
    level_id INT NOT NULL,
    approver_id INT,
    department_id INT,
    status ENUM('Pending', 'In Review', 'Approved', 'Rejected') DEFAULT 'Pending',
    comments TEXT,
    approved_at TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (document_id) REFERENCES documents(document_id),
    FOREIGN KEY (level_id) REFERENCES approval_levels(level_id),
    FOREIGN KEY (approver_id) REFERENCES users(user_id),
    FOREIGN KEY (department_id) REFERENCES departments(department_id)
);

-- Create document_history table
CREATE TABLE document_history (
    history_id INT AUTO_INCREMENT PRIMARY KEY,
    document_id INT NOT NULL,
    action VARCHAR(50) NOT NULL,
    action_by INT NOT NULL,
    comments TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (document_id) REFERENCES documents(document_id),
    FOREIGN KEY (action_by) REFERENCES users(user_id)
);

-- Create notifications table
CREATE TABLE notifications (
    notification_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    document_id INT NOT NULL,
    message TEXT NOT NULL,
    is_read BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (document_id) REFERENCES documents(document_id)
);

-- Create document_metadata table for additional document properties
CREATE TABLE document_metadata (
    metadata_id INT AUTO_INCREMENT PRIMARY KEY,
    document_id INT NOT NULL,
    metadata_key VARCHAR(50) NOT NULL,
    metadata_value TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (document_id) REFERENCES documents(document_id),
    UNIQUE KEY unique_document_metadata (document_id, metadata_key)
);

-- Create document_comments table
CREATE TABLE document_comments (
    comment_id INT AUTO_INCREMENT PRIMARY KEY,
    document_id INT NOT NULL,
    user_id INT NOT NULL,
    comment TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (document_id) REFERENCES documents(document_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Create document_tags table
CREATE TABLE document_tags (
    tag_id INT AUTO_INCREMENT PRIMARY KEY,
    tag_name VARCHAR(50) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create document_tag_mapping table
CREATE TABLE document_tag_mapping (
    mapping_id INT AUTO_INCREMENT PRIMARY KEY,
    document_id INT NOT NULL,
    tag_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (document_id) REFERENCES documents(document_id),
    FOREIGN KEY (tag_id) REFERENCES document_tags(tag_id),
    UNIQUE KEY unique_document_tag (document_id, tag_id)
);

-- Insert sample data

-- Insert roles
INSERT INTO roles (role_name, description) VALUES
('admin', 'System administrator with full access'),
('manager', 'Department manager with approval rights'),
('employee', 'Regular employee with document creation rights'),
('viewer', 'User with read-only access');

-- Insert departments
INSERT INTO departments (department_name, department_code) VALUES
('Finance', 'FIN'),
('Human Resources', 'HR'),
('Logistics', 'LOG'),
('Information Technology', 'IT'),
('Operations', 'OPS'),
('Procurement', 'PROC');

-- Insert users (password is 'password' hashed with bcrypt)
INSERT INTO users (username, password, first_name, last_name, email, department_id, role_id) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Admin', 'User', 'admin@company.com', 4, 1),
('finance_mgr', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Finance', 'Manager', 'finance@company.com', 1, 2),
('hr_mgr', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'HR', 'Manager', 'hr@company.com', 2, 2),
('logistics_mgr', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Logistics', 'Manager', 'logistics@company.com', 3, 2),
('employee1', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'John', 'Doe', 'john@company.com', 5, 3),
('employee2', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Jane', 'Smith', 'jane@company.com', 6, 3),
('viewer1', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'View', 'User', 'viewer@company.com', NULL, 4);

-- Update departments with managers
UPDATE departments SET manager_id = 2 WHERE department_id = 1; -- Finance
UPDATE departments SET manager_id = 3 WHERE department_id = 2; -- HR
UPDATE departments SET manager_id = 4 WHERE department_id = 3; -- Logistics
UPDATE departments SET manager_id = 1 WHERE department_id = 4; -- IT

-- Insert document types
INSERT INTO document_types (type_name, type_code, description) VALUES
('Purchase Order', 'PO', 'Document for purchasing goods or services'),
('Memorandum', 'MEMO', 'Internal communication document'),
('Delivery Receipt', 'DR', 'Document confirming delivery of goods'),
('Invoice', 'INV', 'Billing document for goods or services'),
('Contract', 'CONT', 'Legal agreement document');

-- Insert approval levels
INSERT INTO approval_levels (level_name, level_order, description) VALUES
('Department Review', 1, 'Initial review by department'),
('Manager Approval', 2, 'Approval by department manager'),
('Finance Review', 3, 'Review by finance department'),
('Final Approval', 4, 'Final approval by authorized personnel');

-- Insert document type approval workflows
INSERT INTO document_type_approval_workflow (document_type_id, level_id, approver_role_id, approver_department_id) VALUES
-- Purchase Order workflow
(1, 1, 3, 6), -- Employee in Procurement
(1, 2, 2, 6), -- Manager in Procurement
(1, 3, 2, 1), -- Manager in Finance
(1, 4, 2, 5), -- Manager in Operations

-- Memorandum workflow
(2, 1, 3, NULL), -- Any employee
(2, 2, 2, 2), -- Manager in HR
(2, 4, 1, NULL), -- Admin

-- Delivery Receipt workflow
(3, 1, 3, 3), -- Employee in Logistics
(3, 2, 2, 3), -- Manager in Logistics
(3, 3, 2, 1), -- Manager in Finance
(3, 4, 2, 5); -- Manager in Operations

-- Insert sample documents
INSERT INTO documents (reference_number, document_type_id, title, description, created_by, current_approval_level, status) VALUES
('PO#00123', 1, 'Office Supplies Purchase', 'Purchase order for Q2 office supplies', 6, 3, 'Pending'),
('Memo#998', 2, 'Work From Home Policy Update', 'Updated policy for hybrid work arrangements', 5, 2, 'Pending'),
('DR#0420', 3, 'IT Equipment Delivery', 'Delivery of new laptops and monitors', 5, 2, 'In Review');

-- Insert document approvals
INSERT INTO document_approvals (document_id, level_id, department_id, status) VALUES
-- PO#00123 approvals
(1, 1, 6, 'Approved'), -- Procurement department review
(1, 2, 6, 'Approved'), -- Procurement manager approval
(1, 3, 1, 'Pending'), -- Finance department review
(1, 4, 5, 'Pending'), -- Operations final approval

-- Memo#998 approvals
(2, 1, NULL, 'Approved'), -- Any employee review
(2, 2, 2, 'Pending'), -- HR manager approval
(2, 4, NULL, 'Pending'), -- Admin final approval

-- DR#0420 approvals
(3, 1, 3, 'Approved'), -- Logistics employee review
(3, 2, 3, 'In Review'), -- Logistics manager approval
(3, 3, 1, 'Pending'), -- Finance department review
(3, 4, 5, 'Pending'); -- Operations final approval

-- Insert document history
INSERT INTO document_history (document_id, action, action_by, comments) VALUES
(1, 'Created', 6, 'Initial document creation'),
(1, 'Submitted for Approval', 6, 'Submitted to procurement department'),
(1, 'Approved', 6, 'Approved by procurement department'),
(1, 'Forwarded', 6, 'Forwarded to procurement manager'),
(1, 'Approved', 6, 'Approved by procurement manager'),
(1, 'Forwarded', 6, 'Forwarded to finance department'),

(2, 'Created', 5, 'Initial document creation'),
(2, 'Submitted for Approval', 5, 'Submitted for initial review'),
(2, 'Approved', 5, 'Passed initial review'),
(2, 'Forwarded', 5, 'Forwarded to HR department'),

(3, 'Created', 5, 'Initial document creation'),
(3, 'Submitted for Approval', 5, 'Submitted to logistics department'),
(3, 'Approved', 5, 'Approved by logistics department'),
(3, 'Forwarded', 5, 'Forwarded to logistics manager'),
(3, 'In Review', 4, 'Currently being reviewed by logistics manager');

-- Insert notifications
INSERT INTO notifications (user_id, document_id, message) VALUES
(2, 1, 'PO#00123 is awaiting your approval'),
(3, 2, 'Memo#998 is awaiting your approval'),
(4, 3, 'DR#0420 is awaiting your review');

-- Insert document metadata
INSERT INTO document_metadata (document_id, metadata_key, metadata_value) VALUES
(1, 'total_amount', '1250.00'),
(1, 'vendor', 'Office Supplies Inc.'),
(1, 'payment_terms', 'Net 30'),
(2, 'effective_date', '2025-05-01'),
(2, 'expiration_date', '2026-04-30'),
(3, 'delivery_date', '2025-04-15'),
(3, 'carrier', 'FastShip Logistics');

-- Insert document tags
INSERT INTO document_tags (tag_name) VALUES
('Urgent'),
('Confidential'),
('Budget 2025'),
('IT Equipment'),
('Policy'),
('Vendor');

-- Insert document tag mappings
INSERT INTO document_tag_mapping (document_id, tag_id) VALUES
(1, 3), -- PO#00123 - Budget 2025
(1, 6), -- PO#00123 - Vendor
(2, 2), -- Memo#998 - Confidential
(2, 5), -- Memo#998 - Policy
(3, 1), -- DR#0420 - Urgent
(3, 4); -- DR#0420 - IT Equipment

-- Create views for easier data access

-- View for pending approvals (matching the PHP page display)
CREATE VIEW pending_approvals_view AS
SELECT 
    d.document_id,
    d.reference_number,
    dt.type_name AS document_type,
    dt.type_code,
    d.title,
    d.status,
    CASE 
        WHEN da.department_id IS NOT NULL THEN dep.department_name
        ELSE 'Multiple Departments'
    END AS awaiting_approval_from
FROM 
    documents d
JOIN 
    document_types dt ON d.document_type_id = dt.document_type_id
JOIN 
    document_approvals da ON d.document_id = da.document_id AND da.status IN ('Pending', 'In Review')
LEFT JOIN 
    departments dep ON da.department_id = dep.department_id
WHERE 
    d.status IN ('Pending', 'In Review')
ORDER BY 
    d.created_at DESC;

-- View for user's pending tasks
CREATE VIEW user_pending_tasks_view AS
SELECT 
    u.user_id,
    u.username,
    d.document_id,
    d.reference_number,
    dt.type_name AS document_type,
    d.title,
    da.status,
    da.created_at AS assigned_at
FROM 
    users u
JOIN 
    departments dep ON u.department_id = dep.department_id
JOIN 
    document_approvals da ON dep.department_id = da.department_id
JOIN 
    documents d ON da.document_id = d.document_id
JOIN 
    document_types dt ON d.document_type_id = dt.document_type_id
WHERE 
    da.status IN ('Pending', 'In Review')
    AND (da.approver_id IS NULL OR da.approver_id = u.user_id)
ORDER BY 
    da.created_at ASC;

-- View for document approval history
CREATE VIEW document_approval_history_view AS
SELECT 
    d.document_id,
    d.reference_number,
    dt.type_name AS document_type,
    al.level_name AS approval_level,
    CASE 
        WHEN da.department_id IS NOT NULL THEN dep.department_name
        ELSE 'N/A'
    END AS department,
    CASE 
        WHEN da.approver_id IS NOT NULL THEN CONCAT(u.first_name, ' ', u.last_name)
        ELSE 'Not Assigned'
    END AS approver,
    da.status,
    da.comments,
    da.approved_at
FROM 
    documents d
JOIN 
    document_types dt ON d.document_type_id = dt.document_type_id
JOIN 
    document_approvals da ON d.document_id = da.document_id
JOIN 
    approval_levels al ON da.level_id = al.level_id
LEFT JOIN 
    departments dep ON da.department_id = dep.department_id
LEFT JOIN 
    users u ON da.approver_id = u.user_id
ORDER BY 
    d.document_id, al.level_order;

-- Create stored procedures

-- Procedure to submit a document for approval
DELIMITER //
CREATE PROCEDURE submit_document_for_approval(
    IN p_document_id INT,
    IN p_submitted_by INT,
    OUT p_success BOOLEAN
)
BEGIN
    DECLARE v_document_type_id INT;
    DECLARE v_current_status VARCHAR(20);
    
    -- Get document information
    SELECT document_type_id, status INTO v_document_type_id, v_current_status
    FROM documents
    WHERE document_id = p_document_id;
    
    -- Check if document exists and is in draft status
    IF v_document_type_id IS NULL THEN
        SET p_success = FALSE;
    ELSEIF v_current_status != 'Draft' THEN
        SET p_success = FALSE;
    ELSE
        -- Update document status
        UPDATE documents
        SET status = 'Pending', current_approval_level = 1
        WHERE document_id = p_document_id;
        
        -- Add to document history
        INSERT INTO document_history (document_id, action, action_by, comments)
        VALUES (p_document_id, 'Submitted for Approval', p_submitted_by, 'Document submitted for approval process');
        
        -- Create approval entries based on workflow
        INSERT INTO document_approvals (document_id, level_id, department_id, status)
        SELECT p_document_id, dtaw.level_id, dtaw.approver_department_id, 'Pending'
        FROM document_type_approval_workflow dtaw
        WHERE dtaw.document_type_id = v_document_type_id
        ORDER BY dtaw.level_id;
        
        -- Create notifications for first level approvers
        INSERT INTO notifications (user_id, document_id, message)
        SELECT u.user_id, p_document_id, CONCAT('Document ', 
            (SELECT reference_number FROM documents WHERE document_id = p_document_id), 
            ' requires your approval')
        FROM users u
        JOIN departments d ON u.department_id = d.department_id
        WHERE d.department_id = (
            SELECT approver_department_id 
            FROM document_type_approval_workflow 
            WHERE document_type_id = v_document_type_id AND level_id = 1
        )
        AND u.role_id = (
            SELECT approver_role_id 
            FROM document_type_approval_workflow 
            WHERE document_type_id = v_document_type_id AND level_id = 1
        );
        
        SET p_success = TRUE;
    END IF;
END //
DELIMITER ;

-- Procedure to approve a document
DELIMITER //
CREATE PROCEDURE approve_document(
    IN p_document_id INT,
    IN p_level_id INT,
    IN p_approver_id INT,
    IN p_comments TEXT,
    OUT p_success BOOLEAN
)
BEGIN
    DECLARE v_next_level INT;
    DECLARE v_max_level INT;
    DECLARE v_document_type_id INT;
    
    -- Get document information
    SELECT document_type_id INTO v_document_type_id
    FROM documents
    WHERE document_id = p_document_id;
    
    -- Get next approval level
    SELECT MIN(level_id) INTO v_next_level
    FROM document_type_approval_workflow
    WHERE document_type_id = v_document_type_id AND level_id > p_level_id;
    
    -- Get max approval level
    SELECT MAX(level_id) INTO v_max_level
    FROM document_type_approval_workflow
    WHERE document_type_id = v_document_type_id;
    
    -- Update current approval
    UPDATE document_approvals
    SET status = 'Approved', approver_id = p_approver_id, comments = p_comments, approved_at = NOW()
    WHERE document_id = p_document_id AND level_id = p_level_id;
    
    -- Add to document history
    INSERT INTO document_history (document_id, action, action_by, comments)
    VALUES (p_document_id, 'Approved', p_approver_id, p_comments);
    
    -- If this was the final approval level
    IF p_level_id = v_max_level THEN
        -- Update document status to Approved
        UPDATE documents
        SET status = 'Approved'
        WHERE document_id = p_document_id;
        
        -- Create notification for document creator
        INSERT INTO notifications (user_id, document_id, message)
        SELECT created_by, p_document_id, CONCAT('Your document ', reference_number, ' has been fully approved')
        FROM documents
        WHERE document_id = p_document_id;
        
        SET p_success = TRUE;
    ELSE
        -- Update document to next approval level
        UPDATE documents
        SET current_approval_level = v_next_level
        WHERE document_id = p_document_id;
        
        -- Create notifications for next level approvers
        INSERT INTO notifications (user_id, document_id, message)
        SELECT u.user_id, p_document_id, CONCAT('Document ', 
            (SELECT reference_number FROM documents WHERE document_id = p_document_id), 
            ' requires your approval')
        FROM users u
        JOIN departments d ON u.department_id = d.department_id
        WHERE d.department_id = (
            SELECT approver_department_id 
            FROM document_type_approval_workflow 
            WHERE document_type_id = v_document_type_id AND level_id = v_next_level
        )
        AND u.role_id = (
            SELECT approver_role_id 
            FROM document_type_approval_workflow 
            WHERE document_type_id = v_document_type_id AND level_id = v_next_level
        );
        
        SET p_success = TRUE;
    END IF;
END //
DELIMITER ;

-- Procedure to reject a document
DELIMITER //
CREATE PROCEDURE reject_document(
    IN p_document_id INT,
    IN p_level_id INT,
    IN p_approver_id INT,
    IN p_comments TEXT,
    OUT p_success BOOLEAN
)
BEGIN
    -- Update current approval
    UPDATE document_approvals
    SET status = 'Rejected', approver_id = p_approver_id, comments = p_comments, approved_at = NOW()
    WHERE document_id = p_document_id AND level_id = p_level_id;
    
    -- Update document status
    UPDATE documents
    SET status = 'Rejected'
    WHERE document_id = p_document_id;
    
    -- Add to document history
    INSERT INTO document_history (document_id, action, action_by, comments)
    VALUES (p_document_id, 'Rejected', p_approver_id, p_comments);
    
    -- Create notification for document creator
    INSERT INTO notifications (user_id, document_id, message)
    SELECT created_by, p_document_id, CONCAT('Your document ', reference_number, ' has been rejected')
    FROM documents
    WHERE document_id = p_document_id;
    
    SET p_success = TRUE;
END //
DELIMITER ;

-- Create function to get document status
DELIMITER //
CREATE FUNCTION get_document_approval_status(p_document_id INT) 
RETURNS VARCHAR(100)
DETERMINISTIC
BEGIN
    DECLARE v_status VARCHAR(20);
    DECLARE v_current_level INT;
    DECLARE v_department_name VARCHAR(100);
    DECLARE v_result VARCHAR(100);
    
    -- Get document status and current level
    SELECT status, current_approval_level INTO v_status, v_current_level
    FROM documents
    WHERE document_id = p_document_id;
    
    -- Get department name for current approval level
    SELECT d.department_name INTO v_department_name
    FROM document_approvals da
    JOIN departments d ON da.department_id = d.department_id
    WHERE da.document_id = p_document_id AND da.level_id = v_current_level;
    
    -- Build result string
    IF v_status = 'Approved' THEN
        SET v_result = 'Approved';
    ELSEIF v_status = 'Rejected' THEN
        SET v_result = 'Rejected';
    ELSEIF v_status = 'Draft' THEN
        SET v_result = 'Draft';
    ELSEIF v_status = 'Cancelled' THEN
        SET v_result = 'Cancelled';
    ELSE
        SET v_result = CONCAT(v_status, ' - Awaiting approval from ', v_department_name);
    END IF;
    
    RETURN v_result;
END //
DELIMITER ;

-- Create triggers

-- Trigger to update document status when all approvals are complete
DELIMITER //
CREATE TRIGGER after_document_approval_update
AFTER UPDATE ON document_approvals
FOR EACH ROW
BEGIN
    DECLARE v_all_approved BOOLEAN;
    DECLARE v_document_id INT;
    
    IF NEW.status = 'Approved' AND OLD.status != 'Approved' THEN
        SET v_document_id = NEW.document_id;
        
        -- Check if all required approvals are complete
        SELECT COUNT(*) = 0 INTO v_all_approved
        FROM document_approvals
        WHERE document_id = v_document_id AND status != 'Approved';
        
        -- If all approvals are complete, update document status
        IF v_all_approved THEN
            UPDATE documents
            SET status = 'Approved'
            WHERE document_id = v_document_id;
        END IF;
    END IF;
END //
DELIMITER ;

-- Trigger to create a reference number for new documents
DELIMITER //
CREATE TRIGGER before_document_insert
BEFORE INSERT ON documents
FOR EACH ROW
BEGIN
    DECLARE v_type_code VARCHAR(10);
    DECLARE v_next_number INT;
    
    -- Get document type code
    SELECT type_code INTO v_type_code
    FROM document_types
    WHERE document_type_id = NEW.document_type_id;
    
    -- Get next number for this document type
    SELECT IFNULL(MAX(SUBSTRING_INDEX(reference_number, '#', -1) + 0), 0) + 1 INTO v_next_number
    FROM documents
    WHERE document_type_id = NEW.document_type_id;
    
    -- Set reference number if not provided
    IF NEW.reference_number IS NULL OR NEW.reference_number = '' THEN
        SET NEW.reference_number = CONCAT(v_type_code, '#', LPAD(v_next_number, 5, '0'));
    END IF;
END //
DELIMITER ;

-- Create indexes for better performance
CREATE INDEX idx_document_status ON documents(status);
CREATE INDEX idx_document_reference ON documents(reference_number);
CREATE INDEX idx_document_type ON documents(document_type_id);
CREATE INDEX idx_document_approval_status ON document_approvals(document_id, status);
CREATE INDEX idx_notification_user ON notifications(user_id, is_read);
