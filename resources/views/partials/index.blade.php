

@if ((count($category->children) > 0) AND ($category->parent_id > 0))

   <li data-jstree='{"opened":true}' id="content{{ $category->id }}"><a href="#">{{json_decode($category->name)[0]->name_th}} - {{json_decode($category->name)[0]->name_en}} </a> - ( 
    <a href="/admin/trees/show/{{ $category->id }}"><i class="fas a-lg fa-fw  fa-cog fa-spin"></i></a>
    <a href="javascript::void(0)" id="content_del{{ $category->id }}"><i class="fas fa-lg fa-fw  fa-trash"></i></a>)

@else

     <li data-jstree='{"opened":true}' id="content{{ $category->id }}"><a href="#">{{json_decode($category->name)[0]->name_th}} - {{json_decode($category->name)[0]->name_en}}</a> - ( 
    <a href="/admin/trees/show/{{ $category->id }}"><i class="fas a-lg fa-fw  fa-cog fa-spin"></i></a>
    <a href="javascript::void(0)" id="content_del{{ $category->id }}"><i class="fas fa-lg fa-fw  fa-trash"></i></a>)

@endif

    @if (count($category->children) > 0)

        <ul>

        @foreach($category->children as $category)

            @include('partials.index', $category)

        @endforeach

        </ul>
    @endif

    </li>