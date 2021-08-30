/* SBQ 1: What is the total number of movies per actor?*/
SELECT a.actor_id,a.first_name, a.last_name, COUNT(f.film_id) FROM `actor` a, `film` f,`film_actor` fa WHERE a.actor_id = fa.actor_id AND f.film_id = fa.film_id GROUP BY a.actor_id;

/* SBQ 2: What are the top 3 languages for movies released in 2006?*/
SELECT l.name, COUNT(f.film_id) AS counter FROM `film` f,`language` l WHERE f.language_id = l.language_id AND f.release_year= 2006 GROUP BY f.language_id ORDER BY counter DESC LIMIT 3;

/* SBQ 3: What are the top 3 countries from which customers are originating?*/
SELECT Co.country FROM `country` Co, `customer` cu, `address` a, `city` c WHERE cu.address_id = a.address_id AND a.city_id = c.city_id AND Co.country_id = c.country_id GROUP BY Co.country_id ORDER BY COUNT(cu.customer_id) DESC LIMIT 3;

/* SBQ 4: Find all the addresses where the second address is not empty (i.e., contains some text), and return these
second addresses sorted.*/
SELECT address, address2 FROM `address`WHERE address2 IS NOT NULL AND address2 NOT LIKE '' ORDER BY address2 ASC;

/* SBQ 5: Return the first and last names of actors who played in a film involving a “Crocodile” and a “Shark”, along with
the release year of the movie, sorted by the actors’ last names.*/
SELECT a.first_name, a.last_name FROM `actor` a,`film_actor` fa, `film` f WHERE (f.description LIKE '%crocodile%' or f.description LIKE '%shark%') AND fa.film_id = f.film_id AND a.actor_id = fa.actor_id ORDER BY a.first_name, a.last_name;

/* SBQ 6: Find all the film categories in which there are between 55 and 65 films. Return the names of these categories
and the number of films per category, sorted by the number of films. If there are no categories between 55 and
65, return the highest available counts*/
SELECT DISTINCT
CASE 
	WHEN t1.TotalCount IS NOT NULL THEN t1.name 
    ELSE t2.name
END AS Category,    
CASE
    WHEN t1.TotalCount IS NOT NULL THEN t1.TotalCount
    ELSE t2.TotalCount
END AS film_count
FROM
(
    SELECT c.name, COUNT(fc.film_id) TotalCount
    FROM `category` c, `film_category` fc
    WHERE c.category_id = fc.category_id
    GROUP BY c.category_id
    HAVING COUNT(fc.film_id) BETWEEN 55 AND 65
    ORDER BY TotalCount
) t1,
(
    SELECT c.name, COUNT(fc.film_id) TotalCount
    FROM `category` c, `film_category` fc
    WHERE c.category_id = fc.category_id
    GROUP BY c.category_id ORDER BY TotalCount DESC LIMIT 1
) t2
ORDER BY film_count DESC;

/* SBQ 7: Find the names (first and last) of all the actors and costumers whose first name is the same as the first name of
the actor with ID 8. Do not return the actor with ID 8 himself. Note that you cannot use the name of the actor
with ID 8 as a constant (only the ID). There is more than one way to solve this question, but you need to
provide only one solution.*/
SELECT first_name, last_name FROM `customer` WHERE first_name = (SELECT first_name FROM `actor` WHERE actor_id = 8)
UNION ALL
SELECT first_name, last_name FROM `actor` WHERE first_name = (SELECT first_name FROM `actor` WHERE actor_id = 8);

/* SBQ 8: Get the total and average values of rentals per month per year per store.*/
SELECT year(payment_date), month(payment_date), s.store_id,SUM(amount), AVG(amount) FROM `payment` p, `staff` s WHERE p.staff_id = s.staff_id GROUP BY year(payment_date), month(payment_date), s.store_id;

/* SBQ 9: Get the top 3 customers who rented the highest number of movies within a given year*/
SELECT c.customer_id, COUNT(r.rental_id) FROM `customer` c, `rental` r WHERE c.customer_id = r.customer_id AND YEAR(r.rental_date)=2006 GROUP BY c.customer_id ORDER BY COUNT(r.rental_id) DESC LIMIT 3;