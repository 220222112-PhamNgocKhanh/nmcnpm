const mysql = require('mysql2/promise');
require('dotenv').config(); // Thêm dòng này

const pool = mysql.createPool({
  host: process.env.DB_HOST,
  user: process.env.DB_USER,
  password: process.env.DB_PASSWORD,
  database: process.env.DB_DATABASE,
  timezone: '+07:00',
});

module.exports = pool;
