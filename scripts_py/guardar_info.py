from informacoes_maquina import informacoes_maquina
from db import nova_conexao
from mysql.connector.errors import ProgrammingError
import pyautogui as ag


#ABRE A JANELA PARA PEGAR O CPF DO AGR NO INICIO DA EXECUÇÃO 
cpf = ag.prompt('Digite o cpf do responsavel pela máquina:')

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
        print('1 registro incluido, ID: ', cursor.lastrowid)