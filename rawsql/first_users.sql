insert into "user" (id, email, roles, password, firstname, lastname, status, type)
values (1, 'admin@admin.ru', '["ROLE_ADMIN"]', '$2y$13$5ljiqTRQHaujF24CSZ9ryei9GRj4pTTbxnSoJGKJ9Ah02sdjuGacu',
        'admin', 'admin', 'A', 'A'
       );

    insert into "user" (id, email, roles, password, firstname, lastname, status, type)
values (2, 'user@user.ru', '["ROLE_USER"]', '$2y$13$eqqSs7MYQ7xqSfvpJ7m4/.eYa16PMFLPi02KvuOWjYG3hHhs19TJ6',
    'user', 'user', 'A', 'S'
    );
