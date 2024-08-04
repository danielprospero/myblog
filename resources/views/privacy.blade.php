@extends('main_layouts.master')
@section('title', 'Política de Privacidade | Núcleo Advance')
@section('content')
    <div class="colorlib-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-8 posts-col">

                    <h1>Política de Privacidade</h1>

                    <h2>1. Introdução</h2>
                    <p>Bem-vindo ao Núcleo Advance! Estamos comprometidos em proteger sua privacidade. Esta Política de Privacidade explica como coletamos, usamos, divulgamos e protegemos suas informações pessoais quando você visita nosso site <a href="https://nucleoadvance.com/">https://nucleoadvance.com/</a> e utiliza nossos serviços.</p>

                    <h2>2. Informações que Coletamos</h2>

                    <h3>2.1. Informações Pessoais</h3>
                    <p>Podemos coletar as seguintes informações pessoais de você:</p>
                    <ul>
                        <li>Nome</li>
                        <li>Endereço de e-mail</li>
                        <li>Endereço postal</li>
                        <li>Número de telefone</li>
                        <li>Informações de pagamento (quando aplicável)</li>
                    </ul>

                    <h3>2.2. Informações Não Pessoais</h3>
                    <p>Também podemos coletar informações não pessoais sobre você, como dados demográficos, preferências e informações de navegação, incluindo:</p>
                    <ul>
                        <li>Endereço IP</li>
                        <li>Tipo de navegador</li>
                        <li>Páginas visitadas</li>
                        <li>Tempo de permanência nas páginas</li>
                        <li>Dados de cookies</li>
                    </ul>

                    <h2>3. Uso das Informações</h2>
                    <p>Usamos as informações coletadas para:</p>
                    <ul>
                        <li>Fornecer, operar e manter nosso site e serviços</li>
                        <li>Melhorar, personalizar e expandir nossos serviços</li>
                        <li>Entender e analisar como você utiliza nosso site</li>
                        <li>Desenvolver novos produtos, serviços, recursos e funcionalidades</li>
                        <li>Enviar e-mails periódicos, incluindo boletins informativos e atualizações de serviços</li>
                        <li>Processar transações e enviar informações relacionadas, incluindo confirmações de compra e faturas</li>
                        <li>Proteger, investigar e prevenir atividades fraudulentas e outras atividades ilegais</li>
                    </ul>

                    <h2>4. Compartilhamento de Informações</h2>
                    <p>Não vendemos, trocamos ou transferimos suas informações pessoais para terceiros sem o seu consentimento, exceto nas seguintes circunstâncias:</p>
                    <ul>
                        <li>Para provedores de serviços terceirizados que nos ajudam a operar nosso site e conduzir nossos negócios</li>
                        <li>Para cumprir com a lei, regulamentação ou ordem judicial</li>
                        <li>Para proteger nossos direitos, propriedade ou segurança, bem como os de nossos usuários e o público</li>
                    </ul>

                    <h2>5. Cookies</h2>
                    <p>Utilizamos cookies para melhorar sua experiência em nosso site. Os cookies são pequenos arquivos de texto armazenados em seu dispositivo quando você visita um site. Eles nos ajudam a entender como você interage com nosso site e a personalizar sua experiência.</p>
                    <p>Você pode optar por desativar os cookies nas configurações do seu navegador, mas isso pode afetar a funcionalidade do site.</p>

                    <h2>6. Segurança das Informações</h2>
                    <p>Adotamos medidas de segurança apropriadas para proteger suas informações pessoais contra acesso não autorizado, alteração, divulgação ou destruição. No entanto, nenhuma transmissão de dados pela internet é completamente segura, e não podemos garantir a segurança absoluta das informações transmitidas para ou através do nosso site.</p>

                    <h2>7. Seus Direitos</h2>
                    <p>Você tem o direito de:</p>
                    <ul>
                        <li>Acessar as informações pessoais que mantemos sobre você</li>
                        <li>Solicitar a correção de informações pessoais imprecisas ou incompletas</li>
                        <li>Solicitar a exclusão de suas informações pessoais</li>
                        <li>Opor-se ao processamento de suas informações pessoais</li>
                        <li>Solicitar a restrição do processamento de suas informações pessoais</li>
                        <li>Solicitar a portabilidade de suas informações pessoais</li>
                    </ul>
                    <p>Para exercer esses direitos, entre em contato conosco através do e-mail <a href="mailto:email@example.com">email@example.com</a>.</p>

                    <h2>8. Alterações a Esta Política de Privacidade</h2>
                    <p>Podemos atualizar esta Política de Privacidade periodicamente para refletir mudanças em nossas práticas ou em leis aplicáveis. Publicaremos quaisquer alterações nesta página e atualizaremos a data da "Última Atualização" no topo desta política. Recomendamos que você revise esta página regularmente para se manter informado sobre nossas práticas de privacidade.</p>

                    <h2>9. Contato</h2>
                    <p>Se você tiver dúvidas ou preocupações sobre esta Política de Privacidade ou nossas práticas de privacidade, entre em contato conosco através do e-mail <a href="mailto:info@nucleoadvance.com">info@nucleoadvance.com</a>.</p>
               </div>

                <!-- SIDEBAR: start -->
                <div class="col-md-4 animate-box">
                    <div class="sidebar">
                        <x-blog.side-search :search="$search" />
                        <x-blog.side-categories :categories="$categories" />
                        <x-blog.side-recent-posts :recentPosts="$recent_posts" />
                        <x-blog.side-tags :tags="$tags" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
