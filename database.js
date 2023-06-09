const Sequelize = require('sequelize');

// Create a new Sequelize instance
const sequelize = new Sequelize('sahyog_db', 'root', '', {
  host: '4306',
  dialect: 'mysql',
});

module.exports = sequelize;


