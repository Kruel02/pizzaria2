const botaoAdicionarPizza = document.querySelectorAll(".cards-area__botao-add");
console.log(botaoAdicionarPizza);
const botaoCancelar = document.querySelector(".botao--vermelho");
const btnAdd = document.querySelector(".btnAdd");
const btnMenos = document.querySelector(".btnMenos");
const botaoAdicionarAoCarrinho = document.querySelector('#modal__botao-adicionar');
const carrinho = document.querySelector('.carrinho');
const modal = document.querySelector(".bkg-modal");
let quantidadepizza = parseFloat(document.getElementById('modal__texto-quant').innerHTML);
const btntamanhopizza = document.querySelectorAll(".modal__tamanho-pizza");
const tamanhopizza = document.querySelectorAll(".modal__tamanho-pizza");
const btnfecharcarrinho = document.querySelector("#btn__fechar-carrinho");
const btnabrircarrinhotopo = document.querySelector("#btn__carrinho-topo");

for (let i = 0; i < botaoAdicionarPizza.length; i++) {
    botaoAdicionarPizza[i].addEventListener('click', () => {
        console.log("clicaram no botão");
        modal.classList.add("bkg-modal--ativo");
    })
}

// botaoCancelar.addEventListener('click',()=>{
//     modal.classList.remove('bkg-modal--ativo');
// })

function fecharModal() {
    const modal = document.querySelector('.bkg-modal');
    modal.classList.remove('bkg-modal--ativo');
}

botaoCancelar.addEventListener('click', () => {
    fecharModal();
})

function AbrirCarrinho() {
    const carrinho = document.querySelector('.carrinho');
    carrinho.classList.add('carrinho--visivel')
}
function fecharCarrinho() {
    const carrinho = document.querySelector('.carrinho');
    carrinho.classList.remove('carrinho--visivel')
}

botaoAdicionarAoCarrinho.addEventListener('click', () => {
    fecharModal();
    AbrirCarrinho();
})

btnAdd.addEventListener('click', () => {
    quantidadepizza = quantidadepizza + 1;
    document.getElementById('modal__texto-quant').innerHTML = quantidadepizza;
})

btnMenos.addEventListener('click', () => {
    if (quantidadepizza > 1) {
        quantidadepizza = quantidadepizza - 1;
        document.getElementById('modal__texto-quant').innerHTML = quantidadepizza;

    }
})

function Limparclique() {
    for (let i = 0; i < btntamanhopizza.length; i++) {
        tamanhopizza[i].classList.remove('modal__tamanho-area--ativo');
    }
}

for (let i = 0; i < btntamanhopizza.length; i++) {
    btntamanhopizza[i].addEventListener('click', () => {
        Limparclique();
        tamanhopizza[i].classList.add('modal__tamanho-area--ativo');
    })
}

btnfecharcarrinho.addEventListener('click',()=>{
    fecharCarrinho();
})

btnabrircarrinhotopo.addEventListener('click',()=>{
    AbrirCarrinho();
})