CREATE DATABASE HackItdb;
USE HackItdb;

CREATE TABLE tenants (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  license_number VARCHAR(50) UNIQUE,
  status ENUM('PENDING','VERIFIED','ACTIVE','SUSPENDED','INACTIVE') DEFAULT 'ACTIVE'
);

CREATE TABLE patients (
  id INT AUTO_INCREMENT PRIMARY KEY,
  tenant_id INT,
  name VARCHAR(100),
  dob DATE,
  gender ENUM('M','F','O'),
  blood_group VARCHAR(5),
  contact VARCHAR(50),
  address VARCHAR(255),
  patient_type ENUM('OPD','IPD'),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- INSERT INTO tenants (name, license_number, status)
-- VALUES ('Demo Hospital', 'LIC-DEMO-001', 'ACTIVE');
