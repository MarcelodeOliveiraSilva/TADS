import re
import sqlite3
import tkinter as tk
import tkinter.ttk as tkk
from tkinter import messagebox


class ConectarDB:
    def __init__(self):
        self.con = sqlite3.connect('db.sqlite3')
        self.cur = self.con.cursor()
        self.criar_tabela()

    def criar_tabela(self):
        try:
            self.cur.execute('''CREATE TABLE IF NOT EXISTS NomeDaTabela (
                nome_produto TEXT,
                qtdd INT,
                preco FLOAT)''')
        except Exception as e:
            print('[x] Falha ao criar tabela: %s [x]' % e)
        else:
            print('\n[!] Tabela criada com sucesso [!]\n')

    def inserir_registro(self, nomeproduto, qtdd, preco):
        try:
            self.cur.execute(
                '''INSERT INTO NomeDaTabela VALUES (?, ?, ?)''', (nomeproduto, qtdd, preco,))
        except Exception as e:
            print('\n[x] Falha ao inserir registro [x]\n')
            print('[x] Revertendo operação (rollback) %s [x]\n' % e)
            self.con.rollback()
        else:
            self.con.commit()
            print('\n[!] Registro inserido com sucesso [!]\n')

    def consultar_registros(self):
        return self.cur.execute('SELECT rowid, * FROM NomeDaTabela').fetchall()

    def consultar_ultimo_rowid(self):
        return self.cur.execute('SELECT MAX(rowid) FROM NomeDaTabela').fetchone()

    def update_registro(self, nomeproduto, qtdd, preco):
        try:
            self.cur.execute('''UPDATE NomeDaTabela SET (?, ?, ?)''', (nomeproduto, qtdd, preco))
                     
        except Exception as e:
            print('\n[x] Falha ao atualizar registro [x]\n')
            print('[x] Revertendo operação (rollback) %s [x]\n' % e)
            self.con.rollback()
        else:
            self.con.commit()
            print('\n[!] Registro atualizado com sucesso [!]\n')

    def remover_registro(self, rowid):
        try:
            self.cur.execute("DELETE FROM NomeDaTabela WHERE rowid=?", (rowid,))
        except Exception as e:
            print('\n[x] Falha ao remover registro [x]\n')
            print('[x] Revertendo operação (rollback) %s [x]\n' % e)
            self.con.rollback()
        else:
            self.con.commit()
            print('\n[!] Registro removido com sucesso [!]\n')


class Janela(tk.Frame):
    """Janela principal"""

    def __init__(self, master=None):
        """Construtor"""
        super().__init__(master)
        # Coletando informações do monitor
        largura = round(self.winfo_screenwidth() / 2)
        altura = round(self.winfo_screenheight() / 2)
        tamanho = ('%sx%s' % (largura, altura))

        # Título da janela principal.
        master.title('Tabela de Produtos')

        # Tamanho da janela principal.
        master.geometry(tamanho)

        # Instanciando a conexão com o banco.
        self.banco = ConectarDB()

        # Gerenciador de layout da janela principal.
        self.pack()

        # Criando os widgets da interface.
        self.criar_widgets()

    def criar_widgets(self):
        # Containers.
        frame1 = tk.Frame(self)
        frame1.pack(side=tk.TOP, fill=tk.BOTH, padx=5, pady=5)

        frame2 = tk.Frame(self)
        frame2.pack(fill=tk.BOTH, expand=True)

        frame3 = tk.Frame(self)
        frame3.pack(side=tk.BOTTOM, padx=5)

        frame4 = tk.Frame(self)
        frame4.pack(side=tk.BOTTOM, padx=10)

        # Labels.
        label_produto = tk.Label(frame1, text='Nome do Produto')
        label_produto.grid(row=0, column=0)

        label_qtdd = tk.Label(frame1, text='Quantidade')
        label_qtdd.grid(row=0, column=1)

        label_preco = tk.Label(frame1, text='Preço')
        label_preco.grid(row=0, column=2)

        # Entrada de texto.
        self.entry_produto = tk.Entry(frame1)
        self.entry_produto.grid(row=1, column=0)

        self.entry_qtdd = tk.Entry(frame1)
        self.entry_qtdd.grid(row=1, column=1, padx=10)

        self.entry_preco = tk.Entry(frame1)
        self.entry_preco.grid(row=1, column=2)

        # Botão para adicionar um novo registro.
        button_adicionar = tk.Button(frame1, text='Adicionar', bg='blue', fg='white')
        # Método que é chamado quando o botão é clicado.
        button_adicionar['command'] = self.adicionar_registro
        button_adicionar.grid(row=0, column=3, rowspan=2, padx=10)

        # Treeview.
        self.treeview = tkk.Treeview(frame2, columns=('Nome do Produto', 'Quantidade', 'Preço'))
        self.treeview.heading('#0', text='Código')
        self.treeview.heading('#1', text='Nome do Produto')
        self.treeview.heading('#2', text='Quantidade')
        self.treeview.heading('#3', text='Preço')

        # Inserindo os dados do banco no treeview.
        label_preco = tk.Label(frame1, text='Preço')
        label_preco.grid(row=0, column=2)
        for row in self.banco.consultar_registros():
            self.treeview.insert('', 'end', text=row[0], values=(row[1], row[2], row[3]))

        self.treeview.pack(fill=tk.BOTH, expand=True)

        # Botão para atualizar um item.
        button_update = tk.Button(frame3, text='Atualizar', bg='green', fg='white')
        # Método que é chamado quando o botão é clicado.
        button_update['command'] = self.update_registro
        button_update.pack(pady=10)

        # Botão para remover um item.
        button_excluir = tk.Button(frame4, text='Excluir', bg='red', fg='white')
        # Método que é chamado quando o botão é clicado.
        button_excluir['command'] = self.excluir_registro
        button_excluir.pack(pady=20)

        # Mostrando os dados do banco no treeview.
        '''label_maior = tk.Label(frame1, text='Maior Valor')
        label_maior.grid(row=0, column=4)
        for row in self.banco.consultar_registros():
            print ("Max value element : ", max(self.banco.consultar_registros(preco)))
            self.treeview.insert('', 'end', text=row[0], values=(row[1], row[2], row[3]))

        self.treeview.pack(fill=tk.BOTH, expand=True)

            def consultar_registros(self):
        return ,'''



    def adicionar_registro(self):
        # Coletando os valores.
        produto = self.entry_produto.get()
        qtdd = self.entry_qtdd.get()
        preco = self.entry_preco.get()

        # Validação simples (utilizar datetime deve ser melhor para validar).
        validar_preco = re.search(r'^([+-]?\d+)(\.\d+)?$', preco)

        # Se o preco digitada passar na validação
        if validar_preco:
            # Dados digitando são inseridos no banco de dados
            self.banco.inserir_registro(nomeproduto=produto, qtdd=qtdd, preco=preco)

            # Coletando a ultima rowid que foi inserida no banco.
            rowid = self.banco.consultar_ultimo_rowid()[0]

            # Adicionando os novos dados no treeview.
            self.treeview.insert('', 'end', text=rowid, values=(produto, qtdd, preco))
        else:
            # Caso a preco não passe na validação é exibido um alerta.
            messagebox.showerror('Erro', 'Padrão de preço incorreto, utilize 00.00')


    def update_registro(self):
        # Coletando os valores.
        produto = self.entry_produto.get()
        qtdd = self.entry_qtdd.get()
        preco = self.entry_preco.get()

        # Validação simples (utilizar datetime deve ser melhor para validar).
        validar_preco = re.search(r'^([+-]?\d+)(\.\d+)?$', preco)

        # Verificando se algum item está selecionado.
        if not self.treeview.focus():
            messagebox.showerror('Erro', 'Nenhum item selecionado')
        else:
            # Coletando qual item está selecionado.
            item_selecionado = self.treeview.focus()

            # Coletando os dados do item selecionado (dicionário).
            rowid = self.treeview.item(item_selecionado)

            # atualizando o item com base no valor do rowid (argumento text do treeview).
            # atualizando valor da tabela.
            self.banco.update_registro(produto,qtdd,preco)

            # atualizando valor do treeview.
            #self.treeview.update(produto,qtdd,preco)


    def excluir_registro(self):
        # Verificando se algum item está selecionado.
        if not self.treeview.focus():
            messagebox.showerror('Erro', 'Nenhum item selecionado')
        else:
            # Coletando qual item está selecionado.
            item_selecionado = self.treeview.focus()

            # Coletando os dados do item selecionado (dicionário).
            rowid = self.treeview.item(item_selecionado)

            # Removendo o item com base no valor do rowid (argumento text do treeview).
            # Removendo valor da tabela.
            self.banco.remover_registro(rowid['text'])

            # Removendo valor do treeview.
            self.treeview.delete(item_selecionado)


root = tk.Tk()
app = Janela(master=root)
app.mainloop()

