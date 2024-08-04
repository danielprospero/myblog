
@props(['search'])

<div class="side">
    <h3 class="sidebar-heading">Pesquisar</h3>
    <div class="block-24">
        <form action="{{ route('home') }}" method="GET">
            <input value="{{ $search }}" type="search" class="form-control" name="search" placeholder="Pesquisar..." style="margin-bottom: 15px;">
            <button type="submit" class="btn btn-primary">Pesquisar</button>
            <a href="{{ route('home') }}" class="btn btn-warning">Limpar</a>
        </form>
    </div>
</div>
