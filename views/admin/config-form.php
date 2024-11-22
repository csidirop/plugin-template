<?php $templateOption = get_option('template_option'); ?>
<div class="field">
    <label for="template_option">Template Option</label>
    <div class="inputs">
        <input type="text" name="template_option" id="template_option" value="<?php echo htmlspecialchars($templateOption); ?>">
    </div>
</div>
