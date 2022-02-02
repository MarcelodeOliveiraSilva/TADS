#!/usr/bin/env python
# -*- coding: latin-1 -*-
# Desenvolvimento Aberto
# View.py
  
# importa modulos
import tkinter as tk
import tkinter.ttk as tkk
import tkinter.messagebox
from tkinter import messagebox
from tkinter import *
import cx_Oracle
import ibm_db
import odbc
  
# Cria formulario
formulario = Tk(className='Desenvolvimento aberto - View & Trigger')
formulario.geometry("470x390+300+300")
  
# Cria janela para menssagem
janela = Tk()
janela.wm_withdraw()
  
# Define banco de dados
# oracle = Oracle Database
# db2 = IBM DB2 Database
# mssql = Microsoft SQL Server
DBconexao = "oracle"
  
# Cria conexão com o banco de dados
def conectar(banco):
    # Cria string de conexão Oracle
    if (banco == "oracle"):
        sconexao = "user/pass@localhost/XE"
        try:
            con = cx_Oracle.connect(sconexao)
        except ValueError:
            tkMessageBox.showinfo(title="Menssagem", message="Erro de Conexão", parent=janela)
  
    if (banco == "db2"):
        # Cria string de conexão IBM
        sconexao = "DATABASE=DEVA" +  \
                   ";HOSTNAME=localhost;PORT=50000;PROTOCOL=TCPIP;" + \
                   "UID=user;" + \
                   "PWD=pass"
        try:
            con = ibm_db.connect(sconexao, "", "")
        except ValueError:
            tkMessageBox.showinfo(title="Menssagem", message="Erro de Conexão", parent=janela)
  
    if (banco == "mssql"):
        # Cria string de conexão MSSQL ODBC
        sconexao =  "MSSQLSERVER/user/pass"
        try:
            con = odbc.odbc(sconexao)
        except ValueError:
           tkMessageBox.showinfo(title="Menssagem", message="Erro de Conexão", parent=janela)
  
    return con
  
# Executa e retorna cursor
def retornaFuncionarioID(sql, con, banco):
    if (banco == "oracle"):
        cursor = con.cursor()
        cursor.execute(sql)
    if (banco == "db2"):
        cursor = ibm_db.exec_immediate(con, sql)
    if (banco == "mssql"):
        cursor = con.cursor()
        cursor.execute(sql)
    return cursor
  
# Limpa campo
def limpar():
    tcodigo.delete(0, END)
    tpnome.delete(0, END)
    tsnome.delete(0, END)
    tcargo.delete(0, END)
    tsalario.delete(0, END)
    tporcentagem.delete(0, END)
  
# Evento do botão
def on_Pesquisar():
    # Exibe banco de dados
    titulo['text'] = "Database: " + DBconexao
  
    # Cria conexão
    con = conectar(DBconexao)
  
    # Define e executa SQL
    sql = "Select * From CadFuncionario Where  ID_FUNCIONARIO = " + tpesquisa.get()
    tabela = retornaFuncionarioID(sql, con, DBconexao)
  
    # Cria cursor
    if (DBconexao == "oracle"):
        dados = tabela.fetchone()
    if (DBconexao == "db2"):
        dados = ibm_db.fetch_tuple(tabela)
    if (DBconexao == "mssql"):
        dados = tabela.fetchone()
  
    # Exibe dados
    limpar()
    tcodigo.insert(0, str(dados[0]))
    tpnome.insert(0, dados[1])
    tsnome.insert(0, dados[2])
    tcargo.insert(0, dados[3])
    tsalario.insert(0, str(dados[4]))
    tporcentagem.insert(0, str(dados[5]))
  
# limpa widgets
def on_novo():
    limpar()
    tcodigo.focus()
  
# Insere dados
def on_inserir():
    con = conectar(DBconexao)
    if (DBconexao != "db2"): cursor = con.cursor()
  
    sql ="Insert into CadFuncionario Values (" + \
          tcodigo.get() + ", '" + \
          tpnome.get() + "', '" + \
          tsnome.get() + "', '" + \
          tcargo.get() + "', " + \
          str(tsalario.get()).replace(",",".") + ", " + \
          str(tporcentagem.get()).replace(",",".")+ ")"
    try:
        if (DBconexao != "db2"):
            cursor.execute(sql)
            con.commit()
        else:
            cursor = ibm_db.exec_immediate(con, sql)
        tkMessageBox.showinfo(title="Menssagem", message="Dados inseridos com sucesso!", parent=janela)
    except ValueError:
        tkMessageBox.showinfo(title="Menssagem", message="Erro ao inserir dados!", parent=janela)
  
# Altera dados
def on_alterar():
    con = conectar(DBconexao)
    if (DBconexao != "db2"): cursor = con.cursor()
 
    #
    # TODO: Criar Trigger - INSTEAD OF UPDATE
    #
  
    sql ="Update CadFuncionario set " + \
          "ID_FUNCIONARIO = " + tcodigo.get() + ", NOME= '" + \
          tpnome.get() + "', SOBRENOME= '" + \
          tsnome.get() + "', CARGO= '" + \
          tcargo.get() + "', SALARIO= " + \
          str(tsalario.get()).replace(",",".") + ", " +  \
          str(tporcentagem.get()).replace(",",".") + " Where ID_FUNCIONARIO=" + tcodigo.get()
  
    try:
  
       if (DBconexao != "db2"):
           cursor.execute(sql)
           con.commit()
       else:
           cursor = ibm_db.exec_immediate(con, sql)            
  
       tkMessageBox.showinfo(title="Menssagem", message="Dados alterados com sucesso!", parent=janela)
    except ValueError:
        tkMessageBox.showinfo(title="Menssagem", message="Erro ao alterar dados!", parent=janela)
  
# Exclui dados
def on_apagar():
    con = conectar(DBconexao)
    if (DBconexao != "db2"): cursor = con.cursor()
  
    sql ="Delete From CadFuncionario Where ID_FUNCIONARIO = " + tcodigo.get()
 
    #
    # TODO: Criar Trigger - INSTEAD OF DELETE
    #
  
    try:
        if (DBconexao != "db2"):
            cursor.execute(sql)
            con.commit()
        else:
            cursor = ibm_db.exec_immediate(con, sql)
        limpar()
        tkMessageBox.showinfo(title="Menssagem", message="Dados excluidos com sucesso!", parent=janela)
    except ValueError:
        tkMessageBox.showinfo(title="Menssagem", message="Erro ao excluir dados!", parent=janela)
  
# Cria componentes widgets
titulo = Label(formulario, text="Database: Nenhum")
separador1 = Frame(height=2, bd=1, relief=SUNKEN)
separador2 = Frame(height=2, bd=1, relief=SUNKEN)
 
# labels
lcodigo = Label(formulario, text="Codigo:")
lpnome = Label(formulario, text="Nome:")
lsnome = Label(formulario, text="Sobrenome:")
lcargo = Label(formulario, text="Cargo:")
lsalario = Label(formulario, text="Salario:")
lporcentagem = Label(formulario, text="Porcentagem (%):")
  
# Entry
tcodigo = Entry(formulario)
tpnome = Entry(formulario)
tsnome = Entry(formulario)
tcargo = Entry(formulario)
tsalario = Entry(formulario)
tporcentagem = Entry(formulario)
  
# Pesquisa
lpesquisa = Label(formulario, text="Pesquisa:")
tpesquisa = Entry(formulario)
botao = Button(formulario, text = "Pesquisar", command=on_Pesquisar)
  
#Ações
painel = Frame()
bnovo = Button(painel, text="Novo", command=on_novo)
binserir = Button(painel, text="Inserir", command=on_inserir)
balterar = Button(painel, text="Alterar", command=on_alterar)
bapagar = Button(painel, text="Apagar", command=on_apagar)
  
# Define Layout
titulo.grid(row=0, sticky=W+E+N+S, pady=20)
separador1.grid(row=1,sticky=W+E+N+S, columnspan=3)
 
lcodigo.grid(row=3, sticky=W, padx=20)
tcodigo.grid(row=3, column=1, pady=5)
lpnome.grid(row=4,sticky=W, padx=20)
tpnome.grid(row=4, column=1, pady=5)
lsnome.grid(row=5,sticky=W, padx=20)
tsnome.grid(row=5, column=1, pady=5)
lcargo.grid(row=6, sticky=W, padx=20)
tcargo.grid(row=6, column=1, pady=5)
lsalario.grid(row=7, sticky=W, padx=20)
tsalario.grid(row=7, column=1, pady=5)
lporcentagem.grid(row=8, sticky=W, padx=20)
tporcentagem.grid(row=8, column=1, pady=5)
  
# Layout pesquisa
lpesquisa.grid(row=2, column=0, pady=20)
tpesquisa.grid(row=2, column=1, pady=20)
botao.grid(row=2, column=2,padx=10, pady=20)
  
# Loayout Ações
bnovo.grid(row =1, column=0, pady=10)
binserir.grid(row =1, column=1, pady=10)
balterar.grid(row =1, column=2, pady=10)
bapagar.grid(row =1, column=3, pady=10)
separador2.grid(row=9, sticky=W+E, columnspan=3, pady=10)
painel.grid(row=10, sticky=W+E, column=1, columnspan=1)
  
# loop do tcl
mainloop()