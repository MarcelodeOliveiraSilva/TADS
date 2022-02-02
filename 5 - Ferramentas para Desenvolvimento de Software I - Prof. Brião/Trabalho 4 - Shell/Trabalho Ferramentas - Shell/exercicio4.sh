#!/bin/bash


#sintaxe
#tar [parâmetros] [nome_do_arquivo_tar] [arquivos_de_origem]

#echo "Diretorio $1 em backup..."
#DATA=$(date +%Y-%m-%d)
#echo "Data Atual: $DATA"
#echo "Nome do Diretório: $1"

#tar czvf "t1$DATA".tar.gz t1/

echo  "Digite o nome do diretório: "
read DIRETORIO
echo "O Diretório digitado foi: $DIRETORIO"

echo "Diretorio $DIRETORIO em backup..."
DATA=$(date +%Y-%m-%d)
echo "Data Atual: $DATA"
echo "Nome do Diretório: $DIRETORIO"
echo "DIRETORIO e DATA ATUAL: $DIRETORIO$DATA"

tar czvf "$DIRETORIO$DATA".tar.gz $1



receba nome de arquivo



