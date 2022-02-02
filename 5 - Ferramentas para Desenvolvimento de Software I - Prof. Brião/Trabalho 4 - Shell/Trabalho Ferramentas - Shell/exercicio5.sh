#!/bin/bash

cd ..
cd ..
echo 'Carregando arquivos ".java"...'
echo 
#find . -name '*.java' -exec basename {} \; 2>/dev/null


find . -type f -name '*.java' -exec basename {} \; 2>/dev/null | cut -d "." -f 1


