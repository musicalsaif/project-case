<div class="row-fluid ">
    <div class="span7">
        <h1><?php
            echo $userTasks['Task']['name'];
            ?></h1>

        <?php
        if($datediff < 4){
            echo '<div class="priority high"><span>high priority</span></div>
        <div class="task high">';
        }elseif($datediff > 3 &&  $datediff < 11){
            echo '<div class="priority medium"><span>medium priority</span></div>
            <div class="task medium">';
        }elseif($datediff > 10){
            echo '<div class="priority low"><span>low priority</span></div>
                <div class="task low">';
        }
        ?>


        <div class="desc">
            <div class="title"><?php echo $userTasks['Task']['name']; ?></div>
            <div><?php echo $userTasks['Task']['description']; ?></div>
        </div>
        <div class="time">
            <div class="date"><?php echo $this->Time->format($userTasks['Task']['dead_line'], '%B %e, %Y'); ?></div>
            <div><?php echo $datediff; ?> day(s)</div>
        </div>
    </div>
    <div class="box span12" style="margin-left: auto">
        <div class="box-header" data-original-title="">
            <h2><i class="halflings-icon white edit"></i><span class="break"></span>Comment</h2>
        </div>
        <div class="box-content">
            <?php echo $this->Form->create('TaskComments', array('action' => 'add', 'class' => 'form-horizontal')); ?>

                <fieldset>
                    <input name="data[TaskComment][user_id]" id="UserId" type="hidden" value="<?php echo Authsome::get("id") ?>" />
<!--                    <input name="data[TaskComment][user_name]" id="UserName" type="hidden" value="--><?php //echo Authsome::get("name") ?><!--" />-->
                    <input name="data[TaskComment][task_id]" id="TaskId" type="hidden" value="<?php echo $userTasks['Task']['id'] ?>" />
                    <div class="form-group">
                        <label for="comment">Comment:</label>
                        <textarea class="form-control span12" rows="2" id="comment" name="data[TaskComment][body]"></textarea>
                    </div>
                    <div class="form-actions" style="text-align: right">
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                </fieldset>
            <?php echo $this->Form->end(); ?>

        </div>
    </div>
</div>
<div class="span5 noMarginLeft">
    <div class="dark">

        <h1>Previous Comments</h1>

        <div class="timeline">
            <?php
            $i = 0;
            foreach($taskComments as $comment){
                if ($i%2 == 0){
                    echo '<div class="timeslot" style="height: 124px;"><div class="task"><span><span class="type">';
                }else{
                    echo '<div class="timeslot alt" style="height: 124px;"><div class="task"><span><span class="type">';
                }
//                echo $comment['User']['name'];

                echo '</span><span class="details">';

                echo $comment['TaskComment']['body'];

                echo '</span><span>';

                echo $this->Time->format($comment['TaskComment']['created'], '%B %e, %Y %H:%M %p');

                echo '<span class="remaining">';

//                echo $comment['TaskComment']['created'];

                echo '</span></span></span><div class="arrow"></div></div><div class="icon"><i class="icon-calendar"></i></div><div class="time">';

                echo $comment['User']['name'];

                echo '</div></div><div class="clearfix"></div>';




                $i++;
            }
            ?>




        </div>
    </div>

</div>
</div><!--/row-->