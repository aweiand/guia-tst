<style>
  *{
    margin: 0;
    padding: 0:
  }

  body{
    background-color: #f9f9f9;
  }

  #check{
    display: none;
  }
  #icone{
    cursor: pointer;
    padding: 20px;
    position: absolute;
    z-index: 1;
  }
  .barra{
    background-color: #333;
    height:100%;
    width:300px;
    position: absolute;
    transition: all .2s linear;
    left:-300px;
  }
  nav{
    width: 100%;
    position: absolute;
    top: 60px;
  }
  nav a{
    text-decoration: none;
  }

  .link{
    background-color: #c7efc3;/*Cor do fundo do menu*/
    padding: 20px;
    font-size: 14pt;
    transition: all .1s linear;
    color: #333; /*Cor de cada opção de menu*/
    border-bottom: 6px solid #222;
    opacity: 0;
    margin-top: 20px;
  }
  .link:hover{
    background-color: #555; /*cor de quando passa o mouse por cima*/
    color: white;
  }
  #check:checked ~ .barra{
    transform: translateX(300px);
  }
  #check:checked ~ .barra nav a .link{
    opacity: 1;
    margin-top: 0;
    transition-delay: .0s;
    }

</style>
<body>
      <input type="checkbox" id="check">
      <label id="icone" for="check"><img src="../img/icone.png"/></label>

      <div class="barra">

        <nav>
          <a href="../../index.php"><div class="link">Home</div></a>
          <a href="cnae.php"><div class="link">CNAE</div></a>
          <a href="empregado.php"><div class="link">Empregado</div></a>
          <a href="empregado_obrigatorio.php"><div class="link">Empregado Obrigatório</div></a>
          <a href="grupo.php"><div class="link">Grupo</div></a>
          <a href="grupo_cipa.php"><div class="link">Grupo CIPA</div></a>
          <a href="grupo_cnae.php"><div class="link">Grupo CNAE</div></a>
          <a href="intervalo.php"><div class="link">Intervalos</div></a>
          <a href="observacao.php"><div class="link">Observação</div></a>
          <a href="risco.php"><div class="link">Risco</div></a>
        </nav>

      </div>
</body>
