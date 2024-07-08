-- You will add in this file your changes for the database
ALTER TABLE vehicle_make
ADD COLUMN state boolean not null default 1;
ALTER TABLE vehicle_make
ADD COLUMN updated datetime;

ALTER TABLE vehicle_model
ADD COLUMN state boolean not null default 1;
ALTER TABLE vehicle_model
ADD COLUMN updated datetime;

ALTER TABLE vehicle
ADD COLUMN state boolean not null default 1;
ALTER TABLE vehicle
ADD COLUMN updated datetime;