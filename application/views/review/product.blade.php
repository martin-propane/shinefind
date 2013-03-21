<div class="grid_6 alpha omega">
<?php
echo Form::open('review/product/'.$product->id, 'POST', array('id' => 'addForm', 'class' => 'form-horizontal'));
echo '<legend><h3>Review Product</h3></legend>';
echo '<h4>' . $product->name . ' | ' . $product->company . '</h4>';
echo '<div class="spacer10"></div>';

echo '<div class = "control-group">';
echo Form::label('title', 'Brief Description', array('class' => 'control-label'));
echo '<div class = "controls">';
echo Form::textarea('title', null, array('class' => 'required'));
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

