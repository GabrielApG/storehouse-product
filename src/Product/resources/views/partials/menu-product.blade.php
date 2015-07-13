<!-- ___ -->
<!-- start partial menu -->
<ul class="dropdown-menu">
	<li class="dropdown-submenu">
        <a tabindex="1" data-toggle="dropdown">Categoria</a>
        <ul class="dropdown-menu">
          <li><a href="{{ route("storehouse.product.category.create") }}" tabindex="0">Cadastro</a></li>
          <li><a href="{{ route("storehouse.product.category.view.search") }}" tabindex="0">Pesquisar</a></li>
        </ul>
    </li>
  <li><a href="{{ route("storehouse.product.create") }}" tabindex="0">Cadastro</a></li>
  <li><a href="{{ route("storehouse.product.view.search") }}" tabindex="0">Pesquisar</a></li>
</ul>
<!-- end partial menu -->
