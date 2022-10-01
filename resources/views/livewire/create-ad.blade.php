<div>
    @if (session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{session('message')}}
        </div>
    @endif
    <form wire:submit.prevent="store">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">{{__('Título:')}}</label>
            <input type="text" wire:model="title" class="form-control @error('title') is-invalid @enderror">
            @error('title')
                {{$message}}
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">{{__('Precio:')}}</label>
            <input type="number" wire:model="price" class="form-control @error('price') is-invalid @enderror">
            @error('price')
            {{$message}}
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">{{__('Categoría:')}}</label>
            <select wire:model.defer="category" class="form-control">
                <option value="">Seleccionar categoría</option>
                @foreach($categories as $category)
                    <option class="text-capitalize" value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label for="body" class="form-label">{{__('Descripción:')}}</label>
            <textarea wire:model="body" cols="30" rows="15" class="form-control @error('body') is-invalid @enderror"></textarea>
            @error('body')
                {{ $message }}
            @enderror
        </div>


        <div class="my-3">
            <button type="submit" class="btn btn-info">{{__('Crear')}}</button>
        </div>

    </form>
</div>
