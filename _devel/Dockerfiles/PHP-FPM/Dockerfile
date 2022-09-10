FROM php:fpm-bullseye as base
WORKDIR /app
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
        && install-php-extensions gd bcmath ctype fileinfo json mbstring openssl pdo tokenizer xml

EXPOSE 9000

FROM base as dev

RUN install-php-extensions xdebug 


FROM base as production

# Prod FPM stuff goes here
 
