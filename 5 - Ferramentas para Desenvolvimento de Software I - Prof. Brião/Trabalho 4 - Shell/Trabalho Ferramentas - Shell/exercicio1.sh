#!/bin/bash

DIR="$1"

if ! [ $DIR ]
then
DIR='.'
fi


NUMDIR=$(ls -lR "$DIR" | grep '^d' | wc -l)

NUMARQ=$(ls -lR "$DIR" | grep '^-' | wc -l)

echo "Existem $NUMDIR diretórios e $NUMARQ arquivos no diretório $DIR"
