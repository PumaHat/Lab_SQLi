#!/bin/bash

# Iniciar servicios
service apache2 start # Puerto 80

# Mantener el contenedor en ejecución
tail -f /dev/null
