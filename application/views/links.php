<?php echo $validation; ?>
<?php echo form_open("/sendlink") ?>
<div class="input-group">
  <span class="input-group-addon">http://</span>
  <input type="text" name="link" class="form-control" placeholder="Wklej link tutaj">
</div>
	
</form>
<?php foreach($links as $link): ?>

<?php echo $link; ?>
<br />
<?php endforeach; ?>
