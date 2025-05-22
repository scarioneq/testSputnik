### Инструкция для разворачивания окружения:

1. Склонируйте проект к себе на устройство 
```bash
git clone https://github.com/scarioneq/testSputnik.git
```
2. Переименуйте файл .env.example в .env в папке \backend\
3. Перейдите в директорию \deploy\ и пропишите команду
```bash
docker-compose up --build
```

Окружение с бэком работает на адресе: http://localhost/api <br>
Окружение с PGadmin работает на адресе: http://localhost:5050/ (данные для входа находятся в .env.example)
