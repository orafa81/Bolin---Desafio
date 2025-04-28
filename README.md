# 🍰 Bolin - Marketplace de Confeitarias

<!-- <img src="imagem.png" alt="Exemplo imagem"> -->

> Este projeto é um **Marketplace para Confeitarias**, desenvolvido como parte de um desafio técnico para uma vaga de estágio. O sistema permite o cadastro, edição, exclusão e visualização de confeitarias e seus produtos, além da exibição das confeitarias em um mapa interativo com base em coordenadas geográficas.
 

## 📌 Funcionalidades

- ✅ Registro e gerenciamento de confeitarias
- ✅ Cadastro de produtos vinculados a uma confeitaria
- ✅ Upload de múltiplas imagens para os produtos
- ✅ Visualização das confeitarias em um mapa interativo (Leaflet.js)
- ✅ Resumo da confeitaria ao clicar no marcador no mapa
- ✅ Validações nos formulários
- ✅ Auto-preenchimento do endereço via CEP (API ViaCEP)
- ✅ Exclusão em cascata (ao remover confeitaria, os produtos são deletados)

## 🚀 Tecnologias Utilizadas

### 🖥️ Backend
- [Laravel 12](https://laravel.com)
- Inertia.js (como ponte entre frontend e backend)
- PostgreSQL (Banco de Dados)
<!-- - PHPUnit (Testes Automatizados) -->

### 💻 Frontend
- [Vue.js 3](https://vuejs.org)
- Leaflet.js (Mapa interativo)
<!-- - Axios (Requisições HTTP, como para o ViaCEP) -->
- Vite (Empacotamento)

## ⚙️ Requisitos Técnicos

- PHP >= 8.3
- Composer >= 2.7
- Node.js >= 18
- PostgreSQL >= 12
- NPM ou Yarn


## 🛠️ Passo a Passo para Rodar o Projeto

Para instalar o Bolin, siga estas etapas:

1.**Clone o repositório:**

```
git clone https://github.com/orafa81/Bolin---Desafio.git
cd Bolin---Desafio
```

2.**Instale as dependências do backend:**

```
composer install
```

3.**Instale as dependências do frontend:**

```
npm install
```

4.**Configure o ambiente:**

- Copie o arquivo .env.example para .env:
```
cp .env.example .env
```
- Atualize as variáveis do banco de dados PostgreSQL.
- Gere a chave da aplicação:
```
php artisan key:generate
```

5.**Crie as tabelas no banco e as seeds:**

```
php artisan migrate
php artisan migrate:fresh --seed
```

6.**Inicie os servidores:**

Backend:
```
php artisan serve
```

Frontend:
```
npm run dev
```
