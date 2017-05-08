<style>
.responses-table {
  display: none;
}

</style>

<?php echo form_open('results'); ?>
  <?php echo form_hidden('csv_download', "false");?>
  <div class="respondents-table">
    <h2>Results by Respondents</h2>
    <a onclick="switchView(true)"><button type="button" class="btn btn-primary">Switch to Responses</button></a>
    <button type="submit" class="btn btn-success">Export as CSV</button></a>
    <br><br>
    <?php echo $respondents_table; ?>
  </div>
  <div class="responses-table">
    <h2>Results by Responses</h2>
    <a onclick="switchView(false)"><button type="button" class="btn btn-primary">Switch to Respondents</button></a>
    <button type="submit" class="btn btn-success">Export as CSV</button></a>
    <br><br>
    <?php echo $responses_table; ?>
  </div>
</form>

<script>
function switchView(mode) {
  $(".respondents-table").toggle(!mode);
  $(".responses-table").toggle(mode);
  $("input[name=csv_download]").val(mode.toString())
}
</script>