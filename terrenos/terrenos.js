class Terreno {
    constructor(proprietario, endereco, largura, comprimento) {
      this.proprietario = proprietario;
      this.endereco = endereco;
      this.largura = largura;
      this.comprimento = comprimento;
    }  
    area() {
        return this.largura * this.comprimento;
    }

    set _setProprietario(proprietario) {
    this.proprietario = proprietario;
    }
    set _setEndereco(endereco) {
    this.endereco = endereco;
    }
    set _setLargura(largura) {
    this.largura = largura;
    }
    set _setComprimento(comprimento) {
    this.comprimento = comprimento;
    }

    get _proprietario() {
    return this.proprietario;
    }
    get _endereco() {
    return this.endereco;
    }
    get _largura() {
    return this.largura;
    }
    get _comprimento() {
    return this.comprimento;
    }
  }

var terrenos = [];

function fIncluirTerreno(proprietario, endereco, largura, comprimento) {
   let vterreno = new Terreno(proprietario, endereco, largura, comprimento);
   terrenos.push(vterreno);
   return vterreno.area();
}

function fListarTerrenos(separa = ' : ',  separadorlinha = ";") {
  let retorno = "";
  terrenos.forEach(function(vterreno,i) {
    retorno += '<strong ondblclick="fApagaTerreno('+i+')">&nbsp;'+i+'&nbsp;</strong>'+separa+vterreno._proprietario + separa + vterreno._endereco + separa + vterreno._largura+ separa + vterreno._comprimento + separa + vterreno.area()+separadorlinha;
  });
  return retorno;
}

function fLimparTerrenos() {
  terrenos = [];
}

function fApagaTerreno(i) {
  //console.log(i);
  terrenos.splice(i,1);
  //console.log(terrenos);
  
}

function fContaTerrenos() {
  return terrenos.length;
}
