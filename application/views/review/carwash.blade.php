<div class="grid_6 alpha omega">
<?php
echo Form::open('review/carwash/'.$carwash->id, 'POST', array('id' => 'addForm', 'class' => 'form-horizontal'));
echo '<legend><h3>Review Carwash</h3></legend>';
echo '<h4>' . $carwash->name . ' | ' . $carwash->busi_ad . '</h4>';
echo '<div class="spacer10"></div>';

echo '<div class = "control-group">';
echo Form::label('title', 'Title', array('class' => 'control-label'));
echo '<div class = "controls">';
echo Form::text('title', null, array('class' => 'required'));
echo '</div></div>';

echo '<div class = "control-group">';
echo Form::label('review', 'Review', array('class' => 'control-label'));
echo '<div class = "controls">';
echo Form::textarea('review');
echo '</div></div>';

echo '<div class = "control-group">';
echo Form::label('star', 'Rating', array('class' => 'control-label'));
echo '<div class = "controls">';
echo '<div>';
echo Form::radio('star', '1', false, array('class' => 'checkbox'));
echo Form::label('star', '1', array('class' => 'checkbox inline'));
echo '</div>';
echo '<div>';
echo Form::radio('star', '2', false, array('class' => 'checkbox'));
echo Form::label('star', '2', array('class' => 'checkbox inline'));
echo '</div>';
echo '<div>';
echo Form::radio('star', '3', false, array('class' => 'checkbox'));
echo Form::label('star', '3', array('class' => 'checkbox inline'));
echo '</div>';
echo '<div>';
echo Form::radio('star', '4', false, array('class' => 'checkbox'));
echo Form::label('star', '4', array('class' => 'checkbox inline'));
echo '</div>';
echo '<div>';
echo Form::radio('star', '5', false, array('class' => 'checkbox'));
echo Form::label('star', '5', array('class' => 'checkbox inline'));
echo '</div>';
echo '</div></div>';

echo '<div class = "control-group">';
echo '<div class = "controls">';
echo Form::submit('Submit', array('class' => 'submit', 'id' => 'addSubmit', 'class' => 'btn'));
echo '</div></div>';
echo Form::close();

?>
</div>

