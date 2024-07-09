<?php $this->layout("_theme", ["title" => "Confirme e ative sua conta no CaféControl"]); ?>

<div style="text-align: center;">
    <div style="background-color: #39D39F; color: white; padding: 20px; border-radius: 8px;">
        <h2 style="background-color: #39D39F; color: white; padding: 10px; border-radius: 6px;">
            Seja bem-vindo(a) ao CaféControl <?= $first_name; ?>. Vamos confirmar seu cadastro?
        </h2>
    </div>
    <p>
        É importante confirmar seu cadastro para ativar as notificações.
        Assim podemos enviar a você avisos de vencimentos e muito mais.
    </p>
    <p style="margin: 45px;">
        <a href="<?= $confirm_link; ?>"
           style="
               background-color: #39D39F;
               color: white;
               padding: 10px 20px;
               text-decoration: none;
               border-radius: 6px;
           "
        >
            CLIQUE AQUI PARA CONFIRMAR
        </a>
    </p>
</div>
