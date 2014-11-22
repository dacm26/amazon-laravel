USE amazon;
DELETE FROM customers;
DELETE FROM roles WHERE name = 'Gerente Admin';
DELETE FROM employees WHERE email = 'joelpineda94@gmail.com';
DELETE FROM brands WHERE name = 'Test Brand New';
DELETE FROM categories WHERE code = 'CAT099';
DELETE FROM products WHERE code = 'PTEST01';
DELETE FROM shippers WHERE email = 'shipperinternational@gmail.com';
DELETE FROM discounts WHERE discount = 11 AND datestart = '2014-12-15' AND dateend = '2014-12-21';