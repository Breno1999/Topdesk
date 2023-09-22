from informacoes_maquina import informacoes_maquina
from db import nova_conexao
from mysql.connector.errors import ProgrammingError
import pyautogui as ag
import PySimpleGUI as sg


def registra_maquina(cpf):

    sql = "SELECT cpf FROM usuarios WHERE cpf = %s"
    args = (f'{cpf}',)
    
    #EXECUTA O COMANDO SQL 
    with nova_conexao() as conexao:
        try:
            cursor = conexao.cursor()
            cursor.execute(sql, args)
            usuarios = cursor.fetchone()
            conexao.commit()
        except ProgrammingError as e:
            print(f'Erro: {e.msg}')
        else:

                if usuarios[0] == cpf :


                    #CHAMA O METODO QUE PEGA AS INFORMAÇÕES DA MAQUINA E OS PROGRAMAS INSTALADOS
                    info = informacoes_maquina()


                    #INSERE OS VALORES NA TABELA MAQUINAS NO BANCO DE DADOS 
                    sql = 'INSERT INTO  maquinas (nome_maquina, endereco_mac, cpf, sistema_operacional, modelo, versao_so, tipo_sys, memory_ram, usuario_adm, programas_inst, data_inventario, serie, fabricante) VALUES (%s ,%s ,%s ,%s ,%s ,%s ,%s ,%s ,%s , %s, %s, %s, %s)'
                    args = (info['host'], info['mac'], cpf, info['sistema_operacional'], info['modelo'], info['versao_so'], info['tipo_sistema'], info['ram'], info['proprietario_registrado'], info['programas_inst'], info['data_inventario'], info['serie'], info['fabricante'])


                    #EXECUTA O COMANDO SQL 
                    with nova_conexao() as conexao:
                        try:
                            cursor = conexao.cursor()
                            cursor.execute(sql, args)
                            conexao.commit()
                        except ProgrammingError as e:
                            print(f'Erro: {e.msg}')
                        else:
                            alerta = ag.alert('Maquina registrada com sucesso!', 'Sucesso!', 'OK') 
                            
        

sg.theme('LightGray1')

def inicial():

    layout = [
        [sg.Text('')],
        [sg.Push(),sg.Text('Informe o CPF do agr responsável pela máquina:'),sg.Push()],
        [sg.InputText(size=(40,1), key='-INPUT-')],
        [sg.Text('')],
        [sg.Button('OK',font=("Helvetica", 11,"normal")), sg.Push(), sg.Button('Cancelar',font=("Helvetica", 11,"normal"))],
        [sg.Text('')],
    ]

    window = sg.Window('ATENÇÃO', layout, font=("Calibri",13,"normal"),  finalize=True)
    return window


# loop de leitura de eventos
janela1 = inicial()

while True:
    window, event, values = sg.read_all_windows()
    
    # quando janela for fechada
    if event in (sg.WIN_CLOSED, 'Sair'):
        break
    
    if event == 'OK':
    
        cpf = values['-INPUT-']
        print(cpf)

        sql = "SELECT cpf FROM usuarios WHERE cpf = %s"
        args = (f'{cpf}',)

        #EXECUTA O COMANDO SQL 
        with nova_conexao() as conexao:
            try:
                cursor = conexao.cursor()
                cursor.execute(sql, args)
                usuarios = cursor.fetchone()
                conexao.commit()
            except ProgrammingError as e:
                print(f'Erro: {e.msg}')
            else:

                if usuarios == None:
                    alerta = ag.alert('CPF não encontrado', '#ERROR', 'OK')
                    window['-INPUT-'].update('')
                else:
                    registra_maquina(cpf)
                    break
            
        
        
    if event == 'Cancelar':
        break

window.close()





