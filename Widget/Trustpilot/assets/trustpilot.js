/**
 * @package ImpressPages
 *
 */

var IpWidget_Trustpilot = function () {
    "use strict";
    
    this.widgetObject = null;
    this.confirmButton = null;
    this.popup = null;
    this.data = {};

    this.init = function (widgetObject, data) {
        this.widgetObject = widgetObject;
        this.data = data;
        var context = this;
        this.button = this.widgetObject.find('.ipsWidgetEdit');
        this.button.on('click', $.proxy(openPopup, context));
    };

    var openPopup = function() {
        var context = this;
        this.popup = $('#ipWidgetTrustpilotPopup');
        this.confirmButton = this.popup.find('.ipsConfirm');
        this.popup.find('input[name=numberOfReviews]').val(this.data.numberOfReviews);
        this.popup.modal();
        this.confirmButton.off().on('click', $.proxy(save, this));
        this.confirmButton.on('click', $.proxy(save, this));
    };

    var save = function() {
        var formData = this.popup.find('form').serializeArray();
        var data = {};
        $.each(formData, function (key, value) {
            if ($.inArray(value.name, ['numberOfReviews']) > -1) {
                data[value.name] = value.value;
            }
        });
        this.widgetObject.save(data, 1);
        this.popup.modal('hide');
    };

};