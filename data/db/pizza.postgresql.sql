DROP TABLE IF EXISTS crusts;
CREATE TABLE crusts (
  id smallint NOT NULL,
  name varchar(32) DEFAULT NULL,
  cost decimal(4,2) DEFAULT NULL,

  CONSTRAINT crusts_id PRIMARY KEY(id)
);

INSERT INTO crusts VALUES (1,'Pizzaboden aus Weizenmehl','2.00'),(2,'Pizzaboden aus Vollkornmehl','2.50');


DROP TABLE IF EXISTS pizzas;
CREATE TABLE pizzas (
  id smallint NOT NULL,
  name varchar(32) DEFAULT NULL,
  price decimal(5,2) DEFAULT NULL,
  crust_id smallint DEFAULT NULL,

  CONSTRAINT pizzas_id PRIMARY KEY(id)
);



CREATE INDEX pizzas_crust_id ON pizzas
  USING btree (crust_id);

INSERT INTO pizzas VALUES (1,'Pizza Salami','4.95',1),(2,'Pizza Salami Vollkorn','5.95',2),(3,'Pizza Schinken','4.95',1),(4,'Pizza Schinken Vollkorn','5.95',2),(5,'Pizza Melone','6.95',1),(6,'Pizza Melone Vollkorn','7.95',2),(7,'Pizza Speziale','6.95',1),(8,'Pizza Speziale Vollkorn','7.95',2),(9,'Pizza Thunfisch','7.95',1),(10,'Pizza Thunfisch Vollkorn','8.95',2),(11,'Pizza Spinaci','7.95',1),(12,'Pizza Spinaci Vollkorn','8.95',2),(13,'Pizza Mexicana','8.95',1),(14,'Pizza Mexicana Vollkorn','9.95',2);


DROP TABLE IF EXISTS pizzas_toppings;
CREATE TABLE pizzas_toppings (
  pizza_id smallint DEFAULT NULL,
  topping_id smallint DEFAULT NULL
);

DROP INDEX IF EXISTS pizzas_toppings_pizza_id;
CREATE INDEX pizzas_toppings_pizza_id ON pizzas_toppings
  USING btree (pizza_id);

DROP INDEX IF EXISTS pizzas_toppings_topping_id;
CREATE INDEX pizzas_toppings_topping_id ON pizzas_toppings
  USING btree (topping_id);

INSERT INTO pizzas_toppings VALUES (1,1),(1,2),(1,3),(2,1),(2,2),(2,3),(3,1),(3,2),(3,4),(4,1),(4,2),(4,4),(5,1),(5,2),(5,4),(5,7),(6,1),(6,2),(6,4),(6,7),(7,1),(7,2),(7,3),(7,4),(7,6),(8,1),(8,2),(8,3),(8,4),(8,6),(9,1),(9,2),(9,8),(9,9),(10,1),(10,2),(10,8),(10,9),(11,1),(11,2),(11,10),(11,12),(12,1),(12,2),(12,10),(12,12),(13,1),(13,2),(13,8),(13,11),(13,13),(13,14),(14,1),(14,2),(14,8),(14,11),(14,13),(14,14);


DROP TABLE IF EXISTS toppings;
CREATE TABLE toppings (
  id smallint NOT NULL,
  name varchar(32) DEFAULT NULL,
  costs decimal(4,2) DEFAULT NULL,

  CONSTRAINT toppings_id PRIMARY KEY(id)
);

INSERT INTO toppings VALUES (1,'Tomatenpampe','0.50'),(2,'K�se','0.50'),(3,'Salami','1.00'),(4,'Schinken','1.00'),(5,'Ananas','1.50'),(6,'Champignons','1.00'),(7,'Melone','1.50'),(8,'Zwiebeln','0.50'),(9,'Thunfisch','2.00'),(10,'Spinat','1.50'),(11,'Peperoni','1.00'),(12,'Feta','1.50'),(13,'Hackfleisch','2.00'),(14,'Mais','1.00');