				
				<div id="gallery_group">
					<ul class="gallery-list" id="sortable">  
						@if($image != '')
						@foreach($image as $value)
							@if ($value['id'] != '')

							<li id="{{ $value['id'] }}">
								<div class="image-container">
									<div class="image" style="cursor: move; background:url({{ asset('public/images/'.$value['image']) }}); background-position:center center; background-size:cover;">
									</div>
									<div class="btn-list">
										<a href="{{ asset('public/images/'.$value['image']) }}" class="image-link btn btn-white btn-xs"><i class="fa fa-search-plus"></i></a>
										<a href="/admin/{{$folder}}/show/{{ $value['id'] }}" class="btn btn-white btn-xs"><i class="fas fa-cog fa-spin"></i></a>
										
										<a href="javascript:;" class="btn btn-danger btn-xs" id="del_img{{ $value['id'] }}"><i class="fa fa-trash"></i></a>

									</div>
									<div class="info">                                       
										<small class="text-muted">{{ $value['created_at']->diffForHumans() }}</small>
									</div>
								</div>
							</li>

							@endif
						@endforeach
						@endif

				</ul>
				</div>