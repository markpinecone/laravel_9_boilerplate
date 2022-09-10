FROM nginx:1.23.1 as base
WORKDIR /app
COPY default.conf /etc/nginx/conf.d/default.conf

EXPOSE 80

STOPSIGNAL SIGQUIT

CMD ["nginx", "-g", "daemon off;"]

FROM base as dev

COPY default.conf /etc/nginx/conf.d/default.conf

FROM base as production

COPY default_prod.conf /etc/nginx/conf.d/default.conf

