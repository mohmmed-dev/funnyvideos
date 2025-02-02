<div class="mb-6">
    <label for="title" class="block mb-2 text-sm font-medium text-gray-900">{{__("العنوان")}}</label>
    <input type="text" name="title" id="title" value="{{old('title')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
    @error('title')
        <p class="text-xl text-red-500">{{$message}}</p>
    @enderror
</div>
<div class="mb-6">
    <label for="desc" class="block mb-2 text-sm font-medium text-gray-900">{{__("الوصف")}}</label>
    <textarea type="text" name="desc" id="desc" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
        {{old('desc')}}
    </textarea>
    @error('desc')
        <p class="text-xl text-red-500">{{$message}}</p>
    @enderror
</div>
<div class="mb-6">
    <div>{{__("صورة العرض")}}</div>
    <div class="flex mt-3 items-center justify-center w-full">
        <label for="dropzone-image" class="flex flex-col items-center justify-center w-full h-52 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 ">
            <div class="flex flex-col items-center justify-center pt-2 pb-2">
                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                </svg>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400 font-bold"><span class="font-semibold">{{__('اسحب الصوره هنا او انقر للاختيار')}}</p>
            </div>
            <input accept="image/*" id="dropzone-image" onchange="readCoverImage(this)" name="image_path" type="file" class="hidden" />
        </label>
    </div>
    <div class=" my-8 w-48  h-32 border-2">
        <img class="h-full w-full" src="" alt="" id="cover-image-thumb">
    </div>

    @error('image_path')
        <p class="text-xl text-red-500">{{$message}}</p>
    @enderror
</div>
<div class="mb-6">
    <div>{{__("مقطع الفيديو")}}</div>
    <div class="flex mt-3 items-center justify-center w-full">
        <label for="dropzone-video" class="flex flex-col items-center justify-center w-full h-52 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 ">
            <div class="flex flex-col items-center justify-center pt-2 pb-2">
                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                </svg>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400 font-bold"><span class="font-semibold">{{__('اسحب مقطع الفيديو هنا او انقر للاختيار')}}</p>
            </div>
            <input id="dropzone-video"  accept="video/*" name="video_path" type="file" class="hidden" />
        </label>
    </div>
    @error('image_path')
        <p class="text-xl text-red-500">{{$massage}}</p>
    @enderror
</div>
<div class="mb-6">
    <label for="" class="block mb-2 text-sm font-medium text-gray-900">{{__("هشتاغ")}}</label>
    <select id="countries" name="hashtag" class="bg-gray-50 border w-28 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @include('tools.hashtags')
    </select>
    @error('hashtag')
        <p class="text-xl text-red-500">{{$message}}</p>
    @enderror
</div>

<script>
    function readCoverImage(input) {
        var file = input.files[0];
        var reader  = new FileReader();
        reader.onload = function(e)  {
            var imgElement = document.getElementById('cover-image-thumb');
            imgElement.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
</script>

