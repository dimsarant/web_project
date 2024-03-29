<?php
  include "./session.php";
  include "./header.php";
  include "./querys.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../external/jquery-3.4.1.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

    <link href="../external/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="./css/home.css">
    <title>Home Page</title>
</head>

<body>
    <div class="design">
      <div class="main_content">
        <div class="user_info">
            <div class="container">
              <div id="score">
                <a>Score οικολογικης κίνησης </a>
                <div id="eco-value">
                  <?php
                  if ( $month_score != -1 ){
                  echo "Monthly score $month_score%"; }
                  else {
                    echo "Monthly score  - ";
                  }
                  ?>
                </div>
                <canvas id="score_chart"></canvas>
              </div>
              <div id="date-range">
                <a>Περίοδος εγγραφών χρήστη</a>
                <div id="date-range-value">
                  <?php
                  if  ($max != 0){
                    echo "$min / $max"; }
                    else {
                      echo " - ";
                    }
                  ?>
                </div>
              </div>
              <div id="last-upload">
                <a>Ημερομηνία τελευταίου upload</a>
                <div id="last-upload-value">
                  <?php
                  if  ($upload_date != 0){
                  echo "$upload_date "; }
                  else {
                    echo " - ";
                  }
                  ?>
                </div>
              </div>
              <div id="leaderboard">
                <a >Leaderboard TOP 3 users </a>
                <div>
                  <table id="leaderboard-table" class="table table-sm table-hover table-light">
                    <thead id="header_lead">
                      <tr>
                        <th scope="col">RANK</th>
                        <th scope="col">NAME</th>
                        <th scope="col">ECO SCORE</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td id="rank1">#1</td>
                        <th scope="row">
                        <?php
                        if ($count >=1 ){
                        echo "$user[0] " ;  }
                        ?>
                        </th>
                        <td><?php
                        if ($count >=1 ){
                        echo "$mscore[0]%" ;  }
                        ?> </td>
                      </tr>
                      <tr>
                        <td id="rank2">#2</td>
                        <th scope="row"><?php
                        if ($count >=2 ){
                        echo "$user[1] " ;  }
                        ?>
                      </th>
                        <td><?php
                        if ($count >=2){
                        echo "$mscore[1]% " ;  }
                        ?>
                      </td>
                      </tr>
                      <tr>
                        <td id="rank3">#3</td>
                        <th scope="row"><?php
                        if ($count >=3 ){
                        echo "$user[2] " ;  }
                        ?>
                      </th>
                        <td><?php
                        if ($count >=3 ){
                        echo "$mscore[2]% " ;  }
                        ?>
                      </td>
                      </tr>
                      <tr>
                        <td id="myrank">#myrank <?php if ($rank!=0){ echo $rank; }?></td>
                        <th scope="row"><?php echo $username; ?></th>
                        <td>
                          <?php
                        if ($check ==1){
                          echo "$user_score%";
                        } ?>
                       </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
        <div class="user_analyse">
          <div class="container">
            <p style="text-align: center">Ανάλυση στοιχείων χρήστη</p>
            <form id="user-data-analysis" method="GET">
              <div id="box">
                <label class="label" for="from-date-month">Choose date from:</label>
                <select name="f_month" class="slct" id="from-date-month" form="user-data-analysis">
                  <option selected disabled>month</option>
                  <option value="January">January</option>
                  <option value="February">February</option>
                  <option value="March">March</option>
                  <option value="April">April</option>
                  <option value="May">May</option>
                  <option value="June">June</option>
                  <option value="July">July</option>
                  <option value="August">August</option>
                  <option value="September">September</option>
                  <option value="October">October</option>
                  <option value="November">November</option>
                  <option value="December">December</option>
                </select>
                <select name="f_year" class="slct" id="from-date-year" form="user-data-analysis">
                  <option selected disabled>year</option>
                  <option value=2010 >2010</option>
                  <option value=2011>2011</option>
                  <option value=2012>2012</option>
                  <option value=2013>2013</option>
                  <option value=2014>2014</option>
                  <option value=2015>2015</option>
                  <option value=2016>2016</option>
                  <option value=2017>2017</option>
                  <option value=2018>2018</option>
                  <option value=2019>2019</option>
                  <option value=2020>2020</option>
                </select>
                <label class="label" for="until-date-month">until:</label>
                <select name="u_month" class="slct" id="until-date-month" form="user-data-analysis">
                  <option selected disabled>month</option>
                  <option value="January">January</option>
                  <option value="February">February</option>
                  <option value="March">March</option>
                  <option value="April">April</option>
                  <option value="May">May</option>
                  <option value="June">June</option>
                  <option value="July">July</option>
                  <option value="August">August</option>
                  <option value="September">September</option>
                  <option value="October">October</option>
                  <option value="November">November</option>
                  <option value="December">December</option>
                </select>
                <select name="u_year" class="slct" id="until-date-year" form="user-data-analysis">
                  <option selected disabled>year</option>
                  <option value=2010>2010</option>
                  <option value=2011>2011</option>
                  <option value=2012>2012</option>
                  <option value=2013>2013</option>
                  <option value=2014>2014</option>
                  <option value=2015>2015</option>
                  <option value=2016>2016</option>
                  <option value=2017>2017</option>
                  <option value=2018>2018</option>
                  <option value=2019>2019</option>
                  <option value=2020>2020</option>
                </select>
              </div>
              <button type="submit" class="btn btn-success" id="show_btn">SHOW</button>
            </form>
            <canvas id="activity_chart"></canvas>
            <table id="activity_hour_day" class="table table-sm table-hover table-light">
              <thead id="header_ahd">
                <tr>
                  <th scope="col">ACTIVITY</th>
                  <th scope="col">HOUR</th>
                  <th scope="col">DAY</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">STILL</th>
                  <td><?php if ($maxh[7]!="-"){echo "$maxh[7]";}?> </td>
                  <td><?php echo "$maxd[7] "?></td>
                </tr>
                <tr>
                  <th scope="row">IN VEHICLE</th>
                  <td><?php if ($maxh[5]!="-"){ echo "$maxh[5]";}?> </td>
                  <td><?php echo "$maxd[5] "?></td>
                </tr>
                <tr>
                  <th scope="row">ON FOOT</th>
                  <td><?php if ($maxh[1]!="-"){ echo "$maxh[1]";}?> </td>
                  <td><?php echo "$maxd[1] "?></td>
                </tr>
                <tr>
                  <th scope="row">IN ROAD VEHICLE</th>
                  <td><?phpif ($maxh[10]!="-"){ echo "$maxh[10]";}?> </td>
                  <td><?php echo "$maxd[10] "?></td>
                </tr>
                <tr>
                  <th scope="row">IN RAIL VEHCILE</th>
                  <td><?php if ($maxh[6]!="-"){ echo "$maxh[6]";}?> </td>
                  <td><?php echo "$maxd[6] "?></td>
                </tr>
                <tr>
                  <th scope="row">WALKING</th>
                  <td><?php if ($maxh[2]!="-"){ echo "$maxh[2]";}?> </td>
                  <td><?php echo "$maxd[2] "?> </td>
                </tr>
                <tr>
                  <th scope="row">ON BICYCLE</th>
                  <td><?php if ($maxh[3]!="-"){ echo "$maxh[3]";}?> </td>
                  <td><?php echo "$maxd[3] "?></td>
                </tr>
                <tr>
                  <th scope="row">RUNNING</th>
                  <td><?php if ($maxh[4]!="-"){ echo "$maxh[4]";}?> </td>
                  <td><?php echo "$maxd[4] "?></td>
                </tr>
                <tr>
                  <th scope="row">TILTITNG</th>
                  <td><?php if ($maxh[8]!="-"){ echo "$maxh[8]";}?> </td>
                  <td><?php echo "$maxd[8] "?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="data_load">
          <div id="map1">
            <?php include "../map/leaflet.php" ?>
          </div>
          <div id="title">
            <p>HeatMap Analysis</p>
          </div>
          <div id="map2">
            <?php include "../map/heatmap.php" ?>
          </div>
        </div>
      </div>
    </div>

  <!-- show the last 12 months auto  -->
  <script>
    var m1 = "<?php echo strval(date("F", strtotime("0 months"))); ?>";
    var m2 = "<?php echo strval(date("F", strtotime("-1 months"))); ?>";
    var m3 = "<?php echo strval(date("F", strtotime("-2 months"))); ?>";
    var m4 = "<?php echo strval(date("F", strtotime("-3 months"))); ?>";
    var m5 = "<?php echo strval(date("F", strtotime("-4 months"))); ?>";
    var m6 = "<?php echo strval(date("F", strtotime("-5 months"))); ?>";
    var m7 = "<?php echo strval(date("F", strtotime("-6 months"))); ?>";
    var m8 = "<?php echo strval(date("F", strtotime("-7 months"))); ?>";
    var m9 = "<?php echo strval(date("F", strtotime("-8 months"))); ?>";
    var m10 = "<?php echo strval(date("F", strtotime("-9 months"))); ?>";
    var m11 = "<?php echo strval(date("F", strtotime("-10 months"))); ?>";
    var m12 = "<?php echo strval(date("F", strtotime("-11 months"))); ?>";

    var v1 = <?php echo $year_months[date("F", strtotime("0 months"))]; ?>;
    var v2 = <?php echo $year_months[date("F", strtotime("-1 months"))]; ?>;
    var v3 = <?php echo $year_months[date("F", strtotime("-2 months"))]; ?>;
    var v4 = <?php echo $year_months[date("F", strtotime("-3 months"))]; ?>;
    var v5 = <?php echo $year_months[date("F", strtotime("-4 months"))]; ?>;
    var v6 = <?php echo $year_months[date("F", strtotime("-5 months"))]; ?>;
    var v7 = <?php echo $year_months[date("F", strtotime("-6 months"))]; ?>;
    var v8 = <?php echo $year_months[date("F", strtotime("-7 months"))]; ?>;
    var v9 = <?php echo $year_months[date("F", strtotime("-8 months"))]; ?>;
    var v10 = <?php echo $year_months[date("F", strtotime("-9 months"))]; ?>;
    var v11 = <?php echo $year_months[date("F", strtotime("-10 months"))]; ?>;
    var v12 = <?php echo $year_months[date("F", strtotime("-11 months"))]; ?>;

  </script>
  <script src="score_home_graph.js"></script>

  <script>
    var still = <?php echo $still; ?>;
    var on_foot = <?php echo $on_foot; ?>;
    var walking = <?php echo $walking; ?>;
    var on_bicycle = <?php echo $on_bicycle; ?>;
    var running = <?php echo $running; ?>;
    var in_vehicle = <?php echo $in_vehicle; ?>;
    var in_rail_vehicle = <?php echo $in_rail_vehicle; ?>;
    var tilting = <?php echo $tilting; ?>;
    var unknown = <?php echo $unknown; ?>;
    var in_road_vehicle = <?php echo $in_road_vehicle; ?>;
  </script>
  <script src="user_home_graph.js"></script>
</body>
</html>
