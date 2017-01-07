<?php
if ($_POST) {
    $name = $_POST['name'];
    $location = $_POST['loc'];
    $description = $_POST['dscrpt'];
    $eventDate = $_POST['eventDate'];
    
    echo 'Создано событие с названием '.$name.' на дату: '.$eventDate.'.<br> Локация: '.$location.'<br>Описание: '.$description;
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calendar</title>
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<!-- Modal -->
<div id="modalEvent" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">×</button>
                <h4 class="modal-title">Создай событие на дату:</h4><span id="date"></span></div>
            <div class="modal-body">
                <form method="POST" id="form">
                    <input type="text" required="required" placeholder="Название события" name="name" id="name">
                    <input type="text" required="required" placeholder="Локация" name="location" id="loc">
                    <textarea type="text" cols="30" rows="5" name="descript" placeholder="Описание" id="descript"></textarea>
                </form>
            </div>
            <div class="modal-footer"> <a class="btn btn-default submit">СОЗДАТЬ</a> </div>
        </div>
    </div>
</div>
<!-- End of Modal -->

<!-- Alert Modal -->
	<div id="alertModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Сообщение!</h4>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ЗАКРЫТЬ</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Alert Modal -->


<?php
$months = array(
    1 => 'Январь', 2 => 'Февраль', 3 => 'Март', 4 => 'Апрель',
    5 => 'Май', 6 => 'Июнь', 7 => 'Июль', 8 => 'Август',
    9 => 'Сентябрь', 10 => 'Октябрь', 11 => 'Ноябрь', 12 => 'Декабрь'
);

$days = array(
    1=>'Пн', 2=>'Вт', 3=>'Ср', 4=>'Чт', 5=>'Пт', 6=>'Сб', 7=>'Вс'
);

//echo $monthes[date('n')];
//echo '<br>';
//echo $days[date('w')];
//echo '<br>';
//echo date("t", mktime(0, 0, 0, 1, 1, 2016)); 
?>
<div class="main">
  <div class="bgi"></div>
   <div class="row">
      <div class="col-md-12">
          <h1>Календарь 2017</h1>
      </div>
   </div>
    <div class="container">
       <div class="row">
        <?php for ($i=1; $i<=count($months); $i++){
            echo '<div class="mon">
                    <table>
                    <caption>'.$months[$i].'</caption>
                    <tr>';
                    for ($j=1; $j<=count($days); $j++){
                        if ($j==7) {
                            echo '<th style="color: #f74646">'.$days[$j].'</th>';
                        } else {
                            echo '<th>'.$days[$j].'</th>';
                        }
                    }
                    echo '</tr><tr>';
                    $dm = date("t", mktime(0, 0, 0, $i, $j, date('Y')));
                    $firstDayWeek = date("w", mktime(0, 0, 0, $i, $j, date('Y')));
                    $cday = 0;
                    if ($firstDayWeek > 0) {
                       for ($z=1; $z<$firstDayWeek; $z++) {
                           $cday++;
                           echo "<td></td>";
                       } 
                    }
                    if ($firstDayWeek == 0) {
                       for ($z=1; $z<=$firstDayWeek+6; $z++) {
                           $cday++;
                           echo "<td></td>";
                       } 
                    }
                    for ($d=1; $d<=$dm; $d++) {
                        $curDate = date("d.m.Y", mktime(0, 0, 0, $i, $d, date('Y')));
                        $cday++;
                        if($curDate == date("d.m.Y")) {
                            echo '<td class="day" style="background-color: #f74646" data-toggle="modal" data-target="#modalEvent" data-date="'.$curDate.'">'.$d.'</td>';
                        }
                        elseif ($cday == 7) {
                            echo '<td class="day" style="color: #f74646" data-toggle="modal" data-target="#modalEvent" data-date="'.$curDate.'">'.$d.'</td>';
                        }
                        else {
                            echo '<td class="day" style="'.$bgc.'" data-toggle="modal" data-target="#modalEvent" data-date="'.$curDate.'">'.$d.'</td>';
                        }
                        if ($cday == 7) {
                            echo "</tr><tr>";
                            $cday = 0;
                        }
                    }
                    echo "</tr>";
            echo '</table></div>';
        } ?>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/main.js"></script>
</body>
</html>
