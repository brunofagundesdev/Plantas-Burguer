create table costumer {
    id int not null primary key auto_increment,
    name varchar(100) not null,
    email varchar(254) not null
}

create table order {
    id int not null primary key auto_increment,
    date timestamp default now() not null,
    costumer int references costumer(id) not null
}

create table order_item {
    order int references order(id),
    item int references item(id),

    primary key (order, item)
}

create table item {
    id int not null primary key auto_increment,
    name varchar(200) not null,
    description text not null,

    price float not null
}