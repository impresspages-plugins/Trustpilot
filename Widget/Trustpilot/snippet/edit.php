
<div class="ip">
    <div id="ipWidgetTrustpilotPopup" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><?php echo __('Trustpilot widget settings', 'Trustpilot') ?></h4>
                </div>

                <div class="modal-body">
                    <?php echo $form->render(); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Cancel', 'Trustpilot') ?></button>
                    <button type="button" class="btn btn-primary ipsConfirm"><?php echo __('Confirm', 'Trustpilot') ?></button>
                </div>
            </div>
        </div>
    </div>
</div>
