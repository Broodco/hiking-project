create table tags
(
    id   int auto_increment
        primary key,
    name varchar(80) not null
);

create table users
(
    id         int auto_increment
        primary key,
    first_name varchar(80)  null,
    last_name  varchar(255) null,
    user_name  varchar(255) not null,
    email      varchar(320) not null,
    password   varchar(255) not null,
    role       varchar(50)  null,
    constraint users_email_uindex
        unique (email),
    constraint users_user_name_uindex
        unique (user_name)
);

create table hikes
(
    id             int auto_increment
        primary key,
    name           varchar(255) not null,
    distance       int          not null comment 'in meters',
    duration       int          not null comment 'in minutes',
    elevation_gain int          null comment 'in meters',
    description    text         null,
    created_at     datetime     not null,
    updated_at     datetime     null,
    author_id      int          null,
    constraint hikes_users_id_fk
        foreign key (author_id) references users (id)
);

create table hikes_tags
(
    id       int auto_increment
        primary key,
    hikes_id int not null,
    tags_id  int not null,
    constraint hikes_tags_id_uindex
        unique (id),
    constraint hikes_tags_hikes_id_fk
        foreign key (hikes_id) references hikes (id),
    constraint hikes_tags_tags_id_fk
        foreign key (tags_id) references tags (id)
);


