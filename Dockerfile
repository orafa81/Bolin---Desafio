# Usa uma imagem oficial PHP com Apache
FROM php:8.2-apache

# Instala extensões necessárias
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git curl libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl bcmath gd

# Habilitar o módulo Apache para Rewrite (Laravel precisa)
RUN a2enmod rewrite

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configura o diretório de trabalho
WORKDIR /var/www/html

# Copia os arquivos da aplicação para dentro do container
COPY . .

# Instala as dependências PHP
RUN composer install --optimize-autoloader --no-dev

# Instala dependências do Frontend (npm e build)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs
RUN npm install && npm run build

# Após instalar dependências
RUN php artisan storage:link
RUN php artisan migrate --force

# Permissões corretas para storage e cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Porta padrão
EXPOSE 80

# Comando de inicialização
CMD ["apache2-foreground"]
