## Prueba técnica IP Global

### Librerías utilizadas

#### L5 Swagger

- Repositorio: https://github.com/DarkaOnLine/L5-Swagger
- Publicar cambios: php artisan l5-swagger:generate
- Visualizar swagger: https://<url>/api/documentation

### Test unitario

#### Publicaciones de posts y recuperar una publicación

- Lanzar tests: php artisan test

### Observaciones

#### Mejoras

- Para securizar la API hubiera añadido Passport y el middleware para que las rutas api estén autenticadas.
- Añadir a Swagger el body de ejemplo para las llamadas API.
- Añadir permisos y roles a los usuarios autenticados. (Administrador, moderador, editor, lector,...), para esto hubiera utilizado la librería: https://github.com/spatie/laravel-permission
- Para mantener un registro de cambios habría añadido además la librería de auditoría: https://github.com/owen-it/laravel-auditing


