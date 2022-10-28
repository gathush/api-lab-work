//print $county_data; //primitive types
$county_array=explode(',',$county_data);
//print "<h1> The array</h1>";
//var_dump($county_array);
//print "<h1>the contents of the array </h1>";
//echo $county_array[0].'<br/>';
//echo $county_array[20].'<br/>';
//echo $county_array[40].'<br/>';
//print "<h1>The second part</h1>";
//print_r(explode('– ',$county_array[20]));echo "<br/>";
//print_r(explode('– ',$county_array[40]));echo "<br/>";
//use loops
echo '<table border=1 cellspacing=5 cellpadding=5>';
echo '<thead>';
echo '<tr>';

echo '<th> #</th>c <th> county</th> <th> governor</th> <th> party</th>';
echo '</tr>';
echo '</thead>';
$party_count=array();


foreach($county_array as $key =>$row):
  echo "<tr>";
  $cells=explode('– ',$row);

  foreach($cells as $key=>$cell):
    if($key==0){
      $temp=explode('.',$cell);
      echo '<td>'.$temp[0].'</td>';
          echo '<td>'.$temp[1].'</td>';
    }elseif ($key==1) {
      if(strpos($cell,'- ')){
        $temp=explode('-',$cell);
        echo '<td>'.$temp[0].'</td>';
            echo '<td>'.$temp[1].'</td>';
                $party_count[]=$temp[1];
      }else{
        echo "<td>$cell</cell>";
      }

    }else{
      $party_count[]=$cell;

      echo "<td>$cell</cell>";
    }

endforeach;
  echo "</tr>";
endforeach;
echo "</table>";
//var_dump($party_count);
//count how many uda are in the party count array
//$nice_array=['UDA'=>2];
echo '<br>';
//print_r(array_count_values($party_count));

$nice_array=array_count_values($party_count);





//splitting the data in php
//$small_string="George Kwezi";
//$small_array = explode(' ',$small_string);
//print "<br/>";

//var_dump($small_array);
//print "<br/>";

?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js" integrity="sha256-+8RZJua0aEWg+QVVKg4LEzEEm/8RFez5Tb4JBNiV5xA=" crossorigin="anonymous"></script>
<canvas id="myChart" width="50" height="50" circumference="50">
</canvas>
<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: <?php echo json_encode(array_keys($nice_array))?>,
        datasets: [{
            label: '# of Votes',
            data:  <?php echo json_encode(array_values($nice_array))?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
?>