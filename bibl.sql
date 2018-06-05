CREATE TABLE bibilography
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    manual_name VARCHAR(255) NOT NULL,
    discipline_id INT NOT NULL,
    path VARCHAR(255) NOT NULL
);
CREATE UNIQUE INDEX bibilography_id_uindex ON bibliography (id);
ALTER TABLE bibilography RENAME TO bibliography;