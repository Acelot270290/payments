
# Project Payment

## Descrição

Este projeto é uma API para gerenciar cursos e inscrições, incluindo autenticação de usuários com JWT e integração com Stripe para pagamentos.

## Estrutura do Projeto

```
project-payment/
├── docker-compose.yml
├── nginx/
│   └── default.conf
├── php/
│   ├── Dockerfile
│   └── php.ini
└── src/
    ├── app/
    ├── bootstrap/
    ├── config/
    ├── database/
    ├── public/
    ├── resources/
    ├── routes/
    │   ├── api.php
    │   ├── console.php
    │   └── web.php
    ├── storage/
    ├── tests/
    └── .env
```

## Pré-requisitos

- Docker
- Docker Compose

## Configuração e Execução

### 1. Clonar o Repositório

Clone o repositório para o seu ambiente local:

```sh
git clone https://github.com/seu-usuario/seu-repositorio.git
cd project-payment
```

### 2. Configurar o Arquivo `.env`

Crie o arquivo `.env` no diretório `src/` e adicione as seguintes configurações:

```env
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:chave-gerada
APP_DEBUG=true
APP_URL=http://localhost:8080

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=secret

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

JWT_SECRET=chave-gerada-do-jwt

STRIPE_KEY=your_stripe_key
STRIPE_SECRET=your_stripe_secret
```

### 3. Construir e Iniciar os Contêineres

Construa e inicie os contêineres Docker:

```sh
docker-compose up -d --build
```

### 4. Instalar as Dependências do Composer

Entre no contêiner PHP e instale as dependências do Composer:

```sh
docker-compose exec php bash
composer install
php artisan key:generate
php artisan migrate
php artisan db:seed
```

### 5. Acessar a Aplicação

A aplicação estará disponível em `http://localhost:8080`.

## Testando a API

Você pode usar ferramentas como Postman ou Insomnia para testar as rotas da API. Aqui estão algumas rotas de exemplo:

### Rotas de Autenticação

- `POST /api/auth/register` - Registrar um novo usuário.
- `POST /api/auth/login` - Fazer login e obter o token JWT.
- `POST /api/auth/me` - Obter detalhes do usuário autenticado.
- `POST /api/auth/logout` - Fazer logout.
- `POST /api/auth/refresh` - Atualizar o token JWT.

### Rotas de Recursos

- `GET /api/users` - Listar todos os usuários.
- `POST /api/users` - Criar um novo usuário.
- `GET /api/users/{id}` - Obter detalhes de um usuário específico.
- `PUT /api/users/{id}` - Atualizar um usuário específico.
- `DELETE /api/users/{id}` - Deletar um usuário específico.

- `GET /api/courses` - Listar todos os cursos.
- `POST /api/courses` - Criar um novo curso.
- `GET /api/courses/{id}` - Obter detalhes de um curso específico.
- `PUT /api/courses/{id}` - Atualizar um curso específico.
- `DELETE /api/courses/{id}` - Deletar um curso específico.

- `GET /api/course-users` - Listar todas as inscrições de cursos.
- `POST /api/course-users` - Criar uma nova inscrição de curso e processar o pagamento.
- `GET /api/course-users/{id}` - Obter detalhes de uma inscrição de curso específica.
- `PUT /api/course-users/{id}` - Atualizar uma inscrição de curso específica.
- `DELETE /api/course-users/{id}` - Deletar uma inscrição de curso específica.

## Licença

Este projeto está licenciado sob a licença MIT. Veja o arquivo LICENSE para mais detalhes.
