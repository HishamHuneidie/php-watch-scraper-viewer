
# PHP Watch Scraper 🔄

## Descripción 🔎
**PHP Watch Scraper** es una aplicación desarrollada en PHP que recopila y muestra información clave de la página [php.watch](https://php.watch), como:

- RFCs (Request for Comments) 🔧.
- Noticias 💬.
- Artículos 🔖.
- Otras publicaciones relevantes relacionadas con PHP 🔄.

La aplicación utiliza técnicas de **web scraping** para obtener los datos en tiempo real y los presenta de forma organizada para una consulta rápida y eficiente.

## Características ✨
- Extracción en tiempo real de contenido de la página php.watch 🌐.
- Categorización automática de contenido (RFCs, noticias, artículos, etc.) 🔄.
- Interfaz sencilla para navegar y buscar información 🔍.
- Totalmente desarrollado en PHP 8 ⚙️.
- Diseñado para facilitar la consulta de información importante relacionada con el desarrollo PHP 🚀.

## Tecnologías utilizadas 📊
- **Imágenes de docker**: PHP, Nginx, MariaDB 📝.
- **Lenguaje**: PHP 8 📝.
- **Librería de web scraping**: [Goutte](https://github.com/FriendsOfPHP/Goutte) 🔎.
- **Servidor web**: Nginx 🔦.
- **Diseño de interfaz**: HTML, CSS y JavaScript 🌈.
- **Gestor de dependencias**: Composer 🔧.

## Instalación ⭐
### Requisitos previos 🔧
- **Docker**: Para crear máquinas contenerizadas
- **Make**: Para ejecutar comandos preestablecidos

### Pasos para la instalación 🏆
1. Clona el repositorio del proyecto:
   ```bash
   git clone https://github.com/HishamHuneidie/php-watch-scraper-viewer.git
   cd php-watch-scraper-viewer
   ```

2. Levanta contenedores:
   ```bash
   make build
   ```

3. Accede a la aplicación en tu navegador en `http://localhost:8000` 🌐.

## Uso 🔍
1. Accede a la interfaz principal de la aplicación.
2. Navega entre las secciones disponibles:
   - **RFCs**: Consulta los cambios propuestos y aprobados en PHP 🔧.
   - **Noticias**: Lee las últimas novedades del ecosistema PHP 💬.
   - **Artículos**: Explora artículos técnicos y guías sobre PHP 🔖.

## Estructura del proyecto 🌍
```
./
??? TODO: Completar despues de desarrollar el caso de uso
```

## Licencia 📄
Este proyecto está licenciado bajo la [MIT License](LICENSE).

## Contacto 📧
Si tienes preguntas o sugerencias, no dudes en contactarme en [hhuneidie@gmail.com](mailto:hhuneidie@gmail.com).
