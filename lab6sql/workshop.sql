--workshop 4
SELECT pname FROM `product` WHERE price >= '500';
--workshop 5
SELECT * FROM member WHERE name LIKE 'บ%';
--workshop 6
SELECT * FROM member WHERE email LIKE '%gmail%' ORDER BY username DESC;
--workshop 7
SELECT name,ord_date FROM member INNER JOIN orders ON member.username = orders.username;
--workshop 8
SELECT name,ord_date,pname,(item.quantity*product.price) AS total_price FROM member INNER JOIN orders ON member.username = orders.username 	INNER JOIN item ON orders.ord_id = item.ord_id INNER JOIN product ON product.pid = item.pid;
--workshop 9
SELECT product.pname,SUM(item.quantity) FROM product INNER JOIN item ON product.pid = item.pid GROUP BY product.pname;
--workshop 10
SELECT product.pname,orders.ord_date FROM product INNER JOIN item ON product.pid = item.pid INNER JOIN orders ON item.ord_id = 	orders.ord_id GROUP BY orders.ord_date,product.pname;
--workshop 11
SELECT product.pname,SUM(item.quantity) FROM product INNER JOIN item ON product.pid = item.pid INNER JOIN orders ON item.ord_id = 	orders.ord_id GROUP BY product.pname;
--workshop 12
SELECT member.name,(item.quantity*product.price) AS total_price FROM product INNER JOIN item ON product.pid = item.pid INNER JOIN orders 	ON item.ord_id = orders.ord_id INNER JOIN member ON orders.username = member.username GROUP BY member.username;
--workshop 13
SELECT orders.ord_date,(item.quantity*product.price) AS total_price FROM product INNER JOIN item ON product.pid = item.pid INNER JOIN 	orders ON item.ord_id = orders.ord_id INNER JOIN member ON orders.username = member.username GROUP BY orders.ord_date;