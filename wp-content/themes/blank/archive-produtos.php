<?php get_header(); ?>
<script>
function confirmacao() { if (confirm("Deseja excluir esse produto?")){ return true; } else { return false; } }
</script>
<h2>Cadastro de Produtos</h2><br>
<a href="../wp-admin/post-new.php?post_type=produtos" class="btn btn-success">Adicionar Produto <i class="icon-plus icon-black"></i></a><br>
<table class="table table-bordered">
	<thead>
		<th>ID</th>
		<th>Produto</th>
		<th>Descrição</th>
		<th>Preço</th>
		<th>Ação</th>
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
				<td><?php echo get_post_meta( $post->ID, '_produto_preco', true); ?></td>
			<td>
				<a href="../wp-admin/post.php?post=<?php the_id(); ?>&action=edit" class="btn"><i class="icon-pencil"></i> </a>
				<a href="../wp-admin/post.php?post=<?php the_id(); ?>&action=trash" onclick="return confirmacao();" class="btn"><i class="icon-trash"></i> </a>
			</td>
		</tr>
		<?php endwhile;  wp_reset_postdata(); ?>
	</tbody>
</table>

<?php get_footer(); ?>