# Plugin de Cursos para Moodle

Este plugin proporciona un servicio web personalizado para obtener una lista de cursos con paginación en Moodle.

## Instalación

1. **Descargar e Instalar Moodle:**
   - Descarga la versión 4.1 de Moodle desde [https://moodle.org/](https://moodle.org/) y sigue las instrucciones de instalación.

2. **Clonar o Descargar el Plugin:**
   - Clona este repositorio o descarga el código fuente como un archivo ZIP.

3. **Colocar en el Directorio de Plugins:**
   - Coloca el contenido del plugin en el directorio `local` de tu instalación de Moodle.

     ```bash
     cp -r local_courses /ruta/a/tu/moodle/local/
     ```

4. **Acceder a la Interfaz de Administración de Moodle:**
   - Inicia sesión en la interfaz de administración de Moodle.

5. **Actualizar la Base de Datos:**
   - Accede a "Notificaciones" en la interfaz de administración de Moodle. Esto actualizará la base de datos con los cambios necesarios para el nuevo plugin.

6. **Configuración del Token de Acceso:**
   - Genera un token de acceso en la sección "Servicios web" de la interfaz de administración de Moodle. Asegúrate de dar permisos adecuados al token para acceder al servicio web del plugin.

7. **Uso del Servicio Web:**
   - Utiliza el servicio web accediendo a la siguiente URL, reemplazando `TU_TOKEN` con el token generado.

     ```
     http://localhost/moodle/webservice/rest/server.php?wstoken=TU_TOKEN&wsfunction=local_courses_get_courses&page=1&per_page=1
     ```

8. **Documentación Adicional:**
   - Consulta la documentación oficial de Moodle para obtener más información sobre el desarrollo de plugins y servicios web.


## Licencia

Este plugin está bajo la licencia [MIT](LICENSE).
