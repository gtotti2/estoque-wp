<?php
add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup()
{
load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'blankslate' ) )
);
}
add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
function blankslate_load_scripts()
{
wp_enqueue_script( 'jquery' );
}
add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'blankslate_filter_wp_title' );
function blankslate_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init()
{
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'blankslate' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
function blankslate_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}
add_filter( 'get_comments_number', 'blankslate_comments_number' );
function blankslate_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}

add_action('init', 'produtos_function');

function produtos_function(){
		$labels = array(

			'name'								=> 'Produtos',
			'menu_name'							=> 'Produtos',
			'name_admin_bar'					=> 'Produto',
			'add_new'							=> 'Cadastrar Produto',
			'add_new_item'						=> 'Novo Produto',
			'edit_item'							=> 'Editar Produto',
			'view_item'							=> 'Visualizar Produto',
			'searh_items'						=> 'Procurar Produto',
			'not_found'							=> 'Não existem produtos cadastrados',
			);

		$args = array(
			'labels'							=> $labels,
			'public'							=> true,
			'show_ui'							=> true,
			'rewrite'							=> array('slug' => 'produtos' ),
			'menu_position'						=> 20,
			'supports'							=> array('title','category',),
			'has_archive' 						=> true


			);
		register_post_type('produtos', $args);
	}

	add_action('init', 'clientes_function');

	add_action( 'add_meta_boxes', 'produtos_add_meta_box' );
 
	function produtos_add_meta_box() {
	    add_meta_box(
	        'produtos_metaboxid',
	        'Detalhes do Produto',
	        'produtos_inner_meta_box',
	        'produtos'
	    );
	}
 
function produtos_inner_meta_box( $produtos ) {
?>
<p>
  <label for="descricao">Descrição:</label>
  <br />
  <input type="text" name="produto_descricao" required value="<?php echo get_post_meta( $produtos->ID, '_produto_descricao', true ); ?>" />
</p>
<p>
  <label for="realizador">Preço:</label>
  <br />
  <input type="text" name="produto_preco" data-inputmask="'alias': 'currency'" required value="<?php echo get_post_meta( $produtos->ID, '_produto_preco', true ); ?>" />
</p>
<?php
}
?>

<?php

add_action( 'save_post', 'produto_save_post', 10, 2 );
 
function produto_save_post( $produto_id, $produto ) {
 
   // Verificar se os dados foram enviados, neste caso se a metabox existe, garantindo-nos que estamos a guardar valores da página de filmes.
   if ( ! $_POST['produto_descricao'] ) return;
 
   // Fazer a saneação dos inputs e guardá-los
   update_post_meta( $produto_id, '_produto_descricao', strip_tags( $_POST['produto_descricao'] ) );
   update_post_meta( $produto_id, '_produto_preco', strip_tags( $_POST['produto_preco'] ) );
 
   return true;
 
}
?>
<?php
	add_filter('manage_edit-produtos_columns','manage_edit_produtos_columns');

	function manage_edit_produtos_columns($columns) {
		
		$columns = array(
				'cb' => '<input type="checkbox" />',
				'title' => 'Produto',
				'descricao' => 'Descrição',
				'preco' => 'Preço'
			);

		return $columns;

	}

	add_action('manage_produtos_posts_custom_column', '_manage_produtos_posts_custom_column');

	function _manage_produtos_posts_custom_column( $column) { 
		global $post;
		switch ($column) {
			case 'preco':
				$preco = get_post_meta( $post->ID, '_produto_preco', true);
				if( !empty($preco)) {
					echo $preco;
				} else{ echo 'Preço não cadastrado'; 
			}
				break;

			case 'descricao':
				$preco = get_post_meta( $post->ID, '_produto_descricao', true);
				if( !empty($preco)) {
					echo $preco;
				} else{ echo 'Descrição não cadastrada'; 
			}
				break;
		}

	};

function clientes_function(){
		$labels = array(

			'name'								=> 'Clientes',
			'menu_name'							=> 'Clientes',
			'name_admin_bar'					=> 'Cliente',
			'add_new'							=> 'Cadastrar Cliente',
			'add_new_item'						=> 'Novo Cliente',
			'edit_item'							=> 'Editar Cliente',
			'view_item'							=> 'Visualizar Cliente',
			'searh_items'						=> 'Procurar Cliente',
			'not_found'							=> 'Não existem clientes cadastrados',
			);

		$args = array(
			'labels'							=> $labels,
			'public'							=> true,
			'show_ui'							=> true,
			'rewrite'							=> array('slug' => 'clientes' ),
			'menu_position'						=> 20,
			'supports'							=> array('title','category',),
			'has_archive' 						=> true

			);
		register_post_type('clientes', $args);
	}

	add_action( 'add_meta_boxes', 'clientes_add_meta_box' );
 
	function clientes_add_meta_box() {
	    add_meta_box(
	        'clientes_metaboxid',
	        'Detalhes do Cliente',
	        'clientes_inner_meta_box',
	        'clientes'
	    );
	}
 
function clientes_inner_meta_box( $clientes ) {
?>
<p>
  <label for="descricao">E-mail:</label>
  <br />
  <input type="text" name="cliente_email" data-inputmask="'alias': 'email'" required value="<?php echo get_post_meta( $clientes->ID, '_cliente_email', true ); ?>" />
</p>
<p>
  <label for="realizador">Telefone:</label>
  <br />
  <input type="text" name="cliente_telefone" required data-inputmask="'mask': '(99) 9999-9999[9]'" value="<?php echo get_post_meta( $clientes->ID, '_cliente_telefone', true ); ?>" />
</p>
<?php
}
?>

<?php

add_action( 'save_post', 'cliente_save_post', 10, 2 );
 
function cliente_save_post( $cliente_id, $cliente ) {
 
   // Verificar se os dados foram enviados, neste caso se a metabox existe, garantindo-nos que estamos a guardar valores da página de filmes.
   if ( ! $_POST['cliente_email'] ) return;
 
   // Fazer a saneação dos inputs e guardá-los
   update_post_meta( $cliente_id, '_cliente_email', strip_tags( $_POST['cliente_email'] ) );
   update_post_meta( $cliente_id, '_cliente_telefone', strip_tags( $_POST['cliente_telefone'] ) );
 
   return true;
 
}
?>
<?php
	add_filter('manage_edit-clientes_columns','manage_edit_clientes_columns');

	function manage_edit_clientes_columns($columns) {
		
		$columns = array(
				'cb' => '<input type="checkbox" />',
				'title' => 'Cliente',
				'email' => 'E-mail',
				'telefone' => 'Telefone'
			);

		return $columns;

	}

	add_action('manage_clientes_posts_custom_column', '_manage_clientes_posts_custom_column');

	function _manage_clientes_posts_custom_column( $column) { 
		global $post;
		switch ($column) {
			case 'email':
				$email = get_post_meta( $post->ID, '_cliente_email', true);
				if( !empty($email)) {
					echo $email;
				} else{ echo 'E-mail não cadastrado'; 
			}
				break;

			case 'telefone':
				$telefone = get_post_meta( $post->ID, '_cliente_telefone', true);
				if( !empty($telefone)) {
					echo $telefone;
				} else{ echo 'Telefone não cadastrado'; 
			}
				break;
		}

	};

	


	add_action('init', 'pedidos_function');

function pedidos_function(){
		$labels = array(

			'name'								=> 'Pedidos',
			'menu_name'							=> 'Pedidos',
			'name_admin_bar'					=> 'Pedido',
			'add_new'							=> 'Cadastrar Pedido',
			'add_new_item'						=> 'Novo Pedido',
			'edit_item'							=> 'Editar Pedido',
			'view_item'							=> 'Visualizar Pedido',
			'searh_items'						=> 'Procurar Pedido',
			'not_found'							=> 'Não foram realizados pedidos',
			);

		$args = array(
			'labels'							=> $labels,
			'public'							=> true,
			'show_ui'							=> true,
			'rewrite'							=> array('slug' => 'pedidos' ),
			'menu_position'						=> 20,
			'supports'							=> array('title','category',),
			'has_archive' 						=> true

			);
		register_post_type('pedidos', $args);
	}

add_action( 'add_meta_boxes', 'pedidos_add_meta_box' );
 
	function pedidos_add_meta_box() {
	    add_meta_box(
	        'pedidos_metaboxid',
	        'Detalhes do Pedido',
	        'pedidos_inner_meta_box',
	        'pedidos'
	    );
	}
 
function pedidos_inner_meta_box( $pedidos ) {
?>
<p>
  <label for="produto">Nome do Produto:</label>
  <br />
  <select name="pedido_produto" required x-moz-errormessage="Preencha o nome do produto">
	<option value="">Selecione</option>
  <?php 
  $new_query = new WP_Query( array(
    'post_type'      => produtos,
    'orderby'        => 'menu_order',
    'paged'          => $paged
	) );

	while ( $new_query->have_posts() ) : $new_query->the_post(); 

 ?><option value="<?php the_title(); ?>"><?php the_title(); ?></option>

 <?php endwhile;  wp_reset_postdata(); ?>
 </select>
</p>
<p>
  <label for="cliente">Nome do Cliente:</label>
  <br />
  <select name="pedido_cliente" required x-moz-errormessage="Preencha o nome do cliente">
	<option value="">Selecione</option>
  <?php 
  $new_query = new WP_Query( array(
    'post_type'      => clientes,
    'orderby'        => 'menu_order',
    'paged'          => $paged
	) );

	while ( $new_query->have_posts() ) : $new_query->the_post(); 

 ?><option value="<?php the_title(); ?>"><?php the_title(); ?></option>
	<?php endwhile;  wp_reset_postdata(); ?>
	</select>
</p>
<?php
}
?>

<?php

add_action( 'save_post', 'pedido_save_post', 10, 2 );
 
function pedido_save_post( $pedido_id, $pedido ) {
 
   // Verificar se os dados foram enviados, neste caso se a metabox existe, garantindo-nos que estamos a guardar valores da página de filmes.
   if ( ! $_POST['pedido_produto'] ) return;
 
   // Fazer a saneação dos inputs e guardá-los
   update_post_meta( $pedido_id, '_pedido_produto', strip_tags( $_POST['pedido_produto'] ) );
   update_post_meta( $pedido_id, '_pedido_cliente', strip_tags( $_POST['pedido_cliente'] ) );
 
   return true;
 
}
?>
<?php
	add_filter('manage_edit-pedidos_columns','manage_edit_pedidos_columns');

	function manage_edit_pedidos_columns($columns) {
		
		$columns = array(
				'cb' => '<input type="checkbox" />',
				'title' => 'Pedido',
				'produto' => 'Produto',
				'cliente' => 'Cliente'
			);

		return $columns;

	}

	add_action('manage_pedidos_posts_custom_column', '_manage_pedidos_posts_custom_column');

	function _manage_pedidos_posts_custom_column( $column) { 
		global $post;
		switch ($column) {
			case 'produto':
				$pedido_produto = get_post_meta( $post->ID, '_pedido_produto', true);
				if( !empty($pedido_produto)) {
					echo $pedido_produto;
				} else{ echo 'Produto não cadastrado no pedido'; 
			}
				break;

			case 'cliente':
				$pedido_cliente = get_post_meta( $post->ID, '_pedido_cliente', true);
				if( !empty($pedido_cliente)) {
					echo $pedido_cliente;
				} else{ echo 'Cliente não cadastrado no pedido'; 
			}
				break;
		}

	};

 
function custom_post_type_scripts() {

	wp_enqueue_script( 'jquery.inputmask', get_stylesheet_directory_uri() . '/assets/js/jquery.inputmask.bundle.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/assets/js/main.js' );
 
}

 add_action( 'admin_enqueue_scripts', 'custom_post_type_scripts' );

?>


