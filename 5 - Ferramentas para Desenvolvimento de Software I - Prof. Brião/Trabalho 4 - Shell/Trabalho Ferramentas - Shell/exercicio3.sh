#!/bin/bash

NOME='pedro'



if [ $(who -u | awk '{print $1}') = "$nome" ]
then
    echo "Usuário '" $NOME "' ONLINE"
else
    echo "Usuário '" $NOME "' Não Existe"
fi



echo; echo;

#who -H | awk '{print $1, $2, $3}'
who -H | cut -c-38
echo; echo;
echo 'Existe(m)' $(who | wc -l) 'usuário(s) logado(s)'





