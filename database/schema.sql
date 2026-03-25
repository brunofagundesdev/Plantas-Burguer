drop table if exists demand_item;
drop table if exists item;
drop table if exists demand;
drop table if exists customer;

create table customer (
    id int auto_increment primary key,
    name varchar(100) not null,
    email varchar(254) not null
);

create table demand (
    id int auto_increment primary key,
    timetable timestamp default current_timestamp not null,
    customer int not null,
    foreign key (customer) references customer(id) on delete cascade
);

create table item (
    id int auto_increment primary key,
    name varchar(200) not null,
    description text not null,
    price float not null
);

create table demand_item (
    demand int,
    item int,
    primary key (demand, item),
    foreign key (demand) references demand(id) on delete cascade,
    foreign key (item) references item(id) on delete cascade
);