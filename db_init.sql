create database if not exists trip_cost;
use trip_cost;

create table if not exists trips (
    trip_id int auto_increment primary key,
    food_cost decimal(10,2) not null,
    max_budget decimal(10,2),
    max_transport decimal(10,2),
    max_accommodation decimal(10,2),
    max_activities decimal(10,2)
);

create table if not exists accomodations (
    accomodation_id int auto_increment primary key,
    trip_id int not null,
    name varchar(255),
    cost decimal(10,2),
    check_in date,
    number_of_days int,
    address varchar(255),
    foreign key (trip_id) references trips(trip_id)
);

create table if not exists transport (
    transport_id int auto_increment primary key,
    trip_id int not null,
    company varchar(255),
    type varchar(255),
    cost decimal(10,2),
    departure_datetime datetime,
    arrival_datetime datetime,
    departure_location varchar(255),
    arrival_location varchar(255),
    foreign key (trip_id) references trips(trip_id)
);

create table if not exists activites (
    activites_id int auto_increment primary key,
    trip_id int not null,
    name varchar(255),
    cost decimal(10,2),
    location varchar(255),
    duration_hours int,
    foreign key (trip_id) references trips(trip_id)
);



