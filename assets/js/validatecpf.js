function validacaocpf(){ 
// Calculo de validação de CPF

// Declaração de variáveis

var fmi = 0; fmn = 1; fmsoma = 0; 
var fmcpf = [fmi]; 
var fmresultados = [fmi];
var fmv1, fmv2;
var fmcpf2;

/* Laço de repetição que coleta CPF dígito a dígito e coloca em espaços consecutivos no Array "cpf"*/
fmcpf2 = form_cadastro.cpf_user.value;

if (fmcpf2.length < 11){
alert ("Erro! Digite novamente!");
return false;
}

while (fmi <= 10){
fmcpf [fmi] = parseInt(fmcpf2 [fmi]);
fmn++;
fmi++;
}

/* Verificação se os dígitos do CPF são iguais*/

fmi = 0;
while (fmi <= 9){
if (fmcpf [fmi] == fmcpf [fmi + 1]){
fmn = 1;
fmi++;
}
else if (fmcpf [fmi] != fmcpf[fmi + 1]){
fmn = 0;
break;
}
}

if (fmn == 1){
alert ("CPF Inválido!");
return false;
 }
else if (fmn == 0){

/* Laço de repetição responsável por salvar no Array "resultados" os valores das multiplicações dos digitos do cpf por seus respectivos pesos "n"*/

fmi = 0;
fmn = 10;
while (fmi <= 8 && fmn >= 2){
fmresultados [fmi] = fmcpf[fmi] * fmn;
fmi++;
fmn--;
}

/* Laço de repetição responsável por somar os valores dentro do Array "resultados" e joga-los na variável "soma"*/ 

fmi = 0;
while (fmi <= 7){
fmn = fmresultados [fmi] + fmresultados [fmi + 1];
fmsoma = fmsoma + fmn;
fmi = fmi + 2;
}
fmsoma = fmsoma + fmresultados [8];

/* Estrutura condicional responsável pelo calculo final do dígito feito encima do resto da divisão de "soma" por 11*/

if (fmsoma % 11 < 2){
fmv1 = 0;
}
else if (fmsoma % 11 >= 2){
fmv1 = 11 - (fmsoma % 11);
}


/* Repetição de todo o processo com a adição do primeiro dígito descoberto ("v1") ao calculo*/

fmi = 0;
fmn = 11;
while (fmi <= 9 && fmn >= 2){
fmresultados [fmi] = fmcpf[fmi] * fmn;
fmi++;
fmn--;
}

fmi = 0;
fmsoma = 0;
while (fmi <= 9){
fmn = fmresultados [fmi] + fmresultados [fmi + 1];
fmsoma = fmsoma + fmn;
fmi = fmi + 2;
}

if (fmsoma % 11 < 2){
fmv2 = 0;
}
else if (fmsoma % 11 >= 2){
fmv2 = 11 - (fmsoma % 11);
}

if (fmv1 == fmcpf [9] && fmv2 == fmcpf [10]){
alert ("CPF Aceito!");

}
else{
alert ("CPF Inválido!");
return false;
}

}
return true;
}