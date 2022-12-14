-- create data table
CREATE TABLE contact_data (
  contact_id SERIAL PRIMARY KEY,
  received_date DATETIME NOT NULL,
  status VARCHAR(16) NOT NULL,
  user_id INT NOT NULL,
  mail VARCHAR(256),
  title VARCHAR(1000) NOT NULL,
  content VARCHAR(2000),
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- add column "name"
ALTER TABLE contact_data ADD name VARCHAR(255) NOT NULL AFTER user_id;

-- change charset and collate
ALTER TABLE contact_data
  CONVERT TO CHARACTER SET utf8mb4
  COLLATE utf8mb4_general_ci;

-- create action log
CREATE TABLE action_logs (
  id SERIAL PRIMARY KEY,
  content VARCHAR(2000),
  contact_id INT NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- create users
CREATE TABLE users (
  user_id SERIAL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  mail VARCHAR(255) NOT NULL,
  auth_id INT NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)
DEFAULT CHARACTER SET=utf8mb4;

-- add colunm "pass"
ALTER TABLE users ADD pass VARCHAR(255) NOT NULL AFTER permission_id;
