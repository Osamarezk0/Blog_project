@props([
    'type'=>'text', 'name' , 'value'=>"", 'lable'=>false
])
@if($lable)
    <label for="{{$lable}}" >{{$lable}}</label>

@endif

<input type="{{$type}}" name="{{$name}}"
       @class(['form-control','is-invalid' => $errors->has("{{$name}}")])
       value="{{old($name,$value)}}"
       id="{{$name}}" placeholder="{{$name}}"
        {{ $attributes }}
        >
