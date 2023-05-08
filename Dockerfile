FROM php:8.1-fpm

ARG ROLE=app
ARG APPENV=development

WORKDIR /var/www/html

ENV DEBIAN_FRONTEND noninteractive
ENV TZ=Asia/Yangon

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Install system dependencies # Install PHP extensions
RUN apt-get update && apt-get install -y \
    git curl \
    libpng-dev libonig-dev libxml2-dev \
    zip unzip libzip-dev libsodium-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    zip sodium

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY php.ini /etc/php/8.1/cli/conf.d/php.ini 
COPY start-container.sh /usr/local/bin/start-container.sh
COPY release-tasks.sh /usr/local/bin/release-tasks.sh

RUN chmod +x /usr/local/bin/start-container.sh \
    && chmod +x /usr/local/bin/release-tasks.sh

ENTRYPOINT [ "start-container.sh" ]