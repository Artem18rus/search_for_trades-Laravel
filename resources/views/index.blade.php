<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="css/app">
</head>
<body>
	<p class="title">Поиск торгов:</p>
    <form method="post" action="submit_page" accept-charset="utf-8" id="searchform">
    @csrf	
      <input type="string" name="number_bidding" placeholder="Введите номер торгов">
      <input type="number" name="number_lot" placeholder="Введите номер лота">
      <input class="submit" type="submit" value="Найти">
    </form>

  <table class="table">
    <p>Найденные торги:</p>
    <tr>
      <th>URL адрес</th>
      <th>Сведения об имуществе</th>
      <th>Начальная цена лота</th>
      <th>E-mail контактного лица</th>
      <th>Телефон контактного лица</th>
      <th>ИНН должника</th>
      <th>Номер дела о банкротстве</th>
      <th>Дата торгов (начала торгов / проведения торгов) </th>
    </tr>
    @foreach ($infoLot as $key=>$item)
      <tr>
        <td><a href={{$item->link_page}} target="_blank">{{$item->link_page}}</a></td>
        <td>{{$item->information_property}}</td>
        <td>{{$item->initial_price}}</td>
        <td>{{$item->e_mail}}</td>
        <td>{{$item->phone}}</td>
        <td>{{$item->inn}}</td>
        <td>{{$item->number_bankruptcy_case}}</td>
        <td>{{$item->trading_date}}</td>
      </tr>
    @endforeach
  </table>
</body>
</html>