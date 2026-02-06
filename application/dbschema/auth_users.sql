-- Auth Users table
-- Used by application/models/AuthModel.php

CREATE TABLE auth_users (
    id CHAR(36) NOT NULL,

    -- Login identifiers (at least one must be filled)
    nim VARCHAR(30) NULL,
    email VARCHAR(60) NULL,

    -- Password storage
    password_hash VARCHAR(255) NOT NULL,

    -- Optional link to mahasiswa.id
    mahasiswa_id CHAR(36) NULL,
	tanggal_lahir DATE NOT NULL,

    -- Status
    is_active TINYINT(1) NOT NULL DEFAULT 1,

    -- Metadata
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    PRIMARY KEY (id),
    UNIQUE KEY unique_nim (nim),
    UNIQUE KEY unique_email (email),
    KEY idx_mahasiswa_id (mahasiswa_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
