<?php get_header(); ?>
<h2>Lista de Pedidos</h2><br>
	<table class="table table-bordered">
		<thead>
			<th>Id do Pedido</th>
			<th>Cliente</th>
			<th>Produto</th>
		</thead>
		<tbody>
  <?php 
  $new_query = new WP_Query( array(
    'post_type'      => array(pedidos),
    'orderby'        => 'menu_order',
    'paged'          => $paged
	) );

	while ( $new_query->have_posts() ) : $new_query->the_post(); ?>
			<tr>
				<td><?php the_id(); ?></td>
				<td><?php echo get_post_meta( $post->ID, '_pedido_produto', true); ?></td>
				<td><?php echo get_post_meta( $post->ID, '_pedido_cliente', true); ?></td>
			</tr>
			<?php endwhile;  wp_reset_postdata(); ?>
		</tbody>
	</table>

	<h2>Lista de Clientes</h2><br>
	<table class="table table-bordered">
		<thead>
			<th>ID</th>
			<th>Nome</th>
			<th>E-mail</th>
			<th>Telefone</th>
		</thead>
		<tbody>
		  <?php 
		  $new_query = new WP_Query( array(
		    'post_type'      => clientes,
		    'orderby'        => 'menu_order',
		    'paged'          => $paged
			) );

			while ( $new_query->have_posts() ) : $new_query->the_post(); ?>
			<tr>
				<td><?php the_id(); ?></td>
				<td><?php the_title(); ?></td>
				<td><?php echo get_post_meta( $post->ID, '_cliente_email', true); ?></td>
				<td><?php echo get_post_meta( $post->ID, '_cliente_telefone', true); ?></td>
			</tr>
			<?php endwhile;  wp_reset_postdata(); ?>
		</tbody>
	</table>



	<h2>Lista de Produtos</h2><br>
	<table class="table table-bordered">
	<thead>
		<th>ID</th>
		<th>Produto</th>
		<th>Descrição</th>
		<th>Preço</th>
	</thead>
	<tbody>
		  <?php 
		  $new_query = new WP_Query( array(
		    'post_type'      => produtos,
		    'orderby'        => 'menu_order',
		    'paged'          => $paged
			) );

			while ( $new_query->have_posts() ) : $new_query->the_post(); ?>
		<tr>
			<td><?php the_id(); ?></td>
			<td><?php the_title(); ?></td>
			<td><?php echo get_post_meta( $post->ID, '_produto_descricao', true); ?></td>
			<td>R$ <?php echo get_post_meta( $post->ID, '_produto_preco', true); ?></td>
		</tr>
		<?php endwhile;  wp_reset_postdata(); ?>
	</tbody>
</table>
<?php get_footer(); ?>