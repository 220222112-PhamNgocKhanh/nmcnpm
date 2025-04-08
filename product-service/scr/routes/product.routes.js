const express = require('express');
const router = express.Router();
const productController = require('../controllers/product.controller');

// Các route
router.post('/', productController.createProduct);
router.get('/', productController.getProducts);
router.get('/:id', productController.getProductById);
router.put('/:id', productController.updateProduct);
router.delete('/:id', productController.deleteProduct);
router.get('/category/:categoryId', productController.getProductsByCategory);

module.exports = router;