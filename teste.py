import subprocess, platform, traceback, time, webbrowser, pyautogui as ag

data = subprocess.check_output(['manage-bde', '-status'])
linhas = data.split("\r\n") #gera uma lista utilizando "\r\n" como separador

print(data)