@extends('main_layouts.master')
@section('title', 'Termos de Uso | Núcleo Advance')
@section('content')
    <div class="colorlib-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-8 posts-col">

                    <h1>Termos de Uso</h1>

                    <h2>1. Aceitação dos Termos</h2>
                    <p>Ao acessar e usar o site <a href="https://nucleoadvance.com/">https://nucleoadvance.com/</a>, você concorda em cumprir e estar sujeito aos seguintes Termos de Uso. Se você não concorda com qualquer parte destes termos, não utilize nosso site.</p>

                    <h2>2. Alterações nos Termos</h2>
                    <p>Reservamo-nos o direito de modificar ou substituir estes Termos de Uso a qualquer momento. Quaisquer alterações serão publicadas nesta página e a data da "Última Atualização" será ajustada. É de sua responsabilidade revisar estes Termos periodicamente para verificar se há alterações. O uso contínuo do site após a publicação de quaisquer alterações constitui aceitação das novas condições.</p>

                    <h2>3. Uso do Site</h2>
                    <p>Você concorda em usar o site apenas para fins legais e de maneira que não infrinja os direitos de terceiros, nem restrinja ou iniba o uso e aproveitamento do site por qualquer terceiro. Atividades proibidas incluem assediar ou causar angústia ou inconveniência a qualquer pessoa, transmitir conteúdo obsceno ou ofensivo, ou interromper o fluxo normal de diálogo no site.</p>

                    <h2>4. Propriedade Intelectual</h2>
                    <p>Todo o conteúdo presente no site, incluindo textos, gráficos, logotipos, ícones, imagens, clipes de áudio, downloads digitais, compilações de dados e software, é propriedade do Núcleo Advance ou de seus fornecedores de conteúdo e é protegido por leis de direitos autorais e outras leis de propriedade intelectual. Você não pode reproduzir, distribuir, modificar, criar trabalhos derivados, exibir publicamente, executar publicamente, republicar, baixar, armazenar ou transmitir qualquer um dos conteúdos do nosso site, exceto conforme autorizado por estes Termos de Uso.</p>

                    <h2>5. Links para Sites de Terceiros</h2>
                    <p>Nosso site pode conter links para sites de terceiros que não são operados ou controlados por nós. Não temos controle sobre o conteúdo, políticas de privacidade ou práticas de qualquer site de terceiros. Você reconhece e concorda que não somos responsáveis, direta ou indiretamente, por qualquer dano ou perda causados ou supostamente causados por ou em conexão com o uso ou confiança em qualquer conteúdo, bens ou serviços disponíveis em ou através de tais sites de terceiros.</p>

                    <h2>6. Limitação de Responsabilidade</h2>
                    <p>Na máxima extensão permitida pela lei aplicável, em nenhuma circunstância o Núcleo Advance, seus diretores, funcionários, parceiros, agentes, fornecedores ou afiliados serão responsáveis por quaisquer danos indiretos, incidentais, especiais, consequenciais ou punitivos, incluindo, sem limitação, perda de lucros, dados, uso, boa vontade ou outras perdas intangíveis, resultantes de (i) seu acesso ou uso ou incapacidade de acessar ou usar o site; (ii) qualquer conduta ou conteúdo de qualquer terceiro no site; (iii) qualquer conteúdo obtido do site; e (iv) acesso, uso ou alteração não autorizados de suas transmissões ou conteúdo, seja com base em garantia, contrato, delito (incluindo negligência) ou qualquer outra teoria legal, seja ou não fomos informados da possibilidade de tais danos.</p>

                    <h2>7. Indenização</h2>
                    <p>Você concorda em defender, indenizar e isentar o Núcleo Advance e seus licenciadores e licenciados, e seus funcionários, contratados, agentes, executivos e diretores, de e contra quaisquer reivindicações, danos, obrigações, perdas, responsabilidades, custos ou dívidas, e despesas (incluindo, entre outros, honorários advocatícios) resultantes de ou decorrentes de a) seu uso e acesso ao site, por você ou por qualquer pessoa que use sua conta e senha; b) violação destes Termos de Uso; ou c) conteúdo postado no site.</p>

                    <h2>8. Lei Aplicável</h2>
                    <p>Estes Termos serão regidos e interpretados de acordo com as leis do Brasil, sem consideração ao seu conflito de provisões legais. Nossa falha em aplicar qualquer direito ou provisão destes Termos não será considerada uma renúncia a esses direitos. Se qualquer disposição destes Termos for considerada inválida ou inexequível por um tribunal, as disposições restantes destes Termos permanecerão em vigor. Estes Termos constituem o acordo completo entre nós em relação ao nosso serviço, e substituem quaisquer acordos anteriores que possamos ter entre nós em relação ao serviço.</p>

                    <h2>9. Contato</h2>
                    <p>Se você tiver dúvidas sobre estes Termos de Uso, entre em contato conosco através do e-mail <a href="mailto:info@nucleoadvance.com">info@nucleoadvance.com</a>.</p>
                   
               </div>

                <!-- SIDEBAR: start -->
                <div class="col-md-4 animate-box">
                    <div class="sidebar">
                        {{-- <x-blog.side-search :search="$search" /> --}}
                        <x-blog.side-categories :categories="$categories" />
                        <x-blog.side-recent-posts :recentPosts="$recent_posts" />
                        <x-blog.side-tags :tags="$tags" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

