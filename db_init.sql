create database if not exists trip_cost;

use trip_cost;

-- Trip table (parent table) which contains id, food cost (just a decimal).
create table if not exists trips (
    trip_id int auto_increment primary key,
    food_cost decimal (5, 2) not null
);

-- accomodations (list of accomodation objects),
create table if not exists accomodations (
    accomodation_id int auto_increment primary key,
    trip_id integer not null,
    name VARCHAR(255) not null,
    cost decimal(10, 2) not null,
    check_in date,
    number_of_days integer not null,
    address varchar(255),
    foreign key (trip_id) references trips(trip_id)
);

-- transportations (list of transport objects).
create table if not exists transport (
    transport_id int auto_increment primary key,
    trip_id integer not null,
    company VARCHAR(255) not null,
    type VARCHAR(255),
    cost decimal(10, 2) not null,
    departure_datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    arrival_datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    departure_location VARCHAR(255),
    arrival_location VARCHAR(255),
    foreign key (trip_id) references trips(trip_id)
);

-- activities (list of activites).
create table if not exists activites (
    activites_id int auto_increment primary key,
    trip_id integer not null,
    name VARCHAR(255) not null,
    cost decimal(10, 2) not null,
    location VARCHAR(255),
    duration_hours int,
    foreign key (trip_id) references trips(trip_id)
);