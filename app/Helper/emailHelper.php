<?php

/**
 * emailRecuperacaoSenha
 *
 * @param strting $cLink
 * @return array
 */
function emailRecuperacaoSenha($cLink)
{
    return [
        "assunto" => 'EmpregaMur - Solicitação de recuperação de senha.',
        "corpo" => '
            <html>
            <head>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f7f7f7;
                        color: #333;
                        padding: 20px;
                    }
                    .container {
                        max-width: 600px;
                        background-color: #fff;
                        margin: 0 auto;
                        padding: 20px;
                        border-radius: 8px;
                        box-shadow: 0 0 10px rgba(0,0,0,0.1);
                    }
                    h2 {
                        color: #2c3e50;
                    }
                    a.button {
                        display: inline-block;
                        padding: 12px 20px;
                        margin: 20px 0;
                        background-color: #3498db;
                        color: white !important;
                        text-decoration: none;
                        border-radius: 5px;
                        font-weight: bold;
                    }
                    p {
                        font-size: 16px;
                        line-height: 1.5;
                    }
                    .footer {
                        font-size: 12px;
                        color: #999;
                        margin-top: 30px;
                        border-top: 1px solid #eee;
                        padding-top: 10px;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <h2>Recuperação de senha EmpregaMur</h2>
                    <p>Você solicitou a recuperação da sua senha?</p>
                    <p>Caso tenha sido você, clique no botão abaixo para prosseguir com a recuperação:</p>
                    <p><a href="'. $cLink . '" class="button" title="Recuperar a senha">Recuperar Senha</a></p>
                    <p>Se você não solicitou essa alteração, pode ignorar este email com segurança.</p>
                    <p>Atenciosamente,<br>Equipe EmpregaMur</p>
                    <div class="footer">
                        <p>Este é um email automático, por favor não responda.</p>
                    </div>
                </div>
            </body>
            </html>
        '
    ];
}
