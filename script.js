function exibeLogin()
{
    document.getElementById('form-login').style.display = 'block'
    document.getElementById('container').style.display = 'none'
}

function exibeCadastro()
{
    document.getElementById('form-login').style.display = 'none'
    document.getElementById('form-cadastro').style.display = 'block'
    document.getElementById('form-cadastro').style.height = '580px'
}
