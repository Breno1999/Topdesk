import subprocess, platform, traceback, time, webbrowser, pyautogui as ag

def todos_instalados():
    """ retorna uma lista com todos os programas instalados """

    try:
        Data = subprocess.check_output(['winget', 'list','--accept-source-agreements']).decode("UTF-8") 
        linhas = Data.split("\r\n") #gera uma lista utilizando "\r\n" como separador
        todos_instalados = []

        for i in linhas:
            if i != linhas[0] and i != linhas[1]: #ignora duas primeiras linhas (título e ---)
                if '   ' in i: #pega a primeira parte da linha (nome do programa)
                    nome = i.split('   ')[0]

                    if '…' in nome: #pega a primeira parte da linha, caso seja grande e esteja abreviado
                        nome = nome.split('…')[0]
                
                if '(x' in nome:
                    nome = nome.split(" (x",1)[0]
                    
                
                todos_instalados.append(nome)

        # remove os programas da Microsoft, o que será desnecessário se for apenas para comparar

        Data = subprocess.check_output('winget list --id "Microsoft"').decode("UTF-8") 
        linhas = Data.split("\r\n") #gera uma lista utilizando "\r\n" como separador
        microsoft = []

        for i in linhas:
            if i != linhas[0] and i != linhas[1]: #ignora duas primeiras linhas (título e ---)
                nome = i
                if '   ' in nome: #pega a primeira parte da linha (nome do programa)
                    nome = nome.split('   ')[0]

                if '…' in nome: #pega a primeira parte da linha, caso seja grande e esteja abreviado
                    nome = nome.split('…')[0]
                        
                if '(x' in nome:
                    nome = nome.split(" (x",1)[0]
                            
                microsoft.append(nome)

                for i in microsoft:
                    if i in todos_instalados:
                        todos_instalados.remove(i)
                        
    except:
        with open('.\ExceptError.txt','w') as arquivo:
            arquivo.write(traceback.format_exc())

        webbrowser.open('https://www.microsoft.com/store/productId/9NBLGGH4NNS1')
        ag.alert('Verifique se o winget está disponível em sua máquina, caso esteja, abra novamente o executável', title='ExceptError --line 24')
       
    return todos_instalados


def informacoes_maquina():
    """ retorna informações da máquina em dicionário.
    chaves = host, mac, sistema_operacional, modelo, versao_so, tipo_sistema, ram, programas_inst, data, serie  """

    informacoes = {
        'host' : '', 'mac' : '',
        'sistema_operacional' : f"Nome do sistema operacional:               ", 'modelo' : 'Modelo do sistema:                         ', 'versao_so' : '',
        'tipo_sistema' : f"Tipo de sistema:                           ",
        'ram' : f"Mem\\xa2ria f\\xa1sica total:                      ", 'proprietario_registrado' : f"Propriet\\xa0rio registrado:                   ",
        'programas_inst' : '', 'data' : '', 'serie' : '', 'fabricante' : 'Fabricante do sistema:                     '
        }

    try:
        host = platform.node()
        versao_so = platform.uname()[3]
        programas_inst = todos_instalados()
        
        mac = str(subprocess.check_output('getmac'))
        mac = mac.split(r"b'\r\nEndere\x87o f\xa1sico     Nome de transporte                                        \r\n=================== ==========================================================\r\n")[1]
        mac = mac.split(" ")[0]

        named_tuple = time.localtime() # retorna o tempo local
        data = time.strftime("%Y/%m/%d %H:%M", named_tuple)
        serie = str(subprocess.check_output('wmic bios get serialnumber'))
        serie = serie.replace("b'SerialNumber            \\r\\r\\n",'')
        serie = serie.split(' ')[0]
        
        comando_cmd, systeminfo = str(subprocess.check_output('systeminfo')), {} # info do sistema em str e dic que armazenará os resultados

        for i in informacoes:
            if informacoes[i] != '': 
                resultado_iteracao = comando_cmd.split(informacoes[i]) # separa a informação desejada
                resultado_iteracao = resultado_iteracao[1].split(f'\\r\\n')[0]

                systeminfo[i] = resultado_iteracao
            else:
                systeminfo[i] = ''

            
        # alterando valores do dicionário
        systeminfo['mac'] = mac
        systeminfo['host'] = host
        systeminfo['versao_so'] = versao_so
        systeminfo['programas_inst'] = str(programas_inst)
        systeminfo['data_inventario'] = data
        systeminfo['serie'] = serie
        

    except:
        with open('.\ExceptError.txt','w') as arquivo:
            arquivo.write(traceback.format_exc())
        ag.alert('Não foi possível coletar todas as informações!\n\n"ExceptError.txt" gerado com êxito', title='ExceptError --line 80')

    return systeminfo
