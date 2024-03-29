<style type="text/css">
    .big{
        height: 100px;
        font-size: 40px;
    }
</style>
<script type="text/javascript">
$(function(){
    $('#myCarousel').carousel({
        interval: 10000
    })
    setTimeout("location.reload()",60000);
});
</script>
<div id="myCarousel" class="carousel slide">
  <!-- Carousel items -->
  <div class="carousel-inner">
    <div class="active item">
        <div class="row">
            <button class="btn big btn-primary span4" type="button">飛距離ランキング</button>
            <button class="btn big span4 disabled" type="button">グループランキング</button>
            <button class="btn big span4 disabled" type="button">今日のランキング</button>
        </div>
        <br/>
        <h1 align="center">飛距離ランキング</h1>
        <br>
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
        <div class="row">
            <button class="btn big span4 disabled" type="button">飛距離ランキング</button>
            <button class="btn big btn-primary span4" type="button">グループランキング</button>
            <button class="btn big span4 disabled" type="button">今日のランキング</button>
        </div>
        <br/>
        <h1 align="center">グループランキング</h1>
        <br>
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
        <div class="row">
            <button class="btn big span4 disabled" type="button">飛距離ランキング</button>
            <button class="btn big span4 disabled" type="button">グループランキング</button>
            <button class="btn big btn-primary span4" type="button">今日のランキング</button>
        </div>
        <br/>
        <h1 align="center">今日のランキング</h1>
        <br>
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