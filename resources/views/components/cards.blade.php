@props(['larajob'])

<?php
    $tags = explode(',', $larajob->tags);
?>


                <!-- Item 1 -->

                 <div class="bg-gray-50 border border-gray-200 rounded p-6">
                    <div class="flex">
                        <img
                            class="hidden w-48 mr-6 md:block"
                            src="{{$larajob->logo ? asset('storage/' . $larajob->logo) : asset('/images/no-image.png') }}"
                            alt=""
                        />
                        <div>
                            <h3 class="text-2xl">
                                <a href="/jobs/{{$larajob->id}}">{{$larajob->title}}</a>
                            </h3>
                            <div class="text-xl font-bold mb-4">{{$larajob->company}}</div>
                            <ul class="flex">
                                @foreach($tags as $tag)
                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                                >
                                    <a href="/?tag={{$tag}}">{{$tag}}</a>
                                </li>
                                @endforeach

                            </ul>
                            <div class="text-lg mt-4">
                            <i class="fa-solid fa-location-dot"></i> {{$larajob->location}}
                            </div>
                        </div>
                    </div>
                </div>


