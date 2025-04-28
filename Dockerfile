# (Tudo igual até aqui...)

# Define o diretório de trabalho como a raiz do projeto
WORKDIR /var/www/html

# Copia tudo
COPY . .

# Instala dependências
RUN composer install --optimize-autoloader --no-dev

# Instala Node e compila assets
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs
RUN npm install && npm run build

# Permissões
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 🚨 Muda o DocumentRoot do Apache para a pasta "public"
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# 🚀 Agora, o Workdir passa a ser a public
WORKDIR /var/www/html/public

# Expondo a porta
EXPOSE 80

# Start do Apache
CMD ["apache2-foreground"]
