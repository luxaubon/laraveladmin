
		 					@if ($categories != '[]')
		 						{{-- expr --}}
                               <ul>

                                @each('partials.index', $categories, 'category', 'partials.nothing')
                            
                                </ul>
                              @endif