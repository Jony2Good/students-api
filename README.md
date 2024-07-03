## Как запустить проект

1. Клонируем репозиторий и в корневом каталоге (там где находится docker инфраструктура) прописываем команду docker-compose up -d ВАЖНО!!! Не забываем про .env файл (просто меняем файл env.example)
2. Далее в том же каталоге прописываем команду для создания:
      - node_modules - docker-compose run --rm npm install
      - vendor - docker-compose run --rm composer update
      - базы данных и заполнения ее фейковыми данными docker-compose run --rm artisan migrate:fresh --seed
3. На том же уровен доступны команды:
    - docker-compose run --rm composer update
    - docker-compose run --rm npm run dev
    - docker-compose run --rm artisan migrate (или иная команда)
4. Доступны порты:
   - nginx - :80
   - mysql - :3306
   - php - :9000
   - redis - :6379
   - mailhog - :8025
5. С помощью программы POSTMAN можно обращаться по такому маршруту http://127.0.0.1:80/api/students
6. Все endpoints указаны в файле openapi.yaml
7. Если что-то не работает:
    - docker-compose down
    - docker-compose build --no-cache
    - docker-compose run --rm artisan optimize

