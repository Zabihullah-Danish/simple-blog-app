@props(['value' => null])
<textarea {{ $attributes->merge(['class' => 'p-3 rounded focus:ring-2
                                    focus:ring-gray-800
                                    bg-gray-800
                                    focus:bg-gray-900
                                    w-full outline-none
                                    shadow
                                    placeholder-gray-700
                                    ']) }}>{{ $value }}</textarea>