<script type="text/javascript">
$(function(){
    $('.carousel').carousel()
});
</script>
<div id="myCarousel" class="carousel slide">
  <!-- Carousel items -->
  <div class="carousel-inner">
    <div class="active item">
        <h1 align="center">飛距離ランキング</h1>
        <h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td></td>
                    <td>学校名</td>
                    <td>グループ名</td>
                    <td>飛距離</td>
                </tr>
            </thead>
            <tbody>
                <?php $count = 1; ?>
                <?php foreach ($distance as $record): ?>
                    <tr>
                        <td><?php echo $count ?></td>
                        <td><?php echo $record->group->school->school_name; ?></td>
                        <td><?php echo $record->group->group_name; ?></td>
                        <td><?php echo $record->y_distance; ?>m</td>
                    </tr>
                <?php $count++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        </h2>
    </div>
    <div class="item">
        <h1 align="center">チームランキング</h1>
        <h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td></td>
                    <td>学校名</td>
                    <td>グループ名</td>
                    <td>飛距離</td>
                </tr>
            </thead>
            <tbody>
                <?php $count = 1; ?>
                <?php foreach ($group_records as $group_record): ?>
                    <tr>
                        <td><?php echo $count ?></td>
                        <td><?php echo $group_record->school_name; ?></td>
                        <td><?php echo $group_record->group_name; ?></td>
                        <td><?php echo $group_record->y_distance; ?>m</td>
                    </tr>
                <?php $count++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        </h2>
    </div>
    <div class="item">
        <h1 align="center">今日のランキング</h1>
        <h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td></td>
                    <td>学校名</td>
                    <td>グループ名</td>
                    <td>飛距離</td>
                </tr>
            </thead>
            <tbody>
                <?php $count = 1; ?>
                <?php foreach ($today_records as $today_record): ?>
                    <tr>
                        <td><?php echo $count ?></td>
                        <td><?php echo $today_record->group->school->school_name; ?></td>
                        <td><?php echo $today_record->group->group_name; ?></td>
                        <td><?php echo $today_record->y_distance; ?>m</td>
                    </tr>
                <?php $count++; ?>
                <?php endforeach; ?>        
            </tbody>
        </table>
        </h2>
    </div>
  </div>
</div>