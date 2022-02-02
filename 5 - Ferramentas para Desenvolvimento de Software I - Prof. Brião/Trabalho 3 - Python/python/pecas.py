import mysql.connector

connection = mysql.connector.connect(host='localhost', user='root', password='', database='mysql')
cursor = connection.cursor(dictionary=True)

'''for i in range(3):
	nome = input('Digite o Nome da Peça: ')
	quantidade = input('Digite a quantidade: ')
	preco = input('Digite o preço: ')
	cursor.execute("INSERT INTO pecas(nome,quantidade,preco) VALUES('{}', {}, {})".format(nome, quantidade, preco))
	connection.commit()

nome = input("Digite o nome da peça que você quer deletar: ")
cursor.execute("DELETE from pecas WHERE nome='{}'".format(nome))
connection.commit()

cursor.execute("SELECT * from pecas")
pecas = cursor.fetchall()

print(pecas)'''




