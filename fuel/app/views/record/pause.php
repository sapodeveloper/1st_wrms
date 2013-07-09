<style type="text/css">
    .big{
        height: 100px;
        font-size: 40px;
        text-align: center;
    }

</style>
<div class="tabbable tabs-left">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab1" data-toggle="tab">飛距離ランキング</a></li>
        <li><a href="#tab2" data-toggle="tab">グループランキング</a></li>
        <li><a href="#tab3" data-toggle="tab">今日のランキング</a></li>
    </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
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
    <div class="tab-pane" id="tab2">
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
    <div class="tab-pane" id="tab3">
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