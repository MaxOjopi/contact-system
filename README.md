# Sistema de Contato Simples - Laravel castering

Projeto desenvolvido em Laravel como teste técnico, com o objetivo de criar um sistema de contato funcional seguindo o padrão MVC.

## Funcionalidades

- Formulário de contato com os campos:
  - Nome (obrigatório)
  - E-mail (obrigatório)
  - Telefone (opcional)
  - Assunto (obrigatório)
  - Mensagem (obrigatório)
- Validação dos campos no backend
- Salvamento dos dados no banco de dados
- Exibição de mensagens de erro para campos inválidos
- Exibição de mensagem de sucesso após envio
- Listagem simples dos contatos recebidos em uma área administrativa

## Tecnologias utilizadas

- PHP 8.3 (compatível com PHP 8.1+)
- Laravel 13 (compatível com Laravel 11+)
- MySQL
- Blade
- CSS simples

## Como rodar o projeto

### 1. Clonar o repositório

    git clone URL_DO_SEU_REPOSITORIO
    cd contact-system

### 2. Instalar as dependências

    composer install

### 3. Copiar o arquivo de ambiente

No Windows:

    copy .env.example .env

No Linux ou macOS:

    cp .env.example .env

### 4. Configurar o arquivo `.env`

Abra o arquivo `.env` e ajuste as configurações do banco de dados:

    APP_NAME="Sistema de Contato"
    APP_ENV=local
    APP_KEY=
    APP_DEBUG=true
    APP_URL=http://127.0.0.1:8000

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=contact_system
    DB_USERNAME=root
    DB_PASSWORD=

    SESSION_DRIVER=file

### 5. Gerar a chave da aplicação

    php artisan key:generate

### 6. Rodar as migrations

    php artisan migrate

### 7. Iniciar o servidor

    php artisan serve

## Acessando o sistema

Após iniciar o servidor, acesse:

- Formulário de contato: `http://127.0.0.1:8000/contact`
- Área administrativa: `http://127.0.0.1:8000/admin/contacts`

## Estrutura do projeto

O projeto segue o padrão MVC do Laravel, com separação clara de responsabilidades:

- **Model (`Contact`)**  
  Responsável pela representação dos dados e interação com a tabela `contacts`.

- **Controller (`ContactController`)**  
  Responsável por controlar o fluxo da aplicação, recebendo requisições, processando dados e retornando respostas.

- **Request Validation (`StoreContactRequest`)**  
  Responsável por validar os dados do formulário antes de serem processados pelo controller.

- **Views (Blade)**  
  Interfaces do sistema, organizadas em:
  - `contacts` (formulário público)
  - `admin/contacts` (listagem dos contatos)

- **Migration (`create_contacts_table`)**  
  Responsável pela criação da estrutura da tabela `contacts` no banco de dados.

## Segurança

- Proteção contra CSRF nos formulários
- Validação de dados utilizando Form Request
- Uso de `fillable` no Model para evitar mass assignment indevido
- Escape automático de dados nas views Blade

## Observações

- O sistema utiliza o driver de sessão `file`, o que facilita a execução local sem necessidade de criar tabela de sessões.
- A área administrativa foi mantida simples para atender ao escopo do teste.
- Em um ambiente real, o ideal seria proteger a área administrativa com autenticação.
- Em produção, também seria recomendável utilizar um driver de sessão como `database` ou `redis`, dependendo da necessidade do projeto.

## Pacotes adicionais

Nenhum pacote adicional foi utilizado. O sistema foi desenvolvido apenas com recursos nativos do Laravel.

## Versões utilizadas

- Laravel 11
- PHP 8.2+
- MySQL

## Autor

Maxinaldo Ojopi da Costa
