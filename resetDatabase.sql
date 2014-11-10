USE amazon;
DELETE FROM customers;
DELETE FROM roles WHERE name = 'Gerente Admin';
DELETE FROM employees WHERE email = 'joelpineda94@gmail.com';