<?php

exec('php ./bin/console doctrine:schema:drop -f');
exec('php ./bin/console doctrine:migrations:migrate');
exec('php ./bin/console doctrine:fixtures:load');

