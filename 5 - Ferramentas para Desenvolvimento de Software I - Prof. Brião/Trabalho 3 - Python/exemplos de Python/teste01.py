# Programa teste.
dado = 0
opt = False
while dado != -99:
    dado = input ("entre com o dado:")
    print ("Valor lido de dado: " + str(dado))
    if dado == 10:
        print("Voce acertou o dado")
    else:
        print("voce errou")

    if int(dado)%2 == 0:
        print("PAR")
    else:
        print("IMPAR")


    if int(dado) == 4 \
    and opt == True:
        print("entrou nessa condicao do dado = 4 e opt = True")
    elif int(dado) == 4 \
    and opt == False:
        print("dado = 4 e opt = FALSE")

    if int(dado) == 0:
        print("executando for...")
        
        for contador in range (0,10):
            print(" o numero e "  + str(contador))
        print("fim do for")
        


print ("fim do programa")
