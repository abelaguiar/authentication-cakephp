<div class="text-center">
    <h1 class="mx-auto" data-text="404">Não Autorizado</h1>
    <p class="lead text-gray-800 mb-5">Você não tem permissão para essa área</p>
    <p class="text-gray-500 mb-0">Por favor, procure o administrador para mais informações.</p>
    <br>
    <br>
    "
    <?php 
        $rand = rand(1, 4);

        if ($rand == 1) {
            echo "Uma maneira de preservar sua própria imagem é não deixar que o mundo invada sua casa.<br> Foi um modo que encontrei de preservar ao máximo meus valores.";
        }

        if ($rand == 2) {
            echo "Ao invadir a privacidade de uma pessoa, você não está dando prova de amor, mas de obsessão.";
        }

        if ($rand == 3) {
            echo "As relações abalam-se quando há invasão de privacidade... a discrição é um dom da inteligência.";
        }

        if ($rand == 4) {
            echo "Não deixe ninguém invadir sua privacidade espiritual, se ela ainda exerce o poder de sua confiança em Deus.";
        }
    ?>
    "
</div>
