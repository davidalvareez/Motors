<!DOCTYPE html>
<html>
  <head>
    <title>Cars</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <body>
    <form action="{{url('cars/create')}}" method="POST">
      @csrf
      {{method_field('POST')}}
      <span>Make</span><input type="text" name="make" id="make">
      <span>Model</span><input type="text" name="model" id="model">
      <span>Produced on</span><input type="date" name="produced_on" id="produced_on">
      <input class="btn btn-success" type="submit" value="Crear" name="crear">
    </form>
    @foreach($car as $car)
      <h1>Car {{ $car->id }}</h1>
      <ul>
        <li>Make: {{ $car->make }}</li>
        <li>Model: {{ $car->model }}</li>
        <li>Produced on: {{ $car->produced_on }}</li>
      </ul>
      <form action="{{route('cars.destroy',['car'=>$car->id])}}" method="POST">
        @csrf
        <!--{{csrf_field()}}--->
        {{method_field('DELETE')}}
        <!--@method('DELETE')--->
        <button class= "btn btn-danger" type="submit" name="Eliminar" value="Eliminar">Eliminar</button>
      </form>
    @endforeach
  </body>
</html>
