<?php

$this->layout("_theme", ["title" => "Recupere sua senha para acessar o CaféControl"]); ?>

<div style="text-align: center;">
    <div style="background-color: #39D39F; color: white; padding: 20px; border-radius: 8px;">
        <h2>Perdeu sua senha <?= $first_name; ?>?</h2>
    </div>
    <p>
        Você está recebendo este e-mail pois foi solicitado a recuperação de senha no site do CaféControl.
    </p>
    <p style="margin: 45px;">
        <a title='Recuperar Senha'
           href='<?= $forget_link; ?>'
           style="
               background-color: #39D39F;
               color: white;
               padding: 10px 20px;
               text-decoration: none;
               border-radius: 6px;
           "
        >
            CLIQUE AQUI PARA CRIAR UMA NOVA SENHA
        </a>
    </p>
    <p>
        <b>IMPORTANTE:</b> Se não foi você que solicitou ignore o e-mail. Seus dados permanecem seguros.
    </p>
</div>