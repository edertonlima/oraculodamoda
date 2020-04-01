<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'edertton_oraculodamoda' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'edertton_admin' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', 'FsoR8e6YHfO9' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '7r4XCU1B+<Q9rVhFhkJKjktPNaCG8*/!a#Hbv-)9*}Y|Y;$p-Pmb*+HPH^1>KL~g' );
define( 'SECURE_AUTH_KEY',  ':<A1}gVrm(lm*.cR7!?WTlZ :[er4R3[!U4Q7ZWh1-g]U-G$OdBM,Knj6@Jqe~8@' );
define( 'LOGGED_IN_KEY',    '!#Qlc/OhZ/0Syj|n9`lUb3QEjWE4jgfSpl<@hkG3$JjCLpz)2,[&=Ij*:[c>@C8$' );
define( 'NONCE_KEY',        '1J&*-g$Z/dD17qrw|wFf,pYU~%RlA(zR4)}( KlTD ^GPR#iPdS5!;s3,oV4]-=@' );
define( 'AUTH_SALT',        'k`=$6!P-bS ]2UXf#k-l O5>l`6#U*Uc%mOGV%BYhI#Mi7mRa)prv#z~MITV&F*>' );
define( 'SECURE_AUTH_SALT', '{+a}u+~S3.j~ kaTqc!L$ yzSV8GX2q/O}l>~#FwRl` 6Q!IYYp~^yIO@zkiqD26' );
define( 'LOGGED_IN_SALT',   '.IRdfK]#$2<DsM(orNmE61T{Dp!:E5;O%k6jC9apQeR:0+@0O]Z9J<|xABQN5bkT' );
define( 'NONCE_SALT',       'z7WR F3P(*K-&8#^pkG1^hncDBmgSdD/x@e q`?Yf4Myz,7$M}9,D3g+_2b}Fete' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
