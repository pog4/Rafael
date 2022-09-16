class Aluno {
    constructor(nome, n1, n2, n3) {
      this.nome = nome;
      this.n1 = parseint(n1);
      this.n2 = parseint(n2);
      this.n3 = parseint(n3);
    }  
    media() {
        return ((this.n1 + this.n2 + this.n3)/3);
    }

    set _setNome(nome) {
    this.nome = nome;
    }
    set _setN1(n1) {
    this.n1 = n1;
    }
    set _setN2(n2) {
    this.n2 = n2;
    }
    set _setN3(n3) {
    this.n3 = n3;
    }

    get _nome() {
    return this.nome;
    }
    get _n1() {
    return this.n1;
    }
    get _n2() {
    return this.n2;
    }
    get _n3() {
    return this.n3;
    }
  }

var alunos = [];

function IncluirAluno(nome, n1, n2, n3) {
   let valuno = new Aluno(nome, n1, n2, n3);
   alunos.push(valuno);
   return valuno.xd();
}

function ListarAluno(separa = ' : ',  separadorlinha = ";") {
  let retorno = "";
  alunos.forEach(function(valuno,i) {
    retorno += '<strong ondblclick="ApagaAluno('+i+')">&nbsp;'+i+'&nbsp;</strong>'+separa+valuno._nome + separa + valuno._n1 + separa + valuno._n2+ separa + valuno._n3 + separa + valuno.media()+separadorlinha;
  });
  return retorno;
}

function LimparAluno() {
  alunos = [];
}

function ApagaAluno(i) {
  alunos.splice(i,1);
  
}

function ContaAluno() {
  return alunos.length;
}
