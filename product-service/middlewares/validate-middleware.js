// middlewares/validate.middleware.js

const { validationResult } = require('express-validator');

function validateRequest(req, res, next) {
  const errors = validationResult(req);
  if (!errors.isEmpty()) {
    return res.status(400).json({
      status: 'fail',
      errors: errors.array(),
    });
  }
  next();
}

module.exports = validateRequest;
