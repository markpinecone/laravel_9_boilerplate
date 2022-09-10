FROM php:8.1-cli-buster
WORKDIR /app
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN apt update && apt install zsh curl vim git -y \
        && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
        && php composer-setup.php --install-dir=/bin --filename=composer \
        && chmod +x /bin/composer \
        && rm ./composer-setup.php \
        && install-php-extensions gd bcmath ctype fileinfo json mbstring openssl pdo tokenizer xml xdebug 
RUN sh -c "$(curl -fsSL https://raw.github.com/ohmyzsh/ohmyzsh/master/tools/install.sh)" -y
 
