ARG PHP_VERSION=8.3
FROM php:${PHP_VERSION}-alpine

ARG XDEBUG=0

# Copy entrypoint script and make it executable
COPY docker/entrypoint.sh /usr/local/bin/
RUN chmod 755 /usr/local/bin/entrypoint.sh

# Install necessary packages
RUN apk add --no-cache \
    autoconf \
    make \
    g++ \
    bash \
    git \
    openssl-dev

# Set PHP memory limit
RUN echo -e 'memory_limit=2G' > /usr/local/etc/php/conf.d/memory.ini

# Install Composer
RUN set -o pipefail && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Xdebug if required
RUN if [ ${XDEBUG} == "1" ] ; then pecl install xdebug && docker-php-ext-enable xdebug ; fi

# Set working directory
WORKDIR /docker

# Copy the before_install.sh script and make it executable
COPY .github/scripts/before_install.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/before_install.sh

# Set entrypoint
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
