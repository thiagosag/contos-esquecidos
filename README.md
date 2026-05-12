# Contos Esquecidos

Sistema de blog desenvolvido em PHP puro com autenticação de usuários, painel administrativo e CRUD completo de posts.

O projeto foi desenvolvido com foco em estudo prático de backend web, autenticação segura e manipulação de banco de dados MySQL.

---
## Projeto em funcionamento
Acesse o sistema online: http://www.contosesquecidos.great-site.net/

## Visão geral

A aplicação permite o registro de usuários, login com validação, verificação de email e gerenciamento completo de posts através de um painel administrativo.

Os posts são exibidos dinamicamente na página inicial.

---

## Funcionalidades

### Autenticação
- Cadastro de usuários
- Login com sessão
- Verificação de email
- Hash de senhas
- Controle de acesso por sessão

---

### Sistema de posts
- Criação de posts
- Edição de posts
- Exclusão de posts
- Visualização de posts dinâmicos

---

### Painel administrativo
- Acesso restrito a usuários autenticados
- Publicação de novos posts
- Gerenciamento de conteúdo

---

## Como usar o sistema

### Acesso ao painel administrativo

Email: admin@site.com  
Senha: 12345

Após o login, o usuário será redirecionado para o painel administrativo.

---

### Criando um novo post

1. Faça login com uma conta de administrador  
2. Clique em “Publicar” no painel  
3. Preencha título, conteúdo e imagem  
4. Envie o formulário para publicar o post  

As imagens são adicionadas apenas via link externo.

---

## Tecnologias utilizadas

- PHP
- MySQL
- HTML
- CSS
- Sessões PHP
- Hash de senhas

---

## Preview

### Página inicial e sistema de CRUD.
A página inicial gera em ordem decrescente os posts mais recentes para os mais antigos. Inicialmente apresenta apenas três posts simples, somente para exemplo. Já o sistema de **CRUD** disponibiliza funções como: **visualizar, editar e apagar.**

![Index](https://raw.githubusercontent.com/thiagosag/contos-esquecidos/refs/heads/main/assets/Imagens/inicio_CRUD.png)

---

### Publicação e edição de posts.
Após a validação do id inserido via GET, o site apresenta todas as informações do post. Enquanto o painel de edições possibilita a **alteração de dados** do mesmo.

![Admin](https://raw.githubusercontent.com/thiagosag/contos-esquecidos/refs/heads/main/assets/Imagens/posts_edicao.png)

---
