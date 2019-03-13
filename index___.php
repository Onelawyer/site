<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8" />

	<title>Заголовок</title>
	<meta content="" name="description" />
	<link rel="shortcut icon" href="" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="libs/datatables/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="libs/datatables/jquery.dataTables.min.css">

  <link rel="stylesheet" href="css/fonts.css" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/media.css" />
 

  <script src="libs/jquery/jquery-1.12.3.min.js"></script>

</head>
<body>
	<?php include('fnc.php');?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">


<?php
          if (isset($tasks)) {
          echo "<table id='example' class='display' width='100%' cellspacing='0'>";
          echo "<thead>";
          echo "<tr>";
          echo "<th>ID</th>";
          echo "<th>Имя</th>";
          echo "<th>Тип</th>";
          echo "<th>Данные</th>";
          echo "<th>Статус</th>";
          echo "</tr>";
          echo "</thead>";

          echo "<tbody>";
          foreach ($tasks as $value) {
          echo "<tr>";
          echo "<td>".$value['id']."</td>";
          echo "<td>".$value['name']."</td>";
          echo "<td>".$value['type']."</td>";
          echo "<td>".$value['date']."</td>";
          echo "<td>".$value['status']."</td>";
          echo "</tr>";
          }
          echo "</tbody>";


          echo "</table>";
      }
$content = json_encode( $tasks );
$data = '"data":'."$content";
echo $data;
// echo "</br>";
// $data = json_decode( $content, true );
// var_dump ($data);
?>
<table id="example_1" class="display" width="100%" cellspacing="0">

          <thead>
          <tr>
          <th>ID</th>
          <th>Имя</th>
          <th>Тип</th>
          <th>Данные</th>
          <th>Статус</th>
          <th>Редактировать</th>
          <th>Удалить</th>
          </tr>
          </thead>

          <tbody>

          </tbody>


          </table>





   </div>
 </div>
</div>
</section>


<!--           <table id='example_2'>
          <tr>
          <td>ID</td>
          <td>Имя</td>
          <td>Тип</td>
          <td>Данные</td>
          <td>Статус</td>
          </tr>
          </table>
<script type="text/javascript">
$(function(){
    $.getJSON('data.json', function(data) {
            for(var i=0;i<data.data.length;i++){
                $('#example_2').append('<tr><td>' + data.data[i].id + '</td><td>' + data.data[i].name +'</td><td>' + data.data[i].type + '</td><td>' + data.data[i].date + '</td><td>' + data.data[i].status + '</td><tr>');
console.log('data.data.length');
            }
    });
});

</script> -->

<div class="hidden"></div>






	<!--[if lt IE 9]>
	<script src="libs/html5shiv/es5-shim.min.js"></script>
	<script src="libs/html5shiv/html5shiv.min.js"></script>
	<script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="libs/respond/respond.min.js"></script>
	<![endif]-->


  <script src="libs/datatables/jquery.dataTables.min.js"></script>
  <script src="libs/datatables/dataTables.bootstrap.min.js"></script>
  <script src="libs/bootstrap/js/bootstrap.min.js"></script>
  <!-- <script src="libs/modernizr/modernizr.js"></script> -->
  <!-- <script src="js/common.js"></script> -->


  <script type="text/javascript">
        var rowId = ''; //Индекс редактируемой строки в таблице
        $(document).ready(function () {
   $("#example_1").dataTable({
      ajax: "data.json",

      // data: dataset,
      // "aoColumns": [ { "mData": "id"}, { "mData": "name"}, { "mData": "type"}, { "mData": "date"}, { "mData": "status"} ],
                    columnDefs: [
                    //Кнопка для редактирования строки
                    {
                        "targets": 5,
                        "data": null,
                        "defaultContent": "<button id='edit'>Редактировать</button>"
                    },
                    //Кнопка для удаления строки
                    {
                        "targets": 6,
                        "data": null,
                        "defaultContent": "<button id='delete'>Удалить</button>"
                    }

                ],

                // Описываем таблицу
                columns: [
                    { data: 'id'},
                    { data: 'name'},
                    { data: 'type'},
                    { data: 'date'},
                    { data: 'status'}
                ],



      language: {
        "processing": "Подождите...",
        "search": "Поиск:",
        "lengthMenu": "Показать _MENU_ записей",
        "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
        "infoEmpty": "Записи с 0 до 0 из 0 записей",
        "infoFiltered": "(отфильтровано из _MAX_ записей)",
        "infoPostFix": "",
        "loadingRecords": "Загрузка записей...",
        "zeroRecords": "Записи отсутствуют.",
        "emptyTable": "В таблице отсутствуют данные",
        "paginate": {
          "first": "Первая",
          "previous": "Предыдущая",
          "next": "Следующая",
          "last": "Последняя"
        },
        "aria": {
          "sortAscending": ": активировать для сортировки столбца по возрастанию",
          "sortDescending": ": активировать для сортировки столбца по убыванию"
        }
      }
    });

            // По клику удаляем строку
            // $('#example_1 tbody').on( 'click', '#delete', function () {
            //     var data = table.row( $(this).parents('tr') ).data();
            //     $.get( "/deleteanimal", {id: data.id}, function(data) {
            //         alert( data ); //Делаем что-нибудь
            //     } );
            //     table
            //             .row( $(this).parents('tr')  )
            //             .remove()
            //             .draw();
            // } );


            // Для редактирования строки
            // По клику получаем "data" строки, не будем ходить в базу (не лучший вариант)
            // $('#example_1 tbody').on( 'click', '#edit', function () {
            //     var data = table.row( $(this).parents('tr') ).data();
            //     //Сохраняем индекс редактируемой строки
            //     rowId = table.row( $(this).parents('tr') ).index();
            //     //Заполняем форму
            //     $("#name").val(data.name);
            //     $("#animalClass").val(data.animalClass);
            //     $("#age").val(data.age);
            //     $("#keeper").val(data.keeper.nameSurname);
            //     $("#cage").val(data.cage.number);
            //     $("#id").val(data.id);
            // } );

 });

  </script>

<script type="text/javascript">
var dataset = []
$.getJSON( "data.json", function( data ) {
    $.each(data.data, function (index, id) {
        dataset.push(id);
    });
});

</script>

  <script>

   $("#example").dataTable({



      language: {
        "processing": "Подождите...",
        "search": "Поиск:",
        "lengthMenu": "Показать _MENU_ записей",
        "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
        "infoEmpty": "Записи с 0 до 0 из 0 записей",
        "infoFiltered": "(отфильтровано из _MAX_ записей)",
        "infoPostFix": "",
        "loadingRecords": "Загрузка записей...",
        "zeroRecords": "Записи отсутствуют.",
        "emptyTable": "В таблице отсутствуют данные",
        "paginate": {
          "first": "Первая",
          "previous": "Предыдущая",
          "next": "Следующая",
          "last": "Последняя"
        },
        "aria": {
          "sortAscending": ": активировать для сортировки столбца по возрастанию",
          "sortDescending": ": активировать для сортировки столбца по убыванию"
        }
      }
     // data: data,
     // columns: [
     // { data: 'id' },
     // { data: 'name' },
     // { data: 'type' },
     // { data: 'date' },
     // { data: 'status' }
     // ]
   });


 </script>



 <!-- Yandex.Metrika counter --><!-- /Yandex.Metrika counter -->
 <!-- Google Analytics counter --><!-- /Google Analytics counter -->

</body>
</html>