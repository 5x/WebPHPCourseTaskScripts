--  С помощью SQL-запросов создайте таблицу users со следующими полями:
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     user VARCHAR(32),
--     password VARCHAR(32).


CREATE DATABASE IF NOT EXISTS web_labs_db
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_bin;

CREATE TABLE IF NOT EXISTS users (
  id       INT AUTO_INCREMENT PRIMARY KEY,
  user     VARCHAR(32),
  password VARCHAR(32)
)
  ENGINE InnoDB;

-- ---
-- Test Data
-- ---

-- INSERT INTO users (user, password) VALUES
--   ('Ivan', 'b1b4c15d05c5e2ea7d2');
